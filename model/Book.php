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
	
	function setBookData($isbn,$title,$edition,$author,$publisher,$price,$year,$user){
	
	//$this->bid =$bid;
	$this->isbn =$isbn;
	$this->title = $title;
	$this->edition = $edition;
	$this->author =$author;
	//$this->copies = $copies;
	$this->publisher =   $publisher;
	$this->price =  $price;
	$this->year = $year;
	$this->user =$user;
	//$this->type = $type;
	
	}
	function connectDB(){
		include 'database.php';
		$db = new Database('../include/vars.php');
	}
	function insertBook(){
		$this->connectDB();
	
		$query = "INSERT INTO `books`(isbn, title, edition, author, publisher, price, year, username, type) VALUES ('$this->isbn', 'this->title', 'this->edition', 
		'this->author', 'this->publisher', 'this->price', 'this->year', 'this->user', \"sell\");";
		return mysql_query($query) or die("Insertion Failed:" . mysql_error());
	}
	function getResult($query){
		$this->connectDB();
		$result = mysql_query("SELECT * FROM `books` where title = '$query' and type = \"sell\" ");          //query   
		return $result;	
	}

}

?>