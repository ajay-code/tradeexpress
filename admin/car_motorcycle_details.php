<?php
session_start();
require_once("function.php");
$n='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>

<script type="text/javascript">

</script>

<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">

</header>
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="javascript:void(0);">Car Motorcycle & Boats Details</a>
</li>
</ol>
</div>
</div>
</div>
</div>
<section id="content" class="table-layout animated fadeIn">
<?php
$select="acm_id,cat_id,sub_cat_id,sub_sub_cat_id,list_in_second_cat,cat1_id,sub_cat1_id,sub_sub_cat1_id,listing_title,subtitle,brand_item,start_price,reserve_price,buy_now,allow_bid,listing_length,item_desc";
$from="add_car_motorcycle";
$condition=array("acm_id"=>trim($_GET["id"]));
$item_detls=getDetails(doSelect1($select,$from,$condition));
/* echo "<pre>";
print_r($item_detls);  */
?>
<div class="panel" id="spy5">
<div class="panel-heading">
<span class="panel-title"><h3><font style="color:red;opacity:0.7;"><?php echo getCarTitle(trim($_GET["id"]));  ?></font></h3></span>

</div>
<div class="panel-body pn">
<div class="table-responsive">
<div class="table-responsive">
<div class="bs-component">
<table class="table table-bordered mbn fixed">
<col width="40%" />
<col width="60%" />
<?php
foreach($item_detls as $k=>$v){
?>
<tr>
<td style="font-size: 20px;">Category</td>
<?php
if(getCarCategory($v["cat_id"])==""){
	$cat_id="";
}else{
	$cat_id=getCarCategory($v["cat_id"]);
}
if(getCarCategory($v["sub_cat_id"])==""){
	$sub_cat_id="";
}else{
	$sub_cat_id=' > '.getCarCategory($v["sub_cat_id"]);
}
if(getCarCategory($v["sub_sub_cat_id"])==""){
	$sub_sub_cat_id="";
}else{
	$sub_sub_cat_id=' > '.getCarCategory($v["sub_sub_cat_id"]);
}
?>
<td style="font-size: 15px;"><h3><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></h3></td>
</tr>
<?php
if($v["list_in_second_cat"]=="1"){
?>
<tr>
<td style="font-size: 20px;">Second Category</td>
<?php
if(getCarCategory($v["cat1_id"])==""){
	$cat_id="";
}else{
	$cat_id=getCarCategory($v["cat1_id"]);
}
if(getCarCategory($v["sub_cat1_id"])==""){
	$sub_cat_id="";
}else{
	$sub_cat_id=' > '.getCarCategory($v["sub_cat1_id"]);
}
if(getCarCategory($v["sub_sub_cat1_id"])==""){
	$sub_sub_cat_id="";
}else{
	$sub_sub_cat_id=' > '.getCarCategory($v["sub_sub_cat1_id"]);
}
?>
<td style="font-size: 15px;"><h3><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></h3></td>
</tr>
<?php
}
?>
<tr>
<td style="font-size: 20px;">Listing Title</td>
<td style="font-size: 15px;"><h3><?php echo $v["listing_title"] ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Sub-Title</td>
<?php
if(trim($v["subtitle"])==""){
	$subtitle='<font color="red">No Sub-Title</font>';
}else{
	$subtitle=$v["subtitle"];
}
?>
<td style="font-size: 15px;"><h3><?php echo $subtitle; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Brand Item</td>
<?php
if(trim($v["brand_item"])=="1"){
	$brand_item="USED";
}else{
	$brand_item="NEW";
}

?>
<td style="font-size: 15px;"><h3><?php echo $brand_item; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Base Price</td>
<td style="font-size: 15px;"><h3><?php echo currency().$v["start_price"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Reserve Price</td>
<td style="font-size: 15px;"><h3><?php echo currency().$v["reserve_price"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Buy Now</td>
<td style="font-size: 15px;"><h3><?php echo currency().$v["buy_now"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Allow Bid</td>
<?php
if($v["allow_bid"]==1){
	$allow_bid="<font color='blue'>Only Authenticated Bid</font>";
}else{
	$allow_bid="<font color='red'>Anyone</font>";
}
?>
<td style="font-size: 15px;"><h3><?php echo $allow_bid; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Listing Duration</td>
<td style="font-size: 15px;"><h3><?php echo get_date_str($v["listing_length"]); ?></h3></td>
</tr>

<tr>
<td style="font-size: 20px;">Item Description</td>
<td style="font-size: 15px;"><h3><?php echo $v["item_desc"]; ?></h3></td>
</tr>
<?php
$select="acm_id,ccef_id,value";
$from="add_car_motorcycle_extra_field";
$condition=array("acm_id"=>trim($v["acm_id"]));
$extra_field_detls=getDetails(doSelect1($select,$from,$condition));
foreach($extra_field_detls as $k3=>$v3){
?>
<tr>
<td style="font-size: 20px;"><?php echo getCarLabel($v3["ccef_id"]);  ?></td>
<?php
$value=explode(" || ",$v3["value"]);
$value=implode(" , ",$value);
?>
<td style="font-size: 15px;"><h3><?php echo $value; ?></h3></td>
</tr>


<?php
}
?>
<tr>
<td style="font-size: 20px;" colspan="2"><a href="car_motorcycle_gallery.php?id=<?php echo trim($_GET["id"]); ?>" target="_blank" ><button class="btn btn-default btn-primary"><font color="black" >See Photo Gallery</font></button></a></td>
</tr>
</table>

</div>
</div>
</div>
</div>
</div>
</section>




 
<?php
}
require_once("include/footer1.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
