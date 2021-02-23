<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une expérience</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer :
          {{ experience.experience + " à " + experience.entreprise }} ?
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
  name: "DeleteExperience",
  data() {
    return {
      experience: {
        id: 0,
        experience: null,
        entreprise: null,
        debut: null,
        fin: null,
        description: null,
        idLieu: 0
      }
    };
  },

  created() {
    // get id experience via route
    this.experience.id = this.$route.params.id;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.experience.id);
    ajaxService
      .get("getExperience", params)
      .then(promise => {
        this.experience = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.experience.id);
      // call Ajax service
      ajaxService
        .maj("deleteExperience", params)
        .then(promise => {
          this.experience = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
