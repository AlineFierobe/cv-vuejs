<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // update the travail
        $sql = "UPDATE travail SET POSTE_travail = ?, DISPONIBILITE_travail = ?, MOBILITE_travail = ? WHERE ID_TRAVAIL_travail = 1 ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : travail
        $requete->bindValue(1, $_POST['poste']);
        $requete->bindValue(2, $_POST['disponibilite']);
        $requete->bindValue(3, $_POST['mobilite']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>