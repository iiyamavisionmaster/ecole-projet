<?php

	//connection a la base
	require '../Autoloader.php';
	Autoloader::register(); 
	if(isset($_POST["openParameter"]))
	{
		$openParameter=json_decode($_POST["openParameter"]); 
		$type = $openParameter->type;
		//print_r($openParameter);
		if( $openParameter->dataBase!="noData")
		{  
			$temp = new $type(Connection::getDB());
			try {
				$data = $temp->render( $openParameter);
			} 
			catch (Exception $e) {
					$data = $e;
			}
			require "../view/$type.php";
		}
		else
			require("../view/$type.php");
	}
?>