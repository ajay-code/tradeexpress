<?php
session_start();
require_once("function.php");
$_SESSION["updated_id"]=trim($_POST["ap_id"]);
?>
<script type="text/javascript">
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
				$("#city_update").html(response);
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
function fetch_subcat(id,id1){
		var pc_id=$("#"+id1).val();
		//alert(pc_id);
		if(pc_id.trim() !='0'){
		$.ajax({
			url:'fetch_property_subcat.php?pc_id='+pc_id,
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

function enable_price_field(id){
	var value=$("#"+id).val();
	$.post(
	"ajax_fetch_add_property_form.php",
	{values:value,msg:'price_field'},
	function(r){
	$("#ajax_price_field").html(r);
	}
	);
}
function enable_contact_form(id){
	var value=$("#"+id).val();
	$.post(
	"ajax_fetch_add_property_form.php",
	{val:value,msg:'contact_field'},
	function(r){
	$("#ajax_contact_field").html(r);
	}
	);
}


function enable_field(action_id,own_id){
	var check_value=$("#"+own_id).val();
	if(check_value.trim()=="0"){
	$("#"+action_id).prop("disabled", true);	
	}else{
	$("#"+action_id).prop("disabled", false);
	}
}
function enable_reserve_price(action_id,own_id){
	var check_value=$('input[name=reserve_price]:radio:checked').val()
	if(check_value.trim()=="0"){
	$("#"+action_id).prop("disabled", false);	
	}else{
	$("#"+action_id).prop("disabled", true);
	}
}
function enable_length_field(action_id1,action_id2){
	var check_value=$('input[name=listing_duration]:radio:checked').val()
	//alert(check_value);
	if(check_value.trim()=="0"){
	$("#"+action_id1).prop("disabled", false);
	$("#"+action_id2).prop("disabled", true);	
	}else{
	$("#"+action_id2).prop("disabled", false);
	$("#"+action_id1).prop("disabled", true);
	}
}


</script>

<?php
$select="ap_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,	smoke_alarm,	agency_reference,Posting_status,status";
$from="add_property";
$condition=array("ap_id"=>trim($_POST["ap_id"]));
$property_detls=getDetails(doSelect1($select,$from,$condition));
/* echo "<pre>";
print_r($property_detls);
echo "</pre>"; */
foreach($property_detls as $k2=>$v2){
?>
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Property
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
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" <?php  if(trim($v["pc_id"])==trim($v2["cat_id"])) echo 'selected'; ?> >
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
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>trim($v2["cat_id"]))));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" <?php  if(trim($v["pc_id"])==trim($v2["sub_cat_id"])) echo 'selected'; ?> >
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
<select id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" >
<option value="0">Select Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>trim($v2["sub_cat_id"]))));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" <?php  if(trim($v["pc_id"])==trim($v2["sub_sub_cat_id"])) echo 'selected'; ?> >
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
<?php


?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Listing Duration :</h6>
<label for="datepicker6" class="field prepend-picker-icon">
<input type="text" id="datepicker6"  name="listing_duration" class="gui-input" placeholder="Listing Duration" value="<?php echo $v2["listing_duration"]; ?>">
<b class="tooltip tip-right-top" id="listing_duration_error"><em>Enter Listing Duration</em></b>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: brown;">House number and street name</h6>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="section">
<h6 style="color: #999;">Street :</h6>
<label class="field prepend-icon">
<input type="text" name="street" id="street" value="<?php echo $v2["street"]; ?>" class="gui-input" placeholder="Street">
<b class="tooltip tip-right-top" id="listing_title_error"><em>Enter Street</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-3">
<div class="section">
<h6 style="color: #999;">Unit / Flat :</h6>
<label class="field prepend-icon">
<input type="text" name="unit_flat" id="unit_flat" value="<?php echo $v2["unit_flat"]; ?>" class="gui-input" placeholder="Unit">
<b class="tooltip tip-right-top" id="listing_title_error"><em>Enter Unit / Flat</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Street Name :</h6>
<label class="field prepend-icon">
<input type="text" name="street_name" id="street_name" value="<?php echo $v2["street_name"]; ?>" class="gui-input" placeholder="Street Name">
<b class="tooltip tip-right-top" id="listing_title_error"><em>Enter Street Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: brown;">Location</h6>
</div>
</div>
<?php
$city_id=trim(getCityIdByRegion($v2["region"]));
$country_id=trim(getCountryIdByCity(getCityIdByRegion($v2["region"])));

