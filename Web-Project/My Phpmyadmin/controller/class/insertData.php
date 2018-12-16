<?php

class insertData{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function insert($dbname, $tablename, $columns, $values)
	{
		$temp = new InsertDataModel($this->pdo);
		$result = $temp->insert($dbname, $tablename, $columns, $values);		 
		return $result;
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
 
		return $this->insert($openParameter->dataBase, $openParameter->table, $openParameter->columns, $openParameter->values);
	}
}