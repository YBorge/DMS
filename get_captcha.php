<?php
session_start();
$string = '';
for ($i = 0; $i < 5; $i++) {
	$string .= chr(rand(97, 122));
}
$_SESSION['random_number'] = $string;
$dir = './assets/css/fonts/';
$image = imagecreatetruecolor(165, 50);
$num = rand(1,2);
if($num==1)
{
$font=getcwd()."\\assets\\css\\fonts\\Capture it 2.ttf";
}
else
{
$font=getcwd()."\\assets\\css\\fonts\\Molot.otf";
}
$num2 = rand(1,2);
if($num2==1)
{
	$color = imagecolorallocate($image, 113, 193, 217);
}
else
{
	$color = imagecolorallocate($image, 163, 197, 82);
}
$white = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext($image, 30, 0, 5, 40, $color, $font, $_SESSION['random_number']);
header("Content-type: image/png");
imagepng($image);
?>