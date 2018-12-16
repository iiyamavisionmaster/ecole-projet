<?php

class getDatabaseContent{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function selectDatabaseContent($dbname, $tablename)
	{
		$data = array();
		$data[0] = array();
		$data[1] = array();
		$data[2] = array();
		$data[3] = array();
		$tables = null;
 		$temp = new ShowTablesModel($this->pdo);
		$tables = $temp->showAllTables($dbname); 
		$temp = new getDatabaseStat($this->pdo);	
	 	$dataStatNbTable["NbTable"]=$temp->showDatabaseNbTable($dbname);
	 	$dataStatDate["Date"]=$temp->showDatabaseDate($dbname);
		$dataStatMemory["Memory"]=$temp->showDatabaseMemory($dbname);
		$data[0]  = array_merge($data[0] , $tables);
		
		$data[1]  = array_merge($data[1] , $dataStatNbTable);
		$data[2]  = array_merge($data[2] , $dataStatDate);
		$data[3]  = array_merge($data[3] , $dataStatMemory);
		
		return $data;
	} 
	protected function setPDO($pdo)
	{
		$this->pdo = $pdo;
	}

	protected function getPDO()
	{
		return $this->pdo;
	}

	public function render(  $openParameter){ 
 
		return $this->selectDatabaseContent($openParameter->dataBase, $openParameter->table);
	}
}