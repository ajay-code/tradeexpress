<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<script>
$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var name=$("#name").val();
var email=$("#email").val();
var password=$("#password").val();
var cpassword=$("#cpassword").val();
var gender=$('input[name=gender]:radio:checked').val();
var dob=$("#dob").val();
var phone=$("#phone").val();
var landline=$("#landline").val();
var country=$("#country").val();
var city=$("#city").val();
var image=$("#image").val();
var company=$("#company").val();
var address=$("#address").val();
var about=$("#about").val();

$("#name_error").html("");
$("#email_error").html("");
$("#password_error").html("");
$("#cpassword_error").html("");
$("#gender_error").html("");
$("#dob_error").html("");
$("#phone_error").html("");
$("#landline_error").html("");
$("#country_error").html("");
$("#city_error").html("");
$("#image_error").html("");
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
if(password.trim()==""){
	$("#password_error").html("Required");
	$("#password").focus();
	return false;
}

if(cpassword.trim()==""){
	$("#cpassword_error").html("Required");
	$("#cpassword").focus();
	return false;
}

if(password != cpassword){
	$("#cpassword_error").html("Password mismatch !!!");
	$("#cpassword").val("");
	$("#cpassword").focus();
	return false;
}
if(dob.trim()==""){
	$("#dob_error").html("Required");
	$("#dob").focus();
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
if(image.trim()==""){
	$("#image_error").html("Required");
	$("#image").focus();
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
        	url: "ajax_registration.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
			//alert(r);
			if(r==1){
			alert("Registration Successfull");
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

<div class="breadcrumb breadcrumbs columns"><div class="breadcrumb-trail"><span class="trail-begin"><a href="//demo.templatic.com/classifieds" title="Classifieds" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span> <span class="trail-end">Submit Classified</span></div></div><section id="content" class="large-9 small-12 columns">
	  
	<div class="hfeed">
     				<div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
      			<h1 class='page-title entry-title'>Register</h1>                          <section class="entry-content">
                            
			
				<div id="step-post" class="accordion-navigation step-wrapper step-post">
				<div id="step-auth" class="accordion-navigation step-wrapper step-auth">
						
						<div id="auth" class="step-auth content clearfix">
						<p style="display:none;" class="status"></p>
	<div class="login_submit clearfix" id="loginform">	
	<form action="javascript:void(0);" method="post" enctype="multipart/form-data" id="submit_form">
		<!-- Login Form -->
		<div name="loginform" class="sublog_login"  style="display:block;"   id="login_user_frm_id"  >
      
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Name<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="name" name="name"  />
				<span id="name_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Email<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="email" name="email"  />
				<span id="email_error" class=""></span>
			</div>
			<div class="form_row learfix lab2_cont">
				<label class="lab2">Password<span class="required">*</span> </label>
				<input type="password" class="textfield slog_prop" id="password" name="password" />
				<span id="password_error" class=""></span>
			</div>
			<div class="form_row learfix lab2_cont">
				<label class="lab2">Confirm Password<span class="required">*</span> </label>
				<input type="password" class="textfield slog_prop" id="cpassword"  />
				<span id="cpassword_error" class=""></span>
			</div>
			
			<div class="form_row clearfix">
			<label class=>Gender :<span class="required">*</span></label>
			<div class="form_cat_left">
				<ul class="hr_input_radio">
					<li><input name="gender" checked  type="radio" value="1" checked="checked"   /> <label for="price_type_1">Female</label></li>
					<li><input name="gender" value="0" type="radio"   /> <label for="price_type_2">Male</label></li>
				</ul>
				<span id="gender_error" class=""></span>
			</div>
			</div> 
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Date of birth (dd-mm-yyyy)<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="dob" name="dob"  />
				<span id="dob_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Phone<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="phone" name="phone"  />
				<span id="phone_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Landline<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="landline" name="landline"  />
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
					<option value="<?php echo $v["cn_id"]; ?>" >
					<?php echo $v["cn_name"];  ?>
					</option>
					<?php
					}
					?>
					</select>
				<span id="country_error" class=""></span>
			</div>
			<div class="form_row clearfix">
				<label>Closest Town<span class="required">*</span></label>
				<select name="city" id="city"  class="textfield textfield_x ">
					<option value="0">Select Town</option>
				</select>
				<span id="city_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Image<span class="required">*</span></label>
				<input type="file" class="textfield slog_prop " id="image" name="image"  />
				<span id="image_error" class=""></span>
			</div>
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Company<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="company" name="company"  />
				<span id="company_error" class=""></span>
			</div>
			<div class="form_row clearfix custom_fileds  post_content">
		   
		<label class=>Address<span class="required">*</span></label>
		<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
		<div id="wp-post_content-editor-container" class="wp-editor-container">
		<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" name="address" id="address"></textarea></div>
		<span id="address_error" class=""></span>
		</div>

				     
		 
		</div> 
		
		<div class="form_row clearfix custom_fileds  post_content">
		   
		<label class=>About Me<span class="required">*</span></label>
		<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
		<div id="wp-post_content-editor-container" class="wp-editor-container">
		<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" name="about" id="about"></textarea></div>
		<span id="about_error" class=""></span>
		</div>
		</div>
		
		<div class="form_row clearfix">
			<div class="form_cat_left">
				<ul class="hr_input_radio">
					<li><input  name="terms" value="1" disabled style="margin-top:0px;" type="checkbox" value="fixed" checked="checked"   /> <label for="price_type_1">I am over 18 and have read & accept trade me's terms & condition</label></li>
				</ul>
			</div> 
		</div>

			
		  
			<div class="form_row clearfix">
				<input  type="submit"  value="Register" class="button_green submit" />
			</div>
			
			</div>
		<!-- Login Form End -->
	</form>
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
<?php
include("include_parts/form_side_bar.php");
?>
</div>
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