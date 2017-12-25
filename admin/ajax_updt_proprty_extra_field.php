<?php
session_start();
require_once("function.php");

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="textarea"))){
	$pcef_id=trim($_POST["pcef_id"]);
	unset($_POST["type"]);
	unset($_POST["pcef_id"]);
	$status=doUpdate("property_cat_extra_field",$_POST,array("pcef_id"=>$pcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="dropdown"))){
	$pcef_id=trim($_POST["pcef_id"]);
	unset($_POST["type"]);
	unset($_POST["pcef_id"]);
	$status=doUpdate("property_cat_extra_field",$_POST,array("pcef_id"=>$pcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["action"]) && trim($_POST["action"]=="delete")){
	$pcef_id=trim($_POST["pcef_id"]);
	unset($_POST["pcef_id"]);
	unset($_POST["action"]);
	$result=getDetails(doSelect("*","add_property_extra_field",array("pcef_id"=>$pcef_id)));
	if(empty($result)){
		doDelete("property_cat_extra_field",array("pcef_id"=>$pcef_id));
		echo 1;
	}else{
		echo 0;
	}
	
}
?>