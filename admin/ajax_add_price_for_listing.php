<?php
session_start();
require_once("function.php");
//print_r($_POST);
$_POST=trimmer($_POST);

if(isset($_POST["apfl_id"])){
$status=doUpdate("add_price_for_listing",$_POST,array("apfl_id"=>$_POST["apfl_id"]));
if($status){
	echo 2;
}else{
	echo 0;
}	
	
}else{
$status=doInsert($_POST,"add_price_for_listing");
if($status){
	echo 1;
}else{
	echo 0;
}
}

?>