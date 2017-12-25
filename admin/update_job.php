<?php
session_start();
require_once("function.php");
$_SESSION["updated_id"]=trim($_POST["aj_id"]);
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

</script>

<?php
$select="aj_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,company,country,city,region,job_type1,job_type2,pay_benefit,approx_pay_type,min_scale,max_scale,visa_required,reference,short_summery,job_desc,contact_name,mobile_no,landline,send_application,application_sendTo,application_instruction";
$from="add_job";
$condition=array("aj_id"=>trim($_POST["aj_id"]));
$job_detls=getDetails(doSelect1($select,$from,$condition));
$job_detls=trimmer_db_array($job_detls);
/* echo "<pre>";
print_r($item_detls);  */
foreach($job_detls as $k2=>$v2){
?>
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Job
</div>
</div>
<div class="panel-body">

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
$category=trimmer_db_array($category);
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" <?php if($v["jc_id"]==$v2["cat_id"]) echo 'selected';  ?> >
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
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$v2["cat_id"])));
$category=trimmer_db_array($category);
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" <?php if($v["jc_id"]==$v2["sub_cat_id"]) echo 'selected';  ?> >
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
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select id="sub_sub_cat4" name="sub_sub_cat_id" >
<option value="0">Select Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$v2["sub_cat_id"])));
$category=trimmer_db_array($category);
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" <?php if($v["jc_id"]==$v2["sub_sub_cat_id"]) echo 'selected';  ?> >
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
<input type="text" name="listing_title" id="listing_title" value="<?php echo $v2["listing_title"]; ?>" class="gui-input" placeholder="Listing Title">
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
<input type="text" name="company" id="company" value="<?php echo $v2["company"]; ?>" class="gui-input" placeholder="Company Name">
<b class="tooltip tip-right-top" id="company_error"><em>Enter Company Name</em></b>
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
<h6 style="color: #999;">City :</h6>
<label class="field select">
<select id="city_update" name="city" onchange="fetch_region();" >
<option value="0">Select City</option>
<?php
$city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$v2["country"])));
foreach($city as $k=>$v){
?>
<option value="<?php echo $v["ct_id"]; ?>" <?php if($v["ct_id"]==$v2["city"]) echo 'selected';  ?> >
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
<?php
$region=getDetails(doSelect("ar_id,region","ambit_region",array("ct_id"=>$v2["city"])));
foreach($region as $k=>$v){
?>
<option value="<?php echo $v["ar_id"]; ?>" <?php if($v["ar_id"]==$v2["region"]) echo 'selected';  ?> >
<?php echo $v["region"];  ?>
</option>
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
<option value="1" <?php if($v2["job_type1"]=="1") echo 'selected'; ?> >Full Time</option>
<option value="2" <?php if($v2["job_type1"]=="2") echo 'selected'; ?> >Part Time</option>
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
<option value="1" <?php if($v2["job_type2"]=="1") echo 'selected'; ?> >Permanent</option>
<option value="2" <?php if($v2["job_type2"]=="1") echo 'selected'; ?> >Contract / Temp</option>
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
<input type="text" name="pay_benefit" id="pay_benefit" value="<?php echo $v2["pay_benefit"]; ?>" class="gui-input" placeholder="Pay & Benefits">
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
<option value="1" <?php if($v2["approx_pay_type"]=="1") echo 'selected'; ?> >Annual</option>
<option value="2" <?php if($v2["approx_pay_type"]=="2") echo 'selected'; ?> >Hourly</option>
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
<option value="<?php echo $i; ?>" <?php if($i==$v2["min_scale"]) echo 'selected'; ?> ><?php echo currency().$i.'k'; ?></option>
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
<option value="<?php echo $i; ?>" <?php if($i==$v2["max_scale"]) echo 'selected'; ?> ><?php echo currency().$i.'k'; ?></option>
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
<option value="1" <?php if('1'==$v2["visa_required"]) echo 'selected'; ?> >Yes</option>
<option value="2" <?php if('2'==$v2["visa_required"]) echo 'selected'; ?> >No</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Your References :</h6>
<label class="field prepend-icon">
<input type="text" name="reference" id="reference" value="<?php echo $v2["reference"]; ?>" class="gui-input" placeholder="Your References">
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
<textarea class="gui-textarea" id="short_summery" name="short_summery" placeholder="Short Summery"><?php echo $v2["short_summery"]; ?></textarea>
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
<textarea class="gui-textarea" id="job_desc" name="job_desc" placeholder="Job Description"><?php echo $v2["job_desc"]; ?></textarea>
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
<input type="text" name="contact_name" id="contact_name" value="<?php echo $v2["contact_name"]; ?>" class="gui-input" placeholder="Contact Name">
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
<input type="text" name="mobile_no" id="mobile_no" value="<?php echo $v2["mobile_no"]; ?>" class="gui-input" placeholder="Phone No.">
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
<input type="text" name="landline" id="landline" value="<?php echo $v2["landline"]; ?>" class="gui-input" placeholder="Landline numbers">
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
<option value="Email" <?php if("Email"==$v2["send_application"]) echo 'selected'; ?> >Email</option>
<option value="Phone" <?php if("Phone"==$v2["send_application"]) echo 'selected'; ?> >Phone</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;" id="label_name">Enter <?php if($v2["send_application"]=='Email'){  ?>Email <?php }else{ ?> Phone <?php } ?>:</h6>
<label class="field prepend-icon">
<input type="text" name="application_sendTo" value="<?php echo $v2["application_sendTo"]; ?>" id="application_sendTo" class="gui-input" placeholder="Email">
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
<textarea class="gui-textarea" id="application_instruction" name="application_instruction" placeholder="Application instructions"><?php echo $v2["application_instruction"]; ?></textarea>
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
</div>
</div>
</div>
</div>
</div>
</section>
<?php
}
?>