<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour mes informations</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <!-- PRENOM NOM -->
      <fieldset class="info">
        <label for="prenom">Prénom</label>
        <input
          class="margin10"
          name="prenom"
          id="prenom"
          maxlength="70"
          type="text"
          v-model="personne.prenom"
          required
        />
        <label for="nom">Nom</label>
        <input
          name="nom"
          id="nom"
          maxlength="70"
          type="text"
          v-model="personne.nom"
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
    <!-- FOOTER -->
    <footer class="footer">
      Aline Fierobe &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "UpdateName",
  data() {
    return {
      personne: {
        id: 0,
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
      params.append("prenom", this.personne.prenom);
      params.append("nom", this.personne.nom);
      // call ajax service
      ajaxService
        .maj("updateName", params)
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
