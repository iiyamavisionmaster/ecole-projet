<?php

class setFileSql{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function setFileSql($mysqlPath)
	{
		$file = fopen("../mysqlpath.ini", "w+");
		$result=fwrite($file, $mysqlPath);
		fclose($file);
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

	public function render($openParameter){ 
			
		return $this->setFileSql($openParameter->mysqlPath);
	}
}