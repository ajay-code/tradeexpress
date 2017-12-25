<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->  
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->  
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->  
<!--[if IE 9 ]>    <html class="ie9"> <![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-US"> <!--<![endif]--> 
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta name='robots' content='noindex,follow' />
<meta name="copyright" content="Copyright (c) 2017" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Specially to make clustering work in IE -->
<?php 
$CurrentPage = basename($_SERVER['PHP_SELF']);
if(  $CurrentPage == 'property_details.php'){
$PostID = trim($_GET["id"]);
$select="ap_id,uploader,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,posting_date,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,smoke_alarm,agency_reference,Posting_status,classified_status,status, contact_type, name, agent_email, mobile, website_address, name2, email_address2, agency, landline, landline2, mobile2, logo,view_counter";
$from="add_property";

$PHPSELF = $_SERVER['PHP_SELF'];
$condition=array("ap_id"=>$PostID);
$property_detls=getDetails(doSelect1($select,$from,$condition));
$property_detls=trimmer_db_array($property_detls);
$ShareablePropertyTitle =  getPropertyTitle(trim($PostID )); 	
$ShareablePropertyDescription	 = $ShareablePropertyTitle;
foreach($property_detls as $k=>$v){
	$ShareablePropertyDescription =  $v["prop_desc"];
	$ImageCounter = 1;
	$listing_img = '';
	$property_image=getDetails(doSelect("image","add_property_photo",array("ap_id"=>$v["ap_id"],"status"=>1)));
	foreach($property_image as $k2=>$v2){
		if($ImageCounter == 1 ){
			 $listing_img = 'https://www.tradeexpress.co.nz/property_image/'.$v2["image"];
		}
		break;
	}
}
?>
<?php /*?><script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '765634260299795',
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
  };

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script><?php */?>

  <title><?php echo $ShareablePropertyTitle; ?>-<?php echo $ShareablePropertyDescription ; ?></title>
  <meta property="fb:app_id" content="765634260299795"/>
  <meta property="og:url"         content="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" />
  <meta property="og:type"        content="website" />
  <meta property="og:title"       content="<?php echo $ShareablePropertyTitle; ?>" />
  <meta property="og:description" content="<?php echo $ShareablePropertyDescription ; ?>" />
  <meta property="og:image"    content="<?php echo  $listing_img; ?>" />
   <meta property="og:image:alt"    content="<?php echo $ShareablePropertyTitle; ?>" />
  <meta name="title" content="<?php echo $ShareablePropertyTitle; ?>" />
  <meta name="description" content="<?php echo $ShareablePropertyDescription ; ?>" />
  
<?php /*?><link rel="image_src" href="<?php echo  $listing_img; ?>" /><?php */?>
  	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="https://www.tradeexpress.co.nz/">
	<meta name="twitter:title" content="<?php echo $ShareablePropertyTitle?>">
	<meta name="twitter:description" content="<?php echo $ShareablePropertyDescription?>">
	<meta name="twitter:image" content="<?php echo $listing_img?>">
	<meta name="twitter:domain" content="https://www.tradeexpress.co.nz">
 <?php } else{?>
<title><?php echo get_site_settings(14); ?></title>
<meta name="description" content="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them." />
<?php } ?>
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="images/xmlrpc.php" />

	<script>
		var closeimg = 'http://maps.gstatic.com/images/close.gif';
		/* image for clustering. used this variable at js for clustering image */
		var styles = [{
			url: 'images/cluster.png',
			height: 50,
			width: 50,
			anchor: [-18, 0],
			textColor: '#000',
			textSize: 10,
			iconAnchor: [15, 48]}];
	</script>
<link rel='dns-prefetch' href='//maps.googleapis.com/' />
<link rel='dns-prefetch' href='//code.jquery.com/' />
<link rel='dns-prefetch' href='//_maxcdn.bootstrapcdn.com/' />
<link rel='dns-prefetch' href='//ajax.googleapis.com/' />
<link rel='dns-prefetch' href='//s.w.org/' />
<link rel="alternate" type="application/rss+xml" title="Classifieds &raquo; Feed" href="index-2.html" />
<link rel="alternate" type="application/rss+xml" title="Classifieds &raquo; Comments Feed" href="index-3.html" />

	<script type="text/javascript" async>
		var loading = 'Loading...';
		var ajaxUrl = "admin-ajax.html";
		var default_city_text = 'Default City';
	</script>
	<link rel="alternate" type="application/rss+xml" title="Classifieds &raquo; Mobiles &amp; Tablets classifiedscategory Feed" href="index-150.html" />
<link rel='stylesheet' id='tevolution_style-css'  href='images/css.minifier.css' type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href='images/megamenu_style.css' type='text/css' media='all' />
<link rel='stylesheet' id='shortcodes-css'  href='images/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='fontawesomecss-css'  href='images/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-ui-style-css'  href='images/jquery-ui.css' type='text/css' media='all' />
<link rel='stylesheet' id='wc-bookings-styles-css'  href='images/frontend.css' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-layout-css'  href='images/woocommerce-layout.css' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='images/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel='stylesheet' id='woocommerce-general-css'  href='images/woocommerce.css' type='text/css' media='all' />
<link rel='stylesheet' id='templatic-directory-css-css'  href='images/style-2.css' type='text/css' media='all' />
<link rel='stylesheet' id='templatic-admin-css-css'  href='images/admin_style.css' type='text/css' media='all' />
<link href="images/carousel.css" type="text/css" rel="stylesheet" media="all"><!-- carousel css -->  
<link href="images/slider.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="https://bulafaces.com/css/responsiveslides.css">
<link rel="stylesheet" href="images/toastr.min.css">

<link rel='stylesheet' id='directory-css-css'  href='images/style-3.css' type='text/css' media='all' />
<link rel='stylesheet' id='tmp-responsive-css'  href='images/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' id='tmpl_dir_css-css'  href='images/style-4.css' type='text/css' media='all' />
<link rel='stylesheet' id='tmpl_childtheme_view-css'  href='images/theme-style.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="images/custom.css">

<script type='text/javascript' src='images/jquery-2.2.4.min.js'></script>
<script type='text/javascript' src='images/jquery-2.2.4.min.js'></script>
<script type='text/javascript' src='https://bulafaces.com/css/responsiveslides.min.js'></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='images/jquery-migrate.min.js'></script>
<script type='text/javascript' src='images/jquery.megamenu.1.2-mini.js'></script>
<!--script type='text/javascript' src='//maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places&amp;key=AIzaSyBnyB9om7iA4NFfz22fkVf0NPEFz6lia0Y&amp;ver=4.7.4'></script-->
<script type='text/javascript' src='images/markermanager.js'></script>
<script type='text/javascript' src='images/location_script.min.js'></script>
<?php /*?><script type='text/javascript' src='../../code.jquery.com/images/jquery-ui.js'></script><?php */?>
<script type='text/javascript' src='http://www.tradeexpress.co.nz/images/jquery-ui.js'></script>
<!-- <link href="images/style.css" rel="stylesheet" type="text/css">
<link href="images/dropzone.css" rel="stylesheet" type="text/css">
<script src="images/dropzone.js" type="text/javascript"></script> -->
<link rel='//api.w.org/' href='index-5.html' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="images/xmlrpc0db0.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="images/wlwmanifest.xml" /> 

		<script type="text/javascript">
		   var onloadCallback = function() {
			/* Renders the HTML element with id 'example1' as a reCAPTCHA widget.*/
			/* The id of the reCAPTCHA widget is assigned to 'widgetId1'.*/
		   									if(jQuery('#comment_captcha').length > 0){
				grecaptcha.render('comment_captcha', {
					'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
					'theme' : 'standard'
				});
			}
			
			if(jQuery('#contact_recaptcha_div').length > 0){
				grecaptcha.render('contact_recaptcha_div', {
					'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
					'theme' : 'standard'
				});
			}
			if(jQuery('#popup_register_register_cap').length > 0){
				grecaptcha.render('popup_register_register_cap', {
					'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
					'theme' : 'standard'
				});
			}
			if(jQuery('#register_login_widget_register_cap').length > 0){
				grecaptcha.render('register_login_widget_register_cap', {
					'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
					'theme' : 'standard'
				});
			}
			if(jQuery('#userform_register_cap').length > 0){
				grecaptcha.render('userform_register_cap', {
					'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
					'theme' : 'standard'
				});
			}
			
						
									if(jQuery('#captcha_div').length > 0){
			grecaptcha.render('captcha_div', {
				'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
				'theme' : 'standard'
			});
			}
					  };
		</script>
		<script src="http://www.google.com/apif977.js?onload=onloadCallback&amp;render=explicit&amp;hl=en"></script>
			
	<script  type="text/javascript" async >
		var ajaxUrl = "admin-ajax.html";
		var tevolutionajaxUrl = "tevolution-ajax.html";
		var upload_single_title = "Upload Image"; 
		var RecaptchaOptions = { theme : '', lang : '', tabindex :'' };
				var current_user="0";
		var favourites_sort="";
				/*check wether payment gateway validattion is statisfied or not*/
		var validate_gateway = true;
		var user_email_error ="Email address already exists, Please enter another email";
		var user_email_verified="The email address is correctly entered.";
		var user_fname_error="The username you entered already exists, please try a different one";
		var user_login_link =" or <a href='index-6.html'>Sign in</a>";
		var user_fname_verified="This username is available.";
		var user_name_verified='';
		var user_name_error="Incorrect username";
		var submit_form_error="Please Login before you submit a form.";
		
		var TWEET="Tweet";
		var FB_LIKE="Share";
		var PINT_REST="Pin";
		
    </script>
        <script>
		var currency = '$';
		var position = '1';
		var num_decimals    = '2';
		var decimal_sep     = '.';
		var thousands_sep   = ',';
	</script>
    						<?php /*?><meta property="og:image" content="classifieds/wp-content/uploads/bulk/mobile-tablets(1).jpg" />
											<meta name="twitter:image" content="classifieds/wp-content/uploads/bulk/mobile-tablets(1).jpg" /><?php */?>
					<link rel="stylesheet" href="images/admin_style.css" type="text/css" media="all" />
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE]>
<style>
    body{word-wrap:inherit!important;}
