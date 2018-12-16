<?php 

	require_once '../Autoloader.php'; 
	Autoloader::register(); 
	require_once "../config.php";

	if (isset($_POST["login"]) && isset($_POST["pass"])) {
		$caught=false;
		try {
			$db = new PDO( "mysql:host=".$cfg["host"], $cfg["user"], $cfg["pass"],    array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true,
				PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
				));
		}
		catch(PDOException $e) {
			//echoB("Impossible de se connecter veuillez verifier votre fichier de config !<br>".$e,"alert-danger");
			echo  "Impossible de se connecter a la DB voir fichier config.php <br>error: $e";
			$caught = true;
			die();
		}
		if (!$caught) {
			echo "true";
		}
	}
	else
		echo "Veuillez renseigner un login et un password";
?>