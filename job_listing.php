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

$( document ).ready(function() {
    ajax_pagintn11(1,10);
});
/* function ajax_pagintn111(page,limit){
	var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
	$.post(
	'ajax_job_pagination.php?page='+page+'&'+query_string+'&limit='+limit,
	{},
	function(r){
		$("#ajax_page").html(r);
	}
	);
} */	
function ajax_pagintn11(page,limit=10){
	var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
	//alert(query_string);
	//$("#ajax_page").html("");
	var min_scale=$("#min_scale").val();
	var max_scale=$("#max_scale").val();
	var approx_pay_type=$("#approx_pay_type").val();
	var country=$("#country").val();
	var city=$("#city").val();
	var job_type1=$("#job_type1").val();
	var job_type2=$("#job_type2").val();
	var classified_sortby=$("#classified_sortby").val();
	var data='min_scale='+min_scale+'&max_scale='+max_scale+'&approx_pay_type='+approx_pay_type+'&country='+country+'&city='+city+'&job_type1='+job_type1+'&job_type2='+job_type2+'&page='+page+'&limit='+limit+'&classified_sortby='+classified_sortby;
	$.post(
	'ajax_job_pagination.php?'+query_string+'&'+data,
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

<div class="breadcrumb breadcrumbs columns"><div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span> 
<span class="sep">&raquo;</span> <span class="trail-end">Job Listing</span></div>
</div>
<div id="update_ajax">
<div id="content" class="contentarea large-9 small-12 columns">
	     
	<h1 class="page-title">Classified</h1>
	<div class="archive-meta"><p></p></div>
<div id="sub_listing_categories">
	<ul>	
	<li class="cat-item cat-item-18">Category
			<ul class='children'>
			<?php
			$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
			foreach($category as $k=>$v){
				$select="";
				if(isset($_GET["category"]) && $_GET["category"]!="" && $_GET["category"]==$v["jc_id"]){
				$select='style="color:#899516;"';	
				}
			?>
				<li class="cat-item cat-item-47"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
			<?php
			}
			?>
			</ul>
	</li>
	<?php
	if(isset($_GET["category"]) && $_GET["category"] != ""){
	?>
	<li class="cat-item cat-item-18">Sub-Category
			<ul class='children'>
				<?php
			$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$_GET["category"])));
			foreach($category as $k=>$v){
				$select="";
				if(isset($_GET["sub_category"]) && $_GET["sub_category"]!="" && $_GET["sub_category"]==$v["jc_id"]){
				$select='style="color:#899516;"';	
				}
			?>
				<li class="cat-item cat-item-44"><a href="job_listing.php?category=<?php echo $_GET["category"]; ?>&sub_category=<?php echo $v["jc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
			<?php
			}
			?>
			</ul>
	</li>
	<?php
	}
	?>
	<?php
	if(isset($_GET["sub_category"]) && $_GET["sub_category"] != ""){
	?>
	<li class="cat-item cat-item-18">Sub-Sub-Category
			<ul class='children'>
			<?php
			$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$_GET["sub_category"])));
			foreach($category as $k=>$v){
				$select="";
				if(isset($_GET["sub_sub_category"]) && $_GET["sub_sub_category"]!="" && $_GET["sub_sub_category"]==$v["jc_id"]){
				$select='style="color:#899516;"';	
				}
			?>
				<li class="cat-item cat-item-46"><a href="job_listing.php?category=<?php echo $_GET["category"]; ?>&sub_category=<?php echo $_GET["sub_category"]; ?>&sub_sub_category=<?php echo $v["jc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
			<?php
			}
			?>
			</ul>
	</li>
	<?php
	}
	?>
	</ul>
</div>
	<div id="CselectedFilters" class="filter-options cfilter_list_wrap clearfix"><div class="flit-opt-cols1"><a class="clear-filter-link" id="cclear_filter" href="javascript:void(0)">Clear All Filters</a></div></div>	<div class='directory_manager_tab clearfix'>
	<div class="sort_options">
			<ul class='view_mode viewsbox'>
							<li><a class='switcher first gridview ' id='gridview' href='#'>GRID VIEW</a></li>
				<li><a class='switcher last listview  active' id='listview' href='#'>LIST VIEW</a></li>
						</ul>	
			<div class="tev_sorting_option">
			<form action="classifieds/classified/?" method="get" id="classified_sortby_frm" name="classified_sortby_frm">
            <select name="classified_sortby" id="classified_sortby" onChange="ajax_pagintn11('1');" class="tev_options_sel">
				<option selected=selected value="0">Sort By</option>
											<option value="listing_title ASC" >Title Ascending</option>
											<option value="listing_title DESC" >Title Descending</option>
				                            <option value="min_scale ASC" >Price low to high</option>
                                            <option value="max_scale DESC" >Price high to low</option>
                                      	
										
				             
			</select>
			 </form>
             		</div>
         	</div><!--END sort_options div -->
    </div><!-- END directory_manager_tab Div -->
	      
     <!--Start loop taxonomy page-->
               <div class="classified-short clearfix">
               <span>Sort by</span>
               <div class="short-option">
                    		    
                    <span class="short-title"><a href="index01d1.html?classified_sortby=title_asc" class="" onClick="tmpl_sort_as_set('index01d1.html?classified_sortby=title_asc')">Title <i class="fa fa-caret-down"></i></a></span>
                                        <span class="short-date"><a href="index9b3d.html?classified_sortby=date_desc" class="">Date <i class="fa fa-caret-down"></i></a></span>
                                        <span class="short-price"><a href="index63e9.html?classified_sortby=price_low_high" class="">Price <i class="fa fa-caret-down"></i></a></span>
               </div>
          </div>
                
<div id="ajax_page">                
    
</div>
<!-- END AJAX PAGE -->
           <!--End loop taxonomy page -->
</div>
<!--taxonomy  sidebar -->
<?php
include("include_parts/job_filter_sidebar.php");
?>
</div>
<!--end taxonomy sidebar -->
</div>
<!-- .wrap -->
</section>
<a class="exit-off-canvas"></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>

<?php
include_once("include/footer.php");
?>