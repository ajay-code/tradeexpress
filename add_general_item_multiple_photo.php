<?php
session_start();
require_once("function.php");
//print_r($_POST);
$next_form=trim($_POST["next_form"]);
$db_name=trim($_POST['db_name']);
unset($_POST["next_form"]);
unset($_POST["db_name"]);
?>
<!--  PHOTO UPLOAD FORM  -->
<?php
if($next_form=='photo_upload'):
?>
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
<div id="first_cat" class="section-title">
<h3>Listing Photo</h3>
</div>  
<div class="form_row clearfix custom_fileds  owner_name">

				<label class=r_lbl>Select Multiple Photo :<span class="required">*</span></label>
				<div class="row" style="background:#efe6a9;padding:50px 20px;">
					<p style="text-align:center;font-size:14px;">You can add up to 20 photos for free</p>
					<div class="col-md-12 col-sm-12" style="text-align: center; margin-bottom: 10px;">
						<label for="image" class="image-label">Add Photos</label>
						<input  id="image"  name="image[]" multiple  value="" type="file" class="textfield hide"  placeholder=" "/>
					</div>
					<br/>
					<p style="text-align:center;font-size:14px;">File format is JPEG, PNG or GIF. Use high quality image up to 500 pixels</p>
				</div>
				<span id="owner_name_error " class="message_error2 "></span>     
</div>


<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_general_items_photo" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >

</div>
<?php // echo ' || 1 || ' ?>
<?php
endif;
?>
<!-- END PHOTO UPLOAD FORM  -->


