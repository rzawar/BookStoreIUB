
<?php

	class Login{
		
		private $username;
		private $password;
		private $db; 
		
		function __construct($username,$password){
			//set data
			$this->setData($username,$password);
			//connect db
			$this->connectToDB();
			//get data
		}
	
		function setData($username,$password){	
			$this->username = $username;
			$this->password = $password;
		}
		
		function connectToDB(){
			include '../model/database.php';
			$vars = '../include/vars.php';
			$this->db = new Database($vars);		
		}
		
		function getData(){
			
			$getUserInfo = "select * from `users` where `username` ='$this->username' and password ='$this->password'";
			$user = mysql_query($getUserInfo);
			$no_user=mysql_num_rows($user);
			if($no_user > 0)
				return "user";
			else
				throw new Exception("Username or password is invalid , Please try again");
		}
		
		function close(){
			$this->db->close();
		}
		
	}

?>
