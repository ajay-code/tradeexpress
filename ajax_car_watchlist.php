<?php
session_start();
require_once("function.php");
$_GET=trimmer($_GET);
//print_r($_GET);
?>     
	 <section id="loop_classified_taxonomy" class="search_result_listing list" >
     	<?php
		$page =$_GET["page"];
		$setLimit =$_GET["limit"];
		$pageLimit = ($page * $setLimit) - $setLimit;
		$limit=' LIMIT '.$pageLimit.','.$setLimit;
		
		
		$con1=$con2=$con3=$con4=array();
		
		$sub_query="";
		
		$select="acm_id,uploader,cat_id,sub_cat_id,listing_title,subtitle,brand_item,start_price,posting_date,item_desc";
		$from="add_car_motorcycle as a,add_to_watch_car as b";
		$condition=array("status"=>1,'a.acm_id'=>'b.item_id','cus_id'=>$_SESSION["ar_id"]);
		$condition=array_merge($condition,$con1,$con2,$con3,$con4);
		$car_dtls_query=doSelect2($select,$from,$condition);
		$car_dtls_query.=$sub_query;
		$car_dtls_limit=getDetails(doSelect3($car_dtls_query.$limit));
		$car_dtls_total=getDetails(doSelect3($car_dtls_query));
		$total_page=ceil(count($car_dtls_total)/$setLimit);
		$car_dtls_limit=trimmer_db_array($car_dtls_limit);
		if(!empty($car_dtls_total)){
		foreach($car_dtls_limit as $k=>$v){
		?>
                       	<article class="post  classified-1080 featured_c">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="car_details.php?id=<?php echo $v["acm_id"]; ?>" >
                    <?php
					$check=check_car_featured('Featured',$v["acm_id"]);
					if($check==1){
					?>
                    <span class="featured_tag">Featured</span>
					<?php
					}
					?>
					<?php
						$image=trim(seeMoreDetails("image","add_car_motorcycle_photo",array("status"=>1,"acm_id"=>$v["acm_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
					?>
					<img src="car_motorcycle_image/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
					<?php
					$style='';
					$check=check_car_featured('Highlight',$v["acm_id"]);
					if($check==1){
                    $style.='background-color: yellow;';
					}
					$check=check_car_featured('Bold_Title',$v["acm_id"]);
					if($check==1){
					$style.="font-weight:900;font-size:1.3em;";
					}
					?>					
										<h2 class="entry-title"><a itemprop="url" href="car_details.php?id=<?php echo $v["acm_id"]; ?>" title="<?php echo $v["listing_title"]; ?>" rel="bookmark" style="<?php echo $style; ?>" ><?php echo $v["listing_title"]; ?></a></h2>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().higest_bid_car($v["acm_id"]); ?></span></span>											
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
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><a href="car_listing.php?id=<?php echo $v["cat_id"]; ?>"><?php echo getCarCategory($v["cat_id"]); ?></a></p><p class="owner_name"><label>By </label> <a href="//yourwebsite.com/"><?php  echo $uploader; ?></a></p>
										<div class="listing_rating">
										<div class="directory_rating_row">
<span class="single_rating">
<?php
$rating_array=getDetails(doSelect("count(*) as count,SUM(rating) as sum","ambit_car_review",array("status"=>1,"item_id"=>$v["acm_id"])));
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
									<div itemprop="description" class="entry-summary"><p><?php echo string_display($v["item_desc"],0,78);  ?><a class="moretag" href="job_details.php?id=<?php echo $v["aj_id"]; ?>" class="more"> Read more&#8230;</a></p>
</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									<div class="rev_pin"><ul>                     
                             <li class="" id="watch_span_c_<?php echo $v["acm_id"] ?>">
	<?php
	if(isset($_SESSION["ar_id"])){
	$check=check_watch_list("add_to_watch_car",array("cus_id"=>$_SESSION["ar_id"],"item_id"=>$v["acm_id"]));
	if($check){
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:#F0B74A;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["acm_id"]; ?>','add_to_watch_car','watch_span_c_<?php echo $v["acm_id"] ?>'); ajax_pagintn111(1,1);" > Remove from watchlist</a></span>
	<?php
	}else{
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["acm_id"]; ?>','add_to_watch_car','watch_span_c_<?php echo $v["acm_id"] ?>'); ajax_pagintn111(1,1);" > Add to watchlist</a></span>
	<?php	
	}
	}else{
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["acm_id"]; ?>','add_to_watch_car','watch_span_c_<?php echo $v["acm_id"] ?>'); ajax_pagintn111(1,1);" > Add to watchlist</a></span>
	<?php
	}
	?>
	</li>
    <li class="review"> <a href="car_details.php?id=<?php echo $v["acm_id"]; ?>" target="_blank"><?php echo getItemReviewNumber('ambit_car_review',$v["acm_id"]); ?> &nbsp;</a></li>
                              </ul></div>                         		</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>                         		</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().higest_bid_car($v["acm_id"]); ?></span></span>                         		</div>
                         		
							</div>
                        </article>
                        	
                    <?php
					}
					}else{
		echo '<h3 color="#899516;">No Data Found !!!</h3>';	
		}
					?>
                        	
                 <div id="listpagi">
                <div class="pagination pagination-position">
				<?php
                    if($page != 1){
                      $prev=$page-1;
                ?>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('1');" class="next page-numbers"><strong>FIRST</strong></a>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
				<?php
                }
                ?>
				
				<?php
				$l=1;
				$s=$page-5;
				if($s < 1){
				  $s=1;
				  }
				for($p=$s;$p<$page;$p++){
				  if($p!=$page){
				?>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
				<?php
				}else{
				?>
				<a  class="current page-numbers"><?php echo $p; ?></a>
				<?php
				}
				$l++;
				if($l==7){
				  break;
				}
				}
				
				if($total_page > 1){
				$l=1;
				for($p=$page;$p<=$total_page;$p++){
				  if($p!=$page){
				?>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
				<?php
				}else{
				?>
				<a  class="current page-numbers"><?php echo $p; ?></a>
				<?php
				}
				$l++;
				if($l==5){
				  break;
				}
				}
				}

									if($page < $total_page){
									  $next=$page+1;
									  ?>
									  <a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a>
									  <a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
									  <?php
									  }
									  ?>
			    </div>
        </div>
         		  
     </section>