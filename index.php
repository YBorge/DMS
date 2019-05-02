<?php
ini_set("display_errors","0");
// using git
session_start();
if($_SESSION['username']){
	header('location: ./WebPages/admin_login_success.php');
} 

require_once("./header_index.php");
require_once("./Connection/MyCon.php");
require_once("./WebPages/function_library.php");
date_default_timezone_set('Asia/Kolkata');
$updated_date=date('Y-m-d h:i:sa');
$txt_email=$_POST['txt_email'];
$btn_send=$_POST['btn_send'];
if($btn_send){
	if($txt_email==''){
		fail_alert("Enter email id...!!" ,"./index.php");
		die();
	}
	
	$chk_disable=get_val("select count(*) as cnt from admin_login where EmailId='$txt_email' and user_disable='Y'","cnt");
	if($chk_disable!='0'){
		fail_alert("This user is already disabled from the system so you can not send request for forget password..!!!" ,"./index.php");
		die();
	}
	
	$chk_email=get_val("select count(EmailId) as cnt from admin_login where EmailId='$txt_email'", "cnt");
	if($chk_email!='0'){
		$sql1="Update admin_login set req_forgot_paswd='Y', last_updated='$updated_date' where EmailId='$txt_email'";
		$res1=fexecute($sql1);
		if($res1){
			success_alert("Your request for forget password sent successfully...!!" ,"./index.php");
		}
		else{
			fail_alert("Your request for forget password not sent. Try again...!!" ,"./index.php");
			exit;
		}
	}
	else{
		fail_alert("Entered EmailId does not exist...!!" ,"./index.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" language="JavaScript" src="assets/js/hash.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('img#refresh').click(function() {  
		change_captcha();
	});
});
		
function change_captcha()
{
	document.getElementById('captcha').src="./get_captcha.php?rnd=" + Math.random();
}

function validation()
{
	if(document.form_admin.uname_disp.value=="")
	{
	  alert("Enter Username..");
	  return false;
	}
	if(document.form_admin.upass.value=="")
	{
	  alert("Enter Password..");
	  return false;
	} 
	if(document.form_admin.captcha.value=="") //to use captcha uncomment this code
	{
		alert("Enter Captcha..");
		return false;
	}
	document.form_admin.uname_hsh.value=calcMD5(document.form_admin.uname_disp.value);
	document.form_admin.upass_hsh.value=calcMD5(document.form_admin.upass.value);
	document.form_admin.uname.value=base64_encode(document.form_admin.uname_disp.value);			
	document.form_admin.upass.value=base64_encode(document.form_admin.upass.value);
	document.form_admin.action="check_credentials.php";
	return true;
}
</script>
<body onload="changeHashOnLoad();">
<div class="container">
<div class="row" style="margin-top:2%;">
	<div class="col-md-4">
		<div class="well" style="background-color:rgba(0, 0, 0, 0.2); border: 1px solid black;">
			<div class="form-group"><p class="text-center"><font color="white" size="4"><b>USER LOGIN</b></font></p>
				<form name="form_admin" id="form_admin" method="POST" autocomplete="off">
					<div class="form-group">
						<input type="text" name="uname_disp" maxlength="25" id="username" class="form-control" placeholder="Enter Username"/><input type="hidden" name="uname"><input type="hidden" name="uname_hsh"></span>
					</div>

					<div class="form-group">
						<input type="Password" name="upass" maxlength="25" id="password" class="form-control" placeholder="Enter Password"/><input type="hidden" name="upass_hsh"></span>
					</div>
					
					<div class="form-group">
						<center><img src="./get_captcha.php" id="captcha"/>
						<img src="./Images/refresh.jpg" width="25" id="refresh"/></center>
					</div>
					
					<div class="form-group">
						<input type="text" id="login_field" class="form-control" name="captcha" placeholder="Enter Captcha">
					</div>
					
					<div class="form-group">
						<input type="Submit" name="btn_submit" id="btn_submit" onclick="return validation();" value="Log In" class="btn btn-lg btn-success btn-block" style="background-color: #5985dc;
    border-color: #5985dc;"/>
					</div>
					
					<a href="#" data-toggle="modal" class="blinking" data-target="#myModal4"><font color="white">Forgot Password?</font></a>
					<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-info">
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login-right">
											<h3 class="text-center">Please enter your registred email id</h3>
												<div class="sign-in">
													<input type="email" name="txt_email" class="form-control" placeholder="Enter Registred Email Id Here">
												</div>
												<br>
												<center><div class="sign-in">
													<input type="submit" value="SEND" id="logn" name="btn_send" class="btn btn-success" onclick="return chk_login();">
												</div></center>
										</div>
									</div>
								</div>
							</div>
						</div>
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