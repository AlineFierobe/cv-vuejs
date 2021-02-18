<template>
  <div>
    <div v-for="liste in liste" :key="liste.id">
      <!-- HEADER WITH NAME AND SEARCHED POSITION -->
      <header class="header">
        <!-- LINK TO ADMIN PAGE TO MODIFY DATA -->
        <div class="edit-btn">
          <router-link to="/">
            <i class="fas fa-chevron-circle-left"></i>
          </router-link>
        </div>
        <h1>{{ liste.prenom }} {{ liste.nom }}</h1>
        <h2 class="sub-title">
          {{ liste.leTravail.poste }}
        </h2>
        <div class="search-job-edit-btn">
          <router-link to="/updateTravail">
            modifier ma recherche
          </router-link>
        </div>
      </header>
      <main class="main">
        <!-- ASIDE -->
        <aside>
          <!-- CONTACT -->
          <div class="contact">
            <p class="contact-dispo">{{ liste.leTravail.disponibilite }}</p>
            <p class="contact-mobilite">{{ liste.leTravail.mobilite }}</p>
            <div class="grid-title-edit">
              <h3 class="title">contact</h3>
              <div class="grid-title-edit-btn">
                <router-link to="/updatePersonne">
                  <i class="fas fa-pen-square"></i>
                </router-link>
              </div>
            </div>
            <address class="contact-address">{{ liste.adresse }}</address>
            <p class="contact-email">{{ liste.email }}</p>
            <p class="contact-phone">{{ liste.telephone }}</p>
          </div>

          <!-- SKILLS -->
          <div>
            <div class="grid-title-add">
              <h3 class="title">skills</h3>
              <div class="grid-title-add-btn">
                <router-link to="/createCompetence">
                  <i class="fas fa-plus-square"></i>
                </router-link>
              </div>
            </div>
            <ul
              id="listSkills"
              v-for="competence in liste.lesCompetences"
              :key="competence.id"
            >
              <li class="modelSkills grid-edit-del">
                <h4>{{ competence.competence }}</h4>
                <p>{{ competence.niveau }}</p>
                <div class="grid-edit-btn">
                  <router-link
                    :to="{
                      name: 'UpdateCompetence',
                      params: { id: competence.id }
                    }"
                  >
                    <i class="fas fa-edit"></i>
                  </router-link>
                </div>
                <div class="grid-del-btn">
                  <router-link
                    :to="{
                      name: 'DeleteCompetence',
                      params: { id: competence.id }
                    }"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </router-link>
                </div>
              </li>
            </ul>
          </div>
          <!-- LANGUAGES -->
          <div>
            <div class="grid-title-add">
              <h3 class="title">languages</h3>
              <div class="grid-title-add-btn">
                <router-link to="/createLangue">
                  <i class="fas fa-plus-square"></i>
                </router-link>
              </div>
            </div>
            <ul
              id="listLanguages"
              v-for="langue in liste.lesLangues"
              :key="langue.id"
            >
              <li class="modelLanguages grid-edit-del">
                <h4>{{ langue.langue }}</h4>
                <p>{{ langue.niveau }}</p>
                <div class="grid-edit-btn">
                  <router-link
                    :to="{
                      name: 'UpdateLangue',
                      params: { id: langue.id }
                    }"
                  >
                    <i class="fas fa-edit"></i>
                  </router-link>
                </div>
                <div class="grid-del-btn">
                  <router-link
                    :to="{
                      name: 'DeleteLangue',
                      params: { id: langue.id }
                    }"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </router-link>
                </div>
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
              <div class="large-grid-title-add-btn">
                <router-link to="/createDiplome">
                  <i class="fas fa-plus-square"></i>
                </router-link>
              </div>
            </div>
            <div>
              <ul
                id="listDegrees"
                v-for="degree in liste.lesDiplomes.slice(0, 3)"
                :key="degree.id"
              >
                <li class="modelDegrees">
                  <div class="large-grid-edit-del">
                    <h4>{{ degree.diplome }}</h4>
                    <div class="large-grid-edit-btn">
                      <router-link
                        :to="{
                          name: 'UpdateDiplome',
                          params: { id: degree.id }
                        }"
                      >
                        <i class="fas fa-edit"></i>
                      </router-link>
                    </div>
                    <div class="large-grid-del-btn">
                      <router-link
                        :to="{
                          name: 'DeleteDiplome',
                          params: { id: degree.id }
                        }"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </router-link>
                    </div>
                  </div>

                  <p class="modelDegrees-school">
                    {{ degree.ecole }}, {{ degree.leLieu.ville }},
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
              <div class="large-grid-title-add-btn">
                <router-link to="/createExperience">
                  <i class="fas fa-plus-square"></i>
                </router-link>
              </div>
            </div>
            <div>
              <ul
                id="listExperiences"
                v-for="experience in liste.lesExperiences.slice(0, 5)"
                :key="experience.id"
              >
                <li class="modelExperiences">
                  <div class="modelExperiences-btn">
                    <div class="large-grid-edit-del">
                      <div class="large-grid-edit-btn">
                        <router-link
                          :to="{
                            name: 'UpdateExperience',
                            params: { id: experience.id }
                          }"
                        >
                          <i class="fas fa-edit"></i>
                        </router-link>
                      </div>
                      <div class="large-grid-del-btn">
                        <router-link
                          :to="{
                            name: 'DeleteExperience',
                            params: { id: experience.id }
                          }"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </router-link>
                      </div>
                    </div>
                    <div class="modelExperiences-years">
                      <span> {{ experience.debut }} </span>
                      <span> {{ experience.fin }} </span>
                    </div>
                  </div>
                  <div class="modelExperiences-info">
                    <h4>{{ experience.experience }}</h4>

                    <p class="modelExperiences-info-company">
                      {{ experience.entreprise }},
                      {{ experience.leLieu.ville }},
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
        <a :href="liste.website" target="_blank">Aline Fierobe</a> &copy; 2021
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

<style></style>
