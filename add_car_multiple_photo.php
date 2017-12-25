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
if ($next_form=='photo_upload') {
    ?>
<div id="ajax_fetch_form" style="
    background-color: wheat;">
<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl>Select Multiple Photo :<span class="required">*</span></label>
                    <input  id="image"  name="image[]" multiple  value="" type="file" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
</div>


<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_car_motorcycle_photo" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >

</div>
<?php
}
?>
<!-- END PHOTO UPLOAD FORM  -->



<!--  EXTRA FIELD FORM  -->
<?php
if ($next_form=='extra_field') {
    ?>
<div id="ajax_fetch_form" style="
    background-color: wheat">
<?php
$select="cat_id,sub_cat_id,sub_sub_cat_id";
    $category_ids=getDetails(doSelect1($select, "add_car_motorcycle", array("acm_id"=>$_SESSION["recent_id"])));
    $in_ids="";
    /* echo '<pre>';
    print_r($category_ids);
    echo '</pre>'; */
    foreach ($category_ids as $k=>$v) {
        foreach ($v as $k2=>$v2) {
            if (trim($k2) !='cat_id') {
                $in_ids.=',';
            }
            $in_ids.=$v2;
        }
    }
    $select="ccef_id,extra_field_type,label_name,field_name,value_no,value";
    $from="car_cat_extra_field";
    $con=array("cc_id"=>$in_ids);
    $field_dtls=getDetails(selectWhereIn($select, $from, $con)); ?>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Item Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 
<?php
foreach ($field_dtls as $k=>$v) {
        ?>

<?php
if (trim($v["extra_field_type"])=="1") {
            ?>
<div class="form_row content clearfix custom_fileds classified_tag ">
				<label class=><?= $v["label_name"]; ?>:</label>                
					<select id="<?= trim($v["field_name"]); ?>" name="<?= trim($v["field_name"]); ?>" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
                        for ($i=0;$i< $v["value_no"];$i++) {
                            $value=explode("||", $v["value"]);
                            $field_value=explode("::", $value[$i]); ?>
						<option value="<?= $field_value[0]; ?>"><?= $field_value[1]; ?></option>
						<?php
                        } ?>
					</select>
</div>
<input type="hidden" name="<?= trim($v["field_name"]); ?>_hidden" value="<?= trim($v["ccef_id"]); ?>" />
<?php
        } ?>

<?php
if (trim($v["extra_field_type"])=="2") {
            ?>
<?php
    for ($i=0;$i< $v["value_no"];$i++) {
        $value=explode("||", $v["value"]);
        $field_value=explode("::", $value[$i]); ?>
<div class="form_row clearfix custom_fileds  price_type">
			<label class=><?= $v["label_name"]; ?><span class="required">*</span></label>
			<div class="form_cat_left">
				<ul class="hr_input_radio">
					<li><input name="<?= $v["field_name"]; ?>[]" value="<?= $field_value[0]; ?>" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1"><?= $field_value[1]; ?></label></li>
				</ul>
			</div>
</div>	
	<?php
    } ?>
<input type="hidden" name="<?= trim($v["field_name"]); ?>_hidden" value="<?= trim($v["ccef_id"]); ?>" />

<?php
        } ?>
<br/>
<?php
if (trim($v["extra_field_type"])=="3") {
            ?>

<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl><?= $v["label_name"]; ?> :<span class="required">*</span></label>
                    <input name="<?= trim($v["field_name"]); ?>" id="<?= trim($v["field_name"]); ?>" value="" type="text" class="textfield "  placeholder=" "/>
</div>
<input type="hidden" name="<?= trim($v["field_name"]); ?>_hidden" value="<?= trim($v["ccef_id"]); ?>" />

<?php
        } ?>

<?php
if (trim($v["extra_field_type"])=="4") {
            ?>
<div class="form_row clearfix custom_fileds  post_content">
				<label class=><?= $v["label_name"]; ?> : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="<?= $v["field_name"]; ?>" name="<?= $v["field_name"]; ?>" ></textarea></div>
					</div>
</div>

<input type="hidden" name="<?= trim($v["field_name"]); ?>_hidden" value="<?= trim($v["ccef_id"]); ?>" />

<?php
        } ?>


<?php
    } ?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_car_motorcycle_extra_field" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->


<!--  SPECIAL FEATURES FORM  -->
<?php
if ($next_form=='special_features_and_price') {
    ?>
<div id="ajax_fetch_form" style="
    display:none;">

<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Feature_Combo" value="1">
	</span>
	<span>Feature Combo<?= show_price_classifiedDb('Feature_Combo'); ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>2.5 times more view and watchlist add than basic listing</strong></p></span>
                                    <span class="days"><p><strong>Appear first result search in category</strong></p></span>
                                    <span class="days"><p><strong>Distictive yellow background</strong></p></span>
                                    <span class="days"><p><strong>Bright yellow border</strong></p></span>
                                    <span class="days"><p><strong>Bold Title</strong></p></span>
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
<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Featured" value="1">
	</span>
	<span> Featured <?= show_price_classifiedDb('Featured'); ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12">
                        <div class="panel panel-default text-center">
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
                       <!-- End #panel1 -->
</div>


<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Highlight" value="1">
	</span>
	<span>Highlight <?= show_price_classifiedDb('Highlight'); ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
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
                       <!-- End #panel1 -->
</div>

<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Bold_Title" value="1">
	</span>
	<span>Bold Title <?= show_price_classifiedDb('Bold_Title'); ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
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
                       <!-- End #panel1 -->
</div>

<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="MotorWeb_Basic_Report" value="1">
	</span>
	<span>MotorWeb Basic Report <?= show_price_classifiedDb('MotorWeb_Basic_Report'); ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Basic report appear on your listing untill sold</strong></p></span>
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

<input type="hidden" name="next_form" value="summary" />
<input type="hidden" name="db_name" value="add_car_motorcycle_listing_features" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Finish" >
</div>
<?php
}
?>
<!-- END SPECIAL FEATURES FORM  -->
<?php
// Adding Features To List
if ($db_name=="add_car_motorcycle_listing_features"  && isset($_SESSION["recent_id"])) {
    $_POST["acm_id"]=$_SESSION["recent_id"];
    $recent_id=$_SESSION["recent_id"];
    doInsert($_POST, $db_name);
    // echo ' || 1 ';
}
?>
<!-- Summary  -->
<?php if ($next_form=='summary') {
    ?>
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
<?php 
    $carId = isset($_SESSION["recent_id"])?$_SESSION["recent_id"]:0;
    $carMotorData = $carMotor = getDetails(doSelect("*", "add_car_motorcycle", array("acm_id"=>$carId)))[0];
    $charges=0;
    $acnt_exist=count_acnt_days($_SESSION["ar_id"]);
    $recent_id = $_SESSION['recent_id'];
    // unset($_SESSION['recent_id']);

    $listing_fee = 0;
    $subtitle_fee = 0;
    $seceond_listed_category_fee = 0;
    $reserve_price_fee = 0;

    $feature_combo_fee = 0;
    $featured_fee = 0;
    $highlight_fee = 0;
    $bold_title_fee = 0;
    $motorWeb_basic_report_fee = 0;

    $feature_combo = chk_car_listing_fld_exist("Feature_Combo", $recent_id);
    $featured = chk_car_listing_fld_exist("Featured", $recent_id);
    $highlight = chk_car_listing_fld_exist("Highlight", $recent_id);
    $bold_title = chk_car_listing_fld_exist("Bold_Title", $recent_id);
    $motorWeb_basic_report = chk_car_listing_fld_exist("MotorWeb_Basic_Report", $recent_id);

    if ($acnt_exist==1) {
        if (!isOnTrial()) {
            if ($carMotor['listing_type'] == 1) {
                $listing_fee = show_price_listingDb_numeric('run_an_auction_motor');
            } elseif ($carMotor['listing_type'] == 0) {
                $listing_fee = show_price_listingDb_numeric('car');
            }
            $charges += $listing_fee;
        }
        if (trim($carMotor['subtitle']) !== '') {
            $subtitle_fee = show_price_classifiedDb123('subtitle');
            $charges += $subtitle_fee;
        }
        if ($carMotor['list_in_second_cat'] == 1) {
            $seceond_listed_category_fee = show_price_classifiedDb123('listed_in_second_cat');
            $charges += $seceond_listed_category_fee;
        }
        if ($carMotor['reserve_price'] > $carMotor['start_price']) {
            $reserve_price_fee = show_price_classifiedDb123('reserve_price');
            $charges += $reserve_price_fee;
        }

        if (trim($feature_combo) == '1') {
            $feature_combo_fee = show_price_classifiedDb_numeric('Feature_Combo');
            if (is_numeric($feature_combo_fee)) {
                $charges=$charges + $feature_combo_fee;
            }
        }
        if (trim($featured) == '1') {
            $featured_fee =  show_price_classifiedDb_numeric('Featured');
            if (is_numeric($featured_fee)) {
                $charges=$charges + $featured_fee;
            }
        }
        if (trim($highlight) == '1') {
            $highlight_fee = show_price_classifiedDb_numeric('Highlight');
            if (is_numeric($highlight_fee)) {
                $charges=$charges + $highlight_fee;
            }
        }
        if (trim($bold_title) == '1') {
            $bold_title_fee = show_price_classifiedDb_numeric('Bold_Title');
            if (is_numeric($bold_title_fee)) {
                $charges=$charges + $bold_title_fee;
            }
        }

        if (trim($motorWeb_basic_report) == '1') {
            $motorWeb_basic_report_fee = show_price_classifiedDb_numeric('MotorWeb_Basic_Report');
            if (is_numeric($motorWeb_basic_report_fee)) {
                $charges=$charges + $motorWeb_basic_report_fee;
            }
        }
    }


    if (!empty($carId)) {
        if (count($carMotor) > 0) {
            ?>
                <tr>
                    <td class="first-columns">Listing Title</td>
                    <td class="second-columns"><span class="property-cols">:</span><?= $carMotorData['listing_title']; ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Listing Subtitle</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?=  $carMotorData['subtitle'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Listing Till</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= isset($carMotorData['listing_length'])? $carMotorData['listing_length']:''; ?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Number Plate</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= $carMotorData['number_plate']?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Category</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= getValue('car_category', 'category', $carMotorData['cat_id'], 'cc_id')?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Sub Category</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= getValue('car_category', 'category', $carMotorData['sub_cat_id'], 'cc_id')?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Sub Sub Category</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= getValue('car_category', 'category', $carMotorData['sub_sub_cat_id'], 'cc_id')?>
                    </td>
                </tr>

                <tr>
                    <td class="first-columns">Listing Tyle</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= $carMotor['listing_type'] == 0 ? 'Clasified':'Auction'?>
                    </td>
                </tr>

                
                <tr>
                    <td class="first-columns" colspan="2">Details:</td>
                </tr>
                <tr>
                    <td colspan="2"><?= $carMotorData['item_desc']; ?></td>
                </tr>
                
                <tr>
                    <td colspan="2" class="heading">Photo Details</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php 
                            $getCarPhoto=getDetails(doSelect("acm_id, image", "add_car_motorcycle_photo", array("acm_id"=>$carId)));
            if (count($getCarPhoto) > 0) {
                $k=0;
                foreach ($getCarPhoto as $getCarPhotoData) {
                    ?>
                            <img src="car_motorcycle_image/<?= $getCarPhotoData['image']; ?>" alt="" class="photo-gallery"> 
                        <?php $k++;
                }
            } else {
                ?>
                            <img src="images/classifieds.jpg" alt="" class="photo-gallery"> 
                        <?php
            } ?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Starting Price</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        $ <?= $carMotorData['start_price']?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Reserve Price</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        $ <?= $carMotorData['reserve_price']?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Buy Now</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        $ <?= $carMotorData['buy_now']?>
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">Billing Allowed</td>
                    <td class="second-columns"><span class="property-cols">:</span>
                        <?= $carMotorData['allow_bid'] ? 'Only Authenticated Users' : 'Anyone Can Bid'?>
                    </td>
                </tr>
				<?php
                    $extraFileds = car_extra_fields($recent_id);
				?>

				<?php if(!empty($extraFileds)): ?>
                <tr>
                    <td colspan="2" class="heading">Extra Fields</td>
                </tr>
				<?php foreach($extraFileds as $field): ?>
                <tr>
                    <td class="first-columns"> <?= $field['field_name'] ?></td>
                    <td class="second-columns"><span class="property-cols">:</span> <?= $field['value'] ?></td>
                </tr>
				<?php endforeach; ?>
				<?php endif; ?>
                <tr>
                    <td colspan="2" class="heading">Fee</td>
                </tr>
                <tr>
                    <td class="first-columns">Listing Fee</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= sprintf("%.2f", $listing_fee); ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Subtitle Fee</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= sprintf("%.2f", $subtitle_fee); ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Reserve Fee</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= sprintf("%.2f", $reserve_price_fee); ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Second Category Listing Fee</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= sprintf("%.2f", $seceond_listed_category_fee); ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Featured Listing</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= $featured_fee ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Bold Title</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= $bold_title_fee; ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Highlight</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= $highlight_fee; ?></td>
                </tr>
                <tr>
                    <td class="first-columns">Feature Combo</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= $feature_combo_fee; ?></td>
                </tr>
                <tr>
                    <td class="first-columns">MotorWeb Basic Report</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= $motorWeb_basic_report_fee; ?></td>
                </tr>
                
                <tr>
                    <td class="first-columns">Total Fee</td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?= sprintf("%.2f", $charges); ?>
                    <input type="hidden" value="<?= sprintf("%.2f", $charges); ?>" name="total_charge_amount" readonly="readonly"/>
                    
                    </td>
                </tr>
                <tr>
                    <td class="first-columns">My Account Balance<br/><span style="font-size:12px;">Before fees are deducted</span></td>
                    <td class="second-columns"><span class="property-cols">:</span>$ <?php $remanongBalace= (get_cus_acnt_balance($_SESSION["ar_id"]));
            echo sprintf("%.2f", $remanongBalace); ?></td>
                </tr>
                                
                <?php
        }
    } ?>
                
            </tbody>
        </table>
<?php
    $userAvaibaleBalance= get_cus_acnt_balance($_SESSION["ar_id"]);
    if ($charges > $userAvaibaleBalance) {
        ?>
            <div id="charge" class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-default text-center" style="padding-right:0;">
                        <div class="panel-heading">
                            <h3>Sorry you have not enough credit to pay for this listing.</h3>
                        </div>
                        <div class="panel-desc" style="padding-bottom: 40px;">
                            <div class="panel-body">
                                <div class="row" style="text-align:center;">
                                    <img src="logo/paypal.png" alt="paypal" style="width:20%" />
                                </div>
                                <p style="text-align:center;">
                                    <strong>Top up your Trade express account now by Pay Pal</strong>
                                </p>
                            </div>
                            <p style="text-align:center;">
                                <form action="/checkout.php" method="post" target="_blank">
                                    <input type='hidden' name="item_name" value="Add Balance">
                                    <input type='hidden' name="customer" value="<?= $_SESSION['ar_id'];?>" />
                                    <span style="font-size: 18px;font-weight:400;">$
                                        <input name="amount" type="number" style="width: 100px;" min="<?= ($charges - $userAvaibaleBalance) ?>" value="<?= ($charges - $userAvaibaleBalance) ?>">
                                    </span>
                                    <button type="submit" style="margin-left: 10px;border: 1px solid #ddd;padding: 5px 15px;">Next &gt;</button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="continue" style="display:none" >
                <input type="hidden" name="next_form" value="finish" disabled/>
                <input type="hidden" name="db_name" value="add_car_motorcycle" disabled/>
                <input type="submit" class="btn btn-lg btn-primary button select-plan" value="Add & Finish" disabled>
            </div>
            <div class="text-center">
                <button id="check">
                    Check Balance 
                </button>
                <span style="padding: 10px 24px 9px; display: inline-block">
                    (Click after balance update)
                </span>
            </div>
            <script>
                current_balance = <?= json_encode( $userAvaibaleBalance ) ?>;
                charges = <?= json_encode( $charges ) ?>;
                $('#check').on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'show-balance.php',
                        type: 'get',
                        dataType: 'json',
                        success: function (balance) {
                            console.log(balance);
                            if (balance >= charges) {
                                $('#charge').hide(500)
                                $('#continue').show(500)
                                $('#continue input').attr('disabled', false)
                                required_alert('You can Submit the form', 'top-right', 'success')
                            }else{
                                required_alert('current Balance: $'+balance+' is not sufficent please update your balance', 'top-right', 'error')
                            }
                        }
                    });
                })
            </script>
            
        <?php
    } else {
        ?>
            <input type="hidden" name="next_form" value="finish" />
            <input type="hidden" name="db_name" value="add_car_motorcycle" />
            <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Finish" >
        <?php
    } ?>
    </div>
