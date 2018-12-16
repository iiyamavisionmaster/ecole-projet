<?php

class DeleteModel{
	private $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){
		$this->pdo = $pdo;
	}

	public function deleteRow($dbname, $tablename, $column, $value){
		$sql = "DELETE FROM $dbname.$tablename WHERE $column = $value";
		if ($this->pdo->exec($sql)){
			return true;
		}
		else {
			return false;
		}
	}

	public function getPrimaryKey($dbname, $tablename){

		$sql = "SHOW KEYS FROM $dbname.$tablename WHERE Key_name = 'PRIMARY'";
		$stmt = $this->pdo->query($sql); 
		$rows =$stmt->fetchAll();
		$i = 0;
		foreach ($rows as $value) {

			$list[$i] = $value["Column_name"];
			$i++;
		}
		return $list;
	}
}