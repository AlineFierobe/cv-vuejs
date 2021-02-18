<template>
  <div class="create">
    <div class="header"><h2>Mettre à jour une compétence</h2></div>
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

        <button type="submit">modifier</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "UpdateCompetence",
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
      params.append("competence", this.competence.competence);
      params.append("niveau", this.competence.niveau);
      // Appel du service Ajax
      ajaxService
        .maj("updateCompetence", params)
        .then(promise => {
          this.competence = promise;
          // Redirection sur la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
