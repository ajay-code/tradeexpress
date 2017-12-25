<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(!isset($_SESSION["ar_id"])){
?>
<script>
$(document).ready(function() {
$("#login_form").on('submit',(function(e){  
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var email=$("#email").val();
var password=$("#password").val();

$("#email_error").html("");
$("#password_error").html("");

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

	
	$.ajax({
        	url: "ajax_login.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
		    //  alert(r);
			var r=r.split("||");
			if(r[0]==1){
				window.location="index.php";
			}else if(r[0]==2){
				window.location=r[1];
			}else{
				alert("Login Failed !!!");
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
      			<h1 class='page-title entry-title'>Login</h1>  
				<section class="entry-content">
                            
			
				<div id="step-post" class="accordion-navigation step-wrapper step-post">
				<div id="step-auth" class="accordion-navigation step-wrapper step-auth">
						
						<div id="auth" class="step-auth content clearfix">
						<p style="display:none;" class="status"></p>
	<div class="login_submit clearfix" id="loginform">	
	<form action="javascript:void(0);" method="post" id="login_form">
		<!-- Login Form -->
		<div name="loginform" class="sublog_login"  style="display:block;"   id="login_user_frm_id"  >
      
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Email<span class="required">*</span></label>
				<input type="text" class="textfield slog_prop " id="email" name="email" />
				<span id="email_error" class=""></span>
			</div>

			<div class="form_row learfix lab2_cont">
				<label class="lab2">Password<span class="required">*</span> </label>
				<input type="password" class="textfield slog_prop" id="password" name="password" />
				<span id="password_error" class=""></span>
			</div>
		  
			<div class="form_row clearfix">
				<input name="submit_form_login" type="submit" id="submit_form_login" value="Login" class="button_green submit" />
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
<aside class="sidebar large-3 small-12 columns" id="sidebar-primary"><div id="templatic_text-6" class="widget templatic_text">		<div class="textwidget">	


<a href="" target="_blank"><img src="images/classifieds.jpg" alt="Advertisement image" /></a>	</div>
		</div><div id="meta-3" class="widget widget_meta"><h3 class="widget-title">Sponsored Links</h3>			<ul>
						<li><a href="wp-login.html">Log in</a></li>
			<li><a href="index-2.html">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="index-3.html">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>			</ul>
			</div></aside></div>
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
}else{
echo '<script>window.location="index.php";</script>';
}
include_once("include/footer.php");
?>