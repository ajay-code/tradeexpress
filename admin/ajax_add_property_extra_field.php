<?php
session_start();
require_once("function.php");

$value_string="";
if(!empty($_POST["option_array1"])){
	
	foreach($_POST["option_array1"] as $k=>$v){
		if ($k % 2 != 0) {
			$value_string.=" :: ";
        }else{
			if($k!="0"){
			$value_string.=" || ";
			}
		}
		$value_string.=$v;
	}
	unset($_POST["option_array1"]);
	}

	$_POST["value"]=$value_string;
	$status=doInsert($_POST,"property_cat_extra_field");
	if($status){
		echo 1;
	}else{
		echo 0;
	}




?>