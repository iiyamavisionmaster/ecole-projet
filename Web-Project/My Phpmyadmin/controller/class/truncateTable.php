<?php

class truncateTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function truncateTable($dbname,$table)
	{
		$TableModel = new TableModel($this->pdo);
		$result = $TableModel->truncateTable($dbname,$table); 
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
		
		return $this->truncateTable($openParameter->dataBase, $openParameter->table);
	}
}