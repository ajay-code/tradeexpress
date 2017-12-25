<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var name=$("#name").val();
var email=$("#email").val();
var phone=$("#phone").val();
var landline=$("#landline").val();
var country=$("#country").val();
var city=$("#city").val();
var company=$("#company").val();
var address=$("#address").val();
var about=$("#about").val();

$("#name_error").html("");
$("#email_error").html("");
$("#password_error").html("");
$("#cpassword_error").html("");
$("#phone_error").html("");
$("#landline_error").html("");
$("#country_error").html("");
$("#city_error").html("");
$("#company_error").html("");
$("#address_error").html("");
$("#about_error").html("");

if(name.trim()==""){
	$("#name_error").html("Required");
	$("#name").focus();
	return false;
}

if(email.trim()==""){
	$("#email_error").html("Required");
	$("#email").focus();
	return false;
}
if(!regex.test(email)){
      $("#email_error").html("Invalid Email");
      $("#email").val("");
      $("#email").focus();
      return false;
    }

if(phone.trim()==""){
	$("#phone_error").html("Required");
	$("#phone").focus();
	return false;
}

if(isNaN(phone)){
	$("#phone_error").html("Invalid");
    $("#phone").val("");
    $("#phone").focus();
	return false;
}
if(landline.trim()==""){
	$("#landline_error").html("Required");
	$("#landline").focus();
	return false;
}

if(isNaN(landline)){
	$("#landline_error").html("Invalid");
    $("#landline").val("");
    $("#landline").focus();
	return false;
}
if(country.trim()=="0"){
	$("#country_error").html("Required");
	$("#country").focus();
	return false;
}
if(city.trim()=="0"){
	$("#city_error").html("Required");
	$("#city").focus();
	return false;
}

