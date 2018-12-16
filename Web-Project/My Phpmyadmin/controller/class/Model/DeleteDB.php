<?php

class DeleteDB{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){
		$this->pdo = $pdo;
	}

	public function deleteBD($dbname){
		$sql = "DROP DATABASE $dbname";
		if ($this->pdo->exec($sql)){
			return true;
		}
		else {
			return false;
		}
	}
}