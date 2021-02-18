<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une compétence</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="competence">Compétence</label>
        <input
          type="text"
          name="competence"
          id="competence"
          v-model="competence.competence"
          disabled
        />
      </fieldset>
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer cette compétence ?
        </h3>
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">supprimer</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
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
    // récupération id competence via la route
    this.competence.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
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
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.competence.id);
      // Appel du service Ajax
      ajaxService
        .maj("deleteCompetence", params)
        .then(promise => {
          // Redirection vers la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