<!--  EXTRA FIELD FORM  -->
<?php
if($next_form=='extra_field'){
?>
<div id="ajax_fetch_form" style="display:none;">
<?php
$select="cat_id,sub_cat_id,sub_sub_cat_id,sub_sub_sub_cat_id";
$category_ids=getDetails(doSelect1($select,"add_general_items",array("agi_id"=>$_SESSION["recent_id"])));
$in_ids="";
/* echo '<pre>';
print_r($category_ids);
echo '</pre>'; */
foreach($category_ids as $k=>$v){
	foreach($v as $k2=>$v2){
		if(trim($k2) !='cat_id'){
		$in_ids.=',';	
		}
		$in_ids.=$v2;
	}
}
$select="gcef_id,extra_field_type,label_name,field_name,value_no,value";
$from="general_cat_extra_field";
$con=array("gic_id"=>$in_ids);
$field_dtls=getDetails(selectWhereIn($select,$from,$con));
?>
<div class="sec_title">
                   <h3>Extra Field<span class="required"></span></h3>
</div>
<?php
foreach($field_dtls as $k=>$v){
?>

<?php
if(trim($v["extra_field_type"])=="1"){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=><?php echo $v["label_name"];  ?>:</label>                
					<select id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
						for($i=0;$i< $v["value_no"];$i++){
							$value=explode("||",$v["value"]);
							$field_value=explode("::",$value[$i]);
						?>
						<option value="<?php echo $field_value[0];  ?>"><?php echo $field_value[1];  ?></option>
						<?php
						}
						?>
					</select>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="2"){
?>
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
	<?php
	}
	?>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />

<?php
}
?>
<br/>
<?php
if(trim($v["extra_field_type"])=="3"){
?>

<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl><?php echo $v["label_name"];  ?> :<span class="required">*</span></label>
                    <input name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" value="" type="text" class="textfield "  placeholder=" "/>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />

<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="4"){
?>

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
<input type="hidden" name="next_form" value="summary" />
<input type="hidden" name="db_name" value="add_general_items_extra_field" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Finish" >
</div>
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->
<?php if($next_form == 'summary'): ?>
<div id="ajax_fetch_form" style="display:none;">
	<div class="container" style="width:100%;" id="property-preview">
		<!--h2>Striped Rows</h2-->
		<style>
			.first-columns {
				width: 25%;
				font-weight: 400;
			}

			.heading {
				background: #fbcc48;
				color: #fff;
				font-size: 18px;
				font-weight: 700;
			}

			.property-cols {
				margin-right: 5px;
			}

			.table.table-striped img.photo-gallery {
				max-height: 180px;
				padding: 5px;
				width: 19%;
			}
		</style>
		<?php  
			$itemId = isset($_SESSION["recent_id"])?$_SESSION["recent_id"]:0;
			$generalItem = getDetails(doSelect("*", "add_general_items", array("agi_id"=>$itemId)));
			$listing_fee = 0;
			$subtitle_fee = 0;
			$seceond_listed_category_fee = 0;
			$reserve_price_fee = 0;
			$charges = 0;
			if(isOnTrial()){
				$listing_fee = show_price_listingDb_numeric('general_item');
				$charges += $listing_fee;
			}
			if(trim($generalItem['subtitle']) !== '' ){
				$subtitle_fee = show_price_classifiedDb123('subtitle');
				$charges += $subtitle_fee;
			}
			if($generalItem['list_in_second_cat'] == 1){
				$seceond_listed_category_fee = show_price_classifiedDb123('listed_in_second_cat');
				$charges += $seceond_listed_category_fee;
			}
			if($generalItem['reserve_price'] > $generalItem['start_price']){
				$reserve_price_fee = show_price_classifiedDb123('reserve_price');
				$charges += $reserve_price_fee;
			}
			
			$listingPrice= show_price_propertyPriceDB('property');
			$totalProperyPrice= ($classifiedPrice + $listingPrice);
			$userAvaibaleBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
			?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="2" class="heading">Listing Details:</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($itemId)): ?>
					<?php if(count($generalItem) > 0): ?>
						<?php foreach($generalItem as $generalItemData): ?>
							<tr>
								<td class="first-columns">Listing Title</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo $generalItemData['listing_title'];?></td>
							</tr>
							<tr>
								<td class="first-columns">Listing Duration Till</td>
								<td class="second-columns"><span class="property-cols">:</span>
									<?php echo isset($generalItemData['listing_length']) ? $generalItemData['listing_length']:'';?>
								</td>
							</tr>
							<tr>
								<td class="first-columns">Subtitle</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo $generalItemData['subtitle'];?></td>
							</tr>
							<tr>
								<td class="first-columns">Start Price</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo '$'.$generalItemData['start_price'];?></td>
							</tr>
							<tr>
								<td class="first-columns">Reserve Price</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo '$'.$generalItemData['reserve_price'];?></td>
							</tr>
							<tr>
								<td class="first-columns">Buy Now</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo '$'.$generalItemData['buy_now'];?></td>
							</tr>
							<tr>
								<td class="first-columns">Category</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo getValue('general_item_category', 'category', $generalItemData['cat_id'], 'gic_id');?></td>
							</tr>
							<tr>
								<td class="first-columns">Sub Category</td>
								<td class="second-columns"><span class="property-cols">:</span><?php echo getValue('general_item_category', 'category', $generalItemData['sub_cat_id'], 'gic_id');?></td>
							</tr>
							<tr>
								<td class="first-columns" colspan="2">Details:</td>
							</tr>
							<tr>
								<td colspan="2"><?php echo $generalItemData['item_desc'];?></td>
							</tr>
							<tr>
								<td colspan="2" class="heading">Photo Details</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php 
										$getItemPhoto=getDetails(doSelect("agi_id, image","add_general_items_photo",array("agi_id"=>$itemId)));
									?>
									<?php if(count($getItemPhoto) > 0): ?>
										<?php $k=0; ?>
										<?php foreach($getItemPhoto as $getItemPhotoData): ?>
											<img src="general_items_image/<?php echo $getItemPhotoData['image'];?>" alt="" class="photo-gallery"> 
											<?php $k++; ?> 
										<?php endforeach;  ?>
									<?php else: ?>
										<img src="images/classifieds.jpg" alt="" class="photo-gallery"> 
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="heading">Extras</td>
							</tr>
							<tr>
								<td class="first-columns">Listing Fee</td>
								<td class="second-columns"><span class="property-cols">:</span>$ <?php echo sprintf("%.2f", $listing_fee);
								?></td>
							</tr>
							<tr>
								<td class="first-columns">Subtitle Fee</td>
								<td class="second-columns"><span class="property-cols">:</span>$ <?php echo sprintf("%.2f", $subtitle_fee);
								?></td>
							</tr>
							<tr>
								<td class="first-columns">Second Category Fee</td>
								<td class="second-columns"><span class="property-cols">:</span>$ <?php echo sprintf("%.2f", $seceond_listed_category_fee);
								?></td>
							</tr>
							<tr>
								<td class="first-columns">Reserve Fee</td>
								<td class="second-columns"><span class="property-cols">:</span>$ <?php echo sprintf("%.2f", $reserve_price_fee);
								?></td>
							</tr>
							<tr>
								<td class="first-columns">Total Fee</td>
								<td class="second-columns"><span class="property-cols">:</span>$<?php echo sprintf("%.2f", $charges);
								?>
								<input type="hidden" value="<?php echo sprintf("%.2f", $charges);?>" name="total_charge_amount" readonly="readonly"/>
								</td>
							</tr>
							<tr>
								<td class="first-columns">My Account Balance<br/><span style="font-size:12px;">Before fees are deducted</span></td>
								<td class="second-columns"><span class="property-cols">:</span>$<?php $remanongBalace= (get_cus_acnt_balance($_SESSION["ar_id"])); 
								echo sprintf("%.2f", $remanongBalace);
								?></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<?php
			$userAvaibaleBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
		?>
		<?php if($charges > $userAvaibaleBalance): ?>
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
							<input type="hidden" name="cancel_return" value="http://localhost/deepak_demo/cancel.php">
							<p style="text-align:center;"><span style="font-size: 18px;font-weight:400;">$<?php $differnece= ($totalProperyPrice - $userAvaibaleBalance); echo sprintf("%.2f", $differnece);?></span><a href="#"><span style="margin-left: 10px;border: 1px solid #ddd;padding: 5px 15px;">Next &gt;</span></a></p>
															
						</div>								
					</div>							
				</div>	
			
			</div>
			
		<?php else: ?>
			<input type="hidden" name="next_form" value="finish" />
			<input type="hidden" name="db_name" value="finish" />
			<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Confirm & Finish" >
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php 
if ($next_form=="finish" && isset($_SESSION["recent_id"])) {
    $charge_fee=0;

    $acnt_exist=count_acnt_days($_SESSION["ar_id"]);
    $recent_id = $_SESSION["recent_id"];
    var_dump($_SESSION);
    
    unset($_SESSION["recent_id"]);
    if ($acnt_exist==1) {
        if (is_numeric(show_price_listingDb_numeric('general_item'))) {
            if (!isOnTrial()) {
                $charge_fee=$charge_fee + show_price_listingDb_numeric('general_item');
            }
        }
        if (trim($_POST["list_in_second_cat"])=="1") {
            if (is_numeric(show_price_classifiedDb_numeric('listed_in_second_cat'))) {
                $charge_fee=$charge_fee + show_price_classifiedDb_numeric('listed_in_second_cat');
            }
        }
        if (isset($_POST["subtitle"]) && trim($_POST["subtitle"])!="") {
            if (is_numeric(show_price_classifiedDb_numeric('subtitle'))) {
                $charge_fee=$charge_fee + show_price_classifiedDb_numeric('subtitle');
            }
        }

        if (isset($_POST["reserve_price"]) && trim($_POST["reserve_price"])=="0") {
            if (is_numeric(show_price_classifiedDb_numeric('reserve_price'))) {
                $charge_fee=$charge_fee + show_price_classifiedDb_numeric('reserve_price');
            }
        }

        if ($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])) {
            echo ' || 606';
            die();
        }
    }

    // Do the charging For features;
    if ($charge_fee > 0) {
        $transaction_id=generateRandomString(5).time();
        $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_general_items ||".$recent_id);
        $status=doInsert($field, 'paypal_transaction_table');
        if ($status) {
            $prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
            $now_blnce=$prev_acnt_blnce-$charge_fee;
            doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$_SESSION["ar_id"]));
        }
	}
	
    doUpdate("add_general_items", array("posting_status"=>1), array("agi_id"=>$recent_id));
	

    echo ' || finish';
}
?>

