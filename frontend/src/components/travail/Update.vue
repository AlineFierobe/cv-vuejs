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
    // récupération id travail via la route
    this.travail.id = 1;
    // Objet FormData pour passage des paramètres
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
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.travail.id);
      params.append("poste", this.travail.poste);
      params.append("disponibilite", this.travail.disponibilite);
      params.append("mobilite", this.travail.mobilite);
      // Appel du service Ajax
      ajaxService
        .maj("updateTravail", params)
        .then(promise => {
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
