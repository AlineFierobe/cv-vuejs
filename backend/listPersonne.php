<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');


// List of Personne
$sql = "SELECT *
        FROM personne";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Personne object
        $personne = new Personne(
            $mydata['ID_PERSONNE_personne'],
            $mydata['PRENOM_personne'],
            $mydata['NOM_personne'],
            $mydata['ADRESSE_personne'],
            $mydata['TELEPHONE_personne'],
            $mydata['EMAIL_personne'],
            $mydata['PRESENTATION_personne'],
            $mydata['WEBSITE_personne'],
            $mydata['GITHUB_personne'],
            $mydata['LINKEDIN_personne'],
            $mydata['POSTE_personne'],
            $mydata['DISPO_personne'],
            $mydata['MOBILITE_personne']
        );

        // get Diplome for this Personne
        $sql = "SELECT diplome.ID_DIPLOME_diplome, lieu.ID_LIEU_lieu, DIPLOME_diplome, ECOLE_diplome, ANNEE_diplome, VILLE_lieu, PAYS_lieu
                FROM personne, lieu, diplome, a_etudie
                WHERE a_etudie.ID_PERSONNE_personne = ?
                AND lieu.ID_LIEU_lieu = diplome.ID_LIEU_lieu
                AND a_etudie.ID_DIPLOME_diplome = diplome.ID_DIPLOME_diplome
                ORDER BY diplome.ID_DIPLOME_diplome DESC";

        // prepare SQL request
        $requestDiplome = $pdo->prepare($sql);
        // set param
        $requestDiplome->bindValue(1,$personne->getId());
        // list Diplome
        $listDiplome = array();
        // if SQL request get data 
        if($requestDiplome->execute()){
            // check result
            while($mydataDiplome = $requestDiplome->fetch()){
                // create Diplome object
                $diplome = new Diplome (
                    $mydataDiplome['ID_DIPLOME_diplome'],
                    $mydataDiplome['DIPLOME_diplome'],
                    $mydataDiplome['ECOLE_diplome'],
                    $mydataDiplome['ANNEE_diplome'],
                );
        
                // create Lieu object
                $lieu = new Lieu(
                    $mydataDiplome['ID_LIEU_lieu'],
                    $mydataDiplome['VILLE_lieu'],
                    $mydataDiplome['PAYS_lieu']
                );
                // set Lieu to Diplome
                $diplome->setLeLieu($lieu);

                // add Diplome to the list
                $listDiplome[] = $diplome;
            }
        }


        // get Experience for this Personne
        $sql = "SELECT experience.ID_EXPERIENCE_experience, lieu.ID_LIEU_lieu, EXPERIENCE_experience, ENTREPRISE_experience, DATE_DEBUT_experience, DATE_FIN_experience, DESCRIPTION_experience ,VILLE_lieu, PAYS_lieu
                FROM personne, lieu, experience, a_travaille
                WHERE a_travaille.ID_PERSONNE_personne = ?
                AND lieu.ID_LIEU_lieu = experience.ID_LIEU_lieu
                AND a_travaille.ID_EXPERIENCE_experience = experience.ID_EXPERIENCE_experience
                ORDER BY experience.ID_EXPERIENCE_experience DESC";

        // prepare SQL request
        $requestExperience = $pdo->prepare($sql);
        // set param
        $requestExperience->bindValue(1,$personne->getId());
        // list Experience
        $listExperience = array();
        // if SQL request get data 
        if($requestExperience->execute()){
            // check result
            while($mydataExperience = $requestExperience->fetch()){
                // create Experience object
                $experience = new Experience (
                    $mydataExperience['ID_EXPERIENCE_experience'],
                    $mydataExperience['EXPERIENCE_experience'],
                    $mydataExperience['ENTREPRISE_experience'],
                    $mydataExperience['DATE_DEBUT_experience'],
                    $mydataExperience['DATE_FIN_experience'],
                    $mydataExperience['DESCRIPTION_experience']
                );

                // create Lieu Object
                $lieu = new Lieu(
                    $mydataExperience['ID_LIEU_lieu'],
                    $mydataExperience['VILLE_lieu'],
                    $mydataExperience['PAYS_lieu']
                );

                // set Lieu to Experience
                $experience->setLeLieu($lieu);

                // add Experience to the list
                $listExperience[] = $experience;
            }
        }


        // get Competence for this Personne
        $sql = "SELECT competence.ID_COMPETENCE_competence, COMPETENCE_competence, NIVEAU_competence 
                FROM personne, competence, maitrise 
                WHERE maitrise.ID_PERSONNE_personne = ?
                AND maitrise.ID_COMPETENCE_competence = competence.ID_COMPETENCE_competence
                ORDER BY competence.ID_COMPETENCE_competence ASC";

        // prepare SQL request
        $requestCompetence = $pdo->prepare($sql);
        // set param
        $requestCompetence->bindValue(1,$personne->getId());
        // list Competence
        $listCompetence = array();
        // if SQL request get data 
        if($requestCompetence->execute()){
            // check result
            while($mydataCompetence = $requestCompetence->fetch()){
                // create Competence object
                $competence = new Competence (
                    $mydataCompetence['ID_COMPETENCE_competence'],
                    $mydataCompetence['COMPETENCE_competence'],
                    $mydataCompetence['NIVEAU_competence']
                );
                // add Competence to the list
                $listCompetence[] = $competence;
            }
        }


        // get Langue for this Personne
        $sql = "SELECT langue.ID_LANGUE_langue, LANGUE_langue, NIVEAU_langue 
                FROM personne, langue, parle 
                WHERE parle.ID_PERSONNE_personne = ?
                AND parle.ID_LANGUE_langue = langue.ID_LANGUE_langue
                ORDER BY langue.ID_LANGUE_langue ASC";

        // prepare SQL request
        $requestLangue = $pdo->prepare($sql);
        // set param
        $requestLangue->bindValue(1,$personne->getId());
        // list Langue
        $listLangue = array();
        // if SQL request get data 
        if($requestLangue->execute()){
            // check result
            while($mydataLangue = $requestLangue->fetch()){
                // create Experience object
                // create Competence object
                $langue = new Langue(
                    $mydataLangue['ID_LANGUE_langue'],
                    $mydataLangue['LANGUE_langue'],
                    $mydataLangue['NIVEAU_langue']
                );
                // add Langue to the list
                $listLangue[] = $langue;
            }
        }
 
        // set List Diplome to Personne
        $personne->setLesDiplomes($listDiplome);

        // set List Experience to Personne
        $personne->setLesExperiences($listExperience);

        // set List Competence to Personne
        $personne->setLesCompetences($listCompetence);

        // set List Langue to Personne
        $personne->setLesLangues($listLangue);

        // add Personne to the list
        $list[] = $personne;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>