</style>
<![endif]-->
<script type="text/javascript">
  jQuery( document ).ready(function() {
    if(jQuery( window ).width() < 980 ){
      jQuery('.preview_submit_from_data .b_getdirection.getdir').html("<i class='fa fa-map-marker'></i>");
      jQuery('.preview_submit_from_data .b_getdirection.large_map').html("<i class='fa fa-retweet'></i>");
    }
    jQuery( window ).resize(function() {
      if(jQuery( window ).width() < 980 ){
        jQuery('.preview_submit_from_data .b_getdirection.getdir').html("<i class='fa fa-map-marker'></i>");
        jQuery('.preview_submit_from_data .b_getdirection.large_map').html("<i class='fa fa-retweet'></i>");
      }
    });

    jQuery( 'body .header_container .header-wrap .header-widget-wrap #sidebar-header form input[type="submit"]' ).after('<span class="search-icon"><i class="fa fa-search"></i></span>');

    // jQuery('.category_list').addClass('without-icon');
    // jQuery('.category_list h3 a').find('i,img').parent().parent().parent().removeClass('without-icon');

  });
</script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.css">
    
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
</head>


<?php
$file=explode("?",basename($_SERVER["REQUEST_URI"]))[0];
$file_array=array("property_details.php","general_item_details.php","car_details.php","job_details.php");
if(!in_array($file,$file_array)){
?>
<body class="wordpress  en_US child-theme y2017 m05 d08 h14 monday logged-out home singular singular-page singular-page-168 page-template-templates/front-page layout-default   location_manager"> 
<?php
}else{
?>
<body class="wordpress  en_US child-theme y2017 m05 d08 h15 monday logged-out singular singular-classified singular-classified-424 layout-default  singular-classified location_manager">
<?php
}
?>
<div class="supreme_wrapper">
<div class="off-canvas-wrap" data-offcanvas> <!-- off-canvas-wrap start -->
	<!-- inner-wrap start -->
	<div class="inner-wrap">
	
	<!-- Navigation  - Contain logo and site title -->
    <nav class="tab-bar hide-for-large-up">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a> <!-- off canvas icon -->
      </section>
          <section class="middle tab-bar-section">
       			<a href="index.php" title="Classifieds" rel="Home">
				<img class="logo" src="images/<?php echo get_site_settings(17);  ?>" alt="Classifieds" />
			</a>
		 
      </section>
    </nav>

    <aside class="left-off-canvas-menu"> <!-- off canvas side menu -->
    	<!-- Primary Navigation Menu Start -->
	<div id="menu-mobi-primary" class="menu-container">
	  <nav role="navigation" class="wrap">
		<div id="menu-mobi-primary-title">
		  Menu		</div>
		<!-- #menu-primary-title -->
		<div class="menu"><ul id="menu-mobi-primary-items" class="primary_menu clearfix"><li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-168 current_page_item menu-item-199"><a href="index.php">Home</a></li>
