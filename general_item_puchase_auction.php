<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_GET["id"]) && $_GET["id"]!=""){
?>
<script>
$( document ).ready(function() {
    ajax_pagintn(1,10);
    ajax_pagintn1(1,10);
});
	
function ajax_pagintn(page,limit=10){
	var agi_id='<?php echo $_GET["id"]; ?>';
	$.post(
	'ajax_general_item_auction_details.php?page='+page+'&limit='+limit+'&agi_id='+agi_id,
	{},
	function(r){
		$("#table_data1").html(r);
	}
	);
}

function ajax_pagintn1(page,limit=10){
	var agi_id='<?php echo $_GET["id"]; ?>';
	$.post(
	'ajax_general_item_purchase_details.php?page='+page+'&limit='+limit+'&agi_id='+agi_id,
	{},
	function(r){
		$("#table_data").html(r);
	}
	);
}
</script>

<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="general_item_listing.php">General Items</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="general_item_details.php?id=<?php echo $_GET["id"]; ?>"><?php echo getGeneralItemTitle($_GET["id"]); ?></a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Purchase & Auction Details</span>
            </div>
</div>


<section id="content" class="large-9 small-12 columns">
<h1 class='page-title entry-title' style="color: #E6A01B;" ><?php echo getGeneralItemTitle($_GET["id"]); ?></h1>
<div class="tabs-content">	
                                                                      <!-- Other Property details -->
	
	<!-- <section class="entry-content">
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
                                                                        <h3>Start Price</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_add_car_field('start_price',$_GET["id"]); ?></h3></span>
																		</div>
																	</div>
																</div>
																<div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>Reserve Price</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_add_car_field('reserve_price',$_GET["id"]); ?></h3></span>
																		</div>
																	</div>
																</div>
																<div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>Buy Now Price</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_add_car_field('reserve_price',$_GET["id"]); ?></h3></span>
																		</div>
																	</div>
																</div>
																
													<div class="pkg-button">
													<a href="javascript:void(0);"    class="btn btn-lg btn-primary button select-plan">Higest Bidd <?php echo currency().higest_bid_car($_GET["id"]);  ?></a>
													</div> 
															</div>
														</li>
													</ul>
												</div>
							
							
							
							
							
							
											</div>
										</div>
									
								</div>
								</div>

					</section> -->
	<section role="tabpanel" aria-hidden="false" class="content active entry-content" id="general_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
				

<?php
$select="agi_id,uploader,cat_id,sub_cat_id,listing_type,listing_title,subtitle,sold_status,brand_item,start_price,reserve_price,buy_now,allow_bid,posting_date,item_desc";
		$from="add_general_items";
		$condition=array("agi_id"=>$_GET["id"]);
		$item_dtls_limit=getDetails(doSelect($select,$from,$condition));
		$item_dtls_total=getDetails(doSelect($select,$from,$condition));
		$item_dtls_limit=trimmer_db_array($item_dtls_limit);
		if(!empty($item_dtls_total)){
		foreach($item_dtls_limit as $k=>$v){
		?>
                       	<article class="post  classified-1080 featured_c">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="general_item_details.php?id=<?php echo $v["agi_id"]; ?>" >
                    
					<?php
						$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$v["agi_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
					?>
					<img src="general_items_image/<?php echo $image; ?>"  alt="" title="<?php echo $v["listing_title"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
										<h2 class="entry-title"><a itemprop="url" href="general_item_details.php?id=<?php echo $v["agi_id"]; ?>" title="<?php echo $v["listing_title"]; ?>" rel="bookmark"><?php echo $v["listing_title"]; ?></a>
										
							<?php
							if($v["listing_type"]==2){
							$price_item=currency().$v["buy_now"];
							}else{
							$price_item=currency().higest_bid_general_item($v["agi_id"]);
							}
						  
							?>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo $price_item; ?></span></span>											
											<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>										
										</div>
                                    </div>

                                    <div class="classified-info">
									<?php
									$uploader=$v["uploader"];
									if($uploader !="admin"){
									$uploader="Siddhartha";
									}
									?>
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><a href="general_item_listing.php?id=<?php echo $v["cat_id"]; ?>"><?php echo getGeneralItemCategory($v["cat_id"]); ?></a></p><p class="owner_name"><label>By </label> <a href="//yourwebsite.com/"><?php  echo $uploader; ?></a></p>
										<div class="listing_rating">
										<div class="directory_rating_row">
					<span class="single_rating">
<?php
$rating_array=getDetails(doSelect("count(*) as count,SUM(rating) as sum","ambit_general_item_review",array("status"=>1,"item_id"=>$v["agi_id"])));
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
					
					</span>
					</div>
										</div>
									<?php
									if($v["subtitle"]!=""){
									?>
									<div class="address"><label>Subtitle : </label> <?php echo $v["subtitle"]; ?></div>
									<?php
									}
									?>
									<div class="address"><label>Brand Item : </label> <?php if($v["brand_item"]=="1"){ echo 'Used'; }else{ echo 'Unused'; }; ?></div>
								<!--	<ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul> -->
									</div>									
									</div>

									<!-- Start Post Content -->
									<div itemprop="description" class="entry-summary"><p><?php echo string_display($v["item_desc"],0,78);  ?><a class="moretag" href="general_item_details.php?id=<?php echo $v["agi_id"]; ?>" class="more"> Read more&#8230;</a></p>
</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									                         		</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>                         		
								</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo $price_item; ?></span></span>                         		
								</div>
                         		
							</div>
                        </article>
	<?php
	if($v["sold_status"]=='0'){
	?>
    <div class="col-md-3 col-sm-6">
    <div class="pkg-button">
<?php
if($v["listing_type"]=="0" ||$v["listing_type"]==2 ){
?>
	<a href="javascript:void(0);" onclick="stop_bid('add_general_items','<?php echo $v["agi_id"];  ?>');"   class="btn btn-lg btn-primary button select-plan">Stop Bid</a>
<?php
}
?>	
	<a href="javascript:void(0);" onclick="stop_listing('add_general_items','<?php echo $v["agi_id"];  ?>');"   class="btn btn-lg btn-primary button select-plan">Stop Listing And Delete</a>
	</div> <!-- list-group -->
	</div>
	<?php
	}else{
	echo '<h3 color="#899516;">Item Sold....</h3>';	
	}
	?>
                    <?php
					}
					}else{
		echo '<h3 color="#899516;">No Data Found !!!</h3>';	
		}
					?>				
					
		</section>
	</section>
	
	 <h1 class='page-title entry-title'>Purchase Details</h1>
					<section class="entry-content">
                        <div class="" id="table_data">
								
						</div>

					</section>	
					
	<h1 class='page-title entry-title'>Auction Details</h1>
					<section class="entry-content">
                        <div class="" id="table_data1">
								
						</div>

					</section>	
	
</section>
<!-- #content -->
<?php
include("include_parts/top_author_sidebar.php");
?>
	<!-- #sidebar-primary -->
	</div>
<!-- .wrap -->
</div>
<!-- #main -->
<a class="exit-off-canvas"></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>
</div>
<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> 	 




<!-- off-canvas-wrap end -->

<?php
}else{
	echo '<script>window.location="job_listing.php";</script>';
}
include_once("include/footer.php");
?>