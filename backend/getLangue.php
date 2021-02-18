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

    // get langue ID in database
    $sql = "SELECT * 
            FROM langue 
            WHERE ID_LANGUE_langue = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : langue's id
    $request->bindValue(1, $_POST['id']);

    // create a langue of null
    $langue = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $langue = new Langue(
                $mydata['ID_LANGUE_langue'],
                $mydata['LANGUE_langue'],
                $mydata['NIVEAU_langue']
            );
        };
    };

echo json_encode($langue);

} else {
    echo -1;
}
?>