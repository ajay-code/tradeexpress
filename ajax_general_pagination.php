<?php
session_start();
require_once("function.php");
if (isset($_GET["category"])) {
    $ex=explode('%?&', $_GET["category"]);
    $_GET["category"]=$ex[0];
    if (isset($ex[1])) {
        $_GET["for"]=$ex[1];
    }
}
?>
<script>
$(document).ready(function () {
	$('.myTarget').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
});
</script>
<style>
.feedback-button{
	/* position: relative; */
	padding: 10px;
}
.list {
	display: flex;
	flex-wrap: wrap;
	flex-direction: column;
}

.grid {
	display: flex;
	flex-wrap: wrap;
	flex-direction: row;
	width: 100%;
}

.post {
	display: flex !important;
	padding: 0 !important;
	margin-bottom: 15px !important;
}


.grid .post {
	flex-direction: column;
}

.post__img {
	width: 20% !important;
	display: flex !important;
	justify-content: center;
	align-items: center;
	margin: 0 !important;
	padding: 0 10px !important;
}

.grid .post__img {
	width: 100% !important;
	padding: 10px !important;
}

.post__img img {
	border: none !important;
	max-width: 100%;
}

.post__info {
	display: flex !important;
	flex-direction: column;
	width: 55%;
}

.grid .post__info {
	padding: 0 10px;
	display: flex !important;
	flex-direction: column;
	width: 100%;
}

.post__price {
	display: flex !important;
	width: 25% !important;
	justify-content: space-between;
	padding: 5px 5px 0 5px;
}

.grid .post__price {
	width: 100% !important;
	padding: 0;
}

.grid .show-mobile {
	padding: 0 !important;
}

.grid .show-desktop {
	display: none;
}


@media (max-width: 575px) {
	.feedback-button{
		position: relative;
	}
	.show-desktop {
		display: none;
	}
	.show-mobile {
		display: block;
	}
	.post__price{
		width: 100% !important;
		padding: 0;
		
	}
	.list {
		flex-wrap: wrap;
		flex-direction: row;
		width: 100%;
		justify-content: center;
	}
	.post {
		flex-direction: column;
		width: calc(50% - 10px)  !important;
		margin-right: 10px;
	}
	.post__img {
		width: 100% !important;
		padding: 10px !important;
	}
	.post__info {
		padding: 0 10px;
		display: flex !important;
		flex-direction: column;
		width: 100%;
	}
}

@media (max-width: 480px) {
	.post {
		flex-direction: column;
		width: calc(100% - 20px)  !important;
		margin-right: 10px;
		margin-left: 10px;
	}
}

.buy-now {
	font-weight: 500;
	color: rgb(226, 138, 2);
}

.start-price {
	font-weight: 500;
}

.color-orange {
	color: rgb(226, 138, 2);
}

.small {
	width: auto;
	float: none;
	margin: auto !important;
}

.margin-bottom {
	margin-bottom: 15px;
}

