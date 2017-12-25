<?php
session_start();
require_once("function.php");
if(isset($_POST['submit'])){
		/*if(addOffer()){
			echo "<script>alert('Offer sent successfully');</script>";
			echo "<script>window.location='index.php';</script>";
		}*/
		$agi_post=$_POST['agi_id'];
		header("location:confirm_offer.php?id=$agi_post");
	}	
include_once("include/header.php");

if(isset($_GET["cus_id"]) || isset($_SESSION["ar_id"])){

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$item=getItemDetails($id);
		extract($item);
?>

	<section class="container" style="margin-bottom:250px">
		<div class="row">
			<div class="col-md-6" style="margin-top:50px">	
				<h2>Fixed Price Offers</h2>
				<p>Make a fixed price offer!</p>
				<p>Instead of relisting the item, you can offer it for a fixed price. The first person to accept the offer, will buy it, and the offer will be closed.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<section id="loop_classified_taxonomy" class="search_result_listing list" >
			       	<article class="post  classified-1080 featured_c">
				       	<!-- classified image start -->
	          			<div class="classified_img">
	                        <a href="general_item_details.php?id=<?php echo $id; ?>">
								<?php
									$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$id)));
									if($image==""){
									$image="unknown.jpg";
									}
								?>
								<img src="general_items_image/<?php echo $image; ?>"  alt="" title="<?php echo $listing_title; ?>" />
	                        </a>
				        </div>
				        <!-- classified image end -->
						
				        <div class="entry">
				        	<form id="fixed-price" name="fixed-price" action="confirm_offer.php" method="POST" onsubmit="return validateFixedPriceForm()">
				        		<input type="hidden" name="agi_id" value="<?=$id?>">
				        		<input type="hidden" name="sent_from_id" value="<?php echo getValue("ambit_registration","ar_id",$_SESSION["ar_id"],"ar_id")?>">
				        	<div class="sort-title">
				        		<h3 class="color-offer-text"><a itemprop="url" href="general_item_details.php?id=<?php echo $id; ?>" title="<?php echo $listing_title; ?>" rel="bookmark"><?=$listing_title?></a></h3>
				        		<h4 class="color-offer-text"><a href="general_item_listing.php?id=<?php echo $cat_id; ?>"><?php echo getGeneralItemCategory($cat_id); ?></a></h4>
				        		<h4>Subtitle: <?=$subtitle?></h4>
				        		<div class="radios-days watch-margins">
				        			<span class="days-span">  Price:</span>
				        			<span style="margin-left:49px">$<input type="text" name="price" class="input-price" required></span>
				        		</div>
				        		
				        		<div class="radios-days watch-margins">
				        			<span class="days-span">  Valid for:</span>
				        			<input type="radio" class="radio-days" name="days" value="1" required> 1 day
				        			<input type="radio" class="radio-days" name="days" value="3"
									required> 3 days
				        		</div>
				        		
				        		<div class="watchers watch-margins">
				        			<div class="fix-width fix-width-1 btn-watchers">Watchers:</div>
				        			<div class="fix-width fix-width-2">
				        				<?php 
				        					$watchers=getWatchers($id);
				        					foreach($watchers as $watch):
				        				?>
				        				<div class="single-check-watch">
				        					<input type="checkbox" name="watchers[]" class="check-watch" value="<?=$watch['cus_id']?>"> <a class="color-offer-text-a" href="profile_details.php?cus_id=<?=$watch['cus_id']?>"><?php echo getValue("ambit_registration","name",$watch['cus_id'],"ar_id")?> </a>
				        				</div>
				        				<?php endforeach;?>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="button-area-watch" style="width:100px; margin:19px auto">
			        			<button type="submit" name="submit" value="confirm" class="btn btn-default">Next >></button>
			        		</div>
			        		</form>
						</div>
				        
			    	</article>

				</section>
			</div>
		</div>
	</section>

<?php
}
}else{
	echo '<script>window.location="index.php";</script>';
}
include_once("include/footer.php");
?>