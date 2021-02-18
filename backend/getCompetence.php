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

    // get competence ID in database
    $sql = "SELECT * 
            FROM competence 
            WHERE ID_COMPETENCE_competence = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : competence's id
    $request->bindValue(1, $_POST['id']);

    // create a competence of null
    $competence = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $competence = new Competence (
                $mydata['ID_COMPETENCE_competence'],
                $mydata['COMPETENCE_competence'],
                $mydata['NIVEAU_competence']
            );
        };
    };

echo json_encode($competence);

} else {
    echo -1;
}
?>