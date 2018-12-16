
<?php

class addColumn{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function addColumn($dbname, $table, $newColumnName, $newColumnType)
	{
		$AlterTableModel = new AlterTableModel($this->pdo);
		$result = $AlterTableModel->addColumn($dbname, $table, $newColumnName, $newColumnType); 
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
		
		return $this->addColumn($openParameter->dataBase, $openParameter->table, $openParameter->newColumnName, $openParameter->newColumnType);
	}
}