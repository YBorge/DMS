<?php

require_once('../../Connection/MyCon.php');
require_once("../../WebPages/function_library.php"); 
ob_start();
error_reporting(0);
ini_set('display_errors',0);
header("Content-type: image/jpeg");
	$imgPath = $_GET['src'];
	$utype=$_GET['utype'];
  //  $imgPath = 'default.jpg';
    $image = imagecreatefromjpeg($imgPath);
    $color = imagecolorallocate($image, 0, 0, 0);
   // $color = imagecolorallocate($image, 255, 0, 0); // red color
	$sql="select * from layers where img_src='$imgPath' and status='1'";
	$result=fexecute($sql);
	while($data=farray_fetch($result))
	{ 
		//$string = $_GET['text'];
		$string=$data['text'];
		$fontSize = 20;
		//$x = $_GET['x'];
		$x=$data['x'];
		//$y = $_GET['y'];
		$y=$data['y'];
		$approv_stat=$data['approv_stat'];
		$change_by=$data['change_by'];
		//$id = $_GET['id'];
		if ($utype!='s') 
		{
			if ($approv_stat=='A') {
			imagestring($image, $fontSize, $x, $y, $string, $color);
			}
		}elseif ($utype=='s') 
		{
			imagestring($image, $fontSize, $x, $y, $string, $color);
		}
		
		
	 } 
      
   // imageellipse($image, 500, 500, 600, 700, $color);
    
    imagejpeg($image);
	

//$new_file = 'header-bg.jpg';
//$file = file_put_contents($new_file,$new_image_data);
?> 