<?php
if ($db_name=="add_general_items") {
    
    if (isset($_POST["start_price"])) {
        if (trim($_POST["reserve_price"])=="0") {
            $_POST["reserve_price"]=trim($_POST["custom_reserve_price"]);
            unset($_POST["custom_reserve_price"]);
        } else {
            $_POST["reserve_price"]=trim($_POST["start_price"]);
        }
    } else {
        $_POST["reserve_price"]=0;
    }

    if (isset($_POST["allow_bid"])) {
        $_POST["allow_bid"]=$_POST["allow_bid"][0];
    }
    if (trim($_POST["listing_duration"])=="1") {
        $listing_length=explode("-", $_POST["listing_length"]);
        $listing_length=$listing_length[2].'-'.$listing_length[1].'-'.$listing_length[0];
        $_POST["listing_length"]=$listing_length;
    } else {
        $listing_length=date("Y-m-d");
        $_POST["listing_length"]=addDaysWithDate($listing_length, $_POST["listing_length"]);
    }

    $payment="";
    foreach ($_POST["payment"] as $k=>$v) {
        if ($k != "0") {
            $payment.=" || ";
        }
        $payment.=$v;
    }
    $_POST["payment"]=$payment;
    $_POST["uploader"]=$_SESSION["ar_id"];
    $status=doInsert($_POST, 'add_general_items');
    $recent_id=newly_insert_id();
    $_SESSION["recent_id"]=$recent_id;
    if ($status) {
        echo ' || 1 ||1';
    } else {
        echo ' || 0';
    }
}
?>



