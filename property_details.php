<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<style>
.above-content-tabs.clearfix {
  border-top: 5px solid #ccc;
  padding-top: 19px;
}
@media print {
   .header_container, #sidebar-primary, #footer, .claim-post-wraper{ display:none;}
}


</style>
<script>

$( document ).ready(function() {
    ajax_pagintn111(1,1,'<?php echo $_GET["id"]; ?>');
});
function ajax_pagintn111(page,limit=1,item_id='<?php echo $_GET["id"]; ?>'){
	$.post(
	'ajax_review.php?&page='+page+'&id='+item_id+'&limit='+limit+'&db=ambit_property_review',
	{},
	function(r){
	$("#ajax_review").html(r);	
	}
	);
}
function rating_validate(evt) {
    var rating=$("#rating").val().trim();
	if(isNaN(rating)){
		$("#rating").val("");
	}else{
	if(rating > 5 || rating < 1){
		$("#rating").val("");
	}else{
		
	}
	}
}

function review_submit(id){
	var rating=$("#rating").val().trim();
	var comment=$("#comment").val().trim();
	var item_id='<?php  echo $_GET["id"]; ?>';
	if(rating==""){
		alert("Enter rating point");
		$("#rating").focus();
		return false;
	}
	if(comment==""){
		alert("Enter comment");
		$("#comment").focus();
		return false;
	}
	$.post(
	'ajax_submit_review.php',
	{rating:rating,comment:comment,db:'ambit_property_review',item_id:item_id},
	function(r){
	if(r==1){
		window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
	}else{
		alert("Something went wrong!!!");
	}
	}
	);
}

function contact_seller_modal(agent){
	var name=$("#cnn_name").val().trim();
	var email=$("#cnn_email").val().trim();
	var phone=$("#cnn_phone").val().trim();
	var message=$("#cnn_message").val().trim();
	contact_seller1(name,email,phone,message,agent);
}

function contact_seller(agent){
	var name=$("#cn_name").val().trim();
	var email=$("#cn_email").val().trim();
	var phone=$("#cn_phone").val().trim();
	var message=$("#cn_message").val().trim();
	contact_seller1(name,email,phone,message,agent);
}

