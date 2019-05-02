<?php
//header ("Content-type: image/jpeg"); 
 
 error_reporting(-1); 
 $img_path = "201400010001HRN00001006.jpg";
 $image_resource = imagecreatefromjpeg($img_path);
 
 
function draw_text($param =array()){
	global $image_resource;
	$font_size = $param['font_size'];
	$text = $param['text'];
//	$text_color = $param['text_color'];
	$x = $param['x'];
	$y = $param['y'];

 
$width = imagefontwidth($font_size) * strlen($text) ;
 $height = imagefontheight($font_size) ;


 $backgroundColor = imagecolorallocate ($image_resource, 255, 255, 255);
 $textColor = imagecolorallocate ($image_resource, 0, 0,0);
 
imagestring ($image_resource, $font_size, $x, $y, $text, $textColor);
 

} 
for($i =0 ; $i<10; $i++){
	
	$x = $i * 200;
	$y = $i * 200;
	
$draw_text_param = array('font_size'=>'18','text'=>'text','x'=>$x,'y'=>$y,);
 draw_text($draw_text_param); 
}
imagejpeg($image_resource);
?>

