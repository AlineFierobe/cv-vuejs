<template>
  <div class="delete">
    <div class="header"><h2>Supprimer une compétence</h2></div>
    <form method="POST" class="main-form" @submit.prevent="submit">
      <fieldset class="info">
        <h3>
          Es-tu sûr de vouloir supprimer
          <input
            type="text"
            name="competence"
            id="competence"
            v-model="competence.competence"
          />
          ?
        </h3>
      </fieldset>
      <fieldset class="btn">
        <button type="button">
          <router-link to="/admin">annuler</router-link>
        </button>

        <button type="submit">supprimer</button>
      </fieldset>
    </form>
    <div class="footer">Aline Fierobe &copy; 2021</div>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "DeleteCompetence",
  data() {
    return {
      competence: {
        id: 0,
        competence: null,
        niveau: null
      }
    };
  },

  create() {
    // récupération id competence via la route
    this.competence.id = this.$route.params.id;
    // Objet FormData pour passage des paramètres
    let params = new FormData();
    params.append("id", this.competence.id);
    params.append("competence", this.competence.competence);
    params.append("niveau", this.competence.niveau);
    ajaxService
      .get("getCompetence", params)
      .then(promise => {
        this.competence = promise;
        console.log("Competence ", this.competence);
      })
      .catch(error => console.log(error));
  },

  methods: {
    submit: function() {
      // Objet FormData pour passage des paramètres
      let params = new FormData();
      params.append("id", this.competence.id);
      params.append("competence", this.competence.competence);
      params.append("niveau", this.competence.niveau);
      // Appel du service Ajax
      ajaxService
        .maj("deleteCompetence", params)
        .then(promise => {
          // Redirection sur la liste des potions
          this.$router.push("/admin");
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style>
.delete {
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

.delete form {
  width: 100%;
  margin: auto;
}

.delete form .info {
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 5rem auto;
  border: 0;
}

.delete form .info label {
  flex: 1;
  background: #00c3ff;
  text-align: right;
  border-radius: 8px 0px 0px 8px;
  color: #fafafa;
  padding: 1rem;
  font-size: 2rem;
  border: 1px solid #00c3ff;
}
.delete form .info input {
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
