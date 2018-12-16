<?php

class renameDatabase{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function renameDatabase($dbname, $renameDatabase)
	{
		$renameDatabaseModel = new renameDatabaseModel($this->pdo);
		$result = $renameDatabaseModel->renameDatabaseModel($dbname, $renameDatabase); 
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
		
		return $this->renameDatabase($openParameter->dataBase,$openParameter->renameDatabase);
	}
}