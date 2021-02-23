<?php
require_once('class.Personne.php');
require_once('class.Lieu.php');


class Diplome implements JsonSerializable
{
    private $id = 0;
    private $diplome = null;
    private $ecole = null;
    private $annee = null;
    
    private $leLieu = null;
    private $lesPersonnes = array();
    
    // CONSTRUCTOR
    function __construct($id, $diplome, $ecole, $annee) {
        $this->id = $id;
        $this->diplome = $diplome;
        $this->ecole = $ecole;
        $this->annee = $annee;
    }
    
    // GETTER
    function getId() {              return $this->id;}
    function getDiplome() {         return $this->diplome;}
    function getEcole() {           return $this->ecole;}
    function getAnnee() {           return $this->annee;}

    function getLeLieu() {          return $this->leLieu;}
    function getLesPersonnes() {    return $this->lesPersonnes;}

    
    // SETTER
    function setId($id): void {                         $this->id = $id;}
    function setDiplome($diplome): void {               $this->diplome = $diplome;}
    function setEcole($ecole): void {                   $this->ecole = $ecole;}
    function setAnnee($annee): void {                   $this->annee = $annee;}

    function setLeLieu($leLieu): void {                 $this->leLieu = $leLieu;}
    function setLesPersonnes($lesPersonnes): void {     $this->lesPersonnes = $lesPersonnes;}

    public function jsonSerialize(){ return get_object_vars($this); }
}
?>