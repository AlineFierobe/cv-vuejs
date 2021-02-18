<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';


if(isset($_POST["competence"])){
    
    $sql = "INSERT INTO `competence` (`COMPETENCE_competence`, `NIVEAU_competence`) VALUES(? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['competence']);
    $requete->bindParam(2, $_POST['niveau']);
    echo $requete->execute();

    // Get the new competence ID
    $sql2 = "SELECT ID_COMPETENCE_competence 
    FROM competence
    WHERE COMPETENCE_competence = ?";
    $requete2 = $pdo->prepare($sql2);
    $requete2->bindParam(1, $_POST['competence']);
    echo $requete2->execute();

    $theID = $requete2->fetch()[0];

    // Create the relation between the new competence and the main person
    $sql3 = "INSERT INTO maitrise(ID_COMPETENCE_competence, ID_PERSONNE_personne) VALUE(? , 1)";
    $requete3 = $pdo->prepare($sql3);
    $requete3->bindParam(1, $theID);
    echo $requete3->execute();

}else{
    echo -1;
}