</div>

	<?= ' || 1 || ' ?>
<?php
} ?>
<!-- End Summary  -->

<?php
    if ($next_form=='photo_upload'  && $db_name=="add_car_motorcycle") {
        if (trim($_POST["reserve_price"])=="0") {
            $_POST["reserve_price"]=trim($_POST["custom_reserve_price"]);
        } else {
            $_POST["reserve_price"]=trim($_POST["start_price"]);
        }
        unset($_POST["custom_reserve_price"]);
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

        //print_r($_POST);
        $_POST["uploader"]=$_SESSION["ar_id"];
        $status=doInsert($_POST, 'add_car_motorcycle');
        $recent_id=newly_insert_id();
        $_SESSION["recent_id"]=$recent_id;
        if ($status) {
            echo ' || 1';
        } else {
            echo ' || 0';
        }
    }
?>

<?php
    if ($next_form=='finish'  && $db_name=="add_car_motorcycle") {
        $charge_fee=0;
        $acnt_exist=count_acnt_days($_SESSION["ar_id"]);
        $recent_id = $_SESSION['recent_id'];
        unset($_SESSION['recent_id']);
        
        $carMotorData = $carMotor = getDetails(doSelect("*", "add_car_motorcycle", array("acm_id"=>$recent_id)))[0];

        $feature_combo = chk_car_listing_fld_exist("Feature_Combo", $recent_id);
        $featured = chk_car_listing_fld_exist("Featured", $recent_id);
        $highlight = chk_car_listing_fld_exist("Highlight", $recent_id);
        $bold_title = chk_car_listing_fld_exist("Bold_Title", $recent_id);
        $motorWeb_basic_report = chk_car_listing_fld_exist("MotorWeb_Basic_Report", $recent_id);

        if ($acnt_exist==1) {
            if (!isOnTrial()) {
                if ($carMotor['listing_type'] == 1) {
                    $listing_fee = show_price_listingDb_numeric('run_an_auction_motor');
                } elseif ($carMotor['listing_type'] == 0) {
                    $listing_fee = show_price_listingDb_numeric('car');
                }
                $charge_fee += $listing_fee;
            }
            if (trim($carMotor['subtitle']) !== '') {
                $subtitle_fee = show_price_classifiedDb123('subtitle');
                $charge_fee += $subtitle_fee;
            }
            if ($carMotor['list_in_second_cat'] == 1) {
                $seceond_listed_category_fee = show_price_classifiedDb123('listed_in_second_cat');
                $charge_fee += $seceond_listed_category_fee;
            }
            if ($carMotor['reserve_price'] > $carMotor['start_price']) {
                $reserve_price_fee = show_price_classifiedDb123('reserve_price');
                $charge_fee += $reserve_price_fee;
            }
            if (trim($feature_combo) == '1') {
                if (is_numeric(show_price_classifiedDb_numeric('Feature_Combo'))) {
                    $charge_fee=$charge_fee + show_price_classifiedDb_numeric('Feature_Combo');
                }
            }
            if (trim($featured) == '1') {
                if (is_numeric(show_price_classifiedDb_numeric('Featured'))) {
                    $charge_fee=$charge_fee + show_price_classifiedDb_numeric('Featured');
                }
            }
            if (trim($highlight) == '1') {
                if (is_numeric(show_price_classifiedDb_numeric('Highlight'))) {
                    $charge_fee=$charge_fee + show_price_classifiedDb_numeric('Highlight');
                }
            }
            if (trim($bold_title) == '1') {
                if (is_numeric(show_price_classifiedDb_numeric('Bold_Title'))) {
                    $charge_fee=$charge_fee + show_price_classifiedDb_numeric('Bold_Title');
                }
            }

            if (trim($motorWeb_basic_report) == '1') {
                if (is_numeric(show_price_classifiedDb_numeric('MotorWeb_Basic_Report'))) {
                    $charge_fee=$charge_fee + show_price_classifiedDb_numeric('MotorWeb_Basic_Report');
                }
            }
            $balance = get_cus_acnt_balance($_SESSION['ar_id']);
            if($balance >= $charges){
                if ($charge_fee > 0) {
                    $transaction_id=generateRandomString(5).time();
                    $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_car_motorcycle ||".$recent_id);
                    $status=doInsert($field, 'paypal_transaction_table');
                    if ($status) {
                        $prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
                        $now_blnce=$prev_acnt_blnce-$charge_fee;
                        doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$_SESSION["ar_id"]));
                        echo ' || finish || ';
                    }
                }
            }else{
                echo ' || finish || 666 ||';
            }
        }
        doUpdate("add_car_motorcycle", array("posting_status"=>1), array("acm_id"=>$_SESSION["recent_id"]));
        die();
    }
    

