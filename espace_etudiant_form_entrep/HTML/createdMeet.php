<?php
        require_once("requettes.php");
		if(empty($_REQUEST['id_meet']) || empty($_REQUEST['titre_meet']) || empty($_REQUEST['description']) ||empty($_REQUEST['date_meet']) || empty($_REQUEST['prix']) || !isset($_REQUEST['nombre_participants']) || empty($_REQUEST['ID_etudiant'])  || empty($_FILES['photo']['name'])){
			$verificationM=0;	
		}
		else{
			$id_meet = $_REQUEST["id_meet"];
			$titre_meet = $_REQUEST["titre_meet"];
			$description = $_REQUEST["description"];
			$date_meet = $_REQUEST["date_meet"];
			$prix = $_REQUEST["prix"];
			$nombre_participants = $_REQUEST["nombre_participants"];
			$ID_etudiant = $_REQUEST["ID_etudiant"];
			$traget_img="../../espace_etudiantformateur/images/img_meet/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);
			//il faut vérifier que le meet n'existe pas dans la bdd et que l'etudiant formateur existe
			$recherche = select('meet',$id_meet,'id_meet');
            $recherche2 = select('etudiant_formateur',$ID_etudiant,'ID_etudiant');
			if($recherche==null && $recherche2!=null){ //Si l'etudiant formateur existe dons table etudiant formateur et le meet n'existe pas dans table meet donc on l'ajoute
				$tab = array(
				"id_meet" => $id_meet,
				"titre_meet" => $titre_meet,
				"description" => $description,
				"date_meet" => $date_meet,
				"prix" => $prix,
				"nombre_participants" => $nombre_participants,
				"ID_etudiant" => $ID_etudiant,
				"photo" => $upload
				);				
				insert('meet',$tab);
				$verificationM=2;
			}	
            //si meet existe
			elseif($recherche!=null){
				$verificationM=1;
			}
            //si etudiant formateur n'existe pas
            elseif($recherche2==null){
            $verificationM=3;
            }
        }
?>