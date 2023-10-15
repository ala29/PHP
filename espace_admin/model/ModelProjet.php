<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class ModelProjet extends Model{
//Même noms et ordre que dans la table utilisateur
  private $ID_projet;
  private $libelle;
  private $description;
  private $ID_etudiant;
  private $photo;
  protected static $table = 'projet';
  protected static $primary = 'ID_projet';
   
  public function __construct($ID_projet = NULL, $libelle = NULL, $description = NULL, $ID_etudiant = NULL, $photo = NULL) {
    if (!is_null($ID_projet) && !is_null($libelle) && !is_null($description) && !is_null($ID_etudiant) && !is_null($photo)) {
      $this->ID_projet = $ID_projet;
      $this->libelle = $libelle;
      $this->description = $description;
      $this->ID_etudiant = $ID_etudiant;
      $this->photo=$photo;
     }
  } 
 public function getID_projet() {
       return $this->ID_projet;  
  }
 public function getLibelle() {
       return $this->libelle;  
  }
  public function getDescription() {
       return $this->description;  
  }
  public function getID_etudiant() {
    return $this->ID_etudiant;  
}
public function getPhoto() {
  return $this->photo;  
}  



}
?>

