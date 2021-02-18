<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the langue
        $sql = "UPDATE langue SET LANGUE_langue = ?, NIVEAU_langue = ? WHERE ID_LANGUE_langue = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : langue
        $requete->bindValue(1, $_POST['langue']);
        $requete->bindValue(2, $_POST['niveau']);
        $requete->bindValue(3, $_POST['id']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>