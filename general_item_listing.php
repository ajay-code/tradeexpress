<?php
session_start();
require_once("function.php");
include_once("include/header.php");
$_GET=trimmer($_GET);
?>
<script>
	var currency = '$';
	var position = '1';
	var num_decimals = '2';
	var decimal_sep = '.';
	var thousands_sep = ',';
</script>
<script>
$(document).ready(function () {
	ajax_pagintn(1, 10);
});

function ajax_pagintn(page, limit = 10) {
	var query_string = '<?php echo $_SERVER["QUERY_STRING"]; ?>';
	//alert(query_string);
	var min_price = $("#min_price").val();
	var max_price = $("#max_price").val();
	var brand_item = $("#brand_item").val();
	var classified_sortby = $("#classified_sortby").val();
	var category = $("#category").val();
	var categoryQuery = '';
	if (category) {
		category = $("#category").val();
		categoryQuery = '&category=' + category;
	}
	var data = 'min_price=' + min_price + '&max_price=' + max_price + '&brand_item=' + brand_item + '&page=' + page + '&limit=' + limit + '&classified_sortby=' + classified_sortby + categoryQuery;
	$.post(
		'ajax_general_pagination.php?' + query_string + '&' + data, {},
		function (r) {
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
			<div class="breadcrumb-trail">
				<span class="trail-begin">
					<a href="index.php" title="Home" rel="home" class="trail-begin">Home</a>
				</span>
				<span class="sep">&raquo;</span>
				<span class="trail-end">General Items</span>
			</div>
		</div>
		<div id="update_ajax">
			<div id="content" class="contentarea large-9 small-12 columns">

				<h1 class="page-title">Classified</h1>
				<div class="archive-meta">
					<p></p>
				</div>


				<div id="CselectedFilters" class="filter-options cfilter_list_wrap clearfix">
					<div class="flit-opt-cols1">
						<a class="clear-filter-link" id="cclear_filter" href="javascript:void(0)">Clear All Filters</a>
					</div>
				</div>
				<div class='directory_manager_tab clearfix'>
					<div class="sort_options">
						<ul class='view_mode viewsbox'>
							<li>
								<a class='switcher first gridview ' id='gridview' href='#'>GRID VIEW</a>
							</li>
							<li>
								<a class='switcher last listview  active' id='listview' href='#'>LIST VIEW</a>
							</li>
						</ul>
						<div class="tev_sorting_option">
							<form action="classifieds/classified/?" method="get" id="classified_sortby_frm" name="classified_sortby_frm">
								<select name="classified_sortby" id="classified_sortby" onChange="ajax_pagintn('1');" class="tev_options_sel">
									<option selected=selected value="0">Sort By</option>
									<option value="listing_title ASC">Title Ascending</option>
									<option value="listing_title DESC">Title Descending</option>
									<option value="start_price ASC">Price low to high</option>
									<option value="start_price DESC">Price high to low</option>
								</select>
							</form>
						</div>
					</div>
					<!--END sort_options div -->
				</div>
				<!-- END directory_manager_tab Div -->

				<!--Start loop taxonomy page-->
				<div class="classified-short clearfix">
					<span>Sort by</span>
					<div class="short-option">
						<span class="short-title">
							<a href="index01d1.html?classified_sortby=title_asc" class="" onClick="tmpl_sort_as_set('index01d1.html?classified_sortby=title_asc')">Title
								<i class="fa fa-caret-down"></i>
							</a>
						</span>
						<span class="short-date">
							<a href="index9b3d.html?classified_sortby=date_desc" class="">Date
								<i class="fa fa-caret-down"></i>
							</a>
						</span>
						<span class="short-price">
							<a href="index63e9.html?classified_sortby=price_low_high" class="">Price
								<i class="fa fa-caret-down"></i>
							</a>
						</span>
					</div>
				</div>
				<div id="ajax_page">

				</div>
				<!-- END AJAX DIV -->
				<!--End loop taxonomy page -->
			</div>
			<!--taxonomy  sidebar -->
			<?php
				include("include_parts/general_filter_sidebar.php");
			?>
		</div>
	</div>
</section>
<!-- off-canvas-wrap end -->
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