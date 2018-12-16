<?php

class getColumnTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function selectColumnTable($dbname, $tablename)
	{
		$data = array();
		$data[0] = array();
		$data[1] = array();
		$temp = new ShowColumnTableModel($this->pdo);
		$columns = $temp->showColumn($dbname, $tablename);
		$temp = new TableModel($this->pdo);
		$dataNbColumn["NbColumn"] = $temp->countTable($dbname, $tablename);
		$data[0]  = array_merge($data[0] , $columns);
		$data[1]  = array_merge($data[1] , $dataNbColumn);
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
 
		return $this->selectColumnTable($openParameter->dataBase, $openParameter->table);
	}
}