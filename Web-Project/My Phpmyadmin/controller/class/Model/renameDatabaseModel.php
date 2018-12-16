<?php

class renameDatabaseModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){
		$this->pdo = $pdo;
	}

	public function renameDatabaseModel($dbname, $renameDatabase){
		$file = fopen("../mysqlpath.ini", "a+");
		$pathSQL = fgets($file, 4096);
		fclose($file);
		$this->pdo->exec("CREATE DATABASE ".$renameDatabase." CHARACTER SET 'utf8'"); 
		exec("cd \"$pathSQL\";");
		exec($pathSQL.'\mysqldump -uroot --password=root '.$dbname.' > "'.$pathSQL.'\temp.sql"');
		exec($pathSQL.'\mysql -uroot --password=root '.$renameDatabase.' < "'.$pathSQL.'\temp.sql"');
		$this->pdo->exec("DROP DATABASE ".$dbname);

	}
}