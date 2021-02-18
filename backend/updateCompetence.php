<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the competence
        $sql = "UPDATE competence SET COMPETENCE_competence = ?, NIVEAU_competence = ? WHERE ID_COMPETENCE_competence = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters competence
        $requete->bindValue(1, $_POST['competence']);
        $requete->bindValue(2, $_POST['niveau']);
        $requete->bindValue(3, $_POST['id']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>