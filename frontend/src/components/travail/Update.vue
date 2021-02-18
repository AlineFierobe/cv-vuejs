<template>
  <div class="create">
    <div class="header"><h2>Mettre à jour ma recherche d'emploi</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <!-- POSTE -->
      <fieldset class="info">
        <label for="poste">Poste recherché</label>
        <input
          name="poste"
          id="poste"
          maxlength="70"
          type="text"
          v-model="travail.poste"
          required
        />
      </fieldset>
      <!-- DISPONIBILITE -->
      <fieldset class="info">
        <label for="disponibilite">Disponibilité</label>
        <input
          name="disponibilite"
          id="disponibilite"
          maxlength="70"
          type="text"
          v-model="travail.disponibilite"
          required
        />
      </fieldset>

      <!-- MOBILITE -->
      <fieldset class="info">
        <label for="mobilite">Mobilité</label>
        <input
          name="mobilite"
          id="mobilite"
          maxlength="70"
          type="text"
          v-model="travail.mobilite"
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
  name: "UpdateTravail",
  data() {
    return {
      travail: {
        id: 0,
        travail: null,
        poste: null,
        disponibilite: null,
        mobilite: null
      }
    };
  },
  created() {
    // get id travail via route
    this.travail.id = 1;
    // Object FormData to set parameters
    let params = new FormData();
    params.append("id", this.travail.id);
    ajaxService
      .get("getTravail", params)
      .then(promise => {
        this.travail = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      params.append("id", this.travail.id);
      params.append("poste", this.travail.poste);
      params.append("disponibilite", this.travail.disponibilite);
      params.append("mobilite", this.travail.mobilite);
      // call Ajax service
      ajaxService
        .maj("updateTravail", params)
        .then(promise => {
          this.travail = promise;
          // Redirectto admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
