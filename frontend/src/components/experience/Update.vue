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
    <div class="footer">Aline Fierobe &copy; 2021</div>
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
    // récupération id experience via la route
    this.experience.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
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
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.experience.id);
      params.append("experience", this.experience.experience);
      params.append("entreprise", this.experience.entreprise);
      params.append("debut", this.experience.debut);
      params.append("fin", this.experience.fin);
      params.append("description", this.experience.description);
      params.append("lieu", this.experience.leLieu.id);
      // Appel du service Ajax
      ajaxService
        .maj("updateExperience", params)
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
.createXS {
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

.createXS form {
  width: 100%;
  margin: auto;
}

.createXS form .info {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 1rem auto;
  border: 0;
}

.createXS form .info label {
  flex: 1;
  background: #00c3ff;
  text-align: right;
  border-radius: 8px 0px 0px 8px;
  color: #fafafa;
  padding: 1rem;
  font-size: 2rem;
  border: 1px solid #00c3ff;
}
.createXS form .info input,
.createXS form .info select,
.createXS form .info div {
  flex: 2;
  border-radius: 0px 8px 8px 0px;
  padding: 1rem;
  font-size: 1.65rem;
  border: 1.5px solid #00c3ff;
}

.createXS form .infoDescr {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 1rem auto;
  border: 0;
}

.createXS form .infoDescr label {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 98px;
  background: #00c3ff;
  text-align: right;
  border-radius: 8px 0px 0px 8px;
  color: #fafafa;
  padding: 1rem;
  font-size: 2rem;
  border: 1px solid #00c3ff;
}
.createXS form .infoDescr textarea {
  flex: 2;
  border-radius: 0px 8px 8px 0px;
  padding: 1rem;
  border: 1.5px solid #00c3ff;
  font-size: 1.5rem;
  font-family: "Josefin Sans", sans-serif;
  font-weight: 300;
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
