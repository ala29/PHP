<?php
$controller = "projet";

require_once ("{$ROOT}{$DS}model{$DS}ModelProjet.php"); // chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelProduits.php"); // chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModeletudiantEntrepreneur.php"); // chargement du modèle

if(isset($_GET['action']))
	$action = $_GET['action'];// recupère l'action passée dans l'URL
 else $action="readAll";
	//else $action="create";

require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiant.php");

switch ($action) {
	case "readAll":
		$pagetitle = "Liste des projets";
		$view = "readAll";
		$tab_p = ModelProjet::getAll();
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;

	case "readProduits":
		if(isset($_GET['ID_projet'])){
			$ID_projetProduits = $_GET['ID_projet'];
			$prod = ModelProduits::getAll();
			if($prod!=null){
			$pagetitle = "les produits du projet $ID_projetProduits";
			$view = "readProjet";
			$controller = "produits";
			require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			}
			}
			break;
	
		require ("{$ROOT}{$DS}view{$DS}Produits{$DS}viewReadProjetProduits.php");//"redirige" vers la vue
		break;
	
	case "read":
		if(isset($_GET['ID_projet'])){
		$ID_projet = $_GET['ID_projet'];
		$projet = ModelProjet::select($ID_projet);
		if($projet!=null){
		$pagetitle = "Details de la projet";
		$view = "read";
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		}
		}
		break;
		
	case "delete":
	if(isset($_REQUEST['ID_projet'])){
		$ID_projet = $_REQUEST['ID_projet'];
		$del = ModelProjet::select($ID_projet);
		$sql = "DELETE FROM produits WHERE ID_projet=$ID_projet";
		$req_prep = Model::getPdo()->prepare($sql);
		$req_prep->execute();
		if($del!=null){
		$del->delete($ID_projet);
		$pagetitle = " projet supprimer";
		$view="deleted";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		header('Location: index.php?controller=projet&action=readAll');
		}
	}
		break;
		
	case "create":
		$pagetitle = "Enregistrer une nouvelle projet";
		$view = "create";
		$tab_utilisateurs = ModelEtudiant::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
	
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_projet']) || empty($_REQUEST['libelle']) || empty($_REQUEST['description'])|| empty($_REQUEST['ID_etudiant'])|| empty($_FILES['photo']['name'])){
			$pagetitle = "champs projet non remplit";
			$view = "created";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			$verificationM=0;
		}

		else{
		$ID_projet = $_REQUEST["ID_projet"];
		$libelle = $_REQUEST["libelle"];
		$description = $_REQUEST["description"];
		$ID_etudiant= $_REQUEST["ID_etudiant"];
		$traget_img="../espace_etudiantentrepreneur/images/img_projet/";
		$upload=$traget_img.basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
		$photo="../images/img_projet/".basename($_FILES["photo"]["name"]);
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
		$recherche = ModelProjet::select($ID_projet);
		$recherche2= Modeletudiant_Entrepreneur::select($ID_etudiant);
		if($recherche==null && $recherche2!=null){ //Si l'utilisateur n'existe pas donc on l'ajoute
		$projet = new ModelProjet($ID_projet, $libelle, $description, $ID_etudiant);
		$tab = array(
		"ID_projet" => $ID_projet,
		"libelle" => $libelle,
		"description" => $description,
		"ID_etudiant" => $ID_etudiant,
		"photo" => $photo
		);
		$projet->insert($tab);
		$pagetitle = "Projet Enregistrée";
		$view = "created";
		$verificationM=2;
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		elseif($recherche!=null){
		$pagetitle = "Projet déja existe";
		$view = "created";
		$verificationM=1;
		require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		elseif($recherche2==null){
			$pagetitle = "etudiant entrepreneur n'existe pas";
			$view = "created";
			$verificationM=3;
			require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		}
		break;
		
	
	case "update":
	if(isset($_REQUEST['ID_projet'])){
		$oldID_projet = $_REQUEST['ID_projet'];
		//$choixAction = "update";
		//il faut vérifier que la voiture existe dans la bdd 
		$tab_utilisateurs = ModelEtudiant::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		$oldProjet = ModelProjet::select($oldID_projet);
		if($oldProjet !=null){
		$pagetitle = "Modifier le projet";
		$view = "update";
		//$oldVoiture = ModelVoiture::select($oldimmat);
		require ("{$ROOT}{$DS}view{$DS}view.php");
	}
	}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_projet']) && isset($_REQUEST['libelle']) && isset($_REQUEST['description'])&& isset($_REQUEST['ID_etudiant'])|| empty($_FILES['photo']['name'])){
			$oldID_projet = $_REQUEST['ID_projet'];
			$ID_projet = $_REQUEST["ID_projet"];
			$libelle = $_REQUEST["libelle"];
			$description = $_REQUEST["description"];
			$ID_etudiant= $_REQUEST["ID_etudiant"];
			$traget_img="../../espace_etudiantentrepreneur/images/img_projet/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
			$tab = array(
			"ID_projet" => $ID_projet,
			"libelle" => $libelle,
			"description" => $description,
			"ID_etudiant" => $ID_etudiant,
			"photo" => $upload
			);
		
		$oldProjet = ModelProjet::select($oldID_projet);
		//il faut vérifier que l'utilisateur existe dans la bdd 
		if($oldProjet!=null){
		$UpdatedProjet = $oldProjet->update($tab, $oldID_projet);
		$pagetitle = "Projet modifiée avec succès";
		$view = "updated";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		}
		break;
}
?>