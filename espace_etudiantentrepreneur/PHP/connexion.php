<?php
function connexionDB(){
    try{
        $db = new PDO("mysql:host=mysql-webelieveinyou.alwaysdata.net;dbname=webelieveinyou_projet", "312039", "AlaEmna11171524");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
    catch(PDOException $exception){
        die($exception->getMessage());
    }
}

?>