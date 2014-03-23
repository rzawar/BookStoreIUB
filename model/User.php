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
	
	public function __construct(){

		include 'database.php';
		$db = new Database('../include/vars.php');
	
	}
	public function setObject($username, $fname,$lname,$email,$password,$address,$phoneno,$dob){
	
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
	
		$query = "INSERT INTO `users` VALUES ('$this->username', '$this->fname', '$this->lname', '$this->email', '$this->password', '$this->address', '$this->phoneno', '$this->dob')";
		return mysql_query($query) or die("Insertion Failed:" . mysql_error());
	}
	public function getUserDetails($username){
		$query = "SELECT * FROM `users` WHERE username = \"$username\" " ; 
		$result = mysql_query($query) or die("cannot select user :" .mysql_error());
		return $result;
	}
	public function modifyUser($username,$fname,$lname,$email,$address,$phoneno,$dob){
		$query = "UPDATE `users` SET fname = \"$fname\" , lname = \"$lname\" , email = \"$email\" , address = \"$address\" , phoneno = $phoneno , dob = $dob WHERE username = \"$username\" ;";
		$result = mysql_query($query) or die("cannot update user :" .mysql_error());
		return $result;
	}
	public function getBooksUser($username){
		$query = "Select * from `books` where username = \"$username\";";
		$result = mysql_query($query) or die("cannot find books :" .mysql_error());
		return $result;
	}
}
?>
