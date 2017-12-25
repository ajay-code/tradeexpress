<?php
session_start();
require_once("function.php");
$k='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function fetch_subcat(id,id1){
		var gic_id=$("#"+id1).val();
		//alert(gic_id);
		if(gic_id.trim() !='0'){
		$.ajax({
			url:'fetch_subcat.php?gic_id='+gic_id,
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

$(document).ready(function() {
$("#add_general_item").on('submit',(function(e){  
	$.ajax({
        	url: "add_general_item_multiple_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			alert(data);
			/* if(data==1){
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			} */
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
<div class="panel-title">Add General Items
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_general_item" enctype="multipart/form-data">
<div id="cat_field" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" >
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
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_sub_cat5" name="sub_sub_sub_cat_id" name="gic_id" >
<option value="0">Select Sub Sub Sub-Category</option>
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
<h6 style="color: #999;">Subtitle :</h6>
<label class="field select">
<select id="subtitle"  onchange="enable_field('subtitle1','subtitle');"  >
<option value="0" selected >No Subtitle</option>
<option value="2">Add Subtitle</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6" id="subtitle_custom">
<div class="section">
<h6 style="color: #999;">Sub-Title :</h6>
<label class="field prepend-icon">
<input type="text" name="subtitle" disabled id="subtitle1" class="gui-input" placeholder="Sub Title">
<b class="tooltip tip-right-top" id="subtitle1_error"><em>Enter Sub Title</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Brand New Item(Items) :</h6>
<label class="field select">
<select id="brand_item" name="brand_item"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  >
<option value="0">Select</option>
<option value="1">Item Used</option>
<option value="2">Unused</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Pricing & Duration</h6>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Start Price :</h6>
<label class="field prepend-icon">
<input type="text" name="start_price" id="start_price" class="gui-input" placeholder="Start Price">
<b class="tooltip tip-right-top" id="start_price_error"><em>Enter Start Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Reserve price :</h6>

<label for="iphone5" class="">
<input type="radio" name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');" checked id="reserve_price1" value="1">
Same as the start price  &nbsp
</label><br/>
<label for="iphone5" class="">
<input type="radio" name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');"  id="reserve_price2" value="0">
Specify a reserve
</label>
</div>
</div>
<div class="col-md-4" id="custom_reserve">
<div class="section">
<h6 style="color: #999;">Reserve Price :</h6>
<label class="field prepend-icon">
<input type="text" name="custom_reserve_price" disabled id="custom_reserve_price" class="gui-input" placeholder="Reserve Price">
<b class="tooltip tip-right-top" id="custom_reserve_price_error"><em>Enter Reserve Price</em></b>
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
<h6 style="color: #999;">Buy Now :</h6>
<label class="field prepend-icon">
<input type="text" name="buy_now" id="buy_now" class="gui-input" placeholder="Buy Now">
<b class="tooltip tip-right-top" id="buy_now_error"><em>Buy Now</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Allow Bid From :</h6>

<label class="option block option-primary">
<input type="checkbox" name="allow_bid[]" value="1">
<span class="checkbox"></span> <font color="blue">Authenticated </font>  members only
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Listing Duration :</h6>
<br/>
<label for="iphone5" class="">
<input type="radio" name="listing_duration" onclick="enable_length_field('listing_length','datepicker2')" checked id="listing_duration1" value="0">
Fixed Length  &nbsp
</label>
<label for="iphone5" class="">
<input type="radio" name="listing_duration"  onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration2" value="1">
Choose End Time
</label>
</div>
</div>
<div class="col-md-4" id="listing_length_custom" >
<div class="section">
<h6 style="color: #999;">Select Length :</h6>
<label class="field select">
<select id="listing_length" name="listing_length"  >
<option value="0">Select</option>
<option value="5">5 Days</option>
<option value="9">9 Days</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-4" id="listing_length_custom">
<div class="section">
<h6 style="color: #999;">Select Length :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="text" id="datepicker2" disabled name="listing_length" class="gui-input" placeholder="Datepicker Addon">
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Payment & Shipping</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Pick Ups :</h6>
<label class="field select">
<select id="pick_ups"  >
<option value="0">Select</option>
<option value="1">No Pick Up</option>
<option value="2">Buyer Must Pick Up</option>
<option value="3">Buyer Can Pick Up</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Shipping :</h6>
<label class="field select">
<select id="shipping_cost"  >
<option value="0">Select</option>
<option value="free">Free Shipping Within NZ</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: #999;">Accept Payment Method</h6>
</div>
</div>
<div class="row">
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" value="credit_card">
<span class="checkbox"></span> Credit card
</label>
</div>
</div>
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" value="debit_card">
<span class="checkbox"></span> Debit Card
</label>
</div>
</div>
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" value="cash">
<span class="checkbox"></span> Cash
</label>
</div>
</div>
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" value="safe_trader">
<span class="checkbox"></span> Safe Tarder
</label>
</div>
</div>
</div>
<br/>
<br/>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Item Details</h6>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<textarea class="gui-textarea" id="item_desc" name="item_desc" placeholder="Item Description"></textarea>
<b class="tooltip tip-right-top" id="item_desc_error"><em>Write Something About Item</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>


</div>


<div id="ajax_form4" style="display:none;">
</div>

<div id="ajax_form41" style="display:none;">
</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>

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
