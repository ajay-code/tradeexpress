<?php
session_start();
require_once("function.php");
if(isset($_GET["category"])){
$ex=explode('%?&',$_GET["category"]);
$_GET["category"]=$ex[0];
if(isset($ex[1])){
$_GET["for"]=$ex[1];
}
}
$_GET=trimmer($_GET);
//print_r($_GET);
?>


                
     <section id="loop_classified_taxonomy" class="search_result_listing list" >
     	<?php
		$order_by='';
		$page =$_GET["page"];
		$setLimit =$_GET["limit"];
		$pageLimit = ($page * $setLimit) - $setLimit;
		$limit=' LIMIT '.$pageLimit.','.$setLimit;		$con1=$con2=$con3=$con4=$con5=$con6=$con7=$con8=$con9=$con10=array();
		if(isset($_GET["category"]) && $_GET["category"] !="0"){
		$con1=array("cat_id"=>$_GET["category"]);
		}
		if(isset($_GET["sub_category"]) && $_GET["sub_category"] !=""){
		$con2=array("sub_cat_id"=>$_GET["sub_category"]);
		}
		if(isset($_GET["sub_sub_category"]) && $_GET["sub_sub_category"] !=""){
		$con3=array("sub_sub_cat_id"=>$_GET["sub_sub_category"]);
		}
		if(isset($_GET["min_price"]) && $_GET["min_price"] !=""){
		$con4=array("expected_sale_price >"=>$_GET["min_price"]);
		}
		if(isset($_GET["max_price"]) && $_GET["max_price"] !=""){
		$con5=array("expected_sale_price <"=>$_GET["max_price"]);
		}
		if(isset($_GET["region"]) && $_GET["region"] !="0"){
		$con6=array("region"=>$_GET["region"]);
		}
		if(isset($_GET["bedroom"]) && $_GET["bedroom"] !=""){
		$con7=array("bedroom >"=>$_GET["bedroom"]);
		}
		if(isset($_GET["bathroom"]) && $_GET["bathroom"] !=""){
		$con8=array("bathroom >"=>$_GET["bathroom"]);
		}
		if(isset($_GET["uploader"]) && $_GET["uploader"] !=""){
		$con9=array("uploader"=>$_GET["uploader"]);
		}
		if(isset($_GET["status"])){
		$con10=array("status"=>$_GET["status"]);
		}
		if(isset($_GET["search"]) && trim($_GET["search"]) !=""){
		$order_by.=" AND listing_title LIKE '%".trim($_GET["search"])."%'";
		}
		if(isset($_GET["classified_sortby"]) && $_GET["classified_sortby"] !="0"){			$order_by.= ' ORDER BY '.$_GET["classified_sortby"];		}else{			$order_by .= ' ORDER BY positions DESC,  ap_id DESC';		}
		
		$select="ap_id,uploader,cat_id,sub_cat_id,listing_title,street,street_name,expected_sale_price,prop_desc,agency_reference,posting_date";
		$from="add_property";
		$condition=array("status"=>1);
		if(isset($_GET["uploader"]) && $_GET["uploader"] !=""){
		$condition=array();
		}
		$condition=array_merge($condition,$con1,$con2,$con3,$con4,$con5,$con6,$con7,$con8,$con9,$con10);
		$prop_dtls_limit=getDetails(doSelect($select,$from,$condition,$order_by.$limit));
		$total_prop_dtls=getDetails(doSelect($select,$from,$condition,$order_by));
		if(isset($_GET["for"]) && $_GET["for"]!="property"){
		$total_prop_dtls=array();	
		$prop_dtls_limit=array();	
		}
		$total_page=ceil(count($total_prop_dtls)/$setLimit);
		$prop_dtls_limit=trimmer_db_array($prop_dtls_limit);
		if(!empty($total_prop_dtls)){
		foreach($prop_dtls_limit as $k=>$v){				$propIds= $v['ap_id'];				$background= '';				$propFetured=getDetails(doSelect("aplf_id,ap_id, Feature_Combo","add_property_listing_features",array("ap_id"=>$propIds)));				if(count($propFetured)>0){					foreach($propFetured as $propFeturedKey=> $propFeturedData){						$featuredCombo= $propFeturedData['Feature_Combo'];						if($featuredCombo == '1'){							$background= 'background:yellow;';						}else if($featuredCombo == '2' || $featuredCombo == '3'){							$background= 'background:yellow;';						}else{							$background= '';						}					}				}								
		?>
                       	<article class="post  classified-1080 featured_c" style="<?php echo $background; ?>">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="property_details.php?id=<?php echo $v["ap_id"]; ?>" >
                    
					<?php
						$image=trim(seeMoreDetails("image","add_property_photo",array("status"=>1,"ap_id"=>$v["ap_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
					?>
					<img src="property_image/<?php echo $image; ?>"  alt="" title="<?php echo $v["listing_title"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
										<h2 class="entry-title"><a itemprop="url" href="property_details.php?id=<?php echo $v["ap_id"]; ?>" title="<?php echo $v["listing_title"]; ?>" rel="bookmark"><?php echo $v["listing_title"]; ?></a>
										<?php
										if(isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v["uploader"]){
										?>
										&nbsp &nbsp <i class="fa fa-pencil-square-o" title="Edit" onclick="update_property('<?php echo $v["ap_id"];  ?>');" style="cursor:pointer;" aria-hidden="true"></i>
										<?php
										}
										?>
										</h2>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["expected_sale_price"];  ?></span></span>											
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
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><a href="property_listing.php?id=<?php echo $v["cat_id"]; ?>"><?php echo getPropertyCategory($v["cat_id"]); ?></a></p><p class="owner_name"><label>By </label> <a href="//yourwebsite.com/"><?php  echo $uploader; ?></a></p>
										<div class="listing_rating">
										<div class="directory_rating_row">
<span class="single_rating">
<?php
$rating_array=getDetails(doSelect("count(*) as count,SUM(rating) as sum","ambit_property_review",array("status"=>1,"item_id"=>$v["ap_id"])));
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
									if($v["agency_reference"]!=""){
									?>
									<div class="address"><label>Agency : </label> <?php echo $v["agency_reference"]; ?></div>
									<?php
									}
									?>
									<div class="address"><label>Street Name : </label> <?php echo $v["street_name"]; ?></div>
								<!--	<ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul> -->
									</div>									
									</div>

									<!-- Start Post Content -->
									<div itemprop="description" class="entry-summary"><p><?php echo string_display($v["prop_desc"],0,78);  ?><a class="moretag" href="general_item_details.php?id=<?php echo $v["ap_id"]; ?>" class="more"> Read more&#8230;</a></p>
</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									<div class="rev_pin"><ul>                     
    <li class="" id="watch_span_p<?php echo $v["ap_id"]; ?>">
	<?php
	if(isset($_SESSION["ar_id"])){
	$check=check_watch_list("add_to_watch_property",array("cus_id"=>$_SESSION["ar_id"],"item_id"=>$v["ap_id"]));
	if($check){
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:#F0B74A;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span_p<?php echo $v["ap_id"]; ?>');" > Remove from watchlist</a></span>
	<?php
	}else{
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span_p<?php echo $v["ap_id"]; ?>');" > Add to watchlist</a></span>
	<?php	
	}
	}else{
	?>
	<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $v["ap_id"]; ?>','add_to_watch_property','watch_span_p<?php echo $v["ap_id"]; ?>');" > Add to watchlist</a></span>
	<?php
	}
	?>
	</li>
    <li class="review"> <a href="property_details.php?id=<?php echo $v["ap_id"]; ?>" target="_blank"><?php echo getItemReviewNumber('ambit_property_review',$v["ap_id"]); ?> &nbsp;</a></li>
                              </ul></div>                         		</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>                         		</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["expected_sale_price"];  ?></span></span>                         		</div>
                         		
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
				<a href="javascript:void(0);" onclick="ajax_pagintn1('1');" class="next page-numbers"><strong>FIRST</strong></a>
				<a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
									  <a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a>
									  <a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
									  <?php
									  }
									  ?>
			    </div>
        </div>
         		  
     </section>
	 <script src="images/jquery-1.12.4.js"></script>
