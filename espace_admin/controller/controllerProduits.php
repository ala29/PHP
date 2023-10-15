<?php
$controller = "produits";

require_once ("{$ROOT}{$DS}model{$DS}ModelProduits.php"); // chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelProjet.php"); // chargement du modèle

if(isset($_GET['action']))
	$action = $_GET['action'];// recupère l'action passée dans l'URL
 else $action="readAll";
	//else $action="create";

require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiant.php");

switch ($action) {
	case "readAll":
		$pagetitle = "Liste des produits";
		$view = "readAll";
		$produits = ModelProduits::getAll();
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;
	
	case "read":
		if(isset($_GET['ID_produit'])){
		$ID_produit = $_GET['ID_produit'];
		$produit = ModelProduits::select($ID_produit);
		if($produit!=null){
		$pagetitle = "Details de la produit";
		$view = "read";
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		}
		}
		break;
		
	case "delete":
	if(isset($_REQUEST['ID_produit'])){
		$ID_produit = $_REQUEST['ID_produit'];
		$del = ModelProduits::select($ID_produit);
		if($del!=null){
		$del->delete($ID_produit);
		$pagetitle = " produit supprimer";
		$view="deleted";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		header('Location: index.php?controller=produits&action=readAll');
		}
	}
		break;
		
	case "create":
		$pagetitle = "Enregistrer une nouvelle produit";
		$view = "create";
		$tab_utilisateurs = ModelProduits::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
	
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_produit']) || empty($_REQUEST['libelle']) || empty($_REQUEST['description'])|| empty($_REQUEST['prix'])|| empty($_REQUEST['stock'])|| empty($_REQUEST['ID_projet'])|| empty($_REQUEST['categorie'])|| empty($_FILES['photo']['name'])){
			$pagetitle = "champs produit non remplit";
			$view = "created";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			$verificationM=0;
		}

		else{
		$ID_produit = $_REQUEST["ID_produit"];
		$libelle = $_REQUEST["libelle"];
		$description = $_REQUEST["description"];
		$prix= $_REQUEST["prix"];
		$stock= $_REQUEST["stock"];
		$categorie= $_REQUEST["categorie"];
		$ID_projet= $_REQUEST["ID_projet"];
		$traget_img="../espace_etudiantentrepreneur/images/img_produit/";
		$upload=$traget_img.basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
		$photo="../images/img_produit/".basename($_FILES["photo"]["name"]);
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
		$recherche = ModelProduits::select($ID_produit);
		$recherche2= ModelProjet::select($ID_projet);
		if($recherche==null && $recherche2!=null){ //Si l'utilisateur n'existe pas donc on l'ajoute
		$produit = new ModelProduits($ID_produit, $libelle, $description, $prix, $stock, $ID_projet, $categorie);
		$tab = array(
		"ID_produit" => $ID_produit,
		"libelle" => $libelle,
		"description" => $description,
		"prix" => $prix,
		"stock" => $stock,
		"ID_projet" => $ID_projet,
		"categorie" => $categorie,
		"photo" => $photo
		);
		$produit->insert($tab);
		$pagetitle = "Produit Enregistrée";
		$view = "created";
		$verificationM=2;
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		elseif($recherche!=null){
		$pagetitle = "Produit déja existe";
		$view = "created";
		$verificationM=1;
		require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		elseif($recherche2==null){
			$pagetitle = "Projet n'existe pas";
			$view = "created";
			$verificationM=3;
			require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		}
		break;
		
	
	case "update":
	if(isset($_REQUEST['ID_produit'])){
		$oldID_produit = $_REQUEST['ID_produit'];
		//$choixAction = "update";
		//il faut vérifier que la voiture existe dans la bdd 
		$tab_utilisateurs = ModelProjet::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		$oldproduit = ModelProduits::select($oldID_produit);
		if($oldproduit !=null){
		$pagetitle = "Modifier le produit";
		$view = "update";
		//$oldVoiture = ModelVoiture::select($oldimmat);
		require ("{$ROOT}{$DS}view{$DS}view.php");
	}
	}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_produit']) && isset($_REQUEST['libelle']) && isset($_REQUEST['description'])&& isset($_REQUEST['prix'])&& isset($_REQUEST['stock'])&& isset($_REQUEST['ID_projet'])&& isset($_REQUEST['categorie'])|| empty($_FILES['photo']['name'])){
			$oldID_produit = $_REQUEST['ID_produit'];
			$ID_produit = $_REQUEST["ID_produit"];
			$libelle = $_REQUEST["libelle"];
			$description = $_REQUEST["description"];
			$prix= $_REQUEST["prix"];
			$stock= $_REQUEST["stock"];
			$ID_projet= $_REQUEST["ID_projet"];
			$categorie= $_REQUEST["categorie"];
			$traget_img="../images/img_produit/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
			$photo="../images/img_produit/".basename($_FILES["photo"]["name"]);
			$tab = array(
			"ID_produit" => $ID_produit,
			"libelle" => $libelle,
			"description" => $description,
			"prix" => $prix,
			"stock" => $stock,
			"ID_projet" => $ID_projet,
			"categorie" => $categorie,
			"photo" => $photo
			);
		
		$oldProduit = ModelProduits::select($oldID_produit);
		//il faut vérifier que l'utilisateur existe dans la bdd 
		if($oldProduit!=null){
		$UpdatedProduit = $oldProduit->update($tab, $oldID_produit);
		$pagetitle = "Produit modifiée avec succès";
		$view = "updated";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		}
		break;
}
?>