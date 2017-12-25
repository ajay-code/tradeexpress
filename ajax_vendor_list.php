<?php
session_start();
require_once("function.php");

?>

<section id="loop_classified_taxonomy" class="search_result_listing list" >
     	<?php
		$page =$_GET["page"];
		$setLimit =$_GET["limit"];
		$pageLimit = ($page * $setLimit) - $setLimit;
		$limit=' LIMIT '.$pageLimit.','.$setLimit;
		$sub_query="";
		if(isset($_GET["name"]) && $_GET["name"]!=""){
			$sub_query=" AND (name LIKE '%".$_GET["name"]."%'  OR ct_name LIKE '%".$_GET["name"]."%' OR cn_name LIKE '%".$_GET["name"]."%' OR company LIKE '%".$_GET["name"]."%' )";
		}
		
		$select="ar_id,name,email,phone,landline,ct_name,cn_name,company,address,image,joined_on,about,status";
		$from="ambit_registration as a, ambit_city as b,ambit_country as c";
		$condition=array("status"=>1,"b.ct_id"=>"a.city","c.cn_id"=>"a.country");
		$query=doSelect2($select,$from,$condition);
		$query.=$sub_query;
		$vendor_list=getDetails(doSelect3($query.$limit));
		$vendor_list_total=getDetails(doSelect3($query));
		
		$total_page=ceil(count($vendor_list_total)/$setLimit);
		$vendor_list=trimmer_db_array($vendor_list);
		if(!empty($vendor_list_total)){
		foreach($vendor_list as $k=>$v){
		?>
                       	<article class="post  classified-1080 featured_c">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="profile_details.php?cus_id=<?php echo $v["ar_id"]; ?>" >
                   <img src="customer_image/<?php echo $v["image"]; ?>"  alt="<?php echo $v["name"]; ?>" title="<?php echo $v["name"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
										<h2 class="entry-title"><a itemprop="url" href="profile_details.php?cus_id=<?php echo $v["ar_id"]; ?>" title="<?php echo $v["name"]; ?>" rel="bookmark"><?php echo $v["name"]; ?></a>
			<?php 
			if(isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v["ar_id"]){
			?>
			&nbsp &nbsp <a href="edit_profile.php"><i class="fa fa-pencil-square-o" title="Edit" style="cursor:pointer;"  aria-hidden="true"></i></a>
			<?php
			}
			?>
										</h2>
										<?php
										$submission=total_submission_by_cus($v["ar_id"]);
										if($submission=="0"){
										$submission='Not Uploaded Yet !!!';
										}else{
										$submission.=' Submitted';
										}
										?>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo $submission  ?></span></span>											
											<span class="last-updated"><?php echo get_date_str($v["joined_on"]);  ?></span>										
										</div>
									</div>
									<div class="classified-info">
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><?php echo $v["ct_name"];  ?> (<?php echo $v["cn_name"];  ?>)</p></div>
									<div class="address"><label>Company : </label> <?php echo $v["company"]; ?></div>
									<div class="address"><label>Address : </label> <?php echo $v["address"];; ?></div>
									</div>
									<!-- Start Post Content -->
									<div itemprop="description" class="entry-summary"><p><?php echo string_display($v["about"],0,78);  ?><a class="moretag" href="profile_details.php?cus_id=<?php echo $v["ar_id"]; ?>" class="more"> Read more&#8230;</a></p>
									</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["joined_on"]);  ?></span>                         		
								</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo $submission  ?></span></span>                         		
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
				<a href="javascript:void(0);" onclick="ajax_pagintn('1');" class="next page-numbers"><strong>FIRST</strong></a>
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
									  <a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a>
									  <a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
									  <?php
									  }
									  ?>
			    </div>
        </div>
         		  
     </section>