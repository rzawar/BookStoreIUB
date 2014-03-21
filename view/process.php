<?php
include '../model/database.php';

if(isset($_GET['username']) and isset($_GET['fname']) and isset($_GET['lname']) and isset($_GET['email']) and isset($_GET['password']) and isset($_GET['address']) and isset($_GET['phoneno']) and isset($_GET['dob'])){
 $db = new Database('../include/vars.php');
 $username = $_GET['username'];
 $fname = $_GET['fname'];
 $lname = $_GET['lname'];
 $email = $_GET['email'];
 $password = $_GET['password'];
 $address = $_GET['address'];
 $phoneno = $_GET['phoneno'];
 $dob = $_GET['dob'];

$sql_insert = "INSERT INTO `users` VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$phoneno', '$dob');";
mysql_query($sql_insert) or die("Insertion Failed:" . mysql_error());
echo "User registered succesfully, please log in";

exit();
}
else{
echo "please enter all the required fields!!!";
exit();
}
?>