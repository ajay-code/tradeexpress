<?php
session_start();
require_once("function.php");
$_SESSION["updated_id"]=trim($_POST["ap_id"]);
?>
<script type="text/javascript">

/*

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

*/




function fetch_city(){
		var cn_id=$("#country").val();
		$("#region").html('<option value="0">--Select City--</option>');
		$("#suburb").html('<option value="0">--Select Suburb --</option>');
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
		$("#suburb").html('<option value="0">--Select Suburb --</option>');
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
function fetch_suburb(){
	var region=$("#region").val();
	$.ajax({
		url:'fetch_city.php?region='+region,
		type:'post',
		dataType:'text',
		cache:false,
		contentType:false,
		processData:false,
		success:function(response){//alert(response);
			$("#suburb").html(response);
		}
	});}	
	
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

$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
	$.ajax({
        	url: "update_property_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			alert(data);
			var data=data.split("||");
			if(data[1].trim()==1){
				$("#ajax_form").html(data[0]);
				$("#ajax_fetch_form").show(1200);
			}else if(data[1].trim()=='finish'){
				alert("Property Updated Successfully");
				window.location="profile_details.php";
			}else if(data[1].trim()=='606'){
				required_alert('You have added some features....but item can not be update due to load balance. SORRY...','top-right','error');
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
 	   
$j( "#cat4" ).change(function() {
   PropertyID = $j(this).val();
   /*console.log("PropertyID -> "+PropertyID);*/
   if( PropertyID != "" ){
	   PropertyID = parseInt(PropertyID);
	   ManagePropertyField( PropertyID );
   } 	   
});
$j( "#sub_cat4" ).change(function() {
   PropertyID = $j(this).val();
    if( PropertyID != "" ){
	   PropertyID = parseInt(PropertyID);
	   console.log(PropertyID);
	   ManagePropertyLeaseField( PropertyID );
    } 	   
});
function ManagePropertyField( PropertyID ){
  	if( PropertyID == '2' ){
		$j("#bedroom_container").hide(); 
 		$j("#bathroom_container").hide();
		$j("#open_home_date_container").hide();
		$j("#open_home_start_time_container").hide();
		$j("#open_home_end_time_container").hide();
		$j(".openhomecontainer").hide();
	}else if( PropertyID == '3' ){
		$j("#bedroom_container").hide(); 
 		$j("#bathroom_container").hide();
		$j("#open_home_date_container").hide();
		$j("#open_home_start_time_container").hide();
		$j("#open_home_end_time_container").hide();
		$j(".openhomecontainer").hide();
	}else if( PropertyID == '20' ){
		$j("#bedroom_container").hide(); 
 		$j("#bathroom_container").hide();
		$j("#open_home_date_container").hide();
		$j("#open_home_start_time_container").hide();
		$j("#open_home_end_time_container").hide();
		$j(".openhomecontainer").hide();
	}else if( PropertyID == '1' ){
		$j("#bedroom_container").show(); 
 		$j("#bathroom_container").show();
		$j("#open_home_date_container").show();
		$j("#open_home_start_time_container").show();
		$j("#open_home_end_time_container").show();
		$j(".openhomecontainer").show();
 	}
	
	$j("#rateable_value_container").show();
		$j("#rateable_value_hide_container").show(); 
		$j("#rexpected_sale_price_container").show(); 
		$j("#pricingAuction1").show();
		 
 		$j("#price option[value='1']").remove();
		$j("#price option[value='2']").remove();
		$j("#price option[value='3']").remove();
		$j("#price option[value='4']").remove();
		$j("#price option[value='5']").remove();
		$j("#price option[value='6']").remove();
		
		$j('#price').append('<option value="1">Asking price</option>');
		$j('#price').append('<option value="2">Enquiries over</option>');
		$j('#price').append('<option value="3">To be auctioned on</option>');
		$j('#price').append('<option value="4">Tenders closing on</option>');
		$j('#price').append('<option value="5">Price by negotiation</option>');
		$j('#price').append('<option value="6">Deadline Private Treaty by</option>');
		/*
		<option value="1">Asking price</option>
		<option value="2">Enquiries over</option>
		<option value="3">To be auctioned on</option>
		<option value="4">Tenders closing on</option>
		<option value="5">Price by negotiation</option>
		<option value="6">Deadline Private Treaty by</option>
		*/
 		$j("#specify_price_container").hide();  
		$j("#duration_type_container").hide();  
		$j("#outgoing_gross_lease_container").hide(); 
	    
}
function ManagePropertyLeaseField( PropertyID ){
	/*
	<option value="1">Asking price</option>
	<option value="2">Enquiries over</option>
	<option value="3">To be auctioned on</option>
	<option value="4">Tenders closing on</option>
	<option value="5">Price by negotiation</option>
	<option value="6">Deadline Private Treaty by</option>
	// hide additional price option 
	*/
 	
	if( PropertyID == '29' ){
		$j("#bedroom_container").hide(); 
 		$j("#bathroom_container").hide();
		$j("#open_home_date_container").hide();
		$j("#open_home_start_time_container").hide();
		$j("#open_home_end_time_container").hide();
		$j(".openhomecontainer").hide();
		
		$j("#rateable_value_container").hide();
		$j("#rateable_value_hide_container").hide(); 
		$j("#rexpected_sale_price_container").hide(); 
		$j("#pricingAuction1").hide();
		
 		$j("#price option[value='2']").remove();
		$j("#price option[value='3']").remove();
		$j("#price option[value='4']").remove();
		$j("#price option[value='6']").remove();
		
		$j("#specify_price_container").show();  
		$j("#duration_type_container").show();  
		$j("#outgoing_gross_lease_container").show(); 
		
	}else{
		$j("#rateable_value_container").show();
		$j("#rateable_value_hide_container").show(); 
		$j("#rexpected_sale_price_container").show(); 
		$j("#pricingAuction1").show();
		 
 		$j("#price option[value='1']").remove();
		$j("#price option[value='2']").remove();
		$j("#price option[value='3']").remove();
		$j("#price option[value='4']").remove();
		$j("#price option[value='5']").remove();
		$j("#price option[value='6']").remove();
		
		$j('#price').append('<option value="1">Asking price</option>');
		$j('#price').append('<option value="2">Enquiries over</option>');
		$j('#price').append('<option value="3">To be auctioned on</option>');
		$j('#price').append('<option value="4">Tenders closing on</option>');
		$j('#price').append('<option value="5">Price by negotiation</option>');
		$j('#price').append('<option value="6">Deadline Private Treaty by</option>');
		/*
		<option value="1">Asking price</option>
		<option value="2">Enquiries over</option>
		<option value="3">To be auctioned on</option>
		<option value="4">Tenders closing on</option>
		<option value="5">Price by negotiation</option>
		<option value="6">Deadline Private Treaty by</option>
		*/
 		$j("#specify_price_container").hide();  
		$j("#duration_type_container").hide();  
		$j("#outgoing_gross_lease_container").hide(); 
 	}
	    
}

</script>

<?php
$select="ap_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,	smoke_alarm,	agency_reference,Posting_status,status,specify_price
duration_type,outgoing_gross_lease,country,region,city,suburb";
$from="add_property";
$condition=array("ap_id"=>trim($_POST["ap_id"]));
$item_detls=getDetails(doSelect1($select,$from,$condition));
$item_detls=trimmer_db_array($item_detls);
foreach($item_detls as $k2=>$v2){
?>
 <section id="content" class="large-9 small-12 columns">

                <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h3 class='page-title entry-title'>Property & Business Edit Form</h3>
                    <section class="entry-content">
                      <!--  <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice.-->
                                    <div class="accordion" id="post-listing">

                                     <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
                            
                            
                            <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                  <li>
                    <div class="col-md-12 col-sm-6">
                      <div class="panel panel-default text-center" style="padding-right: 0px;">
                        <div class="panel-heading">
                          <h3 style="font-size: 19px;color: #05242f;">Listing Fee Under Property & Business Category </h3>
                        </div>
                        <div class="panel-desc">
                          <div class="panel-body">
                            <div class="moreinfo"  style="font-size:0.9em;font-weight:bold"> <?php echo show_price_listingDb('property');  ?> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                            
                            
                            
                                      <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    
                                                
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                      <!--                  <h3>Free</h3>
                                                                    </div>
                                                                 <div class="panel-desc">-->
                                                                        <div class="panel-body">
                                                                            <!--<span class="panel-title price"><label>Price:</label>&nbsp;<span>$0.00</span></span>                                        <span class="days">
                                        		<p class="margin_right panel-type price package_type"><label>Package Type:</label><span>Single Submission</span> </p>
                        <p class="panel-type price package_type">
                            <label>Listing duration:</label>&nbsp;<span>360 days</span> </p>
                        </span>
                        <p><strong>Listings submitted with this package will be featured on: </strong>Homepage ($1.00) Category page ($1.00) -->
                        
                        
                            <!-- package description 
                            <div class="moreinfo">
                                This package allows you to submit a free listing at no cost. </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>
                            
                            </div>
                            <div class="packageblock clearifx ">
                             
                             
                                <ul data-price="100" data-subscribed='0' data-id="16" data-type="2" class="packagelistitems ">
                                    <li>
                                        <div class="col-md-12 col-sm-6">
                                            <div class="panel panel-default text-center">
                                                <div class="panel-heading">
                                                    <h3>Multi Listing Special</h3>
                                                </div>
                                                <div class="panel-desc">
                                                  
                                                 <div class="panel-body">
                                                        <span class="panel-title price"><label>Price:</label>&nbsp;<span>$100.00</span></span>
                                                        <span class="days">
                                        		<p class="panel-type price package_type"><label>Package Type:</label>&nbsp;<span>Subscription</span> </p>
                        <p class="panel-type price package_type">
                            <label>Listing duration:</label>&nbsp;<span>30 days</span> </p>
                        <p class="margin_right panel-type price package_type">
                            <label>Number of listings included in the package:</label>&nbsp;<span>10</span> </p>
                        <p class="margin_right panel-type price package_type">
                            <label>Listings can be submitted within:</label>&nbsp;<span>15 days</span> </p>
                        <p class="">
                            <label>Recurring period:&nbsp;</label><span>1&nbsp;Month</p><p class=""><label>Number of cycles:&nbsp;</label><span>12&nbsp;<p>                                    </span>
                            <!-- package description -->
                          <div class="moreinfo">
                            </div>
                            </div> 
                            
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>    
                            
                            
                            
                            
                            
                            </div>
                            </div>
                            </div>
                            <!-- End #panel1 -->
                            </div>
<form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
<div id="ajax_form">

<div id="step-post" class="accordion-navigation step-wrapper step-post">
<a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Add Classified Form</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
<div id="post" class="step-post content  clearfix">
<div id="submit_form_custom_fields" class="submit_form_custom_fields">
<div id="step-post" class="accordion-navigation step-wrapper step-post">
<a id="first_cat" style="display:none;" class="step-heading active" href="javascript:void(0);"><span>*</span><span>Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div>  
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Category</label>                
					<select  id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select id="sub_sub_cat4" name="sub_sub_cat_id" class="textfield textfield_x " >
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
			</div>
			
			
 			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Listing Title</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
	
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="<?php echo $v2["listing_title"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
<?php
		$data=explode('-',$v2["listing_duration"]);
		$listing_duration=$data[2].'-'.$data[1].'-'.$data["0"];
?>			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <input name="listing_duration" id="datepicker2" value="<?php echo $listing_duration; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
<link rel="stylesheet" href="images/jquery-ui.css">
<script src="images/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>	
  
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>House number and street name</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="<?php echo $v2["street"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="<?php echo $v2["unit_flat"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="<?php echo $v2["street_name"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			<?php
 			$country = $v2["country"];
			$country_id = $country ;
			$region = $v2["region"];
			$city = $v2["city"];
			$city_id = $city;
			$suburb = $v2["suburb"];
			if( $v2["region"] != "" && $v2["region"] > 0 ){
				//$city_id=trim(getCityIdByRegion($v2["region"]));
			}	
			if( $v2["region"] != "" && $v2["region"] > 0 ){
				//$country_id=trim(getCountryIdByCity(getCityIdByRegion($v2["region"])));
			}
 			?>
			<?php /*?><div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Country :</label>                
 					<select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
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
			</div>
 			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>City :</label>                
					<select name="city" id="city_update" onchange="fetch_region();" class="textfield textfield_x " >
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
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Suburb :</label>                
					<select id="region" name="region" class="textfield textfield_x " >
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
			</div><?php */?>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
								$country=getDetails(doSelect("cn_id,cn_name","ambit_country"));
								foreach($country as $countryk=>$countryv){
							?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] ==  $country)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select id="region" name="region" onchange="fetch_region();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <?php $getCity=getDetails(doSelect("ar_id,region,cn_id","ambit_region",array("cn_id"=>$countryId))); 
								foreach($getCity as $getCityKey=>$getCityVals){
							?>
                      <option value="<?php echo $getCityVals["ar_id"]; ?>" <?php echo($getCityVals["ar_id"] == $region ) ? " selected='selected' " : "";?>><?php echo $getCityVals["region"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select  name="city" id="city_update" class="textfield textfield_x " onchange="fetch_suburb();">
                      <option value="0">--Select City--</option>
					  <?php
						$city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$country_id)));
						foreach($city as $k=>$v){
						?>
						<option value="<?php echo $v["ct_id"]; ?>" <?php if(trim($v["ct_id"])==$city_id) echo 'selected';  ?> ><?php echo $v["ct_name"];  ?>
						</option>
						<?php
						}
						?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
					  <?php
						$region=getDetails(doSelect("sub_id,suburb","ambit_suburb"));
						foreach($region as $k=>$v){
						?>
						<option value="<?php echo $v["sub_id"]; ?>" <?php if(trim($v["sub_id"])==trim($suburb)) echo 'selected';  ?> ><?php echo $v["suburb"];  ?></option>
						<?php
						}
						?>
                    </select>
                  </div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  owner_name" id="rateable_value_container">
					<label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="<?php echo $v2["rateable_value"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag " id="rateable_value_hide_container">
				<label class=>Hide Rateble value On Linsting :</label>                
					<select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
						<option value="0" <?php if(trim($v2["rateable_value_hide"])=="0") echo 'selected';  ?> >No</option>
						<option value="1" <?php if(trim($v2["rateable_value_hide"])=="1") echo 'selected';  ?> >Yes</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name" id="rexpected_sale_price_container">
					<label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                    <input name="expected_sale_price"  id="expected_sale_price" value="<?php echo $v2["expected_sale_price"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
<?php
$select="price_type,label_name,value";
$from="add_property_price_dtls";
$condition=array("ap_id"=>trim($v2["ap_id"]));
$price_detls=getDetails(doSelect1($select,$from,$condition));
foreach($price_detls as $k=>$v){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Price :</label>                
					<select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
						<option value="1" <?php if(trim($v["price_type"])=="1") echo 'selected';  ?> >Asking price</option>
						<option value="2" <?php if(trim($v["price_type"])=="2") echo 'selected';  ?> >Enquiries over</option>
						<option value="3" <?php if(trim($v["price_type"])=="3") echo 'selected';  ?> >To be auctioned on</option>
						<option value="4" <?php if(trim($v["price_type"])=="4") echo 'selected';  ?> >Tenders closing on</option>
						<option value="5" <?php if(trim($v["price_type"])=="5") echo 'selected';  ?> >Price by negotiation</option>
						<option value="6" <?php if(trim($v["price_type"])=="6") echo 'selected';  ?> >Deadline Private Treaty by</option>
					</select>
</div>

<div class="form_row clearfix custom_fileds classified_tag " id="specify_price_container" style="display:none;">
<label class=>Specify a price(exclude taxes)</label>
 <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;" value="<?php echo  $v2["specify_price"];?>"/>
</div>
<div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
 <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
  <option value="Per Month"  <?php if($v2["duration_type"] == "Per Month"){ echo " selected='selected' ";}?>>Per Month</option>
  <option value="Per Year"  <?php if($v2["duration_type"] == "Per Year"){ echo " selected='selected' ";}?>>Per Year</option>
 </select>
 
</div>
<div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
 <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes" <?php if($v2["outgoing_gross_lease"] == "yes"){ echo " checked='checked' ";}?>/>Includes Includes outgoings (gross lease)
</div>

<div id="ajax_price_field">
<?php 
if(trim($v["price_type"])=="1"){
?>
<div class="form_row clearfix custom_fileds  owner_name"  id="pricingAuction1" >
					<label class=r_lbl>Asking Price :<span class="required">*</span></label>
                    <input type="hidden" name="price1[]" class="gui-input" value="Asking price" />
					<input name="price1[]"  id="asking_price" value="<?php echo $v["value"]; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<?php
}
if(trim($v["price_type"])=="2"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                    <input type="hidden" name="price2[]" class="gui-input" value="Enquiries over" />
					<input name="price2[]"  id="enquiries_over" value="<?php echo $v["value"]; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<?php
}
if(trim($v["price_type"])=="3"){
$value=explode("-",trim($v["value"]));
$value=$value[2].'-'.$value[1].'-'.$value[0];
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Auction Date :<span class="required">*</span></label>
                    <input type="hidden" name="price3[]" class="gui-input" value="Auction Date" />
					<input id="datepicker3"  name="price3[]" value="<?php echo $value; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<script>
$( function() {
$( "#datepicker3" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>	
<?php
}
if(trim($v["price_type"])=="4"){
$value=explode("-",trim($v["value"]));
$value=$value[2].'-'.$value[1].'-'.$value[0];
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                    <input type="hidden" name="price4[]" class="gui-input" value="Tender Closing Date" />
					<input id="datepicker4"  name="price4[]" value="<?php echo $value; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<script>
$( function() {
$( "#datepicker4" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>
<?php
}
if(trim($v["price_type"])=="5"){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Price By negotiation :</label> 
				<input type="hidden" name="price5[]" class="gui-input" value="Price by negotiation" />
					<select name="price5[]" id="negotiation"  class="textfield textfield_x " >
						<option value="1">Yes</option>
					</select>
</div>
<?php
}
if(trim($v["price_type"])=="6"){
$value=explode("-",trim($v["value"]));
$value=$value[2].'-'.$value[1].'-'.$value[0];
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                   <input type="hidden" name="price6[]" class="gui-input" value="Deadline Private Treaty By" />
				   <input id="datepicker5"  name="price6[]" value="<?php echo $value; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<script>
$( function() {
$( "#datepicker5" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>
<?php
}
?>
</div><!-- AJAX PRICE FIELD -->
<?php
}
?>			
			
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 
			
			
			<div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
					<label class=r_lbl>Bedroom :<span class="required">*</span></label>
                    <?php /*?><input name="bedroom"  id="bedroom" value="<?php echo $v2["bedroom"]; ?>" type="text" class="textfield "  placeholder=" "/><?php */?>
					 <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0"  <?php echo ( $v2["bedroom"] == '0') ?  " selected='selected' " : "" ;?>>--Select Bedroom--</option>
                      <option value="1" <?php echo ( $v2["bedroom"] == '1') ?  " selected='selected' " : "" ;?>>1</option>
                      <option value="2" <?php echo ( $v2["bedroom"] == '2') ?  " selected='selected' " : "" ;?>>2</option>
                      <option value="3" <?php echo ( $v2["bedroom"] == '3') ?  " selected='selected' " : "" ;?>>3</option>
                      <option value="4" <?php echo ( $v2["bedroom"] == '4') ?  " selected='selected' " : "" ;?>>4</option>
                      <option value="5" <?php echo ( $v2["bedroom"] == '5') ?  " selected='selected' " : "" ;?>>5</option>
                      <option value="6+" <?php echo ( $v2["bedroom"] == '6+') ?  " selected='selected' " : "" ;?>>6+</option>
                    </select>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name"   id="bathroom_container">
					<label class=r_lbl>Bathroom :<span class="required">*</span></label>
                   <?php /*?> <input name="bathroom"  id="bathroom" value="<?php echo $v2["bathroom"]; ?>" type="text" class="textfield "  placeholder=" "/><?php */?>
					<select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0" <?php echo ( $v2["bathroom"] == '0') ?  " selected='selected' " : "" ;?>>--Select Bathroom--</option>
                      <option value="1" <?php echo ( $v2["bathroom"] == '1') ?  " selected='selected' " : "" ;?>>1</option>
                      <option value="2" <?php echo ( $v2["bathroom"] == '2') ?  " selected='selected' " : "" ;?>>2</option>
                      <option value="3" <?php echo ( $v2["bathroom"] == '3') ?  " selected='selected' " : "" ;?>>3</option>
                      <option value="4" <?php echo ( $v2["bathroom"] == '4') ?  " selected='selected' " : "" ;?>>4</option>
                      <option value="5" <?php echo ( $v2["bathroom"] == '5') ?  " selected='selected' " : "" ;?>>5</option>
                      <option value="6+" <?php echo ( $v2["bathroom"] == '6+') ?  " selected='selected' " : "" ;?>>6+</option>
                    </select>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="<?php echo $v2["floor_area"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="<?php echo $v2["land_area"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div>  
<?php
$value=explode("-",trim($v2["open_home_date"]));
$value=$value[2].'-'.$value[1].'-'.$value[0];
?>
			<div class="form_row clearfix custom_fileds  owner_name"  id="open_home_date_container">
					<label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker6"  name="open_home_date" value="<?php echo $value; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>	
<script>
$( function() {
$( "#datepicker6" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>			
			<div class="form_row clearfix custom_fileds  owner_name"   id="open_home_start_time_container">
					<label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="<?php echo $v2["open_home_strt_time"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
					<label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="<?php echo $v2["open_home_end_time"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Property Details : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ><?php echo $v2["prop_desc"]; ?></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Parking or garaging : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ><?php echo $v2["parking"]; ?></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Amenities in the area : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ><?php echo $v2["amenities"]; ?></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Smoke alarm :</label>                
					<select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
						<option value="0" <?php if(trim($v2["smoke_alarm"])=="0") echo 'selected'; ?> >Don't Know</option>
						<option value="1" <?php if(trim($v2["smoke_alarm"])=="1") echo 'selected'; ?> >No</option>
						<option value="2" <?php if(trim($v2["smoke_alarm"])=="2") echo 'selected'; ?> >Yes</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="<?php echo $v2["agency_reference"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
<?php
$select="contact_type,realestate_agent,name,agency,mobile,landline";
$from="add_property_contact_dtls";
$condition=array("ap_id"=>trim($v2["ap_id"]));
$contact_detls=getDetails(doSelect1($select,$from,$condition));
foreach($contact_detls as $k=>$v){
?>
		<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Contact Details :</label>                
					<select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');"class="textfield textfield_x " >
					<option value="1" <?php if(trim($v["contact_type"])=="1") echo 'selected'; ?> >Potential buyers should contact me</option>
					<option value="2" <?php if(trim($v["contact_type"])=="2") echo 'selected'; ?> >Potential buyers should contact my real estate agent</option>
					</select>
			</div>
			<div id="ajax_contact_field">
<?php
if(trim($v["contact_type"])=="1"){
?>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Are you a licensed real estate agent? :</label>                
					<select name="realestate_agent" id="realestate_agent"  class="textfield textfield_x " >
						<option value="0" <?php if(trim($v["realestate_agent"])=="0") echo 'selected'; ?> >No</option>
						<option value="1" <?php if(trim($v["realestate_agent"])=="1") echo 'selected'; ?> >Yes</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Your name :<span class="required">*</span></label>
                    <input name="name"  id="name" value="<?php echo $v["name"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Agency :<span class="required">*</span></label>
                    <input name="agency"  id="agency" value="<?php echo $v["agency"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                    <input name="mobile"  id="mobile" value="<?php echo $v["mobile"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Landline No. :<span class="required">*</span></label>
                    <input name="landline"  id="landline" value="<?php echo $v["landline"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
<?php
}
if(trim($v["contact_type"])=="2"){
?>			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Your name :<span class="required">*</span></label>
                    <input name="name"  id="name" value="<?php echo $v["name"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Agency :<span class="required">*</span></label>
                    <input name="agency"  id="agency" value="<?php echo $v["agency"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                    <input name="mobile"  id="mobile" value="<?php echo $v["mobile"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Landline No. :<span class="required">*</span></label>
                    <input name="landline"  id="landline" value="<?php echo $v["landline"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
<?php
}
?>

</div><!-- END AJAX CONTACT FIELD -->
<?php
}
?>
			<input type="hidden" name="next_form" value="photo_upload" />
			<input type="hidden" name="db_name" value="add_property" />
			
			
			<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
			
					   
</div>								                    
</div>												 				
</div>


</div><!-- END AJAX DIV -->
</form>
</p>
</section>
                          <!-- .entry-content -->
					    				</div>
					<!-- .hentry -->
						</div>
	<!-- .hfeed -->
  </section>
<!-- #content -->

</div>
	<!-- .hfeed -->
<?php
}
?>
 <?php
include("include_parts/sidebar_index.php");
?>