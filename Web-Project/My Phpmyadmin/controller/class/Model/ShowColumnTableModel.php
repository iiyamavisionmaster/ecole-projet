<?php

class ShowColumnTableModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function showColumn($dbname, $tablename){

		$sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$tablename' AND table_schema = '$dbname'";

		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		return $rows;
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