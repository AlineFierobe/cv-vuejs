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

    // get personne ID in database
    $sql = "SELECT * 
            FROM personne 
            WHERE ID_PERSONNE_personne = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : personne's id
    $request->bindValue(1, $_POST['id']);

    // create a personne of null
    $personne = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
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
        };
    };

echo json_encode($personne);

} else {
    echo -1;
}
?>