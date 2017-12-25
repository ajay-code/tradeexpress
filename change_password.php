<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<script>
  var loadFile = function (event) {
  	var output = document.getElementById('output');
  	output.src = URL.createObjectURL(event.target.files[0]);
  };

  $(document).ready(function () {
  	$("#submit_form").on('submit', (function (e) {
  		var oldPassword = $("#old_password").val();
  		var password = $("#password").val();
  		var confirm_password = $("#confirm_password").val();

  		$("#old_password").html("");
  		$("#password").html("");
  		$("#confirm_password").html("");

  		if (oldPassword.trim() == "") {
  			$("#old_password_error").html("Required");
  			$("#old_password").focus();
  			return false;
  		}
  		if (password.trim() == "") {
  			$("#password_error").html("Required");
  			$("#password").focus();
  			return false;
  		}
  		if (confirm_password.trim() == "") {
  			$("#confirm_password_error").html("Required");
  			$("#confirm_password").focus();
  			return false;
  		}

  		$.ajax({
  			url: "ajax_change_password.php",
  			type: "POST",
  			data: new FormData(this),
  			contentType: false,
  			cache: false,
  			processData: false,
  			success: function (r) {
  				console.log(r);
  				if (r == 'success') {
  					alert("Update Successfull");
  					window.location.reload();
  				} else if(r == 'wrong password') {
  					alert("Enter Correct Password");
  				}else if(r == 'password did not match'){
  					alert("Password Did Not match");
				}else{
  					alert("Something Whent Wrong");
			  }
  			},
  			error: function () {}
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
			<h1 class='page-title entry-title'>Update Profile</h1>
			<section class="entry-content">

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
	<form action="javascript:void(0);" method="post" enctype="multipart/form-data" id="submit_form" autocomplete="off" >
		<!-- Login Form -->
		<div name="loginform" class="sublog_login" style="display:block;" id="login_user_frm_id">
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Current Password
					<span class="required">*</span>
				</label>
				<input type="password" class="textfield slog_prop " id="old_password" name="old_password" />
				<span id="old_password_error" class=""></span>
			</div>

			<div class="form_row clearfix lab2_cont">
				<label class="lab2">New Password
					<span class="required">*</span>
				</label>
				<input type="password" class="textfield slog_prop " id="password" name="password" />
				<span id="password_error" class=""></span>
			</div>

			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Confirm Password
					<span class="required">*</span>
				</label>
				<input type="password" class="textfield slog_prop " id="confirm_password" name="confirm_password" />
				<span id="confirm_password_error" class=""></span>
			</div>
		</div>

		<div class="form_row clearfix">
			<input type="submit" value="Change" class="button_green submit" />
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