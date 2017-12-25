<?php
echo '||';
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_country'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_country");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_country'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_country",$_POST,array("cn_id"=>$_POST["cn_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_country'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_country",$_POST);
	doDelete("ambit_city",array("ct_cn_id"=>$_POST["cn_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Add City
if(isset($_POST["msg"]) && $_POST["msg"]=='add_city'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_city");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}


//Update City
if(isset($_POST["msg"]) && $_POST["msg"]=='update_city'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_city",$_POST,array("ct_id"=>$_POST["ct_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete City
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_city'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_city",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Add Region
if(isset($_POST["msg"]) && $_POST["msg"]=='add_region'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_region");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Update Region
if(isset($_POST["msg"]) && $_POST["msg"]=='update_region'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_region",$_POST,array("ar_id"=>$_POST["ar_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete Region
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_region'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_region",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}/* Add Suburb */if(isset($_POST["msg"]) && $_POST["msg"]=='add_suburb'){	unset($_POST["msg"]);	$status=doInsert($_POST,"ambit_suburb");	if($status){		echo '1||';	}else{		echo '0||';	}}if(isset($_POST["msg"]) && $_POST["msg"]=='update_suburb'){	unset($_POST["msg"]);	$status=doUpdate("ambit_suburb",$_POST,array("sub_id"=>$_POST["sub_id"]));	if($status){		echo '1||';	}else{		echo '0||';	}}if(isset($_POST["msg"]) && $_POST["msg"]=='delete_suburb'){	unset($_POST["msg"]);	$status=doDelete("ambit_suburb",$_POST);	if($status){		echo '1||';	}else{		echo '0||';	}}
?>



