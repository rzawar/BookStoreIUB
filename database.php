<?php

class Database{
 
 private $host;
 private $user;
 private $password;
 private $database;
 
 function __construct($fileName){

	if(is_file($fileName))
		include 'vars.php';
	else 
		throw new Exception("Error including file");
		
	$this->host 	= $host;
	$this->user 	= $user;
	$this->password = $password;
	$this->database = $database;
	
	$this->connect();
 }
 private function connect(){
	if(!mysql_connect($this->host,$this->user,$this->password))
		throw new Exception("Error: Connecting Database");
	 
	if(!mysql_select_db($this->database))
		throw new Exception("Error: Selecting Database");
 }

}
?>