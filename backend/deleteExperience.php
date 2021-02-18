<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // delete the experience
        $sql = "DELETE FROM experience WHERE ID_EXPERIENCE_experience = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id experience
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // delete the relation
        $sql2 = "DELETE FROM a_travaille WHERE ID_EXPERIENCE_experience = ? ";
        // prepare the request
        $requete2 = $pdo->prepare($sql2);
        // parameters : id experience
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>