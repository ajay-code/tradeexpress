<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns">
<div class="breadcrumb-trail">
<span class="trail-begin"><a href="index.php" title="Classifieds" rel="home" class="trail-begin">Home</a></span> 
<span class="sep">&raquo;</span> <span class="trail-end">Contact Us</span></div></div>
<section id="content" class="multiple large-9 small-12 columns">
    
  <div class="hfeed">
			<div id="post-167" class="hentry page publish post-1 odd author-templatic  post ">
			               <h1 class="loop-title">Contact Us</h1>
             <!--  <div class="loop-description">
               <p>Contact Us page is listed at Page section in to backend. Different widgets areas for this page are: Contact Page – Main Content and Contact Page Sidebar
Address on Google map can be changed from the Contact Page – Main Content -> T – Google Map Location widet. Similarly, T – Contact Us widget is used to show the form. Captcha can be enabled.
Mail on the Contact Us page is sent to the mail ID provided into WordPress General Settings -> Email field.</p>
               </div> -->
               <!-- .entry-content -->
               		</div>
		<!-- .hentry -->
		<div class="cont_wid_area ">
	<div id="templatic_google_map-1" class="widget googlemap"><div class="widget-wrap widget-inside"><h3 class="widget-title">Find Us On Map</h3>			<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyBnyB9om7iA4NFfz22fkVf0NPEFz6lia0Y"></script>
