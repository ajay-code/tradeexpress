<section role="tabpanel" aria-hidden="false" class="content active entry-content" id="classified_details">
    <h2 class="print-heading">Info</h2>
    <div id="overview" class="entry-content">
        <h2>Details 
            <small></small>
        </h2>
        <div class="entry-content frontend-entry-content ">
            <table class="table table-bordered mbn fixed">
            <col width="40%" />
            <col width="60%" />
            <?php
            ?>
            <tr>
            <td style="font-size: 20px;">Category</td>
            <?php
            if (getCarCategory($v["cat_id"])=="") {
                $cat_id="";
            } else {
                $cat_id=getCarCategory($v["cat_id"]);
            }
            if (getCarCategory($v["sub_cat_id"])=="") {
                $sub_cat_id="";
            } else {
                $sub_cat_id=' > '.getCarCategory($v["sub_cat_id"]);
            }
            if (getCarCategory($v["sub_sub_cat_id"])=="") {
                $sub_sub_cat_id="";
            } else {
                $sub_sub_cat_id=' > '.getCarCategory($v["sub_sub_cat_id"]);
            }
            ?>
            <td style="font-size: 15px;"><span><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></span></td>
            </tr>
            <?php
            if ($v["list_in_second_cat"]=="1") {
                ?>
            <tr>
            <td style="font-size: 20px;">Second Category</td>
            <?php
            if (getCarCategory($v["cat1_id"])=="") {
                $cat_id="";
            } else {
                $cat_id=getCarCategory($v["cat1_id"]);
            }
                if (getCarCategory($v["sub_cat1_id"])=="") {
                    $sub_cat_id="";
                } else {
                    $sub_cat_id=' > '.getCarCategory($v["sub_cat1_id"]);
                }
                if (getCarCategory($v["sub_sub_cat1_id"])=="") {
                    $sub_sub_cat_id="";
                } else {
                    $sub_sub_cat_id=' > '.getCarCategory($v["sub_sub_cat1_id"]);
                } ?>
            <td style="font-size: 15px;"><span><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></span></td>
            </tr>
            <?php
            }
            ?>
            <tr>
            <td style="font-size: 20px;">Listing Title</td>
            <td style="font-size: 15px;"><span><?php echo $v["listing_title"] ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Sub-Title</td>
            <?php
            if (trim($v["subtitle"])=="") {
                $subtitle='<font color="red">No Sub-Title</font>';
            } else {
                $subtitle=$v["subtitle"];
            }
            ?>
            <td style="font-size: 15px;"><span><?php echo $subtitle; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Brand Item</td>
            <?php
            if (trim($v["brand_item"])=="1") {
                $brand_item="USED";
            } else {
                $brand_item="NEW";
            }

            ?>
            <td style="font-size: 15px;"><span><?php echo $brand_item; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Base Price</td>
            <td style="font-size: 15px;"><span><?php echo currency().$v["start_price"]; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Reserve Price</td>
            <td style="font-size: 15px;"><span><?php echo currency().$v["reserve_price"]; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Buy Now</td>
            <td style="font-size: 15px;"><span><?php echo currency().$v["buy_now"]; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Allow Bid</td>
            <?php
            if ($v["allow_bid"]==1) {
                $allow_bid="<font color='blue'>Only Authenticated Bid</font>";
            } else {
                $allow_bid="<font color='red'>Anyone</font>";
            }
            ?>
            <td style="font-size: 15px;"><span><?php echo $allow_bid; ?></span></td>
            </tr>
            <tr>
            <td style="font-size: 20px;">Listing Duration</td>
            <td style="font-size: 15px;"><span><?php echo get_date_str($v["listing_length"]); ?></span></td>
            </tr>

            <?php
            $select="acm_id,ccef_id,value";
            $from="add_car_motorcycle_extra_field";
            $condition=array("acm_id"=>trim($v["acm_id"]));
            $extra_field_detls=getDetails(doSelect1($select, $from, $condition));
            foreach ($extra_field_detls as $k3=>$v3):
            ?>
                <tr>
                <td style="font-size: 20px;"><?php echo getCarLabel($v3["ccef_id"]);  ?></td>
                <?php
                $value=explode(" || ", $v3["value"]);
                $value=implode(" , ", $value);
                ?>
                <td style="font-size: 15px;"><span><?php echo $value; ?></span></td>
                </tr>

            <?php
            endforeach;
            ?>
            </table>
        </div>
    </div>
    <div id="overview" class="entry-content">
        <h2>Classified Description
            <small></small>
        </h2>
        <div class="entry-content frontend-entry-content ">
            <p style="text-align:justify;">
                <?= nl2br($v["item_desc"]); ?>
            </p>
        </div>
    </div>
</section>