<?php
if ($db_name=="add_general_items_photo") {
    if (isset($_FILES)  && isset($_SESSION["recent_id"])) {
        foreach ($_FILES["image"]["name"] as $k=>$v) {
            $image_name=time().rand(10, 1000).$_FILES["image"]["name"][$k];
            $tmp_name=$_FILES["image"]["tmp_name"][$k];
            $status=move_uploaded_file($tmp_name, "general_items_image/".$image_name);
            if ($status) {
                $field=array("agi_id"=>$_SESSION["recent_id"],"image"=>$image_name);
                doInsert($field, "add_general_items_photo");
            }
        }
        echo ' || 1 ||2';
    } else {
        echo ' || 0';
    }
}
?>

<?php
if ($db_name=="add_general_items_extra_field"  && isset($_SESSION["recent_id"])) {
    $_POST=array_chunk($_POST, 2, true);
    foreach ($_POST as $k8=>$v8) {
        foreach ($v8 as $k=>$v) {
            if (is_array($v)) {
                $value="";
                foreach ($v as $k1=>$v1) {
                    if ($k1 != 0) {
                        $value.=' || ';
                    }
                    $value.=$v1;
                }
                $updtd_id=$v8[$k.'_hidden'];
                $field=array('gcef_id'=>$updtd_id,"value"=>$value,"agi_id"=>$_SESSION["recent_id"]);
                doInsert($field, $db_name);
            } else {
                $updtd_id=$v8[$k.'_hidden'];
                $field=array('gcef_id'=>$updtd_id,"value"=>$v,"agi_id"=>$_SESSION["recent_id"]);
                doInsert($field, $db_name);
            }
            break;
        }
    }
    // doUpdate("add_general_items", array("posting_status"=>1), array("agi_id"=>$_SESSION["recent_id"]));
    // unset($_SESSION["recent_id"]);
    echo ' || 1 ||3';
} else {
    // echo ' || 0';
}
?>
