<?php
/* This page is used for update school code and school name
 for year 2014 and 2013, data received from chitta sir 25/01/2017*/
ini_set('max_execution_time',20000);
ini_set("display_errors","0");
include("Connection/MyCon.php"); 
//include("WebPages/function_library.php");

//$query="select * from seba_data_2014";
$query="select * from seba_data_2013";
$result=mysql_query($query);

while($data = mysql_fetch_array($result))
{
	$school_code=$data['school_code'];
	$roll_no=intval($data['roll_number']);   // Converting varchar Rollno to Integer
	$school_name=mysql_real_escape_string($data['school_name']);
	$id=$data['id'];
	$cent_code=$data['centre_code'];
	//echo $update_query="update dmstab set school='$school_name', school_code='$school_code', s_id='$id' where $roll_no between rollno_from and rollno_to and hslc_year='2015' and school_code=''"; die();
    $update_query="update dmstab set school='$school_name', school_code='$school_code', id_2013='$id' where rollno_from <= $roll_no and rollno_to >= $roll_no and hslc_year='2013' and center_name='$cent_code' and school_code='' limit 1";
	//die();
	if(!mysql_query($update_query))
	{
		echo("Error description: " . mysql_errno());
		exit();
	}
	echo "<br>";
	echo $id;
   flush();
}	
printf("Records updated: %d\n", mysql_affected_rows());

?>