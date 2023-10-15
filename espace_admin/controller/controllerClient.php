<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "client";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelClient.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des clients";
        $view = "readAll";
       	$tab_u = ModelClient::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "read":	
		if(isset($_REQUEST['ID_client'])){
			$ncin = $_REQUEST['ID_client'];
			$u = ModelClient::select($ncin);
				if($u!=null){
					$pagetitle = "Details de l'utilisateur";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	case "delete":
		if(isset($_REQUEST['ID_client'])){
			$ncin = $_REQUEST['ID_client'];
			$del = ModelClient::select($ncin);
			if($del!=null){
			$del->delete($ncin);
			/*redirection vers le contrôleur et l’action par défaut*/
			$pagetitle = "supression client";
			$view = "deleted";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			header('Location: index.php?controller=client&action=readAll');
			}
		}
	    break;
	
	case "create":
		$pagetitle = "Enregistrer un client";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_client']) || empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['numero_telephone']) || empty($_REQUEST['email']) || empty($_REQUEST['mot_de_passe'])){
			$pagetitle = "Client champs vide";
			$view = "created";
			$verification=0;
			require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		else{	
			$ID_client = $_REQUEST["ID_client"];
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prenom"];
			$numero_telephone = $_REQUEST["numero_telephone"];
			$email = $_REQUEST["email"];
			$mot_de_passe = $_REQUEST["mot_de_passe"];
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
			$recherche = ModelClient::select($ID_client);
			if($recherche==null){ //Si l'utilisateur n'existe pas donc on l'ajoute
									//il faut créer une object ModelUtilisateur pour accéder à insert car elle n'est pas static
				$u = new ModelClient($ID_client, $nom, $prenom, $email, $mot_de_passe, $numero_telephone);	
				$tab = array(
				"ID_client" => $ID_client,
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"mot_de_passe" => $mot_de_passe,
				"numero_telephone" => $numero_telephone
				);				
				$u->insert($tab);
				$pagetitle = "Client Enregistré";
				$view = "created";
				$verification=2;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			else{
				$pagetitle = "Client existe deja";
				$view = "created";
				$verification=1;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			
		}
		break;
	
	case "update":
		if(isset($_REQUEST['ID_client'])){
			$ncin = $_REQUEST['ID_client'];
			$up = ModelClient::select($ncin);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($up!=null){
				$pagetitle = "Modifier l'client";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_client']) && isset($_REQUEST['nom']) && isset($_REQUEST['prenom'])&& isset($_REQUEST['email']) && isset($_REQUEST['mot_de_passe'])){
			$oldncin = $_REQUEST['ID_client'];
			$ID_client = $_REQUEST["ID_client"];
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prenom"];
			$numero_telephone = $_REQUEST["numero_telephone"];
			$email = $_REQUEST["email"];
			$mot_de_passe = $_REQUEST["mot_de_passe"];
			$tab = array(
				"ID_client" => $ID_client,
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"mot_de_passe" => $mot_de_passe,
				"numero_telephone" => $numero_telephone
				);
			$o = ModelClient::select($oldncin);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($o!=null){
				$u = ModelClient::update($tab, $oldncin);		
				$pagetitle = "Client modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
		
	
}
?>
