<?php
session_start();
require_once("function.php");
//print_r($_POST);
$_POST=trimmer($_POST);

if(isset($_POST["apfc_id"])){
$status=doUpdate("add_price_for_classified",$_POST,array("apfc_id"=>$_POST["apfc_id"]));
if($status){
	echo 2;
}else{
	echo 0;
}	
	
}else{
$status=doInsert($_POST,"add_price_for_classified");
if($status){
	echo 1;
}else{
	echo 0;
}
}

?>