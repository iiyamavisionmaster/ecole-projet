<?php

class DeleteTableModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){

		$this->pdo = $pdo;
	}

	public function deleteTable($dbname, $tablename){

		$sql = "DROP TABLE $dbname.$tablename";
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
