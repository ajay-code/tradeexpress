<?php
    session_start();
    include "function.php";
?>
<div id="ajax_fetch_form" style="display:block;">
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
                
                <tr>
                    <td colspan="2" class="heading">Extras</td>
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
                            <p style="text-align:center;"><span style="font-size: 18px;font-weight:400;">$<?php $differnece= ($totalProperyPrice - $userAvaibaleBalance);
        echo sprintf("%.2f", $differnece); ?></span><a href="#"><span style="margin-left: 10px;border: 1px solid #ddd;padding: 5px 15px;">Next &gt;</span></a></p>
                                                            
                        </div>								
                    </div>							
                </div>	
            
            </div>
            
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