<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$_POST["cus_id"]=$_SESSION["ar_id"];

if(!isset($_POST["id"])){
$status=doInsert($_POST,'ambit_cus_social_media');
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
$status=doUpdate("ambit_cus_social_media",$_POST,array("id"=>$_POST["id"]));
if($status){
	echo 2;
}else{
	echo 0;
}
	
}
?>