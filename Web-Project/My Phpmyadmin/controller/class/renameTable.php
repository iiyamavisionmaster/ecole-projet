
<?php

class renameTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function renameTable($dbname, $table, $newTableName)
	{
		$TableModel = new TableModel($this->pdo);
		$result = $TableModel->newTableName($dbname, $table, $newTableName); 
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
		
		return $this->renameTable($openParameter->dataBase, $openParameter->table, $openParameter->newTableName);
	}
}