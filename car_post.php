<?php 
session_start(); 
require_once("function.php"); 
include_once("include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
$acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
if($acnt_blnce >= get_site_settings('34')){
?>

<style type="text/css">
	.span-select {
		width: 33.3%;
		border: 1px solid #ccc;
		float: left;
		display: inline;
	}

	select {
		border: 1px solid rgba(0, 0, 0, 0.2) !important;
	}

	.content {
		padding 0 10px !important;
	}

	select.custom-size {
		min-height: 214px !important;
		border: none !important;
	}
</style>

<script type="text/javascript">
$(document).ready(function () {
	var info = '<?php if(isset($_SESSION["page_info"])) { echo trim($_SESSION["page_info"]);  } else {echo '';}  ?>';
	$.post(
		'unset_session_msg.php', {},
		function (r) {

		}
	);
	if (info.trim() != "") {
		required_alert('<font color="yellow">' + info + '</font>', 'bottom-full-width', 'error', '5000', 'true');
	}
});

function second_cat_field() {
	var list_in_second_cat = $("#list_in_second_cat").val().trim();
	if (list_in_second_cat == "1") {
		$.post(
			"ajax_car_second_cat.php", {
				list_in_second_cat: list_in_second_cat
			},
			function (r) {
				//alert(r);
				$("#first_cat").show();
				$("#second_cat_ajax").html(r);
			}
		);
	} else {
		$("#first_cat").hide();
		$("#second_cat_ajax").html("");
	}
}

function fetch_subcat(id, id1) {
	var cc_id = $("#" + id1).val();
	//alert(cc_id);
	if (cc_id.trim() != '0') {
		$.ajax({
			url: 'fetch_car_subcat.php?cc_id=' + cc_id,
			type: 'post',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				//alert(response);
				$("#" + id).html(response);
			}
		});
	} else {
		$("#" + id).html("");
	}
}


function enable_field(action_id, own_id) {
	var check_value = $("#" + own_id).val();
	if (check_value.trim() == "0") {
		$("#subtitle_field").hide(500);
		$("#" + action_id).prop("disabled", true);
	} else {
		$("#subtitle_field").show(500);
		$("#" + action_id).prop("disabled", false);
		$("#1" + action_id).html("(<?php echo show_price_classifiedDb('subtitle');  ?> )");
	}
}

function enable_reserve_price(action_id, own_id) {
	var check_value = $('input[name=reserve_price]:radio:checked').val()
	if (check_value.trim() == "0") {
		$("#" + own_id).show(500);
		$("#" + action_id).prop("disabled", false);
		$("#1" + action_id).html("(<?php echo show_price_classifiedDb('reserve_price');  ?> )");
	} else {
		$("#" + own_id).hide(500);
		$("#" + action_id).prop("disabled", true);
	}
}

function enable_length_field(action_id1, action_id2) {
	var check_value = $('input[name=listing_duration]:radio:checked').val()
	//alert(check_value);
	if (check_value.trim() == "0") {
		$("#" + action_id1).prop("disabled", false);
		$("#" + action_id2).prop("disabled", true);
	} else {
		$("#" + action_id2).prop("disabled", false);
		$("#" + action_id1).prop("disabled", true);
	}
}


$(document).ready(function () {
	$("#submit_form").on('submit', (function (e) {
		$.ajax({
			url: "add_car_multiple_photo.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				alert(data);
				var data = data.split("||");
				window.data = data;
				//alert(data[1]);
				if (data[1].trim() == 1) {
					$("#ajax_form").html(data[0]);
					$("#ajax_fetch_form").show(1200);
				} else if (data[1].trim() == 'finish') {
					if (data[2].trim() == '606') {
						var query_info = '<?php $_SESSION["page_info"]="Sorry...listing features does not added successfully...due to low balance";  ?>';
					}
					alert("Item Added Successfully");
					window.location = "<?php echo $_SERVER['REQUEST_URI'];  ?>";
				} else if (data[1].trim() == '606') {
					required_alert('Low Balance...Please add balnce to your account', 'top-right', 'error');
				} else {
					alert("Something Went Wrong !!!");
				}
			},
			error: function () {}
		});

	}));

});