function contact_seller1(name,email,phone,message,agent){
	var path='<?php echo basename($_SERVER["REQUEST_URI"]);  ?>';  	
    $.post(
	"check_login.php",
	{path:path},
	function(r){
	if(r==0){
		alert("You have to login first");
		window.location="login.php";
	}else{
		
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	$.post(
	"ajax_contact_cus.php",
	{name:name,email:email,phone:phone,message:message,item:'<?php echo $_GET["id"]; ?>',agent:agent},
	function(r){
		//alert(r);
		if(r==1){
			/*alert("Mail Sent Successfully");*/
			$("#contact_seller_msg").show().html('<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+' Mail Sent Successfully');
			<?php /*?>window.location='<?php echo basename($_SERVER["REQUEST_URI"]);  ?>';<?php */?>
		}else{
				required_alert("Something went wrong !!!",'top-left','error');	
		}
	}
	);
	
	
	}
	}
	);
	
}
</script>
<section id="main" class="clearfix">
<div class="wrap row">
  <div class="breadcrumb breadcrumbs columns">
    <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span><span class="trail-begin"><a href="property_listing.php">Property Listing</a></span> <span class="sep">&raquo;</span> <span class="trail-end"><?php echo getPropertyTitle($_GET["id"]); ?></span> </div>
  </div>
  <?php
$select="ap_id,uploader,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,posting_date,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,smoke_alarm,agency_reference,Posting_status,classified_status,status, contact_type, name, agent_email, mobile, website_address, name2, email_address2, agency, landline, landline2, mobile2, logo,view_counter";
$from="add_property";
$PostID = trim($_GET["id"]);
$PHPSELF = $_SERVER['PHP_SELF'];
$condition=array("ap_id"=>$PostID);
$property_detls=getDetails(doSelect1($select,$from,$condition));
$property_detls=trimmer_db_array($property_detls);

foreach($property_detls as $k=>$v){
 
?>
  <div id="content" class="large-9 small-12 columns" role="main">
    <div id="post-424" class="post-424 classified type-classified status-publish hentry classifiedscategory-camera classifiedscategory-canon classifiedscategory-nikon classifiedscategory-panasonic classifiedscategory-sony  post ">
      <!-- Title and details start -->
      <header class="entry-header clearfix">
        <div class="entry-header-title clearfix">
          <div class="entry-header-left">
            <div class="spt-left">
              <h1 class="entry-title " > <?php echo getPropertyTitle(trim($_GET["id"]));  ?> </h1>
              <ul>
                <li>
                  <p class='bottom_line'><span>Ad ID:&nbsp;</span><span><?php echo $v["ap_id"]; ?></span></p>
                </li>
                <li>
                  <div class="listing_rating">
                    <div class="directory_rating_row"> <span class="single_rating">
                      <?php
$rating_array=getDetails(doSelect("count(*) as count,SUM(rating) as sum","ambit_property_review",array("status"=>1,"item_id"=>$v["ap_id"])));
$rating=explode("||",rating($rating_array));
$half_rating=$rating[0];
$full_rating=$rating[1];
$no_rating=$rating[2];
for($i=1;$i<=$full_rating;$i++){
?>
                      <i class="fa fa-star" style="color:#F0B74A;" aria-hidden="true"></i>
                      <?php
}
for($i=1;$i<=$half_rating;$i++){
?>
                      <i class="fa fa-star-half-o" style="color:#F0B74A;" aria-hidden="true"></i>
                      <?php
}
for($i=1;$i<=$no_rating;$i++){
?>
                      <i class="fa fa-star-o" style="color:#F0B74A;" aria-hidden="true"></i>
                      <?php
}
?>
                      </span> </span></div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="spt-right"> </div>
          </div>
          <!-- Show Property type -->
          <div class="entry-header-right">
            <!-- span class="classified-price"><span><?php //echo currency().$v['expected_sale_price']; ?></span></span -->
          </div>
        </div>
      </header>
      <!-- Title and details end -->
      <div class="entry-content">
        <script type="text/javascript">
                                   jQuery(function () {
                                        jQuery('#classified_image_gallery .classified_image a').lightBox();
                                   });
                         </script>
        <!-- Slider and classified informations start -->
        <div class='above-content-tabs clearfix'>
          <!-- Image Gallery Div -->
          <div id="classified_detail_img" class="entry-header-image">
            <div id="slider" class="listing-image flexslider frontend_edit_image">
              <ul class="slides">
                <?php
									$ImageCounter = 1;
									$listing_img = '';
									$property_image=getDetails(doSelect("image","add_property_photo",array("ap_id"=>$v["ap_id"],"status"=>1)));
									foreach($property_image as $k2=>$v2){
										if($ImageCounter == 1 ){ $listing_img = 'https://www.tradeexpress.co.nz/property_image/'.$v2["image"];}
										
									?>
                <li> <a href="property_image/<?php echo $v2["image"]; ?>" title="" class="listing_img" > <img src="property_image/<?php echo $v2["image"]; ?>" alt=""/> </a> </li>
                <?php
									$ImageCounter++;}
									?>
              </ul>
            </div>
            <!-- More Image gallery -->
            <div id="silde_gallery" class="flexslider slider_padding_class">
              <ul class="more_photos slides">
                <?php
									foreach($property_image as $k2=>$v2){
									?>
                <li> <a title="camera(3)" > <img src="property_image/<?php echo $v2["image"]; ?>" alt=""  /> </a> </li>
                <?php
									}
									?>
              </ul>
            </div>
            <!-- Finish More Image gallery -->
          </div>
          <!-- .entry-header-image -->
          <div id="classified_info_right" class="classified_info-right">
            <article  class="entry-header-custom-wrap classified-info">
              <?php
									$property_price_details=getDetails(doSelect("price_type, label_name, value","add_property_price_dtls",array("ap_id"=>$v["ap_id"])));
									$prop_label= '';
									$prop_price_vals= '';
									
									foreach($property_price_details as $property_price_details_key=>$property_price_details_vals){
										$prop_price_type = $property_price_details_vals['price_type'];
										$prop_price_vals = $property_price_details_vals['value'];										
										if($property_price_details_vals['price_type'] == '1'){
											$prop_label= 'Asking price';
										}else if($property_price_details_vals['price_type'] == '2'){
											$prop_label= 'Enquiries over';
										}else if($property_price_details_vals['price_type'] == '3'){
											$prop_label= 'To be auctioned';
										}else if($property_price_details_vals['price_type'] == '4'){
											$prop_label= 'Tenders closing';
										}else if($property_price_details_vals['price_type'] == '5'){
											$prop_label= 'Price by negotiation';
										}else if($property_price_details_vals['price_type'] == '6'){
											$prop_label= 'Deadline Private Treaty';
										}else {
											$prop_label= '';
										}
									}
										
									?>
              <p>
                <label>
                <?php if(!empty($prop_label)) { echo $prop_label; }  ?>
                </label>
                <span id='frontend_address1' class='frontend_address' >
                <?php  
											if($prop_price_type == '1' || $prop_price_type == '2'){
												$prop_price_value = 	currency(). $prop_price_vals;
											}else if($prop_price_type == '3' || $prop_price_type == '4' || $prop_price_type == '6'){
												$vlass= str_replace('-',' ', $prop_price_vals);
												$prop_price_value= get_date_str($vlass);
											}else{
												$prop_price_value= $prop_price_vals;
											} echo $prop_price_value; ?>
                </span> </p>
              <p class='entry_address'>
                <label>Listed: </label>
                <span id='frontend_address' class='frontend_address2'><?php echo get_date_str($v["posting_date"]); ?></span> </p>
              <p class='entry_address'>
                <label>Location: </label>
                <span id='frontend_address' class='frontend_address' ><?php echo $v["street"].' ,'.$v["unit_flat"].' '.$v["street_name"].', '.getRegionName($v["region"]); ?></span></p>
              <p class='rooms'>
                <label>Rooms:</label>
                <span>
                <?php 
												if(!empty($v["bedroom"])){
													echo $v["bedroom"].' bedrooms, ';
												}
												if(!empty($v["bathroom"])){
													echo $v["bathroom"].' bathrooms,';
												}
											?>
                </span> </p>
              <?php
										$catId= $v['cat_id'];
										$propType= '';
										$categorys=getDetails(doSelect("pc_id,category","property_category",array("pc_id"=>$catId)));
										if(count($categorys) > 0){
											foreach($categorys as $categorysKeys=> $categorysVals){
												$propType= str_replace(">"," ",$categorysVals['category']);
											}
											
										}
									?>
              <p class='property_type'>
                <label>Property type:</label>
                <span><?php echo $propType;	?></span> </p>
              <p class='land_area '>
                <label>Land area:</label>
                <span><?php echo $v["land_area"].' Meter Sq.'; ?></span> </p>
              <p class='floor_area '>
                <label>Parking:</label>
                <span>
                <?php  echo $v["parking"]; ?>
                </span> </p>
              <p class='open_home_time'>
                <label>Open home time:</label>
                <span><?php echo (get_date_str($v["open_home_date"]).','. $v["open_home_strt_time"].'-'.$v["open_home_end_time"] ); ?></span> </p>
              <!--p class='classified_county '><label>Country:</label> 
										<span>
											<?php 
												if(!empty($v["region"])){
													$res= getCountryName(getCountryIdByCity(getCityIdByRegion($v["region"])));
												}else{
													$res= '';
												}
												echo $res;
											?>
										</span>
									</p>
									<p class='classified_city '><label>City:</label> 
										<span>
											<?php if(!empty($v["region"])){ $rec= getCityName(getCityIdByRegion($v["region"])); }else{ $rec= '';}  
												echo $rec;
											?>
										</span>
									</p>
									<p class='zip_code'><label>Agency Reference: </label> 
										<span class='frontend_zip_code' ><?php echo $v["agency_reference"];  ?></span>
									</p>
									<p class='classified_tag'><label>Classified Status: </label> 
										<span class='frontend_classified_tag' ><?php if($v["classified_status"]=="0") echo 'For Sold'; else echo 'Sold'; ?></span>
									</p-->
            </article>
            <script>
                    jQuery(document).ready(function () {
                         jQuery('#contact_seller_id').on('click', function () {
                              jQuery('html,body').scrollTop(0);
                              jQuery('#contact_seller_div').scrollTop(0);
                         });
                    });
          </script>
            <div id="contact_seller_div" class="reveal-modal tmpl_login_frm_data clearfix" data-reveal>
              <form name="contact_seller_frm" id="contact_seller_frm" action="javascript:void(0);" method="post">
                <div class="email_to_friend">
                  <h3 class="h3">Contact Seller</h3>
                  <button onclick="modal_close();" type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="form_row clearfix" >
                  <label>Your Name<span class="indicates">*</span></label>
                  <input name="cnn_name" id="cnn_name" type="text"  />
                  <span id="cnn_name_err"></span> </div>
                <div class="form_row clearfix" >
                  <label>Your Email<span class="indicates">*</span></label>
                  <input name="cnn_email" id="cnn_email" type="text"  />
                  <span id="cnn_email_err"></span> </div>
                <div class="form_row clearfix" >
                  <label>Your Phone<span class="indicates">*</span></label>
                  <input name="cnn_phone" id="cnn_phone" type="text" value="" />
                  <span id="cnn_phone_err"></span> </div>
                <div class="form_row  clearfix" >
                  <label> Query: <span class="indicates">*</span></label>
                  <textarea rows="5" name="cnn_message" id="cnn_message" placeholder="Query about item"></textarea>
                  <span id="cnn_message_err"></span> </div>
                <div id="contact_seller_frm_popup"></div>
                <div class="send_info_button clearfix" >
                  <input name="Send" type="submit" value="Send" onclick="contact_seller_modal('<?php echo $v["uploader"]; ?>');" class="button send_button" />
                  <span id="process_state" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span> <strong id="contact_us_msg" class="process_state"></strong> </div>
              </form>
            </div>
            <script>
var $q = jQuery.noConflict();
$q(document).ready(function(){
/*global vars*/
	var enquiry1frm = $q("#contact_seller_frm");
	var full_name = $q("#contact_full_name");
	var full_nameInfo = $q("#contact_full_nameInfo");
	var your_iemail = $q("#contact_your_iemail");
	var your_iemailInfo = $q("#contact_your_iemailInfo");
	var sub = $q("#contact_inq_sub");
	var subinfo = $q("#contact_inq_subInfo");
	var frnd_comments = $q("#contact_inq_msg");
	var frnd_commentsInfo = $q("#contact_inq_msgInfo");
	/*On blur*/
	full_name.blur(validate_full_name1);
	your_iemail.blur(validate_your_iemail);
	sub.blur(validate_subject);
	frnd_comments.blur(validate_frnd_comments);
	frnd_comments.keyup(validate_frnd_comments);
	/*On Submitting*/
	
	enquiry1frm.submit(function(){
		
		if(validate_full_name1() & validate_your_iemail() & validate_subject() & validate_frnd_comments())
		{ 
			document.getElementById('process_state').style.display="block";
			var inquiry_data = enquiry1frm.serialize();				
			jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				data:'action=classifieds_contact_seller&' + inquiry_data + '&postid=' + 424,
				success:function(results) {
					if(results==1){
						jQuery('#contact_us_msg').html(captcha_invalid_msg);
					}else{				
					document.getElementById('process_state').style.display="none";					
						jQuery('#contact_us_msg').html(results);
						setTimeout(function(){
									jQuery("#lean_overlay").fadeOut(200);
									jQuery('.reveal-modal-bg').css({"display":"none"});
									jQuery('#contact_seller_div').css({"display":"none"});
									jQuery('#contact_us_msg').html('');
									full_name.val('');
									your_iemail.val('');
									sub.val('');
									frnd_comments.val('');},2000); 
					}
				}
			});
			return false;
		}
		else
		{ 
			
			return false;
		}
	});
	
	/*validation functions*/
	function validate_full_name1()
	{	
		if(full_name.val() == '')
		{
			full_name.addClass("error");
			full_nameInfo.text("Please enter your full name");
			full_nameInfo.addClass("message_error2");
			return false;
		}else{
			full_name.removeClass("error");
			full_nameInfo.text("");
			full_nameInfo.removeClass("message_error2");
			return true;
		}
	}
	function validate_your_iemail()
	{ 
		your_iemail.val(your_iemail.val().trim());
		var isvalidemailflag = 0;
		if(your_iemail.val() == '')
		{
			isvalidemailflag = 1;
		}else {
			if(your_iemail.val() != '')
			{
				var a = your_iemail.val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				/*if it's valid your_iemail*/
				if(filter.test(a)){
					isvalidemailflag = 0;
				}else{
					isvalidemailflag = 1;	
				}
			}
		}
		if(isvalidemailflag == 1)
		{
			your_iemail.addClass("error");
			your_iemailInfo.text("Please enter your valid email address");
			your_iemailInfo.addClass("message_error2");
			return false;
		}else
		{
			your_iemail.removeClass("error");
			your_iemailInfo.text("");
			your_iemailInfo.removeClass("message_error");
			return true;
		}
		
	}
	function validate_subject()
	{ 
		if($q("#contact_inq_sub").val() == '')
		{
			sub.addClass("error");
			subinfo.text("Please enter subject line");
			subinfo.addClass("message_error2");
			return false;
		}
		else{
			sub.removeClass("error");
			subinfo.text("");
			subinfo.removeClass("message_error2");
			return true;
		}
	}
	
	function validate_frnd_comments()
	{
		if($q("#contact_inq_msg").val() == '')
		{
			frnd_comments.addClass("error");
			frnd_commentsInfo.text("Please enter message");
			frnd_commentsInfo.addClass("message_error2");
			return false;
		}else{
			frnd_comments.removeClass("error");
			frnd_commentsInfo.text("");
			frnd_commentsInfo.removeClass("message_error2");
			return true;
		}
	}
});
</script>
          </div>
        </div>
        <!-- Slider and classified informations end -->
        <ul class="tabs" data-tab role="tablist">
          <li class="tab-title classified-info-tab active" role="presentational"><a href="#classified_details">Info</a></li>
          <li class="tab-title classified-review-tab" role="presentational"><a href="#classified_reviews">Reviews</a></li>
        </ul>
        <div class="tabs-content">
          <section role="tabpanel" aria-hidden="false" class="content active entry-content" id="classified_details">
            <h2 class="print-heading">Info</h2>
            <div id="overview" class="entry-content">
              <h2>Classified Description <small></small></h2>
              <div class="entry-content frontend-entry-content ">
                <p style="text-align:justify;"><?php echo $v["prop_desc"]; ?></p>
                <p><strong>Amenities:</strong></p>
                <ol>
                  <?php
												$amenities=explode(',',$v["amenities"]);
												$amenities=trimmer($amenities);
												foreach($amenities as $k2=>$v2){
											?>
                  <li><?php echo $v2;  ?></li>
                  <?php } ?>
                </ol>
                <p><strong>Parking:</strong></p>
                <p style="text-align:justify;"><?php echo $v["parking"]; ?></p>
                <div id="map12" style="height:300px;"></div>
                <?php 
		$latitude = '-36.848461';
		$longitude = '174.763336';
		$formatted_address= 'Auckland';
		if(!empty($v["region"])){ 
			$cityName= $v["street"].' '.$v["street_name"].' '.getRegionName($v["region"]);; 
			$data_arr = geocode($cityName);
			if($data_arr){
				$latitude = $data_arr[0];
				$longitude = $data_arr[1];
				$formatted_address = $cityName;
			}
		}  
							
	?>
                <script>
      function initMap() {
        var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map12"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
		}
    </script>
                <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnyB9om7iA4NFfz22fkVf0NPEFz6lia0Y&callback=initMap">
    </script>
              </div>
            </div>
            <!-- end .entry-content -->
            <div class="listing_custom_field"></div>
            <div class="tevolution_custom_field  listing_custom_field"></div>
            <script>
			jQuery(document).ready(function(){
				
				if(jQuery('.tevolution_custom_field.listing_custom_field').is(':empty')){
					jQuery('.tevolution_custom_field.listing_custom_field').remove();
				}
			});
		</script>
            <div class="claim-post-wraper">
              <ul>
                <li><a class="small_btn tmpl_mail_friend" data-reveal-id="tmpl_send_to_frd" href="javascript:void(0);" id="send_friend_id"  title="Mail to a friend" >Send to friend</a></li>
                <li><a class="small_btn tmpl_mail_friend" data-reveal-id="tmpl_send_inquiry"  href="javascript:void(0)" title="Send Inquiry" id="send_inquiry_id" >Send Inquiry</a></li>
                <li id="watch_span" class="fav_424 fav">
                  <?php
			if(isset($_SESSION["ar_id"])){
			$check=check_watch_list("add_to_watch_property",array("cus_id"=>$_SESSION["ar_id"],"item_id"=>$v["ap_id"]));
			if($check){
			?>
                  <a href="javascript:void(0);"  title="Remove from watchlist" class="watchlist"  onclick="add2watch_details_page('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span');"  >Remove from watchlist</a>
                  <?php
			}else{
			?>
                  <a href="javascript:void(0);"  title="Add to watchlist" class="watchlist"  onclick="add2watch_details_page('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span');"   >Add to watchlist</a>
                  <?php	
			}
			}else{
			?>
                  <a href="javascript:void(0);"  title="Add to watchlist" class="watchlist"  onclick="add2watch_details_page('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span');"   >Add to watchlist</a>
                  <?php
			}
			?>
                </li>
				
                <li class="print"><a id="print_id" title="Print this post" href="javascript:void(0);" rel="leanModal_print" class="small_btn print" onclick="tmpl_printpage()"><i class="fa fa-print" aria-hidden="true"></i>Print</a></li>
				<?php if( $v["view_counter"] > 0 ){ ?>
				 
				<?php } ?>
				
              </ul>
            </div>
			<?php 
			  $ShareablePropertyTitle =  getPropertyTitle(trim($_GET["id"])); 
			  $ShareablePropertyDescription =  $v["prop_desc"];
			  
			 ?>
 				<strong>Social Share : </strong><?php /*?><div id="fb-root"></div><!-- Your share button code --><div class="fb-share-button" data-href="https://www.tradeexpress.co.nz" data-layout="button_count"></div><?php */?>
				<a href="javascript:void(0);" onclick="javascript:OpenSharePopup('<?php echo $PostID?>','facebook');"><i class="fa fa-facebook" aria-hidden="true"></i> </a>
				&nbsp;<a href="javascript:void(0);" onclick="javascript:OpenSharePopup('<?php echo $PostID?>','twitter');"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
				<?php /*?> &nbsp;<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode("https://www.tradeexpress.co.nz/property_details.php?id=".$PostID); ?>"><i class="fa fa-gplus" aria-hidden="true"></i> </a>
				 &nbsp;<a target="_blank" href=" https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode("https://www.tradeexpress.co.nz/property_details.php?id=".$PostID); ?>&title=<?php echo $ShareablePropertyTitle?>&summary=<?php echo $ShareablePropertyDescription?>&source=<?php echo  $listing_img; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
				 &nbsp;
				 <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode("https://www.tradeexpress.co.nz/property_details.php?id=".$PostID); ?>&media=<?php echo urlencode($listing_img); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i> </a><?php */?>
   			<!--Code start for single captcha -->
           <?php /*?> <div id="myrecap" style="display:none;">
              <div id="captcha_div" class="captcha_div"></div>
              <script type="text/javascript" async>var recaptcha='1';</script>
            </div>
            <input type="hidden" id="owner_frm" name="owner_frm" value=""  />
            <div id="claim_ship"></div>
            <script type="text/javascript" async >
                    var RECAPTCHA_COMMENT = '';
                                        jQuery('#owner_frm').val(jQuery('#myrecap').html());
                    </script><?php */?>
            <!--Code end for single captcha -->
            
			    <?php  
				 	$StrPageView = str_pad($v["view_counter"],4, "0",STR_PAD_LEFT); 
				    if( $StrPageView &&  strlen($StrPageView) > 0 ){
					    echo "<p><strong>Page View(s)</strong>&nbsp;<table style='width:20%;margin:0px;padding:0px;'><tr>"; 
					    for( $i  =0;$i<strlen($StrPageView);$i++){
						    $char = substr( $StrPageView, $i, 1 );
							echo "<td>".$char."</td>";
						}
						 echo "</tr></table></p>"; 
					}
				 ?>
			
			<div class="classified-page-end clearfix">
			
              <!-- Property Social Media Coding Start -->
              
			  <?php /*?><ul class='social-media-share'>
                <li>
                  <div class="twitter_share" href="javascript:void(0);" data-url="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" data-text="<?php echo $ShareablePropertyDescription;?>"> <a class="box" target="_blank" href="https://twitter.com/share"> <span class="share"> <i class="step fa fa-twitter"></i> </span> <span class="count">Share</span> </a> </div>
                </li>
                <li>
                  <div class="facebook_share" data-url="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" data-text="<?php echo $ShareablePropertyDescription;?>"></div>
                </li>
                <li>
                  <div class="googleplus_share" href="javascript:void(0);"  data-url="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" data-text="<?php echo $ShareablePropertyDescription;?>"></div>
                </li>
                <li>
                  <div class="pinit_share" data-href="//pinterest.com/pin/create/button/?url=https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" data-media="<?php echo $listing_img;?>" data-description="<?php echo $ShareablePropertyDescription;?>"></div>
                </li>
                <script src="../../platform.twitter.com/images/widgets.js" type="text/javascript"></script>
              </ul><?php */?>
              <?php /*?><script type="text/javascript">

		var jQuery = jQuery.noConflict();

		jQuery( document ).ready(function() {

			jQuery('.facebook_share').sharrre({

			  share: {

				facebook: true

			  },

			  template: '<a class="box" href="#"><span class="share"><i class="step fa fa-facebook"></i></span> <span class="count" href="#">{total}<span class="showlabel">&nbsp;'+FB_LIKE+'</span></span></a>',

			  enableHover: false,

			  enableTracking: true,

			  click: function(api, options){

				api.simulateClick();

				api.openPopup('facebook');

			  }

			});

			jQuery('.googleplus_share').sharrre({

			  share: {

				googlePlus: true

			  },

			  template: '<a class="box" href="#"><span class="share"><i class="fa fa-google-plus"></i> </span> <span class="count" href="#">{total} <span class="showlabel">+1</span></span></a>',

			  enableHover: false,

			  enableTracking: true,

			  urlCurl: 'classifieds/wp-content/plugins/Tevolution//tmplconnector/sharrre.php',

			  click: function(api, options){

				api.simulateClick();

				api.openPopup('googlePlus');

			  }

			});

			jQuery('.pinit_share').sharrre({

			  share: {

				pinterest: true

			  },

			  template: '<a class="box" href="#"><span class="share"><i class="fa fa-pinterest"></i></span> <span class="count" href="#">{total} <span class="showlabel"> '+PINT_REST+'</span></span></a>',

			  enableHover: false,

			  enableTracking: true,

			  urlCurl: 'classifieds/wp-content/plugins/Tevolution//tmplconnector/sharrre.php',

			  click: function(api, options){

				api.simulateClick();

				

			  }

			});

			jQuery('.pinit_share').on('click', function(e) {

				var $this = jQuery(this),





				media = encodeURI($this.data('media')),

				description = encodeURI($this.data('description'));

				 

					e.preventDefault();

					 

					window.open(

						jQuery(this).attr('data-href') + '&media=' + media + '&description=' + description,

						'pinterestDialog',

						'height=400, width=700, toolbar=0, status=0, scrollbars=1'

					);

			});

		});



	</script><?php */?>
              <!-- Property Social Media Coding End -->
            </div>
          </section>
          <!-- End Property details -->
          <?php
