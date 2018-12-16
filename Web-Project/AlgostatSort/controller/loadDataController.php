<?php
require "sortClass.php";
if (isset($_GET["dataType"])){
	$dataType=$_GET["dataType"];
	$nbItem=$_GET["nbItem"];
	$nbExec = $_GET["nbExec"];
	
	echo json_encode(getChronoAllSort($nbExec, $dataType,$nbItem));
	
}

?>