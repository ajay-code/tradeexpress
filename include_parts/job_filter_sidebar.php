<!--taxonomy  sidebar -->
	<aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
		<div id="tmplclassifiedfilters_widget-3" class="widget tmpl_search_classified"><h3 class="widget-title">Job Search</h3>		<!-- form for find classified start -->
		<form name="tmpl_find_classified" method="post" action="//demo.templatic.com/classifieds" id="tmpl_find_classified" class="tmpl_filter_results">
		<input type="hidden" name="posttype" value="classified"/>
		<input type="hidden" name="pagetype" value="archive"/>
		<input type="hidden" name="csortby" value="" id="csortby"/>
		<ul class="horizontal_location_nav">
					
		
			<div class="">
			<h4>Salary</h4>	
			<label class=r_lbl>Minimum Scale</label>				
			<input name="min_scale" id="min_scale" value="" onkeyup="ajax_pagintn11('1');" type="text" class="textfield ">	
			<label class=r_lbl>Maximum Scale</label>	
			<input name="max_scale" id="max_scale" value="" onkeyup="ajax_pagintn11('1');" type="text" class="textfield ">	
			</div>
			<h4>Salary Type</h4>
			<li>
					<select name="approx_pay_type" id="approx_pay_type" filterdisplayname="Country"  onchange="ajax_pagintn11('1');">
					    <option value="0" >Select Type </option>
					    <option value="1" >Annual</option>
					    <option value="2" >Hourly</option>
					</select>
			</li>
			 <!-- division for range slider -->
						<h4>Location</h4>
						 <li>
				  <select name="country" id="country" filterdisplayname="Country"  onchange="fetch_city('country','city'); ajax_pagintn11('1');">
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
				  
					   <select name="city" id="city" filterdisplayname="City"  onchange="fetch_region('city','region',); ajax_pagintn11('1');" >
							<option value="0">Select Region</option>
					   </select>
				 
			 </li>
			  <li>
				  
					   <select name="region" id="region" filterdisplayname="region"  onchange="fetch_suburb('region','suburb',); ajax_pagintn11('1');" >
							<option value="0">Select City</option>
					   </select>
				 
			 </li>
			 <li>
				  
					   <select name="suburb" id="suburb" filterdisplayname="suburb"  onchange="ajax_pagintn11('1');" >
							<option value="0">Select Suburb</option>
					   </select>
				 
			 </li>
			<h4>Job Type</h4>
			<li>
					<select name="job_type1" id="job_type1" filterdisplayname="Country"  onchange="ajax_pagintn11('1');">
					    <option value="0" >Select Type </option>
					    <option value="1" >Full Time</option>
					    <option value="2" >Part Time</option>
					</select>
			</li>
			<li>
					<select name="job_type2" id="job_type2" filterdisplayname="Country"  onchange="ajax_pagintn11('1');">
					    <option value="0" >Select Type </option>
					    <option value="1" >Permanent</option>
					    <option value="2" >Contractual/ Temp</option>
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