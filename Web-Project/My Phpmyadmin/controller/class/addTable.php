
<?php

class addTable{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	protected function addTable($dbname, $newTable)
	{
		$TableModel = new TableModel($this->pdo);
		$result = $TableModel->newTable($dbname, $newTable); 
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
		
		return $this->addTable($openParameter->dataBase, $openParameter->newTable);
	}
}