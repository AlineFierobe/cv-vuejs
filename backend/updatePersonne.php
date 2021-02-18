<?php
    header("Access-Control-Allow-Origin: *");

    require_once 'cnx.php';    
    
    if(isset($_POST['id'])){
        // Modification de la competence
        $sql = "UPDATE personne SET PRENOM_personne = ?, NOM_personne = ?, ADRESSE_personne = ?, TELEPHONE_personne = ?, EMAIL_personne = ?, PRESENTATION_personne = ?, WEBSITE_personne = ?, GITHUB_personne = ?, LINKEDIN_personne = ? WHERE ID_PERSONNE_personne = 1 ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // paramètres : competence, niveau et id de la compétence
        $requete->bindValue(1, $_POST['prenom']);
        $requete->bindValue(2, $_POST['nom']);
        $requete->bindValue(3, $_POST['adresse']);
        $requete->bindValue(4, $_POST['telephone']);
        $requete->bindValue(5, $_POST['email']);
        $requete->bindValue(6, $_POST['presentation']);
        $requete->bindValue(7, $_POST['website']);
        $requete->bindValue(8, $_POST['github']);
        $requete->bindValue(9, $_POST['linkedin']);
        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>