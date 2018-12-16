<?php 
 
class Autoloader{

 
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

 
    static function autoload($class){ 
        if (file_exists('class/' . $class . '.php')) 
        	require 'class/' . $class . '.php';
        else if(file_exists('class/Model/' . $class . '.php'))
        	require 'class/Model/'.$class. '.php'; 
    }

}
/*require '../Autoloader.php';
Autoloader::register();*/
 ?>