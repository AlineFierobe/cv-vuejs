<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une compétence</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <h3>Es-tu sûr de vouloir supprimer : {{ competence.competence }} ?</h3>
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
  name: "DeleteCompetence",
  data() {
    return {
      competence: {
        id: 0,
        competence: null,
        niveau: null
      }
    };
  },

  created() {
    // get id competence via route
    this.competence.id = this.$route.params.id;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.competence.id);
    ajaxService
      .get("getCompetence", params)
      .then(promise => {
        this.competence = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.competence.id);
      // Call Ajax service
      ajaxService
        .maj("deleteCompetence", params)
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
