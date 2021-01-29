<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Competence
$sql = "SELECT competence.ID_COMPETENCE_competence, COMPETENCE_competence, NIVEAU_competence 
        FROM personne, competence, maitrise 
        WHERE personne.ID_PERSONNE_personne = maitrise.ID_PERSONNE_personne 
        AND maitrise.ID_COMPETENCE_competence = competence.ID_COMPETENCE_competence";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Competence object
        $competence = new Competence (
            $mydata['ID_COMPETENCE_competence'],
            $mydata['COMPETENCE_competence'],
            $mydata['NIVEAU_competence']
        );
        // add Competence to the list
        $list[] = $competence;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>