<?php

class CreateDBModel{

	protected	$pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function createDB($dbname)
	{
		$sql = "CREATE DATABASE $dbname";
		echo "$sql";
		if ($this->pdo->exec($sql))
				return true;
		else
				return false;
	}

	public function databaseExist(){

	}

	public function setPDO($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPDO()
	{
		return $this->pdo;
	}
}