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
                    <h1 class='page-title entry-title'>Balance enquiry</h1>
                    <section class="entry-content">
                        <div class="accordion" id="post-listing">
								<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>General Item</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><label>Price:</label>&nbsp;<span>$0.00</span></span>
                                                    <div class="pkg-button">
													<a href="general_item_post.php" data-id="15"  class="btn btn-lg btn-primary button select-plan">Select & continue</a>
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

					</section>
                          <!-- .entry-content -->
						  
					<section class="entry-content">
                        <div class="accordion" id="post-listing">
								<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>General Item</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><label>Price:</label>&nbsp;<span>$0.00</span></span>
                                                    <div class="pkg-button">
													<a href="general_item_post.php" data-id="15"  class="btn btn-lg btn-primary button select-plan">Select & continue</a>
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

					</section>	  
						  
						  
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