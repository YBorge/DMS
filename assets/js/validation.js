
function validate_required(field,alerttxt){
	with (field)
	{
		apos=value.indexOf("'");
		if (value==null||value==""){
			alert(alerttxt);return false;
		} else if (apos>0){
			alert(alerttxt);return false;
		}
		else{
			return true;
		}
	}
}

function add_imgs_validate(thisform){
	with(thisform){
		if(document.getElementById("drive").selectedIndex == 0 ){
			alert("Please Select Drive");
			drive.focus();
			return false;
		}
		
		if(document.getElementById("first_dir_name").selectedIndex == 0 ){
			alert("Please Select first directory name");
			first_dir_name.focus();
			return false;
		}
		
		if(document.getElementById("second_dir_name").selectedIndex == 0 ){
			alert("Please Select Second directory name");
			second_dir_name.focus();
			return false;
		}
		
		if(document.getElementById("third_dir_name").selectedIndex == 0 ){
			alert("Please Select Third directory name");
			third_dir_name.focus();
			return false;
		}
		
		if(document.getElementById("fourth_dir_name").selectedIndex == 0 ){
			alert("Please Select Fourth directory name");
			fourth_dir_name.focus();
			return false;
		}
		
		if(document.getElementById("fifth_dir_name").selectedIndex == 0 ){
			alert("Please Select Fifth directory name");
			fifth_dir_name.focus();
			return false;
		}
	}
}
