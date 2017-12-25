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
	
<?php
include("include_parts/admin_contact_form.php");
?>		
			
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