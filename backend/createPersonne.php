<?php
header("Access-Control-Allow-Origin: *");

require_once 'cnx.php';


if(isset($_POST["prenom"])){
    
    $sql = "INSERT INTO personne (PRENOM_personne, NOM_personne, ADRESSE_personne, TELEPHONE_personne, PRESENTATION_personne, EMAIL_personne, WEBSITE_personne, GITHUB_personne, LINKEDIN_personne, POSTE_personne, DISPO_personne, MOBILITE_personne ) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['prenom']);
    $requete->bindParam(2, $_POST['nom']);
    $requete->bindParam(3, $_POST['adresse']);
    $requete->bindParam(4, $_POST['telephone']);
    $requete->bindParam(5, $_POST['presentation']);
    $requete->bindParam(6, $_POST['email']);
    $requete->bindParam(7, $_POST['website']);
    $requete->bindParam(8, $_POST['github']);
    $requete->bindParam(9, $_POST['linkedin']);
    $requete->bindParam(10, $_POST['poste']);
    $requete->bindParam(11, $_POST['dispo']);
    $requete->bindParam(12, $_POST['mobilite']);
    echo $requete->execute();


}else{
    echo -1;
}