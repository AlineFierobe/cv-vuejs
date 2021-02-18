<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Suppression de la experience
        $sql = "DELETE FROM experience WHERE ID_EXPERIENCE_experience = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : id de l'expérience
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // Suppression de la liaison avec la personne
        $sql2 = "DELETE FROM a_travaille WHERE ID_EXPERIENCE_experience = ? ";
        // Préparation de la requête
        $requete2 = $pdo->prepare($sql2);
        // paramètres : id de l'expérience
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>