?>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Country :</h6>
<label class="field select">
<select name="country" id="country" onchange="fetch_city();" >
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" <?php if(trim($v["cn_id"])==$country_id) echo 'selected';  ?> >
<?php echo $v["cn_name"];  ?>
</option>
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
<h6 style="color: #999;">City :</h6>
<label class="field select">
<select name="city" id="city_update" onchange="fetch_region();" >
<option value="0">Select City</option>
<?php
$city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$country_id)));
foreach($city as $k=>$v){
?>
<option value="<?php echo $v["ct_id"]; ?>" <?php if(trim($v["ct_id"])==$city_id) echo 'selected';  ?> >
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
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Suburb :</h6>
<label class="field select">
<select id="region" name="region" >
<option value="0">Select Suburb</option>
<?php
$region=getDetails(doSelect("ar_id,region","ambit_region",array("ct_id"=>$city_id)));
foreach($region as $k=>$v){
?>
<option value="<?php echo $v["ar_id"]; ?>" <?php if(trim($v["ar_id"])==trim($v2["region"])) echo 'selected';  ?> >
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
<h6 style="color: blue;">Pricing</h6>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Rateable value (RV) :</h6>
<label class="field prepend-icon">
<input type="text" name="rateable_value" id="rateable_value" value="<?php echo $v2["rateable_value"]; ?>" class="gui-input" placeholder="Rateable Value">
<b class="tooltip tip-right-top" id="rateable_value_error"><em>Enter Rateable value</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Hide RV On Listing :</h6>
<label class="field select">
<select name="rateable_value_hide" id="rateable_value_hide" >
<option value="0" <?php if(trim($v2["rateable_value_hide"])=="0") echo 'selected';  ?> >No</option>
<option value="1" <?php if(trim($v2["rateable_value_hide"])=="1") echo 'selected';  ?> >Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-4" id="custom_reserve">
<div class="section">
<h6 style="color: #999;">Expected sale price :</h6>
<label class="field prepend-icon">
<input type="text" name="expected_sale_price"  id="expected_sale_price" value="<?php echo $v2["expected_sale_price"]; ?>" class="gui-input" placeholder="Sale Price">
<b class="tooltip tip-right-top" id="expected_sale_price_error"><em>Enter Expected Sale Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>



<?php
$select="price_type,label_name,value";
$from="add_property_price_dtls";
$condition=array("ap_id"=>trim($v2["ap_id"]));
$price_detls=getDetails(doSelect1($select,$from,$condition));
foreach($price_detls as $k=>$v){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price :</h6>
<label class="field select">
<select  id="price" name="price" onchange="enable_price_field('price');" >
<option value="1" <?php if(trim($v["price_type"])=="1") echo 'selected';  ?> >Asking price</option>
<option value="2" <?php if(trim($v["price_type"])=="2") echo 'selected';  ?> >Enquiries over</option>
<option value="3" <?php if(trim($v["price_type"])=="3") echo 'selected';  ?> >To be auctioned on</option>
<option value="4" <?php if(trim($v["price_type"])=="4") echo 'selected';  ?> >Tenders closing on</option>
<option value="5" <?php if(trim($v["price_type"])=="5") echo 'selected';  ?> >Price by negotiation</option>
<option value="6" <?php if(trim($v["price_type"])=="6") echo 'selected';  ?> >Deadline Private Treaty by</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div id="ajax_price_field">


<?php 
if(trim($v["price_type"])=="1"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Asking price :</h6>
<label class="field prepend-icon">
<input type="hidden" name="price1[]" class="gui-input" value="Asking price" />
<!-- <input type="hidden" name="price1[]" class="gui-input" value="asking_price" /> -->

<input type="text" name="price1[]"  id="asking_price" value="<?php echo $v["value"]; ?>" class="gui-input" placeholder="Asking Price">
<b class="tooltip tip-right-top" id="asking_price_error"><em>Asking Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<?php
}
?>
<?php 
if(trim($v["price_type"])=="2"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Enquiries over :</h6>
<label class="field prepend-icon">
<input type="hidden" name="price2[]" class="gui-input" value="Enquiries over" />
<!-- <input type="hidden" name="price2[]" class="gui-input" value="enquiries_over" /> -->

<input type="text" name="price2[]"  id="enquiries_over" value="<?php echo $v["value"]; ?>" class="gui-input" placeholder="Enquiries over">
<b class="tooltip tip-right-top" id="enquiries_over_error"><em>Enquiries over</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<?php 
}
if(trim($v["price_type"])=="3"){
	$value=explode("-",trim($v["value"]));
	$value=$value[1].'/'.$value[2].'/'.$value[0];
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Auction Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price3[]"  class="gui-input" value="Auction Date" />
<!-- <input type="hidden" name="price3[]" class="gui-input" value="auction_date" /> -->

<input type="text" id="datepicker3"  name="price3[]" value="<?php echo $value; ?>" class="gui-input" placeholder="Auction Date">
</label>
</div>
</div>
<?php 
}
if(trim($v["price_type"])=="4"){
	$value=explode("-",trim($v["value"]));
	$value=$value[1].'/'.$value[2].'/'.$value[0];
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Tender Closing Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price4[]" class="gui-input" value="Tender Closing Date" />
<!-- <input type="hidden" name="price4[]" class="gui-input" value="tender_close_date" /> -->

<input type="text" id="datepicker4"  name="price4[]" value="<?php echo $value; ?>" class="gui-input" placeholder="Tender Closing Date">
</label>
</div>
</div>
<?php 
}
if(trim($v["price_type"])=="5"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price By negotiation :</h6>
<label class="field select">
<input type="hidden" name="price5[]" class="gui-input" value="Price by negotiation" />
<!-- <input type="hidden" name="price5[]" class="gui-input" value="negotiation" /> -->

<select name="price5[]" id="negotiation"  >
<option value="1">Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<?php 
}
if(trim($v["price_type"])=="6"){
	$value=explode("-",trim($v["value"]));
	$value=$value[1].'/'.$value[2].'/'.$value[0];
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Deadline Private Treaty By :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price6[]" class="gui-input" value="Deadline Private Treaty By" />
<!-- <input type="hidden" name="price6[]" class="gui-input" value="deadline_date" /> -->

<input type="text" id="datepicker5"  name="price6[]" value="<?php echo $value; ?>" class="gui-input" placeholder="Deadline Private Treaty By">
</label>
</div>
</div>
<?php
}
?>


</div>
</div>
<?php
}
?>




<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Features</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Bedrooms :</h6>
<label class="field prepend-icon">
<input type="text" name="bedroom"  id="bedroom" value="<?php echo $v2["bedroom"]; ?>" class="gui-input" placeholder="Bedrooms">
<b class="tooltip tip-right-top" id="bedroom_error"><em>Enter No. of bedrooms</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Bathrooms :</h6>
<label class="field prepend-icon">
<input type="text" name="bathroom"  id="bathroom" value="<?php echo $v2["bathroom"]; ?>" class="gui-input" placeholder="Bathrooms">
<b class="tooltip tip-right-top" id="bathroom_error"><em>Enter no. of bathrooms</em></b>
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
<h6 style="color: #999;">Floor area ( Meter Sq.) :</h6>
<label class="field prepend-icon">
<input type="text" name="floor_area"  id="floor_area" value="<?php echo $v2["floor_area"]; ?>" class="gui-input" placeholder="Floor area">
<b class="tooltip tip-right-top" id="floor_area_error"><em>Enter Floor area in Meter Square</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Land area ( Meter Sq. )  :</h6>
<label class="field prepend-icon">
<input type="text" name="land_area"  id="land_area" value="<?php echo $v2["land_area"]; ?>" class="gui-input" placeholder="Land area">
<b class="tooltip tip-right-top" id="land_area_error"><em>Enter Land area in Meter Square</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<h6 style="color: brown;">Open Home</h6>
</div>
</div>
<?php
	$value=explode("-",trim($v2["open_home_date"]));
	$value=$value[1].'/'.$value[2].'/'.$value[0];
?>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="text" id="datepicker2"  name="open_home_date"  value="<?php echo $value; ?>" class="gui-input" placeholder="Datepicker Addon">
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> Start Time :</h6>
<label for="timepicker2" class="field prepend-picker-icon">
<input type="text" id="timepicker2" name="open_home_strt_time"  value="<?php echo $v2["open_home_strt_time"]; ?>" class="gui-input" placeholder="Timepicker Addon">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> End Time :</h6>
<label for="timepicker2" class="field prepend-picker-icon">
<input type="text" id="timepicker3" name="open_home_end_time"  value="<?php echo $v2["open_home_end_time"]; ?>" class="gui-input" placeholder="Timepicker Addon">
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Property Details</h6>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<textarea class="gui-textarea" id="prop_desc" name="prop_desc" placeholder="Property Details"><?php echo $v2["prop_desc"]; ?></textarea>
<b class="tooltip tip-right-top" id="prop_desc_error"><em>Write Something About Property</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Parking or garaging :</h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="parking" name="parking" placeholder="Parking or garaging "><?php echo $v2["parking"]; ?></textarea>
<b class="tooltip tip-right-top" id="prop_desc_error"><em>Parking garaging</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Amenities in the area :</h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="amenities" name="amenities" placeholder="Amenities in the area"><?php echo $v2["amenities"]; ?></textarea>
<b class="tooltip tip-right-top" id="amenities_error"><em>Amenities in the area</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Smoke alarm :</h6>
<label class="field select">
<select name="smoke_alarm" id="smoke_alarm" >
<option value="0" <?php if(trim($v2["smoke_alarm"])=="0") echo 'selected'; ?> >Don't Know</option>
<option value="1" <?php if(trim($v2["smoke_alarm"])=="1") echo 'selected'; ?> >No</option>
<option value="2" <?php if(trim($v2["smoke_alarm"])=="2") echo 'selected'; ?> >Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Agency Reference :</h6>
<label class="field prepend-icon">
<input type="text" name="agency_reference"  id="agency_reference" value="<?php echo $v2["agency_reference"]; ?>" class="gui-input" placeholder="Agency Reference">
<b class="tooltip tip-right-top" id="agency_reference_error"><em>Enter Reference name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Contact Details</h6>
</div>
</div>
<?php
$select="contact_type,realestate_agent,name,agency,mobile,landline";
$from="add_property_contact_dtls";
$condition=array("ap_id"=>trim($v2["ap_id"]));
$contact_detls=getDetails(doSelect1($select,$from,$condition));
foreach($contact_detls as $k=>$v){
?>
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');">
<option value="1" <?php if(trim($v["contact_type"])=="1") echo 'selected'; ?> >Potential buyers should contact me</option>
<option value="2" <?php if(trim($v["contact_type"])=="2") echo 'selected'; ?> >Potential buyers should contact my real estate agent</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_contact_field">
<?php
if(trim($v["contact_type"])=="1"){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Are you a licensed real estate agent? :</h6>
<label class="field select">
<select name="realestate_agent" id="realestate_agent"  >
<option value="0" <?php if(trim($v["realestate_agent"])=="0") echo 'selected'; ?> >No</option>
<option value="1" <?php if(trim($v["realestate_agent"])=="1") echo 'selected'; ?> >Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Your name :</h6>
<label class="field prepend-icon">
<input type="text" name="name"  id="name" value="<?php echo $v["name"]; ?>" class="gui-input" placeholder="name">
<b class="tooltip tip-right-top" id="name_error"><em>Enter name</em></b>
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
<h6 style="color: #999;">Agency :</h6>
<label class="field prepend-icon">
<input type="text" name="agency"  id="agency" value="<?php echo $v["agency"]; ?>" class="gui-input" placeholder="Agency">
<b class="tooltip tip-right-top" id="agency_error"><em>Agency</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Mobile Ph. :</h6>
<label class="field prepend-icon">
<input type="text" name="mobile"  id="mobile"  id="agency" value="<?php echo $v["mobile"]; ?>" class="gui-input" placeholder="Mobile No.">
<b class="tooltip tip-right-top" id="mobile_error"><em>Mobile No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Landline No. :</h6>
<label class="field prepend-icon">
<input type="text" name="landline"  id="landline"  id="agency" value="<?php echo $v["landline"]; ?>" class="gui-input" placeholder="Landline No.">
<b class="tooltip tip-right-top" id="landline_error"><em>Landline No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
}
if(trim($v["contact_type"])=="2"){
?>
<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;">Your name :</h6>
<label class="field prepend-icon">
<input type="text" name="name"  id="name"  id="agency" value="<?php echo $v["name"]; ?>" class="gui-input" placeholder="name">
<b class="tooltip tip-right-top" id="name_error"><em>Enter name</em></b>
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
<h6 style="color: #999;">Agency :</h6>
<label class="field prepend-icon">
<input type="text" name="agency"  id="agency"  id="agency" value="<?php echo $v["agency"]; ?>" class="gui-input" placeholder="Agency">
<b class="tooltip tip-right-top" id="agency_error"><em>Agency</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Mobile Ph. :</h6>
<label class="field prepend-icon">
<input type="text" name="mobile"  id="mobile"  id="agency" value="<?php echo $v["mobile"]; ?>" class="gui-input" placeholder="Mobile No.">
<b class="tooltip tip-right-top" id="mobile_error"><em>Mobile No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Landline No. :</h6>
<label class="field prepend-icon">
<input type="text" name="landline"  id="landline"  id="agency" value="<?php echo $v["landline"]; ?>" class="gui-input" placeholder="Landline No.">
<b class="tooltip tip-right-top" id="landline_error"><em>Landline No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
}
?>

</div>
<?php
}
?>


<input type="hidden" name="next_form" value="photo_upload" />
<input type="hidden" name="db_name" value="add_property" />

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>




</div><!-- END AJAX DIV  -->
</div>
</div> 

</div>
</div>
</div>
</div>
</div>
</section>
<?php
}
?>

<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery.spectrum.min.js"></script>
<script src="assets/allcp/forms/js/jquery.stepper.min.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/forms-widgets.js"></script>