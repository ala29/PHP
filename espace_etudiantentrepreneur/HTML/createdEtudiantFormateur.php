<?php
        require_once("requettes.php");

		if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST['diplome']) || empty($_REQUEST['specialite'])){
			$verificationEF=0;	
		}
		else{
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$diplome = $_REQUEST["diplome"];
			$specialite = $_REQUEST["specialite"];
			//il faut vérifier que l'etudiant formateur n'existe pas dans la bdd 
			$recherche = select('etudiant',$ID_etudiant,'ID_etudiant');
            $recherche2 = select('etudiant_formateur',$ID_etudiant,'ID_etudiant');
			if($recherche!=null && $recherche2==null){ //Si l'etudiant existe dons table etudiant et n'existe pas dans table etudiant formateur donc on l'ajoute
				$tab = array(
				"ID_etudiant" => $ID_etudiant,
				"diplome" => $diplome,
				"specialite" => $specialite
				);				
				insert('etudiant_formateur',$tab);
				$verificationEF=2;
			}	
            //si formateur existe
			elseif($recherche2!=null){
				$verificationEF=1;
			}
            //si etudiant n'existe pas
            elseif($recherche==null){
            $verificationEF=3;
            }
        }
?>