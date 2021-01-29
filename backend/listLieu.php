<?php
header("Access-Control-Allow-Origin: *");


require_once('cnx.php');
require_once('classes/class.Personne.php');

// List of Lieu
$sql = "SELECT lieu.ID_LIEU_lieu, VILLE_lieu, PAYS_lieu
        FROM lieu";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Lieu object
        $lieu = new Lieu (
            $mydata['ID_LIEU_lieu'],
            $mydata['VILLE_lieu'],
            $mydata['PAYS_lieu']
        );
        // add Lieu to the list
        $list[] = $lieu;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>