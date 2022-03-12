<?php

//mysqli Object Oriented Approach
require_once __DIR__.'/dbconnect.php';

class DB{
	
	protected $DB;
	
	public function __construct(){
		global $conn;
		$this->DB = $conn;
	}
	
	public function getConnection(){
		return $this->DB;
	}
	
}

$DB = new db();
#print_r($db->getConnection());