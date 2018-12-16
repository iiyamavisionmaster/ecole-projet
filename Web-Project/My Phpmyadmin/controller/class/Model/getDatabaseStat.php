<?php
class getDatabaseStat{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function showDatabaseNbTable($dbname)
	{
		$sql = "SELECT count(*) AS totalTables 
		FROM INFORMATION_SCHEMA.TABLES
		WHERE TABLE_SCHEMA = '$dbname';";
		$stmt = $this->pdo->query($sql);  
		$rows =$stmt->fetchAll();
		
		return $rows ;
	}
	public function showDatabaseDate($dbname){
		$sql = "SELECT MIN(create_time)
		FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '$dbname'
		";
		$stmt = $this->pdo->query($sql);  
		$rows =$stmt->fetchAll();
		
		return $rows ;

	}
	public function showDatabaseMemory($dbname){
		$sql = "SELECT  sum(round(((data_length + index_length) / 1024 / 1024 ), 2))  as 'Size'
		FROM information_schema.TABLES
		WHERE table_schema = '$dbname'
		";
		$stmt = $this->pdo->query($sql);  
		$rows =$stmt->fetchAll();
		
		return $rows ;

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