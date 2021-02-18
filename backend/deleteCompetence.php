<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // delete the competence
        $sql = "DELETE FROM competence WHERE ID_COMPETENCE_competence = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id competence
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();


        // delete the relation
        $sql2 = "DELETE FROM maitrise WHERE ID_COMPETENCE_competence = ? ";
        // prepare the request
        $requete2 = $pdo->prepare($sql2);
        // parameters : id competence
        $requete2->bindValue(1, $_POST['id']);
        $requete2->execute();
        
    }else{
        echo -1;
    }
    
?>