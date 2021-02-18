<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Modification de la experience
        $sql = "UPDATE experience SET EXPERIENCE_experience = ?, ENTREPRISE_experience = ?, DATE_DEBUT_experience = ?, DATE_FIN_experience = ?, DESCRIPTION_experience = ?, ID_LIEU_lieu = ? WHERE ID_EXPERIENCE_experience = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres de l'expérience
        $requete->bindValue(1, $_POST['experience']);
        $requete->bindValue(2, $_POST['entreprise']);
        $requete->bindValue(3, $_POST['debut']);
        $requete->bindValue(4, $_POST['fin']);
        $requete->bindValue(5, $_POST['description']);
        $requete->bindValue(6, $_POST['lieu']);
        $requete->bindValue(7, $_POST['id']);
        echo $requete->execute();


    }else{
        echo -1;
    }
    ?>