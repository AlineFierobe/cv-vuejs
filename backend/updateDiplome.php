<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the diplome
        $sql = "UPDATE diplome SET DIPLOME_diplome = ?, ECOLE_diplome = ?, ANNEE_diplome = ?, ID_LIEU_lieu = ? WHERE ID_diplome_diplome = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters diplome
        $requete->bindValue(1, $_POST['diplome']);
        $requete->bindValue(2, $_POST['ecole']);
        $requete->bindValue(3, $_POST['annee']);
        $requete->bindValue(4, $_POST['lieu']);
        $requete->bindValue(5, $_POST['id']);
        echo $requete->execute();


    }else{
        echo -1;
    }
    ?>