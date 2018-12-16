<?php

class ContentTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function selectTable($dbname, $tablename)
	{
		$data = array();
		$data[0] = array();
		$data[1] = array();
		$columns = null;
		$temp = new ShowColumnTableModel($this->pdo);
		$columns = $temp->showColumn($dbname, $tablename);
		$temp = new SelectModel($this->pdo);	
	 	$dataTable=$temp->selectTable($dbname, $tablename);
		$data[0]  = array_merge($data[0] , $columns);
		
		$data[1]  = array_merge($data[1] , $dataTable);
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

	public function render( $openParameter){ 

		return $this->selectTable($openParameter->dataBase, $openParameter->table);
	}
}