<?php

class updateRow{

  protected $pdo;
  public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  protected function updateRow($dbname, $table,$columns,$values)
  {
    $data = "";
    $id="id";
    $temp = new DeleteModel($this->pdo);
    $id = $temp->getPrimaryKey($dbname, $table);
    $temp = new TableModel($this->pdo);
    $data = $temp->updateRow($dbname,$table,$columns,$values,$id[0]);
 
    return $data;
  } 
  protected function setPDO($pdo)
  {
    $this->pdo = $pdo;
  }

  protected function getPDO()
  {
    return $this->pdo;
  }

  public function render( $openParameter){ 
    return $this->updateRow($openParameter->dataBase, $openParameter->table,$openParameter->columns,$openParameter->values);
  }
}