<?php
        require_once("requettes.php");

		if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST["nom_projet"])){
			$verificationEE=0;	
		}
		else{
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$nom_projet = $_REQUEST["nom_projet"];
			//il faut vérifier que l'etudiant formateur n'existe pas dans la bdd 
			$recherche = select('etudiant',$ID_etudiant,'ID_etudiant');
            $recherche2 = select('etudiant_entrepreneur',$ID_etudiant,'ID_etudiant');
			if($recherche!=null && $recherche2==null){ //Si l'etudiant existe dons table etudiant et n'existe pas dans table etudiant formateur donc on l'ajoute
				$tab = array(
				"ID_etudiant" => $ID_etudiant,
				"nom_projet" => $nom_projet,
				);				
				insert('etudiant_entrepreneur',$tab);
				$verificationEE=2;
			}	
            //si formateur existe
			elseif($recherche2!=null){
				$verificationEE=1;
			}
            //si etudiant n'existe pas
            elseif($recherche==null){
            $verificationEE=3;
            }
        }
?>