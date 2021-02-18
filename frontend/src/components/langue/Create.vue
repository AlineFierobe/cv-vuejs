<template>
  <div class="create">
    <div class="header"><h2>Ajouter une langue</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="langue">Langue</label>
        <input maxlength="70" type="text" v-model="langue.langue" required />
      </fieldset>
      <fieldset class="info">
        <label for="niveau">Niveau</label>
        <input maxlength="70" type="text" v-model="langue.niveau" required />
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
  name: "CreateLangue",
  data() {
    return {
      langue: { langue: null, niveau: null }
    };
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      // passage des paramètres de la compétence
      params.append("langue", this.langue.langue);
      params.append("niveau", this.langue.niveau);
      // Appel du service Ajax
      ajaxService
        .maj("createLangue", params)
        .then(promise => {
          this.langue = promise;
          // Redirection sur la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
