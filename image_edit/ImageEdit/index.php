<?php
session_start();
$_SESSION['sr_no'];
if(!$_SESSION['username']){
header("location: ../index.php"); }
ini_set('display_errors','0');
require_once('../../Connection/MyCon.php');
require_once("../../WebPages/function_library.php"); 
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<style>
footer#main{
	position:fixed;
	left:0;
	bottom:0px;
	text-align:center;
	font:normal 11px/14px Arial, Helvetica, sans-serif;
	width:100%;
	padding-top: 5px;	
}
</style>
<style>
.img_conatainer{
	position:relative;
}
	
.img_edit_input_box{
	display:none;
}
	
.layer,.edit{
	display: block;
}

.layer > .img_edit_input,.layer > .marker{
	display: none;
}

.edit >.img_edit_input,.edit >.marker{
	display: block;
}

.layer > .input-text,.edit >.marker{
	display: block;
	font-weight: bold;
}

.edit > .input-text{
	display: none;
}

.img_edit_input{
	border:none;
	border-bottom:solid 1px grey;
	width: auto;
	background-color: transparent;
	padding: 0px !important;
	margin: 0px !important;
}
		
.img_edit_input::focus{
	background-color: transparent;
	margin:none;
}

.round{
	border: solid 2px red;
	border-radius:50%;
	height: 100%;
	width: 100%;
}

.round_container{
	cursor: auto;
	padding: 5px;
	border: dashed 1px grey;
	display: inline-block;
	height: 50px;
	width: 100px;
	resize:both;
	overflow:auto; 
}
		
.img_editor_conatainer{
	max-height: 80%;
	height: 80%;
}

/*.marker{
	top:0px;
	left:0px;
	color: red;
	margin: 0px !important;
	padding:0px !important;
	cursor: move;
	outline: 0px !important;
	outline-offset: 0px !important;
	display: inline-block;
}*/

.marker{
	height:4px;
	width:4px;
	background-color: red;
	cursor: move;
}

.layer_edit{
	position: absolute;
	background-color: transparent;
	padding: 0px;
	/*color: red;
	font-size: 20px;*/
}

.layer_edit.active{
	position: absolute;;
	border: 1px dashed #95aec5;
	background-color: transparent;
	padding: 5px;
	z-index: 1000;
	/*color: red;
	font-size: 20px;*/
}

.tick{
	color: green;
}

.cross{
	color: red;
}
label{font-size: 12px;}
</style>
<script  src="js/jquery-1.9.1.js"></script>
<script  src="js/jquery.panzoom.js"></script>
<script  src="js/jquery.ellipsis.js"></script>
<script  src="js/jquery-ui.min.js"></script>
<script  src="js/config.js"></script>
<script  src="js/tools.js"></script>
<script  src="js/layer.js"></script>
<script  src="js/draggable.js"></script>
<? 
include("./header.php");
$m_path1=$_GET['path'];
$m_path=base64_decode($m_path1);
$change_log_id=$_GET['id'];
// 
$indexing_type=$_GET['indexing_type'];
$dist_code=$_GET['dist_code'];
$dist_name=$_GET['dist_name'];
$cent_code=$_GET['y_code'];
$batch_no=$_GET['batch_no'];
$book_no=$_GET['book_no'];
$cent_name=$_GET['center_name1'];
$hslc_year=$_GET['hslc_year'];
$category=$_GET['category'];
$File_name=substr($m_path, 32);
//include("../../WebPages/banner.php");   

?>
<div class="container-fluid">
<div class="col-md-9">
	<div class="img_editor_conatainer"  style="height:450px;">
		<div><b>District :</b> <?echo $dist_name;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $indexing_type.' '; ?>Year : </b><?echo $hslc_year;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Center Name : </b><?echo $cent_name;?>&nbsp;&nbsp;&nbsp;<b>Roll No : </b><?echo $file_no;?>&nbsp;&nbsp;&nbsp;</div>
		<div class="img_conatainer">
			<img class="img_zoom" src="<? echo $m_path; ?>"/>
			<div class="img_edit_input_box_container"></div>
			<input type="hidden" name="change_log_id" id="change_log_id" value="<? echo $change_log_id;?>">
			<input type="hidden" name="change_by" id="change_by" value="<? echo $_SESSION['sr_no'];?>">
			<input type="hidden" name="img_src" id="img_src" value="<? echo $m_path;?>">
			<input type="hidden" name="indexing_type" id="indexing_type" value="<? echo $indexing_type;?>">
			<input type="hidden" name="dist_code" id="dist_code" value="<? echo $dist_code;?>">
			<input type="hidden" name="dist_name" id="dist_name" value="<? echo $dist_name;?>">
			<input type="hidden" name="cent_code" id="cent_code" value="<? echo $cent_code;?>">
			<input type="hidden" name="batch_no" id="batch_no" value="<? echo $batch_no;?>">
			<input type="hidden" name="book_no" id="book_no" value="<? echo $book_no;?>">
			<input type="hidden" name="center_name1" id="center_name1" value="<? echo $cent_name;?>">
			<input type="hidden" name="hslc_year" id="hslc_year" value="<? echo $hslc_year;?>">
			<input type="hidden" name="category" id="category" value="<? echo $category;?>">
		</div>
	</div>
	<div class="buttons">
		<button class="zoom-in">Zoom In</button>
		<button class="zoom-out">Zoom Out</button>
		<!--<button class="reset">Reset</button>-->
		<a href="../../WebPages/search.php?indexing_type=<? echo $indexing_type; ?>&year=<? echo $hslc_year; ?>" class="btn btn-danger btn-sm" name="btn_back" style="margin-top:0px;margin-left: 9px;"/>BACK</a>
	</div>
	<div id="tool_box">
		<!--hi-->
		<div><div  id="tools_dropdown" style="margin-top: -30px;
    margin-left: 229px; "></div></div>
	</div>
