<section role="tabpanel" aria-hidden="false" class="content active entry-content" id="classified_details">
    <h2 class="print-heading">Info</h2>
    <div id="overview" class="entry-content">
        <h2>Classified Description
            <small></small>
        </h2>
        <div class="entry-content frontend-entry-content ">
            <p style="text-align:justify;">
                <?php echo $v["item_desc"]; ?>
            </p>
        </div>
    </div>
    <!-- end .entry-content -->
    <div class="listing_custom_field"></div>
    <div class="tevolution_custom_field  listing_custom_field"></div>
    <script>
        jQuery(document).ready(function () {

            if (jQuery('.tevolution_custom_field.listing_custom_field').is(':empty')) {
                jQuery('.tevolution_custom_field.listing_custom_field').remove();
            }
        });
    </script>
    <div class="claim-post-wraper">
        <ul>
            <li>
                <a class="small_btn tmpl_mail_friend" data-reveal-id="tmpl_send_to_frd" href="javascript:void(0);" id="send_friend_id"
                    title="Mail to a friend">Send to friend</a>
            </li>
            <li>
                <a class="small_btn tmpl_mail_friend" data-reveal-id="tmpl_send_inquiry" href="javascript:void(0)" title="Send Inquiry"
                    id="send_inquiry_id">Send Inquiry</a>
            </li>
            <li id="watch_span" class="fav_424 fav">
                <?php
            if (isset($_SESSION["ar_id"])) {
                $check=check_watch_list("add_to_watch_car", array("cus_id"=>$_SESSION["ar_id"],"item_id"=>$v["acm_id"]));
                if ($check) {
                    ?>
                    <a href="javascript:void(0);" title="Remove from watchlist" class="watchlist" onclick="add2watch_details_page('<?php echo $v["
                        acm_id "]; ?>','add_to_watch_car','watch_span');">Remove from watchlist</a>
                    <?php
                } else {
                    ?>
                        <a href="javascript:void(0);" title="Add to watchlist" class="watchlist" onclick="add2watch_details_page('<?php echo $v["
                            acm_id "]; ?>','add_to_watch_car','watch_span');">Add to watchlist</a>
                        <?php
                }
            } else {
                ?>
                            <a href="javascript:void(0);" title="Add to watchlist" class="watchlist" onclick="add2watch_details_page('<?php echo $v["
                                acm_id "]; ?>','add_to_watch_car','watch_span');">Add to watchlist</a>
                            <?php
            } ?>
            </li>
            <li class="print">
                <a id="print_id" title="Print this post" href="#print" rel="leanModal_print" class="small_btn print" onclick="tmpl_printpage()">
                    <i class="fa fa-print" aria-hidden="true"></i>Print</a>
            </li>
            <?php
        if (isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v["uploader"]) {
            ?>
                <li>
                    <a title="Auction Details" href="car_auction_details.php?id=<?php echo $v[" acm_id "]; ?>" target="_blank"
                        class="small_btn auction">Auction Details</a>
                </li>
                <?php
        } ?>
        </ul>
    </div>
    <!--Code start for single captcha -->
    <div id="myrecap" style="display:none;">
        <div id="captcha_div" class="captcha_div"></div>
        <script type="text/javascript" async>
            var recaptcha = '1';
        </script>
    </div>
    <input type="hidden" id="owner_frm" name="owner_frm" value="" />
    <div id="claim_ship"></div>
    <script type="text/javascript" async>
        var RECAPTCHA_COMMENT = '';
        jQuery('#owner_frm').val(jQuery('#myrecap').html());
    </script>
    <!--Code end for single captcha -->
    <div class="classified-page-end clearfix">
        <!-- Property Social Media Coding Start -->
        <ul class='social-media-share'>
            <li>
                <div class="twitter_share" href="javascript:void(0);" data-url="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/"
                    data-text="CANON CAMERA 7-D IN BOX">
                    <a class="box" target="_blank" href="https://twitter.com/share">
                        <span class="share">
                            <i class="step fa fa-twitter"></i>
                        </span>
                        <span class="count">Share</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="facebook_share" data-url="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/" data-text="CANON CAMERA 7-D IN BOX"></div>
            </li>
            <li>
                <div class="googleplus_share" href="javascript:void(0);" data-url="classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/"
                    data-text="CANON CAMERA 7-D IN BOX"></div>
            </li>
            <li>
                <div class="pinit_share" data-href="//pinterest.com/pin/create/button/?url=classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/"
                    data-media="classifieds/wp-content/uploads/bulk/camera(3)-90x65.jpg" data-description="CANON CAMERA 7-D IN BOX - classifieds/city/philadelphia/classified/canon-camera-7-d-in-box/"></div>
            </li>
            <script src="../../platform.twitter.com/images/widgets.js" type="text/javascript"></script>
        </ul>
        <script type="text/javascript">
            var jQuery = jQuery.noConflict();
            jQuery(document).ready(function () {
                jQuery('.facebook_share').sharrre({
                    share: {
                        facebook: true
                    },
                    template: '<a class="box" href="#"><span class="share"><i class="step fa fa-facebook"></i></span> <span class="count" href="#">{total}<span class="showlabel">&nbsp;' +
                        FB_LIKE + '</span></span></a>',
                    enableHover: false,
                    enableTracking: true,
                    click: function (api, options) {
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
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    }
                });
                jQuery('.pinit_share').sharrre({
                    share: {
                        pinterest: true
                    },
                    template: '<a class="box" href="#"><span class="share"><i class="fa fa-pinterest"></i></span> <span class="count" href="#">{total} <span class="showlabel"> ' +
                        PINT_REST + '</span></span></a>',
                    enableHover: false,
                    enableTracking: true,
                    urlCurl: 'classifieds/wp-content/plugins/Tevolution//tmplconnector/sharrre.php',
                    click: function (api, options) {
                        api.simulateClick();
                    }
                });
                jQuery('.pinit_share').on('click', function (e) {
                    var $this = jQuery(this),
                        media = encodeURI($this.data('media')),
                        description = encodeURI($this.data('description'));
                    e.preventDefault();
                    window.open(
                        jQuery(this).attr('data-href') + '&media=' + media + '&description=' +
                        description,
                        'pinterestDialog',
                        'height=400, width=700, toolbar=0, status=0, scrollbars=1'
                    );
                });
            });
        </script>
        <!-- Property Social Media Coding End -->
    </div>
</section>