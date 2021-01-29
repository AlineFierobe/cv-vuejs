<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Langue
$sql = "SELECT langue.ID_LANGUE_langue, LANGUE_langue, NIVEAU_langue 
        FROM personne, langue, parle 
        WHERE personne.ID_PERSONNE_personne = parle.ID_PERSONNE_personne 
        AND parle.ID_LANGUE_langue = langue.ID_LANGUE_langue";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Langue object
        $langue = new Langue(
            $mydata['ID_LANGUE_langue'],
            $mydata['LANGUE_langue'],
            $mydata['NIVEAU_langue']
        );
        // add Langue to the list
        $list[] = $langue;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>