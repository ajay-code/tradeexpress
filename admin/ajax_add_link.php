<?php
session_start();
require_once("../function.php");
$_POST=trimmer($_POST);
if(isset($_POST["type"])){
$status=doInsert($_POST,"admin_website_link");
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
$status=doUpdate("admin_website_link",$_POST,array("id"=>$_POST["id"]));
if($status){
	echo 1;
}else{
	echo 0;
}	
}
?>
