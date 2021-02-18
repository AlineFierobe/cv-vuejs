<template>
  <div class="delete">
    <div class="header"><h2>Supprimer un diplôme</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="diplome">Diplôme</label>
        <input
          type="text"
          name="diplome"
          id="diplome"
          v-model="diplome.diplome"
          class="margin10"
          disabled
        />
        <label for="ecole">Ecole</label>
        <input
          type="text"
          name="ecole"
          id="ecole"
          v-model="diplome.ecole"
          disabled
        />
      </fieldset>
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer ce diplôme ?
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
  name: "Deletediplome",
  data() {
    return {
      diplome: {
        id: 0,
        diplome: null,
        ecole: null,
        annee: null,
        idLieu: 0
      }
    };
  },

  created() {
    // récupération id diplome via la route
    this.diplome.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
    let params = new FormData();
    params.append("id", this.diplome.id);
    ajaxService
      .get("getDiplome", params)
      .then(promise => {
        this.diplome = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.diplome.id);
      // Appel du service Ajax
      ajaxService
        .maj("deleteDiplome", params)
        .then(promise => {
          this.diplome = promise;
          // Redirection vers la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
