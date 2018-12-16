<?php

class ExecSQL{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function execSQL($sql)
	{
		$ExecSQLModel = new ExecSQLModel($this->pdo);
		if (stripos($sql, "SELECT")===false) {
			
		$result = $ExecSQLModel->execSQL($sql); 
		}
		else
		{
			$result=$ExecSQLModel->querySQL($sql);
		}
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
		 
		return $this->execSQL($openParameter->sql);
	}
}