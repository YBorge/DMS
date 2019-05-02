<?php 
$host = "localhost";
$username = "root";
$password = "";
$db_name = "dms";
/* $conn=mysql_connect("$host","$username","$password") or die(mysql_error("Can not Connect"));
mysql_select_db("$db_name") or die(mysql_error("Can not Select Db")); */

$conn = new mysqli($host,$username,$password,$db_name) or die("Oops connect went wrong");
?>