if(company.trim()==""){
	$("#company_error").html("Required");
	$("#company").focus();
	return false;
}
if(address.trim()==""){
	$("#address_error").html("Required");
	$("#address").focus();
	return false;
}
if(about.trim()==""){
	$("#about_error").html("Required");
	$("#about").focus();
	return false;
}
	
	$.ajax({
        	url: "ajax_update_profile.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
			//alert(r);
			if(r==1){
			alert("Update Successfull");
			window.location="index.php";
			}else{
			alert("Something went wrong !!!");
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
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="vendor_listing.php">Vendor</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="profile_details.php"><?php  echo getCusName($_SESSION["ar_id"]); ?></a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Update Profile</span>
            </div>
</div>

<section id="content" class="large-9 small-12 columns">
	  
	<div class="hfeed">
     				<div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
      			<h1 class='page-title entry-title'>Update Profile</h1>                          <section class="entry-content">
                            
			
				<div id="step-post" class="accordion-navigation step-wrapper step-post">
				<div id="step-auth" class="accordion-navigation step-wrapper step-auth">
						
						<div id="auth" class="step-auth content clearfix">
						<p style="display:none;" class="status"></p>
	<div class="login_submit clearfix" id="loginform">
<?php
$select="ar_id,name,email,phone,landline,country,city,company,address,image,about";
$from="ambit_registration";
$con=array("ar_id"=>$_SESSION["ar_id"]);
$details=getDetails(doSelect($select,$from,$con));
$details=trimmer_db_array($details);
foreach($details as $k3=>$v3){
?>	
	<form action="javascript:void(0);" method="post" enctype="multipart/form-data" id="submit_form">
		<!-- Login Form -->
		<div name="loginform" class="sublog_login"  style="display:block;"   id="login_user_frm_id"  >
      
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Name<span class="required">*</span></label>
				<input type="text" value="<?php echo $v3["name"]; ?>" class="textfield slog_prop " id="name" name="name"  />
				<span id="name_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Email<span class="required">*</span></label>
				<input type="text" value="<?php echo $v3["email"]; ?>" class="textfield slog_prop " id="email" name="email"  />
				<span id="email_error" class=""></span>
			</div>
			
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Phone<span class="required">*</span></label>
				<input type="text" value="<?php echo $v3["phone"]; ?>" class="textfield slog_prop " id="phone" name="phone"  />
				<span id="phone_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Landline<span class="required">*</span></label>
				<input type="text" value="<?php echo $v3["landline"]; ?>" class="textfield slog_prop " id="landline" name="landline"  />
				<span id="landline_error" class=""></span>
			</div>
			<div class="form_row clearfix">
				<label>Country<span class="required">*</span></label>
				<select name="country" id="country"  class="textfield textfield_x " onchange="fetch_city('country','city');">
					<option value="0">Select Country</option>
					<?php
					$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
					foreach($country as $k=>$v){
					?>
					<option value="<?php echo $v["cn_id"]; ?>" <?php if($v["cn_id"]==$v3["country"]) echo 'selected';  ?>>
					<?php echo $v["cn_name"];  ?>
					</option>
					<?php
					}
					?>
					</select>
				<span id="country_error" class=""></span>
			</div>
			<div class="form_row clearfix">
				<label>City<span class="required">*</span></label>
				<select name="city" id="city"  class="textfield textfield_x ">
					<option value="0">Select City</option>
					<?php
					$city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$v3["country"])));
					foreach($city as $k=>$v){
					?>
					<option value="<?php echo $v["ct_id"]; ?>" <?php if($v["ct_id"]==$v3["city"]) echo 'selected';  ?>>
					<?php echo $v["ct_name"];  ?>
					</option>
					<?php
					}
					?>
				</select>
				<span id="city_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Image<span class="required">*</span></label>
				<input type="file" class="textfield slog_prop " id="image" name="image" onchange="loadFile(event)"  />
				<span id="image_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				 <img id="output" src="customer_image/<?php echo $v3["image"]; ?>"  />
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Company<span class="required">*</span></label>
				<input type="text" value="<?php echo $v3["company"]; ?>" class="textfield slog_prop " id="company" name="company"  />
				<span id="company_error" class=""></span>
			</div>
			<div class="form_row clearfix custom_fileds  post_content">
		   
		<label class=>Address<span class="required">*</span></label>
		<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
		<div id="wp-post_content-editor-container" class="wp-editor-container">
		<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" name="address" id="address"><?php echo $v3["address"];  ?></textarea></div>
		<span id="address_error" class=""></span>
		</div>   
		</div> 
		
		<div class="form_row clearfix custom_fileds  post_content">
		   
		<label class=>About Me<span class="required">*</span></label>
		<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
		<div id="wp-post_content-editor-container" class="wp-editor-container">
		<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" name="about" id="about"><?php echo $v3["about"];  ?></textarea></div>
		<span id="about_error" class=""></span>
		</div>
		</div>

			
		  
			<div class="form_row clearfix">
				<input  type="submit"  value="Update" class="button_green submit" />
			</div>
			
			</div>
		<!-- Login Form End -->
	</form>
<?php
}
?>
    </div>
							</div>
					 </div>
					 					<div id="step-payment" class="accordion-navigation step-wrapper step-payment" style="display:none;">
						<a class="step-heading active" href="#"><span id="select_payment">4</span><span>Payment</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
						<div id="payment" class="step-payment content clearfix">
										<h5 class="payment_head"> 
					Select Payment Method                </h5>
               <ul class="payment_method">		<li id="paypal">
        <label>
        		  <input onclick="showoptions(this.value);"  type="radio" value="paypal" id="paypal_id" name="paymentmethod" checked="checked" />  
    						<p><span>PayPal</span></p>						</label> 
					</li>
		  		<li id="prebanktransfer">
        <label>
        		  <input onclick="showoptions(this.value);"  type="radio" value="prebanktransfer" id="prebanktransfer_id" name="paymentmethod"  />  
    						<p><span>Pre Bank Transfer</span></p>						</label> 
					</li>
		  					<div id="payment_errors" class="payment_error"></div>
					<script type="text/javascript" async src="images/payment_gateway_validation.js"></script>   
				 	  
  </ul>
  <div class='payment_method payment_credit_card_info'></div>	
	 						<input type="button" id="submit_form_button" name="submit_form_button" value="Pay Now" class="progress-button" />
						</div>
					</div>
							</div>
		</form><div id="preview_submit_from_classified"  class="reveal-modal singular-classified preview_submit_from_data" data-reveal></div>

</p>
                          </section>
                          <!-- .entry-content -->
					    				</div>
					<!-- .hentry -->
						</div>
	<!-- .hfeed -->
  </section>
<!-- #content -->
<aside class="sidebar large-3 small-12 columns" id="sidebar-primary"><div id="templatic_text-6" class="widget templatic_text">		<div class="textwidget">	


<a href=""; target="_blank"><img src="images/advertimage.jpeg" alt="Advertisement image" /></a>	</div>
	   <!-- This sponsored link is in the edit profile page under the advertising banner
	   
	   </div><div id="meta-3" class="widget widget_meta"><h3 class="widget-title">Sponsored Links</h3>			<ul>
						<li><a href="wp-login.html">Log in</a></li>
			<li><a href="index-2.html">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="index-3.html">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>			</ul>
			</div></aside></div>-->
<!-- .wrap -->
</div>
<!-- #main -->
<a class="exit-off-canvas"></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>
</div>
<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> <!-- off-canvas-wrap end -->


<?php
include_once("include/footer.php");
?>