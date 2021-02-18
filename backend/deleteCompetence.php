<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Suppression de la competence
        $sql = "DELETE FROM competence WHERE ID_COMPETENCE_competence = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : id de la compétence
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // Suppression de la liaison avec la personne
        $sql2 = "DELETE FROM maitrise WHERE ID_COMPETENCE_competence = ? ";
        // Préparation de la requête
        $requete2 = $pdo->prepare($sql2);
        // paramètres : id de la compétence
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>