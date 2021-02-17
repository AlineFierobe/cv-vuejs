<template>
  <div class="createS">
    <div class="header"><h2>Mettre à jour le profil</h2></div>
    <form method="POST" @submit.prevent="submit" class="main-form">
      <!-- PRENOM NOM -->
      <fieldset class="info">
        <label for="prenom">Prénom</label>
        <input
          class="margin10"
          name="prenom"
          id="prenom"
          maxlength="70"
          type="text"
          v-model="personne.prenom"
          required
        />
        <label for="nom">Nom</label>
        <input
          name="nom"
          id="nom"
          maxlength="70"
          type="text"
          v-model="personne.nom"
          required
        />
      </fieldset>
      <!-- ADRESSE -->
      <fieldset class="infoDescr">
        <label for="adresse">Adresse</label>
        <textarea
          name="presentation"
          id="presentation"
          cols="30"
          rows="5"
          v-model="personne.adresse"
          required
        ></textarea>
      </fieldset>
      <!-- TELEPHONE & EMAIL -->
      <fieldset class="info">
        <label for="telephone">Téléphone</label>
        <input
          class="margin10"
          name="telephone"
          id="telephone"
          maxlength="70"
          type="text"
          v-model="personne.telephone"
          required
        />
        <label for="email">Email</label>
        <input
          name="email"
          id="email"
          maxlength="70"
          type="text"
          v-model="personne.email"
          required
        />
      </fieldset>
      <!-- PRESENTATION -->
      <fieldset class="infoDescr">
        <label for="adresse">Présentation</label>
        <textarea
          name="presentation"
          id="presentation"
          cols="30"
          rows="5"
          v-model="personne.presentation"
          required
        ></textarea>
      </fieldset>
      <!-- ONLINE -->
      <fieldset class="info">
        <label for="website">Website</label>
        <input
          name="website"
          id="website"
          maxlength="70"
          type="text"
          v-model="personne.website"
          required
        />
      </fieldset>
      <fieldset class="info">
        <label for="github">GitHub</label>
        <input
          name="github"
          id="github"
          maxlength="70"
          type="text"
          v-model="personne.github"
          required
        />
      </fieldset>
      <fieldset class="info">
        <label for="linkedin">LinkedIn</label>
        <input
          name="linkedin"
          id="linkedin"
          maxlength="70"
          type="text"
          v-model="personne.linkedin"
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
  name: "UpdatePersonne",
  data() {
    return {
      personne: {
        id: 0,
        prenom: null,
        nom: null,
        adresse: null,
        telephone: null,
        email: null,
        presentation: null,
        website: null,
        github: null,
        linkedin: null
      }
    };
  },
  created() {
    // récupération id personne via la route
    this.personne.id = 1;
    // Objet FormData pour passage des paramètres
    let params = new FormData();
    params.append("id", this.personne.id);
    ajaxService
      .get("getPersonne", params)
      .then(promise => {
        this.personne = promise;
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.personne.id);
      params.append("prenom", this.personne.prenom);
      params.append("nom", this.personne.nom);
      params.append("adresse", this.personne.adresse);
      params.append("telephone", this.personne.telephone);
      params.append("email", this.personne.email);
      params.append("presentation", this.personne.presentation);
      params.append("website", this.personne.website);
      params.append("github", this.personne.github);
      params.append("linkedin", this.personne.linkedin);
      // Appel du service Ajax
      ajaxService
        .maj("updatePersonne", params)
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

.createS form .infoDescr {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 1rem auto;
  border: 0;
}

.createS form .infoDescr label {
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
.createS form .infoDescr textarea {
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

.margin10 {
  margin-right: 1rem;
}
</style>
