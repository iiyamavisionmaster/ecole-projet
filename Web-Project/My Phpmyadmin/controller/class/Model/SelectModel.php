<?php

class SelectModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function selectTable($dbname, $tablename)
	{
		$sql = "SELECT * FROM $dbname.$tablename";
		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		return $rows;
	}

	public function selectRowById($dbname, $tablename, $colone , $data)
	{
		$sql = "SELECT * FROM $dbname.$tablename WHERE $colone = '$data'";
		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		echo json_encode($rows);
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