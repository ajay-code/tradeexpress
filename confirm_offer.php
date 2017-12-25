<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_GET["cus_id"]) || isset($_SESSION["ar_id"])){
	if(isset($_POST['confirm_submit'])){
		if(addOffer()){
			echo "<script>alert('Offer sent successfully');</script>";
			echo "<script>window.location='index.php';</script>";
		}
	}	
	else if(isset($_POST['agi_id'])){
		$id=$_POST['agi_id'];
		$item=getItemDetails($id);
		extract($item);
?>

	<section class="container" style="margin-bottom:250px">
		<div class="row">
			<div class="col-md-6" style="margin-top:50px">	
				<h2>Confirm your offers!</h2>
				<p>Please confirm the details below!</p>
				<p>If, offer is accepted you will be charged a success fee. Making this offer represents your commitment to selling this at the offered price.</p>
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
				        	<form action="confirm_offer.php" method="POST">
				        		<input type="hidden" name="agi_id" value="<?=$id?>">
				        		<input type="hidden" name="sent_from_id" value="<?php echo getValue("ambit_registration","ar_id",$_SESSION["ar_id"],"ar_id")?>">
				        	<div class="sort-title">
				        		<h3 class="color-offer-text"><a itemprop="url" href="general_item_details.php?id=<?php echo $id; ?>" title="<?php echo $listing_title; ?>" rel="bookmark"><?=$listing_title?></a></h3>
				        		<h4 class="color-offer-text"><a href="general_item_listing.php?id=<?php echo $cat_id; ?>"><?php echo getGeneralItemCategory($cat_id); ?></a></h4>
				        		<h4>Subtitle: <?=$subtitle?></h4>
				        		<div class="radios-days watch-margins">
				        			<span class="days-span">  Price:</span>
				        			<span style="margin-left:49px">$<?=$_POST['price']?><input type="hidden" name="price" class="input-price" value="<?=$_POST['price']?>"> </span>
				        		</div>
				        		
				        		<div class="radios-days watch-margins">
				        			<span class="days-span"> Valid for:</span>
				        			<span style="margin-left:15px;"><?php  if($_POST['days']==1){ echo $_POST['days'].' '.'day';}else if($_POST['days']==3){
				        				echo $_POST['days'].' '.'days';
				        			}?> </span>
				        			<input type="hidden" name="days" value="<?=$_POST['days']?>">
				        			<!-- <input type="radio" class="radio-days" name="days" value="1"> 1 day
				        			<input type="radio" class="radio-days" name="days" value="3"> 3 days -->
				        		</div>
				        		
				        		<div class="watchers watch-margins">
				        			<div class="fix-width days-span">Watchers:</div>
				        			<div class="fix-width fix-width-2">
				        				
				        				<?php 
				        					$watchers=$_POST['watchers'];
				        					foreach($watchers as $watch):
				        				?>
				        				<div class="single-check-watch" style="margin-left:19px">
				        					<i class="fa fa-check-square checkmark"></i> <?php echo getValue("ambit_registration","name",$watch,"ar_id")?> 
				        					<input type="hidden" name="watchers[]" value="<?=$watch?>">
				        				</div>
				        				<?php endforeach;?>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="button-area-watch" style="width:100px; margin:19px auto">
			        			<button type="submit" name="confirm_submit" value="confirm" class="btn btn-default">Confirm Offer >></button>
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