<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$_POST["cus_id"]=$_SESSION["ar_id"];

if(isset($_GET["msg"]) && trim($_GET["msg"])=="apply"){
$status=doInsert($_POST,"ambit_job_apply");
if($status){
	echo 1;
}else{
	echo 0;
}
}

if(isset($_GET["msg"]) && trim($_GET["msg"])=="cancel"){
$status=doDelete("ambit_job_apply",$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}
}

?>