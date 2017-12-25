<?php
session_start();
require_once("function.php");

$to =getAdminEmail();
$subject =$_POST["subject"];
$txt =$_POST["message"];
$headers = "From: ".getCusEmail($_SESSION["ar_id"]).  "\r\n" .
"CC: ".$_POST["email"];

$status=mail($to,$subject,$txt,$headers);
if($status){
	echo 1;
}else{
	echo 0;
}
?>