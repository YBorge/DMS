<?php 
require_once("./header_index.php");
$txt_email=$_POST['txt_email'];
$btn_send=$_POST['btn_send'];
?>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery.js"></script>
<script src="./js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" language="JavaScript" src="./validation/hash.js"></script>
<script type = "text/javascript">
var message="Function Disabled!";
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")

function changeHashOnLoad() {
 window.location.href += "#";
 setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
window.location.href += "1";
}

var storedHash = window.location.hash;
 window.setInterval(function () {
 if (window.location.hash != storedHash) {
     window.location.hash = storedHash;
	}
}, 50);

$(document).ready(function() {
	$('img#refresh').click(function() {  
		change_captcha();
	});
});
		
function change_captcha()
{
	document.getElementById('captcha').src="./get_captcha.php?rnd=" + Math.random();
}

//Javascript Captcha validation
function validation()
{
	if(document.form_admin.username.value=="")
    {
		document.getElementById("error1").innerHTML="Enter Username!";
		document.form_admin.username.focus();
		return false;
	}
	
    if(document.form_admin.password.value=="")
	{
		document.getElementById("error2").innerHTML="Enter Password!";
		document.form_admin.password.focus();
		return false;
	}

	if(document.form_admin.captcha.value=="") //to use captcha uncomment this code
	{
		document.getElementById("error").innerHTML="Enter Captcha!";
		document.form_admin.captcha.focus();
		return false;
	}

document.form_admin.action="./check_credentials.php";
return true;
}
</script>
<style type="text/css">
.color
{
	color:#FF0000;
}
</style>

<body onload="changeHashOnLoad();">
<div class="container">
<div class="row" style="margin-top:2%;">
	<div class="col-md-4">
		<div class="well" style="background-color:rgba(0, 0, 0, 0.2); border: 1px solid black;">
			<div class="form-group"><p class="text-center"><font color="white" size="4"><b>USER LOGIN</b></font></p>
				<form name="fpaswd" id="fpaswd" method="POST" >
					<div class="form-group">
						<input type="email" name="username" maxlength="25" id="username" class="form-control" placeholder="Enter Email Id" /><span id="error1" class="color"></span>
					</div>

					
					
					
					
					<div class="form-group">
						<input type="Submit" name="btn_submit" id="btn_submit" onclick="return validation();" value="SUBMIT" class="btn btn-lg btn-success btn-block"/>
					</div>
				
				 </form>
			</div>
		</div>
	</div>
</div>
</div>
<footer id="main">
<?php require_once("./WebPages/footer.php"); ?>
</footer>
</body>
</html>