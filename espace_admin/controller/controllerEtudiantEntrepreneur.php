<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "etudiantEntrepreneur";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiantEntrepreneur.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelEtudiant.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des etudiants Entrepreneur";
        $view = "readAll";
       	$tab_u = ModelEtudiant::getAll();//appel au modèle pour gerer la BD
        $tab_f = Modeletudiant_Entrepreneur::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "read":	
		if(isset($_REQUEST['ID_etudiant'])){
			$ID_etudiant = $_REQUEST['ID_etudiant'];
			$u = ModelEtudiant::select($ID_etudiant);
            $f = Modeletudiant_Entrepreneur::select($ID_etudiant);

				if($u!=null && $f!=null){
					$pagetitle = "Details de l'etudiant Entrepreneur";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	case "delete":
		if(isset($_REQUEST['ID_etudiant'])){
			$ID_etudiant = $_REQUEST['ID_etudiant'];
			$del = Modeletudiant_Entrepreneur::select($ID_etudiant);
			if($del!=null){
			$del->delete($ID_etudiant);
			/*redirection vers le contrôleur et l’action par défaut*/
			$pagetitle = "supression etudiant Entrepreneur";
			$view = "deleted";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			header('Location: index.php?controller=etudiantEntrepreneur&action=readAll');
			}
		}
	    break;
	
	case "create":
		$pagetitle = "Enregistrer un etudiant Entrepreneur";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		
	case "created": // Action du formulaire de la création
		if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST['nom_projet'])){
			$pagetitle = "Etudiant Entrepreneur champs vide";
			$view = "created";
			$verificationEE=0;
			require ("{$ROOT}{$DS}view{$DS}view.php");		
		}
		else{
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$nom_projet = $_REQUEST["nom_projet"];
			//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
			$recherche = ModelEtudiant::select($ID_etudiant);
            $recherche2 = Modeletudiant_Entrepreneur::select($ID_etudiant);
			if($recherche!=null && $recherche2==null){ //Si l'etudiant existe dons table etudiant et n'existe pas dans table etudiant Entrepreneur donc on l'ajoute
									//il faut créer une object ModelUtilisateur pour accéder à insert car elle n'est pas static
				$f = new Modeletudiant_Entrepreneur($ID_etudiant, $nom_projet);	
				$tab = array(
				"ID_etudiant" => $ID_etudiant,
				"nom_projet" => $nom_projet
				);				
				$f->insert($tab);
				$pagetitle = "Etudiant Entrepreneur Enregistré";
				$view = "created";
				$verificationEE=2;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}	
			elseif($recherche2!=null){
				$pagetitle = "Etudiant Entrepreneur exicte déja";
				$view = "created";
				$verificationEE=1;
				require ("{$ROOT}{$DS}view{$DS}view.php");

			}
			elseif($recherche==null){
				$pagetitle = "Etudiant formateur exicte déja";
				$view = "created";
				$verificationEE=3;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}
		break;
	
	case "update":
		if(isset($_REQUEST['ID_etudiant'])){
			$ID_etudiant = $_REQUEST['ID_etudiant'];
			$up = Modeletudiant_Entrepreneur::select($ID_etudiant);
			$ep = ModelEtudiant::select($ID_etudiant);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($up!=null && $ep!=null){
				$pagetitle = "Modifier l'etudiant Entrepreneur";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['ID_etudiant']) && isset($_REQUEST['nom_projet'])&& isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['date_de_naissance']) && isset($_REQUEST['numero_telephone']) && isset($_REQUEST['niveau']) && isset($_REQUEST['email']) && isset($_REQUEST['mot_de_passe'])){
			$oldID_etudiant = $_REQUEST['ID_etudiant'];
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prenom"];
			$date_de_naissance = $_REQUEST["date_de_naissance"];
			$numero_telephone = $_REQUEST["numero_telephone"];
			$niveau = $_REQUEST["niveau"];
			$email = $_REQUEST["email"];
			$mot_de_passe = $_REQUEST["mot_de_passe"];
			$nom_projet = $_REQUEST["nom_projet"];
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
				$tab2=array(
				"ID_etudiant" => $ID_etudiant,	
				"nom_projet" => $nom_projet
				);
			
			$u = ModelEtudiant::select($oldID_etudiant);
			//il faut vérifier que l'etudiant Entrepreneur existe dans la table 
			if($o!=null && $u!=null){
				$o = Modeletudiant_Entrepreneur::update($tab2, $oldID_etudiant);
				$u = ModelEtudiant::update($tab, $oldID_etudiant);		
				$pagetitle = "Etudiant Entrepreneur modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
		
	
}
?>
