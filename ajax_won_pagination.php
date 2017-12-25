<?php
session_start();
require_once("function.php")

?>
<section id="loop_classified_taxonomy" class="search_result_listing list">

	<?php
	$page =$_GET["page"];
	$setLimit =$_GET["limit"];
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
		
		
	$select="awl_id,db,item_id,price,date,status,cus_id";
	$con=array("cus_id"=>$_SESSION["ar_id"],"status"=>1);
	$won_details=getDetails(doSelect1($select,"ambit_won_lost",$con,$limit));
	$won_details_total=getDetails(doSelect1($select,"ambit_won_lost",$con));
	$total_page=ceil(count($won_details_total)/$setLimit);
	$won_details=trimmer_db_array($won_details);
	if(!empty($won_details_total)){
	foreach($won_details as $k=>$v){
	$select="*";
	$con = array();
	$is_general = false;
	$is_car = false;
	$is_property = false;
	$is_job = false;
	if($v['db'] == 'add_general_items'){ 
		$con=array("agi_id" => $v['item_id']); 
		$is_general = true;
	}
	else if($v['db'] == 'add_car_motorcycle'){ 
		$con=array("acm_id" => $v['item_id']); 
		$is_car = true;
	}
	else if($v['db'] == 'add_property'){
		$con=array("ap_id" => $v['item_id']);
		$is_property = true;
	} 
	else if($v['db'] == 'add_job'){
		$con=array("ap_id" => $v['item_id']);
		$is_property = true;
	} 
	$p=getDetails(doSelect1($select,$v['db'],$con,$limit))[0];

	?>
		<article class="post  classified-1080 featured_c">
			<?php //var_dump($v) ?>
			<br>
			<?php //var_dump($p) ?>
			<!-- classified image start -->
			<div class="classified_img">
				<?php if($is_property): ?>
				<a href="property_details.php?id=<?= $p['ap_id'] ?>">
				<?php elseif($is_job): ?>
				<a href="job_details.php?id=<?= $p['aj_id'] ?>">
				<?php elseif($is_car): ?>
				<a href="car_details.php?id=<?= $p['acm_id'] ?>">
				<?php else: ?>
				<a href="general_item_details.php?id=<?= $p['agi_id'] ?>">
				<?php endif; ?>
					<?php
						$image = '';
						 if($is_property){
							$image=trim(seeMoreDetails("image","add_property_photo",array("status"=>1,"ap_id"=>$p["ap_id"])));
							if($image) {
									$image = 'property_image/'.$image;
								}
						 }elseif($is_car){ 
								$image=trim(seeMoreDetails("image","add_car_motorcycle_photo",array("status"=>1,"acm_id"=>$p["acm_id"])));
								if($image) {
									$image = 'car_motorcycle_image/'.$image;
								}
							}elseif($is_job){
								$image=trim(seeMoreDetails("image","add_job_photo",array("status"=>1,"aj_id"=>$p["aj_id"])));
								if($image) {
									$image = 'job_image/'.$image;
								}
							}else{
								$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$p["agi_id"])));
								if($image) $image = 'general_items_image/'.$image;
							}
						if($image==""){
							$image="general_items_image/unknown.jpg";
						}else{

						}
					?>
					<img src="<?php echo $image; ?>" alt="" title="<?php echo $p['listing_title']; ?>" />
				</a>
			</div>
			<!-- classified image end -->
			<div class="entry">
				<div class="sort-title">
					<div class="classified-title">
						<h2 class="entry-title">
							<?php if($is_property): ?>
							<a href="property_details.php?id=<?= $p['agi_id'] ?>">
							<?php elseif($is_job): ?>
							<a href="job_details.php?id=<?= $p['aj_id'] ?>">
							<?php elseif($is_car): ?>
							<a href="car_details.php?id=<?= $p['acm_id'] ?>">
							<?php else: ?>
							<a href="general_item_details.php?id=<?= $p['agi_id'] ?>">
							<?php endif; ?>
								<?php echo $p["listing_title"]; ?>
							</a>
							
						</h2>
							
							<div class="show-mobile">
								<span class="classified-price">
									<span class="cls-price-wrapper">
										<?= currency(). $v['price']; ?>
									</span>
								</span>
								<span class="last-updated">
									<?= get_date_str($v["posting_date"]);  ?>
								</span>
							</div>
					</div>

					<div class="classified-info">
						<?php
									$uploader=$v["uploader"];
									if($uploader !="admin"){
									$uploader="Siddhartha";
									}
									?>
							<div class='classified-tax-detail clearfix'>
								<p class="bottom_line i_category">
									
									<?php if($is_property): ?>
									<a href="property_listing.php?id=<?php echo $p["cat_id"]; ?>">
										<?php echo getPropertyCategory($p["cat_id"]); ?>
									</a>
									<?php elseif($is_job): ?>
									<a href="job_listing.php?id=<?php echo $p["cat_id"]; ?>">
										<?php echo getJobCategory($p["cat_id"]); ?>
									</a>
									<?php elseif($is_car): ?>
									<a href="car_listing.php?id=<?php echo $p["cat_id"]; ?>">
										<?php echo getCarCategory($p["cat_id"]); ?>
									</a>
									<?php else: ?>
									<a href="general_item_listing.php?id=<?php echo $p["cat_id"]; ?>">
										<?php echo getGeneralItemCategory($p["cat_id"]); ?>
									</a>
									<?php endif; ?>
								</p>
								<p class="owner_name">
									<label>By </label>
									<a href="//yourwebsite.com/">
										<?php  echo $uploader; ?>
									</a>
								</p>
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
								<div class="address">
									<label>Subtitle : </label>
									<?php echo $v["subtitle"]; ?>
								</div>
								<?php
									}
									?>
								<div class="address">
									<label>Brand Item : </label>
									<?php if($v["brand_item"]=="1"){ echo 'Used'; }else{ echo 'Unused'; }; ?>
								</div>
									<!-- <ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul> -->
							</div>
					</div>

					<!-- Start Post Content -->
					<div itemprop="description" class="entry-summary">
						<p>
							<?php echo string_display($p["item_desc"],0,78);  ?>

							<?php if($is_property): ?>
							<a class="moretag" href="property_details.php?id=<?= $p['agi_id'] ?>">
							<?php elseif($is_job): ?>
							<a class="moretag" href="job_details.php?id=<?= $p['aj_id'] ?>">
							<?php elseif($is_car): ?>
							<a class="moretag" href="car_details.php?id=<?= $p['acm_id'] ?>">
							<?php else: ?>
							<a class="moretag" href="general_item_details.php?id=<?= $p['agi_id'] ?>">
							<?php endif; ?>
								Read more&#8230;
							</a>
						</p>
					</div>
					<!-- End Post Content -->

					<!-- Show custom fields where show on listing = yes -->
					<div class="rev_pin">
						<ul>
							<li class="review">
								<a href="general_item_details.php?id=<?php echo $p['agi_id']; ?>" target="_blank">
									<?php echo getItemReviewNumber('ambit_general_item_review',$p["agi_id"]); ?> &nbsp;</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="sort-date show-desktop">
					<span class="classified-price">
						<span class="cls-price-wrapper">
							<?= currency(). $v['price']; ?>
						</span>
					</span>
				</div>
				
				<?php if($sold_flag==0): ?>
				<div class="feedback-button">
					<?php
						$id = '';
						if($is_property){
							$id = $p['ap_id'];
						}elseif($is_car){ 
							$id = $p['acm_id'];
						}elseif($is_job){
							$id = $p['aj_id'];
						}else{
							$id = $p['agi_id'];
						}
					?>
				
					<a href="profile_details.php?awl_id=<?= $v['awl_id'] ?>&cus_id=<?=$p['uploader']?>">
						<button>Place FeedBack</button>
					</a>
				</div>
				<?php endif; ?>

			</div>
		</article>
		<?php
	}
	}else{
	?>
		<tr>
			<td colspan="4" style="color:red;">No Data Found !!!</td>
		</tr>
		<?php
	}
	?>
		</tbody>
		</table>
		<div id="listpagi">

			<div class="pagination pagination-position">
				<?php
                    if($page != 1){
                      $prev=$page-1;
                ?>
					<a href="javascript:void(0);" onclick="ajax_pagintn('1');" class="next page-numbers">
						<strong>FIRST</strong>
					</a>
					<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $prev; ?>');" class="next page-numbers">
						<strong>PREV</strong>
					</a>
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
							<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers">
								<strong>
									<?php echo $p; ?>
								</strong>
							</a>
							<?php
				}else{
				?>
							<a class="current page-numbers">
								<?php echo $p; ?>
							</a>
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
								<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers">
									<strong>
										<?php echo $p; ?>
									</strong>
								</a>
								<?php
				}else{
				?>
								<a class="current page-numbers">
									<?php echo $p; ?>
								</a>
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
									<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $next; ?>');" class="next page-numbers">
										<strong>NEXT</strong>
									</a>
									<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $total_page; ?>');" class="next page-numbers">
										<strong>LAST</strong>
									</a>
									<?php
									  }
									  ?>
			</div>
		</div>
</section>