include("include_parts/review_form_details_page.php");
?>
          <!-- reviews tabs content end-->
        </div>
      </div>
      <!--Finish the listing Content -->
      <!--Custom field collection do action -->
    </div>
    <div class="post-meta" > </div>
  </div>
  <!-- #content -->
  <?php


?>
  <!--single post type sidebar -->
  <?php
$select="contact_type,realestate_agent,name,agency,mobile,landline";
$from="add_property_contact_dtls";
$condition=array("ap_id"=>trim($v["ap_id"]));
$contact_detls=getDetails(doSelect1($select,$from,$condition));
foreach($contact_detls as $k2=>$v2){
?>
  <aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
    <div id="tmplclassifiedsellerdetails-1" class="widget tmpl_classified_seller">
      <h3 class="widget-title">Agent Details</h3>
      <div class="tmpl-seller-details">
        <?php
						if(isset($v["logo"]) AND !empty($v["logo"])){
							$logoImg= 'logo/'. $v["logo"];
					?>
        <img alt='logo' src='<?php echo $logoImg; ?>'  class='avatar avatar-90 photo' style="max-height:60px;max-width:190px;" />
        <?php }	if(!empty($v['website_address'])){?>
        <p class="website"><a href="<?php echo 'http://'.$v['website_address'] ;   ?>" target="_blank"><?php echo '<b>'.$v["website_address"] .'<b>'; ?></a></p>
        <?php } ?>
        <div class="seller-top_wrapper">
          <div class="tmpl-seller-photo"> <img alt='' src='//2.gravatar.com/avatar/50b99835f16de99bb610f11ef9c61ef9?s=90&amp;r=g' srcset='//2.gravatar.com/avatar/50b99835f16de99bb610f11ef9c61ef9?s=180&amp;r=g 2x' class='avatar avatar-90 photo' height='90' width='90' /> </div>
          <div class="tmpl-seller-detail-rt">
            <!-- Listing details -->
            <p class="title"><?php echo $v2["name"]; ?></p>
            <?php
							if(trim($v["contact_type"])== '1'){
								if(trim($v2["realestate_agent"])=='1'){
									$realestate_agent='Yes';
								}else{
									$realestate_agent='No';
								}
							}else{
								$realestate_agent='No';
							}
							?>
            <p>
              <label>Licensed:</label>
              <?php echo $realestate_agent; ?></p>
            <p class="author_seller_button"> <a class="button" href="index50b6-3.html?custom_post=classified">Owner Listings</a> </p>
          </div>
        </div>
        <p class="phone"><i class="fa fa-phone"></i> <?php echo $v2["mobile"]; ?> </p>
        <p class="phone"><i class="fa fa-phone-square"></i> <?php echo $v2["landline"]; ?> </p>
      </div>
    </div>
    <?php if(trim($v["contact_type"])== '2'){ ?>
    <div id="agent2classifiedrelatedlist-1" class="widget widget tmpl-classified-related">
      <?php  if(!empty($v["name2"])) { ?>
      <h3>2nd Agent Detail</h3>
      <p class="name2">
        <label>Name:</label>
        <?php echo $v["name2"]; ?></p>
      <?php if(!empty($v["email_address2"])){  ?>
      <p class="email_address2">
        <label>Email:</label>
        <?php echo $v["email_address2"]; ?> </p>
      <?php } if($v["mobile2"]){ ?>
      <p class="mobile2"><i class="fa fa-phone"></i> <?php echo $v["mobile2"]; ?> </p>
      <?php } if($v["landline2"]){?>
      <p class="landline2"><i class="fa fa-phone-square"></i> <?php echo $v["landline2"]; ?> </p>
      <?php } } ?>
    </div>
    <?php } ?>
    <div id="tmplclassifiedrelatedlist-1" class="widget widget tmpl-classified-related">
      <h3>Agent Contact</h3>
      <section id='loop_classified_taxonomy' class='loop_classified_taxonomy'>
			<div  id="contact_seller_msg" class="alert alert-success fade in alert-dismissable" style="margin-top:18px;display:none;">
			
			</div>
		
		<ul class='loop_related_list'>
          <label class=r_lbl>Name :<span class="required">*</span></label>
          <input name="cn_name" id="cn_name" value="" type="text" class="textfield "  placeholder="" required/>
          <label class=r_lbl>Email :<span class="required">*</span></label>
          <input name="cn_email" id="cn_email" value="" type="email" class="textfield "  placeholder=""  required/>
          <label class=r_lbl>Phone No. :<span class="required">*</span></label>
          <input name="cn_phone" id="cn_phone" value="" type="text" class="textfield "  placeholder="" required/>
          <label class=r_lbl>Message :<span class="required">*</span></label>
          <textarea class="wp-editor-area" rows="6" autocomplete="off" cols="40" name="cn_message" id="cn_message" required></textarea>
          <a  onclick="contact_seller('<?php echo $v["uploader"]; ?>');" class="button"  href="javascript:void(0);">Contact Seller</a>
        </ul>
      </section>
    </div>
  </aside>
  <?php
}
}
?>
  <!--end single post type sidebar -->
  <!-- end  content part-->
