// link to back end
const host = "http://localhost:8888/Formation/myCV-VueJS-3/backend/";

export default {
  // all programs needed
  // for personne
  listPersonne: host + "listPersonne.php",
  createPersonne: host + "createPersonne.php",
  updateName: host + "updateName.php",
  updateOnline: host + "updateOnline.php",
  updateAboutMe: host + "updateAboutMe.php",
  updateContact: host + "updateContact.php",
  updateTravail: host + "updateTravail.php",
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
  getLieu: host + "getLieu.php"
};
