<?php 
session_start(); 
require_once( "function.php"); 
include_once( "include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
?>
<script>

</script>
<section id="main" class="clearfix">

    <div class="wrap row">

        <div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Classifieds" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Submit Classified</span>
            </div>
        </div>
        <section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h1 class='page-title entry-title'>Submit Classified</h1>
                    <section class="entry-content">
                        <!-- <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice. -->
                           
                                 <div class="accordion" id="post-listing">

                                     <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 ">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>General Item</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
																		
																			<div class="moreinfo" style="font-size:0.9em;">
																			<?php echo show_price_listingDb('general_item');  ?>
																			</div>
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
														
														
																			<div class="pkg-button" style="position: absolute;right: 15px;top: 0px;">
																				<a href="general_item_post.php" style="line-height: 2.3" data-id="15"  class="btn btn-lg btn-primary button select-plan">Select & continue</a>
																			</div> <!-- list-group -->
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
                                            <div class="panel panel-default text-center">
                                                <div class="panel-heading">
                                                    <h3>Property</h3>
                                                </div>
                                                <div class="panel-desc">
                                                    <div class="panel-body">
                                                <div class="moreinfo" style="font-size:0.9em;">
												<?php echo show_price_listingDb('property');  ?>
												</div>
							    <div class="pkg-button" style="position: absolute;right: 15px;top: 0px;">
                                    <a href="property_post.php" data-id="15" style="line-height: 2.3" class="btn btn-lg btn-primary button select-plan">Select & continue</a>
                                </div> <!-- list-group -->
                            
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
                                            <div class="panel panel-default text-center">
                                                <div class="panel-heading">
                                                    <h3>Job</h3>
                                                </div>
                                                <div class="panel-desc">
                                                    <div class="panel-body">
                                                        <div class="moreinfo"  style="font-size:0.9em;">
																	<?php echo show_price_listingDb('job');  ?> 
																</div>
                            <div class="pkg-button" style="position: absolute;right: 15px;top: 0px;">
                                    <a href="job_post.php" data-id="15" style="line-height: 2.3" class="btn btn-lg btn-primary button select-plan">Select & continue</a>
                                </div> <!-- list-group -->
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
                                            <div class="panel panel-default text-center">
                                                <div class="panel-heading">
                                                    <h3>Car, Motorbikes & Boats</h3>
                                                </div>
                                                <div class="panel-desc">
                                                    <div class="panel-body">
                                        <div class="moreinfo"  style="font-size:0.9em;">
																	<?php echo show_price_listingDb('car');  ?> 
										</div> 
										
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

										
                            <div class="pkg-button" style="position: absolute;right: 15px;top: 0px;">
                                    <a href="car_post.php" data-id="15" style="line-height: 2.3" class="btn btn-lg btn-primary button select-plan">Select & continue</a>
                                </div> <!-- list-group -->
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
echo '<script>window.location="login.php ";</script>';
}
include_once("include/footer.php ");
?>