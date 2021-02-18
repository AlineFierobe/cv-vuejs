<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une expérience</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="experience">Poste</label>
        <input
          type="text"
          name="experience"
          id="experience"
          v-model="experience.experience"
          class="margin10"
          disabled
        />
        <label for="entreprise">Entreprise</label>
        <input
          type="text"
          name="entreprise"
          id="entreprise"
          v-model="experience.entreprise"
          disabled
        />
      </fieldset>
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer cette expérience ?
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
  name: "Deleteexperience",
  data() {
    return {
      experience: {
        id: 0,
        experience: null,
        entreprise: null,
        debut: null,
        fin: null,
        description: null,
        idLieu: 0
      }
    };
  },

  created() {
    // récupération id experience via la route
    this.experience.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
    let params = new FormData();
    params.append("id", this.experience.id);
    ajaxService
      .get("getExperience", params)
      .then(promise => {
        this.experience = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.experience.id);
      // Appel du service Ajax
      ajaxService
        .maj("deleteExperience", params)
        .then(promise => {
          this.experience = promise;
          // Redirection vers la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