function switchListingType() {
	let listingType = $('#listing_type').val();
	if (listingType == '1') {
		$('#auction-block').show(500);
		$('#clasified-block').hide(500);
		$('#auction-block input').prop("disabled", false);
		$('#clasified-block input').prop("disabled", true);

	} else if (listingType == '0') {
		$('#clasified-block').show(500);
		$('#auction-block').hide(500);
		$('#clasified-block input').prop("disabled", false);
		$('#auction-block input').prop("disabled", true);
	}
}

$(document).ready(function () {
	$('#clasified-block').hide(500);
	$('#clasified-block input').prop("disabled", true);
})
</script>
<section id="main" class="clearfix">

    <div class="wrap row">

        <div class="breadcrumb breadcrumbs columns">
			<div class="breadcrumb-trail">
				<span class="trail-begin">
					<a href="index.php" title="Home" rel="home" class="trail-begin">Home</a>
				</span>
				<span class="sep">&raquo;</span>
				<span class="trail-begin">
					<a href="post_item.php">Submit Classified</a>
				</span>
				<span class="sep">&raquo;</span>
				<span class="trail-end">Car, Motobikes & Boats</span>
			</div>
        </div>
        <section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h3 class='page-title entry-title'>Cars, Motorbikes & Boats</h3>
                    <section class="entry-content">
						<div class="accordion" id="post-listing">

							<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
								<a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
								<div id="plan" class="content step-plan  active  clearfix">
									<div id="packagesblock-wrap" class="block">
										<div class="packageblock clearifx ">
											<ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
												<li>
													<div class="col-md-12 ">
														<div class="panel panel-default text-center" style="padding-right: 0px;">
															<div class="panel-heading">
																<h3 style="font-size: 19px;color: #E6A01B;">For Listing</h3>
															</div>
															<div class="panel-desc">
																<div class="panel-body">

																	<div class="moreinfo" style="font-size:0.9em;">
																		<?php echo show_price_listingDb('car');  ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
										<div class="packageblock clearifx ">
											<ul data-price="100" data-subscribed='0' data-id="16" data-type="2" class="packagelistitems ">
												<li>
													<div class="col-md-12 ">
														<div class="panel panel-default text-center" style="padding-right: 0px;">
															<div class="panel-heading">
																<h3 style="font-size: 19px;color: #E6A01B;">For Classified</h3>
															</div>
															<div class="panel-desc">
																<div class="panel-body">
																	<?php 
																	$price=show_price_classifiedDb('listed_in_second_cat');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Second Listed Category			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	<?php 
																	$price=show_price_classifiedDb('subtitle');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Sub-Title			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	<?php 
																	$price=show_price_classifiedDb('reserve_price');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Reserve Price			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('classified');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Classified			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('auction');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Auction			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('Feature_Combo');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Feature Combo			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('Featured');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Featured			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('Highlight');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Highlight			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('Bold_Title');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For Bold Title			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																	
																	<?php 
																	$price=show_price_classifiedDb('MotorWeb_Basic_Report');  
																	if($price!=""){
																	?>
																	<div class="moreinfo" style="font-size:0.9em;">
																		For MotorWeb Basic Report			(<?php echo $price; ?>)
																	</div>
																	<?php
																	}
																	?>
																
																
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
 
					<div id="first_cat" style="display:none;">
						<h3 style="color: #E6A01B;">First Category</h3>
					</div> 
					<div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;">
						<a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Listing Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
					</div> 
					<div class="form_row clearfix custom_fileds classified_tag ">
						<div class="span-select">
							<select size="7" id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x custom-size" >
								<?php
								$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0)));
								foreach($category as $k=>$v){
								?>
								<option value="<?php echo $v["cc_id"]; ?>" >
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
							<select size="7" id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" class="textfield textfield_x custom-size" >
							</select>
						</div>
					</div>

					<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
						<a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Listing Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
					</div> 

					<div class="form_row clearfix custom_fileds  owner_name">

						<label class=r_lbl>Number Plate/ VIN :<span class="required">*</span></label>
							<input name="number_plate" id="number_plate" value="" type="text" class="textfield "  placeholder=" "/>
						
					</div>
					<!-- <div class="form_row clearfix custom_fileds classified_tag ">
						<label class=>Sub Category</label>                
							<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x " >
								<option value=" ">Select</option>
							</select>
					</div>
					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=>Sub Sub Category</label>                
							<select id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" class="textfield textfield_x " >
								<option value=" ">Select</option>
							</select>
					</div> -->

					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=''>Listing Type</label>                
							<select id="listing_type" name="listing_type"  class="textfield textfield_x " onchange="switchListingType();">
								<option value="1">Run an Auction</option>
								<option value="0">List a Classified</option>
							</select>
					</div>
					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=''>Continue with only one category</label>                
							<select id="list_in_second_cat" name="list_in_second_cat" onchange="second_cat_field();" class="textfield textfield_x " >
								<option value="0">Continue with only one category</option>
								<option value="1">List in a second category to be seen in more places</option>
							</select>
					</div>
					<div id="second_cat_ajax">
					
					</div>
			
 			
					<div class="form_row clearfix custom_fileds  owner_name">

						<label class=r_lbl>Listing Title :<span class="required">*</span></label>
							<input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
						<span id="owner_name_error " class="message_error2 "></span>     
					</div>
			
					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=>Subtitle :</label>                
							<select id="subtitle"  onchange="enable_field('subtitle1','subtitle');"  class="textfield textfield_x " >
								<option value="0" selected >No Subtitle</option>
								<option value="2">Add Subtitle</option>
							</select>
					</div>
			
					<div class="form_row clearfix custom_fileds  owner_name"  style="display:none;" id="subtitle_field">
					<?php
					$chrg=show_price_classifiedDb('subtitle');
					?>
						<label class=r_lbl>Sub-Title <?php  if($chrg !=""){ ?><span style="color: #E6A01B;">(<?php echo $chrg;  ?>)</span><?php } ?></label>
							<input name="subtitle" disabled id="subtitle1" value="" type="text" class="textfield "  placeholder=" "/>
						<span id="owner_name_error " class="message_error2 "></span>     
					</div>
			
					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=>Brand New Item(Items) :</label>                
							<select id="brand_item" name="brand_item" class="textfield textfield_x " >
								<option value="0">Select</option>
								<option value="1">Item Used</option>
								<option value="2">Unused</option>
							</select>
					</div>
			
					<div id="auction-block">
						<div class="form_row clearfix custom_fileds  owner_name">
							<label class=r_lbl>Start Price :<span class="required">*</span></label>
								<input name="start_price" id="start_price" value="" type="text" class="textfield "  placeholder=" "/>
							<span id="owner_name_error " class="message_error2 "></span>     
						</div>
						
						<div class="form_row clearfix custom_fileds  price_type">
						<label class=>Reserve price :<span class="required">*</span></label>
						<div class="form_cat_left">
							<ul class="hr_input_radio">
								<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');" checked id="reserve_price1" type="radio" value="1" checked="checked"   /> <label for="price_type_1">Same as the start price</label></li>
								<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');"  id="reserve_price2" value="0" type="radio"   /> <label for="price_type_2">Specify a reserve</label></li>
							</ul>
						</div>
						<span id="price_type_error" class="message_error2"></span> 
						</div> 
						<?php
						$chrg=show_price_classifiedDb('reserve_price');
						?>
						<div class="form_row clearfix custom_fileds  owner_name"  style="display:none" id="reserve_price">
							<label class=r_lbl>Reserve Price  :<?php  if($chrg !=""){ ?><span style="color: #E6A01B;">(<?php echo $chrg;  ?>)</span><?php } ?></label>
								<input name="custom_reserve_price" disabled id="custom_reserve_price" value="" type="text" class="textfield "  placeholder=" "/>
							<span id="owner_name_error " class="message_error2 "></span>     
						</div>
						
						<div class="form_row clearfix custom_fileds  owner_name">
							<label class=r_lbl>Buy Now :<span class="required">*</span></label>
								<input name="buy_now" id="buy_now" value="" type="text" class="textfield "  placeholder=" "/>
							<span id="owner_name_error " class="message_error2 "></span>     
						</div>
						
						<div class="form_row clearfix custom_fileds  price_type">
						<label class=>Allow Bid From :<span class="required">*</span></label>
						<div class="form_cat_left">
							<ul class="hr_input_radio">
								<li><input  name="allow_bid[]" value="1" style="margin-top:0px;" type="checkbox" value="fixed" checked="checked"   /> <label for="price_type_1">Authenticated Members only</label></li>
							</ul>
						</div>
						<span id="price_type_error" class="message_error2"></span> 
						</div>
					</div>
					<div id="clasified-block">
						<div class="form_row clearfix custom_fileds  owner_name">
							<label class=r_lbl>Ask Price :<span class="required">*</span></label>
								<input name="start_price" id="start_price" value="" type="text" class="textfield "  placeholder=" "/>
							<span id="owner_name_error " class="message_error2 "></span>     
						</div>	
						<div class="form_cat_left">
							<ul class="hr_input_radio">
								<li><input  name="near_offer" value="1" style="margin-top:0px;" type="checkbox"   /> <label for="price_type_1">Or near offer</label></li>
							</ul>
						</div>
					</div>
			
					<div class="form_row clearfix custom_fileds  price_type">
					<label class=>Listing Duration :<span class="required">*</span></label>
					<div class="form_cat_left">
						<ul class="hr_input_radio">
							<li><input name="listing_duration" onclick="enable_length_field('listing_length','datepicker2')" checked id="listing_duration1" value="0" type="radio"  /> <label for="price_type_1">Fixed Length</label></li>
						<!--	<li><input name="listing_duration"  onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration2" value="1" type="radio"    /> <label for="price_type_2">Choose End Time</label></li>-->
						</ul>
					</div>
					<span id="price_type_error" class="message_error2"></span> 
					</div> 
			
					<div class="form_row clearfix custom_fileds classified_tag ">
						<label class=>Select Length :</label>                
							<select id="listing_length" name="listing_length" class="textfield textfield_x " >
								<?php if(isOnTrial()):?>
									<option value="14">14 Days</option>
								<?php else:?>
									<option value="0">Select</option>
									<option value="2">2 Days</option>
									<option value="3">3 Days</option>
									<option value="4">4 Days</option>
									<option value="5">5 Days</option>
									<option value="6">6 Days</option>
									<option value="7">7 Days</option>
									<option value="8">8 Days</option>
									<option value="9">9 Days</option>
									<option value="10">10 Days</option>
									<option value="14">14 Days</option>
								<?php endif;?>
							</select>
					</div>
			
				<div class="form_row clearfix custom_fileds  owner_name">
				<!--    <label class=r_lbl>Select Length :<span class="required">*</span></label>
						<input  id="datepicker2" readonly  disabled name="listing_length"  value="" type="text" class="textfield "  placeholder=" "/>-->
					<span id="owner_name_error " class="message_error2 "></span>     
				</div>
			<div class="form_row clearfix custom_fileds  post_content">
			<!--	<label class=>Item Details : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="item_desc" name="item_desc" ></textarea></div>-->
							<span id="address_error" class=""></span>
					</div>
			</div>
			
			<input type="hidden" name="next_form" value="photo_upload" />
			<input type="hidden" name="db_name" value="add_car_motorcycle" />
			
			
			<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
			
			
		
                                        
    <!--    <div class="form_row clearfix custom_fileds  price">
                   <div class="sec_title">
                   <h3>Price(IN USD $)<span class="required">*</span></h3>
                   </div>
              <input name="price" id="price" value="" type="text" class="textfield "  placeholder=" "/>
		
		</div>  -->  
				   
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
//include_once("include/date_footer.php");
?>