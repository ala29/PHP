<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class ModelClient extends Model{
//Même noms et ordre que dans la table utilisateur
  private $ID_client;
  private $nom;
  private $prenom;
  private $email;
  private $mot_de_passe;
  private $numero_telephone;
  protected static $table = 'client';
  protected static $primary = 'ID_client';
   
  public function __construct($ID_client = NULL, $nom = NULL, $prenom = NULL, $email = NULL, $mot_de_passe = NULL, $numero_telephone = NULL) {
    if (!is_null($ID_client) && !is_null($nom) && !is_null($prenom) && !is_null($email) && !is_null($mot_de_passe)  && !is_null($numero_telephone)) {
      $this->ID_client = $ID_client;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
      $this->mot_de_passe = $mot_de_passe;
      $this->numero_telephone = $numero_telephone;
     }
  } 
 public function getNcin() {
       return $this->ID_client;  
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
public function getNumero_telephone() {
  return $this->numero_telephone;  
}
}
?>

