<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Diplome
$sql = "SELECT diplome.ID_DIPLOME_diplome, lieu.ID_LIEU_lieu, DIPLOME_diplome, ECOLE_diplome, ANNEE_diplome, VILLE_lieu, PAYS_lieu
        FROM personne, lieu, diplome, a_etudie
        WHERE personne.ID_PERSONNE_personne = a_etudie.ID_PERSONNE_personne 
        AND lieu.ID_LIEU_lieu = diplome.ID_LIEU_lieu
        AND a_etudie.ID_DIPLOME_diplome = diplome.ID_DIPLOME_diplome";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Diplome object
        $diplome = new Diplome (
            $mydata['ID_DIPLOME_diplome'],
            $mydata['DIPLOME_diplome'],
            $mydata['ECOLE_diplome'],
            $mydata['ANNEE_diplome'],
        );

        // create Lieu object
        $lieu = new Lieu(
            $mydata['ID_LIEU_lieu'],
            $mydata['VILLE_lieu'],
            $mydata['PAYS_lieu']
        );
        
        // set Lieu to Diplome
        $diplome->setLeLieu($lieu);
        
        // add Diplome to the list
        $list[] = $diplome;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>