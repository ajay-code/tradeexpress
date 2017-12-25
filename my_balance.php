<?php 
session_start(); 
require_once( "function.php"); 
include_once( "include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
?>

<script>
$( document ).ready(function() {
	var info='<?php if(isset($_SESSION["page_info"])) { echo trim($_SESSION["page_info"]); unset($_SESSION["page_info"]);  } else {echo '';}  ?>';
	if(info.trim()!=""){
	required_alert('<font color="yellow">'+info+'</font>','bottom-full-width','error','5000','true');
	}
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	$.post(
	'ajax_txn_pagination.php?page='+page+'&limit='+limit,
	{},
	function(r){
		$("#table_data").html(r);
	}
	);
}

$( document ).ready(function() {
	<?php if(isset($_GET['payment'])): ?>
		<?php if($_GET['payment'] === 'success'): ?>
			required_alert('Payment Made Successfully', 'top-right', 'success')
		<?php elseif($_GET['payment'] === 'failed'): ?>
			required_alert('Payment Failed', 'top-right', 'error')
		<?php endif; ?>
	<?php endif; ?>
});
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
	<div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Classifieds" rel="home" class="trail-begin">Home</a></span>
	<span class="sep">&raquo;</span> <span class="trail-end">Submit Classified</span>
	</div>
</div>
<section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h1 class='page-title entry-title'>Balance enquiry</h1>
                    <section class="entry-content">
                        <div class="accordion" id="post-listing">
								<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center" style="padding-right:0px !important">
                                                                    <div class="panel-heading">
                                                                        <h3>Account Balance</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><h3><?php echo currency().get_cus_acnt_balance($_SESSION["ar_id"]); ?></h3></span>
                                                    <div class="pkg-button" style="margin-top: -15px;">
													<a href="javascript:void(0);" onclick="show_add_balance();"   class="btn btn-lg btn-primary button select-plan">Add Balnace</a>
													</div> <!-- list-group -->
													
													
														</div>
													</div>
																</div>
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
						  
					<section class="entry-content" id="add_balance_form" style="display:none;">
                        <div class="accordion" id="post-listing">
								<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
<?php  
if(empty($_SERVER['REQUEST_URI'])) {
$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
}

// Strip off query string so dirname() doesn't get confused
$url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
if($url=''){
$url = '//'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'';
}
if($url==''){
$url = '//'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '').'';
}
$gateway=1;
$row_al=getDetails(doSelect("*","payment_gateway",array("id"=>$gateway)));

?>										
														<form action="/checkout.php" id="paypal" method="post">
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center" style="padding-right:0px !important">
                                                                    <div class="panel-heading">
                                                                        <h3>Enter Amount ($)</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price">
																			<h3>
																				<input type="text" name="amount" id="amount" value=""  onkeypress="return only_number(event)"  class="tev_options_sel " style="width: 154px;" />
																				<input type='hidden' name="cmd" value=_xclick>
																				<input type='hidden' name="business" value="<?php echo $row_al[0]["pg_id"];?>">
																				<input type='hidden' name="item_name" value="Add Balance">
																				<input type='hidden' name="no_note" value=1>
																				<input type='hidden' name="currency_code" value="USD<?php //echo get_page_settings(7);?>">
																				<input type='hidden' name="rm" value=2 />
																				<input type='hidden' name="customer" value="<?php echo $_SESSION["ar_id"];?>" />
																				<input type='hidden' name="return" value="<?php echo $url;?>">
																				<input type='hidden' name="cancel_return" value="<?php echo $url;?>" />
																				<input type='hidden' name="notify_url" value="<?php echo $url;?>paypal.php" />
																			</h3><br/></span>
                                                    <div class="pkg-button" style="margin-top:-15px">
													<button type="submit" onclick="return add_balance();"  class="btn btn-lg btn-primary button select-plan">Add</button>
													</div> <!-- list-group -->
														</div>
													</div>
																</div>
															</div>
															</form>
														</li>
													</ul>
												</div>
											</div>
										</div>
									<!-- End #panel1 -->
								</div>
								</div>
					</section>
					
					 <h1 class='page-title entry-title'>Transaction Details</h1>
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
echo '<script>window.location="login.php";</script>';
}
include_once("include/footer.php");
?>