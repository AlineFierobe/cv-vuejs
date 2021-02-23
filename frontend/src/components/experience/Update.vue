<template>
  <div class="createXS">
    <div class="header"><h2>Mettre à jour une expérience</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="experience">Poste</label>
        <input
          maxlength="70"
          type="text"
          v-model="experience.experience"
          required
        />
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
        <select v-model="experience.leLieu.id" required>
          <option value="0" disabled selected>Sélectionner une ville</option>
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
    <!-- FOOTER -->
    <footer class="footer">
      Aline Fierobe &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "UpdateExperience",
  data() {
    return {
      experience: {
        id: 0,
        experience: null,
        entreprise: null,
        debut: null,
        fin: null,
        description: null,
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
    // get id experience via route
    this.experience.id = this.$route.params.id;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.experience.id);
    ajaxService
      .get("getExperience", params)
      .then(promise => {
        this.experience = promise;

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
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.experience.id);
      params.append("experience", this.experience.experience);
      params.append("entreprise", this.experience.entreprise);
      params.append("debut", this.experience.debut);
      params.append("fin", this.experience.fin);
      params.append("description", this.experience.description);
      params.append("lieu", this.experience.leLieu.id);
      // Call Ajax service
      ajaxService
        .maj("updateExperience", params)
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
