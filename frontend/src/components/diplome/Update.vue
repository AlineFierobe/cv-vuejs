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
.createS {
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

.createS form {
  width: 100%;
  margin: auto;
}

.createS form .info {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 3rem auto;
  border: 0;
}

.createS form .info label {
  flex: 1;
  background: #00c3ff;
  text-align: right;
  border-radius: 8px 0px 0px 8px;
  color: #fafafa;
  padding: 1rem;
  font-size: 2rem;
  border: 1px solid #00c3ff;
}
.createS form .info input,
.createS form .info select,
.createS form .info div {
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

.btn .btn-small,
.btn .btn-small a {
  width: auto;
  background: #00c3ff;
  border: 0;
  border-radius: 4px;
  padding: 1rem 0.5rem;
  margin: 1rem;
  color: #fafafa;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 1.2rem;
}
.margin10 {
  margin-right: 1rem;
}
</style>
