<?php

class CreateDatabase{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function createTable($dbname, $tablename)
	{
		$CreateDBModel = new CreateDBModel($this->pdo);
		$result = $CreateDBModel->createDB($dbname); 
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
		
		return $this->createTable($openParameter->dataBase, $openParameter->table);
	}
}