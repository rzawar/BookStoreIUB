<?php


mysql_connect("localhost", "root", "");
mysql_select_db("iubookshelf");

if(isset($_GET['id'])){
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM `books` where bookid = '$id'");          //query
$array = mysql_fetch_row($result);                          //fetch result    
echo json_encode($array);
exit();
}
?>