<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class ModelEtudiant extends Model{
//Même noms et ordre que dans la table utilisateur
  private $ID_etudiant;
  private $nom;
  private $prenom;
  private $email;
  private $mot_de_passe;
  private $date_de_naissance;
  private $niveau;
  private $numero_telephone;
  protected static $table = 'etudiant';
  protected static $primary = 'ID_etudiant';
   
  public function __construct($ID_etudiant = NULL, $nom = NULL, $prenom = NULL, $email = NULL, $mot_de_passe = NULL, $date_de_naissance = NULL, $niveau = NULL, $numero_telephone = NULL) {
    if (!is_null($ID_etudiant) && !is_null($nom) && !is_null($prenom) && !is_null($email) && !is_null($mot_de_passe) && !is_null($date_de_naissance) && !is_null($niveau) && !is_null($numero_telephone)) {
      $this->ID_etudiant = $ID_etudiant;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
      $this->mot_de_passe = $mot_de_passe;
      $this->date_de_naissance = $date_de_naissance;
      $this->niveau = $niveau;
      $this->numero_telephone = $numero_telephone;
     }
  } 
 public function getNcin() {
       return $this->ID_etudiant;  
  }
 public function getNom() {
       return $this->nom;  
  }
  public function getPrenom() {
       return $this->prenom;  
  }
  public function getEmail() {
    return $this->email;  
}
public function getMot_de_passe() {
  return $this->mot_de_passe;  
}
public function getDate_de_naissance() {
  return $this->date_de_naissance;  
}
public function getNiveau() {
  return $this->niveau;  
}
public function getNumero_telephone() {
  return $this->numero_telephone;  
}
}
?>

