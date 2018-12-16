<?php

class AlterTableModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){

		$this->pdo = $pdo;
	}

	public function addColumn($dbname, $tablename, $columnname, $type){

		$sql = "ALTER TABLE $dbname.$tablename ADD $columnname $type";
		if ($this->pdo->exec($sql))
			{
				return true;
			}
		else
			{
				return false;
			}
	}
	public function deleteColumn($dbname, $tablename, $columnname){

		$sql = "ALTER TABLE $dbname.$tablename DROP COLUMN $columnname";
		if ($this->pdo->exec($sql))
			{
				return true;
			}
		else
			{
				return false;
			}
	}
}