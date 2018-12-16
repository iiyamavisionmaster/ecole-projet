<?php

class DeleteDatabase{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function deleteBD($dbname, $tablename)
	{
		$DeleteDB = new DeleteDB($this->pdo);
		$result = $DeleteDB->deleteBD($dbname); 
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
		
		return $this->deleteBD($openParameter->dataBase, $openParameter->table);
	}
}