<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';

if(isset($_POST["experience"])){
    
    $sql = "INSERT INTO experience(EXPERIENCE_experience, ENTREPRISE_experience, DATE_DEBUT_experience, DATE_FIN_experience, DESCRIPTION_experience, ID_LIEU_lieu) VALUES(? , ? , ? , ? , ? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['experience']);
    $requete->bindParam(2, $_POST['entreprise']);
    $requete->bindParam(3, $_POST['debut']);
    $requete->bindParam(4, $_POST['fin']);
    $requete->bindParam(5, $_POST['description']);
    $requete->bindParam(6, $_POST['lieu']);
    echo $requete->execute();

    // Get the new experience ID
    $sql2 = "SELECT ID_EXPERIENCE_experience 
    FROM experience
    WHERE EXPERIENCE_experience = ?";
    $requete2 = $pdo->prepare($sql2);
    $requete2->bindParam(1, $_POST['experience']);
    echo $requete2->execute();

    $theID = $requete2->fetch()[0];

    // Create the relation between the new experience and the main person
    $sql3 = "INSERT INTO a_travaille(ID_EXPERIENCE_experience, ID_PERSONNE_personne) VALUE(? , 1)";
    $requete3 = $pdo->prepare($sql3);
    $requete3->bindParam(1, $theID);
    echo $requete3->execute();

}else{
    echo -1;
}