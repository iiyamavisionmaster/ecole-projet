<?php
require 'Autoloader.php'; 
Autoloader::register(); 
require "controller/Auth.php";
session_start();

if(Auth::islog() == true)
{
    header("Location: http://localhost/public/index.php"); 
}else { 
	require "view/login.php";
}