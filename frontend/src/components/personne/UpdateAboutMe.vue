<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour ma Présentation</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <!-- PRESENTATION -->
      <fieldset class="infoDescr">
        <label for="adresse">Présentation</label>
        <textarea
          name="presentation"
          id="presentation"
          cols="30"
          rows="5"
          v-model="personne.presentation"
          required
        ></textarea>
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">modifier</button>
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
  name: "UpdateAboutMe",
  data() {
    return {
      personne: {
        id: 0,
        mdp: null,
        prenom: null,
        nom: null,
        adresse: null,
        telephone: null,
        email: null,
        presentation: null,
        website: null,
        github: null,
        linkedin: null,
        poste: null,
        dispo: null,
        mobilite: null
      }
    };
  },
  created() {
    // get id personne via route
    this.personne.id = 1;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.personne.id);
    ajaxService
      .get("getPersonne", params)
      .then(promise => {
        this.personne = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.personne.id);
      params.append("presentation", this.personne.presentation);
      // call ajax service
      ajaxService
        .maj("updateAboutMe", params)
        .then(promise => {
          this.personne = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
