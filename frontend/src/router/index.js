import Vue from "vue";
import Router from "vue-router";

import CV from "@/components/CV";
import Admin from "@/components/Admin";

import CreatePersonne from "@/components/personne/Create";
import UpdateName from "@/components/personne/UpdateName";
import UpdateTravail from "@/components/personne/UpdateTravail";
import UpdateContact from "@/components/personne/UpdateContact";
import UpdateOnline from "@/components/personne/UpdateOnline";
import UpdateAboutMe from "@/components/personne/UpdateAboutMe";

import CreateDiplome from "@/components/diplome/Create";
import UpdateDiplome from "@/components/diplome/Update";
import DeleteDiplome from "@/components/diplome/Delete";

import CreateExperience from "@/components/experience/Create";
import UpdateExperience from "@/components/experience/Update";
import DeleteExperience from "@/components/experience/Delete";

import CreateCompetence from "@/components/competence/Create";
import UpdateCompetence from "@/components/competence/Update";
import DeleteCompetence from "@/components/competence/Delete";

import CreateLangue from "@/components/langue/Create";
import UpdateLangue from "@/components/langue/Update";
import DeleteLangue from "@/components/langue/Delete";

import CreateLieu from "@/components/lieu/Create";

Vue.use(Router);

export default new Router({
  routes: [
    { path: "/", name: "CV", component: CV },

    // ADMIN PAGE WITH CRUD BUTTONS
    { path: "/admin", name: "Admin", component: Admin },

    // PERSONNE
    {
      path: "/createPersonne",
      name: "CreatePersonne",
      component: CreatePersonne
    },
    // UPDATE CONTACT FOR PERSONNE
    {
      path: "/updateContact",
      name: "UpdateContact",
      component: UpdateContact
    },
    // UPDATE PRENOM NOM FOR PERSONNE
    {
      path: "/updateName",
      name: "UpdateName",
      component: UpdateName
    },
    // UPDATE ABOUT ME FOR PERSONNE
    {
      path: "/updateAboutMe",
      name: "UpdateAboutMe",
      component: UpdateAboutMe
    },
    // UPDATE ONLINE FOR PERSONNE
    {
      path: "/updateOnline",
      name: "UpdateOnline",
      component: UpdateOnline
    },
    // UPDATE TRAVAIL FOR PERSONNE
    {
      path: "/updateTravail",
      name: "UpdateTravail",
      component: UpdateTravail
    },

    // DIPLOME
    { path: "/createDiplome", name: "CreateDiplome", component: CreateDiplome },
    {
      path: "/updateDiplome/:id",
      name: "UpdateDiplome",
      component: UpdateDiplome
    },
    {
      path: "/deleteDiplome/:id",
      name: "DeleteDiplome",
      component: DeleteDiplome
    },

    // EXPERIENCE
    {
      path: "/createExperience",
      name: "CreateExperience",
      component: CreateExperience
    },
    {
      path: "/updateExperience/:id",
      name: "UpdateExperience",
      component: UpdateExperience
    },
    {
      path: "/deleteExperience/:id",
      name: "DeleteExperience",
      component: DeleteExperience
    },

    // COMPETENCE
    {
      path: "/createCompetence",
      name: "CreateCompetence",
      component: CreateCompetence
    },
    {
      path: "/updateCompetence/:id",
      name: "UpdateCompetence",
      component: UpdateCompetence
    },
    {
      path: "/deleteCompetence/:id",
      name: "DeleteCompetence",
      component: DeleteCompetence
    },

    // LANGUE
    { path: "/createLangue", name: "CreateLangue", component: CreateLangue },
    {
      path: "/updateLangue/:id",
      name: "UpdateLangue",
      component: UpdateLangue
    },
    {
      path: "/deleteLangue/:id",
      name: "DeleteLangue",
      component: DeleteLangue
    },

    // LIEU
    { path: "/createLieu", name: "CreateLieu", component: CreateLieu }
  ]
});
