<?php
session_start();
require_once("function.php");
print_r($_POST);
print_r($_FILES);
if(isset($_FILES) && $_FILES["image"]["error"]=="0"){
	    $image=time().$_FILES["image"]["name"];
		fileDelete("st_value","site_settings",array("st_id"=>$_POST["st_id"]),'../images/');
		doUpdate("site_settings",array("st_value"=>$image),array("st_id"=>$_POST["st_id"]));
		$temp_image=$_FILES["image"]["tmp_name"];
		move_uploaded_file($temp_image,"../images/".$image);
}
?>