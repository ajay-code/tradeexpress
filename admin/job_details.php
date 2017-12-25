<?php
session_start();
require_once("function.php");
$m='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>

<script type="text/javascript">
function delete_hotel(aah_id){
	//alert(sidd);
	if(confirm("Are You Sure To delete Hotel ???")){
		$.post(
		"ajax_delete.php",
		{aah_id:aah_id,msg:"delete_hotel"},
		function(r){
			if(r==1){
				alert("Delete Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
	}
}

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
<a href="javascript:void(0);">Job Details</a>
</li>
</ol>
</div>
</div>
</div>
</div>
<section id="content" class="table-layout animated fadeIn">
<?php
$select="aj_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,company,country,city,job_type1,job_type2,pay_benefit,approx_pay_type,min_scale,max_scale,visa_required,reference,short_summery,job_desc,contact_name,mobile_no,landline,send_application,application_sendTo,application_instruction";
$from="add_job";
$condition=array("aj_id"=>trim($_GET["id"]));
$job_detls=getDetails(doSelect1($select,$from,$condition));
$job_detls=trimmer_db_array($job_detls);
/* echo "<pre>";
print_r($item_detls);  */
?>
<div class="panel" id="spy5">
<div class="panel-heading">
<span class="panel-title"><h3><font style="color:red;opacity:0.7;"><?php echo getJobTitle(trim($_GET["id"]));  ?></font></h3></span>

</div>
<div class="panel-body pn">
<div class="table-responsive">
<div class="table-responsive">
<div class="bs-component">
<table class="table table-bordered mbn fixed">
<col width="40%" />
<col width="60%" />
<?php
foreach($job_detls as $k=>$v){
?>
<tr>
<td style="font-size: 20px;">Category</td>
<?php
if(trim($v["cat_id"])==""){
	$cat_id="";
}else{
	$cat_id=getJobCategory($v["cat_id"]);
}
if(trim($v["sub_cat_id"])==""){
	$sub_cat_id="";
}else{
	$sub_cat_id=' > '.getJobCategory($v["sub_cat_id"]);
}
if(trim($v["sub_sub_cat_id"])==""){
	$sub_sub_cat_id="";
}else{
	$sub_sub_cat_id=' > '.getJobCategory($v["sub_sub_cat_id"]);
}

?>
<td style="font-size: 15px;"><h3><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Listing Title</td>
<td style="font-size: 15px;"><h3><?php echo $v["listing_title"] ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Company</td>
<td style="font-size: 15px;"><h3><?php echo $v["company"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Location</td>
<td style="font-size: 15px;"><h3><?php echo getCityName($v["city"]).' ( '.getCountryName($v["country"]).' ) '; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Job Type</td>
<?php
if($v["job_type1"]=="1"){
	$job_type1="Full Time";
}else{
	$job_type1="Part Time";
}

if($v["job_type2"]=="1"){
	$job_type2="Permanent";
}else{
	$job_type2="Contract / Temp.";
}
?>
<td style="font-size: 15px;"><h3><?php echo $job_type1.' , '.$job_type2; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Pay & Benefits</td>
<td style="font-size: 15px;"><h3><?php echo $v["pay_benefit"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Approximate Salary</td>
<?php
if($v["approx_pay_type"]=="1"){
	$salary=" ( Per Annum )";
}else{
	$salary=" ( Per Hours )";
}
?>
<td style="font-size: 15px;"><h3><?php echo currency().$v["min_scale"].' - '.currency().$v["max_scale"]. $salary; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Visa Required ?</td>
<?php
if($v["visa_required"]==1){
	$visa_required="Yes";
}else{
	$visa_required="No";
}
?>
<td style="font-size: 15px;"><h3><?php echo $visa_required; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Reference</td>
<td style="font-size: 15px;"><h3><?php echo $v["reference"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Short Summery</td>
<td ><h3 style="text-align:justify;"><?php echo $v["short_summery"]; ?></h3></td>
</tr>

<tr>
<td style="font-size: 20px;">Job Description</td>
<td><h3 style="text-align:justify;"><?php echo $v["job_desc"]; ?></h3></td>
</tr>

<tr>
<td style="font-size: 20px;">Contact Information</td>
<td style="font-size: 15px;">
<table class="table table-bordered mbn fixed">
<col width="50%" />
<col width="50%" />
<tr>
<td style="font-size: 15px;">Contact Name</td>
<td style="font-size: 15px;"><?php echo $v["contact_name"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Mobile</td>
<td style="font-size: 15px;"><?php echo $v["mobile_no"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Land Line</td>
<td style="font-size: 15px;"><?php echo $v["landline"]; ?></td>
</tr>
</table>
</td>
</tr>

<tr>
<td style="font-size: 20px;">Job Applied By</td>
<td style="font-size: 15px; "><h3 style="color:blue;"><?php echo $v["send_application"].' : '.$v["application_sendTo"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Application Instruction</td>
<td style="font-size: 15px;"><h3 style="text-align:justify;"><?php echo $v["application_instruction"]; ?></h3></td>
</tr>
<?php
$select="aj_id,jcef_id,value";
$from="add_job_extra_field";
$condition=array("aj_id"=>trim($v["aj_id"]));
$extra_field_detls=getDetails(doSelect1($select,$from,$condition));
foreach($extra_field_detls as $k3=>$v3){
?>
<tr>
<td style="font-size: 20px;"><?php echo getJobLabel($v3["jcef_id"]);  ?></td>
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
<td style="font-size: 20px;" colspan="2"><a href="job_gallery.php?id=<?php echo trim($_GET["id"]); ?>" target="_blank" ><button class="btn btn-default btn-primary"><font color="black" >See Photo Gallery</font></button></a>
<?php
$video=getDetails(doSelect("video","add_job_video",array("aj_id"=>$v["aj_id"])));
if(!empty($video)){
?>
<a href="job_video_gallery.php?id=<?php echo trim($_GET["id"]); ?>" target="_blank" ><button class="btn btn-default btn-primary"><font color="black" >See Video</font></button></a>
<?php
}
?>
</td>
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
