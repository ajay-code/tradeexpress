<?php
session_start();
require_once("function.php");
if(isset($_SESSION["ar_id"])){
	echo 1;
}else{
	$_SESSION["target_path"]=trim($_POST["path"]);
	echo 0;
}

?>