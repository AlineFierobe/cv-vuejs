<template>
  <div class="createS">
    <div class="header"><h2>Créer mon CV</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <h3 class="main-form-title">Contact</h3>
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
      <!-- ADRESSE -->
      <fieldset class="infoDescr">
        <label for="adresse">Adresse</label>
        <textarea
          name="adresse"
          id="adresse"
          cols="30"
          rows="5"
          v-model="personne.adresse"
          required
        ></textarea>
      </fieldset>
      <!-- TELEPHONE & EMAIL -->
      <fieldset class="info">
        <label for="telephone">Téléphone</label>
        <input
          class="margin10"
          name="telephone"
          id="telephone"
          maxlength="70"
          type="text"
          v-model="personne.telephone"
          required
        />
        <label for="email">Email</label>
        <input
          name="email"
          id="email"
          maxlength="70"
          type="text"
          v-model="personne.email"
          required
        />
      </fieldset>
      <h3 class="main-form-title-separator">Présentation</h3>
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
      <h3 class="main-form-title-separator">Online</h3>
      <!-- ONLINE -->
      <fieldset class="info">
        <label for="website">Website</label>
        <input
          name="website"
          id="website"
          maxlength="70"
          type="text"
          v-model="personne.website"
          required
        />
      </fieldset>
      <fieldset class="info">
        <label for="github">GitHub</label>
        <input
          name="github"
          id="github"
          maxlength="70"
          type="text"
          v-model="personne.github"
          required
          class="margin10"
        />
        <label for="linkedin">LinkedIn</label>
        <input
          name="linkedin"
          id="linkedin"
          maxlength="70"
          type="text"
          v-model="personne.linkedin"
          required
        />
      </fieldset>
      <h3 class="main-form-title-separator">Recherche d'Emploi</h3>
      <!-- POSTE -->
      <fieldset class="info">
        <label for="poste">Poste recherché</label>
        <input
          name="poste"
          id="poste"
          maxlength="70"
          type="text"
          v-model="personne.poste"
          required
        />
      </fieldset>
      <!-- DISPONIBILITE & MOBILITE -->
      <fieldset class="info">
        <label for="disponibilite">Disponibilité</label>
        <input
          name="disponibilite"
          id="disponibilite"
          maxlength="70"
          type="text"
          v-model="personne.dispo"
          required
          class="margin10"
        />
        <label for="mobilite">Mobilité</label>
        <input
          name="mobilite"
          id="mobilite"
          maxlength="70"
          type="text"
          v-model="personne.mobilite"
          required
        />
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/">annuler</router-link>
        </button>

        <button type="submit">créer</button>
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
  name: "CreatePersonne",
  data() {
    return {
      personne: {
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
  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("prenom", this.personne.prenom);
      params.append("nom", this.personne.nom);
      params.append("adresse", this.personne.adresse);
      params.append("telephone", this.personne.telephone);
      params.append("email", this.personne.email);
      params.append("presentation", this.personne.presentation);
      params.append("website", this.personne.website);
      params.append("github", this.personne.github);
      params.append("linkedin", this.personne.linkedin);
      params.append("poste", this.personne.poste);
      params.append("dispo", this.personne.dispo);
      params.append("mobilite", this.personne.mobilite);
      // call ajax service
      ajaxService
        .maj("createPersonne", params)
        .then(promise => {
          this.personne = promise;
          // Redirect to admin page
          this.$router.push("/");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
