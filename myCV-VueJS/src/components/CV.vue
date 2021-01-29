<template>
  <div>
    <div>
      <!-- HEADER WITH NAME AND SEARCHED POSITION -->
      <header class="header">
        <h1>PRENOM NOM</h1>
        <h2>POSTE</h2>
      </header>
      <main class="main">
        <!-- ASIDE -->
        <aside>
          <!-- CONTACT -->
          <div class="contact">
            <p class="contact-dispo">DISPO</p>
            <p class="contact-mobilite">MOBILITE</p>
            <h3 class="title">contact</h3>
            <address class="contact-address">ADRESSE</address>
            <p class="contact-email">EMAIL</p>
            <p class="contact-phone">TELEPHONE</p>
          </div>

          <!-- SKILLS -->
          <h3 class="title">skills</h3>
          <ul id="listSkills">
            <li class="modelSkills">
              <h4>COMPETENCE</h4>
              <div class="skills-progress">
                <div
                  class="skills-progress-bar"
                  style="width:  NIVEAU  ;"
                ></div>
              </div>
            </li>
          </ul>

          <!-- LANGUAGES -->
          <h3 class="title">languages</h3>
          <ul id="listLanguages">
            <li class="modelLanguages">
              <h4>LANGUE</h4>
              <p>NIVEAU</p>
            </li>
          </ul>

          <!-- ONLINE -->
          <h3 class="title">online</h3>
          <div class="listOnline">
            <ul>
              <li>
                <a href="https:// WEBSITE"
                  ><i class="fas fa-globe"></i> WEBSITE
                </a>
              </li>
              <li>
                <a href=" GITHUB"
                  ><i class="fab fa-github"></i> github.com/ PRENOM NOM
                </a>
              </li>
              <li>
                <a href=" LINKEDIN"
                  ><i class="fab fa-linkedin"></i> PRENOM NOM
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
            <p>PRESENTATION</p>
          </article>

          <!-- DEGREES -->
          <article class="degrees">
            <h3 class="title">degrees</h3>
            <div>
              <ul id="listDegrees">
                <li class="modelDegrees">
                  <h4>DIPLOME</h4>
                  <p class="modelDegrees-school">
                    ECOLE , VILLE , <span> PAYS </span>
                  </p>
                  <p class="modelDegrees-year">ANNEE</p>
                </li>
              </ul>
            </div>
          </article>

          <!-- EXPERIENCES -->
          <article class="experiences">
            <h3 class="title">experiences</h3>
            <div>
              <ul id="listExperiences">
                <li class="modelExperiences">
                  <div class="modelExperiences-years">
                    <span> DEBUT </span> <span> FIN </span>
                  </div>
                  <div class="modelExperiences-info">
                    <h4>POSTE</h4>
                    <p class="modelExperiences-info-company">
                      ENTREPRISE , VILLE , <span> PAYS </span>
                    </p>
                    <p class="modelExperiences-info-description">
                      DESCRIPTION
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
  created() {
    ajaxService
      .getList("listPersonne")
      .then(promise => {
        this.liste = promise;
        console.log("Liste Personne ", this.liste);
      })
      .catch(error => console.log(error));
  }
};
</script>

<style></style>
