<?php
require_once("requettes.php");
if(empty($_REQUEST['ID_client']) || empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['numero_telephone'])  || empty($_REQUEST['email']) || empty($_REQUEST['mot_de_passe'])){
	$verificationE=0;
}
else{	
	$ID_client = $_REQUEST["ID_client"];
	$nom = $_REQUEST["nom"];
	$prenom = $_REQUEST["prenom"];
	$numero_telephone = $_REQUEST["numero_telephone"];
	$email = $_REQUEST["email"];
	$salt="pfa_ala_emna";
	$mot_de_passe = crypt($_REQUEST["mot_de_passe"],$salt);
	//il faut vérifier que le client n'existe pas dans la bdd 
	$recherche = select('client',$ID_client,'ID_client');
	if($recherche==null){ //Si le client n'existe pas donc on l'ajoute
		$tab = array(
		"ID_client" => $ID_client,
		"nom" => $nom,
		"prenom" => $prenom,
		"email" => $email,
		"mot_de_passe" => $mot_de_passe,
		"numero_telephone" => $numero_telephone
		);				
		insert('client',$tab);
		$verificationE=2;
	}
	else{
		$verificationE=1;
	}
	
}
?>