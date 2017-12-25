<?php 
session_start(); 
require_once("function.php"); 
include_once("include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
$acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
/* if($acnt_blnce >= get_site_settings('34')){ */
?>
<style type="text/css">
	.span-select{
		width:33.3%;
		border:1px solid #ccc;
		float: left;
		display: inline;
	}
	select{
		border:1px solid rgba(0, 0, 0, 0.2) !important;
	}
	select.custom-size{
		min-height:214px !important;
		border:none !important;
	}
	.ui-timepicker-viewport{width:89% !important;}
	.first-columns{width:25%;font-weight:400;}
	.heading {
		background: #fbcc48;
		color: #fff;
		font-size: 18px;
		font-weight: 700;
	}
	.property-cols{margin-right:5px;}
</style>
<script type="text/javascript">
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
		$("#region").html('<option value="0">--Select Region --</option>');
		$.ajax({
			url:'fetch_city.php?region_ct_id='+city,
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
	});
}
function fetch_subcat(id,id1){
		var pc_id=$("#"+id1).val();
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
	$('.pricingOwner').hide();
	var totalDivs= $('#ajax_price_field .pricingOwner').length;
	//console.log(totalDivs);
	for (i = 1; i <= totalDivs; i++) { 
		$('#pricingAuction'+i +' .PhdnPrice').attr("disabled","disabled");
		$('#pricingAuction'+i +' .Pricedatepicker31').attr("disabled","disabled");
	}
	var divId1= $("#"+id).val();
	$('#pricingAuction'+divId1 +' .PhdnPrice').removeAttr("disabled","disabled");
	$('#pricingAuction'+divId1 +' .Pricedatepicker31').removeAttr("disabled","disabled");
	$('#pricingAuction'+divId1).show();
	
	
	
	
	
	/* $.post(
	"ajax_fetch_add_property_form.php",
	{values:value,msg:'price_field'},
	function(r){
	$("#ajax_price_field").html(r);
	}
	); */
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
function real_state(){
var selected_value=$('#realestate_agent option:selected').val();
         $.ajax({
                    type: "POST",
                    url: "ajax_fetch_add_property_form.php",
                    data: "val=" + selected_value+ "&msg=" + 'realestate_agent',
                    success: function(data) {


                    	$("#ajax_contact_field1").empty();
                      	$("#ajax_contact_field1").html(data);

                    }
                });
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
function propertyPreview(listingId){
	
	$.post(
		"add_property_photo.php?listing_featuredId="+ listingId,
		{next_form:'finish1'},
		function(r){
			$("#ajax_form").html(r);
			$("#ajax_fetch_form").show(1200);
		}
	);
}
$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
	$.ajax({
        	url: "add_property_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
		    	console.log(data);
 				var data=data.split("||");
				if(data[1].trim()==1){ 
					$("#ajax_form").html(data[0]);
					$("#ajax_fetch_form").show(1200);
				}else if(data[1].trim()== 2){
					propertyPreview(data[2].trim());
				}else if(data[1].trim()=='finish'){
					alert("Property Added Successfully");
					window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
				}else if(data[1].trim()=='balance'){
					alert('You have not a suficient balace to add this property.');
					window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
				}else if(data[1].trim()=='606'){
 					required_alert('Low Balance...Please add balnce to your account','top-right','error');
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
<script type="text/javascript">
	$(document).ready(function() {
	    $("#sub_cat4").change(function(){
	        var session_id = "<?php echo $_SESSION[ 'ar_id'] ?>";
	        var p = $(this).val();
	        if(p==22 || p==21 || p==29 || p==28){
	         var data = 'option_value='+ p + '&session_id='+ session_id ;
	        $.ajax({
        	url: "fetch_property_subcat.php",
			type: "POST",
			data:  data,
			success: function(mydata)
		    {

  
		   
		       //alert(data);
 			$("#fields_for_rent").html(mydata);
		    }
	        
	});
	        }   
 	});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	    $("#cat4").change(function(){
	        
	        var session_id = "<?php echo $_SESSION[ 'ar_id'] ?>";
	        var categoryFirst = $(this).val();
	        if(categoryFirst==2 || categoryFirst==3 || categoryFirst==20 || categoryFirst== 54){
	         var catdata = 'category_value='+ categoryFirst + '&session_id='+ session_id ;
	        $.ajax({
        	url: "fetch_property_subcat.php",
			type: "POST",	
			data:  catdata,
			success: function(catdata)
		    {

   
	        //$('.dp1').datepicker();
	        
 			$("#fields_for_rent").html(catdata);
 			


		    },
	        
	});
	        }   
 	});
	});
</script>

<script type="text/javascript">
function real_state_for_rent(){
    //alert("Hello");
    var realStateId = $('#realestate_agent option:selected').attr('id');
    //alert(realStateId);
    var data = 'realStateId='+ realStateId;
    $.ajax({
       url: "fetch_property_subcat.php",
       type: "POST",
       data: data,
       success: function(FieldsForRent){
      
	
           	$("#ajax_contact_field_for_rent").html(FieldsForRent);
       },
    });
      
}
function agent_checkbox(){
    if(!$('#checkBoxagent').is(':checked')){
               $.ajax({
               url: "fetch_property_subcat.php",
               type: "POST",
               data: 'checkboxIsNotChecked=' + "checkboxIsNotChecked",
               success: function(FieldsForNotChecked){
               	$j("#datepicker2").datepicker();
	$j(".Pricedatepicker3").datepicker();
	$j('#timepicker2').timepicker({ 'scrollDefault': 'now' }); 
	$j('#timepicker3').timepicker({ 'scrollDefault': 'now' }); 
                   	$(".other_agent_field").html(FieldsForNotChecked);
               },
            });
}else{
      var checkBoxagent = $('#checkBoxagent').attr("id");
               var data = 'checkBoxagent=' + checkBoxagent;
               $.ajax({
               url: "fetch_property_subcat.php",
               type: "POST",
               data: data,
               success: function(FieldsForCheckbox){


	
                   	$(".other_agent_field").html(FieldsForCheckbox);
               },
            });
}
}
</script>
<style>
 .agent_details > label {
      font-weight: 600;
      left: 20px;
      position: relative;
      top: -9px;
}
	.select-file-div{
		border: 1px solid rgb(0, 0, 0);
		width: 139px;
		padding: 3px;
		background-color: rgb(255, 255, 255);
		text-align: center;
		border-radius: 6px;
		font-weight: 900;
		position: relative;
		top: 33px;
	}
	#selectphoto{
		right: 232px;
		position: relative;
		width: 654px;
	}
</style>
<section id="main" class="clearfix">
<div class="wrap row">
  <div class="breadcrumb breadcrumbs columns">
    <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span><span class="trail-begin"><a href="post_item.php">Submit Classified</a></span> <span class="sep">&raquo;</span> <span class="trail-end">Property</span> </div>
  </div>
  <section id="content" class="large-9 small-12 columns">
  <div class="hfeed">
    <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
      <h1 class='page-title entry-title'>Submit Classified (Property)</h1>
      <section class="entry-content">
      <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
      <p>Submit your listing in the category of your choice.
      <div class="accordion" id="post-listing">
        <div id="step-plan" class="accordion-navigation step-wrapper step-plan current"> <a class="step-heading active" style="color:red;" href="javascript:void(0);"><span>*</span><span>
          <h3 style="color:red;">First three month free</h3>
          </span><span></span></a> <br>
          <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
          <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
              <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                  <li>
                    <div class="col-md-12 col-sm-6">
                      <div class="panel panel-default text-center" style="padding-right: 0px;">
                        <div class="panel-heading">
                          <h3 style="font-size: 19px;color: #E6A01B;">For Listing</h3>
                        </div>
                        <div class="panel-desc">
                          <div class="panel-body">
                            <div class="moreinfo"  style="font-size:0.9em;"> <?php echo show_price_listingDb('property');  ?> </div>
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
            <div id="step-post" class="accordion-navigation step-wrapper step-post"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Add Classified Form</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
              <div id="post" class="step-post content  clearfix" style="background-color: wheat;">
                <div id="submit_form_custom_fields" class="submit_form_custom_fields"> <a id="first_cat" style="display:none;" class="step-heading active" href="javascript:void(0);"><span>$30</span><span>For Second Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Listing Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <div class="span-select">
                      <select size="7" id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x custom-size" >
                        <?php
							$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
							foreach($category as $k=>$v){
							?>
                        <option value="<?php echo $v["pc_id"]; ?>" > <?php echo $v["category"];  ?> </option>
                        <?php
							}
							?>
                      </select>
                    </div>
                    <div class="span-select">
                      <select size="7" id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x custom-size" >
                      </select>
                    </div>
                    <div class="span-select">
                      <select size="7" id="sub_sub_cat4" name="sub_sub_cat_id" class="textfield textfield_x custom-size" >
                      </select>
                    </div>
                  </div>
               <div id="fields_for_rent">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
                    <!--<label class=r_lbl>Listing Dropdown :<span class="required">*</span></label>
                    <select name="listing_title" id="listing_title" value=""  class="textfield" >
                        <option value="0" >--Select Listing--</option>
                    	<option value="Rent per Week">Rent per Week</option>
                        <option value="Rent per Month">Rent per Month</option>
                    </select>-->
                    
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <!--input name="listing_duration" id="datepicker2" readonly value="" type="text" class="textfield "  placeholder="/-->
                    <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                      <option value="0" >--Select Listing--</option>
                      <option value="4" >4 Days</option>
                      <option value="5" >5 Days</option>
                      <option value="6" >6 Days</option>
                      <option value="7" >7 Days</option>
                      <option value="10" >10 Days</option>
                      <option value="14" >14 Days</option>
                    </select>
                  </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $_SESSION["ar_id"];
				$countryId= 0;
				$getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
				if(count($getCountries) > 0){
					foreach($getCountries as $getCountriesKey=>$getCountriesVals){
						$countryId= $getCountriesVals['country'];
					}
					if(!empty($countryId)){
						
			?>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
								$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
								//var_dump($country);

								foreach($country as $countryk=>$countryv){
							?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
								foreach($getCity as $getCityKey=>$getCityVals){
							?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
								foreach($getCity as $getCityKey=>$getCityVals){
							?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>
                  <?php } } ?>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current pricing_feild_on_rent" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
				  
				  
				   
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rateable_value_container">
                    <label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent " id="rateable_value_hide_container ">
                    <label class=>Hide Rateble value On Listing :</label>
                    <select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rexpected_sale_price_container">
                    <label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                <!--    <input name="expected_sale_price"  id="expected_sale_price" value="" type="text" class="textfield "  placeholder=" "/> -->
                   <?php 
						$salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
					
					?> 
                     <select name="expected_sale_price" id="expected_sale_price" class="textfield textfield_x " >
                      <option value="0">--Select Sale Rate--</option>
                      <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
							
						?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  
				  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent ">
                    <label class=>Price :</label>
                    <select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
                      <option value="1">Asking price</option>
                      <option value="2">Enquiries over</option>
                      <option value="3">To be auctioned on</option>
                      <option value="4">Tenders closing on</option>
                      <option value="5">Price by negotiation</option>
                      <option value="6">Deadline Private Treaty by</option>
                    </select>
                  </div>
				   
				  <div class="form_row clearfix custom_fileds classified_tag " style="display:none;" id="specify_price_container">
                    <label class=>Specify a price(exclude taxes)</label>
                     <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;"/>
                  </div>
				  <div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
                     <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
                      <option value="Per Month">Per Month</option>
                      <option value="Per Year">Per Year</option>
                     </select>
                  </div>
				  <div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
                     <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes"/>Includes Includes outgoings (gross lease)
                  </div>
				  <div class="form_row clearfix custom_fileds owner_name pricingOwner" style="display:none;"  id="pricingAuction3" >
                      <label class=r_lbl>Auction Date :<span class="required">*</span></label>
                      <input type="hidden" name="price3[]" id="Pdatepicker3" class="gui-input PhdnPrice" value="Auction Date" disabled="disabled" />
                      <input name="price3[]" id="datepicker3" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                   <div class="form_row clearfix custom_fileds owner_name pricingOwner" style="display:none;" id="pricingAuction4">
                      <label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker4" name="price4[]" class="gui-input PhdnPrice" value="Tender Closing Date" disabled="disabled"/>
                      <input id="datepicker41"  name="price4[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" />
                    </div>
 <div class="form_row clearfix custom_fileds owner_name pricingOwner" style="display:none;" id="pricingAuction6">
                      <label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                      <input type="hidden" name="price6[]" id="Pdatepicker6" class="gui-input PhdnPrice" value="Deadline Private Treaty By" disabled="disabled"/>
                      <input id="datepicker6"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" />
                    </div>

                  <div id="ajax_price_field" class="pricing_feild_on_rent">
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction1" style="display:block;">
                      <label  class=r_lbl>Asking Price :<span class="required">*</span></label>
                      <input type="hidden" name="price1[]" id="Pdatepicker1" class="gui-input PhdnPrice" value="Asking price" />
                      <input name="price1[]"  id="datepicker1" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction2" style="display:none;">
                      <label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                      <input type="hidden" name="price2[]" id="Pdatepicker2" class="gui-input PhdnPrice" value="Enquiries over" disabled="disabled"/>
                      <input name="price2[]" id="datepicker21" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    
                   
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" style="display:none;" id="pricingAuction5">
                      <label class=r_lbl>Price By Negotiation :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker5" name="price5[]" class="gui-input PhdnPrice" value="Yes" disabled="disabled"/>
                      <input id="datepicker5"  name="price5[]" value="Yes" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" readonly="readonly" disabled="disabled"/>
                    </div>
                   
                  </div>
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
<!-- floor area and rent area for rental condition  -->

                 <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                <div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>  
                  <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container"> 
                    <label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker2"  name="open_home_date" value="" type="text" class="textfield "  placeholder="" style="max-width:370px !important;"/>
                  </div> 
               <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_start_time_container">
                    <label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="" type="text" class="textfield "  placeholder=" "/>
                  </div> 
                 <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
                    <label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 

                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                   <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                    <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                      <label class=>Are you a licensed real estate agent? :</label>
                      <select name="realestate_agent" id="realestate_agent" onchange="real_state();" class="textfield textfield_x " >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                    </div>
                     <div id="ajax_contact_field1">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Agency :<span class="required">*</span></label>
                      <input name="agency"  id="agency" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Website address :<span class="required">*</span></label>
                    <input name="website_address"  id="website_address" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
		    <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
		    <div class="select-file-div">Select File</div>
		    <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                  </div>
                  <!-- END AJAX CONTACT FIELD -->
                
                 <!-- <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
                  </div>
                 </div> 
                
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
    </div>
        </p>
        </section>
        <!-- .entry-content -->
      </div>
      <!-- .hentry -->
    </div>
    <!-- .hfeed -->
    </section>
    <!-- #content -->
    <?php
include("include_parts/form_side_bar.php");
?>
  </div>
  <!-- .wrap -->
</div>
<!-- #main -->
<a class="exit-off-canvas "></a>
<!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection "></a>
<div class="exit-sorting "></div>
</div>
<!-- #container -->
</div>
<!-- inner-wrap start -->
</div>
<!-- off-canvas-wrap end -->
<style>
.Pricedatepicker3{max-width:370px !important;}
#ajax_price_field .pricingOwner{display:none;}
</style>
<script>
var $j = jQuery.noConflict();
$j(document).ready(function(){
	$j("#datepicker2").datepicker();
	$j(".Pricedatepicker3").datepicker();
	$j('#timepicker2').timepicker({ 'scrollDefault': 'now' }); 
	$j('#timepicker3').timepicker({ 'scrollDefault': 'now' }); 
});
function getDatePicker(divId){
	$j("#"+divId).datepicker();
}
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
	   //console.log(PropertyID);
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
/* }else{
$_SESSION["page_info"]='Low balance !!!...Please add balnce to your account. THANK YOU';
echo '<script>window.location="my_balance.php ";</script>';	
} */
}else{
$_SESSION["target_path"]=$_SERVER['REQUEST_URI'];
echo '<script>window.location="login.php ";</script>';
}
include_once("include/footer.php");
//include_once("include/date_footer.php ");
?>