<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_GET["cus_id"]) || isset($_SESSION["ar_id"])){
?>
<script>

$( document ).ready(function() {
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	var uploader='<?php if(isset($_GET["cus_id"])) {echo $_GET["cus_id"]; }else{ echo $_SESSION["ar_id"];  } ?>';
	$.post(
	'ajax_general_pagination.php?page='+page+'&feedback=true&limit='+limit+'&uploader='+uploader+'&sold_status=1',
	{},
	function(r){
		$("#general_item_ajax").html(r);
	}
	);
}
</script>
<script>

$( document ).ready(function() {
    ajax_pagintn111(1,1);
});	
function ajax_pagintn111(page,limit=1){
	var uploader='<?php if(isset($_GET["cus_id"])) {echo $_GET["cus_id"]; }else{ echo $_SESSION["ar_id"];  } ?>';
	$.post(
	'ajax_car_pagination.php?page='+page+'&limit='+limit+'&uploader='+uploader+'&sold_status=1',
	{},
	function(r){
		$("#car_item_ajax").html(r);
	}
	);
}
</script>

<section id="main" class="clearfix">

<div class="wrap row">
<?php
if(!isset($_GET["cus_id"])){
$path_name=getCusName($_SESSION["ar_id"]);
}else{
$path_name=getCusName($_GET["cus_id"]);	
}
?>
<div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="vendor_listing.php">Vendor</a></span>
			<span class="sep">&raquo;</span> <span class="trail-end"><?php echo $path_name; ?></span>
            </div>
</div>

<div id="update_ajax">
<section id="content" class="large-9 small-12 columns">
			
<div class="author_cont">
<h1 class="page-title entry-title">Sold Item</h1>
<?php
$select="ar_id,name,email,phone,landline,country,city,company,address,image,about,joined_on";
$from="ambit_registration";
if(!isset($_GET["cus_id"])){
$con=array("ar_id"=>$_SESSION["ar_id"]);
}else{
$con=array("ar_id"=>$_GET["cus_id"]);	
}
$details=getDetails(doSelect($select,$from,$con));
$details=trimmer_db_array($details);
foreach($details as $k3=>$v3){
?>
<?php
$cls='';
if(!isset($_GET["for"])){
	$cls='active';
}

?>
<ul class="tabs" data-tab role="tablist">
<li class="tab-title classified-info-tab <?php echo $cls;  ?> <?php if(isset($_GET["for"]) && $_GET["for"]=="general_item") echo 'active'; ?>" role="presentational"><a href="#general_item">General Item</a></li>
<li class="tab-title classified-review-tab <?php if(isset($_GET["for"]) && $_GET["for"]=="car") echo 'active'; ?>" role="presentational"><a href="#car_item">Car</a></li> 
</ul>	
<div class="tabs-content">	
                                                                      <!-- Other Property details -->
	<section role="tabpanel" aria-hidden="false" class="content <?php echo $cls;  ?>  <?php if(isset($_GET["for"]) && $_GET["for"]=="general_item") echo 'active'; ?> entry-content" id="general_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
				<div id="general_item_ajax">
    				
				</div>
<!-- END GENRERAL_ITEM_AJAX  -->				
					
		</section>
	</section>
	
	
	<section role="tabpanel" aria-hidden="false" class="content <?php if(isset($_GET["for"]) && $_GET["for"]=="car") echo 'active'; ?>  entry-content" id="car_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
    		<div id="car_item_ajax">
    				
			</div>
<!-- END GENRERAL_ITEM_AJAX  -->			
		</section>
	</section>
	
	
	
</section>
<!-- #content -->
<?php
include("include_parts/top_author_sidebar.php");
?>
	<!-- #sidebar-primary -->
	</div>
<!-- .wrap -->
</div>
<!-- #main -->
<a class="exit-off-canvas"></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>
</div>
<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> 
<?php
}
?>
</div>	
</div><!-- END UPDATE AJAX -->

</section>
</div>
</section>
<!-- off-canvas-wrap end -->

<?php
}else{
	echo '<script>window.location="index.php";</script>';
}
include_once("include/footer.php");
?>