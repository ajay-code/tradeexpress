<?php 
session_start(); 
require_once("function.php"); 
include_once("include/header.php");
if(isset($_SESSION[ "ar_id"])){ 
$acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
if($acnt_blnce >= get_site_settings('34')){
?>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Droid+Sans);
/*
#formdiv{
    width:500px; 
    float:left; 
    text-align: center;
}
*/
#post{
	padding: 10px 2px;
}
.section-title{
	background-color:#05242f;
	padding: 1px 3px 6px 19px;
	color: #E6A01B !important;
	margin-bottom: 10px;
	
}
.section-title h3{
	color: inherit;
}
select{
	border:1px solid rgba(0, 0, 0, 0.2) !important;
}
select.custom-size{
	min-height:214px !important;
	border:none !important;
}
#formdiv {
  text-align: center;
}
#image_preview img#img-pre{
height: 150px;
  width: 150px;
  padding: 5px;
  border: 1px solid rgb(232, 222, 189);
}
#file {
  color: green;
  padding: 5px;
  border: 1px dashed #123456;
  background-color: #f9ffe5;
}
#img {
  width: 17px;
  border: none;
  height: 17px;
  margin-left: -20px;
  margin-bottom: 191px;
}
.img-cls{
	width:160px;
	height:160px;
	float:left;
	display: inline;
}
.upload {
  width: 100%;
  height: 30px;
}
.previewBox {
  text-align: center;
  position: relative;
  width: 150px;
  height: 150px;
  margin-right: 10px;
  margin-bottom: 20px;
  float: left;
}
.previewBox img {
  height: 150px;
  width: 150px;
  padding: 5px;
  border: 1px solid rgb(232, 222, 189);
}
.delete {
  color: red;
  font-weight: bold;
  position: absolute;
  top: 0;
  cursor: pointer;
  width: 20px;
  height:  20px;
  border-radius: 50%;
  background: #ccc;
}

.upload{
    background-color:#ff0000;
    border:1px solid #ff0000;
    color:#fff;
    border-radius:5px;
    padding:10px;
    text-shadow:1px 1px 0px green;
    box-shadow: 2px 2px 15px rgba(0,0,0, .75);
}
.upload:hover{
    cursor:pointer;
    background:#c20b0b;
    border:1px solid #c20b0b;
    box-shadow: 0px 0px 5px rgba(0,0,0, .75);
}
.display-block{
	display:block;
}
#file{
    color:green;
    padding:5px; border:1px dashed #123456;
    background-color: #f9ffe5;
}
body select option{
	padding:5px 0px !important;
}
#upload{
    margin-left: 45px;
}

#noerror{
    color:green;
    text-align: left;
}
#error{
    color:red;
    text-align: left;
}
#img{ 
    width: 17px;
    border: none; 
    height:17px;
    /*margin-left: -20px;*/
    /*margin-bottom: 91px;*/
}
/*#filediv{
	width:250px;
	margin-top:19px;
	float:left;
	display: inline;
	border:1px solid #ccc;
}*/
.abcd{
    text-align: center;
}
.abcd{
    text-align: center;
    width: 20%;
    float: left;
}
.abcd img{
    height:100px;
    width:100px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
}
b{
    color:red;
}
#formget{
    float:right; 

}
.span-select{
	width:204.5px;
	border:1px solid #ccc;
	float: left;
	display: inline;
}

</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script>

function call_2nd_page(id,id1){
	$("#"+id).hide(200);
	$("#"+id1).show(300);
}

function show_field_on_off(){
	var listing_type=$("#listing_type").val().trim();
	if(listing_type==1){
	$("#start_price").prop('disabled', true);
	$("#start_price_div").hide();
	$("#buy_now_div").show();
	}
	if(listing_type==2){
	$("#start_price").prop('disabled', false);
	$("#start_price_div").show();
	$("#buy_now_div").hide();
	}
	if(listing_type==0){
	$("#start_price").prop('disabled', false);
	$("#start_price_div").show();
	$("#buy_now_div").show();
	}
}

