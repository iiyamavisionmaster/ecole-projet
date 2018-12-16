<?php

class DeleteColumn{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function deleteColumn($dbname, $tablename, $column)
	{

		$DeleteTable = new AlterTableModel($this->pdo);
		$result = $DeleteTable->deleteColumn($dbname, $tablename, $column); 
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
		
		return $this->deleteColumn($openParameter->dataBase, $openParameter->table, $openParameter->column);
	}
}