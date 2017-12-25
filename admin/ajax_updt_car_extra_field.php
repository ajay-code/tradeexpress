<?php
session_start();
require_once("function.php");

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="textarea"))){
	$ccef_id=trim($_POST["ccef_id"]);
	unset($_POST["type"]);
	unset($_POST["ccef_id"]);
	$status=doUpdate("car_cat_extra_field",$_POST,array("ccef_id"=>$ccef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="dropdown"))){
	$ccef_id=trim($_POST["ccef_id"]);
	unset($_POST["type"]);
	unset($_POST["ccef_id"]);
	$status=doUpdate("car_cat_extra_field",$_POST,array("ccef_id"=>$ccef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["action"]) && trim($_POST["action"]=="delete")){
	$ccef_id=trim($_POST["ccef_id"]);
	unset($_POST["ccef_id"]);
	unset($_POST["action"]);
	$result=getDetails(doSelect("*","add_general_items_extra_field",array("ccef_id"=>$ccef_id)));
	if(empty($result)){
		doDelete("car_cat_extra_field",array("ccef_id"=>$ccef_id));
		echo 1;
	}else{
		echo 0;
	}
	
}
?>