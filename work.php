<?php 
include("config.php");
function birth_check($data){
	$new_data=explode('/',$data);
	if(checkdate($new_data[0],$new_data[1],$new_data[2])){
	return $data;	
	}
	else{
	$data="error";
	return $data;
		
	}
	
	
}
function adhar($data){
	if(strlen($data)<12){
		$data="Aadhar Number must be of 12 digits";
		return $data;
	
}
else if(!ctype_digit($data)){
	
	$data="Aadhar Number must only contain digits.";
	return $data;
}
else{
	
	
	return $data;
}

	
	
	
	
}
function mob($data){
	if(strlen($data)<10){
		$data="Mobile Number must be of 10 digits";
		return $data;
	
}
else if(!ctype_digit($data)){
	
	$data="Mobile Number must only contain digits.";
	return $data;
}
else{
	
	
	return $data;
}

	
	
	
	
}
function donation($data){
	
if(!ctype_digit($data)){
	
	$data="Invalid Amount";
	return $data;
}
else{
	
	
	return $data;
}

	
	
	
	
}

function infom($con,$email){
		
if(isset($_POST['submit']))
{
	$mobile=mob($_POST['number']);
	$aadhar=adhar($_POST['aadhar']);
	
	$ngo=$_POST['ngo'];
	$amount=donation($_POST['amount']);
	$date=date("F,d Y");
		if($mobile!=($_POST['number'])){
			return $mobile;
			
		}
		else if($aadhar!=($_POST['aadhar'])){
			return $aadhar;
		}
		else if($amount!=($_POST['amount'])){
			return $amount;
			
		}
		else{
			
			$insertQuery="INSERT INTO info(Name,NGO,Mobile,Aadhar,Amount,Date) VALUES('$email','$ngo','$mobile','$aadhar','$amount','$date')";
			if(mysqli_query($con,$insertQuery)){
				
				url('pay.php');
				
			}
			else{
				return "Error in inserting your information";
				
			}
			
		}
		
	}
	
	}
	

	
?>
