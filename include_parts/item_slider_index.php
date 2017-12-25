<div class="flexslider clearfix post_slider slider_carousel slide ">
	<h3 class="widget-title"> General Items </h3>
	<script>
		$(window).resize(function () {
			var width = $('.list-img').width();
			$('.list-img').height(width);
		});
		$(document).ready(function () {
			var intervalID = setInterval(function () {
				var width = $('#list-0').width();
				if (width > 0) {
					window.clearInterval(intervalID);
				}
				$('.list-img').height(width);
				$('.flexslider596617191').resize();
			}, 1000);
		})
	</script>
	<style>
		.slider_carousel .slides li {
			position: relative;
			margin-right: 10px;
		}
		ul.slides{padding:0;margin:0}
		.list-container{
			border: 1px solid #e2e2e2 !important;
		}
		.list-img{
			display: flex !important;
			flex-flow: row nowrap;
			align-items: center;
			/* height: 174px; */
            overflow: hidden;
			
		}
		.list-img img{
			border: none !important;
			
		}
		.list-info {
			font-size: 14px !important;
			background-color: #f8f8f8;
			padding: 2px;
			height: 79px;
		}

		.list-info--title {
			white-space: nowrap;
			width: 100%;
			overflow: hidden;
			text-overflow: ellipsis;
			text-align: left;
		}

		.d-flex {
			display: flex;
		}

		.space-between {
			justify-content: space-between;
		}

		.self-align-bottom {
			align-self: flex-end;
		}
		.bold{
			color: #000;
			font-weight: 500;
		}
	</style>
	<div class="slides_container clearfix flexslider596617191">
		<ul class="slides">
				<?php
				$select="agi_id,listing_title,listing_type,buy_now,brand_item,start_price,posting_status,status";
				$from="add_general_items";
				$condition=array();
				//$condition=array("listing_length >"=>'CURDATE()');
				$general_item_list=getDetails(doSelect1($select,$from,$condition,' ORDER BY rand()'));
				$general_item_list=trimmer_db_array($general_item_list);
				foreach($general_item_list as $k=>$v){
				?>	
					 	<li class="featured_c" id="list-<?= $k ?>">
						 	<div class="list-container">	
							<!--	<span class="classified-status" style="background:#b00809">Sold</span> -->
						<?php
						$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$v["agi_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
						?>
								<a class="list-img" href="general_item_details.php?id=<?php echo $v["agi_id"];  ?>">
                                	<img src="general_items_image/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>"/>
                                </a>
								<div class="list-info">
									<div class="list-info--title">
										<a href="general_item_details.php?id=<?php echo $v["agi_id"];  ?>"><?= string_display1($v["listing_title"],0,25) ? string_display1($v["listing_title"],0,25): '------- ----- -- --- ----' ?></a>
									</div>
									<?php
									if($v["listing_type"]!="1"){
									$price_item=currency().$v["start_price"];
									}else{
									$price_item=currency().$v["buy_now"];
									}
									$current_bid = '$23.00';
									?>
									<div class="d-flex space-between">
										<span class="self-align-bottom">
											<?= $current_bid  ?>
										</span>
										<span>
											<span class="bold">
												Buy now
											</span><br>
											<span>
												<?= $price_item ?>
											</span>
										</span>
									</div>
								</div>
							</div>							
						</li>
				<?php
				}
				?>
		</ul>
	</div>
</div>
			
<div class="flexslider clearfix post_slider slider_carousel slide ">
	<h3 class="widget-title"> Property </h3>

	<div class="slides_container clearfix flexslider596617191">
		<ul class="slides">
			<?php
				$select="ap_id,listing_title,listing_duration,expected_sale_price,posting_status,status";
				$from="add_property";
				$condition=array();
				$property_list=getDetails(doSelect1($select,$from,$condition,' ORDER BY rand()'));
				$property_list=trimmer_db_array($property_list);
				foreach($property_list as $k=>$v){
				?>	
					 	<li class="featured_c">
						 	<div class="list-container">	
							<!--	<span class="classified-status" style="background:#b00809">Sold</span> -->
						<?php
						$image=trim(seeMoreDetails("image","add_property_photo",array("status"=>1,"ap_id"=>$v["ap_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
						?>
								<a class="list-img" href="property_details.php?id=<?php echo $v["ap_id"];  ?>">
                                	<img src="property_image/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>"/>
                                </a>
								<div class="list-info">
									<div class="list-info--title">
										<a href="general_item_details.php?id=<?php echo $v["ap_id"];  ?>"><?= string_display1($v["listing_title"],0,25) ? string_display1($v["listing_title"],0,25): '------- ----- -- --- ----' ?></a>
									</div>
									
									<div class="d-flex space-between" style="height:calc(100% - 25px)">
										<span class="self-align-bottom" style="font-weight:500">
											<?= $v["expected_sale_price"] ? currency().$v["expected_sale_price"]: 'Price By Negociation'  ?>
										</span>
									</div>
								</div>							
							</div>							
						</li>
				<?php
				}
				?>
					</ul>
				</div>
			</div>
			
			<div class="flexslider clearfix post_slider slider_carousel slide ">
							  <h3 class="widget-title"> Job </h3>
				
				<div class="slides_container clearfix flexslider596617191">
					<ul class="slides">
				<?php
				$select="aj_id,listing_title,company,contact_name,posting_status,status";
				$from="add_job";
				$condition=array();
				$job_list=getDetails(doSelect1($select,$from,$condition,' ORDER BY rand()'));
				$job_list=trimmer_db_array($job_list);
				foreach($job_list as $k=>$v){			
				?>
					 	<li class="featured_c">
						 	<div class="list-container">	
						 	
							<!--	<span class="classified-status" style="background:#b00809">Sold</span> -->
						<?php
						$image=trim(seeMoreDetails("banner","add_job_brand",array("aj_id"=>$v["aj_id"])));
						if($image==""){
							$image="unknown.jpg";
						}
						?>
								<div class="job-info">
									<a href="job_details.php?id=<?php echo $v["aj_id"];  ?>">
										<span  class="job-info-company"> <?= $v['company']? $v['company'] : '------ ---'?> </span><br>
										<span class="job-info-title" ><?= string_display1($v["listing_title"],0,25) ? string_display1($v["listing_title"],0,25): '------ --- ----- ---- -- '; ?></span>
									</a>	
								</div> 
								<a class="job-img" href="job_details.php?id=<?php echo $v["aj_id"];  ?>">
                                	<img src="branding/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>"/>
                                </a>
							</div>				
						</li>
				<?php
				}
				?>
				<style>
					.job-info{
						display: flex !important;
						flex-flow: row nowrap;
						align-items: center;
						padding-left: 10px;
						height: 174px;
						background-color: #f8f8f8;
					}
					.job-info a{
						text-align: left;
					}
					.job-info-title{
						color: #000000cf;
						font-size: 18px;
					}
					.job-img{
						display: flex !important;
						flex-flow: row nowrap;
						align-items: center;
						height: 79px;
						overflow: hidden;
					}
					.job-img img{
						border: none !important;
						max-height: 100% !important;
						width: auto !important;
						align-self: flex-start;
						margin:0 !important;
					}
				</style>
		</ul>
	</div>
</div>

<div class="flexslider clearfix post_slider slider_carousel slide ">
	<h3 class="widget-title"> Car, Motorbikes & Boat </h3>

	<div class="slides_container clearfix flexslider596617191">
		<ul class="slides">
				<?php
				$select="acm_id,listing_title,brand_item,start_price,posting_status,status";
				$from="add_car_motorcycle";
				$condition=array();
				$car_motorcycle_list=getDetails(doSelect1($select,$from,$condition,' ORDER BY rand()'));
				$car_motorcycle_list=trimmer_db_array($car_motorcycle_list);
				foreach($car_motorcycle_list as $k=>$v){
				?>	
					 	<li class="featured_c">
						 	<div class="list-container">	
							<!--	<span class="classified-status" style="background:#b00809">Sold</span> -->
						<?php
						$image=trim(seeMoreDetails("image","add_car_motorcycle_photo",array("status"=>1,"acm_id"=>$v["acm_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
						?>
								<a class="list-img" href="car_details.php?id=<?php echo $v["acm_id"];  ?>">
                                	<img src="car_motorcycle_image/<?php echo $image; ?>" alt="" title="<?php echo $v["listing_title"]; ?>"/>
                                </a>
								<div class="list-info">
									<div class="list-info--title">
										<a href="general_item_details.php?id=<?php echo $v["acm_id"];  ?>"><?= string_display1($v["listing_title"],0,25) ? string_display1($v["listing_title"],0,25): '------- ----- -- --- ----' ?></a>
									</div>
									
									<div class="d-flex space-between" style="height:calc(100% - 25px)">
										<span class="self-align-bottom" style="font-weight:500">
											<?= currency().$v["start_price"] ?>
										</span>
									</div>
								</div>					
							</div>					
						</li>
				<?php
				}
				?>
					</ul>
				</div>
			</div>