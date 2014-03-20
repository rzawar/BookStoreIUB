<?php

session_start();
//$login = $_SESSION['login'];
//$login->close();
session_unset();
session_destroy();
header("Location: login.php"); 
?>