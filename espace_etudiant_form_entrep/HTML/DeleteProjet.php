<?php
  function connexionDB(){
    $host = 'mysql-webelieveinyou.alwaysdata.net';
    $dbname ='webelieveinyou_projet';
    $login ='312039';
    $pass ='AlaEmna11171524';
    try{
      $pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
      return $pdo;
    } catch(PDOException $e) {
      die ($e->getMessage()); 
    }
  }
  $ID_projet = $_POST['ID_projet'];
  if (isset( $ID_projet)) {
    $pdo = connexionDB();
    try {
      $sql = "DELETE FROM projet WHERE ID_projet = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $ID_projet]);
      echo "L'élément a été supprimé.";
    } catch(PDOException $e) {
      die ($e->getMessage()); 
    }
  }
?>

