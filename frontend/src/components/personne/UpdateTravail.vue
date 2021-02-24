<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour ma recherche d'emploi</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
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
      <!-- DISPONIBILITE -->
      <fieldset class="info">
        <label for="disponibilite">Disponibilité</label>
        <input
          name="disponibilite"
          id="disponibilite"
          maxlength="70"
          type="text"
          v-model="personne.dispo"
          required
        />
      </fieldset>
      <!-- MOBILITE -->
      <fieldset class="info">
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
  name: "UpdateTravail",
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
      params.append("poste", this.personne.poste);
      params.append("dispo", this.personne.dispo);
      params.append("mobilite", this.personne.mobilite);
      // call ajax service
      ajaxService
        .maj("updateTravail", params)
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
