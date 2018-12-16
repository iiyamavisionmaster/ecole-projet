<?php

class DeleteTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function deleteTable($dbname, $tablename)
	{

		$DeleteTable = new DeleteTableModel($this->pdo);
		$result = $DeleteTable->deleteTable($dbname, $tablename); 
		return $result;
	} 
	public function setPDO($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPDO()
	{
		return $this->pdo;
	}

	public function render(  $openParameter){ 
		
		return $this->deleteTable($openParameter->dataBase, $openParameter->table);
	}
}