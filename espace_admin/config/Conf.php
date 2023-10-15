<?php
class Conf {
  static private $debug = True;
  static private $databases = array(
    'hostname' => 'mysql-webelieveinyou.alwaysdata.net',
    'database' => 'webelieveinyou_projet',
    'login' => '312039',
    'password' =>'AlaEmna11171524',
  );
   
  static public function getLogin() {
    return self::$databases['login'];
  }
  
  static public function getHostname(){
	  return self::$databases['hostname'];
  }
  
  static public function getDatabase(){
	  return self::$databases['database'];
  }

  static public function getPassword(){
	  return self::$databases['password'];
  }
  
  static public function getDebug() {
      return self::$debug;
  }
}
?>
