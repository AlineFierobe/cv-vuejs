// link to back end
const host = "http://localhost:8888/Formation/myCV-VueJS/backend/";

export default {
  // all programs needed
  // for personne
  listPersonne: host + "listPersonne.php",
  updatePersonne: host + "updatePersonne.php",
  getPersonne: host + "getPersonne.php",

  // for competence
  listCompetence: host + "listCompetence.php",
  createCompetence: host + "createCompetence.php",
  updateCompetence: host + "updateCompetence.php",
  deleteCompetence: host + "deleteCompetence.php",
  getCompetence: host + "getCompetence.php",

  // for diplome
  listDiplome: host + "listDiplome.php",
  createDiplome: host + "createDiplome.php",
  updateDiplome: host + "updateDiplome.php",
  deleteDiplome: host + "deleteDiplome.php",
  getDiplome: host + "getDiplome.php",

  // for experience
  listExperience: host + "listExperience.php",
  createExperience: host + "createExperience.php",
  updateExperience: host + "updateExperience.php",
  deleteExperience: host + "deleteExperience.php",
  getExperience: host + "getExperience.php",

  // for langue
  listLangue: host + "listLangue.php",
  createLangue: host + "createLangue.php",
  updateLangue: host + "updateLangue.php",
  deleteLangue: host + "deleteLangue.php",
  getLangue: host + "getLangue.php",

  // for lieu
  listLieu: host + "listLieu.php",
  createLieu: host + "createLieu.php",
  getLieu: host + "getLieu.php",

  // for travail
  listTravail: host + "listTravail.php",
  updateTravail: host + "updateTravail.php",
  getTravail: host + "getTravail.php"
};
