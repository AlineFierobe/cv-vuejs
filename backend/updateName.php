<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the personne
        $sql = "UPDATE personne SET PRENOM_personne = ?, NOM_personne = ? WHERE ID_PERSONNE_personne = 1 ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from personne
        $requete->bindValue(1, $_POST['prenom']);
        $requete->bindValue(2, $_POST['nom']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>