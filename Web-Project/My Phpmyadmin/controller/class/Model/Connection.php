<?php



class Connection {

	protected static $_db;
	
	protected function __construct()
	{
		require "../config.php";

		try
		{
			self::$_db = new PDO( "mysql:host=".$cfg["host"], $cfg["user"], $cfg["pass"],    array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO	::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true,
			PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
			));
		}
		catch(PDOException $e)
		{
			echo("Impossible de se connecter veuillez verifier votre fichier de config !".$e);
			die();
		}
	}

	public static function getDB()
	{
		if (is_null(self::$_db)) {
			new Connection();
		}
		return self::$_db;
	}
}
?>