<?php 

error_reporting(-1);
ini_set('display_errors',1);
var_dump(file_exists('edit/'));

$new_file = 'edit/header-bg_'.time().'.jpg';
$file = file_put_contents($new_file,$new_image_data);
var_dump($file);
 ?>