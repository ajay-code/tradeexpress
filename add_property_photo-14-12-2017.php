<?php
session_start();
require_once("function.php");
$next_form=trim($_POST["next_form"]);
$db_name=trim($_POST['db_name']);
unset($_POST["next_form"]);
unset($_POST["db_name"]);
?>

<!--  PHOTO UPLOAD FORM  -->
<?php if($next_form=='photo_upload'){ ?>
	<!-- style="display:none;" -->
	<style>
		.image-label {
			border: 1px solid #c26500;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			font-size: 12px;
			font-family: arial,
			helvetica, sans-serif;
			padding: 10px 10px 10px 10px;
			text-decoration: none;
			display: inline-block !important;
			font-weight: bold;
			color: #c26500 !important;
			background-color: #ffd65e;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#ffd65e), to(#febf04));
			background-image: -webkit-linear-gradient(top, #ffd65e, #febf04);
			background-image: -moz-linear-gradient(top, #ffd65e, #febf04);
			background-image: -ms-linear-gradient(top, #ffd65e, #febf04);
			background-image: -o-linear-gradient(top, #ffd65e, #febf04);
			background-image: linear-gradient(to bottom, #ffd65e, #febf04);
			filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffd65e,
			endColorstr=#febf04);
		}
		.text-color{
			color: #000096;
		}
		.r_lbl{
			padding: 10px;
		}
	</style>
	<div id="ajax_fetch_form" style="display:none;">
		<div class="form_row clearfix custom_fileds  owner_name  text-color">
			<label class="r_lbl">
				Photos
			</label>
			<div class="row" style="background:#efe6a9;padding:50px 20px;">
				<p style="text-align:center;font-size:14px;">You can add up to 20 photos for free</p>
				<div class="col-md-12 col-sm-12" style="text-align: center; margin-bottom: 10px;">
					<label for="image" class="image-label">Add Photos</label>
					<input id="image" name="image[]" multiple value="" type="file" class="textfield " placeholder=" " style="margin:0 auto;display:none;"
					/>
				</div>
				<br/>
				<p style="text-align:center;font-size:14px;">File format is JPEG, PNG or GIF. Use high quality image up to 500 pixels</p>
			</div>
		</div>
		<div class="form_row clearfix custom_fileds  owner_name text-color">
			<label class="r_lbl">
				Video Link
			</label>
			<div class="row" style="background:#efe6a9;padding:50px 20px;">
				<div class="col-md-12 col-sm-12" style="text-align: center; margin-bottom: 10px;">
					<input name="video" id="video" value="" type="text" class="textfield " placeholder=" "  style="height:36px; width:320px"/> 
					<span class="image-label" style="padding:10px 20px 4px 20px">Add Video</span>  
				</div>
				<br/>
				<p style="text-align:center;font-size:14px;">Add one you tube video to your listing. Paste the URL into the box above.</p>
			</div>

		</div>
		<!--input type="hidden" name="next_form" value="extra_field" /-->
		<input type="hidden" name="next_form" value="special_features_and_price" />
		<input type="hidden" name="db_name" value="add_property_photo" />
		<input type="submit" class="btn btn-lg btn-primary button select-plan" value="Continue">
	</div>
<?php } ?>
<!-- END PHOTO UPLOAD FORM  -->
<!--  EXTRA FIELD FORM  -->
<?php if($next_form=='extra_field'){ ?>
	<div id="ajax_fetch_form" style="display:none;">
		<?php
			$select="cat_id,sub_cat_id,sub_sub_cat_id";
			$category_ids=getDetails(doSelect1($select,"add_property",array("ap_id"=>$_SESSION["recent_id"])));
			$in_ids="";
			foreach($category_ids as $k=>$v){
				foreach($v as $k2=>$v2){
					if(trim($k2) !='cat_id'){
						$in_ids.=',';	
					}
					$in_ids.=$v2;
				}
			}
			$select="pcef_id,extra_field_type,label_name,field_name,value_no,value";
			$from="property_cat_extra_field";
			$con=array("pc_id"=>$in_ids);
			$field_dtls=getDetails(selectWhereIn($select,$from,$con));
		?>
			<div class="sec_title"><h3>Extra Field<span class="required"></span></h3></div>
				<?php foreach($field_dtls as $k=>$v){ 	
					if(trim($v["extra_field_type"])=="1"){
				?>
					<div class="form_row clearfix custom_fileds classified_tag ">
						<div class="col-sm-4">
								<label class=><?php echo $v["label_name"];  ?>:</label>                

						</div>
						<div class="col-sm-8">
							<select id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>" class="textfield textfield_x " >
								<option value="0">Select</option>
								<?php
									for($i=0;$i< $v["value_no"];$i++){
										$value=explode("||",$v["value"]);
										$field_value=explode("::",$value[$i]);
								?>
									<option value="<?php echo $field_value[0];  ?>"><?php echo $field_value[1];  ?></option>
								<?php }	?>
							</select>

						</div>
					</div>
					<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
				<?php } ?>
				<?php if(trim($v["extra_field_type"])=="2"){ ?>
				<?php
					for($i=0;$i< $v["value_no"];$i++){
						$value=explode("||",$v["value"]);
						$field_value=explode("::",$value[$i]);
				?>
					<div class="form_row clearfix custom_fileds  price_type">
						<label class=><?php echo $v["label_name"];  ?><span class="required">*</span></label>
						<div class="form_cat_left">
							<ul class="hr_input_radio">
								<li><input name="<?php echo $v["field_name"]; ?>[]" value="<?php echo $field_value[0];  ?>" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1"><?php echo $field_value[1];  ?></label></li>
							</ul>
						</div>
					</div>
				<?php } 	?>
				<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
			<?php } ?>
			<br/>
			<?php if(trim($v["extra_field_type"])=="3"){ ?>
				<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl><?php echo $v["label_name"];  ?> :<span class="required">*</span></label>
                    <input name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" value="" type="text" class="textfield "  placeholder=" "/>
				</div>
				<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
			<?php } ?>
			<?php if(trim($v["extra_field_type"])=="4"){ ?>
<div class="form_row clearfix custom_fileds  post_content">
				<label class=><?php echo $v["label_name"];  ?> : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" ></textarea></div>
					</div>
</div>

<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
<?php
}
?>


<?php	
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_property_extra_field" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
</div>
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->

<!--  SPECIAL FEATURES FORM  -->
<?php if($next_form=='special_features_and_price'){ ?>
	<div id="ajax_fetch_form" style="display:none;">	
		<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">		
			<a class="step-heading active" href="javascript:void(0);">			
				<span><input type="radio" name="Feature_Combo" value="1"></span>			
				<span>Feature Combo<?php echo show_price_classifiedDb('Feature_Combo');  ?></span>			
				<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>		
			</a>        
			<div id="plan" class="content step-plan  active  clearfix">            
				<div id="packagesblock-wrap" class="block">                
					<div class="packageblock clearifx ">					
						<ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">						
							<li>							
								<div class="col-md-12 col-sm-12">								
									<div class="panel panel-default text-center" style="padding-right:0;">								
										<div class="panel-heading"><h3>Free</h3></div>								
										<div class="panel-desc">									
											<div class="panel-body">										
												<span class="days"><p><strong>2.5 times more view and watchlist add than basic listing</strong></p></span>	<span class="days"><p><strong>Appear first result search in category</strong></p></span>				
												<span class="days"><p><strong>Distictive yellow background</strong></p></span>						
												<span class="days"><p><strong>Bright yellow border</strong></p></span>										<span class="days"><p><strong>Bold Title</strong></p></span>										
											</div>
										</div>								
									</div>							
								</div>						
							</li>					
						</ul>				
					</div>            
				</div>       
			</div>	
		</div>	<br/>	<br/>	
		<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">		
			<a class="step-heading active" href="javascript:void(0);">			
				<span><input type="radio" name="Feature_Combo" value="2"></span>			
				<span> Featured <?php echo show_price_classifiedDb('Featured');  ?></span>			
				<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>		
			</a>		
			<div id="plan" class="content step-plan  active  clearfix">			
				<div id="packagesblock-wrap" class="block">				
					<div class="packageblock clearifx ">					
						<ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">						
							<li>							
								<div class="col-md-12 col-sm-12">								
									<div class="panel panel-default text-center" style="padding-right:0;">									
										<div class="panel-heading">										
											<h3>Free</h3>									
										</div>									
										<div class="panel-desc">										
											<div class="panel-body">											
												<span class="days"><p><strong>Appear first result search in category</strong></p></span>			
												<span class="days"><p><strong>Distictive yellow background</strong></p></span>					
											</div>									
										</div>								
									</div>							
								</div>						
							</li>					
						</ul>                
					</div>            
				</div>		
			</div>	
		</div>	<br/>	<br/>	
		<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">		
			<a class="step-heading active" href="javascript:void(0);">			
				<span><input type="radio" name="Feature_Combo" value="3"></span>			
				<span>Highlight <?php echo show_price_classifiedDb('Highlight');  ?></span>			
				<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>		
			</a>        
			<div id="plan" class="content step-plan  active  clearfix">            
				<div id="packagesblock-wrap" class="block">				
					<div class="packageblock clearifx ">					
						<ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">						
							<li>							
								<div class="col-md-12 col-sm-12">								
									<div class="panel panel-default text-center" style="padding-right:0;">									
										<div class="panel-heading"><h3>Free</h3></div>									
										<div class="panel-desc">										
											<div class="panel-body">											
												<span class="days"><p><strong>Stand Out Search result with yellow background</strong></p></span>
											</div>									
										</div>								
									</div>							
								</div>						
							</li>					
						</ul>                
					</div>            
				</div>        
			</div>	
		</div>	<br/>	<br/>	
		<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">		
			<a class="step-heading active" href="javascript:void(0);">			
				<span><input type="radio" name="Feature_Combo" value="4"></span>			
				<span>Bold Title <?php echo show_price_classifiedDb('Bold_Title');  ?></span>			
				<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>		
			</a>        
			<div id="plan" class="content step-plan  active  clearfix">            
				<div id="packagesblock-wrap" class="block">				
					<div class="packageblock clearifx ">					
						<ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">						
							<li>							
								<div class="col-md-12 col-sm-12">								
									<div class="panel panel-default text-center" style="padding-right:0;">									
										<div class="panel-heading"><h3>Free</h3></div>									
										<div class="panel-desc">										
											<div class="panel-body">											
												<span class="days"><p><strong>Stand Out Search result with Bold Title</strong></p></span>		
											</div>									
										</div>								
									</div>							
								</div>						
							</li>					
						</ul>				
					</div>           
				</div>        
			</div>	
		</div>	
		<input type="hidden" name="next_form" value="finish1" />	
		<input type="hidden" name="db_name" value="add_property_listing_features" />	
		<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
	</div>
<?php } ?>
<!-- END SPECIAL FEATURES FORM  -->
<?php if($next_form=='finish1'){ ?>
	<div id="ajax_fetch_form" style="display:none;">
		<div class="container" style="width:100%;" id="property-preview">
			<!--h2>Striped Rows</h2-->
			<style>
				.first-columns{width:25%;font-weight:400;}
				.heading {
					background: #fbcc48;
					color: #fff;
					font-size: 18px;
					font-weight: 700;
				}
				.property-cols{margin-right:5px;}
				.table.table-striped img.photo-gallery {
					max-height: 180px;
					padding: 5px;
					width: 19%;
				}
			</style>
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="2" class="heading">Listing Details:</th>
					</tr>
				</thead>
				<tbody>
					<?php $propertyId=  isset($_SESSION["recent_id"])?$_SESSION["recent_id"]:0;
						$listing_featuredId= isset($_REQUEST["listing_featuredId"])? $_REQUEST["listing_featuredId"]:0;
						
						$feature_Combo1= 'X';
						$featured= 'X';
						$highlight= 'X';
						$bold_title= 'X';
						$classifiedPrice= 0;
						if(!empty($listing_featuredId)){
							if($listing_featuredId == 1){
								$feature_Combo1= show_price_classifiedDb123('Feature_Combo');
								$classifiedPrice= $feature_Combo1;
							}else if($listing_featuredId == 2){
								$featured= show_price_classifiedDb123('Featured');
								$classifiedPrice= $featured;
							}else if($listing_featuredId == 3){
								$highlight= show_price_classifiedDb123('Highlight');
								$classifiedPrice= $highlight;
							}else if($listing_featuredId == 4){
								$bold_title= show_price_classifiedDb123('Bold_Title');
								$classifiedPrice= $bold_title;
							}else{
								$classifiedPrice=0;
							}
						} 
						$listingPrice= show_price_propertyPriceDB('property');
						$totalProperyPrice= ($classifiedPrice + $listingPrice);
						$userAvaibaleBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
						
						if(!empty($propertyId)){
							$getPropertyDetails=getDetails(doSelect("cat_id, sub_cat_id, sub_sub_cat_id, listing_title,listing_duration, street, rateable_value, unit_flat, street_name, rateable_value, rateable_value_hide, expected_sale_price, bedroom, bathroom, floor_area, land_area, open_home_date, open_home_strt_time, open_home_end_time, prop_desc, parking, amenities, smoke_alarm, agency_reference, posting_date, posting_status, classified_status, listing_featuredId","add_property",array("ap_id"=>$propertyId)));
							if(count($getPropertyDetails) > 0){
								foreach($getPropertyDetails as $getPropertyDetailsData){
					?>
									<tr>
										<td class="first-columns">Listing Title</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['listing_title'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Listing Duration</td>
										<td class="second-columns"><span class="property-cols">:</span>
											<?php echo isset($getPropertyDetailsData['listing_duration'])? $getPropertyDetailsData['listing_duration']:'';;?>
											<?php echo !empty($getPropertyDetailsData['listing_duration'])?'Days':''; ?>
										</td>
									</tr>
									
									<tr>
										<td class="first-columns">Property Address</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['street'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Rateable Value</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['rateable_value'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Hide Rateable Value</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['rateable_value_hide'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Price</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['expected_sale_price'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Bedroom</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['bedroom'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Bathroom</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['bathroom'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Floor Area</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['floor_area'];?></td>
									</tr>
									<tr>
										<td class="first-columns">Land Area</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['land_area'];?></td>
									</tr>
									<tr>
										<td class="first-columns" colspan="2">Details:</td>
									</tr>
									<tr>
										<td colspan="2"><?php echo $getPropertyDetailsData['prop_desc'];?></td>
									</tr>
									<tr>
										<td colspan="2" class="heading">Open Hone Details</td>
									</tr>
									<tr>
										<td class="first-columns">Date</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo get_date_str($getPropertyDetailsData['posting_date']) ;?></td>
									</tr>
									<tr>
										<td class="first-columns">Start Date</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['open_home_strt_time'];?></td>
									</tr>
									<tr>
										<td class="first-columns">End Date</td>
										<td class="second-columns"><span class="property-cols">:</span><?php echo $getPropertyDetailsData['open_home_end_time'];?></td>
									</tr>
									<tr>
										<td colspan="2" class="heading">Photo Details</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php 
												$getPropertyPhoto=getDetails(doSelect("ap_id, image","add_property_photo",array("ap_id"=>$propertyId)));
												
												if(count($getPropertyPhoto) > 0){
													$k=0;
													foreach($getPropertyPhoto as $getPropertyPhotoData){ 
													
											?>
												<img src="property_image/<?php echo $getPropertyPhotoData['image'];?>" alt="" class="photo-gallery"> 
											<?php $k++; } } else { ?>
												<img src="images/classifieds.jpg" alt="" class="photo-gallery"> 
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="heading">Extras</td>
									</tr>
									
									<tr>
										<td class="first-columns">Featured Listing</td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php echo $feature_Combo1;?></td>
									</tr>
									<tr>
										<td class="first-columns">Bold Title</td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php echo $bold_title;?></td>
									</tr>
									<tr>
										<td class="first-columns">Highlight</td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php echo $highlight;?></td>
									</tr>
									<tr>
										<td class="first-columns">Feature Combo</td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php echo $featured;?></td>
									</tr>
									<tr>
										<td class="first-columns">Category Listing Fee</td>
										<td class="second-columns"><span class="property-cols">:</span>$ <?php echo sprintf("%.2f", $listingPrice);
										?></td>
									</tr>
									<tr>
										<td class="first-columns">Total Fee</td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php echo sprintf("%.2f", $totalProperyPrice);
										?>
										<input type="hidden" value="<?php echo sprintf("%.2f", $totalProperyPrice);?>" name="total_charge_amount" readonly="readonly"/>
										
										</td>
									</tr>
									<tr>
										<td class="first-columns">My Account Balance<br/><span style="font-size:12px;">Before fees are deducted</span></td>
										<td class="second-columns"><span class="property-cols">:</span>$<?php $remanongBalace= (get_cus_acnt_balance($_SESSION["ar_id"])); 
										echo sprintf("%.2f", $remanongBalace);
										?></td>
									</tr>
									
					<?php     	}
								
							}
						}
					?>
					
					
				</tbody>
			</table>
			<?php
				$totalProperyPrice= ($classifiedPrice + $listingPrice);
				$userAvaibaleBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
				if($totalProperyPrice > $userAvaibaleBalance){
			?>
				<div class="row">
					<div class="col-md-12 col-sm-12">								
						<div class="panel panel-default text-center" style="padding-right:0;">									
							<div class="panel-heading"><h3>Sorry you have not enough credit to pay for this listing.</h3></div>									
							<div class="panel-desc" style="padding-bottom: 40px;">										
								<div class="panel-body">
									<div class="row" style="text-align:center;">
										<img src="images/paypal.png" alt="paypal" style="width:20%"/>
									</div>
									<p style="text-align:center;"><strong>Top up your Trade express account now by Pay Pal</strong></p>
									
								</div>
								<p style="text-align:center;"><span style="font-size: 18px;font-weight:400;">$<?php $differnece= ($totalProperyPrice - $userAvaibaleBalance); echo sprintf("%.2f", $differnece);?></span><a href="#"><span style="margin-left: 10px;border: 1px solid #ddd;padding: 5px 15px;">Next &gt;</span></a></p>
																
							</div>								
						</div>							
					</div>	
				
				</div>
				
			<?php
				}else{
			?>
				<input type="hidden" name="next_form" value="finish" />
				<input type="hidden" name="db_name" value="finish" />
				<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Finish" >
			<?php } ?>
		</div>

		
		
	</div>
<?php } ?>
<?php
	if($db_name=="finish"  && isset($_SESSION["recent_id"])){
		$totalChargeAmount= isset($_POST['total_charge_amount'])?$_POST['total_charge_amount']:'';
		$availableBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
		$recent_id = $_POST["ap_id"]=$_SESSION["recent_id"];	
		
		if($totalChargeAmount > $availableBalance){
			echo ' || balance ';	
		}else{
			$now_blnce=$availableBalance-$totalChargeAmount;
			$transaction_id=generateRandomString(5).time();
			$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$totalChargeAmount,"type"=>"Debited","for_what"=>"add_property ||".$recent_id);
			$status=doInsert($field,'paypal_transaction_table');				
			doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));
			$update_data= array('status'=> '1', 'posting_status'=>'1');
			doUpdate("add_property",$update_data,array("ap_id"=>$_POST["ap_id"]));	
			unset($_SESSION["recent_id"]);
			echo ' || finish ';
		}
		
	}
?>

<?php
	if($db_name=="add_property"){	
	$charge_fee=0;	
	/* $acnt_exist=count_acnt_days($_SESSION["ar_id"]);	
	if($acnt_exist==1){		
		if (is_numeric(show_price_listingDb_numeric('property'))){  			
			$charge_fee=$charge_fee + show_price_listingDb_numeric('property');		
		}		
		if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){			
			echo ' || 606';			
			die();		
		}	
	} */	
	/* $listing_duration=explode("-",$_POST["listing_duration"]);	
	$listing_duration=$listing_duration[2].'-'.$listing_duration[1].'-'.$listing_duration[0]; 
	$_POST["listing_duration"]=$listing_duration;	*/
	unset($_POST["country"]);	
	unset($_POST["city"]);	
	unset($_POST["suburb"]);	
	$price_table_field=array();	
	$price_type=trim($_POST["price"]);	
	$price_table_field["price_type"]=$price_type;	
	$price_table_field["label_name"]=$_POST["price".$price_type][0];	
	if($price_type=='3' || $price_type=='4' || $price_type=='6'){	
		$value=explode("-",$_POST["price".$price_type][1]);		
		$value=$value[2].'-'.$value[1].'-'.$value[0];		
		$price_table_field["value"]=str_replace("-"," ", $value);	
	}else{		
		$price_table_field["value"]=$_POST["price".$price_type][1];		
	} 	
	unset($_POST["price"]);
	unset($_POST["price".$price_type]);
	unset($price_type);	
	$contact_table_field=array();	
	if(trim($_POST["contact_type"])==1){		
		$contact_table_field["contact_type"]=trim($_POST["contact_type"]);		
		$contact_table_field["realestate_agent"]=trim($_POST["realestate_agent"]);		
		$contact_table_field["name"]=trim($_POST["name"]);		
		$contact_table_field["agency"]=trim($_POST["agency"]);		
		$contact_table_field["mobile"]=trim($_POST["mobile"]);		
		$contact_table_field["landline"]=trim($_POST["landline"]);		
		unset($_POST["realestate_agent"]);	
	}else{		
		$contact_table_field["contact_type"]=trim($_POST["contact_type"]);		
		$contact_table_field["name"]=trim($_POST["name"]);		
		$contact_table_field["agency"]=trim($_POST["agency"]);		
		$contact_table_field["mobile"]=trim($_POST["mobile"]);		
		$contact_table_field["landline"]=trim($_POST["landline"]);	
	}	
	
	$open_home_date=explode("-",$_POST["open_home_date"]);	
	$open_home_date=$open_home_date[2].'-'.$open_home_date[1].'-'.$open_home_date[0];	
	$_POST["open_home_date"]=$open_home_date;	
	$_POST["uploader"]=$_SESSION["ar_id"];

	if(isset($_FILES) AND !empty($_FILES)){
		$logo_name=time().rand(10,1000).$_FILES["logo"]["name"];
		$tmp_name=$_FILES["logo"]["tmp_name"];	
		$status=move_uploaded_file($tmp_name,"logo/".$logo_name);
		if($status){					
			$_POST['logo']= $logo_name;				
		}
	}


	
	$status=doInsert($_POST,"add_property");	
	$recent_id= newly_insert_id();	
	$_SESSION["recent_id"]=$recent_id;	
	if($status){		
		if($charge_fee > 0){			
			$transaction_id=generateRandomString(5).time();			
			$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_property ||".$recent_id);			
			$status=doInsert($field,'paypal_transaction_table');						
			if($status){				
				$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);				
				$now_blnce=$prev_acnt_blnce-$charge_fee;				
				doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));
			}					
		}		
		$price_table_field["ap_id"]=$recent_id;		
		$status=doInsert($price_table_field,"add_property_price_dtls");		
		if($status){			
			$contact_table_field["ap_id"]=$recent_id;			
			$status=doInsert($contact_table_field,"add_property_contact_dtls");			
			if($status){				
				echo ' || 1';			
			}else{				
				echo ' || 0';			
			}			
		}else{			
			echo ' || 0';		
		}	
	}else{		
		echo ' || 0';	
	}
}
?>
	
	<?php	if($db_name=="add_property_photo"){		
		if(isset($_FILES)  && isset($_SESSION["recent_id"])){			
			foreach($_FILES["image"]["name"] as $k=>$v){				
				$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];				
				$tmp_name=$_FILES["image"]["tmp_name"][$k];				
				$status=move_uploaded_file($tmp_name,"property_image/".$image_name);				
				if($status){					
					$field=array("ap_id"=>$_SESSION["recent_id"],"image"=>$image_name);					
					doInsert($field,"add_property_photo");				
				}			
			}			
			if(isset($_POST["video"]) && trim($_POST["video"])!=""){				
				$field=array("ap_id"=>$_SESSION["recent_id"],"video"=>trim($_POST["video"]));				
				doInsert($field,"add_property_video");			
			}			
			echo ' || 1';		
		}else{			
			echo ' || 0';		
		}	
	}
?>


<?php
if($db_name=="add_property_extra_field"  && isset($_SESSION["recent_id"])){
	$_POST=array_chunk($_POST,2,true);
	foreach($_POST as $k8=>$v8){
	foreach($v8 as $k=>$v){	
	if(is_array($v)){
		$value="";
		foreach($v as $k1=>$v1){
			if($k1 != 0){
				$value.=' || ';
			}
		$value.=$v1;	
		}
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('pcef_id'=>$updtd_id,"value"=>$value,"ap_id"=>$_SESSION["recent_id"]);
		doInsert($field,$db_name);
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('pcef_id'=>$updtd_id,"value"=>$v,"ap_id"=>$_SESSION["recent_id"]);
		doInsert($field,$db_name);
	}
	break;
	}
	}
	doUpdate("add_property",array("posting_status"=>0),array("ap_id"=>$_SESSION["recent_id"]));
	echo ' || 1';
}
?>

<?php
if($db_name=="add_property_listing_features"  && isset($_SESSION["recent_id"])){
	$listing_featuredId= isset($_POST["Feature_Combo"])?$_POST["Feature_Combo"]:0;	
	$_POST["ap_id"]=$_SESSION["recent_id"];	
	$charge_fee=0;		
	$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
	/* 
	if($acnt_exist==1){				
		if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="1"){						
			if(is_numeric(show_price_classifiedDb_numeric('Feature_Combo'))){								
				$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Feature_Combo');							
			}					
		}				
		if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="2"){						
			if(is_numeric(show_price_classifiedDb_numeric('Featured'))){								
				$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Featured');							
			}					
		}				
		if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="3"){						
			if(is_numeric(show_price_classifiedDb_numeric('Highlight'))){								
				$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Highlight');							
			}					
		}				
		if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="4"){						
			if(is_numeric(show_price_classifiedDb_numeric('Bold_Title'))){								
				$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Bold_Title');							
			}					
		}				
		if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){						
			doInsert(array("ap_id"=>$_SESSION["recent_id"]),$db_name);						
									
			echo ' || 1 || 606';						
			die();				
		}				
	}	 */
	doInsert($_POST,$db_name);			
	/* if($charge_fee > 0){					
		$transaction_id=generateRandomString(5).time();					
		$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_property ||".$recent_id);					
		$status=doInsert($field,'paypal_transaction_table');					
		if($status){							
			$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);							
			$now_blnce=$prev_acnt_blnce-$charge_fee;							
			doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));						
		}	
	}	 */		
	$update_position= array('positions'=> '1', 'listing_featuredId'=> $listing_featuredId);			
	doUpdate("add_property",$update_position,array("ap_id"=>$_POST["ap_id"]));			
	//unset($_SESSION["recent_id"]);	
	
	echo ' || 2';
	echo ' || ';
	echo $listing_featuredId;
	exit();
}
?>

