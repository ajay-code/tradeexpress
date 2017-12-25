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
			success:function(response){
				//alert(response);
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
        	url: "update_job_photo.php",
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
				alert("Job Updated Successfully");
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
</script>

<?php
$select="aj_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,company,country,city,region,job_type1,job_type2,pay_benefit,approx_pay_type,min_scale,max_scale,visa_required,reference,short_summery,job_desc,contact_name,mobile_no,landline,send_application,application_sendTo,application_instruction";
$from="add_job";
$condition=array("aj_id"=>trim($_POST["aj_id"]));
$item_detls=getDetails(doSelect1($select,$from,$condition));
$item_detls=trimmer_db_array($item_detls);
foreach($item_detls as $k2=>$v2){
?>
 <section id="content" class="large-9 small-12 columns">

                <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h3 class='page-title entry-title'>Jobs Edit Form</h3>
                    <section class="entry-content">
                      <!--  <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice.-->
                           
                                 <div class="accordion" id="post-listing">

                                     <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    
                                                                           <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center" style="padding-right: 0px;">
                                                                    <div class="panel-heading">
                                                                        <h3 style="font-size: 19px;color: #05242;"> Listing Fee For Job Category</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            
																<div class="moreinfo"  style="font-size:0.9em;font-weight:bold">
																	<?php echo show_price_listingDb('job');  ?> 
																</div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>
                                                    
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                   <div class="panel-heading">
                                                                        <h3>Free</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><label>Price:</label>&nbsp;<span>$0.00</span></span>
                                                                            <span class="days">
                                        		<p class="margin_right panel-type price package_type"><label>Package Type:</label><span>Single Submission</span> </p>
                        <p class="panel-type price package_type">
                            <label>Listing duration:</label>&nbsp;<span>360 days</span> </p>
                        </span>
                        <p><strong>Listings submitted with this package will be featured on: </strong>Homepage ($1.00) Category page ($1.00)
                            <!-- package description -->
                            <div class="moreinfo">
                                This package allows you to submit a free listing at no cost. </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>
                            </div> -->
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
  
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Category</label>                
					<select  id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select id="sub_sub_cat4" name="sub_sub_cat_id" class="textfield textfield_x " >
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
			</div>
			
			
 			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Listing Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
	
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="<?php echo $v2["listing_title"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Company :<span class="required">*</span></label>
                    <input name="company" id="company" value="<?php echo $v2["company"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>City :</label>                
					<select name="city" id="city_update" onchange="fetch_region();"  class="textfield textfield_x " >
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
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Region :</label>                
					<select name="region" id="region"  class="textfield textfield_x " >
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
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Type</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Job Type :</label>                
					<select id="job_type1" name="job_type1" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1" <?php if($v2["job_type1"]=="1") echo 'selected'; ?> >Full Time</option>
						<option value="2" <?php if($v2["job_type1"]=="2") echo 'selected'; ?> >Part Time</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Job Type :</label>                
					<select id="job_type2" name="job_type2" class="textfield textfield_x " >
						<option value="0">Select</option>
						<option value="1" <?php if($v2["job_type2"]=="1") echo 'selected'; ?> >Permanent</option>
						<option value="2" <?php if($v2["job_type2"]=="1") echo 'selected'; ?> >Contract / Temp</option>
					</select>
			</div>
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Pay And Benifits</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Pay and benefits :<span class="required">*</span></label>
                    <input name="pay_benefit" id="pay_benefit" value="<?php echo $v2["pay_benefit"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Approx. Pay :</label>                
					<select id="approx_pay_type" name="approx_pay_type" class="textfield textfield_x " >
						<option value="1" <?php if($v2["approx_pay_type"]=="1") echo 'selected'; ?> >Annual</option>
						<option value="2" <?php if($v2["approx_pay_type"]=="2") echo 'selected'; ?> >Hourly</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Minimum Scale :</label>                
					<select id="min_scale" name="min_scale" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
						for($i=20;$i<=200;$i++){
						?>
						<option value="<?php echo $i; ?>" <?php if($i==$v2["min_scale"]) echo 'selected'; ?> ><?php echo currency().$i.'k'; ?></option>
						<?php
						}
						?>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Max. Scale :</label>                
					<select id="max_scale" name="max_scale" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
						for($i=20;$i<=200;$i++){
						?>
						<option value="<?php echo $i; ?>" <?php if($i==$v2["max_scale"]) echo 'selected'; ?> ><?php echo currency().$i.'k'; ?></option>
						<?php
						}
						?>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''>Work Visa required ? :</label>                
					<select id="visa_required" name="visa_required" class="textfield textfield_x " >
						<option value="1" <?php if('1'==$v2["visa_required"]) echo 'selected'; ?> >Yes</option>
						<option value="2" <?php if('2'==$v2["visa_required"]) echo 'selected'; ?> >No</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Your References :<span class="required">*</span></label>
                    <input name="reference" id="reference" value="<?php echo $v2["reference"]; ?>" type="text" class="textfield "  placeholder=" "/>
			</div>
			
			
			<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Description</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
			</div> 
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Short Summery : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="short_summery" name="short_summery" ><?php echo $v2["short_summery"]; ?></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Job Details : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="job_desc" name="job_desc" ><?php echo $v2["job_desc"]; ?></textarea></div>
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Contact name :<span class="required">*</span></label>
                    <input name="contact_name" id="contact_name" value="<?php echo $v2["contact_name"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Phone numbers :<span class="required">*</span></label>
                    <input name="mobile_no" id="mobile_no" value="<?php echo $v2["mobile_no"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Landline numbers :<span class="required">*</span></label>
                    <input name="landline" id="landline" value="<?php echo $v2["landline"]; ?>" type="text" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Application Method :</label>                
					<select id="send_application" name="send_application" onchange="change_field_name();" class="textfield textfield_x " >
						<option value="Email" <?php if("Email"==$v2["send_application"]) echo 'selected'; ?> >Email</option>
						<option value="Phone" <?php if("Phone"==$v2["send_application"]) echo 'selected'; ?> >Phone</option>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl><span id="label_name">Enter <?php if($v2["send_application"]=='Email'){  ?>Email <?php }else{ ?> Phone <?php } ?>:</span><span class="required">*</span></label>
                    <input name="application_sendTo" id="application_sendTo" value="<?php echo $v2["application_sendTo"]; ?>" type="text" class="textfield "  placeholder=""/>
				<span id="owner_name_error " class="message_error2 "></span>     
			</div>
			
			<div class="form_row clearfix custom_fileds  post_content">
				<label class=''>Application instructions : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="application_instruction" name="application_instruction" ><?php echo $v2["application_instruction"]; ?></textarea></div>
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
</div>
	<!-- .hfeed -->
<?php
}
?>
 <?php
include("include_parts/sidebar_index.php");
?>