<?php
require_once('class.Personne.php');

class Travail implements JsonSerializable
{
    private $id = 0;
    private $poste = null;
    private $disponibilite = null;
    private $mobilite = null;
    
    private $lesPersonnesRecherchent = array();
    
    // CONSTRUCTOR
    function __construct($id, $poste, $disponibilite, $mobilite) {
        $this->id = $id;
        $this->poste = $poste;
        $this->disponibilite = $disponibilite;
        $this->mobilite = $mobilite;
    }

    
    // GETTER
    function getId() {                          return $this->id;}
    function getPoste() {                       return $this->poste;}
    function getDisponibilite() {               return $this->disponibilite;}
    function getMobilite() {                    return $this->mobilite;}

    function getLesPersonnesRecherchent() {     return $this->lesPersonnesRecherchent;}

    
    // SETTER
    function setId($id): void {                                 $this->id = $id;}
    function setPoste($poste): void {                           $this->poste = $poste;}
    function setDisponibilite($disponibilite): void {           $this->disponibilite = $disponibilite;}
    function setMobilite($mobilite): void {                     $this->mobilite = $mobilite;}

    function setLesPersonnesRecherchent($lesPersonnesRecherchent): void {   $this->lesPersonnesRecherchent = $lesPersonnesRecherchent;}

    public function jsonSerialize(){ return get_object_vars($this); }
}

?>