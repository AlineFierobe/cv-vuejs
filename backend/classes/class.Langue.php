<?php
require_once('class.Personne.php');

class Langue implements JsonSerializable
{
    private $id = 0;
    private $langue = null;
    private $niveau = null;
    
    private $lesPersonnesParlent = array();
    
    
    // CONSTRUCTOR
    function __construct($id, $langue, $niveau) {
        $this->id = $id;
        $this->langue = $langue;
        $this->niveau = $niveau;
    }

    // GETTER
    function getId() {                              return $this->id;}
    function getLangue() {                          return $this->langue;}
    function getNiveau() {                          return $this->niveau;}

    function getLesPersonnesParlent() {             return $this->lesPersonnesParlent;}
    
    // SETTER
    function setId($id): void {                     $this->id = $id;}
    function setLangue($langue): void {             $this->langue = $langue;}
    function setNiveau($niveau): void {             $this->niveau = $niveau;}

    function setLesPersonnesParlent($lesPersonnesParlent): void {$this->lesPersonnesParlent = $lesPersonnesParlent;}


    public function jsonSerialize(){ return get_object_vars($this); }
}

?>