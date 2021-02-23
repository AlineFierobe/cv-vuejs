<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the personne
        $sql = "UPDATE personne SET  ADRESSE_personne = ?, TELEPHONE_personne = ?, EMAIL_personne = ? WHERE ID_PERSONNE_personne = 1 ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from personne
        $requete->bindValue(1, $_POST['adresse']);
        $requete->bindValue(2, $_POST['telephone']);
        $requete->bindValue(3, $_POST['email']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>