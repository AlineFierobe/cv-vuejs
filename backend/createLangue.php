<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';

if(isset($_POST["langue"])){
    // Insert the new language in database
    $sql = "INSERT INTO langue(LANGUE_langue, NIVEAU_langue) VALUES(? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['langue']);
    $requete->bindParam(2, $_POST['niveau']);
    echo $requete->execute();

    // Get the new language ID
    $sql2 = "SELECT ID_LANGUE_langue 
            FROM langue
            WHERE LANGUE_langue = ?";
    $requete2 = $pdo->prepare($sql2);
    $requete2->bindParam(1, $_POST['langue']);
    echo $requete2->execute();

    $theID = $requete2->fetch()[0];

    // Create the relation between the new language and the main person
    $sql3 = "INSERT INTO parle(ID_LANGUE_langue, ID_PERSONNE_personne) VALUES(? , 1)";
    $requete3 = $pdo->prepare($sql3);
    $requete3->bindParam(1, $theID);
    echo $requete3->execute();

}else{
    echo -1;
}
?>