<?php

class Nav{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function getDatabaseModel($dbname, $tablename){ 
		$dataBasesObj = new ShowDatabaseModel($this->pdo);
		$dataBases = $dataBasesObj->showAllDatabase();
		return $dataBases;
	}
	protected function getAllTables($dbname){ 
		$temp = new ShowTablesModel($this->pdo);
		$columns = $temp->showAllTables($dbname);
		return $columns;
	}
	public function setPDO($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPDO()
	{
		return $this->pdo;
	}
	public function render(  $openParameter ){ 
		$data = array();
		$data[0] = array();
		$dataFinal = array();$i=0;
		array_push($data[0] , $this->getDatabaseModel($openParameter->dataBase, $openParameter->table)); 
		foreach ($data[0] as $key => $value) { 
		
			foreach ($value as $k => $v) {
			  

					array_push($dataFinal,array($v[0] => $this->getAllTables($v[0])));
			 
				$i++;

			} 
		}  
		return $dataFinal;
	}
}