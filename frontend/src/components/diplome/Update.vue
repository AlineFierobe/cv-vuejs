<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour un diplôme</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="diplome">Diplôme</label>
        <input maxlength="70" type="text" v-model="diplome.diplome" required />
      </fieldset>
      <fieldset class="info">
        <label for="ecole">Ecole</label>
        <input maxlength="70" type="text" v-model="diplome.ecole" required />
      </fieldset>
      <fieldset class="info">
        <label for="annee">Année d'obtention</label>
        <input maxlength="70" type="text" v-model="diplome.annee" required />
      </fieldset>
      <fieldset class="info">
        <label for="ville">Ville</label>
        <select v-model="diplome.leLieu.id" required>
          <option value="0" disabled selected>Selectionner une ville</option>
          <option v-for="lieu in listLieu" :key="lieu.id" :value="lieu.id">{{
            lieu.ville + ", " + lieu.pays
          }}</option>
        </select>
        <fieldset class="btn">
          <button type="button" class="btn-small">
            <router-link to="/createLieu">ajouter une ville</router-link>
          </button>
        </fieldset>
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
  name: "UpdateDiplome",
  data() {
    return {
      diplome: {
        diplome: null,
        ecole: null,
        annee: null,
        leLieu: {
          id: 0,
          ville: null,
          pays: null
        }
      },
      listLieu: []
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

        ajaxService
          .getList("listLieu")
          .then(promise => {
            this.listLieu = promise;
          })
          .catch(error => console.log(error));
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      // passage des paramètres de la diplome
      params.append("id", this.diplome.id);
      params.append("diplome", this.diplome.diplome);
      params.append("ecole", this.diplome.ecole);
      params.append("annee", this.diplome.annee);
      params.append("lieu", this.diplome.leLieu.id);
      // Appel du service Ajax
      ajaxService
        .maj("updateDiplome", params)
        .then(promise => {
          this.diplome = promise;
          // Redirection sur la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
