<link rel="shortcut icon" href="./Images/logo.png">
<title>DMS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href="./css/header.css" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="./css/font-awesome.min.css">
<header>
<div class="container-fluid" style="background-color:#5985dc; margin-bottom:5%; margin-right: 0.0cm; padding-bottom:0px">
	<div class="row">
		<div class="col-md-12" style="padding-left:130px">
		<div class="logo" >
			<img src="./Images/seba_ogo.png" width="80" height="70" class="img img-responsive">
		</div>
		<h1 class="top" style="padding-left: 200px; font-family:arial!important; font-size:32px !important;">Board of Secondary Education, Assam</h1>

		</div>
	</div>
</div>
</header>
<script type = "text/javascript">
function changeHashOnLoad(){
 window.location.href += "#";
 setTimeout("changeHashAgain()", "50");
}

function changeHashAgain() {
window.location.href += "1";
}

var storedHash = window.location.hash;
 window.setInterval(function () {
 if (window.location.hash != storedHash){
     window.location.hash = storedHash;
}
}, 50);

$(document).bind("contextmenu",function(e) {
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