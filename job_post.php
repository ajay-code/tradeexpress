<?php 
session_start(); 
require_once("function.php"); 
include_once("include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
$acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
if($acnt_blnce >= get_site_settings('34')){
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
</style>
<script type="text/javascript">
jQuery(document).ready(function(){
for( var p=1; p<25; p++){
 $("#min_scale option:eq("+p+")").hide();
 $("#max_scale option:eq("+p+")").hide();
}

$('#approx_pay_type').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if(valueSelected==2){
    	//For Minimum Scale
    		for( var i=1; i<25; i++){
    		 $("#min_scale option:eq("+i+")").show();
    		}	

    		for( var j=25; j<206; j++){
    		 $("#min_scale option:eq("+j+")").hide();

           }
        // For Maximum  Scale
        		for( var i=1; i<25; i++){
        		 $("#max_scale option:eq("+i+")").show();
        		}	

        		for( var j=25; j<206; j++){
        		 $("#max_scale option:eq("+j+")").hide();

               }

       }else {
       	//For Minimum Scale 
       			for( var k=1; k<25; k++){
       			 $("#min_scale option:eq("+k+")").hide();
       			}	

       			for( var l=25; l<206; l++){
       			 $("#min_scale option:eq("+l+")").show();

       	       }
       	// For Maximum Scale 
       			for( var k=1; k<25; k++){
       			 $("#max_scale option:eq("+k+")").hide();
       			}	

       			for( var l=25; l<206; l++){
       			 $("#max_scale option:eq("+l+")").show();

       	       }
       }

});

})


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
$("#submit_form").on('submit',(function(e){  
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
			//alert(data[1].trim());
			if(data[1].trim()==1){
				$("#ajax_form").html(data[0]);
				$("#ajax_fetch_form").show(1200);
			}else if(data[1].trim()=='finish'){
				alert("Job Added Successfully");
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
			<span class="sep">&raquo;</span> <span class="trail-end">Job</span>
            </div>
        </div>
        <section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h1 class='page-title entry-title'>Submit Classified (Job)</h1>
                    <section class="entry-content">
                        <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice.
                           
                                 <div class="accordion" id="post-listing">

                            <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                <a class="step-heading active" style="color:red;" href="javascript:void(0);"><span>*</span><span><h3 style="color:red;">First three month free</h3></span><span></span></a>
                                    <br>           
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
                                                                            
																<div class="moreinfo"  style="font-size:0.9em;">
																	<?php echo show_price_listingDb('job');  ?> 
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
<div id="post" class="step-post content  clearfix" style="background-color: wheat;">
<div id="submit_form_custom_fields" class="submit_form_custom_fields">
                                        
<a id="first_cat" style="display:none;" class="step-heading active" href="javascript:void(0);"><span>$30</span><span>For Second Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
   			
		
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff">Listing Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 

   			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="span-select">
					<select size="7" id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x custom-size" >
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
					
			
 			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Listing Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
	
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Company :<span class="required">*</span></label>
                    <input name="company" id="company" value="" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
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
											foreach($country as $countryk=>$countryv){
										?>
			                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
			                      <?php } ?>
			                    </select>
			                  </div>
			                  <div class="form_row clearfix custom_fileds classified_tag ">
			                    <label class=>Region :</label>
			                    <select  id="city_update" name="city"  onchange="fetch_region();" class="textfield textfield_x " >
			                      <option value="0">--Select Region--</option>
			                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
											foreach($getCity as $getCityKey=>$getCityVals){
										?>
			                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
			                      <?php } ?>
			                    </select>
			                  </div>
			                  <div class="form_row clearfix custom_fileds classified_tag ">
			                    <label class=>City :</label>
			                    <select name="region" id="region" class="textfield textfield_x " onchange="fetch_suburb();">
			                      <option value="0">--Select City--</option>
			                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
											foreach($getCity as $getCityKey=>$getCityVals){
										?>
			                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
			                      <?php } ?>
			                    </select>
			                  </div>
			                  <div class="form_row clearfix custom_fileds classified_tag ">
			                    <label class=>Suburb  :</label>
			                    <select id="suburb" name="suburb" class="textfield textfield_x " >
			                      <option value="0">--Select Suburb--</option>
			                    </select>
			                  </div>
			                  <?php } } ?>


<!-- 			<input type="hidden" name="country" id="country" value="5" /> -->
			<!-- <div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>City :</label>                
					<select name="city" id="city_update"  onchange="fetch_region();"   class="textfield textfield_x " >
						<option value="0" >Select City </option>
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
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Region :</label>                
					<select name="region" id="region"  class="textfield textfield_x " >
						<option value="0">Select Region</option>
					</select>
			</div> -->
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Type</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Job Type :</label>                
					<select id="job_type1" name="job_type1" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1">Full Time</option>
						<option value="2">Part Time</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Job Type :</label>                
					<select id="job_type2" name="job_type2" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1">Permanent</option>
						<option value="2">Contract / Temp</option>
					</select>
			</div>

			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Experience  :</label>                
					<select id="experience" name="experience" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1">Entry Level</option>
						<option value="1">6 Months</option>
						<option value="2">1 Year +</option>
					</select>
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pay And Benifits</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Pay and benefits :<span class="required">*</span></label>
                    <input name="pay_benefit" id="pay_benefit" value="" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Approx. Pay :</label>                
					<select id="approx_pay_type" name="approx_pay_type" class="textfield textfield_x " >
						<option value="1">Annual</option>
						<option value="2">Hourly</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag " id="">
				<label class=''>Minimum Scale :</label>                
					<select id="min_scale" name="min_scale" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="17">$17</option>
						<option value="15">$18</option>
						<option value="19">$19</option>
						<option value="20">$20</option>
						<option value="25">$25</option>
						<option value="30">$30</option>
						<option value="35">$35</option>
						<option value="40">$40</option>
						<option value="45">$45</option>
						<option value="50">$50</option>
						<option value="55">$55</option>
						<option value="60">$60</option>
						<option value="65">$65</option>
						<option value="70">$70</option>
						<option value="75">$75</option>
						<option value="80">$80</option>
						<option value="85">$85</option>
						<option value="90">$90</option>
						<option value="95">$95</option>
						<option value="100">$100</option>
						<option value="110">$110</option>
						<option value="120">$120</option>
						<option value="130">$130</option>
						<option value="140">$140+</option>
						<?php
						for($i=20;$i<=200;$i++){
						?>
						<option value="<?php echo $i; ?>"><?php echo currency().$i.'k'; ?></option>
						<?php
						}
						?>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Max. Scale :</label>                
					<select id="max_scale" name="max_scale" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="17">$17</option>
						<option value="15">$18</option>
						<option value="19">$19</option>
						<option value="20">$20</option>
						<option value="25">$25</option>
						<option value="30">$30</option>
						<option value="35">$35</option>
						<option value="40">$40</option>
						<option value="45">$45</option>
						<option value="50">$50</option>
						<option value="55">$55</option>
						<option value="60">$60</option>
						<option value="65">$65</option>
						<option value="70">$70</option>
						<option value="75">$75</option>
						<option value="80">$80</option>
						<option value="85">$85</option>
						<option value="90">$90</option>
						<option value="95">$95</option>
						<option value="100">$100</option>
						<option value="110">$110</option>
						<option value="120">$120</option>
						<option value="130">$130</option>
						<option value="140">$140+</option>

						<?php
						for($i=20;$i<=200;$i++){
						?>

						<option value="<?php echo $i; ?>"><?php echo currency().$i.'k'; ?></option> -->
						<?php
						}
						?>

					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Work Visa required ? :</label>                
					<select id="visa_required" name="visa_required" class="textfield textfield_x " >
						<option value="1">Yes</option>
						<option value="2">No</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Your References :<span class="required">*</span></label>
                    <input name="reference" id="reference" value="" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Description</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Short Summery : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="short_summery" name="short_summery" ></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Job Details : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="job_desc" name="job_desc" ></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Contact name :<span class="required">*</span></label>
                    <input name="contact_name" id="contact_name" value="" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Phone numbers :<span class="required">*</span></label>
                    <input name="mobile_no" id="mobile_no" value="" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Landline numbers :<span class="required">*</span></label>
                    <input name="landline" id="landline" value="" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Application Method :</label>                
					<select id="send_application" name="send_application" onchange="change_field_name();" class="textfield textfield_x " >
						<option value="Email">Email</option>
						<option value="Phone">Phone</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl><span id="label_name">Enter Email :</span><span class="required">*</span></label>
                    <input name="application_sendTo" id="application_sendTo" value="" type="text" class="textfield "  placeholder=""/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Application instructions : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="application_instruction" name="application_instruction" ></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			
			<input type="hidden" name="next_form" value="photo_upload" />
			<input type="hidden" name="db_name" value="add_job" />
			
			
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
?>