
<?php
echo 'a||';
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_category'){
	unset($_POST["msg"]);
	$_POST["parent_id"]=0;
	$status=doInsert($_POST,"job_category");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_category'){
	unset($_POST["msg"]);
	$status=doUpdate("job_category",$_POST,array("jc_id"=>$_POST["jc_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_category'){
	unset($_POST["msg"]);
	$status=doDelete("job_category",$_POST);
	doDelete("job_category",array("parent_id"=>$_POST["jc_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Add City
if(isset($_POST["msg"]) && $_POST["msg"]=='add_sub_cat'){
	unset($_POST["msg"]);
	$status=doInsert(array("category"=>$_POST["category"],"parent_id"=>$_POST["jc_id"]),"job_category");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}


//Update City
if(isset($_POST["msg"]) && $_POST["msg"]=='update_subcat'){
	unset($_POST["msg"]);
	$status=doUpdate("job_category",$_POST,array("jc_id"=>$_POST["jc_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete City
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_subcat'){
	unset($_POST["msg"]);
	$status=doDelete("job_category",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='add_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doInsert(array("category"=>$_POST["category"],"parent_id"=>$_POST["jc_id"]),"job_category");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='update_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doUpdate("job_category",array("category"=>$_POST["category"]),array("jc_id"=>$_POST["jc_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doDelete("job_category",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

?>

