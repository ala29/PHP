<?php


          function connexionDB(){
            $host = 'mysql-webelieveinyou.alwaysdata.net';
            $dbname ='webelieveinyou_projet';
            $login = '312039';
            $pass ='AlaEmna11171524';
            try{
                $pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
               return $pdo;
            } catch(PDOException $e) {
                    die ($e->getMessage()); 
                }
            }

           

        function select($table,$cle_primaire,$primary){
            $pdo=connexionDB();
         $sql = "SELECT * from ".$table." WHERE ".$primary."=:cle_primaire";
	    $req_prep = $pdo->prepare($sql);
	    $req_prep->bindParam(":cle_primaire", $cle_primaire);
	    $req_prep->execute();
	    $rslt=$req_prep->fetchall();
	    if ($rslt==0){
			return null;
			die();
	  	}else{
			return $rslt;
		}
	      
        }

        function insert($table,$tab){
            $pdo=connexionDB();
            $sql = "INSERT INTO ".$table." VALUES(";
            foreach ($tab as $cle => $valeur){
                $sql .=" :".$cle.",";
            }
            $sql=rtrim($sql,",");
            $sql.=");";
            $req_prep =$pdo->prepare($sql);
            $values = array();
            foreach ($tab as $cle => $valeur)
                      $values[":".$cle] = $valeur;
            $req_prep->execute($values);
          }

          function selectall($table,$ligne){
            $pdo=connexionDB();
            try{
            $sql="SELECT * FROM ". $table." LIMIT ".$ligne;
            $reponse=$pdo->query($sql);
            return $reponse;
          }catch(PDOException $e) {
            die ($e->getMessage()); 
        }
      }
        function SELECTALLL($table){
          $pdo=connexionDB();
          try{
          $sql="SELECT * FROM ". $table;
          $reponse=$pdo->query($sql);
          return $reponse;
            }catch(PDOException $e) {
              die ($e->getMessage()); 
            }
            }
            function updateProjet($table ,$primary){
              $pdo=connexionDB();
              $ID_etudiant = $_REQUEST["ID_etudiant"];
              $libelle = $_REQUEST["libelle"];
              $description = $_REQUEST["description"];
              $ID_projet = $_REQUEST["ID_projet"];
              try{
                $sql = "UPDATE ".$table." SET libelle ='".$libelle."' , description ='".$description."' WHERE ID_projet=".$ID_projet.";";
                $reponse=$pdo->query($sql);
              return $reponse;
              }catch(PDOException $e) {
                die ($e->getMessage()); 
              }
            }

            function deleteMeet($table,$primary){
              $pdo=connexionDB();
              try{
                $sql="DELETE FROM ". $table ." WHERE ID_meet= ". $primary. ";";
                $reponse=$pdo->query($sql);
              return $reponse;
              }catch(PDOException $e) {
                die ($e->getMessage()); 
              }
    
            }





?>    