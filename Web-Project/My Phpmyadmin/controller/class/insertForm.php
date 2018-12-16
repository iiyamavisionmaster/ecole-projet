<?php

class insertForm{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function selectTable($dbname, $tablename)
	{
		$data = array();
		$data[0] = array();
		$temp = new ShowColumnTableModel($this->pdo);
		$columns = $temp->showColumn($dbname, $tablename);
 

		$data[0]  = array_merge($data[0] , $columns); 
		 
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