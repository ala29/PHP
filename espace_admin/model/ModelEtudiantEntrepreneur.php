<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class Modeletudiant_Entrepreneur extends Model{
//Même noms et ordre que dans la table utilisateur
  private $ID_etudiant;
  private $nom_projet;
  protected static $table = 'etudiant_entrepreneur';
  protected static $primary = 'ID_etudiant';
   
  public function __construct($ID_etudiant = NULL, $nom_projet = NULL) {
    if (!is_null($ID_etudiant) && !is_null($nom_projet)) {
      $this->ID_etudiant = $ID_etudiant;
      $this->nom_projet = $nom_projet;
     }
  } 
 public function getID_etudiant() {
       return $this->ID_etudiant;  
  }
 public function getnom_projet() {
       return $this->nom_projet;  
  }
}
?>