<li id="menu-item-20026" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20026"><a href="watchlist.php">Watchlist</a></li>
<?php
if(!isset($_SESSION["ar_id"])){
?><li id="menu-item-2130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2130"><a href="register.php">Register</a></li>
<li class="tmpl-login" ><a  href="login.php" >Login</a></li>
<?php
}else{
?>
<li class="tmpl-login" ><a  href="javascript:void(0);" ><?php echo 'Hi, '.getCusName($_SESSION["ar_id"]);  ?></a>
<ul class="sub-menu" style="color: #0B0A0A;">
	
	<li class="menu-item "><a href="profile_details.php">My Profile</a></li>
	<li class="menu-item "><a href="edit_profile.php">Edit Profile</a></li>
	<li class="menu-item "><a href="add_social_account.php">Add social media Account</a></li>
	<li class="menu-item "><a href="my_balance.php">My Balance</a></li>
	<li class="menu-item "><a href="javascript:void(0);" onClick="logout();" >Logout</a></li>
	
	</ul>
</li>
<?php
}
?>
</ul></div>	  </nav>
	</div>
	<!-- #menu-primary .menu-container -->
<!-- Primary Navigation Menu End -->
<div id="nav" class="nav_bg" >
			  <div id="menu-mobi-secondary" class="menu-container">
				<nav role="navigation" class="wrap">
				  <div id="menu-mobi-secondary-title">Menu</div>			<div class="mega-menu nav-secondary columns" id="dc_jqmegamenu_widget-2-item">
        		<div id="menu_secondary_mega_menu" class="mega_menu_wrap ">
					<div id="menu-secondary-title" class="currentmenu3 currentmenu2">
						Menu					</div>					
					<div class="nav_bg" style="position: inherit;">
						<ul id="menu-secondary" class="mega"><li id="menu-item-203" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-203"><a href="index.php">Home</a></li>
