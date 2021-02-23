<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the personne
        $sql = "UPDATE personne SET POSTE_personne = ?, DISPO_personne = ?, MOBILITE_personne = ? WHERE ID_PERSONNE_personne = 1 ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from personne
        $requete->bindParam(1, $_POST['poste']);
        $requete->bindParam(2, $_POST['dispo']);
        $requete->bindParam(3, $_POST['mobilite']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>