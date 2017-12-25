<?php
session_start();
require_once("function.php");
/* print_r($_POST);
print_r($_FILES); */
$_POST["password"]=md5($_POST["password"]);
unset($_POST["cpassword"]);
if(isset($_FILES) && $_FILES["image"]["error"]=="0"){
	$image_name=time().rand(10,1000).$_FILES["image"]["name"];
	$tmp_name=$_FILES["image"]["tmp_name"];
	$status=move_uploaded_file($tmp_name,"customer_image/".$image_name);
	if($status){
		$_POST["image"]=$image_name;
	}
	$dob=explode('-',$_POST["dob"]);
	$_POST["dob"]=$dob[2].'-'.$dob[1].'-'.$dob[0];
	$_POST["terms"]=1;
	$status=doInsert($_POST,"ambit_registration");
	$recent_id=newly_insert_id();
	$field=array("cus_id"=>$recent_id);
	if($status){
		doInsert($field,"cus_acnt_blnce");
		echo 1;
	}else{
		echo 0;
	}
}else{
	echo 0;
}

?>