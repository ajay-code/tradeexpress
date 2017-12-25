<?php
session_start();
require_once("function.php");

$_POST["password"]=md5($_POST["password"]);
$_POST["status"]=1;
//$data=loginCheck(doSelect("*","ambit_registration",$_POST));
$data=loginCheck(login($_POST["email"],$_POST["password"],$_POST["status"]));

//var_dump($data);
if(!empty($data)){
foreach ($data as $key => $v) {
	$_SESSION["ar_id"]=$v["ar_id"];

}
if(!isset($_SESSION["target_path"])){
	echo '1'.'||   ';
}else{
	echo '2'.'||'.$_SESSION["target_path"];
}
}else{
	echo '0'.'||';
}
unset($_SESSION['target_path']);
?>