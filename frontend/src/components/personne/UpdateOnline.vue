<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour la section Online</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
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
    <!-- FOOTER -->
    <footer class="footer">
      Aline Fierobe &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "UpdateOnline",
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
      params.append("website", this.personne.website);
      params.append("github", this.personne.github);
      params.append("linkedin", this.personne.linkedin);

      // call ajax service
      ajaxService
        .maj("updateOnline", params)
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
