<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';

if(isset($_POST["ville"])){
    // Insert the new lieu in database
    $sql = "INSERT INTO lieu(VILLE_lieu, PAYS_lieu) VALUES(? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['ville']);
    $requete->bindParam(2, $_POST['pays']);
    echo $requete->execute();

}else{
    echo -1;
}
?>