<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_GET["cus_id"]) || isset($_SESSION["ar_id"])){
	if(isset($_POST['accept_submit'])){
		if(acceptOffer($_POST['agi_id'], $_SESSION["ar_id"], $_POST['id'])){
			echo "<script>alert('You accepted the offer!');</script>";
			echo "<script>window.location='offers.php';</script>";
		}
	}
	if(isset($_POST['decline_submit'])){
		if(declineOffer($_SESSION["ar_id"], $_POST['agi_id'], $_POST['id'])){
			echo "<script>alert('You declined the offer!');</script>";
			echo "<script>window.location='offers.php';</script>";
		}
	}		
?>

	<section class="container" style="margin-bottom:250px">
		<div class="row">
			<div class="col-md-6" style="margin-top:50px">	
				<h2>Fixed Price Offers</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<section id="loop_classified_taxonomy" class="search_result_listing list" >
			       	<?php
						$db_data=offers($_SESSION["ar_id"]);
						if(!empty($db_data)):
						foreach($db_data as $data):
							extract($data);
					?>
			       	<article class="post  classified-1080 featured_c">
				       	<!-- classified image start -->
	          			<div class="classified_img">
	                        <a href="general_item_details.php?id=<?php echo $agi_id; ?>">
								<?php
									$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$agi_id)));
									if($image==""){
										$image="unknown.jpg";
									}
								?>
								<img src="general_items_image/<?php echo $image; ?>"  alt="" title="<?php echo $listing_title; ?>" />
	                        </a>
				        </div>
				        <!-- classified image end -->
						
				        <div class="entry">
				        	<form action="offers.php" method="POST">
				        		<input type="hidden" name="agi_id" value="<?=$agi_id?>">
				        		<input type="hidden" name="id" value="<?=$id?>">
				        		
				        	<div class="sort-title">
				        		<h3 class="color-offer-text"><a itemprop="url" href="general_item_details.php?id=<?php echo $id; ?>" title="<?php echo $listing_title; ?>" rel="bookmark"><?=$listing_title?></a></h3>
				        		<h4 class="color-offer-text"><a href="general_item_listing.php?id=<?php echo $cat_id; ?>"><?php echo getGeneralItemCategory($cat_id); ?></a></h4>
				        		<h4>Subtitle: <?=$subtitle?></h4>
				        		<div class="radios-days watch-margins">
				        			<span class="days-span">  Price:</span>
				        			<input type="hidden" name="price" value="<?php echo $amount;?>">
				        			<span style="margin-left:49px">$<?php echo $amount;?> </span>
				        		</div>
				        		
				        		<div class="radios-days watch-margins">
				        			<span class="days-span"> Valid for:</span>
				        			<span><?php echo $days;?> days</span>
				        		</div>
				        	</div>
				        	<div class="button-area-watch" style="width:100px; margin:19px auto">
			        			<button type="submit" name="accept_submit" value="confirm" class="btn btn-default">Accept >></button>

			        			<button type="submit" name="decline_submit" value="confirm" class="btn btn-default">Decline >></button>
			        		</div>
			        		</form>
						</div>
				        
			    	</article>
			    	<?php endforeach;?>
			    	<?php else:?>
				       	<article class="post classified-1080 featured_c">
				       		<div class="no-more-offers">
				       			<h2>No offers for now!</h2>
				       		</div>
				       	</article>
			    	<?php endif;?>

				</section>
			</div>
		</div>
	</section>

<?php

}else{
	echo '<script>window.location="index.php";</script>';
}
include_once("include/footer.php");
?>