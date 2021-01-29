<?php
require_once('class.Diplome.php');
require_once('class.Experience.php');

class Lieu implements JsonSerializable
{
    private $id = 0;
    private $ville = null;
    private $pays = null;
    
    private $lesDiplomes = array();
    private $lesExperiences = array();
    
    // CONSTRUCTOR
    function __construct($id, $ville, $pays) {
        $this->id = $id;
        $this->ville = $ville;
        $this->pays = $pays;
    }

    
    // GETTER
    function getId() {                      return $this->id;}
    function getVille() {                   return $this->ville;}
    function getPays() {                    return $this->pays;}
    
    function getLesDiplomes() {             return $this->lesDiplomes;}
    function getLesExperiences() {          return $this->lesExperiences;}

        
    //SETTER
    function setId($id): void {             $this->id = $id;}
    function setVille($ville): void {       $this->ville = $ville;}
    function setPays($pays): void {         $this->pays = $pays;}

    function setLesDiplomes($lesDiplomes): void {       $this->lesDiplomes = $lesDiplomes;}
    function setLesExperiences($lesExperiences): void { $this->lesExperiences = $lesExperiences;}

    public function jsonSerialize(){ return get_object_vars($this); }
}

?>