<?php
session_start();
require_once("function.php");

if(isset($_FILES["login_page_logo"]["name"]) &&  $_FILES["login_page_logo"]["name"] != "" && $_FILES["login_page_logo"]["error"] == 0 ){
$image=$_FILES["login_page_logo"]["name"];
$temp_image=$_FILES["login_page_logo"]["tmp_name"];
move_uploaded_file($temp_image,"../images/".$image);
fileDelete("st_value","site_settings",array("st_id"=>17),'../images/');
$status=doUpdate("site_settings",array("st_value"=>$image),array("st_id"=>17));
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
	echo 2;
}




?>