<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the personne
        $sql = "UPDATE personne SET WEBSITE_personne = ?, GITHUB_personne = ?, LINKEDIN_personne = ?WHERE ID_PERSONNE_personne = 1 ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from personne
        $requete->bindValue(1, $_POST['website']);
        $requete->bindValue(2, $_POST['github']);
        $requete->bindValue(3, $_POST['linkedin']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>