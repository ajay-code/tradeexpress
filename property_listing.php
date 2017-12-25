<?php	
session_start();
require_once("function.php");
$type = $_GET['type'];
if( !isset($type) || $type == ""){
  $type = 'for_sale';
}
include_once("include/header.php");	
$_GET=trimmer($_GET);?>
<script>		var currency = '$';		var position = '1';		var num_decimals    = '2';		var decimal_sep     = '.';		var thousands_sep   = ',';</script>
<script>
function fetch_subcat(id,id1){
		var pc_id=$("#"+id1).val();
		//alert(pc_id);
		if(pc_id.trim() !='0'){
		$.ajax({
			url:'fetch_property_subcat.php?pc_id='+pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#"+id).html(response);
			}
		});
		}else{
			$("#"+id).html("");
		}
	}
function fetch_suburb(){		
	var region=$("#region").val();		
	$.ajax({			
		url:'fetch_city.php?region='+region,			
		type:'post',			
		dataType:'text',			
		cache:false,			
		contentType:false,			
		processData:false,			
		success:function(response){				
			$("#suburb").html(response);			
		}		
	});	
}
function fetch_city(){
		var cn_id=$("#country").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_update").html(response);
			}
		});
	}
function fetch_region(){
		var city=$("#city_update").val();
		$.ajax({
			url:'fetch_city.php?city='+city,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){//alert(response);
				$("#region").html(response);
			}
		});
	}

$( document ).ready(function() {    ajax_pagintn1(1,10);});
function ajax_pagintn1(page,limit=10){	
	var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
	<?php  if( $type == 'for_sale'){ ?>
			 country = $("#country").val();
			 region = $("#region").val();
			 city_update = $("#city_update").val();
			 suburb = $("#suburb").val();
			 bedroom_start = $("#bedroom_start").val();
			 bedroom_end = $("#bedroom_end").val();
			 bathroom_start = $("#bathroom_start").val();
			 bathroom_end = $("#bathroom_end").val();
			 min_price = $("#min_price").val();
			 max_price = $("#max_price").val();
			 sub_sub_cat_id = $("#sub_sub_cat_id").val();
			 keyword = $("#keyword").val();
			 near_suburb = $("#near_suburb").val(); // "Yes"
			 data  = "country="+country+"&region="+region+"&city_update="+city_update+"&suburb="+suburb+"&bedroom_start="+bedroom_start+"&bedroom_end="+bedroom_end;
			 data  = data + "&bathroom_start="+bathroom_start+"&min_price="+min_price+"&max_price="+max_price+"&sub_sub_cat_id="+sub_sub_cat_id+"&keyword="+keyword;
			 data = data +"&near_suburb="+near_suburb;
	<?php 	 }else if( $type == 'for_rent'){?>
			 country = $("#country").val();
			 region = $("#region").val();
			 city_update = $("#city_update").val();
			 suburb = $("#suburb").val();
			 bedroom_start = $("#bedroom_start").val();
			 bedroom_end = $("#bedroom_end").val();
			 bathroom_start = $("#bathroom_start").val();
			 bathroom_end = $("#bathroom_end").val();
			 min_price = $("#min_price").val();
			 max_price = $("#max_price").val();
			 sub_sub_cat_id = $("#sub_sub_cat_id").val();
			 keyword = $("#keyword").val();
			 near_suburb = $("#near_suburb").val(); // "Yes"
			 data  = "country="+country+"&region="+region+"&city_update="+city_update+"&suburb="+suburb+"&bedroom_start="+bedroom_start+"&bedroom_end="+bedroom_end;
			 data  = data + "&bathroom_start="+bathroom_start+"&min_price="+min_price+"&max_price="+max_price+"&sub_sub_cat_id="+sub_sub_cat_id+"&keyword="+keyword;
			 data = data +"&near_suburb="+near_suburb;
		<?php }else if( $type == 'commercial_sale'){ ?>
		  	 country = $("#country").val();
  		  	 region = $("#region").val();
			 city_update = $("#city_update").val();
			 suburb = $("#suburb").val();
			 min_price = $("#min_price").val();
			 max_price = $("#max_price").val();
			 sub_sub_cat_id = $("#sub_sub_cat_id").val();
			 keyword = $("#keyword").val();
			 near_suburb = $("#near_suburb").val(); // "Yes"
			 data  = "country="+country+"&region="+region+"&city_update="+city_update+"&suburb="+suburb+"&min_price="+min_price+"&max_price="+max_price;
			 data  = data + "&sub_sub_cat_id="+sub_sub_cat_id+"&keyword="+keyword+"&near_suburb="+near_suburb;
		<?php }else if( $type == 'for_lease'){ ?>
		  	 country = $("#country").val();
			 region = $("#region").val();
			 city_update = $("#city_update").val();			 
			 suburb = $("#suburb").val();
			 start_floor_area = $("#start_floor_area").val();
			 end_floor_area = $("#end_floor_area").val();
			 sub_sub_cat_id = $("#sub_sub_cat_id").val();
			 keyword = $("#keyword").val();
			 near_suburb = $("#near_suburb").val(); // "Yes"
			 data  = "country="+country+"&region="+region+"&city_update="+city_update+"&suburb="+suburb+"&start_floor_area="+start_floor_area;
			 data  = data + "&end_floor_area="+end_floor_area + "&sub_sub_cat_id="+sub_sub_cat_id+"&keyword="+keyword+"&near_suburb="+near_suburb;
		<?php  }	?>
	var classified_sortby=$("#classified_sortby").val();
	var data= data + '&page='+page+'&limit='+limit+'&classified_sortby='+classified_sortby;	
	$.post('ajax_property_pagination_new.php?'+query_string+'&'+data,{},function(r){$("#ajax_page").html(r);});
}
</script>
<style>#update_ajax select { border: 1px solid #ccc; height: 50px;  margin: 5px;}</style>
<div class="home_page_banner clear clearfix clearfix map_full_width">
  <div id="category-widget" class="category-widget"></div>
