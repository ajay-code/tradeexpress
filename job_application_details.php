<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_GET["id"]) && $_GET["id"]!=""){
?>
<script>
$( document ).ready(function() {
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	var aj_id='<?php echo $_GET["id"]; ?>';
	$.post(
	'ajax_applied_job_pagination.php?page='+page+'&limit='+limit+'&aj_id='+aj_id,
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
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="job_listing.php">Job Listing</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="job_details.php?id=<?php echo $_GET["id"]; ?>"><?php echo getJobTitle($_GET["id"]); ?></a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Application Details</span>
            </div>
</div>


<section id="content" class="large-9 small-12 columns">
<h1 class='page-title entry-title' style="color: #E6A01B;" ><?php echo getJobTitle($_GET["id"]); ?></h1>
<div class="tabs-content">	
                                                                      <!-- Other Property details -->
	<section role="tabpanel" aria-hidden="false" class="content active entry-content" id="general_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
				

<?php
$select="aj_id,uploader,cat_id,sub_cat_id,listing_title,reference,company,country,city,job_type1,job_type2,approx_pay_type,min_scale,max_scale,posting_date,short_summery";
		$from="add_job";
		$condition=array("status"=>1,"aj_id"=>$_GET["id"]);
		$job_dtls_limit=getDetails(doSelect($select,$from,$condition));
		$job_dtls_total=getDetails(doSelect($select,$from,$condition));
		$job_dtls_limit=trimmer_db_array($job_dtls_limit);
		if(!empty($job_dtls_total)){
		foreach($job_dtls_limit as $k=>$v){
		?>
                       	<article class="post  classified-1080 featured_c">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="job_details.php?id=<?php echo $v["aj_id"]; ?>" target="_blank" >
                    
					<?php
						$image=trim(seeMoreDetails("image","add_job_photo",array("status"=>1,"aj_id"=>$v["aj_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
					?>
					<img src="job_image/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
										<h2 class="entry-title"><a itemprop="url" href="job_details.php?id=<?php echo $v["aj_id"]; ?>"  target="_blank"  title="<?php echo $v["listing_title"]; ?>" rel="bookmark"><?php echo $v["listing_title"]; ?></a>
										</h2>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["min_scale"].'-'.currency().$v["max_scale"];  ?></span></span>											
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
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><a href="job_listing.php?id=<?php echo $v["cat_id"]; ?>"><?php echo getJobCategory($v["cat_id"]); ?></a></p><p class="owner_name"><label>By </label> <a href="//yourwebsite.com/"><?php  echo $uploader; ?></a></p>
										<div class="listing_rating">
										<div class="directory_rating_row">
<span class="single_rating">
<?php
$rating_array=getDetails(doSelect("count(*) as count,SUM(rating) as sum","ambit_job_review",array("status"=>1,"item_id"=>$v["aj_id"])));
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
</span></div>
										</div>
									<?php
									if($v["company"]!=""){
									?>
									<div class="address"><label>Company : </label> <?php echo $v["company"]; ?></div>
									<div class="address"><label>Reference : </label> <?php echo $v["reference"]; ?></div>
									<?php
									}
									?>
								<!--	<ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul> -->
									</div>									
									</div>

									<!-- Start Post Content -->
									<div itemprop="description" class="entry-summary"><p><?php echo string_display($v["short_summery"],0,78);  ?><a class="moretag" href="job_details.php?id=<?php echo $v["aj_id"]; ?>"  target="_blank"  class="more"> Read more&#8230;</a></p>
</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									                        		</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>                         		</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["min_scale"].'-'.currency().$v["max_scale"];  ?></span></span>                         		</div>
                         		
							</div>
                        </article>
                        	
                    <?php
					}
					}else{
		echo '<h3 color="#899516;">No Data Found !!!</h3>';	
		}
					?>				
					
		</section>
	</section>
	
	 <h1 class='page-title entry-title'>Application Details</h1>
					<section class="entry-content">
                        <div class="" id="table_data">
								
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