<?php

class ExecSQLModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){
		$this->pdo = $pdo;
	}

	public function execSQL($sql){
		return $this->pdo->exec($sql);
	}
	public function querySQL($sql)
	{
		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		return $rows;
	}
	
}