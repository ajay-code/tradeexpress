<?php 
session_start(); 
require_once( "function.php"); 
include_once( "include/header.php"); 
if(isset($_SESSION[ "ar_id"])){
if(isset($_GET["id"]) && $_GET["id"]!=""){	
?>

<script>
$( document ).ready(function() {
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	var acm_id='<?php echo $_GET["id"]; ?>';
	$.post(
	'ajax_auction_car_pagination.php?page='+page+'&limit='+limit+'&acm_id='+acm_id,
	{},
	function(r){
		$("#table_data").html(r);
	}
	);
}
</script>

<script>
function show_add_balance(){
	$("#add_balance_form").show(1000);
}
function add_balance(){
	var amount=$("#amount").val().trim();
	if(amount==""){
		required_alert('Please Enter Amount','top-right','error');
	return false;
	}else{
	$("#paypal").submit();
	}
}

function get_info(for_what){
	$.post(
	"ajax_debited_info.php",
	{information:for_what},
	function(r){
		required_alert(r,'bottom-right','info');
	}
	);
}
</script>
<section id="main" class="clearfix">

    <div class="wrap row">

<div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="car_listing.php">Car, Motorbikes & Boats</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="car_details.php?id=<?php echo $_GET["id"]; ?>"><?php echo getCarTitle($_GET["id"]); ?></a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Auction Details</span>
            </div>
</div>
<section id="content" class="large-9 small-12 columns">
 <h1 class='page-title entry-title' style="color: #E6A01B;" ><?php echo getCarTitle($_GET["id"]); ?></h1>
            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h1 class='page-title entry-title'>Short Summary</h1>
                    <section class="entry-content">
                        <div class="accordion" id="post-listing">
								<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>Start Price</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_add_car_field('start_price',$_GET["id"]); ?></h3></span>
																		</div>
																	</div>
																</div>
																<div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>Reserve Price</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_add_car_field('reserve_price',$_GET["id"]); ?></h3></span>
																		</div>
																	</div>
																</div>
													<div class="pkg-button">
													<a href="javascript:void(0);"    class="btn btn-lg btn-primary button select-plan">Higest Bidd <?php echo currency().higest_bid_car($_GET["id"]);  ?></a>
													</div> <!-- list-group -->
															</div>
														</li>
													</ul>
												</div>
							
							
							
							
							
							
											</div>
										</div>
									<!-- End #panel1 -->
								</div>
								</div>

					</section>
                          <!-- .entry-content -->
						  
	</br>
	<?php
	$sold_status=trim(seeMoreDetails("sold_status","add_car_motorcycle",array("acm_id"=>$_GET["id"])));
	if($sold_status==0){
	?>
	<a href="javascript:void(0);" onclick="stop_bid('add_car_motorcycle','<?php echo $_GET["id"];  ?>');"   class="btn btn-lg btn-primary button select-plan">Stop Bid</a>
	<?php
	}else{
	echo '<h3 color="#899516;">Item Sold....</h3>';	
	}
	?>
					
					 <h1 class='page-title entry-title'>Auction Details</h1>
					<section class="entry-content">
                        <div class="" id="table_data">
								
						</div>

					</section>	  
					  
						  
						  
					    </div>
					<!-- .hentry -->
				</div>
	<!-- .hfeed -->
</section>
<!-- #content -->
<?php
include("include_parts/form_side_bar.php");
?>
</div>
<!-- .wrap -->

<!-- #main -->
<a class="exit-off-canvas "></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection "></a>
<div class="exit-sorting "></div>

<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> <!-- off-canvas-wrap end -->

<?php
}else{
echo '<script>window.location="profile_details.php ";</script>';	
}
}else{
echo '<script>window.location="login.php ";</script>';
}
include_once("include/footer.php ");
?>