<?php
        require_once("requettes.php");

		if(empty($_REQUEST['ID_etudiant']) || empty($_REQUEST["libelle"])|| empty($_REQUEST["description"]) || empty($_REQUEST["ID_projet"]) || empty($_FILES['photo']['name'])){
			$verificationP=0;	
		}
		else{
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$libelle = $_REQUEST["libelle"];
            $description = $_REQUEST["description"];
            $ID_projet = $_REQUEST["ID_projet"];
			$traget_img="../../espace_etudiantentrepreneur/images/img_projet/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
			//il faut vérifier que l'etudiant formateur n'existe pas dans la bdd 
			$recherche = select('projet',$ID_projet,'ID_projet');
			$rech2 = select('projet',$libelle,'libelle');
			if($recherche == null && $rech2 == null){ //Si l'etudiant existe dons table etudiant et n'existe pas dans table etudiant formateur donc on l'ajoute
				$tab = array(
				"ID_projet"=>$ID_projet,	
				"libelle" => $libelle,
				"description"=>$description,
				"ID_etudiant" => $ID_etudiant,
				"photo" => $upload
			);				
				insert('projet',$tab);
				$verificationP=2;
			}	
            else{
            $verificationP=3;
            }
        }
 ?>