<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "etudiant";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiant.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des etudiants";
        $view = "readAll";
       	$tab_u = ModelEtudiant::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "read":	
		if(isset($_REQUEST['ID_etudiant'])){
			$ncin = $_REQUEST['ID_etudiant'];
			$u = ModelEtudiant::select($ncin);
				if($u!=null){
					$pagetitle = "Details de l'utilisateur";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	case "delete":
		if(isset($_REQUEST['ID_etudiant'])){
			$ncin = $_REQUEST['ID_etudiant'];
			$del = ModelEtudiant::select($ncin);
			if($del!=null){
			$del->delete($ncin);
			/*redirection vers le contrôleur et l’action par défaut*/
			$pagetitle = "supression etudiant";
			$view = "deleted";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			header('Location: index.php?controller=etudiant&action=readAll');
			}
		}
	    break;
	
	case "create":
		$pagetitle = "Enregistrer un etudiant";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['date_de_naissance']) || empty($_REQUEST['numero_telephone']) || empty($_REQUEST['niveau']) || empty($_REQUEST['email']) || empty($_REQUEST['mot_de_passe'])){
			$pagetitle = "Etudiantchamps vide";
			$view = "created";
			$verification=0;
			require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		else{	
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prenom"];
			$date_de_naissance = $_REQUEST["date_de_naissance"];
			$numero_telephone = $_REQUEST["numero_telephone"];
			$niveau = $_REQUEST["niveau"];
			$email = $_REQUEST["email"];
			$mot_de_passe = $_REQUEST["mot_de_passe"];
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
			$recherche = ModelEtudiant::select($ID_etudiant);
			if($recherche==null){ //Si l'utilisateur n'existe pas donc on l'ajoute
									//il faut créer une object ModelUtilisateur pour accéder à insert car elle n'est pas static
				$u = new ModelEtudiant($ID_etudiant, $nom, $prenom, $email, $mot_de_passe, $date_de_naissance, $niveau, $numero_telephone);	
				$tab = array(
				"ID_etudiant" => $ID_etudiant,
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"mot_de_passe" => $mot_de_passe,
				"date_de_naissance" => $date_de_naissance,
				"niveau" => $niveau,
				"numero_telephone" => $numero_telephone
				);				
				$u->insert($tab);
				$pagetitle = "Etudiant Enregistré";
				$view = "created";
				$verification=2;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			else{
				$pagetitle = "Etudiant existe deja";
				$view = "created";
				$verification=1;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			
		}
		break;
	
	case "update":
		if(isset($_REQUEST['ID_etudiant'])){
			$ncin = $_REQUEST['ID_etudiant'];
			$up = ModelEtudiant::select($ncin);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($up!=null){
				$pagetitle = "Modifier l'etudiant";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_etudiant']) && isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['date_de_naissance']) && isset($_REQUEST['numero_telephone']) && isset($_REQUEST['niveau']) && isset($_REQUEST['email']) && isset($_REQUEST['mot_de_passe'])){
			$oldncin = $_REQUEST['ID_etudiant'];
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prenom"];
			$date_de_naissance = $_REQUEST["date_de_naissance"];
			$numero_telephone = $_REQUEST["numero_telephone"];
			$niveau = $_REQUEST["niveau"];
			$email = $_REQUEST["email"];
			$mot_de_passe = $_REQUEST["mot_de_passe"];
			$tab = array(
				"ID_etudiant" => $ID_etudiant,
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"mot_de_passe" => $mot_de_passe,
				"date_de_naissance" => $date_de_naissance,
				"niveau" => $niveau,
				"numero_telephone" => $numero_telephone
				);
			$o = ModelEtudiant::select($oldncin);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($o!=null){
				$u = ModelEtudiant::update($tab, $oldncin);		
				$pagetitle = "Etudiant modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
	
	case "statistique":
		require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiantFormateur.php"); 
		require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiantEntrepreneur.php"); 
		require_once ("{$ROOT}{$DS}model{$DS}ModelMeet.php"); 
		require_once ("{$ROOT}{$DS}model{$DS}ModelProjet.php"); 
		require_once ("{$ROOT}{$DS}model{$DS}ModelProduits.php"); 
		$tab_f = Modeletudiant_formateur::getAll();//appel au modèle pour gerer la BD
		$tab_e = Modeletudiant_Entrepreneur::getAll();//appel au modèle pour gerer la BD
		$tab_m = ModelMeet::getAll();//appel au modèle pour gerer la BD
		$tab_p = ModelProjet::getAll();//appel au modèle pour gerer la BD
		$tab_pro = ModelProduits::getAll();//appel au modèle pour gerer la BD
		$pagetitle = "statistique des etudiants";
		$view = "statistique";
		$tab_u = ModelEtudiant::getAll();//appel au modèle pour gerer la BD
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;

}
?>
