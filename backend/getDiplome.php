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

    // get diplome ID in database
    $sql = "SELECT * 
            FROM diplome, lieu
            WHERE ID_DIPLOME_diplome = ?
            AND lieu.ID_LIEU_lieu = diplome.ID_LIEU_lieu";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : diplome's id
    $request->bindValue(1, $_POST['id']);

    // create a diplome of null
    $diplome = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $diplome = new Diplome (
                $mydata['ID_DIPLOME_diplome'],
                $mydata['DIPLOME_diplome'],
                $mydata['ECOLE_diplome'],
                $mydata['ANNEE_diplome'],
            );
            // create Lieu Object
            $lieu = new Lieu(
            $mydata['ID_LIEU_lieu'],
            $mydata['VILLE_lieu'],
            $mydata['PAYS_lieu']
            );
    
            // set Lieu to Diplome
            $diplome->setLeLieu($lieu);
        };
    };

echo json_encode($diplome);

} else {
    echo -1;
}
?>