<?php
  class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=phpcrud', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected successfully";
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
            echo "failed to connect";
		}
      }
      
      return self::$instance;
    }
  }
?>