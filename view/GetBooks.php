<?php


mysql_connect("localhost", "root", "");
mysql_select_db("iubookshelf");

if(isset($_GET['query'])){
$title = $_GET['query'];
$result = mysql_query("SELECT * FROM `books` where title = '$title'");          //query
$array = mysql_fetch_row($result);                          //fetch result    
echo json_encode($array);
exit();
}
?>