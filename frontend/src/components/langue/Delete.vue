<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une langue</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="langue">Langue</label>
        <input
          type="text"
          name="langue"
          id="langue"
          v-model="langue.langue"
          disabled
        />
      </fieldset>
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer cette langue ?
        </h3>
      </fieldset>

      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">supprimer</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "Deletelangue",
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
      // Appel du service Ajax
      ajaxService
        .maj("deleteLangue", params)
        .then(promise => {
          // Redirection vers la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
