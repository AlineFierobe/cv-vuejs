<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour le profil</h2></div>
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
      <!-- ADRESSE -->
      <fieldset class="infoDescr">
        <label for="adresse">Adresse</label>
        <textarea
          name="presentation"
          id="presentation"
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
        />
      </fieldset>
      <fieldset class="info">
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
  name: "UpdatePersonne",
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
        linkedin: null
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
      params.append("adresse", this.personne.adresse);
      params.append("telephone", this.personne.telephone);
      params.append("email", this.personne.email);
      params.append("presentation", this.personne.presentation);
      params.append("website", this.personne.website);
      params.append("github", this.personne.github);
      params.append("linkedin", this.personne.linkedin);
      // call ajax service
      ajaxService
        .maj("updatePersonne", params)
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
