<?php

class TableModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function newTable($dbname, $newTable){

		$sql = "CREATE TABLE $dbname.$newTable (id  INT);";
		$result = $this->pdo->exec($sql); 
		return  $result ;
	}
	public function newTableName($dbname, $table, $newTableName){
		$sql = "ALTER TABLE $dbname.$table RENAME $dbname.$newTableName";
		$result = $this->pdo->exec($sql); 
		return  $result ;
		
	}
	public function countTable($dbname, $tablename){
		$sql = "SELECT COUNT(*) FROM $dbname.$tablename";
		$stmt = $this->pdo->query($sql);  
		$rows =$stmt->fetchAll(); 
		
		return  $rows ;
	}
	public function renameTable($dbname, $table,$newColumnName, $columnName, $columnType, $length){
		$sql = "ALTER TABLE $dbname.$table
  CHANGE $columnName $newColumnName $columnType;";
 		$result = $this->pdo->exec($sql);  
		return $result;
	}
	public function truncateTable($dbname,$table){
		$sql ="TRUNCATE TABLE $dbname.$table";
 		$result = $this->pdo->exec($sql);  
		return $result;
	}
	public function getColumnTableById($dbname,$table,$columnIdName,$id){
		$sql ="SELECT * FROM $dbname.$table WHERE $columnIdName=$id";
 		$result = $this->pdo->exec($sql);  
		return $result;
	}
	public function updateRow($dbname,$table,$columns,$values,$id){
		$str ="";
		$indexPrimary = "";
		for ($i=0; $i <count($columns) ; $i++) { 
			if ($i == count($columns)-1) {
				$str.= "$columns[$i]=\"$values[$i]\"";	
			}
			else{
				$str.= "$columns[$i]=\"$values[$i]\",";	
			}
			if ($columns[$i] == $id) {
				$indexPrimary = $values[$i];
			}
		}
		$sql ="UPDATE $dbname.$table SET $str WHERE $id=\"$indexPrimary\"";
 		$result = $this->pdo->exec($sql);  
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
}