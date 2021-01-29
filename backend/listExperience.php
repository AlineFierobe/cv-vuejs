<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Experience
$sql = "SELECT experience.ID_EXPERIENCE_experience, lieu.ID_LIEU_lieu, EXPERIENCE_experience, ENTREPRISE_experience, DATE_DEBUT_experience, DATE_FIN_experience, DESCRIPTION_experience ,VILLE_lieu, PAYS_lieu
        FROM personne, lieu, experience, a_travaille
        WHERE personne.ID_PERSONNE_personne = a_travaille.ID_PERSONNE_personne 
        AND lieu.ID_LIEU_lieu = experience.ID_LIEU_lieu
        AND a_travaille.ID_EXPERIENCE_experience = experience.ID_EXPERIENCE_experience";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Experience object
        $experience = new Experience (
            $mydata['ID_EXPERIENCE_experience'],
            $mydata['EXPERIENCE_experience'],
            $mydata['ENTREPRISE_experience'],
            $mydata['DATE_DEBUT_experience'],
            $mydata['DATE_FIN_experience'],
            $mydata['DESCRIPTION_experience']
        );

        // create Lieu Object
        $lieu = new Lieu(
            $mydata['ID_LIEU_lieu'],
            $mydata['VILLE_lieu'],
            $mydata['PAYS_lieu']
        );

        // set Lieu to Experience
        $experience->setLeLieu($lieu);

        // add Experience to the list
        $list[] = $experience;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>