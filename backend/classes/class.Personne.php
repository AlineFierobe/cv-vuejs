<?php
require_once('class.Competence.php');
require_once('class.Diplome.php');
require_once('class.Experience.php');
require_once('class.Langue.php');
require_once('class.Travail.php');

class Personne implements JsonSerializable 
{
    private $id = 0;
    private $prenom = null;
    private $nom = null;
    private $adresse = null;
    private $telephone = null;
    private $email = null;
    private $presentation = null;
    private $website = null;
    private $github = null;
    private $linkedin = null;
    
    private $lesDiplomes = array();
    private $lesCompetences = array();
    private $lesExperiences = array();
    private $lesLangues = array();
    private $leTravail = null;
    
    
    // CONSTRUCTOR
    function __construct($id, $prenom, $nom, $adresse, $telephone, $email, $presentation, $website, $github, $linkedin) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->presentation = $presentation;
        $this->website = $website;
        $this->github = $github;
        $this->linkedin = $linkedin;
    }
    
    // GETTER
    function getId() {              return $this->id;}
    function getPrenom() {          return $this->prenom;}
    function getNom() {             return $this->nom;}
    function getAdresse() {         return $this->adresse;}
    function getTelephone() {       return $this->telephone;}
    function getEmail() {           return $this->email;}
    function getPresentation() {    return $this->presentation; }
    function getWebsite() {         return $this->website;}
    function getGithub() {          return $this->github;}
    function getLinkedin() {        return $this->linkedin;}
    
    function getLesDiplomes() {     return $this->lesDiplomes;}
    function getLesCompetences() {  return $this->lesCompetences;}
    function getLesExperiences() {  return $this->lesExperiences;}
    function getLesLangues() {      return $this->lesLangues;}
    function getLeTravail() {       return $this->leTravail;}
    
    
    // SETTER
    function setId($id): void {                         $this->id = $id;}
    function setPrenom($prenom): void {                 $this->prenom = $prenom;}
    function setNom($nom): void {                       $this->nom = $nom;}
    function setAdresse($adresse): void {               $this->adresse = $adresse;}
    function setTelephone($telephone): void {           $this->telephone = $telephone;}
    function setEmail($email): void {                   $this->email = $email;}
    function setPresentation($presentation): void {     $this->presentation = $presentation;}
    function setWebsite($website): void {               $this->website = $website;}
    function setGithub($github): void {                 $this->github = $github;}
    function setLinkedin($linkedin): void {             $this->linkedin = $linkedin;}

    function setLesDiplomes($lesDiplomes): void {       $this->lesDiplomes = $lesDiplomes;}
    function setLesCompetences($lesCompetences): void { $this->lesCompetences = $lesCompetences;}
    function setLesExperiences($lesExperiences): void { $this->lesExperiences = $lesExperiences;}
    function setLesLangues($lesLangues): void {         $this->lesLangues = $lesLangues;}
    function setLeTravail($leTravail): void {           $this->leTravail = $leTravail;}

    public function jsonSerialize(){ return get_object_vars($this); }
}
?>