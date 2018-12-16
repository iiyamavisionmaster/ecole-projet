<?php

class test{

	protected $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function render(  $openParameter){ 
		
		return "test";
	}
}