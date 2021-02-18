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

    // get experience ID in database
    $sql = "SELECT * 
            FROM experience, lieu
            WHERE ID_EXPERIENCE_experience = ?
            AND lieu.ID_LIEU_lieu = experience.ID_LIEU_lieu";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : experience's id
    $request->bindValue(1, $_POST['id']);

    // create a experience of null
    $experience = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $experience = new Experience (
                $mydata['ID_EXPERIENCE_experience'],
                $mydata['EXPERIENCE_experience'],
                $mydata['ENTREPRISE_experience'],
                $mydata['DATE_DEBUT_experience'],
                $mydata['DATE_FIN_experience'],
                $mydata['DESCRIPTION_experience'],
            );

            // create Lieu Object
            $lieu = new Lieu(
            $mydata['ID_LIEU_lieu'],
            $mydata['VILLE_lieu'],
            $mydata['PAYS_lieu']
            );

            // set Lieu to Experience
            $experience->setLeLieu($lieu);
        };
    };

echo json_encode($experience);

} else {
    echo -1;
}
?>