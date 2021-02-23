<?php
require_once('class.Competence.php');
require_once('class.Diplome.php');
require_once('class.Experience.php');
require_once('class.Langue.php');

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
    private $poste = null;
    private $dispo = null;
    private $mobilite = null;
    
    private $lesDiplomes = array();
    private $lesCompetences = array();
    private $lesExperiences = array();
    private $lesLangues = array();
    
    
    // CONSTRUCTOR
    function __construct($id, $prenom, $nom, $adresse, $telephone, $email, $presentation, $website, $github, $linkedin, $poste, $dispo, $mobilite) {
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
        $this->poste = $poste;
        $this->dispo = $dispo;
        $this->mobilite = $mobilite;
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
    function getPoste() {        return $this->poste;}
    function getDispo() {        return $this->dispo;}
    function getMobilite() {        return $this->mobilite;}
    
    function getLesDiplomes() {     return $this->lesDiplomes;}
    function getLesCompetences() {  return $this->lesCompetences;}
    function getLesExperiences() {  return $this->lesExperiences;}
    function getLesLangues() {      return $this->lesLangues;}
    
    
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
    function setPoste($poste): void {                   $this->poste = $poste;}
    function setDispo($dispo): void {                   $this->dispo = $dispo;}
    function setMobilite($mobilite): void {             $this->mobilite = $mobilite;}

    function setLesDiplomes($lesDiplomes): void {       $this->lesDiplomes = $lesDiplomes;}
    function setLesCompetences($lesCompetences): void { $this->lesCompetences = $lesCompetences;}
    function setLesExperiences($lesExperiences): void { $this->lesExperiences = $lesExperiences;}
    function setLesLangues($lesLangues): void {         $this->lesLangues = $lesLangues;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>