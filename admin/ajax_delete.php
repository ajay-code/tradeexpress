<?php
session_start();
require_once("function.php");

#DELETE GENERAL ITEMS
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_general_item"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_general_items_photo",array("agi_id"=>$_POST["agi_id"]),"../general_items_image/");
	doDelete("add_general_items_photo",array("agi_id"=>$_POST["agi_id"]));
	doDelete("add_general_items_extra_field",array("agi_id"=>$_POST["agi_id"]));
	
	$status=doDelete("add_general_items",array("agi_id"=>$_POST["agi_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE GENERAL ITEMS


#DELETE GENERAL ITEMS IMAGE
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_general_item_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_general_items_photo",array("agip_id"=>$_POST["agip_id"]),"../general_items_image/");
	$status=doDelete("add_general_items_photo",array("agip_id"=>$_POST["agip_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE GENERAL ITEMS IMAGE


#DELETE PROPERTY
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_property"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_property_photo",array("ap_id"=>$_POST["ap_id"]),"../property_image/");
	doDelete("add_property_photo",array("ap_id"=>$_POST["ap_id"]));
	doDelete("add_property_extra_field",array("ap_id"=>$_POST["ap_id"]));
	doDelete("add_property_contact_dtls",array("ap_id"=>$_POST["ap_id"]));
	doDelete("add_property_price_dtls",array("ap_id"=>$_POST["ap_id"]));
	
	$status=doDelete("add_property",array("ap_id"=>$_POST["ap_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE PROPERTY

#DELETE PROPERTY IMAGE
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_property_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_property_photo",array("app_id"=>$_POST["app_id"]),"../property_image/");
	$status=doDelete("add_property_photo",array("app_id"=>$_POST["app_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE PROPERTY IMAGE

#DELETE JOB
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_job"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_job_photo",array("aj_id"=>$_POST["aj_id"]),"../job_image/");
	doDelete("add_job_photo",array("aj_id"=>$_POST["aj_id"]));
	doDelete("add_job_video",array("aj_id"=>$_POST["aj_id"]));
	doDelete("add_job_extra_field",array("aj_id"=>$_POST["aj_id"]));

	$status=doDelete("add_job",array("aj_id"=>$_POST["aj_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE JOB

#DELETE JOB IMAGE
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_job_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_job_photo",array("ajp_id"=>$_POST["ajp_id"]),"../job_image/");
	$status=doDelete("add_job_photo",array("ajp_id"=>$_POST["ajp_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE JOB IMAGE


#DELETE JOB VIDEO
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_job_video"){
	unset($_POST["msg"]);
	$status=doDelete("add_job_video",array("ajv_id"=>$_POST["ajv_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE JOB VIDEO

#DELETE PROPERTY VIDEO
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_property_video"){
	unset($_POST["msg"]);
	$status=doDelete("add_property_video",array("apv_id"=>$_POST["apv_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE PROPERTY VIDEO

#DELETE JOB
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_car_motorcycle"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_car_motorcycle_photo",array("acm_id"=>$_POST["acm_id"]),"../car_motorcycle_image/");
	doDelete("add_car_motorcycle_photo",array("acm_id"=>$_POST["acm_id"]));
	doDelete("add_car_motorcycle_extra_field",array("acm_id"=>$_POST["acm_id"]));
	doDelete("add_car_motorcycle_listing_features",array("acm_id"=>$_POST["acm_id"]));
	
	$status=doDelete("add_car_motorcycle",array("acm_id"=>$_POST["acm_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE JOB


#DELETE JOB IMAGE
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_car_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]),"../car_motorcycle_image/");
	$status=doDelete("add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE JOB IMAGE


#DELETE CUSTOMER
if(isset($_POST["msg"]) && $_POST["msg"]=="delete_customer"){
	unset($_POST["msg"]);
	
		fileDelete("image","ambit_registration",array("ar_id"=>$_POST["ar_id"]),"../customer_image/");
		doDelete("add_general_items",array("uploader"=>$_POST["ar_id"]));
		doDelete("add_property",array("uploader"=>$_POST["ar_id"]));
		doDelete("add_car_motorcycle",array("uploader"=>$_POST["ar_id"]));
		doDelete("add_job",array("uploader"=>$_POST["ar_id"]));
	
	$status=doDelete("ambit_registration",array("ar_id"=>$_POST["ar_id"]));	
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
#END DELETE CUSTOMER
?>