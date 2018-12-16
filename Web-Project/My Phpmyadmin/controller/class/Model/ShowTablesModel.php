<?php

class ShowTablesModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function showAllTables($dbname){

		$sql = "show TABLES FROM $dbname";
		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		return  $rows ;
	}
	public function setPDO($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPDO()
	{
		return $this->pdo;
	}
}