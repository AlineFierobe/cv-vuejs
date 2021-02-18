<template>
  <div class="create">
    <div class="header"><h2>Mettre à jour une langue</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <fieldset class="info">
        <label for="langue">Langue</label>
        <input
          name="langue"
          id="langue"
          maxlength="70"
          type="text"
          v-model="langue.langue"
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
          v-model="langue.niveau"
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
  name: "UpdateLangue",
  data() {
    return {
      langue: {
        id: 0,
        langue: null,
        niveau: null
      }
    };
  },
  created() {
    // récupération id langue via la route
    this.langue.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
    let params = new FormData();
    params.append("id", this.langue.id);
    ajaxService
      .get("getLangue", params)
      .then(promise => {
        this.langue = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.langue.id);
      params.append("langue", this.langue.langue);
      params.append("niveau", this.langue.niveau);
      // Appel du service Ajax
      ajaxService
        .maj("updateLangue", params)
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
