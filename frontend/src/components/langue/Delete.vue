<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une langue</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <h3>Es-tu sûr de vouloir supprimer : {{ langue.langue }} ?</h3>
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">supprimer</button>
      </fieldset>
    </form>
    <!-- FOOTER -->
    <footer class="footer">
      Aline Fierobe &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "Deletelangue",
  data() {
    return {
      langue: {
        id: 0,
        langue: null,
        niveau: null
      }
    };
  },

  created() {
    // get id langue via route
    this.langue.id = this.$route.params.id;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.langue.id);
    ajaxService
      .get("getLangue", params)
      .then(promise => {
        this.langue = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.langue.id);
      // call Ajax service
      ajaxService
        .maj("deleteLangue", params)
        .then(promise => {
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
