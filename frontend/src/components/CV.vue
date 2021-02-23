<template>
  <div>
    <div v-if="!liste.length" class="cv-empty">
      <header class="top">My Online CV</header>
      <main class="create-cv">
        <router-link to="/createPersonne">
          <span class="btn-create">Créer mon CV</span>
        </router-link>
      </main>
      <!-- FOOTER -->
      <footer class="bottom">
        Aline Fierobe &copy; 2021
      </footer>
    </div>

    <div v-else v-for="liste in liste" :key="liste.id">
      <!-- HEADER WITH NAME AND SEARCHED POSITION -->
      <header class="header">
        <div class="edit-btn">
          <!-- LINK TO ADMIN PAGE TO MODIFY DATA -->
          <router-link to="/admin">
            <i class="fas fa-pencil-alt"></i>
          </router-link>
        </div>
        <div class="grid-name">
          <h1>{{ liste.prenom }} {{ liste.nom }}</h1>
        </div>
        <h2 class="sub-title">
          {{ liste.poste }}
        </h2>
      </header>
      <main class="main">
        <!-- ASIDE -->
        <aside>
          <!-- CONTACT -->
          <div class="contact">
            <div class="grid-title-edit">
              <h3 class="title">availability</h3>
            </div>
            <p class="contact-dispo">
              {{ liste.dispo }}
            </p>
            <p class="contact-mobilite">
              {{ liste.mobilite }}
            </p>
            <div class="grid-title-edit">
              <h3 class="title">contact</h3>
            </div>
            <address class="contact-address">{{ liste.adresse }}</address>
            <p class="contact-email">{{ liste.email }}</p>
            <p class="contact-phone">{{ liste.telephone }}</p>
          </div>

          <!-- SKILLS -->
          <div>
            <div class="grid-title-add">
              <h3 class="title">skills</h3>
            </div>
            <ul
              id="listSkills"
              v-for="competence in liste.lesCompetences"
              :key="competence.id"
            >
              <li class="modelSkills">
                <div class="grid-skills">
                  <h4>{{ competence.competence }}</h4>
                </div>
                <div class="skills-bar">
                  <div
                    class="skills-bar-progress"
                    :style="{ width: competence.niveau }"
                  ></div>
                </div>
              </li>
            </ul>
          </div>
          <!-- LANGUAGES -->
          <div>
            <div class="grid-title-add">
              <h3 class="title">languages</h3>
            </div>
            <ul
              id="listLanguages"
              v-for="langue in liste.lesLangues"
              :key="langue.id"
            >
              <li class="modelLanguages grid-edit-del">
                <h4>{{ langue.langue }}</h4>
                <p>{{ langue.niveau }}</p>
              </li>
            </ul>
          </div>

          <!-- ONLINE -->
          <h3 class="title">online</h3>
          <div class="listOnline">
            <ul>
              <li>
                <a :href="liste.website"
                  ><i class="fas fa-globe"></i> {{ liste.website }}
                </a>
              </li>
              <li>
                <a :href="liste.github"
                  ><i class="fab fa-github"></i> github.com/{{ liste.prenom
                  }}{{ liste.nom }}
                </a>
              </li>
              <li>
                <a :href="liste.linkedin"
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
          <article class="aboutme">
            <h3 class="title">about me</h3>
            <p>{{ liste.presentation }}</p>
          </article>

          <!-- DEGREES -->
          <article class="degrees">
            <div class="large-grid-title-add">
              <h3 class="title">degrees</h3>
            </div>
            <div>
              <ul
                id="listDegrees"
                v-for="degree in liste.lesDiplomes.slice(0, 3)"
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
            <div class="large-grid-title-add">
              <h3 class="title">experiences</h3>
            </div>
            <div>
              <ul
                id="listExperiences"
                v-for="experience in liste.lesExperiences.slice(0, 5)"
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
        Aline Fierobe &copy; 2021
      </footer>
    </div>
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
      })
      .catch(error => console.log(error));
  }
};
</script>

<style scoped></style>
