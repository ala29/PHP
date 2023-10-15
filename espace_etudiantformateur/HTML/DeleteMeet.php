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

if (isset($_POST['ID_meet'])) {
    $pdo = connexionDB();
    try {
        $sql = "DELETE FROM meet WHERE ID_meet = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_POST['ID_meet']]);
        echo "L'élément a été supprimé.";
    } catch(PDOException $e) {
        die ($e->getMessage()); 
    }
}
?>