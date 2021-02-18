<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';

if(isset($_POST["diplome"])){
    
    $sql = "INSERT INTO diplome(DIPLOME_diplome, ECOLE_diplome, ANNEE_diplome, ID_LIEU_lieu) VALUES(? , ? , ? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['diplome']);
    $requete->bindParam(2, $_POST['ecole']);
    $requete->bindParam(3, $_POST['annee']);
    $requete->bindParam(4, $_POST['lieu']);
    echo $requete->execute();

    // Get the new diplome ID
    $sql2 = "SELECT ID_DIPLOME_diplome 
    FROM diplome
    WHERE DIPLOME_diplome = ?";
    $requete2 = $pdo->prepare($sql2);
    $requete2->bindParam(1, $_POST['diplome']);
    echo $requete2->execute();

    $theID = $requete2->fetch()[0];

    // Create the relation between the new diplome and the main person
    $sql3 = "INSERT INTO a_etudie(ID_DIPLOME_diplome, ID_PERSONNE_personne) VALUE(? , 1)";
    $requete3 = $pdo->prepare($sql3);
    $requete3->bindParam(1, $theID);
    echo $requete3->execute();

}else{
    echo -1;
}