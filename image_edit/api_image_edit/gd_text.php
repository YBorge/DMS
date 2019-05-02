<?php 
header ("Content-type: image/jpeg"); 
require('Myconn.php');
//$img_path = $_GET['path'];
$img_path ="../../../data/2014/2014_01/201400010001HRN00001006.jpg";
$id =  $_GET['id'];
$image_resource = imagecreatefromjpeg($img_path);
function draw_text($param =array()){
global $image_resource;
$font_size = $param['font_size'];
$text = $param['text'];
$x = $param['x'];
$y = $param['y'];
$width = imagefontwidth($font_size) * strlen($text) ;
$height = imagefontheight($font_size) ;
$backgroundColor = imagecolorallocate ($image_resource, 255, 255, 255);
$textColor = imagecolorallocate ($image_resource, 0, 0,0);
imagestring ($image_resource, $font_size, $x, $y, $text, $textColor);
} 
$sql = "SELECT * FROM layers where change_log_id='2'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
$draw_text_param = array('font_size'=>'18','text'=>$row['text'],'x'=>$row['x'],'y'=>$row['y']);
draw_text($draw_text_param); 
}
imagejpeg($image_resource);
?>