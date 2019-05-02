<?
require_once('../../Connection/MyCon.php');
require_once("../../WebPages/function_library.php"); 

extract($_POST);

// SQL injection
$check=sql_call($file_name,"Temper Attempt Detected...!","index.php");
$check=sql_call($roll_no,"Temper Attempt Detected...!","index.php");
$check=sql_call($update_field,"Temper Attempt Detected...!","index.php");
$check=sql_call($orignal,"Temper Attempt Detected...!","index.php");
$check=sql_call($new,"Temper Attempt Detected...!","index.php");
$check=sql_call($note,"Temper Attempt Detected...!","index.php");
// end
$mode=$_GET['mode'];

if ($mode=='add') 
{
	$target_dir = "imageattachment/";
	$target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
	move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
	$sql_insert="INSERT INTO `ImageEditDetails`(`imagepath`, `fileno`, `rollno`, `updateField`, `orignal`, `newupdate`, `notes`, `flag`,`attachment`) VALUES ('$img_src','$file_name','$roll_no','$update_field','$orignal','$new','$note','Y','$target_file')";
	$res=fexecute($sql_insert);
	if ($res) 
	{
		$img=base64_encode($img_src);
		success_alert("Data Saved..!","index.php?path=$img");
		
	}else{
		fail_alert("Something Went Wrong..!","index.php");
	}
}
	
?>