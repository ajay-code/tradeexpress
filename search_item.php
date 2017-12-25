<?php
session_start();
require_once("function.php");
include_once("include/header.php");
$ex=explode('%?&',$_GET["category"]);
$_GET["category"]=$ex[0];
if(isset($ex[1])){
$_GET["for"]=$ex[1];
}

?>
<script>

$( document ).ready(function() {
	ajax_pagintn(1,1);
});
	
function ajax_pagintn(page,limit=1){
	var search='&'+'<?php echo $_SERVER["QUERY_STRING"]; ?>';
	$.post(
	'ajax_general_pagination.php?page='+page+'&limit='+limit+search,
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
	var search='&'+'<?php echo $_SERVER["QUERY_STRING"]; ?>';
	$.post(
	'ajax_car_pagination.php?page='+page+'&limit='+limit+search,
	{},
	function(r){
		$("#car_item_ajax").html(r);
	}
	);
}
</script>
<script>
$( document ).ready(function() {
    ajax_pagintn1(1,1);
});

function ajax_pagintn1(page,limit=1){
	var search='&'+'<?php echo $_SERVER["QUERY_STRING"]; ?>';
	$.post(
	'ajax_property_pagination.php?page='+page+'&limit='+limit+search,
	{},
	function(r){
		$("#property_item_ajax").html(r);
	}
	);
}
</script>
<script>
$( document ).ready(function() {
    ajax_pagintn11(1,1);
});
	
function ajax_pagintn11(page,limit=1){
	var search='&'+'<?php echo $_SERVER["QUERY_STRING"]; ?>';
	$.post(
	'ajax_job_pagination.php?page='+page+'&limit='+limit+search,
	{},
	function(r){
		$("#job_item_ajax").html(r);
	}
	);
}
</script>
<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns"><div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Classifieds" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span> <span class="trail-end">Search</span></div>
</div>	
<section id="content" class="large-9 small-12 columns">
			


		

<?php
include("include_parts/item_list_under_profile.php");

?>		 




<!-- off-canvas-wrap end -->

<?php
include_once("include/footer.php");
?>