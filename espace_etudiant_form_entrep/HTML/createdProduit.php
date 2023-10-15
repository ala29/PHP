<?php
        require_once("requettes.php");

		if(empty($_REQUEST['ID_produit']) || empty($_REQUEST["libelle"])|| empty($_REQUEST["description"]) || empty($_REQUEST["ID_projet"]) || empty($_REQUEST["prix"]) || empty($_REQUEST["stock"]) || empty($_REQUEST["categorie"]) || empty($_FILES['photo']['name'])){
			$verificationPO=0;	
		}
		else{
			$ID_produit = $_REQUEST["ID_produit"];
			$libelle = $_REQUEST["libelle"];
            $description = $_REQUEST["description"];
            $prix = $_REQUEST["prix"];
            $stock = $_REQUEST["stock"];
            $ID_projet = $_REQUEST["ID_projet"];
            $categorie = $_REQUEST["categorie"];
			$traget_img="../../espace_etudiantentrepreneur/images/img_produit/";
			$upload=$traget_img.basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"],$upload);

			$recherche = select('produits',$ID_produit,'ID_produit');

			if($recherche == null ){ 
				$tab = array(
                "ID_produit"=> $ID_produit ,   	
                "libelle"=> $libelle ,
                "description"=> $description ,
                "prix"=> $prix ,
                "stock"=> $stock ,
                "ID_projet"=> $ID_projet,
                "categorie"=> $categorie ,	
                "photo" => $upload

            );				
				insert('produits',$tab);
				$verificationPO=2;
			}	

            else{
            $verificationPO=3;
            }
        }
 ?>