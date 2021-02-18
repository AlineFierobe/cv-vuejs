<template>
  <div class="create">
    <div class="header"><h2>Ajouter une compétence</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <fieldset class="info">
        <label for="competence">Nom de la Compétence</label>
        <input
          name="competence"
          id="competence"
          maxlength="70"
          type="text"
          v-model="competence.competence"
          required
        />
      </fieldset>
      <fieldset class="info">
        <label for="niveau">Niveau</label>
        <input
          name="niveau"
          id="niveau"
          maxlength="70"
          type="text"
          v-model="competence.niveau"
          required
        />
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">ajouter</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "CreateCompetence",
  data() {
    return {
      competence: { competence: null, niveau: null }
    };
  },
  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      // set parameters
      params.append("competence", this.competence.competence);
      params.append("niveau", this.competence.niveau);
      // call Ajax service
      ajaxService
        .maj("createCompetence", params)
        .then(promise => {
          this.competence = promise;
          // redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
