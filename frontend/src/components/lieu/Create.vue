<template>
  <div class="create">
    <div class="header"><h2>Ajouter un lieu</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="ville">Ville</label>
        <input maxlength="70" type="text" v-model="lieu.ville" required />
      </fieldset>
      <fieldset class="info">
        <label for="pays">Pays</label>
        <input maxlength="70" type="text" v-model="lieu.pays" required />
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
  name: "CreateLieu",
  data() {
    return {
      lieu: { ville: null, pays: null }
    };
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      // passage des paramètres de le lieu
      params.append("ville", this.lieu.ville);
      params.append("pays", this.lieu.pays);
      // Appel du service Ajax
      ajaxService
        .maj("createLieu", params)
        .then(promise => {
          this.lieu = promise;
          // Redirection sur la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
