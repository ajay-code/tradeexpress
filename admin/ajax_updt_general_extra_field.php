<?php
session_start();
require_once("function.php");

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="textarea"))){
	$gcef_id=trim($_POST["gcef_id"]);
	unset($_POST["type"]);
	unset($_POST["gcef_id"]);
	$status=doUpdate("general_cat_extra_field",$_POST,array("gcef_id"=>$gcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="dropdown"))){
	$gcef_id=trim($_POST["gcef_id"]);
	unset($_POST["type"]);
	unset($_POST["gcef_id"]);
	$status=doUpdate("general_cat_extra_field",$_POST,array("gcef_id"=>$gcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["action"]) && trim($_POST["action"]=="delete")){
	$gcef_id=trim($_POST["gcef_id"]);
	unset($_POST["gcef_id"]);
	unset($_POST["action"]);
	$result=getDetails(doSelect("*","add_general_items_extra_field",array("gcef_id"=>$gcef_id)));
	if(empty($result)){
		doDelete("general_cat_extra_field",array("gcef_id"=>$gcef_id));
		echo 1;
	}else{
		echo 0;
	}
	
}
?>