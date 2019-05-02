<link rel="shortcut icon" href="../Images/logo.png">
<title>DMS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../assets/js/jquery-3.2.0.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<?php
ini_set('display_errors','0');
session_start();
require_once("../../Connection/MyCon.php"); 
$user=$_SESSION['username'];
$tbl_name="menu";
$u= $_SESSION['type'];

if($_SESSION['type']=='a')
{
	$q = "SELECT * FROM $tbl_name where module!='ax' and is_heading='0' order by menu_order";
}
elseif($_SESSION['type']=='s')
{
	$q = "SELECT * FROM $tbl_name where module in ('s', 'n') and is_heading='0' order by menu_order";
}
elseif($_SESSION['type']=='n')
{
	$q = "SELECT * FROM $tbl_name where module='n' and is_heading='0' order by menu_order";
}
$r = $conn->query($q); ?>

<script>
$(function(){
$(".dropdown").hover(        
	function() {
		$('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
		$(this).toggleClass('open');
		$('b', this).toggleClass("caret caret-up");     
	},
	function() {
		$('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
		$(this).toggleClass('open');
		$('b', this).toggleClass("caret caret-up");
	});
});
</script>
  
<style>
.navbar-nav>li>.dropdown-menu{background-color: #5985dc;}
.navbar-nav>li>.dropdown{background-color: #1e5799;}
.navbar-default .navbar-nav>.open>a{background-color: #1e5799!important;}
.navbar-default .navbar-nav>.open>a:hover{color: #fff!important;}
.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>li>a:focus{background-color: #1e5799!important;}
.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{background: #1e5799!important; color: #fff!important;}


.caret-up {
	width: 0; 
	height: 0; 
	border-left: 4px solid rgba(0, 0, 0, 0);
	border-right: 4px solid rgba(0, 0, 0, 0);
	display: inline-block;
	margin-left: 2px;
	vertical-align: middle;
}

.navbar-custom {
	color: #FFFFFF;
	background-color: #5985dc;
}

.nav a{ color:#FFFFFF!important;
text-shadow : none !important;
 }
</style>

<nav class="navbar navbar-default navbar-custom" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header" style="height:65px; width: 38%;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>      
      </button>
		
		<a class="navbar-brand" href="../../WebPages/admin_login_success.php" style="padding-top: 1;"><img src="../../Images/seba_ogo.png" width="65" height="55"></a>
		
		 <h1 style="font-size:15px; margin-top:19px; font-family: Verdana, Arial, Helvetica, sans-serif;     font: bold 149% arial, sans-serif;">Secondary Education Board of Assam</h1> 
	</div>
      
	<div class="collapse navbar-collapse nav navbar-nav navbar-right" id="myNavbar">
	  <ul class="nav navbar-nav navbar-left">
        <li><a href="admin_login_success.php" style="padding-top: 25px;"><span class="glyphicon glyphicon-user"></span><? echo " ".$user;?></a></li>
       </ul>
      <ul class="nav navbar-nav">
		<ul class="nav navbar-nav">
			<? while($row_menu=mysqli_fetch_array($r))
			{
			$m_menu_id=$row_menu['menu_id'];
			$m_menu_caption=$row_menu['menu_caption'];
			$m_menu_action=$row_menu['menu_action'];
			$m_is_heading=$row_menu['is_heading'];
			$m_menu_order=$row_menu['menu_order']; ?>
			<li class="dropdown">
			<a href="<? echo "../../WebPages/".$m_menu_action;?>" style="padding-top: 25px;"><?echo $m_menu_caption;?><span class="caret"></span></a>
				<ul class="dropdown-menu">
				<? if($_SESSION['type']=='n')
				{
					$sql_menu1 = "SELECT * FROM $tbl_name where is_heading='$m_menu_id' and module='n' order by menu_order";
				}
				elseif($_SESSION['type']=='a')
				{
					$sql_menu1="select * from menu where is_heading='$m_menu_id' and module!='ax' order by menu_order";
				}
				elseif($_SESSION['type']=='s')
				{
					$sql_menu1 = "SELECT * FROM $tbl_name where module in ('s', 'n') and is_heading='$m_menu_id' order by menu_order";
				}
				
				$result_menu1=$conn->query($sql_menu1);
				while($row_menu1=mysqli_fetch_array($result_menu1))
				{
					$m_menu_id1=$row_menu1['menu_id'];
					$m_menu_caption1=$row_menu1['menu_caption'];
					$m_menu_action1=$row_menu1['menu_action'];
					$m_is_heading1=$row_menu1['is_heading'];
					$m_menu_order1=$row_menu1['menu_order'];?>
					<li><a href="<? echo "../../WebPages/".$m_menu_action1;?>"><?echo $m_menu_caption1;?></a></li>
				<?}?>
				</ul>
			</li>
		<?}?>
		</ul>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="../../WebPages/logout.php" style="padding-top: 25px;"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
	  </ul>
	</div>
	</div>
	</div>
  </div>
</nav>

<script type = "text/javascript" >
 /* function changeHashOnLoad() {
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
}, 50); */

$(document).bind("contextmenu",function(e){
	e.preventDefault();//prevent right click
});

$(document).keydown(function(event){
	if(event.keyCode == 123){
		return false; //Prevent from F12
	}else if(event.ctrlKey && event.keyCode == 85){
		return false; //Prevent from ctrl + U
	}else if(event.ctrlKey && event.shiftKey && event.keyCode == 73){
		return false; //Prevent from ctrl + shift + I
	}else if(event.ctrlKey && event.shiftKey && event.keyCode == 67){
		return false; //Prevent from ctrl + shift + C
	}else if(event.ctrlKey && event.shiftKey && event.keyCode == 81){
		return false; //Prevent from ctrl + shift + Q
	}else if(event.ctrlKey && event.shiftKey && event.keyCode == 75){
		return false; //Prevent from ctrl + shift + K
	}else if(event.shiftKey && event.keyCode == 116){
		return false; //Prevent from shift + F5
	}else if(event.shiftKey && event.keyCode == 118){
		return false; //Prevent from shift + F7
	}else if(event.ctrlKey && event.keyCode == 80){
		return false; //Prevent from ctrl + P
	}
});
</script>