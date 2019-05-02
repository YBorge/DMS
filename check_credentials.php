<?php
session_start();
ini_set("display_errors","0");
require_once("./Connection/MyCon.php");
require_once("./WebPages/function_library.php");

$username=$_POST['uname'];
$password=$_POST['upass'];

$username=base64_decode($username);
$password=base64_decode($password);

$check=sql_call($username,"Invalid Data...!","index.php");
$check=sql_call($password,"Invalid Data...!","index.php");

$m_uname_hsh=$_POST['uname_hsh'];
$m_upass_hsh=$_POST['upass_hsh'];

if(($m_uname_hsh!=md5($username)) or ($m_upass_hsh!=md5($password)))
{
	alert_fail("index.php","Attempt To Tamper Data Detected...!");
	exit();
}

$mypass=base64_encode($password);

$word_to_compare=$_POST['captcha'];
$word_to_compare_with=STRTOUPPER($_SESSION['random_number']); 
sql_call($word_to_compare,"Invalid Data","./index.php");

if($word_to_compare!=$word_to_compare_with) //to use captcha uncomment this code 
{
	fail_alert("Invalid Captcha.....!","./index.php");
	exit();
}

/* $chk_disable=get_val("select count(*) as cnt from admin_login where username='$username' AND password='$mypass' and user_disable='Y'","cnt");
if($chk_disable!='0'){
	fail_alert("This user is already disabled from the system..!!!" ,"./index.php");
	die();
} */

//$sql="call sp_select_user_login('$username','$mypass')";
$sql = "select sr_no,username,password,user_type,role_id from admin_login where username='$username' AND password='$mypass' LIMIT 1";// die();
$result = fexecute($sql);
$num = fnum_rows($result);
$row=farray_fetch($result);
$uid=$row['sr_no'];
$u_type=$row['user_type'];
$role_id=$row['role_id'];
$username=$row['username'];
if($num==1)
{
	$_SESSION['username'] = $username;
	$_SESSION['sr_no'] = $uid;
	$_SESSION['type'] = $u_type;
	$_SESSION['role_id'] = $role_id;
	$role=explode(',',$role_id);
	$_SESSION['role']=$role;
	header('location: ./WebPages/admin_login_success.php');
}
else{
	fail_alert("Your Username or Password is Incorrect" ,"./index.php");
}
F_db_close($conn); ?>