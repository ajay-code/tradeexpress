<?php
session_start();
require_once("function.php");
$infor=explode("||",$_POST["information"]);
$_POST=trimmer($infor);

$db=$_POST[0];
$item_id=$_POST[1];
if($db=="add_general_items"){
$item_title='For posting <a href="general_item_details.php?id='.$item_id.'" target="_blank" style="color:yellow;">'.getGeneralItemTitle($item_id).'</a>';
}
if($db=="add_property"){
$item_title='For posting <a href="property_details.php?id='.$item_id.'" target="_blank"  style="color:yellow;">'.getPropertyTitle($item_id).'</a>';
}
if($db=="add_job"){
$item_title='For posting <a href="job_details.php?id='.$item_id.'" target="_blank"  style="color:yellow;">'.getJobTitle($item_id).'</a>';
}

if($db=="add_car_motorcycle"){
$item_title='For posting <a href="car_details.php?id='.$item_id.'" target="_blank"  style="color:yellow;">'.getCarTitle($item_id).'</a>';
}

echo $item_title;

?>