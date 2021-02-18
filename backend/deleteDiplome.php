<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // delete the diplome
        $sql = "DELETE FROM diplome WHERE ID_DIPLOME_diplome = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id diplome
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // delete the relation
        $sql2 = "DELETE FROM a_etudie WHERE ID_DIPLOME_diplome = ? ";
        // prepare the request
        $requete2 = $pdo->prepare($sql2);
        // parameters : id diplome
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>