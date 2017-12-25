<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$db=$_POST["db"];
unset($_POST["db"]);
$_POST["cus_id"]=$_SESSION["ar_id"];



$status=doInsert($_POST,$db);
if($status){
	echo 1;
}else{
	echo 0;
}


?>