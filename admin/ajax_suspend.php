<?php
session_start();
require_once("function.php");


if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_general_item"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_general_items",array("agi_id"=>$_POST["agi_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_general_items",array("status"=>$status),array("agi_id"=>$_POST["agi_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["msg"]) && $_POST["msg"]=="approval_general_item_image"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_general_items_photo",array("agip_id"=>$_POST["agip_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_general_items_photo",array("status"=>$status),array("agip_id"=>$_POST["agip_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_property"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_property",array("ap_id"=>$_POST["ap_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_property",array("status"=>$status),array("ap_id"=>$_POST["ap_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="approval_property_image"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_property_photo",array("app_id"=>$_POST["app_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_property_photo",array("status"=>$status),array("app_id"=>$_POST["app_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_job"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_job",array("aj_id"=>$_POST["aj_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_job",array("status"=>$status),array("aj_id"=>$_POST["aj_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="approval_job_image"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_job_photo",array("ajp_id"=>$_POST["ajp_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_job_photo",array("status"=>$status),array("ajp_id"=>$_POST["ajp_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="approval_job_video"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_job_video",array("ajv_id"=>$_POST["ajv_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_job_video",array("status"=>$status),array("ajv_id"=>$_POST["ajv_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="approval_property_video"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_property_video",array("apv_id"=>$_POST["apv_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_property_video",array("status"=>$status),array("apv_id"=>$_POST["apv_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_car_motorcycle_item"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_car_motorcycle",array("acm_id"=>$_POST["acm_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_car_motorcycle",array("status"=>$status),array("acm_id"=>$_POST["acm_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="approval_car_image"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_car_motorcycle_photo",array("status"=>$status),array("acmp_id"=>$_POST["acmp_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_price_list"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_price_for_listing",array("apfl_id"=>$_POST["apfl_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_price_for_listing",array("status"=>$status),array("apfl_id"=>$_POST["apfl_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_price_classified"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","add_price_for_classified",array("apfc_id"=>$_POST["apfc_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("add_price_for_classified",array("status"=>$status),array("apfc_id"=>$_POST["apfc_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_customer"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","ambit_registration",array("ar_id"=>$_POST["ar_id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
		doUpdate("add_general_items",array("status"=>0),array("uploader"=>$_POST["ar_id"]));
		doUpdate("add_property",array("status"=>0),array("uploader"=>$_POST["ar_id"]));
		doUpdate("add_car_motorcycle",array("status"=>0),array("uploader"=>$_POST["ar_id"]));
		doUpdate("add_job",array("status"=>0),array("uploader"=>$_POST["ar_id"]));
	}
	$status=doUpdate("ambit_registration",array("status"=>$status),array("ar_id"=>$_POST["ar_id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

#SUSPEND LINK
if(isset($_POST["msg"]) && $_POST["msg"]=="suspend_link"){
	unset($_POST["msg"]);
	$status=trim(seeMoreDetails("status","admin_website_link",array("id"=>$_POST["id"])));
	if($status=="0"){
		$status=1;
	}else{
		$status=0;
	}
	$status=doUpdate("admin_website_link",array("status"=>$status),array("id"=>$_POST["id"]));
	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END SUSPEND LINK

?>