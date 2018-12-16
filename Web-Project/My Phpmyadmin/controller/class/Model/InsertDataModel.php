<?php

class InsertDataModel{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function setPDO($pdo){

		$this->pdo = $pdo;
	}

	public function insert($dbname, $tablename, $columns, $values){
		$str = "";
		$str2 = "";
		$str3 = "";
		foreach ($columns as $key => $column) {
			if ($str == "")
			{
				$str = $column;
			}
			else
			{
				$str = $str.", ".$column;
			}
		}
		$i = 0;
				foreach ($columns as $key => $column)
				{
					if ($str3 == "")
						$str3 = "$values[$i]";
					else
						$str3 = $str3.", $values[$i]";
					$i++;
				}
		$req = $this->pdo->prepare("INSERT INTO $dbname.$tablename ($str) VALUES ($str3)");
			$req->execute();
	}
}
