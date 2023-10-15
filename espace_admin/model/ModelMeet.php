<?php

require_once ("Model.php"); 

class ModelMeet extends Model {
     private $ID_meet;
     private $titre_meet;
     private $description;
     private $date_meet;
     private $prix;
     private $nombre_participants;
     private $ID_etudiant;
     private $photo;
     protected static $table = 'meet';
     protected static $primary = 'ID_meet';
  
  public function __construct($ID_meet = NULL, $titre_meet = NULL, $description = NULL, $date_meet = NULL, $prix = NULL, $nombre_participants = NULL, $ID_etudiant = NULL, $photo = NULL) {
    if (!is_null($ID_meet) && !is_null($titre_meet) && !is_null($description) && !is_null($date_meet) && !is_null($prix) && !is_null($nombre_participants) && !is_null($ID_etudiant) && !is_null($photo)) {
     $this->ID_meet = $ID_meet;
     $this->titre_meet = $titre_meet;
     $this->description = $description;
	$this->date_meet=$date_meet;
     $this->prix = $prix;
     $this->nombre_participants = $nombre_participants;
	$this->ID_etudiant=$ID_etudiant;
     $this->photo=$photo;
    }
  }  
  
  public function getID_meet() {
       return $this->ID_meet;  
  }
  
  public function getTitre_meet() {
       return $this->titre_meet;  
  }
  
  public function getDescription() {
       return $this->description;  
  }

  public function getDate_meet() {
       return $this->date_meet;  
  }
  public function getPrix() {
     return $this->prix;  
}
public function getNombre_participants() {
     return $this->nombre_participants;  
}
public function getID_etudiant() {
     return $this->ID_etudiant;  
}
public function getPhoto() {
     return $this->photo;  
}   
}
?>
