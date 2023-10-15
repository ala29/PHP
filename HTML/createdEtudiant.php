<?php
require_once("requettes.php");
if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['date_de_naissance']) || empty($_REQUEST['numero_telephone']) || empty($_REQUEST['niveau']) || empty($_REQUEST['email']) || empty($_REQUEST['mot_de_passe'])){
	$verificationE=0;
}
else{	
	$ID_etudiant = $_REQUEST["ID_etudiant"];
	$nom = $_REQUEST["nom"];
	$prenom = $_REQUEST["prenom"];
	$date_de_naissance = $_REQUEST["date_de_naissance"];
	$numero_telephone = $_REQUEST["numero_telephone"];
	$niveau = $_REQUEST["niveau"];
	$email = $_REQUEST["email"];
	$salt="pfa_ala_emna";
	$mot_de_passe = crypt($_REQUEST["mot_de_passe"],$salt);
	
	//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
	$recherche = select('etudiant',$ID_etudiant,'ID_etudiant');
	if($recherche==null){ //Si l'utilisateur n'existe pas donc on l'ajoute
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
		insert('etudiant',$tab);
		$verificationE=2;
	}
	else{
		$verificationE=1;
	}
	
}
?>