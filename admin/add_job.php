<?php
session_start();
require_once("function.php");
$m='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function fetch_subcat(id,id1){
		var jc_id=$("#"+id1).val();
		//alert(jc_id);
		if(jc_id.trim() !='0'){
		$.ajax({
			url:'fetch_job_subcat.php?jc_id='+jc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#"+id).html(response);
			}
		});
		}else{
			$("#"+id).html("");
		}
	}
	
function fetch_city(){
		var cn_id=$("#country").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city").html(response);
			}
		});
	}
	
	function fetch_region(){
		var city=$("#city_update").val();
		$.ajax({
			url:'fetch_city.php?city='+city,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){//alert(response);
				$("#region").html(response);
			}
		});
	}

function change_field_name(){
	var send_application=$("#send_application").val().trim();
	if(send_application=="Email"){
	$("#application_sendTo").attr("placeholder", "Email").blur();	
	$("#application_sendTo").val('');
	$("#application_sendTo_error").html('<em>Enter Email</em>');
	$("#label_name").html('Enter Email');
	}else{
	$("#application_sendTo").val('');
	$("#application_sendTo").attr("placeholder", "Phone").blur();	
	$("#application_sendTo_error").html('<em>Enter Phone</em>');
	$("#label_name").html('Enter Phone');
	}
	
}

$(document).ready(function() {
$("#add_job").on('submit',(function(e){  
	$.ajax({
        	url: "add_job_multiple_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			var data=data.split("||");
			if(data[1].trim()==1){
				$("#ajax_form").html(data[0]);
				$("#ajax_fetch_form").show(1200);
			}else if(data[1].trim()=='finish'){
				alert("Job Added Successfully");
				window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
			}else{
				alert("Something Went Wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });  
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
<div class="panel-title">Add Job
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_job" enctype="multipart/form-data">
<div id="ajax_form">

<div id="cat_field" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  >
<option value="0">Select Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select id="sub_sub_cat4" name="sub_sub_cat_id" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Listing Details</h6>
</div>
</div>


<div id="common_field">
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Listing Title :</h6>
<label class="field prepend-icon">
<input type="text" name="listing_title" id="listing_title" class="gui-input" placeholder="Listing Title">
<b class="tooltip tip-right-top" id="listing_title_error"><em>Enter Listing Title</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Company :</h6>
<label class="field prepend-icon">
<input type="text" name="company" id="company" class="gui-input" placeholder="Company Name">
<b class="tooltip tip-right-top" id="company_error"><em>Enter Company Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<input type="hidden" name="country" id="country" value="5" />
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">City :</h6>
<label class="field select">
<select id="city_update" name="city" onchange="fetch_region();" >
<option value="0">Select City</option>
<?php
$country=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>5)));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["ct_id"]; ?>" >
<?php echo $v["ct_name"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Region :</h6>
<label class="field select">
<select id="region" name="region" >
<option value="0">Select Region</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Job Type</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Job Type :</h6>
<label class="field select">
<select id="job_type1" name="job_type1" >
<option value="0">Select</option>
<option value="1">Full Time</option>
<option value="2">Part Time</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Job Type :</h6>
<label class="field select">
<select id="job_type2" name="job_type2" >
<option value="0">Select</option>
<option value="1">Permanent</option>
<option value="2">Contract / Temp</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;">Pay and benefits :</h6>
<label class="field prepend-icon">
<input type="text" name="pay_benefit" id="pay_benefit" class="gui-input" placeholder="Pay & Benefits">
<b class="tooltip tip-right-top" id="pay_benefit_error"><em>Enter Pay & Benefits</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Approx. Pay :</h6>
<label class="field select">
<select id="approx_pay_type" name="approx_pay_type" >
<option value="1">Annual</option>
<option value="2">Hourly</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Minimum Scale :</h6>
<label class="field select">
<select id="min_scale" name="min_scale" >
<option value="0">Select</option>
<?php
for($i=20;$i<=200;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo currency().$i.'k'; ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Max. Scale :</h6>
<label class="field select">
<select id="max_scale" name="max_scale" >
<option value="0">Select</option>
<?php
for($i=20;$i<=200;$i++){
?>
<option value="<?php echo $i; ?>"><?php echo currency().$i.'k'; ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Work Visa required ? :</h6>
<label class="field select">
<select id="visa_required" name="visa_required" >
<option value="1">Yes</option>
<option value="2">No</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Your References :</h6>
<label class="field prepend-icon">
<input type="text" name="reference" id="reference" class="gui-input" placeholder="Your References">
<b class="tooltip tip-right-top" id="reference_error"><em>Enter Your References</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Description</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Short Summery :</h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="short_summery" name="short_summery" placeholder="Short Summery"></textarea>
<b class="tooltip tip-right-top" id="short_summery_error"><em>Write Something About Job Sortly</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Job Details :</h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="job_desc" name="job_desc" placeholder="Job Description"></textarea>
<b class="tooltip tip-right-top" id="job_desc_error"><em>Write Something About Job</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>




<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Application Details</h6>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Contact name :</h6>
<label class="field prepend-icon">
<input type="text" name="contact_name" id="contact_name" class="gui-input" placeholder="Contact Name">
<b class="tooltip tip-right-top" id="contact_name_error"><em>Enter Contact Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Phone numbers :</h6>
<label class="field prepend-icon">
<input type="text" name="mobile_no" id="mobile_no" class="gui-input" placeholder="Phone No.">
<b class="tooltip tip-right-top" id="mobile_no_error"><em>Enter Phone No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Landline numbers :</h6>
<label class="field prepend-icon">
<input type="text" name="landline" id="landline" class="gui-input" placeholder="Landline numbers">
<b class="tooltip tip-right-top" id="landline_error"><em>Enter Landline numbers</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Application Method :</h6>
<label class="field select">
<select id="send_application" name="send_application" onchange="change_field_name();" >
<option value="Email">Email</option>
<option value="Phone">Phone</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;" id="label_name">Enter Email :</h6>
<label class="field prepend-icon">
<input type="text" name="application_sendTo" id="application_sendTo" class="gui-input" placeholder="Email">
<b class="tooltip tip-right-top" id="application_sendTo_error"><em>Enter Email</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;">Application instructions :</h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="application_instruction" name="application_instruction" placeholder="Application instructions"></textarea>
<b class="tooltip tip-right-top" id="application_instruction_error"><em>Write Something About Application instructions</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>

<input type="hidden" name="next_form" value="photo_upload" />
<input type="hidden" name="db_name" value="add_job" />

</div>

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div> <!-- END AJAX DIV  -->
</form>
</div>
</div>
</div>
</div>
</div>
 
</section>
 
</section>
 

 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
