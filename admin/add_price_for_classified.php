<?php
session_start();
require_once("function.php");
$a='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
function only_number(value)
       {
          var charCode = (value.which) ? value.which : value.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

function fetch_field(){
	var for_what=$("#for_what").val().trim();
	if(for_what=="0"){
		$("#ajax_form").html("");
	}else{
		$.post(
		"ajax_fetch_classified_price_form.php",
		{for_what:for_what},
		function(r){
		$("#ajax_form").html(r);	
		}
		);
	}
	
}
	  
$(document).ready(function() {
$("#add_listing_price").on('submit',(function(e){  
	$.ajax({
        	url: "ajax_add_price_for_classified.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Added Successfully");
				location.reload();
			}else if(data==2){
				alert("Updated Successfully");
				location.reload();
			}else{
				alert("something Went Wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
	  
function change_status(apfc_id)
{
	$.post(
		"ajax_suspend.php",
		{apfc_id:apfc_id,msg:"suspend_price_classified"},
		function(r){
		
			if(r==1){
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
}
</script>




<section id="content_wrapper">
 
<header id="topbar" class="alt">

</header>
 
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
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
<a href="javascript:void(0);">Price For Rental Combo & Rental Feature, SubTitle, Listed In Second Category</a>
</li>
</ol>
</div>
</div>
</div>
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="margin-left:37px;">Add / Update Price  
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_listing_price" >

<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;">Select For :</h6>
<label class="field select">
<select id="for_what" name="for_what" onchange="fetch_field();" >
<option value="0">Select</option>
<option value="rental_combo">Rental Combo</option>
<option value="rental_feature">Rental Feature</option>
<option value="listed_in_second_cat">Listed In Second Category</option>
<option value="subtitle">For Subtitle</option>
<option value="reserve_price">For Reserve Price</option>
<option value="Feature_Combo">For Feature Combo</option>
<option value="Featured">For Featured</option>
<option value="rental_highlights">Rental Highlights</option> 
<option value="rental_bold">Rental Bold</option>
<option value="Highlight">Highlights</option>
<option value="Bold_Title">Bold</option>
<option value="MotorWeb_Basic_Report">For MotorWeb Basic Report</option>
<option value="job_feature">Job feature</option>
<option value="branding">Branding</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
<div id="ajax_form">
</div>
</form>
</div>
</div>





<div class="panel">

<section id="content" class="table-layout animated fadeIn">
 
<div class="col-md-12">
<div class="panel panel-visible" id="spy3">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Price listing  ( <?php echo currency(); ?> )
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">For</th>
<th class="va-m">Price</th>
<th class="va-m">Min Price</th>
<th class="va-m">Max Price</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">For</th>
<th class="va-m">Price</th>
<th class="va-m">Min Price</th>
<th class="va-m">Max Price</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</tfoot>
<?php
$select="apfc_id,for_what,price,min_price,max_price,status";
$from="add_price_for_classified";
$condition=array();
$price_list=getDetails(doSelect1($select,$from,$condition));

//echo "<pre>";
//print_r($price_list);
//exit;
$price_list=trimmer_db_array($price_list);
?>
<tbody>
<?php
foreach($price_list as $k=>$v){
?>
<tr>
<?php
$for_what="";
if($v["for_what"]=="rental_combo"){
$for_what="Rental Combo";	
}else if($v['for_what']=="job_feature"){
	$for_what="Job Feature";	
}else if($v['for_what']=="branding"){
	$for_what = "Branding";
}else if($v["for_what"]=="rental_feature"){
	$for_what="Rental Feature";	
}else if($v["for_what"]=="listed_in_second_cat"){
$for_what="Listing in second category";	
}else if($v["for_what"]=="subtitle"){
$for_what="subtitle";	
}else if($v["for_what"]=="reserve_price"){
$for_what="Reserve Price";	
}else if($v["for_what"]=="Feature_Combo"){
$for_what="Feature Combo";	
}else if($v["for_what"]=="Featured"){
$for_what="Featured";	
}else if($v["for_what"]=="Highlight"){
$for_what="Highlights";	
}
else if($v["for_what"]=="Bold_Title"){
$for_what="Bold";	
}else if($v["for_what"]=="rental_highlights"){ // Here added 2 new values rental highlight and rental bold by Sachin Dec 8 2017
$for_what="Rental Highlights";	
}
else if($v["for_what"]=="rental_bold"){
$for_what="Rental Bold";	
}else{
	$for_what="MotorWeb Basic Report";
}
?>
<td><font color="#1e4248" style="font-size:1.2em;"><?php echo $for_what; ?></font></td>
<td><font color="blue"><?php echo is_price_currency($v["price"]); ?></font></td>
<td><font color="blue"><?php echo is_price_currency($v["min_price"]); ?></font></td>
<td><font color="blue"><?php echo is_price_currency($v["max_price"]); ?></font></td>
<td class="hidden-xs">
<?php
if($v["status"]==0){
?>
<img src="icon/suspend.png" style="cursor:pointer;"  data-toggle="tooltip" data-original-title="Suspend" width="19px;" />
<?php	
}else{
?>
<img src="icon/tick.png" style="cursor:pointer;"  data-toggle="tooltip" data-original-title="Approved"  width="19px;" />
<?php
}
?>


<img src="icon/change_status.png" style="cursor:pointer;" onclick="change_status('<?php echo $v["apfc_id"];  ?>');"   data-toggle="tooltip"  rel="tooltip"  <?php  if($v["status"]=="0"){ ?> data-original-title="Click Here To Approve" <?php }else{ ?> data-original-title="Click Here To Suspend" <?php } ?> width="22px;" /> &nbsp

</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>


</div>




</div>
</div>
</div>
 
</section>
 
</section>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
