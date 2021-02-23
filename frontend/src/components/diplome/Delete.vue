<template>
  <div class="delete">
    <div class="header"><h2>Supprimer un diplôme</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer :
          {{ diplome.diplome }} ?
        </h3>
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
  name: "DeleteDiplome",
  data() {
    return {
      diplome: {
        id: 0,
        diplome: null,
        ecole: null,
        annee: null,
        idLieu: 0
      }
    };
  },

  created() {
    // get id by route
    this.diplome.id = this.$route.params.id;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.diplome.id);
    ajaxService
      .get("getDiplome", params)
      .then(promise => {
        this.diplome = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.diplome.id);
      // call Ajax service
      ajaxService
        .maj("deleteDiplome", params)
        .then(promise => {
          this.diplome = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
