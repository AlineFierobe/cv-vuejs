<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Modification de la competence
        $sql = "UPDATE competence SET COMPETENCE_competence = ?, NIVEAU_competence = ? WHERE ID_COMPETENCE_competence = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : competence, niveau et id de la compétence
        $requete->bindValue(1, $_POST['competence']);
        $requete->bindValue(2, $_POST['niveau']);
        $requete->bindValue(3, $_POST['id']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>