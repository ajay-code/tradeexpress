<!--taxonomy  sidebar -->
	<aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
		<div id="tmplclassifiedfilters_widget-3" class="widget tmpl_search_classified"><h3 class="widget-title">Find Classified</h3>		<!-- form for find classified start -->
		<form name="tmpl_find_classified" method="post" action="//demo.templatic.com/classifieds" id="tmpl_find_classified" class="tmpl_filter_results">
		<input type="hidden" name="posttype" value="classified"/>
		<input type="hidden" name="pagetype" value="archive"/>
		<input type="hidden" name="csortby" value="" id="csortby"/>
		<ul class="horizontal_location_nav">
					
		
			<div class="">
			<h4>Price</h4>	
			<label class=r_lbl>Minimum Price</label>				
			<input name="min_price" id="min_price" value="" onkeyup="ajax_pagintn1('1');" type="text" class="textfield ">	
			<label class=r_lbl>Maximum Price</label>	
			<input name="max_price" id="max_price" value="" onkeyup="ajax_pagintn1('1');" type="text" class="textfield ">	
			</div>
			 <!-- division for range slider -->
						<h4>Location</h4>
						 <li>
				  <select name="country_id" id="country_id" filterdisplayname="Country"  onchange="fetch_city('country_id','city_id');">
					    <option value="0" >Select Country </option>
						<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
						?>
						<option value="<?php echo $v["cn_id"]; ?>" >
						<?php echo $v["cn_name"];  ?>
						</option>
						<?php
						}
						?>
				  		</select>
			 </li>
			 <li>
				  
					   <select name="city_id" id="city_id" filterdisplayname="City"  onchange="fetch_region('city_id','region');" >
							<option value="0">Select City</option>
					   </select>
				 
			 </li>
			 <li>
				  <select name="region" id="region" filterdisplayname="State" onchange="ajax_pagintn1('1');">
					   <option value="0">Select Suburb</option>
				  </select>
			 </li>
			 
			  
		</ul>
		
		
				<!--  Classified Type start -->
		<h4>Bedroom</h4>
		
			<ul class="flt-pstatus">
			<input name="bedroom" id="bedroom" value="" onkeyup="ajax_pagintn1('1');" type="text" class="textfield ">
			</ul>
		<h4>Bathroom</h4>
		
			<ul class="flt-pstatus">
			<input name="bathroom" id="bathroom" value="" onkeyup="ajax_pagintn1('1');" type="text" class="textfield ">
			</ul>
					<!--  Classified Type end -->
		
			
				
		</form>
		<!-- form for find classified end -->
		
		</div>
<?php
include("include_parts/filter_sidebar_category.php");
?>
<!--end taxonomy sidebar -->