?>


<?php
if ($db_name=="add_car_motorcycle_photo") {
    if (isset($_FILES)  && isset($_SESSION["recent_id"])) {
        foreach ($_FILES["image"]["name"] as $k=>$v) {
            $image_name=time().rand(10, 1000).$_FILES["image"]["name"][$k];
            $tmp_name=$_FILES["image"]["tmp_name"][$k];
            $status=move_uploaded_file($tmp_name, "car_motorcycle_image/".$image_name);
            if ($status) {
                $field=array("acm_id"=>$_SESSION["recent_id"],"image"=>$image_name);
                doInsert($field, "add_car_motorcycle_photo");
            }
        }
        echo ' || 1';
    } else {
        echo ' || 0';
    }
}
?>

<?php
if ($db_name=="add_car_motorcycle_extra_field"  && isset($_SESSION["recent_id"])) {
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
                $field=array('ccef_id'=>$updtd_id,"value"=>$value,"acm_id"=>$_SESSION["recent_id"]);
                doInsert($field, $db_name);
            } else {
                $updtd_id=$v8[$k.'_hidden'];
                $field=array('ccef_id'=>$updtd_id,"value"=>$v,"acm_id"=>$_SESSION["recent_id"]);
                doInsert($field, $db_name);
            }
            break;
        }
    }
    
    echo ' || 1';
}
?>





<?php
// test
// var_dump($db_name, $next_form);
// echo ' || 0';
?>