<?php

mysql_connect("localhost", "root", "");
mysql_select_db("iubookshelf");

if(isset($_GET['username'])){

echo $username = $_GET['username'];
echo $fname = $_GET['fname'];
echo $lname = $_GET['lname'];
echo $email = $_GET['email'];
echo $password = $_GET['password'];
echo $address = $_GET['address'];
echo $phoneno = $_GET['phoneno'];
echo $dob = $_GET['dob'];

$sql_insert = "INSERT INTO `users` VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$phoneno', '$dob');";
echo mysql_query($sql_insert) or die("Insertion Failed:" . mysql_error());

exit();
}
?>