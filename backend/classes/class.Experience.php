<?php
require_once('class.Personne.php');
require_once('class.Lieu.php');

class Experience implements JsonSerializable
{
    private $id = 0;
    private $experience = null;
    private $entreprise = null;
    private $debut = null;
    private $fin = null;
    private $description = null;
    
    private $leLieu = array();
    private $lesPersonnesTravaillent = array();
    
    // CONSTRUCTOR
    function __construct($id, $experience, $entreprise, $debut, $fin, $description) {
        $this->id = $id;
        $this->experience = $experience;
        $this->entreprise = $entreprise;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->description = $description;
    }
    
    // GETTER
    function getId() {                              return $this->id;}
    function getExperience() {                      return $this->experience;}
    function getEntreprise() {                      return $this->entreprise;}
    function getDebut() {                           return $this->debut;}
    function getFin() {                             return $this->fin;}
    function getDescription() {                     return $this->description;}

    function getLeLieu() {                          return $this->leLieu;}
    function getLesPersonnesTravaillent() {         return $this->lesPersonnesTravaillent;}

    
    // SETTER
    function setId($id): void {                                             $this->id = $id;}
    function setExperience($experience): void {                             $this->experience = $experience;}
    function setEntreprise($entreprise): void {                             $this->entreprise = $entreprise;}
    function setDebut($debut): void {                                       $this->debut = $debut;}
    function setFin($fin): void {                                           $this->fin = $fin;}
    function setDescription($description): void {                           $this->description = $description;}

    function setLeLieu($leLieu): void {                                     $this->leLieu = $leLieu;}
    function setLesPersonnesTravaillent($lesPersonnesTravaillent): void {   $this->lesPersonnesTravaillent = $lesPersonnesTravaillent;}

    public function jsonSerialize(){ return get_object_vars($this); }
}

?>