</div>
<!-- .wrap -->
</div>
<!-- #main -->
<a class="exit-off-canvas"></a>
<!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>
</div>
<!-- #container -->
</div>
<!-- inner-wrap start -->
</div>
<!-- off-canvas-wrap end -->
<?php
include_once("include/footer_main.php");
?>
<!-- #footer -->
</div>
<script type="text/javascript">
			// <![CDATA[
				var $shorcode_gallery_popup = jQuery.noConflict();
				$shorcode_gallery_popup(document).ready(function($){
					$shorcode_gallery_popup(".gallery").each(function(index, obj){
						var galleryid = Math.floor(Math.random()*10000);
						$shorcode_gallery_popup(obj).find("a").colorbox({rel:galleryid, maxWidth:"95%", maxHeight:"95%"});
					});
					$shorcode_gallery_popup("a.lightbox").colorbox({maxWidth:"95%", maxHeight:"95%"});
				});
			// ]]>
			</script>
<script>
		var jQuery = jQuery.noConflict();
		jQuery( document ).ready(function(){
			jQuery.ajax({
				url: 'classifieds/wp-content/plugins/Tevolution/tmplconnector/sharrre.php', 
				data: {
					"url": "classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/",
					"type" : 'facebook',
				},
				success: function(result){
					var counts = result.count;
					jQuery('.social-media-share .facebook_share .count').html(counts+'<span class="showlabel">&nbsp;Share</span>');
					return false;
				}
			});
		});
	</script>
