<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class Modeletudiant_formateur extends Model{
//Même noms et ordre que dans la table utilisateur
  private $ID_etudiant;
  private $diplome;
  private $specialite;
  protected static $table = 'etudiant_formateur';
  protected static $primary = 'ID_etudiant';
   
  public function __construct($ID_etudiant = NULL, $diplome = NULL, $specialite = NULL) {
    if (!is_null($ID_etudiant) && !is_null($diplome) && !is_null($specialite)) {
      $this->ID_etudiant = $ID_etudiant;
      $this->diplome = $diplome;
      $this->specialite = $specialite;
     }
  } 
 public function getID_etudiant() {
       return $this->ID_etudiant;  
  }
 public function getDiplome() {
       return $this->diplome;  
  }
  public function getSpecialite() {
       return $this->specialite;  
  }
}
?>