.clear {
	clear: both
}
</style>
<section id="loop_classified_taxonomy" class="search_result_listing list clearfix" >
<?php
	$sold_flag=0;
	$order_by='';
	$page =$_GET["page"];
	$setLimit =$_GET["limit"];
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
	
	
	$unsold = false;
	if (isset($_GET['unsold']) && $_GET['unsold'] == 'true') {
		$unsold = true;
	}
	$con1=$con2=$con3=$con4=$con5=array();
	if (isset($_GET["min_price"]) && $_GET["min_price"] !="") {
		$con1=array("start_price >"=>$_GET["min_price"]);
	}
	if (isset($_GET["max_price"]) && $_GET["max_price"] !="") {
		$con2=array("start_price <"=>$_GET["max_price"]);
	}
	if (isset($_GET["brand_item"]) && $_GET["brand_item"] !="0") {
		$con3=array("brand_item"=>$_GET["brand_item"]);
	}
	if (isset($_GET["sold_status"])) {
		$con5=array("sold_status"=>$_GET["sold_status"]);
		if ($_GET["sold_status"]==0) {
			$sold_flag=1;
		}
	}
	
	if (isset($_GET["uploader"]) && $_GET["uploader"] !="") {
		$con4=array("uploader"=>$_GET["uploader"]);
	}
	if (isset($_GET["classified_sortby"]) && $_GET["classified_sortby"] !="0") {
		$order_by= ' ORDER BY '.$_GET["classified_sortby"];
	}
	
	
	$sub_query="";
	if (isset($_GET["category"]) && $_GET["category"] !="0") {
		$sub_query.=' AND (cat_id='.$_GET["category"].' OR cat1_id='.$_GET["category"].')';
	}
	if (isset($_GET["sub_category"]) && $_GET["sub_category"] !="") {
		$sub_query.=' AND (sub_cat_id='.$_GET["sub_category"].' OR sub_cat1_id='.$_GET["sub_category"].')';
	}
	if (isset($_GET["sub_sub_category"]) && $_GET["sub_sub_category"] !="") {
		$sub_query.=' AND (sub_sub_cat_id='.$_GET["sub_sub_category"].' OR sub_sub_cat1_id='.$_GET["sub_sub_category"].')';
	}
	if (isset($_GET["sub_sub_sub_category"]) && $_GET["sub_sub_sub_category"] !="") {
		$sub_query.=' AND (sub_sub_sub_cat_id='.$_GET["sub_sub_sub_category"].' OR sub_sub_sub_cat1_id='.$_GET["sub_sub_sub_category"].')';
	}
	if (isset($_GET["search"]) && trim($_GET["search"]) !="") {
		$sub_query.=" AND listing_title LIKE '%".trim($_GET["search"])."%'";
	}
	$select="agi_id,uploader,cat_id,sub_cat_id,listing_type,listing_title,subtitle,brand_item,start_price,reserve_price,buy_now,allow_bid,posting_date,item_desc,listing_length";
	$from="add_general_items";
	$condition=array("status"=>1,"sold_status"=>0);
	// $condition=array("sold_status"=>0);
	if (isset($_GET["uploader"]) && $_GET["uploader"] !="") {
		// $condition=array();
	}
	$condition=array_merge($condition, $con1, $con2, $con3, $con4, $con5);
	$item_dtls_query=doSelect2($select, $from, $condition);
	$item_dtls_query.=$sub_query.$order_by;

	$item_dtls_limit=getDetails(doSelect3($item_dtls_query.$limit));
	$item_dtls_total=getDetails(doSelect3($item_dtls_query));
	if (isset($_GET["for"]) && $_GET["for"]!="general_item") {
		$item_dtls_total=array();
		$item_dtls_limit=array();
	}
	$total_page=ceil(count($item_dtls_total)/$setLimit);
	$item_dtls_limit=trimmer_db_array($item_dtls_limit);
	if (!empty($item_dtls_total)) {
		foreach ($item_dtls_limit as $k=>$v) {
			if ($unsold) {
				$expired = expired($v);
			}
			if (isset($expired) && $v['sold_status'] == 0) {
				if (!$expired) {
					continue;
				}
			}
                // var_dump($expired, $v['agi_id']);
    ?>

	<article class="post classified-1080 featured_c">
		<!-- classified image start -->
		<div class="classified_img post__img">
			<a href="general_item_details.php?id=<?php echo $v['agi_id']; ?>">
                    
				<?php
					$image=trim(seeMoreDetails("image", "add_general_items_photo", array("status"=>1,"agi_id"=>$v["agi_id"])));
					if ($image=="") {
						$image="unknown.jpg";
					} 
				?>
				<img src="general_items_image/<?= $image ?>" alt="" title="<?php echo $v['listing_title']; ?>" />
			</a>
		</div>
		<!-- classified image end -->
		<div class=" post__info">
			<div class="classified-title">
				<h2 class="entry-title">
					<a itemprop="url" href="general_item_details.php?id=<?= $v['agi_id']; ?>" title="<?= $v['listing_title']; ?>" rel="bookmark">
						<?php echo $v["listing_title"]; ?>
					</a>
					<?php if (isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v["uploader"]): ?>
						&nbsp &nbsp <i class="fa fa-pencil-square-o" title="Edit" style="cursor:pointer;" onclick="update_general_item('<?php echo $v["agi_id"]; ?>');" aria-hidden="true"></i>
						&nbsp &nbsp <a href="general_item_puchase_auction.php?id=<?php echo $v["agi_id"]; ?>" title="Purchase & Auction Details" target="_blank" ><i class="fa fa-shopping-cart"  style="cursor:pointer;"  aria-hidden="true"></i></a>
					<?php endif; ?>
				</h2>
				<?php
					if ($v["listing_type"]==2) {
						$price_item=currency().$v["buy_now"];
					} else {
						$price_item=currency().higest_bid_general_item($v["agi_id"]);
					} 
				?>
				<div class="show-mobile">
					<div class="post__price">
						<div class="buy-now">
							<span class="last-updated"><?= currency().$v['buy_now']; ?></span>  
							<br>
							<span class="small">Buy Now</span>                       		
						</div>
						<div class="">
							<span class="start-price">
								<?= $price_item; ?> <i class="fa fa-flag color-orange"></i>
							</span>                      		
						</div>
					</div>
				</div>
			</div>

			<!-- Start Post Content -->
			<div itemprop="description" class="margin-bottom">
				<?php
					$address = getValue('ambit_registration', 'address', $v['uploader'], 'ar_id');
				?>
				<span class="small">
					<?= $address ? $address : '----- --- ----'; ?>
				</span>
				<br>
				<span class="small">
					<?php 
						$closes_at = new Carbon\Carbon($v['listing_length']);
						$gt = $closes_at->gt(Carbon\Carbon::now());

					?>
					<?=    $gt ? 'Closes in' : 'Closed'. ' ' . $closes_at->diffForHumans() ?>
				</span>
			</div>
			<!-- End Post Content -->
			<!-- Show custom fields where show on listing = yes -->
			<div class="rev_pin">
				<ul>                     
					<li class="" id="watch_span_g_<?php echo $v["agi_id"]; ?>">
					<?php
					if (isset($_SESSION["ar_id"])) {
						$check=check_watch_list("add_to_watch_general_item", array("cus_id"=>$_SESSION["ar_id"],"item_id"=>$v["agi_id"]));
						if ($check) {
					?>
					<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:#F0B74A;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["agi_id"]; ?>','add_to_watch_general_item','watch_span_g_<?php echo $v["agi_id"]; ?>');" > Remove from watchlist</a></span>
					<?php
						} else {
							?>
					<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["agi_id"]; ?>','add_to_watch_general_item');" > Add to watchlist</a></span>
					<?php
						}
					} else {
						?>
					<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["agi_id"]; ?>','add_to_watch_general_item');" > Add to watchlist</a></span>
					<?php
					} ?>
					</li>
					<li class="review"> <a href="general_item_details.php?id=<?php echo $v["agi_id"]; ?>" target="_blank"><?php echo getItemReviewNumber('ambit_general_item_review', $v["agi_id"]); ?> &nbsp;</a></li>
				</ul> 
			</div>                         		
		</div>
		<div class="post__price">
			<div class="buy-now show-desktop">
				<span class="last-updated"><?= currency().$v['buy_now']; ?></span>  
				<br>
				<span class="small">Buy Now</span>                       		
			</div>
			<div class="show-desktop">
				<span class="start-price">
					<?= $price_item; ?> <i class="fa fa-flag color-orange"></i>
				</span>                      		
			</div>
		</div>
		<?php if ($sold_flag==1): ?>
		<div style="margin-top: 150px;margin-left:399px">
			<div><a href="#" onclick="update_general_item('<?php echo $v['agi_id']; ?>');" class="gen-btn btn btn-primary button select-plan">Relist Item</a></div>

			<?php if (!empty(getWatchers($v["agi_id"]))):?>
				<?php if (getNumberOfOffers($v["agi_id"])<=0):?>
				<div><a href="fixed_price_offer.php?id=<?php echo $v["agi_id"]; ?>" class="gen-btn btn btn-primary button select-plan">Fixed Price Offer</a></div>
				<?php else:?>
					<?php if (showOfferExpired($v["agi_id"])): ?>
						<div><a href="#" class="gen-btn btn btn-primary button select-plan">Offer Expired</a></div>
					<?php else: ?>
						<div class="under-offer">Under Offer</div>
					<?php endif; ?>
						
				<?php endif; ?>
			<?php endif; ?>
				
		</div>
		<?php endif; ?>
		<?php if (isset($_GET['feedback']) && $_GET['feedback']=='true'): ?>
		<div class="feedback-button">
			<a href="/profile_details.php?item_id=<?=$v["agi_id"]?>&db=add_general_items&cus_id=<?= offerWonCusId($v["agi_id"], 'add_general_items') ?>"><button>Place FeedBack</button></a>
		</div>
		<?php endif; ?>
			
	</article>
                        	
<?php
		}
	} else {
		echo '<h3 color="#899516;">No Data Found !!!</h3>';
	}
