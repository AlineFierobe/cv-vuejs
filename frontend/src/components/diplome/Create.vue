<template>
  <div class="createS">
    <div class="header"><h2>Ajouter un diplôme</h2></div>
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
        <select v-model="diplome.idLieu" required>
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

        <button type="submit">ajouter</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "CreateDiplome",
  data() {
    return {
      diplome: {
        diplome: null,
        ecole: null,
        annee: null,
        idLieu: 0
      },
      listLieu: []
    };
  },

  created() {
    ajaxService
      .getList("listLieu")
      .then(promise => {
        this.listLieu = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      // set parameters for diplome
      params.append("diplome", this.diplome.diplome);
      params.append("ecole", this.diplome.ecole);
      params.append("annee", this.diplome.annee);
      params.append("lieu", this.diplome.idLieu);
      // call Ajax service
      ajaxService
        .maj("createDiplome", params)
        .then(promise => {
          this.diplome = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