</div>

<div class="col-md-3">
	<div class="list-group" id="layer_list">
	</div><br>
	<form  name="fileupdate" id="fileupdate" method="post" enctype="multipart/form-data" autocomplete="off">
	<table class="table">
		<tr>
			<td><label>File No </label><span style="color: red;"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="file_name" id="file_name" value="" maxlength="10" class="" required=""> </td>
		</tr>
		<tr>
			<td><label>Roll No  </label><span style="color: red;"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="roll_no" id="roll_no" value="" maxlength="10" class="" required=""> </td>
		</tr>
		<tr>
			<td><label>Update On Field</label><span style="color: red;"> *</span><input type="text" name="update_field" id="update_field" maxlength="10" value="" class="" required=""> </td>
		</tr>
		<tr>
			<td><label>Orignal  </label><span style="color: red;"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="orignal" id="orignal" value="" maxlength="50" class="" required=""> </td>
		</tr>
		<tr>
			<td><label>New  </label><span style="color: red;"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="new" id="new" value="" maxlength="50" class="" required=""> </td>
		</tr>
		<tr>
			<td><label>Notes  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="note" id="note" value="" maxlength="100" class=""> </td>
		</tr>
		<tr>
			<td><label>Attachment  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="fileupload" id="fileupload" value="" class=""> </td>
		</tr>
		<tr>

			<td><input type="submit" name="save" id="save" value="Save" onclick="return save1();" class="btn btn-primary" > </td>
			<input type="hidden" name="img_src" id="img_src" value="<? echo $m_path;?>">
		</tr>
	</table>
	</form>
</div>
<div>
	
</div>
</div>

<footer id="main">	
<?php include("../../WebPages/footer.php"); ?>
</footer>

<script>
function save1(){
	document.fileupdate.action="fieldsave.php?mode=add";
	return true;
}
$(document).ready(function(){
   $("#save").attr("disabled",true);
});
(function() {
	tools.init();
	layer.init();
	var $section = $('.img_editor_conatainer');
	$section.find('.img_conatainer').panzoom({
		$zoomIn: $(".zoom-in"),
		$zoomOut: $(".zoom-out"),
		$reset: $(".reset"),
	});
})();
		
var cordinates = {};
$(document).on('click','#img_edit_submit',function(){
	var text = $(".img_edit_input").val();
	var formdata = {};
	formdata.text = text;
	formdata.src = $('.img_conatainer').find('img').attr('src');
	formdata.x = cordinates.x;
	formdata.y = cordinates.y;
	url = 'edit.php?'+$.param(formdata);
    $('.img_conatainer').find('img').attr('src',url);
	$('.img_edit_input_box').hide().find('.img_edit_input').val('');
});

$(document).on('click','.img_edit_input',function(){
	$(this).focus();
});

$(document).on('click','.img_conatainer',function(e){
	container = $(this).find('.layer_edit.active');
	if (!container.is(e.target) && container.has(e.target).length === 0) {
		container.removeClass('active').find('.edit').removeClass('edit').addClass("layer");	
	}
});

$(document).on('change','.img_edit_input',function(){
	
	var layer_id = $(this).closest('.layer_edit').data('layer-id');
	var change_log_id = $("#change_log_id").val();
	var change_by = $("#change_by").val();
	var img_src = $("#img_src").val();
	var indexing_type = $("#indexing_type").val();
	var dist_code = $("#dist_code").val();
	var dist_name = $("#dist_name").val();
	var cent_code = $("#cent_code").val();
	var batch_no = $("#batch_no").val();
	var book_no = $("#book_no").val();
	var cent_name = $("#cent_name").val();
	var hslc_year = $("#hslc_year").val();
	var category = $("#category").val();
	layer_param = layer.set_layer_item(layer_id,{text:$(this).val(),change_log_id:change_log_id,change_by:change_by,img_src:img_src,indexing_type:indexing_type,dist_code:dist_code,dist_name:dist_name,cent_code:cent_code,batch_no:batch_no,cent_name:cent_name,hslc_year:hslc_year,category:category});
	if(layer_id ==''){
		layer.save(layer_param);
	}
	else{
		layer_param.id = layer_id;
		layer.update(layer_param);
	}
});
</script>	