?>
</section>

    <!-- Pagination For Listing -->
	<div id="listpagi clear">
		<div class="pagination pagination-position">
			<?php
				if ($page != 1) :
					$prev=$page-1; 
			?>
					<a href="javascript:void(0);" onclick="ajax_pagintn('1');" class="next page-numbers myTarget"><strong>FIRST</strong></a>
					<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $prev; ?>');" class="next page-numbers myTarget"><strong>PREV</strong></a>
			<?php
				endif;
			?>
			
			<?php
				$l=1;
				$s=$page-5;
				if ($s < 1) {
					$s=1;
				}
				for ($p=$s;$p<$page;$p++) {
					if ($p!=$page) {
					?>
					<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers myTarget"><strong><?php echo $p; ?></strong></a>
			<?php
				} else {
			?>
					<a  class="current page-numbers"><?php echo $p; ?></a>
			<?php
					}
					$l++;
					if ($l==7) {
						break;
					}
				}
			
				if ($total_page > 1) {
					$l=1;
					for ($p=$page;$p<=$total_page;$p++) {
						if ($p!=$page) {
							?>
							<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers myTarget"><strong><?php echo $p; ?></strong></a>
			<?php
						} else {
			?>
							<a  class="current page-numbers"><?php echo $p; ?></a>
			<?php
						}
						$l++;
						if ($l==5) {
							break;
						}
					}
				}

				if ($page < $total_page) {
					$next=$page+1; ?>
					<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $next; ?>');" class="next page-numbers myTarget"><strong>NEXT</strong></a>
					<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $total_page; ?>');" class="next page-numbers myTarget"><strong>LAST</strong></a>
					<?php
				}
			?>
		</div>
	</div>
    <!-- End Pagination For Listing -->
         		  