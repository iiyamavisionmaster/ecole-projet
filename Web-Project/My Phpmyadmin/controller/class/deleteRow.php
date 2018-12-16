<?php

class DeleteRow{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function deleteRow($dbname, $tablename, $column, $value)
	{

		$DeleteTable = new DeleteModel($this->pdo);
		$result = $DeleteTable->deleteRow($dbname, $tablename, $column, $value); 
		return $result;
	} 
	protected function getPrimaryKey($dbname, $tablename)
	{

		$DeleteTable = new DeleteModel($this->pdo);
		$result = $DeleteTable->getPrimaryKey($dbname, $tablename); 
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
			$i = 0;
			$database = $openParameter->dataBase;
			$table = $openParameter->table;
			$key = new DeleteModel($this->pdo);
			$key = $this->getPrimaryKey($database, $table);
			$keys = $openParameter->key;
			$values = $openParameter->value;
			 while ($keys[$i] != $key[0] && $keys[$i] != "Action")
			 {
			 	$i++;
			 }
			$value = $values[$i];
			return $this->deleteRow($openParameter->dataBase, $openParameter->table,
				$key[0]	, $value);
		}
		
}