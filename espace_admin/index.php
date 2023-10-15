<?php
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
$ROOT = __DIR__;

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;

$controleur_default = "acceuil" ;

if(!isset($_REQUEST['controller']))
				//$controller récupère $controller_default;
				$controller=$controleur_default;
			else 
				// recupère l'action passée dans l'URL
				$controller = $_REQUEST['controller'];

				
switch ($controller) {
			case "acceuil" :
			require ("{$ROOT}{$DS}controller{$DS}acceuil.php");
			break;

			case "meet" :
			// {$var} pour concaténer les chaînes de caractères 
				require ("{$ROOT}{$DS}controller{$DS}controllerMeet.php");
				break;
				
			case "etudiant" :
				require ("{$ROOT}{$DS}controller{$DS}controllerEtudiant.php");
				break;

			case "etudiantFormateur" :
					require ("{$ROOT}{$DS}controller{$DS}controllerEtudiantFormateur.php");
					break;

			case "etudiantEntrepreneur" :
				require ("{$ROOT}{$DS}controller{$DS}controllerEtudiantEntrepreneur.php");
				break;
			case "client" :
				require ("{$ROOT}{$DS}controller{$DS}controllerClient.php");
				break;
			case "produits" :
				require ("{$ROOT}{$DS}controller{$DS}controllerProduits.php");
				break;
			case "projet" :
				require ("{$ROOT}{$DS}controller{$DS}controllerProjet.php");
				break;
		
				
			case "default" :
				require ("{$ROOT}{$DS}controller{$DS}acceuil.php");
				break;
}
?>