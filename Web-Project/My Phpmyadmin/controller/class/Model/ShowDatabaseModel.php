<?php
class ShowDatabaseModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function showAllDatabase()
	{
		$sql = "show Databases";
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