<script>
			var IMAGE_LOADING  = 'images/lightbox-ico-loading.gif';
		var IMAGE_PREV     = 'images/lightbox-btn-prev.gif';
		var IMAGE_NEXT     = 'images/lightbox-btn-next.gif';
		var IMAGE_CLOSE    = 'images/lightbox-btn-close.gif';
		var IMAGE_BLANK    = 'images/lightbox-blank.gif';		
		jQuery(function() {
			jQuery('#gallery a').lightBox();
		});
			</script>
<script  type="text/javascript" src="images/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="images/jquery.lightbox.css" media="screen" />
<script  type="text/javascript" async >
			jQuery(window).load(function()
			{ 
				jQuery('#silde_gallery').flexslider({
					animation: 'slide',
										controlNav: true,
					directionNav: true,
										animationLoop: false,
					slideshow: false,
					itemWidth: 90,
					itemMargin: 15,
					 					touch:true,
					asNavFor: '#slider'
				  });
				jQuery('#slider').flexslider(
				{
					animation: 'slide',
					slideshow: false,
					direction: 'horizontal',
					slideshowSpeed: 7000,
					animationLoop: true,
					startAt: 0,
					smoothHeight: true,
					easing: 'swing',
					pauseOnHover: true,
					video: true,
					controlNav: true,
					directionNav: true,	
					touch:true,					
					start: function(slider)
					{
						jQuery('body').removeClass('loading');
					}
					 				});
			});
			/*FlexSlider: Default Settings*/
		</script>