<script type="text/javascript">
			var geocoder;
			var map;
			var infobox;
			function initialize()
			{
				geocoder = new google.maps.Geocoder();
				var isDraggable = jQuery(document).width() > 480 ? true : false;
				var latlng = new google.maps.LatLng(-34.397, 150.644);
				var myOptions =
				{
					zoom: 17, 
					draggable: isDraggable,
					center: latlng, 
					mapTypeId: google.maps.MapTypeId.ROADMAP				}
				map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
				var styles = [];			
				map.setOptions({styles: styles});
				codeAddress();
			}
			function codeAddress()
			{
			var address = '230 Vine Street And locations throughout Old City, Philadelphia, PA 19106';//document.getElementById("address").value;
			geocoder.geocode(
			{
				'address': address
			}, function(results, status)
			{
			if (status == google.maps.GeocoderStatus.OK)
			{
				map.setCenter(results[0].geometry.location); var marker = new google.maps.Marker(
					{
						map: map, position: results[0].geometry.location,
						icon: 'classifieds/wp-content/themes/Directory/images/contact.png',
					}); //Start
				var boxText = document.createElement("div");
				boxText.innerHTML ='<div class=google-map-info><div class=map-inner-wrapper><div class="map-item-info"><p>230 Vine Street And locations throughout Old City, Philadelphia, PA 19106</p></div><div class=map-arrow></div></div></div>';
				var myinfoOptions =
				{
				content: boxText,disableAutoPan: false,maxWidth: 0 ,pixelOffset: new google.maps.Size(-118, -175) ,zIndex: null ,boxStyle:
				{
					opacity: 1 ,width: "240px",
					background:'white',
				},closeBoxURL: "//www.google.com/intl/en_us/mapfiles/close.gif"
				,infoBoxClearance: new google.maps.Size(1, 1)
				,isHidden: false
				,pane: "floatPane"
				,enableEventPropagation: false
				};
				infobox = new InfoBox(myinfoOptions);
				infobox.open(map, marker);
				
				google.maps.event.addListener(marker, 'click', function() {
					infobox.open(map, marker);
				});
				infobox.open(map, marker);
				
				//End
			} else
			{
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
</script>
		<div class="wid_gmap graybox">
		<div id="map-canvas" style="height:400px; "> </div>
		</div>
		</div>
	</div>
	
	
<script>
function contact_admin(){
	//alert("sidd");
	var path='<?php echo basename($_SERVER["REQUEST_URI"]);  ?>';  	
	$.post(
	'check_login.php',
	{path:path},
	function (r){
	if(r==1){
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var name=$("#your_name").val().trim();
	var email=$("#your_email").val().trim();
	var subject=$("#your_subject").val().trim();
	var message=$("#your_message").val().trim();	
	
	if(name==""){
	required_alert('Name Required.. !!!','bottom-right','warning');
	blank_focus('your_name');
	return false;
	}
	
	if(email==""){
	required_alert('Email Required.. !!!','bottom-right','warning');
	blank_focus('your_email');
	return false;
	}
	if(!regex.test(email)){
    required_alert('Email Invalid.. !!!','bottom-right','warning');
	blank_focus('your_email');
     return false;
    }
	if(subject==""){
	required_alert('Subject Required.. !!!','bottom-right','warning');
	blank_focus('your_subject');
	return false;
	}
	
	if(message==""){
	required_alert('Message Required.. !!!','bottom-right','warning');
	blank_focus('your_message');
	return false;
	}
	
		$.post(
		'ajax_admin_contact.php',
		{name:name,email:email,subject:subject,message:message},
		function(r){	
		if(r==1){
		required_alert('Mail sent successfully..','bottom-right','warning');
		blank_focus('your_name');
		blank_focus('your_email');
		blank_focus('your_subject');
		blank_focus('your_message');
		}else{
		required_alert('Something went wrong!!!','bottom-right','warning');
		}	
		}
		);
		
		}else{
		window.location="login.php";
		}
	}
	);
}

</script>	
		<div id="supreme_contact_widget-1" class="widget contact_us"><div class="widget-wrap widget-inside">			<div class="widget contact_widget" id="contact_widget">
			<h3 class="widget-title">Contact Us</h3>			
			
		<form action="javascript:void(0);" method="post" id="contact_widget_frm" name="contact_frm" class="wpcf7-form">
			<div class="form_row ">
				  <input type="text" name="your_name" id="your_name" value="" class="textfield" size="40" placeholder="Name*" />
			</div>
			<div class="form_row ">
				  <input type="text" name="your_email" id="your_email" value="" class="textfield" size="40" placeholder="Email*"/>
			</div>
			<div class="form_row ">
				  <input type="text" name="your_subject" id="your_subject" value="" size="40" class="textfield" placeholder="Subject*"/>
			</div>
			<div class="form_row clearfix">
				  <textarea name="your_message" id="your_message" cols="40" class="textarea textarea2" rows="10" placeholder="Message"></textarea>
			</div>
				<div class="clearfix">
				  							<div  id="contact_recaptcha_div"></div>
							<script>
								var onloadCallback = function() {
									if(jQuery('#contact_recaptcha_div').length > 0){
										grecaptcha.render('contact_recaptcha_div', {
											'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
											'theme' : 'standard'
										});
									}
								}	
							</script>
							
				<input type="submit" value="Send" onclick="contact_admin();" class="b_submit" />
				</div>
			</form>
			</div>
			</div>
		</div>
			
			
			
			
			</div>
    <script type="text/javascript">
			 var RecaptchaOptions = {
				theme : '',
				lang : ''
			 };
	</script>
    
       
      </div>
    <!--  CONTENT AREA END -->
</section>
<aside id="sidebar-primary" class="sidebar large-3 small-12 columns"> 
<div id="tmplclassifiedsellerdetails-1" class="widget tmpl_classified_seller">
<?php
include("include_parts/admin_social_media_link.php");
include("include_parts/admin_contact.php");
?>
</div>
</aside>
	<!-- #sidebar-widgets-template -->
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
include_once("include/footer_main.php");
?>
<!-- #footer -->
</div>
			
		
	<!-- Login form -->
	<div id="tmpl_reg_login_container" class="reveal-modal tmpl_login_frm_data" data-reveal>
		<a href="javascript:;" class="modal_close"></a>
		<div id="tmpl_login_frm" > 
			<div class="login_form_l"><h3>Sign In</h3>			<div class="login_form_box">
			
            					<form name="popup_login" id="popup_login" action="classifieds/contact-us/" method="post" >
                <p style="text-align: center;color: red;">This socials login not configured for this demo site.</p>					<input type="hidden" name="action" value="login" />                         
					<div class="form_row clearfix">
						<label>Username <span class="indicates">*</span> </label>
						<input type="text" name="log" id="user_login" value="" size="20" class="textfield" />
						<span id="user_loginInfo"></span> 
					</div>
					
					<div class="form_row clearfix">
						<label> Password <span class="indicates">*</span> </label>
						<input type="password" name="pwd" id="user_pass" class="textfield" value="" size="20"  />
						<span id="user_passInfo"></span> 
					</div>
					<input type="hidden" name="redirect_to" value="index.html" />
					<input type="hidden" name="testcookie" value="1" />
					<div class="form_row rember clearfix">
					<label>
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="fl" />
						Remember me on this computer 
					</label>	
					
					 <!-- html to show social login -->
                    <a onclick="showhide_forgetpw('popup_login');" href="javascript:void(0)" class="lw_fpw_lnk">Forgot your password?</a> 
				    </div>
				 	
					<div class="form_row ">
				    <input class="b_signin_n" type="submit" value="Sign In"  name="submit" />		
					<p class="forgot_link">
								
					</p>
				    </div> 
					
					 
							
				</form>
								
					
	<div  class='forgotpassword' id="lostpassword_form" style="display:none;" >
	<h3>Forgot password</h3>
	<form name="popup_login_forgot_pass" id="popup_login_forgot_pass" action="classifieds/contact-us/" method="post" >
			<input type="hidden" name="action" value="lostpassword" />
		<div class="form_row clearfix">
		<label> Email: </label>
		<input type="text" name="user_login" id="user_login_email"  value="" size="20" class="textfield" />
			 <span id="forget_user_email_error" class="message_error2"></span>
				</div>
		<input type="hidden" name="pwdredirect_to" value="index.html" />
		<input type="submit" name="get_new_password" onclick="return forget_email_validate('popup_login_forgot_pass');" value="Get New Password" class="b_signin_n " />
	</form>
	</div>
   
			</div>
			<!-- Enable social media(gigya plugin) if activated-->         
						<!--End of plugin code-->
			
		</div>		</div>
		
				
	</div>
	
				<script type="text/javascript">
					var $mgc = jQuery.noConflict();
						$mgc(document).ready(function() {
							$mgc('#dc_jqmegamenu_widget-2-item .mega').dcMegaMenu({
								rowItems: 3,
								subMenuWidth: '',
								speed: 'normal',
								effect: 'fade',
								event: 'hover'
															});
						});
						
				</script>
				
					<link rel='stylesheet' id='jQuery_datepicker_css-css'  href='images/jquery.ui.all.min.css' type='text/css' media='all' />
<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/classifieds\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/classifieds\/contact-us\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='images/_supreme.min.js'></script>
<script type='text/javascript' src='images/wp-embed.min.js'></script>
<script type='text/javascript' src='images/position.min.js'></script>
<script type='text/javascript' src='images/menu.min.js'></script>
<script type='text/javascript' src='images/wp-a11y.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var uiAutocompleteL10n = {"noResults":"No results found.","oneResult":"1 result found. Use up and down arrow keys to navigate.","manyResults":"%d results found. Use up and down arrow keys to navigate.","itemSelected":"Item selected."};
/* ]]> */
</script>
<script type='text/javascript' src='images/autocomplete.min.js'></script>
<script type='text/javascript' src='images/tevolution-script.min.js'></script>
<script type='text/javascript' src='images/infobox.js'></script>
<script type='text/javascript' src='images/bootstrap-mini.js'></script>
       
       		<script id="tmpl-foundation" src="images/foundation.min.js"> </script>
	
		

<style type="text/css">
.by_this_theme_fix {display: none;}
@media only screen and (min-width: 1024px) {
 .by_this_theme_fix {background-color: #4DC46F;color:#fff;position: fixed;bottom: 80px;right: 80px;z-index: 99999;display: inline-block;text-align:center;border-radius: 3px%;-webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -webkit-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -moz-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);font-size:20px;font-weight:bold;transition: all 1s ease;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-o-transition: all 1s ease;animation-name:animFadeUp; animation-fill-mode: both; animation-duration: 0.4s;animation-timing-function: ease;animation-delay: 1.5s; -webkit-animation-name: animFadeUp; -webkit-animation-fill-mode: both; -webkit-animation-duration: 0.4s;-webkit-animation-timing-function: ease;-webkit-animation-delay: 1.5s; -moz-animation-name: animFadeUp;-moz-animation-fill-mode: both; -moz-animation-duration: 0.4s;-moz-animation-timing-function: ease; -moz-animation-delay: 1.5s; -o-animation-name: animFadeUp;-o-animation-fill-mode: both;-o-animation-duration: 0.4s;-o-animation-timing-function: ease;-o-animation-delay: 1.5s; padding:8px 25px}
 .by_this_theme_fix span{font-size:16px; vertical-align: middle;}
 .by_this_theme_fix:hover{background-color:#58da7d; color:#fff;}
</style></body>
</html>
<!-- Dynamic page generated in 0.702 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-05-08 15:05:50 -->

<!-- super cache -->