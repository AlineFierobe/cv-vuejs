<template>
  <div class="create">
    <div class="header"><h2>Ajouter un lieu</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <label for="ville">Ville</label>
        <input maxlength="70" type="text" v-model="lieu.ville" required />
      </fieldset>
      <fieldset class="info">
        <label for="pays">Pays</label>
        <input maxlength="70" type="text" v-model="lieu.pays" required />
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
  name: "CreateLieu",
  data() {
    return {
      lieu: { ville: null, pays: null }
    };
  },

  methods: {
    submit: function() {
      // Object FormData to set parameters
      let params = new FormData();
      // set parameters for lieu
      params.append("ville", this.lieu.ville);
      params.append("pays", this.lieu.pays);
      // call ajax service
      ajaxService
        .maj("createLieu", params)
        .then(promise => {
          this.lieu = promise;
          // Redirect to admin page
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style></style>
