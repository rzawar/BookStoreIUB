<?php

class User{

	private $username;
	private $fname;
	private $lname;
	private $email;
	private $password;
	private $address;
	private $phoneno;
	private $dob;
	
	public function __construct($username, $fname,$lname,$email,$password,$address,$phoneno,$dob){
	
		$this->username = $username;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->password = $password;
		$this->address = $address;
		$this->phoneno = $phoneno;
		$this->dob = $dob;
	
	}
	
	public function insertUser(){
		include 'database.php';
		$db = new Database('../include/vars.php');
	
		$query = "INSERT INTO `users` VALUES ('$this->username', '$this->fname', '$this->lname', '$this->email', '$this->password', '$this->address', '$this->phoneno', '$this->dob')";
		return mysql_query($query) or die("Insertion Failed:" . mysql_error());
	}
}
?>