</div>
<section id="main" class="clearfix">
  <div class="wrap row">
    <div class="breadcrumb breadcrumbs columns">
      <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span> <span class="trail-end">Property Listing</span></div>
    </div>

    <div id="update_ajax">
      <div id="content" class="contentarea large-9 small-12 columns">
        <h2 class="page-title" style="color: green; font-weight=bold">Property Search</h2>
        <div class="archive-meta">
          <p></p>
        </div>
        <?php /*?><div id="sub_listing_categories">
          <ul>
            <li class="cat-item cat-item-18">Category
              <ul class='children'>
                <?php
								$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
								foreach($category as $k=>$v){
									$select="";
									if(isset($_GET["category"]) && $_GET["category"]!="" && $_GET["category"]==$v["pc_id"]){
									$select='style="color:#899516;"';	
									}
								?>
                <li class="cat-item cat-item-47"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
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
                <?php						$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$_GET["category"])));						foreach($category as $k=>$v){							$select="";							if(isset($_GET["sub_category"]) && $_GET["sub_category"]!="" && $_GET["sub_category"]==$v["pc_id"]){								$select='style="color:#899516;"';								}						?>
                <li class="cat-item cat-item-44"><a href="property_listing.php?category=<?php echo $_GET["category"]; ?>&sub_category=<?php echo $v["pc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
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
			$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$_GET["sub_category"])));
			foreach($category as $k=>$v){
				$select="";
				if(isset($_GET["sub_sub_category"]) && $_GET["sub_sub_category"]!="" && $_GET["sub_sub_category"]==$v["pc_id"]){
				$select='style="color:#899516;"';	
				}
			?>
                <li class="cat-item cat-item-46"><a href="property_listing.php?category=<?php echo $_GET["category"]; ?>&sub_category=<?php echo $_GET["sub_category"]; ?>&sub_sub_category=<?php echo $v["pc_id"]; ?>" <?php echo $select; ?> ><?php echo $v["category"]; ?></a></li>
                <?php
			}
			?>
              </ul>
            </li>
            <?php
	}
	?>
          </ul>
        </div><?php */?>
		 
		 <?php include("include_parts/property_filter_header.php");?>
		 
        <div id="CselectedFilters" class="filter-options cfilter_list_wrap clearfix">
          <div class="flit-opt-cols1"><a class="clear-filter-link" id="cclear_filter" href="javascript:void(0)">Clear All Filters</a></div>
        </div>
        <div class='directory_manager_tab clearfix'>
          <div class="sort_options">
            <ul class='view_mode viewsbox'>
              <li><a class='switcher first gridview ' id='gridview' href='#'>GRID VIEW</a></li>
              <li><a class='switcher last listview  active' id='listview' href='#'>LIST VIEW</a></li>
            </ul>
            <div class="tev_sorting_option">
              <form action="<?php /*?>classifieds/classified/?<?php */?>" method="get" id="classified_sortby_frm" name="classified_sortby_frm">
                <select name="classified_sortby" id="classified_sortby" onChange="ajax_pagintn1('1');" class="tev_options_sel">
                  <option selected=selected value="0">Sort By</option>
                  <option value="listing_title ASC" >Title Ascending</option>
                  <option value="listing_title DESC" >Title Descending</option>
                  <option value="expected_sale_price ASC" >Price low to high</option>
                  <option value="expected_sale_price DESC" >Price high to low</option>
                </select>
              </form>
            </div>
          </div>
          <!--END sort_options div -->
        </div>
        <!-- END directory_manager_tab Div -->
        <!--Start loop taxonomy page-->
        <div class="classified-short clearfix"> <span>Sort by</span>
          <div class="short-option"> <span class="short-title"><a href="index01d1.html?classified_sortby=title_asc" class="" onClick="tmpl_sort_as_set('index01d1.html?classified_sortby=title_asc')">Title <i class="fa fa-caret-down"></i></a></span> <span class="short-date"><a href="index9b3d.html?classified_sortby=date_desc" class="">Date <i class="fa fa-caret-down"></i></a></span> <span class="short-price"><a href="index63e9.html?classified_sortby=price_low_high" class="">Price <i class="fa fa-caret-down"></i></a></span> </div>
        </div>
        <div id="ajax_page"> </div>
        <!-- END AJAX PAGE -->
        <!--End loop taxonomy page -->
      </div>
      <?php
     include("include_parts/property_filter_sidebar-new.php");
?>
    </div>
  </div>
  <!-- .wrap -->
</section>
<!-- off-canvas-wrap end -->
<!-- #main -->
<a class="exit-off-canvas"></a>
<!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection"></a>
<div class="exit-sorting"></div>
</div>
<!-- #container -->
</div>
<!-- inner-wrap start -->
</div>
<!-- off-canvas-wrap end -->
<?php
include_once("include/footer.php");
?>
