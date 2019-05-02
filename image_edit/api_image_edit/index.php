<?php
	require('Myconn.php');
	
	$func=$_GET['func'];
	$param_arr = array();
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$param_arr['id'] = $_POST['id'];
		}
	function get_layer($id=''){
		global $conn;
		$responce=[];
		$img_src =$_REQUEST['img_src'];
		$change_by =$_REQUEST['change_by'];
		if($id==''){
		$sql="select * from layers where status = '1' and img_src='$img_src'";
		}
		else{
		$sql="select * from layers where id='$id' and status = '1'";	
		}
		$result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);	
		while($row = mysqli_fetch_assoc($result)){
		if($id==''){	
			$responce[]=$row ;
		}else{
			$responce=$row ;
		}
				
		}
		
		return $responce;
	}
	
	function create_layer(){
		global $conn;
		$responce=[];
		$type =$_POST['type'];
		$text =$_POST['text'];
		$img_src =$_POST['img_src'];
		$x =$_POST['x'];
		$y =$_POST['y'];
		$height =$_POST['height'];
		$width =$_POST['width'];
		$change_log_id =$_POST['change_log_id'];
		$change_by =$_POST['change_by'];
		// yogeeraj 
		$indexing_type=$_POST['indexing_type'];
		$dist_code=$_POST['dist_code'];
		$dst_name=$_POST['dst_name'];
		$cent_code=$_POST['cent_code'];
		$batch_no=$_POST['batch_no'];
		$book_no=$_POST['book_no'];
		$cent_name=$_POST['cent_name'];
		$hslc_year=$_POST['hslc_year'];
		$category=$_POST['category'];

		// end
		date_default_timezone_set('Asia/Kolkata');
        $last_modify=date('Y-m-d h:i:sa');
		
        $sql_create="insert into  layers (type,text,img_src,x,y,height,width,status,change_log_id,change_by,last_modify,indexing_type,year,batch_no,book_no,category,dist_code,dist_name,cent_code,cent_name)values('$type','$text','$img_src','$x','$y','$height','$width','1','$change_log_id','$change_by','$last_modify','$indexing_type','$hslc_year','$batch_no','$book_no','$category','$dist_code','$dst_name','$cent_code','$cent_name')";

		//$sql_create="insert into  layers (type,text,img_src,x,y,height,width,status,change_log_id,change_by,last_modify)values('$type','$text','$img_src','$x','$y','$height','$width','1','$change_log_id','$change_by','$last_modify')";
		$result_create = mysqli_query($conn,$sql_create);
			if($result_create){
			 $id = mysqli_insert_id($conn);
				$responce=get_layer($id);	
				
				}

		return $responce;
	}

	function update_layer(){
		global $conn;
		$responce=[];
		$type =$_POST['type'];
		$id =$_POST['id'];
		$text =$_POST['text'];
		$img_src =$_POST['img_src'];
		$x =$_POST['x'];
		$y =$_POST['y'];
		$height =$_POST['height'];
		$width =$_POST['width'];
		$change_log_id =$_POST['change_log_id'];
		date_default_timezone_set('Asia/Kolkata');
        $last_modify=date('Y-m-d h:i:sa');
		$change_by =$_POST['change_by'];
		
		$sql_update="update layers set type='$type',text='$text',img_src='$img_src',x='$x',y='$y',height='$height',width='$width',last_modify='$last_modify' where id = '$id' and status='1' and change_by='$change_by' and change_log_id='$change_log_id'";
		$result_update = mysqli_query($conn,$sql_update);
			if($result_update){
			
				$responce=get_layer($id);
				
				}

		return $responce;
	}	
		function delete_layer(){
			global $conn;
		$responce=[];
		$type =$_POST['type'];
		$id =$_POST['id'];
		$text =$_POST['text'];
		$img_src =$_POST['img_src'];
		$x =$_POST['x'];
		$y =$_POST['y'];
		$height =$_POST['height'];
		$width =$_POST['width'];
		
		$layer_detail = get_layer($id);
		$sql_delete="update layers set status='0' where id = '$id'";
		$result_delete = mysqli_query($conn,$sql_delete);
			if($result_delete){
				
				
				$responce=$layer_detail;	
				
				}

		return $responce;
	}
	$resp	=call_user_func_array ( $func , $param_arr );
	header('Content-Type: application/json');
	echo json_encode($resp);
?>