<script  type="text/javascript" async >
		var category_map = '';
	</script>
<!-- Login form -->
<div id="tmpl_reg_login_container" class="reveal-modal tmpl_login_frm_data" data-reveal> <a href="javascript:;" class="modal_close"></a>
  <div id="tmpl_login_frm" >
    <div class="login_form_l">
      <h3>Sign In</h3>
      <div class="login_form_box">
        <form name="popup_login" id="popup_login" action="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/" method="post" >
          <p style="text-align: center;color: red;">This socials login not configured for this demo site.</p>
          <input type="hidden" name="action" value="login" />
          <div class="form_row clearfix">
            <label>Username <span class="indicates">*</span> </label>
            <input type="text" name="log" id="user_login" value="" size="20" class="textfield" />
            <span id="user_loginInfo"></span> </div>
          <div class="form_row clearfix">
            <label> Password <span class="indicates">*</span> </label>
            <input type="password" name="pwd" id="user_pass" class="textfield" value="" size="20"  />
            <span id="user_passInfo"></span> </div>
          <input type="hidden" name="redirect_to" value="index.html" />
          <input type="hidden" name="testcookie" value="1" />
          <div class="form_row rember clearfix">
            <label>
            <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="fl" />
            Remember me on this computer </label>
            <!-- html to show social login -->
            <a onclick="showhide_forgetpw('popup_login');" href="javascript:void(0)" class="lw_fpw_lnk">Forgot your password?</a> </div>
          <div class="form_row ">
            <input class="b_signin_n" type="submit" value="Sign In"  name="submit" />
            <p class="forgot_link"> </p>
          </div>
        </form>
        <div  class='forgotpassword' id="lostpassword_form" style="display:none;" >
          <h3>Forgot password</h3>
          <form name="popup_login_forgot_pass" id="popup_login_forgot_pass" action="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/" method="post" >
            <input type="hidden" name="action" value="lostpassword" />
            <div class="form_row clearfix">
              <label> Email: </label>
              <input type="text" name="user_login" id="user_login_email"  value="" size="20" class="textfield" />
              <span id="forget_user_email_error" class="message_error2"></span> </div>
            <input type="hidden" name="pwdredirect_to" value="index.html" />
            <input type="submit" name="get_new_password" onclick="return forget_email_validate('popup_login_forgot_pass');" value="Get New Password" class="b_signin_n " />
          </form>
        </div>
      </div>
      <!-- Enable social media(gigya plugin) if activated-->
      <!--End of plugin code-->
      <script  type="text/javascript" async >
				function showhide_forgetpw(form_id)
				{
					jQuery(document).on('click','form#'+form_id+' .lw_fpw_lnk', function(e){
						jQuery(this).closest('form#'+form_id).next().show();
						e.preventDefault();
						return false;
					});
				}
				
				function forget_email_validate(form_id){
					var email = jQuery('#'+form_id+' #user_login_email');
					var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					
					if(email.val()==''){
						jQuery('#'+form_id+' #forget_user_email_error').html("Please Enter E-mail");
						email.focus();
						return false;
					}else if (!filter.test(email.val())) {						
						jQuery('#'+form_id+' #forget_user_email_error').html("Please provide a valid email address");
						email.focus();
						return false;
					}else
					{
						jQuery('form#'+form_id+' .error_msg').remove();
						jQuery('form#'+form_id+' .success_msg').remove();
						jQuery('#'+form_id+' #forget_user_email_error').html("");
						jQuery.ajax({
						type: 'POST',
						url: ajaxUrl,
						data:'action=tmpl_forgot_pass_validation&user_login='+email.val(),			
						success: function(result){
								jQuery('form#'+form_id).prepend(result);
								jQuery('form#'+form_id+' .error_msg').delay(3000).fadeOut('slow');
								jQuery('form#'+form_id+' .success_msg').delay(3000).fadeOut('slow');
							}
						});
						return false;
					}
				}
			</script>
    </div>
  </div>
</div>
<script>
                    jQuery(function () {
                         if (jQuery("#contact_seller_div")) {

                              /* Contatc Seller */

                              jQuery("#contact_seller_div .modal_close").click(function () {
                                   jQuery('#contact_seller_div').attr('style', '');
                                   jQuery('.reveal-modal-bg').css('display', 'none');
                                   jQuery('#contact_seller_div').removeClass('open');
                              });
                             // tmpl_close_popup();
                         }
                    });
          </script>
