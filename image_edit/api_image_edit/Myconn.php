<?php 
error_reporting(0);
ini_set('display_errors',0);

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dms";
/*mysql_connect($host, $username, $password)or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");*/
$conn = new mysqli($host,$username,$password,$db_name) or die("Oops connect went wrong");
?>