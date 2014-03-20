<?php

class Book{

	private $bid;
	private $isbn;
	private $title;
	private $edition;
	private $author;
	private $copies;
	private $publisher;
	private $price;
	private $year;
	private $user;
	private $type;
	
	
	function __construct(){
	
	}
	function setBookData($bid,$isbn,$title,$edition,$author,$copies,$publisher,$price,$year,$user,$type){
	
	$this->bid =$bid;
	$this->isbn =$isbn;
	$this->title = $title;
	$this->edition = $edition;
	$this->author =$author;
	$this->copies = $copies;
	$this->publisher =   $publisher;
	$this->price =  $price;
	$this->year = $year;
	$this->user =$user;
	$this->type = $type;
	
	}
	function connectDB(){
		include 'database.php';
		$db = new Database('../include/vars.php');
	}
	function insertBook(){
		$this->connectDB();
	
		$query = "";
		return mysql_query($query) or die("Insertion Failed:" . mysql_error());
	}
	function getResult($query){
		$this->connectDB();
		$result = mysql_query("SELECT * FROM `books` where title = '$query' and type = \"sell\" ");          //query   
		return $result;	
	}

}

?>