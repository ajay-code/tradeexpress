<!--taxonomy  sidebar -->
	<aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
		<div id="tmplclassifiedfilters_widget-3" class="widget tmpl_search_classified"><h3 class="widget-title">Filteration</h3>		<!-- form for find classified start -->
		<form name="tmpl_find_classified" method="post" action="//demo.templatic.com/classifieds" id="tmpl_find_classified" class="tmpl_filter_results">
		<input type="hidden" name="posttype" value="classified"/>
		<input type="hidden" name="pagetype" value="archive"/>
		<input type="hidden" name="csortby" value="" id="csortby"/>
		<ul class="horizontal_location_nav">
					
		
			<div class="">
			<h4>Price</h4>	
			<label class=r_lbl>Minimum Price</label>				
			<input name="min_price" id="min_price" value="" onkeyup="ajax_pagintn111('1');" type="text" class="textfield ">	
			<label class=r_lbl>Maximum Price</label>	
			<input name="max_price" id="max_price" value="" onkeyup="ajax_pagintn111('1');" type="text" class="textfield ">	
			</div>
			 <!-- division for range slider -->
						<h4>Brand Item</h4>
						 
			 <li>
				  <select name="brand_item" id="brand_item" filterdisplayname="State" onchange="ajax_pagintn111('1');">
					   <option value="0">--Select--</option>
					   <option value="1">Used</option>
					   <option value="2">Unused</option>
				  </select>
			 </li>
			 
			  
		</ul>
			
		</form>
		<!-- form for find classified end -->
	
		</div>
<?php
include("include_parts/filter_sidebar_category.php");
?>	
</aside>
<!--end taxonomy sidebar -->