<div id="tmpl_send_to_frd" class="reveal-modal tmpl_login_frm_data clearfix" data-reveal>
  <form name="send_to_frnd_new" id="send_to_frnd_new" action="#" method="post">
 	   <input type="hidden" id="uploader" name="uploader" value="<?php echo $v["uploader"]; ?>"/>
	   <input type="hidden" id="post_id" name="post_id" value="<?php echo $PostID;?>"/>
	  <input type="hidden" id="link_url" name="link_url" value="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>"/> 
     <input type="hidden" name="sendact" value="email_frnd" />
    <div class="email_to_friend">
      <div  id="send_to_frnd_new_container" style="margin-top:18px;display:none;"></div>
	  <h3 class="h3">Send To Friend</h3>
      <a class="modal_close" href="javascript:;"></a> </div>
    <div class="form_row clearfix" >
      <label>Friend&rsquo;s name: <span class="indicates">*</span></label>
      <input name="to_name_friend" id="to_name_friend" type="text" required /> 
      <span id="to_name_friendInfo"></span> </div>
    <div class="form_row clearfix" >
      <label> Friend&rsquo;s email: <span class="indicates">*</span></label>
      <input name="to_friend_email" id="to_friend_email" type="email"  value="" required/>
      <span id="to_friend_emailInfo"></span> </div>
    <div class="form_row clearfix" >
      <label>Your name: <span class="indicates">*</span></label>
      <input name="yourname" id="yourname" type="text"  required/>
      <span id="yournameInfo"></span> </div>
    <div class="form_row clearfix" >
      <label> Your email: <span class="indicates">*</span></label>
      <input name="youremail" id="youremail" type="text"  required/>
      <span id="youremailInfo"></span> </div>
    <div class="form_row clearfix" >
      <label>Subject: </label>
      <input name="frnd_subject" value="Check out this post" id="frnd_subject" type="text"  />
    </div>
    <div class="form_row clearfix" >
      <label>Comments: </label>
      <textarea name="frnd_comments" id="frnd_comments" cols="10" rows="5" >Hello, I just stumbled upon this listing and thought you might like it. Just check it out.</textarea>
    </div>
    <div id="snd_frnd_cap"></div>
    <div class="send_info_button clearfix">
      <input name="Send"  type="submit" value="Send " class="button send_button" />
      <span id="process_send_friend" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span> <strong id="send_friend_msg" class="process_state"></strong> </div>
  </form>
</div>
<div id="tmpl_send_inquiry" class="reveal-modal tmpl_login_frm_data clearfix" style="display:none;" data-reveal>
  <form name="inquiry_frm_new" id="inquiry_frm_new" action="#" method="post"> 
     <input type="hidden" id="uploader" name="uploader" value="<?php echo $v["uploader"]; ?>"/>
	 <input type="hidden" id="sendact" name="sendact" value="send_enquiry"/>
	  <input type="hidden" id="post_id" name="post_id" value="<?php echo $PostID;?>"/>
     <input type="hidden" id="request_uri" name="request_uri" value="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>"/>
     <div class="email_to_friend">
       <div  id="inquiry_frm_new_container" style="margin-top:18px;display:none;"></div>
	  <h3 class="h3">Inquiry for<br/><?php echo getPropertyTitle(trim($_GET["id"]));  ?></h3>
      <a class="modal_close" href="javascript:;"></a> </div>
    <div class="form_row clearfix" >
      <label>Full name: <span class="indicates">*</span></label>
      <input name="full_name" id="full_name" type="text"  required/>
      <span id="full_nameInfo"></span></div>
    <div class="form_row clearfix" >
      <label> Your email: <span class="indicates">*</span></label>
      <input name="your_iemail" id="your_iemail" type="email"  required/>
      <span id="your_iemailInfo"></span></div>
    <div class="form_row clearfix" >
      <label> Contact number: </label>
      <input name="contact_number" id="contact_number" type="text" required />
      <span id="contact_numberInfo"></span></div>
    <div class="form_row clearfix" >
      <label> Subject: <span class="indicates">*</span></label>
      <input name="inq_subject" id="inq_subject" type="text"  value="Inquiry email" required/>
      <span id="inq_subInfo"></span></div>
    <div class="form_row  clearfix" >
      <label> Message: <span class="indicates">*</span></label>
      <textarea rows="5" name="inq_msg" id="inq_msg" required>Hello, I would like to inquire more about this listing. Please let me know how can I get in touch with you. Waiting for your prompt reply?</textarea>
      <span id="inq_msgInfo"></span></div>
    <div id="inquiry_frm_popup"></div>
    <div class="send_info_button clearfix" >
      <input name="Send" type="submit" value="Send" class="button send_button" />
      <span id="process_state" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span> <strong id="send_inquiry_msg" class="process_state"></strong> </div>
  </form>
</div>
<script type="text/javascript">
$( "#send_to_frnd_new" ).on( "submit", function() {
 	var datastring = $("#send_to_frnd_new").serialize();
 	$("#process_send_friend").show();
	$.ajax({
		type: "POST",
		url: "https://www.tradeexpress.co.nz/ajax_call.php",
		data: datastring,
		success: function(data) {
			//var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
			// do what ever you want with the server response
   			/*$("#to_name_friend").val("");
			$("#to_friend_email").val("");
			$("#yourname").val("");
			$("#youremail").val("");
			$("#frnd_subject").val("");
			$("#frnd_comments").val("");*/
  			$("#send_to_frnd_new_container").show().html(  data );
			$("#process_send_friend").hide();
			$('#tmpl_send_to_frd').scrollTop(0);
			setTimeout(function(){ window.location='https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>' }, 3000);
		},
		error: function() {
			alert('error handing here');
		}
	});
	return false;
});
$( "#inquiry_frm_new" ).on( "submit", function() {
 	var datastring = $("#inquiry_frm_new").serialize();
	$("#process_state").show();
	$.ajax({
		type: "POST",
		url: "https://www.tradeexpress.co.nz/ajax_call.php",
		data: datastring,
		success: function(data) {
			//var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
			// do what ever you want with the server response
			/*$("#full_name").val("");
			$("#your_iemail").val("");
			$("#contact_number").val("");
			$("#inq_msg").val("");*/
			$("#process_state").hide();
			$("#inquiry_frm_new_container").show().html(data);
			$('#tmpl_send_inquiry').scrollTop(0);
			setTimeout(function(){ window.location='https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>' }, 3000);
 		},
		error: function() {
			alert('error handing here');
		}
	});
	return false;
});



