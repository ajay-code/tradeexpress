<?php
session_start();
define("WEBSITE_URL","https://www.tradeexpress.co.nz");
require_once("function.php");
if(isset($_GET["category"])){
	$ex=explode('%?&',$_GET["category"]);
	$_GET["category"]=$ex[0];
	if(isset($ex[1])){
		$_GET["for"]=$ex[1];
	}
}
function doSelectConditionInFile($select,$table,$condition="",$orderBy=""){
	global $conn;
 	$where=" WHERE 1 ".$condition;
 	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	/*echo $query;*/
	return mysqli_query($conn,$query);
}
$_GET=trimmer($_GET);
//print_r($_GET);
?>
<style>
.list .videolink{ display:block;}
.grid .videolink{ display:none;}
.list .clientlogo{display:none;}
.grid .clientlogo{display:block;}
.grid .clientlogogrid{display:block;}
.list .clientlogogrid{display:none;}
.list .clientlogolist{display:block;}
.grid .clientlogolist{display:none;}
</style>

<section id="loop_classified_taxonomy" class="search_result_listing list" >
  <?php
		$order_by='';
		$page =$_GET["page"];
		$setLimit =$_GET["limit"];
		$pageLimit = ($page * $setLimit) - $setLimit;
		$limit=' LIMIT '.$pageLimit.','.$setLimit;		
		$condition = " AND `status` = 1 ";
		if(isset($_GET["category"]) && $_GET["category"] !="0"){
			$con1=array("cat_id"=>$_GET["category"]);
			$category = $_GET["category"];
			$condition .= " AND (`cat_id` = '".$category."') ";
		}
		if(isset($_GET["sub_category"]) && $_GET["sub_category"] !=""  && $_GET["sub_category"] > 0){
			$con2=array("sub_cat_id"=>$_GET["sub_category"]);
			$sub_cat_id = $_GET["sub_cat_id"];
			$condition .= " AND (`sub_cat_id` = '".$sub_cat_id."') ";
		}
		if(isset($_GET["sub_sub_cat_id"]) && $_GET["sub_sub_cat_id"] !=""   && $_GET["sub_sub_cat_id"] > 0){
			$con3=array("sub_sub_cat_id"=>$_GET["sub_sub_cat_id"]);
			$sub_sub_cat_id = $_GET["sub_sub_cat_id"];
			$condition .= " AND (`sub_sub_cat_id` = '".$sub_sub_cat_id."') ";
		}
		if(isset($_GET["country"]) && $_GET["country"] !="" && $_GET["country"] > 0 ){
			$con3=array("region"=>$_GET["country"]);
			$country = $_GET["country"];
			$condition .= " AND (`country` = '".$country."') ";
		}
 		if(isset($_GET["region"]) && $_GET["region"] !="" && $_GET["region"] > 0 ) {
			$con3=array("region"=>$_GET["region"]);
			$region = $_GET["region"];
			$condition .= " AND (`region` = '".$region."') ";
		}
		if(isset($_GET["city"]) && $_GET["city"] !=""  && $_GET["city"] > 0){
			$con3=array("city"=>$_GET["city"]);
			$region = $_GET["city"];
			$condition .= " AND (`city` = '".$city."') ";
		}
		if(isset($_GET["suburb"]) && $_GET["suburb"] !=""  && $_GET["suburb"] > 0){
			$con3=array("suburb"=>$_GET["suburb"]);
			$suburb = $_GET["suburb"];
			$condition .= " AND (`suburb` = '".$suburb."') ";
		}
		if(isset($_GET["keyword"]) && $_GET["keyword"] !=""){
			$con3=array("keyword"=>$_GET["keyword"]);
			$keyword = $_GET["keyword"];
			$condition .= " AND (
								 `listing_title` LIKE '".$keyword."%' ||  
								 `street`  LIKE '".$keyword."%' ||    
								 `street_name`   LIKE '".$keyword."%' ||  
								 `prop_desc`  LIKE '".$keyword."%' ||  
								 `parking`  LIKE '".$keyword."%' ||  
								 `amenities`  LIKE '".$keyword."%' ||  
								 `agency_reference`  LIKE '".$keyword."%'   ||
								 `ap_id`  = '".$keyword."'     
								) ";
		}
		if(isset($_GET["bedroom_start"]) && $_GET["bedroom_start"] !=""){
 			$bedroom_start = $_GET["bedroom_start"];
		}
		if(isset($_GET["bedroom_end"]) && $_GET["bedroom_end"] !=""){
			$bedroom_end = $_GET["bedroom_end"];
		}
		if( isset( $bedroom_start ) && $bedroom_start != "" && !isset($bedroom_end) && $bedroom_end =="" ){
		    $condition .= " AND  (`bedroom` <= '".$bedroom_start."')" ;
		}
		if( !isset( $bedroom_start ) && $bedroom_start == "" && isset($bedroom_end) && $bedroom_end !="" ){
		    $condition .= " AND  ( `bedroom` = '".$bedroom_end."')" ;
		}
		if( isset( $bedroom_start ) && $bedroom_start != "" &&  isset($bedroom_end) && $bedroom_end !="" ){
		    $condition .= " AND  (`bedroom` >= '".$bedroom_start."' AND `bedroom` <= '".$bedroom_end."' )" ;
		}
		
		
		if(isset($_GET["bathroom_start"]) && $_GET["bathroom_start"] !=""){
 			$bathroom_start = $_GET["bathroom_start"];
		}
		if(isset($_GET["bathroom_end"]) && $_GET["bathroom_end"] !=""){
			$bathroom_end = $_GET["bathroom_end"];
		}
		if( isset( $bathroom_start ) && $bathroom_start != "" && !isset($bathroom_end) && $bathroom_end =="" ){
		    $condition .= " AND  (`bathroom` = '".$bathroom_start."')" ;
		}
		if( !isset( $bathroom_start ) && $bathroom_start == "" && isset($bathroom_end) && $bathroom_end !="" ){
		    $condition .= " AND  ( `bathroom` = '".$bathroom_end."')" ;
		}
		if( isset( $bathroom_start ) && $bathroom_start != "" &&  isset($bathroom_end) && $bathroom_end !="" ){
		    $condition .= " AND  (`bathroom` >= '".$bathroom_start."' AND `bathroom` <= '".$bathroom_end."' )" ;
		}
		
		/*specify_price*/
		if(isset($_GET["min_price"]) && $_GET["min_price"] !=""){
 			$min_price = $_GET["min_price"];
		}
		if(isset($_GET["max_price"]) && $_GET["max_price"] !=""){
			$max_price = $_GET["max_price"];
		}
		if( isset( $min_price ) && $min_price != "" && !isset($max_price) && $max_price =="" ){
		    $condition .= " AND  ( `expected_sale_price` = '".$min_price."')" ;
		}
		if( !isset( $min_price ) && $min_price == "" && isset($max_price) && $max_price !="" ){
		    $condition .= " AND  ( `expected_sale_price` = '".$max_price."')" ;
		}
		if( isset( $min_price ) && $min_price != "" &&  isset($max_price) && $max_price !="" ){
		    $condition .= " AND  ( `expected_sale_price` >= '".$min_price."' AND `expected_sale_price` <= '".$max_price."' )" ;
		}
		
		
		if(isset($_GET["start_floor_area"]) && $_GET["start_floor_area"] !=""){
 			$start_floor_area = $_GET["start_floor_area"];
		}
		if(isset($_GET["end_floor_area"]) && $_GET["end_floor_area"] !=""){
			$end_floor_area = $_GET["end_floor_area"];
		}
		if( isset( $start_floor_area ) && $start_floor_area != "" && !isset($end_floor_area) && $end_floor_area =="" ){
		    $condition .= " AND  ( `floor_area` = '".$start_floor_area."')" ;
		}
		if( !isset( $start_floor_area ) && $start_floor_area == "" && isset($end_floor_area) && $end_floor_area !="" ){
		    $condition .= " AND  ( `floor_area` = '".$end_floor_area."')" ;
		}
		if( isset( $start_floor_area ) && $start_floor_area != "" &&  isset($end_floor_area) && $end_floor_area !="" ){
		    $condition .= " AND  ( `floor_area` >= '".$start_floor_area."' AND `floor_area` <= '".$end_floor_area."' )" ;
		}
		
		/*if(isset($_GET["uploader"]) && $_GET["uploader"] !=""){
			$con9=array("uploader"=>$_GET["uploader"]);
		}*/
		
		/*if(isset($_GET["search"]) && trim($_GET["search"]) !=""){
			$order_by.=" AND listing_title LIKE '%".trim($_GET["search"])."%'";
		}
		*/
		if(isset($_GET["classified_sortby"]) && $_GET["classified_sortby"] !="0"){
				$order_by.= ' ORDER BY '.$_GET["classified_sortby"];		
		}else{
			$order_by .= ' ORDER BY positions DESC,  ap_id DESC';
		}
		$select="ap_id,uploader,cat_id,sub_cat_id,listing_title,street,street_name,expected_sale_price,prop_desc,agency_reference,posting_date,logo,
				 country,city,suburb,region,bedroom,bathroom";
		$from="add_property";
		
		if(isset($_GET["uploader"]) && $_GET["uploader"] !=""){
			//$condition=array();
		}
		$Resource = doSelectConditionInFile($select,$from,$condition,$order_by.$limit);
  		$prop_dtls_limit=getDetails($Resource);
		$total_prop_dtls=getDetails(doSelectConditionInFile($select,$from,$condition,$order_by));
		if(isset($_GET["for"]) && $_GET["for"]!="property"){
			$total_prop_dtls=array();	
			$prop_dtls_limit=array();	
		}
		$total_page=ceil(count($total_prop_dtls)/$setLimit);
		$prop_dtls_limit=trimmer_db_array($prop_dtls_limit);
		if(!empty($total_prop_dtls)){
		foreach($prop_dtls_limit as $k=>$v){
			$propIds= $v['ap_id'];
			$background= '';
			$propFetured=getDetails(doSelect("aplf_id,ap_id, Feature_Combo","add_property_listing_features",array("ap_id"=>$propIds)));
			if(count($propFetured)>0){
				foreach($propFetured as $propFeturedKey=> $propFeturedData){
					$featuredCombo= $propFeturedData['Feature_Combo'];	
					if($featuredCombo == '1'){
						$background= 'background:yellow;';
					}else if($featuredCombo == '2' || $featuredCombo == '3'){
						$background= 'background:yellow;';
					}else{
						$background= '';
					}
				}
		  }	
		  
		  
		  $ProperyVideo = doSelect("video","add_property_video",array("ap_id"=>$propIds));
  		  $ProperyVideoDetails=getDetails($ProperyVideo);
		  
		  $country = $v['country'];
		  $city = $v['city'];
		  $suburb = $v['suburb'];
		  $region = $v['region'];
		  
		  $CountryResource = doSelect("cn_name","ambit_country",array("cn_id"=>$country));
  		  $CountryData =getDetails($CountryResource);
		  
		  $CityResource = doSelect("ct_name","ambit_city",array("ct_id"=>$city));
  		  $CityData =getDetails($CityResource);	
		  
		  $RegionResource = doSelect("region","ambit_region",array("ar_id"=>$region));
  		  $RegionData =getDetails($RegionResource);	
		  
		  $SuburbResource = doSelect("suburb","ambit_suburb",array("sub_id"=>$suburb));
  		  $SuburbData =getDetails($SuburbResource);		
	  	  
	     /* print_r($CountryData);
		  print_r($CityData);
		  print_r($RegionData);
		  print_r($SuburbData);*/
		
		$property_price_details=getDetails(doSelect("price_type, label_name, value","add_property_price_dtls",array("ap_id"=>$propIds)));
		$prop_label= '';
		$prop_price_vals= '';
		$prop_price_type = '';
 		foreach($property_price_details as $property_price_details_key=>$property_price_details_vals){
			$prop_price_type = $property_price_details_vals['price_type'];
			$prop_price_vals = $property_price_details_vals['value'];										
			if($property_price_details_vals['price_type'] == '1'){
				$prop_label= 'Asking price';
			}else if($property_price_details_vals['price_type'] == '2'){
				$prop_label= 'Enquiries over';
			}else if($property_price_details_vals['price_type'] == '3'){
				$prop_label= 'To be auctioned';
			}else if($property_price_details_vals['price_type'] == '4'){
				$prop_label= 'Tenders closing';
			}else if($property_price_details_vals['price_type'] == '5'){
				$prop_label= 'Price by negotiation';
			}else if($property_price_details_vals['price_type'] == '6'){
				$prop_label= 'Deadline Private Treaty';
			}else {
				$prop_label= '';
			}
		}
		
									
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
      <img src="<?php echo WEBSITE_URL?>/property_image/<?php echo $image; ?>"  alt="<?php echo $v["listing_title"]; ?>" title="<?php echo $v["listing_title"]; ?>" /> </a> 
	  <?php if($ProperyVideoDetails &&  count($ProperyVideoDetails) > 0 ){ 
	 			foreach($ProperyVideoDetails as $videores=> $videoData){?>
			 	    <a class="videolink" href="<?php echo $videoData['video'];?>" target="_blank">Video</a>
				<?php } 
		  }?>  
	  </div>
	 <div class="sort-price show-desktop clientlogogrid"> 
			<?php if($v["logo"] != "" && file_exists("logo/".$v["logo"])){?>
					<img src="https://www.tradeexpress.co.nz/logo/<?php  echo $v["logo"]?>" width=""  class="" />
			<?php }?>
		</div>
	  
    <!-- classified image end -->
    <div class="entry">
      <div class="sort-title">
        <div class="classified-title">
          <h2 class="entry-title"><a itemprop="url" href="property_details.php?id=<?php echo $v["ap_id"]; ?>" title="<?php echo $v["listing_title"]; ?>" rel="bookmark"><?php echo $v["listing_title"]; ?></a>
		    <?php if(isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v["uploader"]){ ?>
            &nbsp &nbsp <i class="fa fa-pencil-square-o" title="Edit" onclick="update_property('<?php echo $v["ap_id"];  ?>');" style="cursor:pointer;" aria-hidden="true"></i>
            <?php } ?>
          </h2>
		   <div class="location" style="clear:both;"><?php $SuburbName = "";
			 if( $SuburbData && count($SuburbData) > 0  ){ $SuburbName = $SuburbData[0]["suburb"];}
 			 echo $v["street"].' ,'.$v["unit_flat"].' '.$v["street_name"].", ".$SuburbName.', '.getRegionName($v["region"]); ?> </div>
		  <div class="postdate" style="clear:both;"><?php echo get_date_str($v["posting_date"]);  ?></div>
         <?php if($prop_price_type == '1' && false ){?>  <div class="show-mobile"> <span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["expected_sale_price"];  ?></span></span> <?php /*?><span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span><?php */?> </div> <?php } ?>
        </div>
        <div class="classified-info">
          <?php 	$uploader=$v["uploader"]; if($uploader !="admin"){$uploader="Siddhartha";	}?>
          <div class='classified-tax-detail clearfix'>
         <?php /*?>   <p class="bottom_line i_category"><a href="property_listing.php?id=<?php echo $v["cat_id"]; ?>"><?php echo getPropertyCategory($v["cat_id"]); ?></a></p>
            <p class="owner_name">
              <label>By </label>
              <a href="//yourwebsite.com/">
              <?php  echo $uploader; ?>
              </a></p>
            <div class="listing_rating">
              <div class="directory_rating_row"> <span class="single_rating">
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
            </div><?php */?>
            <?php
									if($v["agency_reference"]!=""){
									?>
            <?php /*?><div class="address">
              <label>Agency : </label>
              <?php echo $v["agency_reference"]; ?></div><?php */?>
            <?php
									}
									?>
            <?php /*?><div class="address">
              <label>Street Name : </label>
             <?php 
			 $SuburbName = "";
			 if( $SuburbData && count($SuburbData) > 0  ){ $SuburbName = $SuburbData[0]["suburb"];}
			 
			 echo $v["street"].' ,'.$v["unit_flat"].' '.$v["street_name"].", ".$SuburbName.', '.getRegionName($v["region"]); ?></div><?php */?>
            <!--	<ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul> -->
          </div>
        </div>
        <!-- Start Post Content -->
        <?php /*?><div itemprop="description" class="entry-summary">
          <p><?php echo string_display($v["prop_desc"],0,78);  ?> <a class="moretag more" href="general_item_details.php?id=<?php echo $v["ap_id"]; ?>" > Read more&#8230;</a></p>
        </div><?php */?>
        <!-- End Post Content -->
        <!-- Show custom fields where show on listing = yes -->
        <div class="bedrooom-bathroom"><?php if( $v["bedroom"] != "" ){echo $v["bedroom"]." Bedroom"; } ?> <?php if( $v["bathroom"] != "" ){echo $v["bathroom"]." Bathroom"; }?></div>
		
	    <div class="rev_pin">
          <ul>
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
			<?php
			/*$prop_price_type 
		$prop_price_vals 
		$prop_label*/
	
			?>
             <?php /*?><li class="review"> <a href="property_details.php?id=<?php echo $v["ap_id"]; ?>" target="_blank"><?php echo getItemReviewNumber('ambit_property_review',$v["ap_id"]); ?> &nbsp;</a></li><?php */?>
          </ul>
 		  <?php
 			if($prop_price_type  == '1'){
			  // $prop_label= 'Asking price';
			 ?>
			 <span class="bottomprice"><?php  if( $prop_price_vals != "" ){echo  currency().$prop_price_vals;} ?></span> 
			 <?php  
			}else if($prop_price_type  == '2'){ // $prop_label= 'Enquiries over';?>
           			<span class="bottomprice"><?php echo "Enquiries over". " ".currency().$prop_price_vals ?></span> 
			<?php }else if($prop_price_type  == '3'){ // $prop_label= 'To be auctioned';?>
				<span class="bottomprice"><?php echo "To be auctioned";?></span> 
			<?php }else if($prop_price_type  == '4'){ // $prop_label= 'Tenders closing';?>
				<span class="bottomprice"><?php echo "Sale By Tender";?></span> 
			<?php }else if($prop_price_type  == '5'){ // $prop_label= 'Price by negotiation';?>
				<span class="bottomprice"><?php echo "Price by negotiation" ; ?></div> 
			<?php }else if($prop_price_type  == '6'){ // $prop_label= 'Deadline Private Treaty'; ?>
				<span class="bottomprice"><?php echo "Deadline Private Treaty"; ?></span> 
			<?php } 
		  ?>
		   	
        </div>
      </div>
     <?php /*?> <div class="sort-date show-desktop"> <span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span> </div><?php */?>
      <?php if($prop_price_type == '1' && false){?><div class="sort-price show-desktop" id="expected_sale_price"> <span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["expected_sale_price"];  ?></span></span> </div><?php } ?> 
       <div class="sort-price show-desktop clientlogolist"> 
			<?php if($v["logo"] != "" && file_exists("logo/".$v["logo"])){?>
					<img src="https://www.tradeexpress.co.nz/logo/<?php  echo $v["logo"]?>" width=""  class="" />
			<?php }?>
		</div>
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
        <a href="javascript:void(0);" onclick="ajax_pagintn1('1');" class="next page-numbers"><strong>FIRST</strong></a> <a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
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
        <a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a> <a href="javascript:void(0);" onclick="ajax_pagintn1('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
        <?php
									  }
									  ?>
      </div>
    </div>
</section>
<script src="images/jquery-1.12.4.js"></script>
