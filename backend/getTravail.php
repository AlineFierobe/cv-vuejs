<?php
header("Access-Control-Allow-Origin: *");

require_once('cnx.php');
require_once('classes/class.Personne.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get travail ID in database
    $sql = "SELECT * 
            FROM travail 
            WHERE ID_TRAVAIL_travail = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : travail's id
    $request->bindValue(1, $_POST['id']);

    // create a travail of null
    $travail = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $travail = new Travail(
                $mydata['ID_TRAVAIL_travail'],
                $mydata['POSTE_travail'],
                $mydata['DISPONIBILITE_travail'],
                $mydata['MOBILITE_travail']
            );
        };
    };

echo json_encode($travail);

} else {
    echo -1;
}
?>