</script>
<script type="text/javascript">

                    jQuery(function () {
                         jQuery('.listing-image a.listing_img').lightBox();
                    });
					
					var string=document.location.hash;
					var res = string.split("-");
					if(res[0]=="#comment")
					{
						jQuery(".classified-info-tab").removeClass('active');
						jQuery("#classified_details").removeClass('active');
						jQuery(".classified-review-tab").addClass('active');
						jQuery("#classified_reviews").addClass('active');
					}

                    jQuery(window).load(function ()
                    {
                         jQuery('#silde_gallery').flexslider({
                         animation: "slide",
                                             controlNav: false,
                                           directionNav: false,
                                   animationLoop: false,
                                 slideshow: false,
                                 itemWidth: 70,
                                 itemMargin: 5,
                                 asNavFor: '#slider'
                    });
                    jQuery('#slider').flexslider(
                    {
                    animation: 'slide',
                            slideshow: false,
                            direction: "horizontal",
                            slideshowSpeed: 7000,
                            animationLoop: true,
                            startAt: 0,
                            smoothHeight: true,
                            easing: "swing",
                            pauseOnHover: true,
                            video: true,
                            controlNav: false,
                            directionNav: false,
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            start: function (slider)
                            {
                                 jQuery('body').removeClass('loading');
                            }
                    });
                    });
                            jQuery(function () {
                                 jQuery("#tabs").tabs();
                            });

                    jQuery(function () {
                              var n = jQuery("ul.tabs li a").attr("href");
                              if (n == "#locations_map") {
                                        Demo.init();
                              }
                    })

                    jQuery(function () {
                              jQuery(document).on('click',"ul.tabs li a", function () {
                              var n = jQuery(this).attr("href");
                                        if (n == "#locations_map") {
                                                  Demo.init();
                                        }
                         })
                    });
          </script>
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
<script type='text/javascript' src='images/basic.js'></script>
<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/classifieds\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/classifieds\/city\/philadelphia\/classified\/canon-camera-7-d-in-box\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/comment-reply.min.js'></script>
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
<script type='text/javascript' src='images/bootstrap-mini.js'></script>
<script type="text/javascript" async >
			jQuery(function() {
				jQuery(document).on('click','.addtofav', function(){
					post_id = jQuery(this).attr('data-id');
					/*add  html while login to add to favorite*/
					jQuery('#tmpl_login_frm form#loginform').append('<input type="hidden" name="post_id" value="'+post_id+'" />');
					jQuery('#tmpl_login_frm form#loginform').append('<input type="hidden" name="addtofav" value="addtofav" />');
					jQuery('#tmpl_login_frm form#loginform [name=redirect_to]').val(jQuery(location).attr('href'));
					/*add  html while register to add to favorite*/
					jQuery('#tmpl_sign_up form#userform').append('<input type="hidden" name="post_id" value="'+post_id+'" />');
					jQuery('#tmpl_sign_up form#userform').append('<input type="hidden" name="addtofav" value="addtofav" />');
					jQuery('#tmpl_sign_up form#userform [name=reg_redirect_link]').val(jQuery(location).attr('href'));
				});
			});
		</script>
<script id="tmpl-foundation" src="images/foundation.min.js"> </script>
<script  type="text/javascript" async >
			function tmpl_find_click(search_id)
			{
				if(jQuery('#search_near-'+search_id).val() == 'What?')
				{
					jQuery('#search_near-'+search_id).val(' ');
				}
				if(jQuery('#location').val() == 'Address')
				{
					jQuery('#location').val('');
				}
			}
			function OpenSharePopup(PostID,SocialShareType){
 				myWindow = window.open("socialshare.php?socialshare="+SocialShareType+"&id="+PostID, "Social Share", "width=300,height=300");   // Opens a new window
			}
     </script>
<script  type="text/javascript" async >
		jQuery(document).ready(function() {
			/* When click on links available in login box widget */
			jQuery('#login_widget #tmpl-reg-link').click(function(){
				jQuery('#login_widget #tmpl_sign_up').show();
				jQuery('#login_widget #tmpl_login_frm').hide();
			});
			
			jQuery('#login_widget #tmpl-back-login').click(function(){
				jQuery('#login_widget #tmpl_sign_up').hide();
				jQuery('#login_widget #tmpl_login_frm').show();
			});
			
			/* When click on links Login/reg pop ups */
			
			jQuery('#tmpl_reg_login_container #tmpl-reg-link').click(function(){
				jQuery('#tmpl_reg_login_container #tmpl_sign_up').show();
				jQuery('#tmpl_reg_login_container #tmpl_login_frm').hide();
			});
			
			jQuery('#tmpl_reg_login_container #tmpl-back-login').click(function(){
				jQuery('#tmpl_reg_login_container #tmpl_sign_up').hide();
				jQuery('#tmpl_reg_login_container #tmpl_login_frm').show();
			});
			
			jQuery('#login_widget .lw_fpw_lnk').click(function(){
				if(jQuery('#login_widget #lostpassword_form').css('display') =='none'){
					jQuery('#login_widget #lostpassword_form').show();
				}else{
					jQuery('#login_widget #lostpassword_form').hide();
				}
				jQuery('#login_widget #tmpl_sign_up').hide();
			});
			
		});
		 
	</script>
	

<style type="text/css">
.by_this_theme_fix {display: none;}
@media only screen and (min-width: 1024px) {
 .by_this_theme_fix {background-color: #4DC46F;color:#fff;position: fixed;bottom: 80px;right: 80px;z-index: 99999;display: inline-block;text-align:center;border-radius: 3px%;-webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -webkit-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -moz-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);font-size:20px;font-weight:bold;transition: all 1s ease;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-o-transition: all 1s ease;animation-name:animFadeUp; animation-fill-mode: both; animation-duration: 0.4s;animation-timing-function: ease;animation-delay: 1.5s; -webkit-animation-name: animFadeUp; -webkit-animation-fill-mode: both; -webkit-animation-duration: 0.4s;-webkit-animation-timing-function: ease;-webkit-animation-delay: 1.5s; -moz-animation-name: animFadeUp;-moz-animation-fill-mode: both; -moz-animation-duration: 0.4s;-moz-animation-timing-function: ease; -moz-animation-delay: 1.5s; -o-animation-name: animFadeUp;-o-animation-fill-mode: both;-o-animation-duration: 0.4s;-o-animation-timing-function: ease;-o-animation-delay: 1.5s; padding:8px 25px}
 .by_this_theme_fix span{font-size:16px; vertical-align: middle;}
 .by_this_theme_fix:hover{background-color:#58da7d; color:#fff;}
</style>
<?php
/**********************************************************************/
/* 
	Author : Sandeep verma
	Email : sandeepdcte@gmail.com
	Function LOcation : function.php
	Function name :  AddViewCounter()
	Description : Update peoperty counter based on IP address and system date
*/
/**********************************************************************/
AddViewCounter();
?>
</body></html><!-- Dynamic page generated in 1.618 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-05-08 15:05:52 -->
<!-- super cache -->