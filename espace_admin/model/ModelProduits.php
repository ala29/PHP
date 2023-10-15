<?php

require_once ("Model.php"); 

class ModelProduits extends Model {
     private $ID_produit;
     private $libelle;
     private $description;
     private $prix;
     private $stock;
     private $ID_projet;
     private $categorie;
     private $photo;
     protected static $table = 'produits';
     protected static $primary = 'ID_produit';
  
  public function __construct($ID_produit = NULL, $libelle = NULL, $description = NULL, $prix = NULL, $stock = NULL, $ID_projet = NULL, $categorie = NULL, $photo = NULL) {
    if (!is_null($ID_produit) && !is_null($libelle) && !is_null($description) && !is_null($prix) && !is_null($stock) && !is_null($ID_projet) && !is_null($categorie) && !is_null($photo)) {
     $this->ID_produit = $ID_produit;
     $this->libelle = $libelle;
     $this->description = $description;
	$this->prix=$prix;
     $this->stock = $stock;
     $this->ID_projet = $ID_projet;
	$this->categorie=$categorie;
    $this->photo=$photo;
    }
  }  
  
  public function getID_produit() {
       return $this->ID_produit;  
  }
  
  public function getLibelle() {
       return $this->libelle;  
  }
  
  public function getDescription() {
       return $this->description;  
  }
    public function getPrix() {
        return $this->prix;  
    }
    public function getStock() {
        return $this->stock;  
    }
    public function getID_projet() {
        return $this->ID_projet;  
    }
    public function getCategorie() {
        return $this->categorie;  
    }
    public function getPhoto() {
        return $this->photo;  
      }  
      
}
?>
