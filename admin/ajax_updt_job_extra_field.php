<?php
session_start();
require_once("function.php");

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="textarea"))){
	$jcef_id=trim($_POST["jcef_id"]);
	unset($_POST["type"]);
	unset($_POST["jcef_id"]);
	$status=doUpdate("job_cat_extra_field",$_POST,array("jcef_id"=>$jcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["type"]) && (trim($_POST["type"]=="textbox") || trim($_POST["type"]=="dropdown"))){
	$jcef_id=trim($_POST["jcef_id"]);
	unset($_POST["type"]);
	unset($_POST["jcef_id"]);
	$status=doUpdate("job_cat_extra_field",$_POST,array("jcef_id"=>$jcef_id));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["action"]) && trim($_POST["action"]=="delete")){
	$jcef_id=trim($_POST["jcef_id"]);
	unset($_POST["jcef_id"]);
	unset($_POST["action"]);
	$result=getDetails(doSelect("*","add_job_extra_field",array("jcef_id"=>$jcef_id)));
	if(empty($result)){
		doDelete("job_cat_extra_field",array("jcef_id"=>$jcef_id));
		echo 1;
	}else{
		echo 0;
	}
	
}
?>