<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Suppression de la langue
        $sql = "DELETE FROM langue WHERE ID_LANGUE_langue = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : id de la compétence
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // Suppression de la liaison avec la personne
        $sql2 = "DELETE FROM parle WHERE ID_LANGUE_langue = ? ";
        // Préparation de la requête
        $requete2 = $pdo->prepare($sql2);
        // paramètres : id de la compétence
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>