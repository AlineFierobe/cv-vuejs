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
    <div class="footer">Aline Fierobe &copy; 2021</div>
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
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      // passage des paramètres de le lieu
      params.append("ville", this.lieu.ville);
      params.append("pays", this.lieu.pays);
      // Appel du service Ajax
      ajaxService
        .maj("createLieu", params)
        .then(promise => {
          console.log(promise);
          // Redirection sur la page admin
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style>
.create {
  min-height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
}

.header h2 {
  font-size: 3rem;
  padding: 3rem;
  font-weight: 700;
}

.main-form {
  grid-area: main;
}

.create form {
  width: 100%;
  margin: auto;
}

.create form .info {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 5rem auto;
  border: 0;
}

.create form .info label {
  flex: 1;
  background: #00c3ff;
  text-align: right;
  border-radius: 8px 0px 0px 8px;
  color: #fafafa;
  padding: 1rem;
  font-size: 2rem;
  border: 1px solid #00c3ff;
}
.create form .info input {
  flex: 2;
  border-radius: 0px 8px 8px 0px;
  padding: 1rem;
  font-size: 1.65rem;
  border: 1.5px solid #00c3ff;
}

.btn {
  text-align: center;
  border: 0;
}

.btn button,
.btn button a {
  width: 200px;
  background: #00c3ff;
  border: 0;
  border-radius: 4px;
  padding: 1rem 2rem;
  margin: 0 1rem;
  color: #fafafa;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 1.9rem;
}
</style>
