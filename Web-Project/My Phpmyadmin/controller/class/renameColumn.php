<?php

class renameColumn{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function renameColumn($dbname,$table, $newColumnName, $columnName, $newColumnType)
	{
		$TableModel = new TableModel($this->pdo);
		$result = $TableModel->renameTable($dbname,$table, $newColumnName, $columnName, $newColumnType, 0); 
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
		
return $this->renameColumn($openParameter->dataBase, $openParameter->table, $openParameter->newColumnName, $openParameter->columnName, $openParameter->newColumnType);
	}
}