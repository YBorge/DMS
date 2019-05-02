<?php 
$host = "localhost";
$username = "dmsdbuser";
$password = "P4aFraPRub#e";
$db_name = "dmsdb";
/* $conn=mysql_connect("$host","$username","$password") or die(mysql_error("Can not Connect"));
mysql_select_db("$db_name") or die(mysql_error("Can not Select Db")); */

$conn = new mysqli($host,$username,$password,$db_name) or die("Oops connect went wrong");
?>