<template>
  <div>
    <!-- HEADER WITH NAME AND SEARCHED POSITION -->
    <header class="header" v-for="liste in liste" :key="liste.id">
      <h1>{{ liste.prenom }} {{ liste.nom }}</h1>
      <h2>
        {{ liste.leTravail.poste }}
      </h2>
    </header>
    <main class="main">
      <!-- ASIDE -->
      <aside>
        <!-- CONTACT -->
        <div class="contact" v-for="liste in liste" :key="liste.id">
          <p class="contact-dispo">{{ liste.leTravail.disponibilite }}</p>
          <p class="contact-mobilite">{{ liste.leTravail.mobilite }}</p>
          <h3 class="title">contact</h3>
          <address class="contact-address">{{ liste.adresse }}</address>
          <p class="contact-email">{{ liste.email }}</p>
          <p class="contact-phone">{{ liste.telephone }}</p>
        </div>

        <!-- SKILLS -->
        <div v-for="liste in liste" :key="liste.id">
          <h3 class="title">skills</h3>
          <ul
            id="listSkills"
            v-for="competence in liste.lesCompetences"
            :key="competence.id"
          >
            <li class="modelSkills">
              <h4>{{ competence.competence }}</h4>
              <p>{{ competence.niveau }}</p>
            </li>
          </ul>
        </div>
        <!-- LANGUAGES -->
        <div v-for="liste in liste" :key="liste.id">
          <h3 class="title">languages</h3>
          <ul
            id="listLanguages"
            v-for="langue in liste.lesLangues"
            :key="langue.id"
          >
            <li class="modelLanguages">
              <h4>{{ langue.langue }}</h4>
              <p>{{ langue.niveau }}</p>
            </li>
          </ul>
        </div>

        <!-- ONLINE -->
        <h3 class="title">online</h3>
        <div class="listOnline" v-for="liste in liste" :key="liste.id">
          <ul>
            <li>
              <a href="https://WEBSITE"
                ><i class="fas fa-globe"></i> {{ liste.website }}
              </a>
            </li>
            <li>
              <a href="GITHUB"
                ><i class="fab fa-github"></i> github.com/{{ liste.prenom
                }}{{ liste.nom }}
              </a>
            </li>
            <li>
              <a href=" LINKEDIN"
                ><i class="fab fa-linkedin"></i> {{ liste.prenom }}
                {{ liste.nom }}
              </a>
            </li>
          </ul>
        </div>
      </aside>

      <!-- MAIN SECTION -->
      <section>
        <!-- ABOUT ME -->
        <article class="aboutme" v-for="liste in liste" :key="liste.id">
          <h3 class="title">about me</h3>
          <p>{{ liste.presentation }}</p>
        </article>

        <!-- DEGREES -->
        <article class="degrees">
          <h3 class="title">degrees</h3>
          <div v-for="liste in liste" :key="liste.id">
            <ul
              id="listDegrees"
              v-for="degree in liste.lesDiplomes"
              :key="degree.id"
            >
              <li class="modelDegrees">
                <h4>{{ degree.diplome }}</h4>
                <p class="modelDegrees-school">
                  {{ degree.ecole }} , {{ degree.leLieu.ville }},
                  <span> {{ degree.leLieu.pays }} </span>
                </p>
                <p class="modelDegrees-year">{{ degree.annee }}</p>
              </li>
            </ul>
          </div>
        </article>

        <!-- EXPERIENCES -->
        <article class="experiences">
          <h3 class="title">experiences</h3>
          <div v-for="liste in liste" :key="liste.id">
            <ul
              id="listExperiences"
              v-for="experience in liste.lesExperiences"
              :key="experience.id"
            >
              <li class="modelExperiences">
                <div class="modelExperiences-years">
                  <span> {{ experience.debut }} </span>
                  <span> {{ experience.fin }} </span>
                </div>
                <div class="modelExperiences-info">
                  <h4>{{ experience.experience }}</h4>
                  <p class="modelExperiences-info-company">
                    {{ experience.entreprise }} ,
                    {{ experience.leLieu.ville }} ,
                    <span> {{ experience.leLieu.pays }} </span>
                  </p>
                  <p class="modelExperiences-info-description">
                    {{ experience.description }}
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </article>
      </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
      <a href="WEBSITE">Aline Fierobe</a> &copy; 2021
    </footer>
  </div>
</template>

<script>
import ajaxService from "@/services/ajaxService";

export default {
  name: "CV",
  data() {
    return {
      liste: []
    };
  },
  computed: {
    list() {
      return this.liste;
    }
  },
  created() {
    ajaxService
      .getList("listPersonne")
      .then(promise => {
        this.liste = promise;
        console.log("Liste des Personnes ", this.liste);
      })
      .catch(error => console.log(error));
  }
};
</script>

<style></style>
