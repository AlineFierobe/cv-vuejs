<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour la section Contact</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
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
  name: "UpdateContact",
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
      params.append("adresse", this.personne.adresse);
      params.append("telephone", this.personne.telephone);
      params.append("email", this.personne.email);
      // call ajax service
      ajaxService
        .maj("updateContact", params)
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