function second_cat_field(){
	var list_in_second_cat=$("#list_in_second_cat").val().trim();
	if(list_in_second_cat=="1"){
		$.post(
		"ajax_general_second_cat.php",
		{list_in_second_cat:list_in_second_cat},
		function(r){
			//alert(r);
		$("#first_cat").show();
		$("#second_cat_ajax").html(r);	
		}
		);
	}else{
		$("#first_cat").hide();
		$("#second_cat_ajax").html("");
	}
}


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
	$("#subtitle_field").hide(500);
	$("#"+action_id).prop("disabled", true);	
	}else{
	$("#subtitle_field").show(500);
	$("#"+action_id).prop("disabled", false);
	$("#1"+action_id).html("(<?php echo show_price_classifiedDb('subtitle');  ?> )");
	}
}
function enable_reserve_price(action_id,own_id){
	var check_value=$('input[name=reserve_price]:radio:checked').val()
	if(check_value.trim()=="0"){
	$("#"+own_id).show(500);
	$("#"+action_id).prop("disabled", false);	
	$("#1"+action_id).html("(<?php echo show_price_classifiedDb('reserve_price');  ?> )");
	}else{
	$("#"+own_id).hide(500);
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

function fetch_shipping_cost_field(id){
	var shipping_cost=$("#shipping_cost").val().trim();
	if(shipping_cost=="custom"){
		//alert("sidd");
		$.post(
		"fetch_subcat.php",
		{shipping_cost:id},
		function(r){
		$("#shipping_cost_field").html(r);
		}
		);
	}
}

function fetch_shipping_cost_field1(id){
	var shipping_cost=$("#shipping_cost").val().trim();
		$.post(
		"fetch_subcat.php",
		{shipping_cost:id},
		function(r){
		$("#shipping_cost_field").html(r);
		}
		);
	
}

$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
	$.ajax({
        	url: "add_general_item_multiple_photo.php",
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
				alert("Item Added Successfully");
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
<section id="main" class="clearfix">

    <div class="wrap row">

        <div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="post_item.php">Submit Classified</a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">General Item</span>
            </div>
        </div>
        <section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h2 class='page-title entry-title'>General Item</h2>
                    <section class="entry-content">
                        <!-- <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice. -->
                           
                                 <div class="accordion" id="post-listing">

                                     <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                     
                                     
                                      <!--  <a class="step-heading active" style="color:red;" href="javascript:void(0);"><span>*</span><span><h3 style="color:red;">First three month free</h3></span><span></span></a>-->
                                      
                                      
                                   <!-- <br>  <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>-->
                                    
                                    
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12">
                                                                <div class="panel panel-default text-center" style="padding-right: 0px;">
                                                                    <div class="panel-heading">
                                                                   
                                                    <h3 style="font-size: 19px;color: #05242f;">Listing Fee In General Category </h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            
																<div class="moreinfo"  style="font-size:0.9em;font-weight:bold">
																	<?php echo show_price_listingDb('general_item');  ?> 
																</div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>
                            </div>
                            <div class="packageblock clearifx ">
                            <!--    <ul data-price="100" data-subscribed='0' data-id="16" data-type="2" class="packagelistitems ">
                                    <li>-->
                                        
                                        
                                        
                                      <!--  <div class="col-md-12 col-sm-6">
                                            <div class="panel panel-default text-center" style="padding-right: 0px;">
                                                <div class="panel-heading">
                                                    <h3 style="font-size: 19px;color: #E6A01B;">For Classified</h3>
                                                </div>
                                                <div class="panel-desc">
                                                    <div class="panel-body">
													<?php 
													$price=show_price_classifiedDb('listed_in_second_cat');  
													if($price!=""){
													?>
                                                    <div class="moreinfo" style="font-size:0.9em;">
														For Second Listed Category			(<?php echo $price; ?>)
													</div>
													<?php
													}
													?>
													<?php 
													$price=show_price_classifiedDb('subtitle');  
													if($price!=""){
													?>
                                                    <div class="moreinfo" style="font-size:0.9em;">
														For Sub-Title			(<?php echo $price; ?>)
													</div>
													<?php
													}
													?>
													<?php 
													$price=show_price_classifiedDb('reserve_price');  
													if($price!=""){
													?>
                                                    <div class="moreinfo" style="font-size:0.9em;">
														For Reserve Price			(<?php echo $price; ?>)
													</div>
													<?php
													}
													?>
													
													
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>-->
                            </div>
                            </div>
                            </div>
                            <!-- End #panel1 -->
                            </div>

<form name="submit_form" id="submit_form" class="form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
<div id="ajax_form">

<div id="step-post" class="accordion-navigation step-wrapper step-post">
<a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Add Classified Form</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
<div id="post" class="step-post content  clearfix">
<div id="submit_form_custom_fields" class="submit_form_custom_fields">
<div id="1st_page" >                                       
<div id="first_cat" class="section-title">
	<h3 >First Category</h3>
</div>   

		<!-- Changes -->
		<!-- <div id="wrapper">
			<div class="scrollbar" id="style-3">
      			<div class="force-overflow">
      				<ul>
      					
      				</ul>
      			</div>
    		</div>
    		<div class="scrollbar" id="style-3">
      			<div class="force-overflow"></div>
    		</div>
    		<div class="scrollbar" id="style-3">
      			<div class="force-overflow"></div>
    		</div>
    		<div class="scrollbar" id="style-3">
      			<div class="force-overflow"></div>
    		</div>
    	</div> -->
		<!-- changes -->
			<div class="form_row clearfix custom_fileds classified_tag ">
					
					<div class="span-select">
						              
						<select  size="7" id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x custom-size">
							
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
					</div>

					<div class="span-select">
						<select size="7" id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x custom-size" >
						</select>
					</div>

					<div class="span-select">
						<select size="7" id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" class="textfield textfield_x custom-size" >
						</select>
					</div>

					<div class="span-select">
						<select size="7" id="sub_sub_sub_cat5" name="sub_sub_sub_cat_id"  class="textfield textfield_x custom-size" >
						</select>
					</div>
				</div>
			<!-- <div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select size="7" id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select size="7" id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Sub Category</label>                
					<select size="7" id="sub_sub_sub_cat5" name="sub_sub_sub_cat_id"  class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
			</div> -->
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=''>Continue with only one category</label>
				</div>
				<div class="col-sm-8">
					<select id="list_in_second_cat" name="list_in_second_cat" onchange="second_cat_field();" class="textfield textfield_x ">
						<option value="0">Continue with only one category</option>
						<option value="1">List in a second category to be seen in more places</option>
					</select>
				</div>
			</div>
			<div id="second_cat_ajax">
			
			</div>
			<input type="button" onclick="call_2nd_page('1st_page','2nd_page')"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
			</div>
			
			<div id="2nd_page" style="display:none">
			<div class="section-title">
			<h3 >Listing Details</h3>
			</div> 
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=''>Listing Type</label>
				</div>
				<div class="col-sm-8">
					<select id="listing_type" name="listing_type" onchange="show_field_on_off();" class="textfield textfield_x ">
						<option value="0">Sale & Auction</option>
						<option value="1">For Sale</option>
						<option value="2">Auction</option>
					</select>
				</div>
			</div>
	
			<div class="form_row clearfix custom_fileds  owner_name">
				<div class="col-sm-4">
					<label class=r_lbl>Listing Title :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
						<input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Subtitle :</label>                
				</div>
				<div class="col-sm-8">
					<select id="subtitle"  onchange="enable_field('subtitle1','subtitle');"  class="textfield textfield_x " >
						<option value="0" selected >No Subtitle</option>
						<option value="2">Add Subtitle</option>
					</select>
				</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name" style="display:none;" id="subtitle_field">
			<?php
			$chrg=show_price_classifiedDb('subtitle');
			?>
				<div class="col-sm-4">
					<label class=r_lbl>Sub-Title <?php  if($chrg !=""){ ?><span style="color: #E6A01B;">(<?php echo $chrg;  ?>)</span><?php } ?></label>
				</div>
				<div class="col-sm-8">
                    <input name="subtitle" disabled id="subtitle1" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Brand New Item(Items) :</label>                
				</div>
				<div class="col-sm-8">
					<select id="brand_item" name="brand_item" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1">Item Used</option>
						<option value="2">Unused</option>
					</select>
				</div>
			</div>
			<div class="section-title">
			<h3 >Pricing And Duration</h3>
			</div> 
			<div id="start_price_div">
			<div class="form_row clearfix custom_fileds  owner_name">
				<div class="col-sm-4">
					<label class=r_lbl>Start Price :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
                    <input name="start_price" id="start_price" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			
			
			<div class="form_row clearfix custom_fileds  price_type">
				<div class="col-sm-4">
					<label class=>Reserve price :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
					<div class="form_cat_left">
						<ul class="hr_input_radio">
							<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');" checked id="reserve_price1" type="radio" value="1" checked="checked"   /> <label for="price_type_1">Same as the start price</label></li>
							<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');"  id="reserve_price2" value="0" type="radio"   /> <label for="price_type_2">Specify a reserve</label></li>
						</ul>
					</div>
				</div>
			<span id="price_type_error" class="message_error2"></span> 
			</div> 
			<?php
			$chrg=show_price_classifiedDb('reserve_price');
			?>
			<div class="form_row clearfix custom_fileds  owner_name" style="display:none" id="reserve_price">
				<div class="col-sm-4">
					<label class=r_lbl>Reserve Price  :<?php  if($chrg !=""){ ?><span style="color: #E6A01B;">(<?php echo $chrg;  ?>)</span><?php } ?></label>
				</div>
				<div class="col-sm-8">
                    <input name="custom_reserve_price" disabled id="custom_reserve_price" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			</div>
			
			<div id="buy_now_div">
			<div class="form_row clearfix custom_fileds  owner_name">
				<div class="col-sm-4">
					<label class=r_lbl>Buy Now :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
                    <input name="buy_now" id="buy_now" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  price_type">
				<div class="col-sm-4">
					<label class=>Allow Bid From :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
					<div class="form_cat_left">
						<ul class="hr_input_radio">
							<li><input  name="allow_bid[]" value="1" style="margin-top:0px;" type="checkbox" value="fixed" checked="checked"   /> <label for="price_type_1">Authenticated Members only</label></li>
						</ul>
					</div>
				</div>
			<span id="price_type_error" class="message_error2"></span> 
			</div>
			
			<div class="form_row clearfix custom_fileds  price_type">
				<div class="col-sm-4">
					<label class=>Listing Duration :<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
					<div class="form_cat_left">
						<ul class="hr_input_radio">
							<li><input name="listing_duration" onclick="enable_length_field('listing_length','datepicker2')" checked id="listing_duration1" value="0" type="radio"  /> <label for="price_type_1">Fixed Length</label></li>
						<?php if(!isOnTrial()): ?>
							<li><input name="listing_duration"  onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration2" value="1" type="radio"    /> <label for="price_type_2">Choose End Time</label></li>
						<?php endif; ?>
						</ul>
					</div>
				</div>
			<span id="price_type_error" class="message_error2"></span> 
			</div> 
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Select Length :</label>                
				</div>
				<div class="col-sm-8">
					<select id="listing_length" name="listing_length" class="textfield textfield_x " >
						<?php if(isOnTrial()): ?>
							<option value="7">7 Days</option>
						<?php else: ?>
							<option value="0">Select</option>
							<option value="2">2 Days</option>
							<option value="3">3 Days</option>
							<option value="4">4 Days</option>
							<option value="5">5 Days</option>
							<option value="6">6 Days</option>
							<option value="7">7 Days</option>
							<option value="8">8 Days</option>
							<option value="9">9 Days</option>
							<option value="10">10 Days</option>
						<?php endif; ?>
					</select>
				</div>
			</div>
			<?php if(!isOnTrial()): ?>
				<div class="form_row clearfix custom_fileds  owner_name">
					<div class="col-sm-4">
						<label class=r_lbl>Select Length :<span class="required">*</span></label>
					</div>
					<div class="col-sm-8">
						<input  id="datepicker2" readonly  disabled name="listing_length"  value="" type="text" class="textfield "  placeholder=" "/>
					</div>
					<span id="owner_name_error " class="message_error2 "></span>     
				</div>
			<?php endif; ?>

			<!-- <input type="button" onclick="call_2nd_page('2nd_page','3rd_page')"  class="btn btn-lg btn-primary button select-plan" value="Continue" > -->
			
			<div class="section-title">
			<h3 >Payment & Shipping</h3>
			</div> 
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Pick Ups :</label>                
				</div>
				<div class="col-sm-8">
					<select  id="pick_ups" name="pick_ups"  class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1">No Pick Up</option>
						<option value="2">Buyer Must Pick Up</option>
						<option value="3">Buyer Can Pick Up</option>
					</select>
				</div>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag "  id="shipping_cost_field">
				<div class="col-sm-4">
					<label class=>Shipping Cost :</label>                
				</div>
				<div class="col-sm-8">
					<select id="shipping_cost" name="shipping_cost" onchange="fetch_shipping_cost_field(1);" class="textfield textfield_x " >
						<option value="0">I Don't know The Shipping Cost Yet </option>
						<option value="1">Free Shipping </option>
						<option value="custom">Custom Shipping Cost</option>
					</select>
				</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  price_type">
				<div class="col-sm-4">
					<label class=>Price Type<span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
					<div class="form_cat_left">
						<ul class="hr_input_radio">
							<li><input name="payment[]" value="credit_card" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Credit card</label></li>
							<li><input name="payment[]" value="bank_deposit" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Bank Deposit</label></li>
							<li><input name="payment[]" value="cash" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Cash</label></li>
							<li><input name="payment[]" value="safe_trader" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Safe Tarder</label></li>
						</ul>
					</div>
				</div>
			<span id="price_type_error" class="message_error2"></span> 
			</div>
			
			<div class="section-title">
			<h3 >Item Details</h3>
			</div> 
			<div class="form_row clearfix custom_fileds  post_content">
				<div class="col-sm-4">
					<label class=>Item Details : <span class="required">*</span></label>
				</div>
				<div class="col-sm-8">
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="item_desc" name="item_desc" ></textarea></div>
							<span id="address_error" class=""></span>
							<br>
							<!-- <div id="filediv">
								<input name="file[]" type="file" id="file"/>
							</div>
							<br>
           					<div class="display-block">
	                    		<input type="button" id="add_more" class="upload" value="Add More Files"/>
	                    		<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                    		</div> -->
					</div>
				</div>
			</div>
			

			<!-- <div id="" style="background-color:grey;padding: 1px 3px 6px 19px;">
			<h3 style="color: #E6A01B;">Listing Photos</h3>
			</div>  -->
			<!-- <div class="form_row clearfix custom_fileds  post_content">
				<label class=>Select Multiple Photos : <span class="required">*</span></label>
      				<div>
      					<input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
      				</div>
					
					<div style="min-width:100%" id="image_preview"></div>	 

				    <div>
				    	<input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>
				    </div>

				<div id="filediv">
					<input name="file[]" type="file" multiple="multiple" id="file"/>
				</div>
				<div>
            		<input type="button" id="add_more" class="upload" value="Add More Files"/>
            		<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
        		</div>
        		<div id="photo-con"></div>
			</div> -->

			<script type="text/javascript">
				function preview_images() 
				{
				 var total_file=document.getElementById("images").files.length;
				 for(var i=0;i<total_file;i++)
				 {
				  $('#image_preview').append("<div class='img-cls'><img id='img-pre' class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
				 }
				 $('#img-pre').append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
				                $(this).parent().parent().remove();
					}));
				}
				
				
				/*$('#add_more').click(function() {
		          "use strict";
		          $(this).before($("<div/>", {
		            id: 'filediv'
		          }).fadeIn('slow').append(
		            $("<input/>", {
		              name: 'file[]',
		              type: 'file',
		              id: 'file',
		              multiple: 'multiple',
		              accept: 'image/*'
		            })
		          ));
		        });

		        $('#upload').click(function(e) {
		          "use strict";
		          e.preventDefault();

		          if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
		            alert("No files are selected.");
		            return false;
		          }

		          // Now, upload the files below...
		          // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
        		});

		        deletePreview = function (ele, i) {
		          "use strict";
		          try {
		            $(ele).parent().remove();
		            window.filesToUpload.splice(i, 1);
		          } catch (e) {
		            console.log(e.message);
		          }
		        }

		        $("#file").on('change', function() {
		          "use strict";

		          // create an empty array for the files to reside.
		          window.filesToUpload = [];

		          if (this.files.length >= 1) {
		            $("[id^=previewImg]").remove();
		            $.each(this.files, function(i, img) {
		              var reader = new FileReader(),
		                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
		                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
		                preview = newElement.find("img");

		              reader.onloadend = function() {
		                preview.attr("src", reader.result);
		                preview.attr("alt", img.name);
		              };

		              try {
		                window.filesToUpload.push(document.getElementById("file").files[i]);
		              } catch (e) {
		                console.log(e.message);
		              }

		              if (img) {
		                reader.readAsDataURL(img);
		              } else {
		                preview.src = "";
		              }

		              newElement.appendTo("#filediv");
		            });
		          }
		        });
*/

				/*var abc = 0; //Declaring and defining global increement variable

				$(document).ready(function() {

				//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
				    $('#add_more').click(function() {
				        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
				                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),        
				                $("<br/><br/>")
				                ));
				    });

				//following function will executes on change event of file input to select different file	
				$('body').on('change', '#file', function(){
				            if (this.files && this.files[0]) {
				                 abc += 1; //increementing global variable by 1
								
								var z = abc - 1;
				                var x = $(this).parent().find('#previewimg' + z).remove();
				                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
				               
							    var reader = new FileReader();
				                reader.onload = imageIsLoaded;
				                reader.readAsDataURL(this.files[0]);
				               
							    $(this).hide();
				                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
				                $(this).parent().parent().remove();
				                }));
				            }
				        });

				//To preview image     
				    function imageIsLoaded(e) {
				        $('#previewimg' + abc).attr('src', e.target.result);
				    };

				    $('#upload').click(function(e) {
				        var name = $(":file").val();
				        if (!name)
				        {
				            alert("First Image Must Be Selected");
				            e.preventDefault();
				        }
				    });
				});*/
			</script>
			
			
			<input type="hidden" name="next_form" value="photo_upload" />
			<input type="hidden" name="db_name" value="add_general_items" />
			
			
			<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
			
				   
</div>								                    
</div>												 				
</div>


</div><!-- END AJAX DIV -->
</form>
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
<a class="exit-off-canvas "></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection "></a>
<div class="exit-sorting "></div>
</div>
<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> <!-- off-canvas-wrap end -->

<?php
}else{
$_SESSION["page_info"]='Low balance !!!...Please add balnce to your account. THANK YOU';
echo '<script>window.location="my_balance.php ";</script>';	
}
}else{
$_SESSION["target_path"]=$_SERVER['REQUEST_URI'];
echo '<script>window.location="login.php ";</script>';
}
include_once("include/footer.php");
include_once("include/date_footer.php");
?>
