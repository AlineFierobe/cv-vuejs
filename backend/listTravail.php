<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Travail
$sql = "SELECT travail.ID_TRAVAIL_travail, POSTE_travail, DISPONIBILITE_travail ,MOBILITE_travail 
        FROM personne, travail, recherche
        WHERE personne.ID_PERSONNE_personne = recherche.ID_PERSONNE_personne 
        AND travail.ID_TRAVAIL_travail = recherche.ID_TRAVAIL_travail";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Travail object
        $travail = new Travail(
            $mydata['ID_TRAVAIL_travail'],
            $mydata['POSTE_travail'],
            $mydata['DISPONIBILITE_travail'],
            $mydata['MOBILITE_travail']
        );
        // add Travail to the list
        $list[] = $travail;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>