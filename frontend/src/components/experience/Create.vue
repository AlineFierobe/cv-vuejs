<template>
  <div class="createXS">
    <div class="header"><h2>Ajouter une expérience</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="experience">Poste</label>
        <input maxlength="70" type="text" v-model="experience.poste" required />
      </fieldset>
      <fieldset class="info">
        <label for="entreprise">Entreprise</label>
        <input
          maxlength="70"
          type="text"
          v-model="experience.entreprise"
          required
        />
      </fieldset>
      <fieldset class="info">
        <label for="debut">Début</label>
        <input
          maxlength="70"
          type="text"
          v-model="experience.debut"
          required
          class="margin10"
        />
        <label for="fin">Fin</label>
        <input maxlength="70" type="text" v-model="experience.fin" required />
      </fieldset>
      <fieldset class="infoDescr">
        <label for="description">Description</label>
        <textarea
          name="description"
          cols="30"
          rows="5"
          v-model="experience.description"
          required
        ></textarea>
      </fieldset>
      <fieldset class="info">
        <label for="ville">Ville</label>
        <select v-model="experience.idLieu" required>
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
    <!-- FOOTER -->
    <footer class="footer">
      Aline Fierobe &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "CreateExperience",
  data() {
    return {
      experience: {
        experience: null,
        entreprise: null,
        debut: null,
        fin: null,
        description: null,
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
      // set parameters for experience
      params.append("experience", this.experience.poste);
      params.append("entreprise", this.experience.entreprise);
      params.append("debut", this.experience.debut);
      params.append("fin", this.experience.fin);
      params.append("description", this.experience.description);
      // Call Ajax service
      params.append("lieu", this.experience.idLieu);
      ajaxService
        .maj("createExperience", params)
        .then(promise => {
          this.experience = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
