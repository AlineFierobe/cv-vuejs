<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Modification de la competence
        $sql = "UPDATE travail SET POSTE_travail = ?, DISPONIBILITE_travail = ?, MOBILITE_travail = ? WHERE ID_TRAVAIL_travail = 1 ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : competence, niveau et id de la compétence
        $requete->bindValue(1, $_POST['poste']);
        $requete->bindValue(2, $_POST['disponibilite']);
        $requete->bindValue(3, $_POST['mobilite']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>