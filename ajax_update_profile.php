<?php
session_start();
require_once("function.php");
/* print_r($_POST);
print_r($_FILES); */
if(isset($_FILES) && $_FILES["image"]["error"]=="0"){
	$image_name=time().rand(10,1000).$_FILES["image"]["name"];
	$tmp_name=$_FILES["image"]["tmp_name"];
	$status=move_uploaded_file($tmp_name,"customer_image/".$image_name);
	if($status){
		$_POST["image"]=$image_name;
		fileDelete("image","ambit_registration",array("ar_id"=>$_SESSION["ar_id"]),'customer_image/');
	}
	
}
$_POST["status"]=0;
$status=doUpdate("ambit_registration",$_POST,array("ar_id"=>$_SESSION["ar_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}

?>