<li id="menu-item-204" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor menu-item-has-children menu-item-204"><a href="javascript:void(0);">Browse</a>
<ul class="sub-menu">


<li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="general_item_listing.php">General Items</a>
	<ul class="sub-menu">
	<?php
			$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 3'));
			foreach($category as $k=>$v){
	?>
		<li id="menu-item-20074" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20074"><a href="general_item_listing.php?category=<?php echo $v["gic_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
</li>

<li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="property_listing.php">Property</a>
	
	<ul class="sub-menu">
	<?php
		$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 3'));
		foreach($category as $k=>$v){
	?>
		<li id="menu-item-20074" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20074"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
</li>

<li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="job_listing.php">Job</a>
	
	<ul class="sub-menu">
	<?php
			$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 3'));
			foreach($category as $k=>$v){
	?>
		<li id="menu-item-20074" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20074"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
</li>

<li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="car_listing.php">Car, Motorbikes & Boats</a>
	
	<ul class="sub-menu">
	<?php
			$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 3'));
			foreach($category as $k=>$v){
	?>
		<li id="menu-item-20074" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20074"><a href="car_listing.php?category=<?php echo $v["cc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
</li>
	
</ul>
</li>
<li id="menu-item-221" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-221"><a href="javascript:void(0);">Sell</a>
<ul class="sub-menu">
<li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="general_item_post.php">General Items</a>
</li><li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="property_post.php">Property</a>
</li><li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="job_post.php">Job</a>
</li><li id="menu-item-20071" class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="car_post.php">Car, Motorbikes & Boats</a>
</li>
</ul>
</li>
<li id="menu-item-20081" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20081"><a href="vendor_listing.php">My Trade Express</a></li>
<li id="menu-item-1706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1706"><a href="register.php">Register</a></li>
<li id="menu-item-215" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-215"><a href="about_us.php">About Us</a></li>
<li id="menu-item-1732" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1732"><a href="contact_us.php">Contact Us</a></li>

</ul>						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			</nav></div></div>    </aside>

<div id="container" class="container-wrap">
<header class="header_container clearfix">

    <div class="primary_menu_wrapper clearfix">
      <div class="primary_menu_wrap row">
          	<div class="location_fld_wrapper">
		<!-- City name link -->
	
			<div id="directory_location_navigation" class="d_location_type_navigation clearfix" >
			<div id="location_navigation_wrap">
				<div id="horizontal_header_location" class="d_location_navigation_left"></div>
				<div id="location_loading" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></div>
			</div>
		</div>
			</div>
	                  <!-- Primary Navigation Menu Start -->
        <div id="menu-primary" class="menu-container">
            <nav role="navigation" class="wrap">
                <div id="menu-primary-title">
        Menu                </div>
                <!-- #menu-primary-title -->
        <div class="menu"><ul id="menu-primary-items" class="primary_menu clearfix"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-168 current_page_item menu-item-199"><a href="index.php">Home</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20026"><a href="watchlist.php">Watchlist</a></li>
<?php
if(!isset($_SESSION["ar_id"])){
?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2130"><a href="register.php">Register</a></li>
<li class="tmpl-login" ><a  href="login.php"  >Login</a>
</li>
<?php
}else{
?>
<li class="tmpl-login" ><a  href="javascript:void(0);" ><?php echo 'Hi, '.getCusName($_SESSION["ar_id"]);  ?></a>
<ul class="sub-menu" style="color: #0B0A0A;">
	
	<li class="menu-item "><a href="profile_details.php">My Profile</a></li>
	<li class="menu-item "><a href="edit_profile.php">Edit Profile</a></li>
	<li class="menu-item "><a href="add_social_account.php">Add social media Account</a></li>
	<li class="menu-item "><a href="my_balance.php">My Balance</a></li>
	<li class="menu-item "><a href="javascript:void(0);" onClick="logout();" >Logout</a></li>
	
	</ul>
</li>
<?php
}
?>
</ul></div>            </nav>
        </div>
        <!-- #menu-primary .menu-container -->
        <!-- Primary Navigation Menu End -->
              </div>
    </div>
         <div id="header" class="row clearfix">
                <div class="header-wrap">
              
				                    <div id="branding" class="logo">
                        <hgroup>
                                                <div id="site-title">
                            <a href="index.php" title="Classifieds" rel="Home">
                            	<img class="logo" src="images/<?php echo get_site_settings(17);  ?>" alt="Classifieds" />
                       		</a>
                        </div>
                                                </hgroup>
                    </div>
                    <!-- #branding -->
                                <div class="header-sidebar large-8 columns">
                    
                    <div class="header-widget-wrap">
						            	<!-- #sidebar-header right start -->
		<aside id="sidebar-header" class="sidebar">
	  <div id="templatic_text-2" class="widget templatic_text"><div class="widget-wrap widget-inside">		<div class="textwidget">	<a class="button post-free-classifieds-btn" href="javascript:void(0);" onClick="post_item();">+ Post an ad</a>	</div>
		</div></div>	</aside>
	<!-- #sidebar-header right end -->
	                    </div>

                </div> <!-- large-8 columns -->
              
          </div>
          <!-- .wrap -->
          			<div class="mega-menu nav-secondary columns" id="dc_jqmegamenu_widget-2-item">
        		<div id="menu_secondary_mega_menu" class="mega_menu_wrap ">
					<div id="menu-secondary-title" class="currentmenu3 currentmenu2">
						Menu					</div>					
					<div class="nav_bg" style="position: inherit;">
<style>
.select-wrap span.select{ position:absolute; right:0; top:0; background: #fff; border:1px solid rgba(0,0,0,0.2); padding:5px 12px; max-width:370px; width:200px; cursor:pointer; min-height: 35px; max-height:35px; overflow: hidden;}
.search_d
{
    position: absolute;!important
    z-index: 9999;!important
    top: 10px;!important
	width:200px;!important
    right: 0px;!important
	float:right;!important
    border: 1px solid red;!important
}
</style>
<?php
include("include_parts/search_bar.php");

?>
					
					
					
						<ul id="menu-secondary-1" class="mega">
<li class="menu-item menu-item-type-post_type current-menu-item menu-item-object-page menu-item-home menu-item-203"><a href="index.php">Home</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-204"><a href="javascript:void(0);">Browse</a>
<!-- current-menu-ancestor -->
<ul class="sub-menu">
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="general_item_listing.php">General Item</a>
	<ul class="sub-menu">
	<?php
	$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 8'));
	foreach($category as $k=>$v){
	?>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="general_item_listing.php?category=<?php echo $v["gic_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
	</li>
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="property_listing.php">Property</a>
	<ul class="sub-menu">
	<?php
						$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 8'));
						foreach($category as $k=>$v){
	?>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
	</li>
	
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="job_listing.php">Job</a>
	<ul class="sub-menu">
	<?php
	$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 8'));
	foreach($category as $k=>$v){
	?>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
	</li>
	
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="car_listing.php">Car, Motorbikes & Boats</a>
	<ul class="sub-menu">
	<?php
	$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 8'));
	foreach($category as $k=>$v){
	?>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="car_listing.php?category=<?php echo $v["cc_id"]; ?>"><?php echo $v["category"]; ?></a></li>
	<?php
	}
	?>
	</ul>
	</li>
	
</ul>
</li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-221"><a href="javascript:void(0);">Sell</a>
<ul class="sub-menu">
<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="general_item_post.php">General Item</a>
<?php
/*if(show_price_listingDb('general_item') !=""){
echo '<font style="color: #313189;">'.show_price_listingDb('general_item').'</font>';
}*/
?>
</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="property_post.php">Property</a>
<?php
/*if(show_price_listingDb('property') !=""){
echo '<font style="color: #313189;">'.show_price_listingDb('property').'</font>';
}*/
?>
</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="job_post.php">Job</a>
<?php
/*if(show_price_listingDb('job') !=""){
echo '<font style="color: #313189;">'.show_price_listingDb('job').'</font>';
}*/
?>
</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="car_post.php">Car, Motobikes & Boats</a>
<?php
/*if(show_price_listingDb('car') !=""){
echo '<font style="color: #313189;">'.show_price_listingDb('car').'</font>';
}*/
?>
</li>
</ul>	
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-204"><a href="javascript:void(0);">My Trade Express</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="#">BUYING</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="watchlist.php">Watchlist</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="offers.php">Offers</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="won_item.php">Won</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="lost_item.php">Lost</a></li>

	</ul>
	</li>
	<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-has-children menu-item-20071"><a href="#">SELLING</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="javascript:void(0);" onClick="profile_details();">Items I’m Selling</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="sold_item.php">Sold</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="unsold_item.php">Unsold</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-classifiedscategory menu-item-20072"><a href="javascript:void(0);" onClick="profile_details();" >My Products</a></li>
		
	</ul>
	</li>
	
	</li>
</ul>
</li>
</ul>						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			     </div>
    <!-- #header -->

</header>

<script>

function fetch_city(get_id,put_id){
		var cn_id=document.getElementById(get_id).value;
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				$("#"+put_id).html(response);
			}
		});
	}
function fetch_region(get_id,put_id){
		var ct_id=$("#"+get_id).val();
		$.ajax({
			url:'fetch_city.php?region_ct_id='+ct_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#"+put_id).html(response);
			}
		});
	}
function logout(){
	$.post(
	'ajax_logout.php',
	{},
	function(r){
		if(r==1){
		window.location="index.php";
		}
	}
	);
}

function add2watch_general_item(item_id,db,id='watch_span'){
	$.post(
	'ajax_watch_general_item.php?msg=listing',
	{item_id:item_id,db:db,id:id},
	function(r){
		//alert(r);
	var r=r.split("||");
	if(r[0].trim()==1){
	required_alert('Added successfully','top-right','warning');	
	$("#"+id).html(r[1]);
	}else if(r[0].trim()==2){
	required_alert('remove successfully','top-right','warning');	
	$("#"+id).html(r[1]);
	}else if(r[0].trim()=='404'){
	required_alert('You have to login first...click here to <a href="login.php"><font color="yellow"> Login </font></a>','top-right','error','0');	
	}else{
	required_alert('Something went wrong','top-right','error');	
	}	
	}
	);
}

function add2watch_details_page(item_id,db,id='watch_span'){
	$.post(
	'ajax_watch_general_item.php?msg=details',
	{item_id:item_id,db:db,id:id},
	function(r){
		//alert(r);
	var r=r.split("||");
	if(r[0].trim()==1){
	required_alert('Added successfully','top-right','warning');	
	$("#"+id).html(r[1]);
	}else if(r[0].trim()==2){
	required_alert('remove successfully','top-right','warning');	
	$("#"+id).html(r[1]);
	}else if(r[0].trim()=='404'){
	required_alert('You have to login first...click here to <a href="login.php"><font color="yellow"> Login </font></a>','top-right','error','0');	
	}else{
	required_alert('Something went wrong','top-right','error');	
	}	
	}
	);
}

function update_general_item(agi_id){
	$.post(
	'ajax_update_general_item.php',
	{agi_id:agi_id},
	function(r){
	$("#update_ajax").html(r);	
	}
	);
}

function update_property(ap_id){
	$.post(
	'ajax_update_property.php',
	{ap_id:ap_id},
	function(r){
	$("#update_ajax").html(r);	
	}
	);
}

function update_job(aj_id){
	$.post(
	'ajax_update_job.php',
	{aj_id:aj_id},
	function(r){
	$("#update_ajax").html(r);	
	}
	);
}
/* $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
   }); */
function update_car(acm_id){
	$.post(
	'ajax_update_car.php',
	{acm_id:acm_id},
	function(r){
	$("#update_ajax").html(r);	
	}
	);
}

function post_item(){
	$.post(
	'check_login.php',
	{},
	function (r){
		if(r==1){
		window.location="post_item.php";
		}else{
		required_alert('<font color="red">You have to login first...click here to <a href="login.php"><font color="yellow"> Login </font></a></font>','bottom-right','warning','0');	
		}
	}
	);
}

function profile_details(){
	$.post(
	'check_login.php',
	{},
	function (r){
		if(r==1){
		window.location="profile_details.php";
		}else{
		required_alert('<font color="red">You have to login first...click here to <a href="login.php"><font color="yellow"> Login </font></a></font>','bottom-right','warning','0');	
		}
	}
	);
}

function stop_bid(db,id){
	$.post(
	'ajax_stop_bid.php',
	{db:db,id:id,msg:'stop_bid'},
	function (r){
		if(r==1){
		alert("Thank You");
		window.location="profile_details.php";
		}else{
		required_alert('Something went wrong','bottom-right','warning');	
		}
	}
	);
}
function stop_listing(db,id){
	if(confirm("Are you want???")){
	$.post(
	'ajax_stop_bid.php',
	{db:db,id:id,msg:'stop_listing'},
	function (r){
		if(r==1){
		alert("Thank You");
		window.location="profile_details.php";
		}else{
		required_alert('Something went wrong','bottom-right','warning');	
		}
	}
	);
	}
}

</script>
<style type="text/css">
	.color-offer-text>a{
		color:#000 !important;
	}
	.days-span{
		background: #fbcc48;
    	color: #FFF;
    	border-radius: 0;
        font-size: 21px !important;
    	padding: 9px 19px !important;
    	text-align: center;
	}
	.radio-days{
		margin-left:19px !important;
	}	
	.check-watch{
		margin-left:12px !important;
	}
	.fix-width{
		
		display: inline;
		float:left;
	}
	.fix-width-1{
		width:45%;
	}
	.fix-width-2{
		width:53%;
	}
	.btn-watchers{
		background: #fbcc48;
    	color: #FFF;
    	border-radius: 0;
        font-size: 21px !important;
    	line-height: 42px;
    	text-align: center;
	}
	.single-check-watch{

	}
	.color-offer-text-a{
		color:#000 !important;
	}
	.input-price{
		display: inline;
	    width: 90px !important;
    	height: 42px;
	}
	.watch-margins{
		margin-bottom: 15px;
	}
	.checkmark{
		color: #fbcc48 !important;
	}
	.no-more-offers{
		padding: 35px;
		text-align:center;
	}
</style>