<?php
$controller = "meet";

require_once ("{$ROOT}{$DS}model{$DS}ModelMeet.php"); // chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiantFormateur.php"); // chargement du modèle

if(isset($_GET['action']))
	$action = $_GET['action'];// recupère l'action passée dans l'URL
 else $action="readAll";
	//else $action="create";

require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiant.php");

switch ($action) {
	case "readAll":
		$pagetitle = "Liste des meet";
		$view = "readAll";
		$tab_v = ModelMeet::getAll();
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;
	
	case "read":
		if(isset($_GET['ID_meet'])){
		$ID_meet = $_GET['ID_meet'];
		$meet = ModelMeet::select($ID_meet);
		if($meet!=null){
		$pagetitle = "Details de la meet";
		$view = "read";
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		}
		}
		break;
		
	case "delete":
	if(isset($_REQUEST['ID_meet'])){
		$ID_meet = $_REQUEST['ID_meet'];
		$del = ModelMeet::select($ID_meet);
		$oldImageFilename=$_REQUEST["photo"];
	
		if($del!=null){
		$del->delete($ID_meet);
		//supprimer image de meet  enregistré dans le dossier img_meet 
		if (file_exists($oldImageFilename)) {
			unlink($oldImageFilename);
		}
		$pagetitle = " meet supprimer";
		$view="deleted";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		header('Location: index.php?controller=meet&action=readAll');

		}
	}
		break;

	case "create":
		$pagetitle = "Enregistrer une nouvelle meet";
		$view = "create";
		$tab_utilisateurs = ModelEtudiant::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
	
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_meet']) || empty($_REQUEST['titre_meet']) || empty($_REQUEST['description'])|| empty($_REQUEST['date_meet'])|| empty($_REQUEST['prix'])|| empty($_REQUEST['nombre_participants'])|| empty($_REQUEST['ID_etudiant'])|| empty($_FILES['photo']['name'])){
			$pagetitle = "champs meet non remplit";
			$view = "created";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			$verificationM=0;
		}

		else{
		$ID_meet = $_REQUEST["ID_meet"];
		$titre_meet = $_REQUEST["titre_meet"];
		$description = $_REQUEST["description"];
		$date_meet= $_REQUEST["date_meet"];
		$prix= $_REQUEST["prix"];
		$nombre_participants= $_REQUEST["nombre_participants"];
		$ID_etudiant= $_REQUEST["ID_etudiant"];
		$traget_img="../espace_etudiantformateur/images/img_meet/";
		$upload=$traget_img.basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
		$photo="../images/img_meet/".basename($_FILES["photo"]["name"]);
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
		$recherche = ModelMeet::select($ID_meet);
		$recherche2= Modeletudiant_Formateur::select($ID_etudiant);
		if($recherche==null && $recherche2!=null){ //Si l'utilisateur n'existe pas donc on l'ajoute
		$meet = new ModelMeet($ID_meet, $titre_meet, $description, $date_meet, $prix, $nombre_participants, $ID_etudiant);
		$tab = array(
		"ID_meet" => $ID_meet,
		"titre_meet" => $titre_meet,
		"description" => $description,
		"date_meet" => $date_meet,
		"prix" => $prix,
		"nombre_participants" => $nombre_participants,
		"ID_etudiant" => $ID_etudiant,
		"photo" => $photo
		);
		$meet->insert($tab);
		$pagetitle = "Meet Enregistrée";
		$view = "created";
		$verificationM=2;
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		elseif($recherche!=null){
		$pagetitle = "Meet déja existe";
		$view = "created";
		$verificationM=1;
		require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		elseif($recherche2==null){
			$pagetitle = "etudiant formateur n'existe pas";
			$view = "created";
			$verificationM=3;
			require ("{$ROOT}{$DS}view{$DS}view.php");	
		}
		}
		break;
		
	
	case "update":
	if(isset($_REQUEST['ID_meet'])){
		$oldID_meet = $_REQUEST['ID_meet'];
		//$choixAction = "update";
		//il faut vérifier que la voiture existe dans la bdd 
		$tab_utilisateurs = ModelEtudiant::getAll();//pour list HTML select appel au modèle pour récupérer les proprietaires de la BD
		$oldMeet = ModelMeet::select($oldID_meet);
		if($oldMeet !=null){
		$pagetitle = "Modifier le meet";
		$view = "update";
		//$oldVoiture = ModelVoiture::select($oldimmat);
		require ("{$ROOT}{$DS}view{$DS}view.php");
	}
	}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_meet']) && isset($_REQUEST['titre_meet']) && isset($_REQUEST['description'])&& isset($_REQUEST['date_meet'])&& isset($_REQUEST['prix'])&& isset($_REQUEST['nombre_participants'])&& isset($_REQUEST['ID_etudiant'])|| empty($_FILES['photo']['name'])){
			$oldID_meet = $_REQUEST['ID_meet'];
			$ID_meet = $_REQUEST["ID_meet"];
			$titre_meet = $_REQUEST["titre_meet"];
			$description = $_REQUEST["description"];
			$date_meet= $_REQUEST["date_meet"];
			$prix= $_REQUEST["prix"];
			$nombre_participants= $_REQUEST["nombre_participants"];
			$ID_etudiant= $_REQUEST["ID_etudiant"];
			$traget_img="../espace_etudiantformateur/images/img_meet/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
			$photo="../images/img_meet/".basename($_FILES["photo"]["name"]);
			$tab = array(
			"ID_meet" => $ID_meet,
			"titre_meet" => $titre_meet,
			"description" => $description,
			"date_meet" => $date_meet,
			"prix" => $prix,
			"nombre_participants" => $nombre_participants,
			"ID_etudiant" => $ID_etudiant,
			"photo" => $photo
			);
		
		$oldMeet = ModelMeet::select($oldID_meet);
		//il faut vérifier que l'utilisateur existe dans la bdd 
		if($oldMeet!=null){
		$UpdatedVoiture = $oldMeet->update($tab, $oldID_meet);
		$pagetitle = "Meet modifiée avec succès";
		$view = "updated";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		}
		break;
}
?>