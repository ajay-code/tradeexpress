<?php
session_start();
require_once("function.php");
$l='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
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
function fetch_suburb(){		
	var region=$("#region").val();		
	$.ajax({			
		url:'fetch_city.php?region='+region,			
		type:'post',			
		dataType:'text',			
		cache:false,			
		contentType:false,			
		processData:false,			
		success:function(response){				
			$("#suburb").html(response);			
		}		
	});	
}

$(document).ready(function() {
$("#add_property").on('submit',(function(e){  
	$.ajax({
        	url: "add_property_photo.php",
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
				alert("Property Added Successfully");
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
<div class="panel-title">Add Property
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_property" enctype="multipart/form-data">
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
<option value="<?php echo $v["pc_id"]; ?>" >
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
	<h6 style="color: #999;">Listing Duration :</h6>
	<label class="field select">		
		<select id="datepicker6" name="listing_duration">			
			<option value="0">-- Select Listing --</option>			
			<option value="21">21</option>			
			<option value="28">28</option>			
			<option value="35">35</option>			
			<option value="42">42</option>			
			<option value="60">60</option>		
		</select>
		<i class="arrow"></i>	
	</label>
<!--label for="datepicker6" class="field prepend-picker-icon">
<input type="text" id="datepicker6"  name="listing_duration" class="gui-input" placeholder="Listing Duration">
</label>
<b class="tooltip tip-right-top" id="listing_duration_error"><em>Enter Listing Duration</em></b>
</label-->
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
<input type="text" name="street" id="street" class="gui-input" placeholder="Street">
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
<input type="text" name="unit_flat" id="unit_flat" class="gui-input" placeholder="Unit">
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
<input type="text" name="street_name" id="street_name" class="gui-input" placeholder="Street Name">
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

<div class="row">
	<div class="col-md-3">
		<div class="section">
			<h6 style="color: #999;">Country :</h6>
			<label class="field select">
				<select name="country" id="country" onchange="fetch_city();" >
					<option value="0" >Select Country </option>
					<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
					?>
						<option value="<?php echo $v["cn_id"]; ?>" >
							<?php echo $v["cn_name"];  ?>
						</option>
					<?php } ?>
				</select>
				<i class="arrow"></i>
			</label>
		</div>
	</div>
	<div class="col-md-3">
		<div class="section">
			<h6 style="color: #999;">Region :</h6>
			<label class="field select">
				<select name="city" id="city_update" onchange="fetch_region();" >
					<option value="0">Select Region</option>
				</select>
				<i class="arrow"></i>
			</label>
		</div>
	</div>
	<div class="col-md-3">
		<div class="section">
			<h6 style="color: #999;">City :</h6>
			<label class="field select">
				<select id="region" name="region" onchange="fetch_suburb();">
					<option value="0">Select City</option>
				</select>
				
				<i class="arrow"></i>
			</label>
		</div>
	</div>
	<div class="col-md-3">		
		<div class="section">			
			<h6 style="color: #999;">Suburb :</h6>			
			<label class="field select">				
				<select id="suburb" name="suburb" >					
					<option value="0">Select Suburb</option>				
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
<input type="text" name="rateable_value" id="rateable_value" class="gui-input" placeholder="Rateable Value">
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
<option value="0">No</option>
<option value="1">Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-4" id="custom_reserve">
<div class="section">
<h6 style="color: #999;">Expected Sale Price :</h6>
<label class="field select">		
	<?php 
		$salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
	
	?>		
	<select id="expected_sale_price" name="expected_sale_price">			
		<option value="0">-- Select Sale Price --</option>			
			<?php foreach($salesPrices as $salesPricesVals){ 
				$priceVals=  str_replace("$","",$salesPricesVals);
				$priceVals=  str_replace(",","",$priceVals);
				
			?>				
				<option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>			
			<?php } ?>								
		</select>		
		<i class="arrow"></i>	
	</label>	
<!--label class="field prepend-icon">
<input type="text" name="expected_sale_price"  id="expected_sale_price" class="gui-input" placeholder="Sale Price">
<b class="tooltip tip-right-top" id="expected_sale_price_error"><em>Enter Expected Sale Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label-->
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price :</h6>
<label class="field select">
<select  id="price" name="price" onchange="enable_price_field('price');" >
<option value="1">Asking price</option>
<option value="2">Enquiries over</option>
<option value="3">To be auctioned on</option>
<option value="4">Tenders closing on</option>
<option value="5">Price by negotiation</option>
<option value="6">Deadline Private Treaty by</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div id="ajax_price_field">
<div class="col-md-6" id="1" style="">
<div class="section">
<h6 style="color: #999;">Asking price :</h6>
<label class="field prepend-icon">
<input type="hidden" name="price1[]" class="gui-input" value="Asking price" />
<!-- <input type="hidden" name="price1[]" class="gui-input" value="asking_price" /> -->

<input type="text" name="price1[]"  id="asking_price" class="gui-input" placeholder="Asking Price">
<b class="tooltip tip-right-top" id="asking_price_error"><em>Asking Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Features</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Bedrooms :</h6>
<label class="field select">				
	<select id="bedroom" name="bedroom">					
		<option value="0">-- Select Bedroom --</option>					
		<option value="1">1</option>					
		<option value="2">2</option>					
		<option value="3">3</option>					
		<option value="4">4</option>					
		<option value="5">5</option>					
		<option value="6+">6+</option>				
	</select>				
	<i class="arrow"></i>			
</label>
<!--label class="field prepend-icon">
<input type="text" name="bedroom"  id="bedroom" class="gui-input" placeholder="Bedrooms">
<b class="tooltip tip-right-top" id="bedroom_error"><em>Enter No. of bedrooms</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label-->
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Bathrooms :</h6>
<label class="field select">				
	<select id="bathroom" name="bathroom">					
		<option value="0">-- Select bathroom --</option>					
		<option value="1">1</option>					
		<option value="2">2</option>					
		<option value="3">3</option>					
		<option value="4">4</option>					
		<option value="5">5</option>					
		<option value="6+">6+</option>				
	</select>				
	<i class="arrow"></i>			
</label>
<!--label class="field prepend-icon">
<input type="text" name="bathroom"  id="bathroom" class="gui-input" placeholder="Bathrooms">
<b class="tooltip tip-right-top" id="bathroom_error"><em>Enter no. of bathrooms</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label-->
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Floor area ( Meter Sq.) :</h6>
<label class="field prepend-icon">
<input type="text" name="floor_area"  id="floor_area" class="gui-input" placeholder="Floor area">
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
<input type="text" name="land_area"  id="land_area" class="gui-input" placeholder="Land area">
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

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="text" id="datepicker2"  name="open_home_date" class="gui-input" placeholder="Datepicker Addon">
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> Start Time :</h6>
<label for="timepicker2" class="field prepend-picker-icon">
<input type="text" id="timepicker2" name="open_home_strt_time" class="gui-input" placeholder="Timepicker Addon">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;"> End Time :</h6>
<label for="timepicker2" class="field prepend-picker-icon">
<input type="text" id="timepicker3" name="open_home_end_time" class="gui-input" placeholder="Timepicker Addon">
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
<textarea class="gui-textarea" id="prop_desc" name="prop_desc" placeholder="Property Details"></textarea>
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
<textarea class="gui-textarea" id="parking" name="parking" placeholder="Parking or garaging "></textarea>
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
<textarea class="gui-textarea" id="amenities" name="amenities" placeholder="Amenities in the area"></textarea>
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
<option value="0">Don't Know</option>
<option value="1">No</option>
<option value="2">Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Agency Reference :</h6>
<label class="field prepend-icon">
<input type="text" name="agency_reference"  id="agency_reference" class="gui-input" placeholder="Agency Reference">
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

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');">
<option value="1">Potential buyers should contact me</option>
<option value="2">Potential buyers should contact my real estate agent</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_contact_field">
<div class="row">
<div class="col-md-4">
	<div class="section">
	<h6 style="color: #999;">Are you a licensed real estate agent? :</h6>
	<label class="field select">
	<select name="realestate_agent" id="realestate_agent"  >
	<option value="0">No</option>
	<option value="1">Yes</option>
	</select>
	<i class="arrow"></i>
	</label>
	</div>
</div>
<div class="col-md-4">
	<div class="section">
	<h6 style="color: #999;">Email Address :</h6>
	<label class="field prepend-icon">
	<input type="email" name="agent_email"  id="agent_email" class="gui-input" placeholder="email">
	<b class="tooltip tip-right-top" id="agent_email_error"><em>Enter Email</em></b>
	<label for="tooltip1" class="field-icon">
	<i class="fa fa-sign-out"></i>
	</label>
	</label>
	</div>
</div>
<div class="col-md-4">
	<div class="section">
	<h6 style="color: #999;">Your Name :</h6>
	<label class="field prepend-icon">
	<input type="text" name="name"  id="name" class="gui-input" placeholder="name">
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
<input type="text" name="agency"  id="agency" class="gui-input" placeholder="Agency">
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
<input type="text" name="mobile"  id="mobile" class="gui-input" placeholder="Mobile No.">
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
<input type="text" name="landline"  id="landline" class="gui-input" placeholder="Landline No.">
<b class="tooltip tip-right-top" id="landline_error"><em>Landline No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="section">
			<h6 style="color: #999;">Website Address :</h6>
			<label class="field prepend-icon">
				<input type="text" name="website_link"  id="website_link" class="gui-input" placeholder="Website Address.">
				<b class="tooltip tip-right-top" id="website_error"><em>Website Address.</em></b>
				<label for="tooltip1" class="field-icon">
					<i class="fa fa-sign-out"></i>
				</label>
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="section">
			<h6 style="color: #999;">Logo:</h6>
			<label class="field prepend-icon">
				<input type="file" name="logo"  id="comp-logo">
				<b class="tooltip tip-right-top" id="name_error2"><em>Logo</em></b>	
			</label>
		</div>
	</div>
</div>
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
