<?php
require_once('class.Personne.php');

class Competence implements JsonSerializable
{
    private $id = 0;
    private $competence = null;
    private $niveau = null;
    
    private $lesPersonnesMaitrisent = array();
    
    // CONSTRUCTOR
    function __construct($id, $competence, $niveau) {
        $this->id = $id;
        $this->competence = $competence;
        $this->niveau = $niveau;
    }

    // GETTER
    function getId() {                      return $this->id;}
    function getCompetence() {              return $this->competence;}
    function getNiveau() {                  return $this->niveau;}

    function getLesPersonnesMaitrisent() {  return $this->lesPersonnesMaitrisent;}


    // SETTER
    function setId($id): void {                     $this->id = $id;}
    function setCompetence($competence): void {     $this->competence = $competence;}
    function setNiveau($niveau): void {             $this->niveau = $niveau;}

    function setLesPersonnesMaitrisent($lesPersonnesMaitrisent): void { $this->lesPersonnesMaitrisent = $lesPersonnesMaitrisent;}
    

    public function jsonSerialize(){ return get_object_vars($this); }
}

?>