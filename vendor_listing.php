<?php
session_start();
require_once("function.php");
include_once("include/header.php");
$_GET=trimmer($_GET);
?>
<script>
		var currency = '$';
		var position = '1';
		var num_decimals    = '2';
		var decimal_sep     = '.';
		var thousands_sep   = ',';
</script>
<script>

function require_info(){
	required_alert('<font color="yellow">You can search by Name, Comapny, Country, City</font>','top-right','info');
}

$( document ).ready(function() {
    ajax_pagintn(1,1);
});
function ajax_pagintn(page,limit=1){
	var name_search=$("#name_search").val().trim();
	$.post(
	'ajax_vendor_list.php?page='+page+'&limit='+limit+'&name='+name_search,
	{},
	function(r){
		$("#ajax_page").html(r);
	}
	);
}	

</script>
     <div class="home_page_banner clear clearfix clearfix map_full_width">
                           <div id="category-widget" class="category-widget">
                                        </div>	
                     </div>
<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span> <span class="trail-end">Vendor</span>
            </div>
</div>
<div id="content" class="contentarea large-9 small-12 columns">
	     
	<h1 class="page-title">Vendor Listing</h1>
	<div class="archive-meta"><p></p></div>

	<div id="CselectedFilters" class="filter-options cfilter_list_wrap clearfix"><div class="flit-opt-cols1"><a class="clear-filter-link" id="cclear_filter" href="javascript:void(0)">Clear All Filters</a></div></div>	<div class='directory_manager_tab clearfix'>
	<div class="sort_options">
	<ul class='view_mode viewsbox'>
				<li ><i class="fa fa-search" onmouseover="require_info();" aria-hidden="true"></i></li>
						</ul>
			<div class="tev_sorting_option">
			<input name="name_search" id="name_search" value="" onkeyup="ajax_pagintn('1','1');" type="text" class="tev_options_sel ">	
			</div>
         	</div><!--END sort_options div -->
	
    </div><!-- END directory_manager_tab Div -->
	      
     <!--Start loop taxonomy page-->
             
<div id="ajax_page">               
     
</div>
<!-- END AJAX DIV -->
           <!--End loop taxonomy page -->
</div>
<!--taxonomy  sidebar -->
<?php
include("include_parts/sidebar_index.php");
?>
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
</div> <!-- off-canvas-wrap end -->


<?php
include_once("include/footer.php");
?>