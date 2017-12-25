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
     <div class="home_page_banner clear clearfix clearfix map_full_width">
                           <div id="category-widget" class="category-widget">
                                        </div>	
                     </div>
<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns"><div class="breadcrumb-trail"><span class="trail-begin"><a href="//demo.templatic.com/classifieds" title="Classifieds" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span> <a href="index-115.html" title="Philadelphia">Philadelphia</a> <span class="sep">&raquo;</span> <span class="trail-end">Classified</span></div></div><div id="content" class="contentarea large-9 small-12 columns">
	     
	<h1 class="page-title">Classified</h1>
	
	<div id="CselectedFilters" class="filter-options cfilter_list_wrap clearfix"><div class="flit-opt-cols1"><a class="clear-filter-link" id="cclear_filter" href="javascript:void(0)">Clear All Filters</a></div></div>	<div class='directory_manager_tab clearfix'>
	<div class="sort_options">
			<ul class='view_mode viewsbox'>
							<li><a class='switcher first gridview ' id='gridview' href='#'>GRID VIEW</a></li>
				<li><a class='switcher last listview  active' id='listview' href='#'>LIST VIEW</a></li>
						</ul>	
			<div class="tev_sorting_option">
			<form action="classifieds/classified/?" method="get" id="classified_sortby_frm" name="classified_sortby_frm">
               <select name="classified_sortby" id="classified_sortby" onChange="sort_as_set(this.value)" class="tev_options_sel">
				<option selected=selected>Sort By</option>
				                              <option value="price_low_high" >Price low to high</option>
                                                          <option value="price_high_low" >Price high to low</option>
                                      						<option value="alphabetical" >Alphabetical</option>
										<option value="title_asc" >Title Ascending</option>
										<option value="title_desc" >Title Descending</option>
										<option value="date_asc" >Publish Date Ascending</option>
										<option value="date_desc" >Publish Date Descending</option>
										<option value="reviews" >Reviews</option>
										<option value="rating" >Rating</option>
										<option value="random" >Random</option>
				             
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
                
     <section id="loop_classified_taxonomy" class="search_result_listing list" >
     	<?php
		$con1=$con2=array();
		if(isset($_GET["category"]) && $_GET["category"] !=""){
		$con1=array("cat_id"=>$_GET["category"]);
		}
		if(isset($_GET["sub_category"]) && $_GET["sub_category"] !=""){
		$con2=array("sub_cat_id"=>$_GET["sub_category"]);
		}
		$select="agi_id,uploader,cat_id,sub_cat_id,listing_title,subtitle,brand_item,start_price,reserve_price,buy_now,allow_bid,posting_date,item_desc";
		$from="add_general_items";
		$condition=array("status"=>1);
		$condition=array_merge($condition,$con1,$con2);
		$item_dtls=getDetails(doSelect($select,$from,$condition));
		$item_dtls=trimmer_db_array($item_dtls);
		foreach($item_dtls as $k=>$v){
		?>
                       	<article class="post  classified-1080 featured_c">  
                        	          <!-- classified image start -->
          <div class="classified_img">
                              <a href="index-63.html" >
                    <span class="featured_tag">Featured</span>
					<?php
						$image=trim(seeMoreDetails("image","add_general_items_photo",array("status"=>1,"agi_id"=>$v["agi_id"])));
						if($image==""){
						$image="unknown.jpg";
						}
					?>
					<img src="general_items_image/<?php echo $image; ?>"  alt="" title="<?php echo $v["listing_title"]; ?>" />
                         </a>
			             </div>
          <!-- classified image end -->
                            <div class="entry">
								<div class="sort-title">
                         			<div class="classified-title">
										<h2 class="entry-title"><a itemprop="url" href="index-63.html" title="<?php echo $v["listing_title"]; ?>" rel="bookmark"><?php echo $v["listing_title"]; ?></a></h2>
										<div class="show-mobile">
											<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["start_price"];  ?></span></span>											
											<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>										
										</div>
                                    </div>

                                    <div class="classified-info">
									<?php
									$uploader=$v["uploader"];
									if($uploader !="admin"){
									$uploader="Siddhartha";
									}
									?>
									<div class='classified-tax-detail clearfix'><p class="bottom_line i_category"><a href="index-25.html"><?php echo getGeneralItemCategory($v["cat_id"]); ?></a></p><p class="owner_name"><label>By </label> <a href="//yourwebsite.com/"><?php  echo $uploader; ?></a></p>
										<div class="listing_rating">
										<div class="directory_rating_row"><span class="single_rating"> <i class="rating-on"></i><i class="rating-on"></i><i class="rating-on"></i><i class="rating-on"></i><i class="rating-on"></i> </span></div>
										</div>
									<div class="address"><label>Subtitle : </label> <?php echo $v["subtitle"]; ?>
									<div class="address"><label>Brand Item : </label> <?php if($v["brand_item"]=="1"){ echo 'Used'; }else{ echo 'Unused'; }; ?>
									</div>
									<ul class='other_custom_fields'>                              
                                                            <li class=''><label>Phone</label>: 107 000 0000</li>
                                    </ul>
									</div>									
									</div>

									<!-- Start Post Content -->
									<div itemprop="description" class="entry-summary"><p>Itsn&#8217;t it cool? Your classified summary can be written here. <a class="moretag" href="index-63.html" class="more">Read more&#8230;</a></p>
</div>									<!-- End Post Content -->

									<!-- Show custom fields where show on listing = yes -->
									<div class="rev_pin"><ul>                     
                              <li class="favourite">				<span id="tmplfavorite_1080" class="fav fav_1080"><a title="Add to favorites" href="javascript:void(0);" data-reveal-id="tmpl_reg_login_container" id="tmpl_login_frm_1080" data-id='1080'  class="addtofav  small_btn"  onclick="javascript:addToFavourite('1080','add');">Add to favorites</a></span>
			</li>
                                                            <li class="review"> <a href="index-63.html#comments">8 &nbsp;</a></li>
                              </ul></div>                         		</div>
                         		<div class="sort-date show-desktop">
                         			<span class="last-updated"><?php echo get_date_str($v["posting_date"]);  ?></span>                         		</div>
                         		<div class="sort-price show-desktop">
                         			<span class="classified-price"><span class="cls-price-wrapper"><?php echo currency().$v["start_price"];  ?></span></span>                         		</div>
                         		
							</div>
                        </article>
                        	
                    <?php
					}
					?>
                        	
                
                                 <div id="listpagi">
              <div class="pagination pagination-position">
                    <a  class="current page-numbers">1</a><a href="index-116.html" class="page-numbers" title="2"><strong>2</strong></a><a href="index-117.html" class="page-numbers" title="3"><strong>3</strong></a><a href="index-118.html" class="page-numbers" title="4"><strong>4</strong></a><a href="index-119.html" class="page-numbers" title="5"><strong>5</strong></a><span class="expand page-numbers">...</span><a class="page-numbers last" href="index-120.html" title="Last Page">Last Page</a><a href="index-116.html" class="next page-numbers"><strong>NEXT</strong></a>              </div>
         </div>
         		  
     </section>
           <!--End loop taxonomy page -->
</div>
<!--taxonomy  sidebar -->
	<aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
		<div id="tmplclassifiedfilters_widget-3" class="widget tmpl_search_classified"><h3 class="widget-title">Find Classified</h3>		<!-- form for find classified start -->
		<form name="tmpl_find_classified" method="post" action="//demo.templatic.com/classifieds" id="tmpl_find_classified" class="tmpl_filter_results">
		<input type="hidden" name="posttype" value="classified"/>
		<input type="hidden" name="pagetype" value="archive"/>
		<input type="hidden" name="csortby" value="" id="csortby"/>
		<ul class="horizontal_location_nav">
					
		
			<div class="search_range">
			<h4>Price</h4>			
			<input type="hidden" name="price" id="cprice_range" value="1 - 50000"/>

							<input type="text" name="cprice" id="classified_price_range" value="$1.00-$50,000.00" style="border: 0px none;"  readonly="readonly"/>
				
			</div>
			<div id="classified-price-range"></div> <!-- division for range slider -->
						<h4>Location</h4>
						 <li>
				  <select name="country_id" id="widget_classified_country" filterdisplayname="Country">
					   <option value="">Select Country</option>
				       					   <option value="226" >United States</option>
				  				  </select>
			 </li>
			 <li>
				  <select name="zones_id" id="widget_classified_zone" filterdisplayname="State">
					   <option value="">All Regions</option>
				       					   <option value="3682" >California</option>
				       					   <option value="3713" >New York</option>
				       					   <option value="3721" >Pennsylvania</option>
				       				  </select>
			 </li>
			 <li>
				  
					   <select name="post_city_id" id="widget_classified_city" filterdisplayname="City">
							<option value="">All Cities</option>
					        							<option ctitile="Philadelphia" value="2" >Philadelphia</option>
					   					   </select>
				 
			 </li>
			  
		</ul>
		<input type="hidden" name="pcity_name" id="pcity_name" value=""  filterdisplayname="City" />
		<input type="hidden" name="pzone_name" id="pzone_name" value=""  filterdisplayname="Region" />
		<input type="hidden" name="pcountry_name" id="pcountry_name" value=""  filterdisplayname="Country" />
		<input type="hidden" name="pcat_name" id="pcat_name" value=""  filterdisplayname="Categories" />
		<input type="hidden" name="class_price" id="class_price" value="0"/>
		<!--  City Selection Area end -->
		
				<!--  Classified Type start -->
		<h4>Classified Type</h4>
		
					<ul class="flt-pstatus">
			<select name="classified_type" id="classified_type" filterdisplayname="Classified Type">
				<option value="">Select Classified Type</option>
			<option  value="36">Abstract</option><option  value="47">Accessories</option><option  value="97">Animals</option><option  value="15">Art &amp; Crafts</option><option  value="39">Bicycle</option><option  value="37">Bike</option><option  value="9">Books</option><option  value="19">Books &amp; Hobbies</option><option  value="17">Cameras</option><option  value="42">Canon</option><option  value="38">Car</option><option  value="44">Cloths</option><option  value="60">Cloths &amp; Footwear</option><option  value="50">Computers</option><option  value="56">Customer Service</option><option  value="20">Electronics &amp; Computers</option><option  value="2">Entertainment</option><option  value="18">Fashion &amp; Beauty</option><option  value="45">Footwear</option><option  value="51">Games</option><option  value="57">IT</option><option  value="22">Jobs</option><option  value="23">Kids &amp; Baby Products</option><option  value="62">Kids Furniture</option><option  value="48">Magazines</option><option  value="58">Marketing</option><option  value="66">Mobile accessories</option><option  value="64">Mobile Phones</option><option  value="63">Mobiles &amp; Tablets</option><option  value="67">Movie DVDs</option><option  value="7">Music</option><option  value="68">Music CDs</option><option  value="40">Nikon</option><option  value="49">Other hobbies</option><option  value="43">Panasonic</option><option  value="59">Part-time</option><option  value="35">Photos</option><option  value="41">Sony</option><option  value="65">Tablets</option><option  value="61">Toys &amp; Games</option><option  value="8">TV</option><option  value="52">TV</option><option  value="16">Vehicles</option><option  value="46">Watches</option><option  value="83">Web Development</option>			</select>
			</ul>
					<!--  Classified Type end -->
		
		
			<!--  Classified Price Type Start -->
			<h4>Price Type</h4>
			<ul class="flt-pstatus">
								<li><input id="classified_ptype_fixed" filterdispvalue="Fixed Price" type="checkbox" filterdisptitle="Price Type" filterdisplayid="price_type" filterdispID="price_type" name="price_type[]" value="fixed"/><label for="classified_ptype_fixed">Fixed Price</label></li>
										<li><input id="classified_ptype_negotiable" filterdispvalue="Negotiable" type="checkbox" filterdisptitle="Price Type" filterdisplayid="price_type" filterdispID="price_type" name="price_type[]" value="negotiable"/><label for="classified_ptype_negotiable">Negotiable</label></li>
										<li><input id="classified_ptype_exchange" filterdispvalue="Exchange Donate" type="checkbox" filterdisptitle="Price Type" filterdisplayid="price_type" filterdispID="price_type" name="price_type[]" value="exchange"/><label for="classified_ptype_exchange">Exchange Donate</label></li>
										<li><input id="classified_ptype_free" filterdispvalue="Free" type="checkbox" filterdisptitle="Price Type" filterdisplayid="price_type" filterdispID="price_type" name="price_type[]" value="free"/><label for="classified_ptype_free">Free</label></li>
								</ul>
			<!--  Classified Price Type End -->		
			
					
			<!--  Classified Status Start -->
			<h4>Classified Status</h4>
			<ul class="flt-pstatus">
								<li><input id="classified_tag_sold" filterdispvalue="Sold" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="Sold"/><label for="classified_tag_sold">Sold</label></li>
										<li><input id="classified_tag_ono" filterdispvalue="O.N.O" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="O.N.O"/><label for="classified_tag_ono">O.N.O</label></li>
										<li><input id="classified_tag_ovno" filterdispvalue="O.V.N.O" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="O.V.N.O"/><label for="classified_tag_ovno">O.V.N.O</label></li>
										<li><input id="classified_tag_no_offer" filterdispvalue="No Offers" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="no_offer"/><label for="classified_tag_no_offer">No Offers</label></li>
										<li><input id="classified_tag_part_exchange" filterdispvalue="Part Exchange" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="part_exchange"/><label for="classified_tag_part_exchange">Part Exchange</label></li>
										<li><input id="classified_tag_private_sale" filterdispvalue="Private Sale" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="private_sale"/><label for="classified_tag_private_sale">Private Sale</label></li>
										<li><input id="classified_tag_trade" filterdispvalue="Trade" type="checkbox" filterdisptitle="Classified Status" filterdisplayid="classified_tag" filterdispID="classified_tag" name="classified_tag[]" value="trade"/><label for="classified_tag_trade">Trade</label></li>
								</ul>
			<!--  Classified Status End -->
			
				
		</form>
		<!-- form for find classified end -->
		<script type="text/javascript">
		jQuery(document).ready(function(){
			var typingTimer,getCityNameTimer;                /* timer identifier*/
			var doneTypingInterval = 1000,getCityInterval = 500;  /* time in ms, 1 second */
			/* search classified by changing country */	
			jQuery("#widget_classified_country").change(function(){				
				var country_id = jQuery('#widget_classified_country').val();		
				jQuery.ajax({
					url:ajaxUrl,
					type:'POST',
					async: true,
					data:'action=fill_states_cmb&country_id=' + country_id+'&front=1',
					success:function(results) {				
						jQuery('#widget_classified_zone').html(results);
						clearTimeout(typingTimer);
						if(jQuery('select#widget_classified_zone option:selected').val()!=''){
							jQuery('select#widget_classified_zone').trigger('change');						
						}else{
							var zone_first_option = jQuery('#widget_classified_zone option').first();					
							jQuery('#widget_classified_zone + span.select').text(zone_first_option.text());
						}
						/*typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval);*/
						typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,jQuery('#pcountry_name').attr('id'),jQuery('#pcountry_name').attr('filterdisplayname'));
					}
				});
					
			});
			/* search classified by changing state */
			jQuery("#widget_classified_zone").change(function(){				
				var state_id = jQuery('#widget_classified_zone').val();		
				jQuery.ajax({
					url:ajaxUrl,
					type:'POST',
					async: true,
					data:'action=fill_city_cmb&state_id=' + state_id+'&front=1',
					success:function(results) {				
						jQuery('#widget_classified_city').html(results);
						
						clearTimeout(typingTimer);
						
						if(jQuery('select#widget_classified_city option:selected').val()!=''){
							jQuery('select#widget_classified_city').trigger('change');						
						}else{
							var city_first_option = jQuery('#widget_classified_city option').first();					
							jQuery('#widget_classified_city + span.select').text('All Regions');
						}
						
						/*typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval);*/
						typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,jQuery('#pzone_name').attr('id'),jQuery('#pzone_name').attr('filterdisplayname'));
						
					}
				});	
			});
			/* search classified by changing city */
			jQuery(document).on('change',"#widget_classified_city", function(){
					clearTimeout(typingTimer);
					clearTimeout(getCityNameTimer);
					getCityNameTimer = setTimeout(getCityName, getCityInterval,jQuery(this).val());	
					typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,jQuery('#pcity_name').attr('id'),jQuery('#pcity_name').attr('filterdisplayname'));	
			});
			
			/* search classified by changing classified type */
			jQuery("#classified_type").change(function(){
				clearTimeout(typingTimer);
				getCityNameTimer = setTimeout(getCatName, getCityInterval,jQuery(this).val());	
				typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,jQuery('#pcat_name').attr('id'),jQuery('#pcat_name').attr('filterdisplayname'));	
			});
			
			
			/* search classified by typing textbox */
			jQuery('#tmpl_find_classified input[type="text"]').bind('keyup',function(){
				clearTimeout(typingTimer);
				typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,jQuery(this).attr('id'),jQuery(this).attr('filterdisplayname'));
			});
			/* search classified by clicking checkbox */
			jQuery('#tmpl_find_classified input[type="checkbox"]').bind('click',function(e){
				clearTimeout(typingTimer);
				tmpl_classified_search_filter(jQuery(this).attr('filterdispID'),jQuery(this).attr('filterdisptitle'));
			});
			
			
			/* Sorting Classified */
							
			jQuery(document).on('click','#directory_sort_order_alphabetical ul li a', function(e){
			e.preventDefault();
			jQuery(this).parent().parent().find('.active').removeClass('active');
			
			jQuery(this).parent().addClass('active');
			jQuery('#alpha_sort').val(jQuery(this).text());
			var alpha_sort =  jQuery('#alpha_sort').val();
			var miles_range=jQuery('#sf_radius_range').val();
				var list_id='loop_classified_taxonomy';
				jQuery('.'+list_id+'_process').remove();
				jQuery('#'+list_id ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><span class='process-overlay'></span><i class='fa fa-circle-o-notch fa-spin'></i></p>" );
				jQuery.ajax({
					url:ajaxUrl,
					type:'POST',
					cache: true,
					data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_property").serialize()+'&posttype=classified&alpha_sort='+alpha_sort,						
					success:function(results){					
						jQuery('.'+list_id+'_process').remove();
						jQuery('#listpagi').remove();
						jQuery('#'+list_id).html(results);
					}
				});
				/* Ajax request for locate the location on map */
				jQuery.ajax({
						url:ajaxUrl,
						type:'POST',			
						data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_property").serialize()+'&property_price=1&alpha_sort='+alpha_sort,
						success:function(results){						
							tmpl_miles_googlemap(results);
						}
					});
		
			});
				
			jQuery('#classified_sortby').attr('onchange','').unbind('change');	
			jQuery('#classified_sortby').bind('change',function (e){
			
			e.preventDefault();

			var sort_by = jQuery(this).val();
			if( sort_by == ''){ return false; }		
		
				jQuery('#csortby').val(jQuery(this).val());

				
				/* aliphatic list for sorting */
				var alphabts = '';
					  alphabts += '<div id="directory_sort_order_alphabetical" class="sort_order_alphabetical">';
					   alphabts += '<input type="hidden" name="alpha_sort" id="alpha_sort" />';
						alphabts += '<ul>';
							alphabts += '<li class="active"><a href="javascript:void(0)">All</a></li>';
							alphabts += '<li><a href="javascript:void(0)">A</a></li>';
							alphabts += '<li><a href="javascript:void(0)">B</a></li>';
							alphabts += '<li><a href="javascript:void(0)">C</a></li>';
							alphabts += '<li><a href="javascript:void(0)">D</a></li>';
							alphabts += '<li><a href="javascript:void(0)">E</a></li>';
							alphabts += '<li><a href="javascript:void(0)">F</a></li>';
							alphabts += '<li><a href="javascript:void(0)">G</a></li>';
							alphabts += '<li><a href="javascript:void(0)">H</a></li>';
							alphabts += '<li><a href="javascript:void(0)">I</a></li>';
							alphabts += '<li><a href="javascript:void(0)">J</a></li>';
							alphabts += '<li><a href="javascript:void(0)">K</a></li>';
							alphabts += '<li><a href="javascript:void(0)">L</a></li>';
							alphabts += '<li><a href="javascript:void(0)">M</a></li>';
							alphabts += '<li><a href="javascript:void(0)">N</a></li>';
							alphabts += '<li><a href="javascript:void(0)">O</a></li>';
							alphabts += '<li><a href="javascript:void(0)">P</a></li>';
							alphabts += '<li><a href="javascript:void(0)">Q</a></li>';
							alphabts += '<li><a href="javascript:void(0)">R</a></li>';
							alphabts += '<li><a href="javascript:void(0)">S</a></li>';
							alphabts += '<li><a href="javascript:void(0)">T</a></li>';
							alphabts += '<li><a href="javascript:void(0)">U</a></li>';
							alphabts += '<li><a href="javascript:void(0)">V</a></li>';
							alphabts += '<li><a href="javascript:void(0)">W</a></li>';
							alphabts += '<li><a href="javascript:void(0)">X</a></li>';
							alphabts += '<li><a href="javascript:void(0)">Y</a></li>';
							alphabts += '<li><a href="javascript:void(0)">Z</a></li>';
						alphabts += '</ul>';
					alphabts += '</div>';
					
				/* if sort by alphabets then show alphabets */
				if(jQuery(this).val() == 'alphabetical')
				{
					var cc = jQuery.cookie('display_view');	
					if(cc !='locations_map'){
						if(jQuery('#content #directory_sort_order_alphabetical').length == 0)
								jQuery('#'+'loop_classified_taxonomy').before(alphabts);
					}
					
					
				}
				else
				{
					if(jQuery('#content #directory_sort_order_alphabetical').length > 0)
								jQuery('#directory_sort_order_alphabetical').remove();
				}
				var miles_range=jQuery('#sf_radius_range').val();
				var list_id='loop_classified_taxonomy';	
				jQuery('.'+list_id+'_process').remove();
				jQuery('#'+list_id ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><span class='process-overlay'></span><i class='fa fa-2x fa-circle-o-notch fa-spin'></i></p>" );
				
				jQuery.ajax({
					url:ajaxUrl,
					type:'POST',
					cache: true,
					data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'',
					success:function(results){	
						jQuery('.'+list_id+'_process').remove();
						jQuery('#listpagi').remove();
						jQuery('#'+list_id).html(results);
						if(jQuery("#classified_sortby").val() =='price_low_high'){
							jQuery(".short-price .fa").removeClass('fa-caret-down');
							jQuery(".short-price .fa").addClass('fa-caret-up');
						}else{
							jQuery(".short-price .fa").removeClass('fa-caret-up');
							jQuery(".short-price .fa").addClass('fa-caret-down');
						}
						
						if(jQuery("#classified_sortby").val() =='title_desc'){
							jQuery(".short-title .fa").removeClass('fa-caret-down');
							jQuery(".short-title .fa").addClass('fa-caret-up');
						}else{
							jQuery(".short-title .fa").removeClass('fa-caret-up');
							jQuery(".short-title .fa").addClass('fa-caret-down');
						}
						
						if(jQuery("#classified_sortby").val() =='date_desc'){
							jQuery(".short-date .fa").removeClass('fa-caret-down');
							jQuery(".short-date .fa").addClass('fa-caret-up');
						}else{
							jQuery(".short-date .fa").removeClass('fa-caret-up');
							jQuery(".short-date .fa").addClass('fa-caret-down');
						}
			
					}
				});
				/* Ajax request for locate the location on map */
				jQuery.ajax({
						url:ajaxUrl,
						type:'POST',
						data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'',
						dataType: 'json',
						success:function(results){						
							googlemaplisting_deleteMarkers();
							templ_add_googlemap_markers(results.markers);
						}
					});
			});
			
			
			
			/* search classified by price range */
			jQuery('#classified-price-range').bind('slidestop', function(event, ui) {

			jQuery("#class_price").val(1);	
			
				/* for price range filter */
			  var id = 'classified_price_range';
			  var value = jQuery('#'+id).val(); /* get filter value */
				jQuery("#filter-group-classified_price_range").show();
				var range = value.split('-');
				var min_price = '1';
				var max_price = '50000';
				var slide_min_val=range[0].replace(/^\D+/g, '');
				var slide_max_val=range[1].replace(/^\D+/g, '');
				jQuery("#cprice_range").val(slide_min_val+" - "+slide_max_val);
				if((jQuery.trim(range[0]) == min_price) && (jQuery.trim(range[1]) == max_price))
				  {
					  jQuery("#class_price").val(0);
					  jQuery("#filter-group-classified_price_range").hide();
					  tmpl_check_form_field_values_();
				  }	
				
				var price_range = jQuery('#classified_price_range').val();
				typingTimer = setTimeout(tmpl_classified_search_filter, doneTypingInterval,'classified_price_range','');
			});

			/* generate slider for price range */
			jQuery(function(){ 
				jQuery("#classified-price-range").slider({ 
					range:true,
										min: 1,
					max:50000,
					values:[1,50000],
					slide:function(e,t){
						jQuery("#classified_price_range").val("$"+tmpl_thousandseperator((parseFloat(t.values[0])).toFixed(num_decimals)).replace('.',decimal_sep).replace(' ','')+" - $"+tmpl_thousandseperator((parseFloat(t.values[1])).toFixed(num_decimals)).replace('.',decimal_sep).replace(' ',''));
						
						jQuery("#cprice_range").val(t.values[0]+" - "+t.values[1]);
						
						}
					});			
			});
		});
		/* function for get city name */
		function getCityName(cid)
		{
			jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				async: true,
				data:'action=tmpl_get_classified_city&cid='+cid,
				success:function(results) {							
					    jQuery('#pcity_name').val(results);
					}
				});
		}
		
		/* function for get category name for properties form category id */
		function getCatName(catid)
		{
			jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				async: true,
				data:'action=tmpl_get_classified_category_name&catid='+catid,
				success:function(results) {							
					    jQuery('#pcat_name').val(results);
					}
				});
		}
				
		/*
		*
		* function: tmpl_classified_search_filter
		* Description: search by filter
		*
		*/
		
		
			/* clear all filters */
			jQuery('#cclear_filter').bind('click',function(){
				
				/* reset select box */
				jQuery('#tmpl_find_classified select').each(function(){
					var select_id = jQuery(this).attr('id');
					console.log(select_id);
					jQuery('#tmpl_find_classified #'+select_id+' + span.select').text(jQuery('#tmpl_find_classified #'+select_id+' option:first').text());
				});
				
				/* made sloder range not allowed by filter */
				
				jQuery('#tmpl_find_classified #class_price').val(0); 
			
				/* generate slider for price range */
				jQuery(function(){ 
					jQuery("#classified-price-range").slider({ 
						range:true,
												min: 1,
						max:50000,
						values:[1,50000],
						slide:function(e,t){ 
							 jQuery("#classified_price_range").val(t.values[0]+" - "+t.values[1]);
							}
						});			
				});
				
				jQuery('#tmpl_find_classified').each (function(){
				 this.reset();				  /* resets tha search filter form	*/				   
				});

				jQuery('#widget_classified_city + span.select').text('All Cities');
				jQuery('#widget_classified_zone + span.select').text('All Regions');
				jQuery('#widget_classified_country + span.select').text('Select Country');	

				var list_id='loop_classified_taxonomy';	
				jQuery('.'+list_id+'_process').remove();
				jQuery('#'+list_id ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><span class='process-overlay'></span><i class='fa fa-circle-o-notch fa-spin'></i></p>" );
				jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				async: true,
				data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'',
				success:function(results) {	
					jQuery('#loop_classified_taxonomy_process').remove();			
					jQuery('#loop_classified_taxonomy').html(results);
						jQuery('#CselectedFilters .flit-opt-cols').remove(); /* remove all filters from filter listing  */
						jQuery('.cfilter_list_wrap').hide();
					}
				});
			/* Ajax request for locate the location on map */
						jQuery.ajax({
								url:ajaxUrl,
								type:'POST',			
								data:'action=tmpl_filter_locations_map&'+jQuery("#tmpl_find_classified").serialize()+'',
								dataType: 'json',
								success:function(results){						
									googlemaplisting_deleteMarkers();
									templ_add_googlemap_markers(results.markers);
								}
							});
				
				});
				
				
				/* filter with pagination */
				jQuery(document).on('click','#listpagi .page-numbers', function(e){
				e.preventDefault();
				var page_link = jQuery(this).attr('href');
				if(page_link)
				{
					
					/* separates the link by '/' because page number is in the link */
					if(page_link.indexOf('paged') != -1){
						var split_link = page_link.split('=');
						/* get page number which is second last element in split link */
						var page_num = split_link[split_link.length-1];
					}else{
						var split_link = page_link.split('//demo.templatic.com/');
						/* get page number which is second last element in split link */
						var page_num = split_link[split_link.length-2];
					}
					
					var list_id='loop_classified_taxonomy';
					
					jQuery('#loop_classified_taxonomy_process').remove();
					jQuery('#loop_classified_taxonomy' ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><i class='fa fa-circle-o-notch fa-2x fa-spin'></i></p>" );
					
					jQuery.ajax({
					url:ajaxUrl,
					type:'POST',
					async: true,
					data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'&page_num='+page_num,
						success:function(results){					
							jQuery('.'+list_id+'_process').remove();
							jQuery('#listpagi').remove();
							
							jQuery('#'+list_id).html(results);
							jQuery("html, body").animate({ scrollTop: 0 }, 500);
						}
					});
					
					/* Ajax request for locate the location on map */
					jQuery.ajax({
							url:ajaxUrl,
							type:'POST',			
							data:'action=tmpl_filter_classified_map&'+jQuery("#tmpl_find_classified").serialize()+'&page_num='+page_num,
							success:function(results){						
								tmpl_cmiles_googlemap(results);
							}
						});
						
				}
				else
				{
					return false;
				}
				
			});
			/* 
			Name :tmpl_miles_googlemap
			description : read the data, create markers for map location
			*/
			function tmpl_cmiles_googlemap(data) {
					
					/* get the bounds of the map*/
					bounds = new google.maps.LatLngBounds();  
					/* clear old markers*/
					tmpl_search_googlemap_deleteMarkers();   
					jsonData = jQuery.parseJSON(data);
					/* create the info window*/
					
					/* if no markers found, display map_marker_nofound div with no search criteria met message	*/
					 if (jsonData[0].totalcount <= 0) {
						
						var mapcenter = new google.maps.LatLng(CITY_MAP_CENTER_LAT,CITY_MAP_CENTER_LNG);
						tmpl_search_googlemap_listMapMarkers1(jsonData);
						map.setCenter(mapcenter);
						map.setZoom(CITY_MAP_ZOOMING_FACT);
					}else{			
						var mapcenter = new google.maps.LatLng(CITY_MAP_CENTER_LAT,CITY_MAP_CENTER_LNG);
						tmpl_search_googlemap_listMapMarkers1(jsonData);
						
						map.fitBounds(bounds);
						var center = bounds.getCenter();
						map.setCenter(center);
						
					}
				}
				
			
			/* 
			Name :search_googlemap_deleteMarkers
			description : Delete the existing google map markers
			*/
			function tmpl_search_googlemap_deleteMarkers() {		
				 if (markerArray && markerArray.length > 0) {		
					for (i in markerArray) {
						if (!isNaN(i)){								
							markerArray[i].setMap(null);
							infoBubble.close();
						}
					}
					markerArray.length = 0;
				  }	
				
				markerClusterer.clearMarkers();
				
			}
			
			/* 
			Name :tmpl_search_googlemap_listMapMarkers1
			description : markers
			*/
			function tmpl_search_googlemap_listMapMarkers1(input) {
			markers=input;
			var search_string = document.getElementById('search_string');
			var totalcount = input[0].totalcount;
			if(mClusterer != null)
			{
				mClusterer.clearMarkers();
			}	
			mClusterer = null;	
			if(totalcount > 0){
				for (var i = 0; i < input.length; i++) {							 
					var details = input[i];				
					var image = new google.maps.MarkerImage(details.icons,new google.maps.Size(PIN_POINT_ICON_WIDTH, PIN_POINT_ICON_HEIGHT));
					var coord = new google.maps.LatLng(details.location[0], details.location[1]);			
					markers[i]  = new google.maps.Marker({
									position: coord,
									title: details.name,
									visible: true,
									clickable: true,
									map: map,
									icon: details.icons
								});
					
					bounds.extend(coord);
					markerArray[i] = markers[i];				
					markers[i]['infowindow'] = new google.maps.InfoWindow({
						content: details.message,
						maxWidth: 200
					});	
					
					/*New infobundle*/
					 infoBubble = new InfoBubble({
						maxWidth:210,minWidth:210,minHeight:"auto",padding:0,content:details.message,borderRadius:0,borderWidth:0,borderColor:"none",overflow:"visible",backgroundColor:"#fff"
					  });			
					/* finish new infobundle */
					
					/* Start */
						google.maps.event.addListener(markers, "click", function (e) {														    
						infoBubble.open(map, details.message);					
						});
					
					
					mgr.addMarkers( markers[i], 0 );			
					tmpl_search_marker_attachMessage(markers[i], details.message);
					
				}			
				markerClusterer = new MarkerClusterer(map, markers);
			}  
			}
			
			
			function tmpl_search_marker_attachMessage(marker, msg) {
				  var myEventListener = google.maps.event.addListener(marker, 'click', function() {
						infoBubble.setContent( msg );
						infoBubble.open(map, marker);
				  });
				}	
			
		
		/* 
		Name :delFltr
		description : removal of filter from filter listing and show result according to it
		parameter : 'str' - removal according to this argument
		*/
		function delClassifiedFltr(str)
		{
			var list_id='loop_classified_taxonomy';	
			
			jQuery('.'+list_id+'_process').remove();
			jQuery('#'+list_id ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><span class='process-overlay'></span><i class='fa fa-circle-o-notch fa-spin'></i></p>" );
			
			if(str == 'pcity_name'){
				jQuery('#widget_classified_city + span.select').text('Select City');
			}

			if(str == 'pcat_name'){
				jQuery('#classified_type').prop('selectedIndex',0);
				jQuery('#classified_type + span.select').text('Select Classified Type');
			}		
			
			/* if removed filter is slider then initialize the filter */
			if(str == 'classified_price_range'){
				var min_val = '1';
				var max_val = '50000';
				jQuery("#classified-price-range").slider({ 
					range:true,
										min: 1,
					max:50000,
					values:[1,50000],
					slide:function(e,t){
						 jQuery("#classified_price_range").val(t.values[0]+" - "+t.values[1]);			
						 tmpl_check_form_field_values_();
						}
					});

				jQuery("#classified_price_range").val(min_val+" - "+max_val);			
	
			}
			
			jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				async: true,
				data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'',
				success:function(results) {							
					jQuery('.'+list_id+'_process').remove();
					jQuery('#listpagi').remove();
					jQuery('#'+list_id).html(results);
					jQuery('#filter-group-'+str).remove();
					tmpl_check_form_field_values_();
				}
			});
			
		}
		
		
		function delFltrCheckbox(val,type)
		{
				/*if(type == 'classified_tag' || type == 'classified_ptype')*/
				{
				 jQuery('#tmpl_find_classified input[name="'+type+'[]"]').each(function() {
						if(jQuery(this).attr('id') == val)
						{
							jQuery(this).attr('checked', false); /* uncheck a checkbox  */
						}
				 });
				}
			
				
				var list_id='loop_classified_taxonomy';	 /* get the page id */
				jQuery('.'+list_id+'_process').remove(); /* remove the element */
				jQuery('#'+list_id ).prepend( "<p class='loop_classified_taxonomy_process' style='text-align:center';><span class='process-overlay'></span><i class='fa fa-circle-o-notch fa-spin'></i></p>" );  /* show processing image during ajax request. */
				jQuery.ajax({
				url:ajaxUrl,
				type:'POST',
				async: true,
				data:'action=tmpl_filter_classified&'+jQuery("#tmpl_find_classified").serialize()+'',
				success:function(results) {							
					jQuery('.'+list_id+'_process').remove();						
						jQuery('.'+list_id+'_process').remove();
						jQuery('#listpagi').remove(); 
						jQuery('#'+list_id).html(results);
						if(jQuery('#filter-group-'+type+' .value a').length > 1)
							{
								jQuery('#'+type+'_'+val).remove();
							}
						else
							{
								jQuery('#filter-group-'+type).remove();
							}
					tmpl_check_form_field_values_();		
					}
				});

		}
		
		function tmpl_check_form_field_values_()
		{
				/* check if textfields are empty */
				
				var id = 'classified_price_range';
				var value = jQuery('#'+id).val(); /* get filter value */
				
				var range = value.split('-');
				var min_price = '1';
				var max_price = '50000';
				
				if((jQuery.trim(range[0]) == min_price) && (jQuery.trim(range[1]) == max_price))
				  {
					  var empty_textbox = 1;
				  }
				 else{
					var empty_textbox = 0;
				}	
				jQuery('#tmpl_find_classified :text').each(function(){ 
					if( jQuery.trim(jQuery(this).val()) == "" ) empty_textbox++ ;
					
				});
				
				/* check if checkboxes are empty */
				var empty_checkbox = 0;
				jQuery('#tmpl_find_classified :checkbox').each(function(){ 
					if( jQuery(this).prop('checked') == false ) empty_checkbox++ ;
					
				});
				
				/* check if selectboxes are empty */
				var empty_selectbox = 0;
				jQuery('#tmpl_find_classified select').each(function(){ 
					if( jQuery(this).val() == "" ) empty_selectbox++ ;
					
				});
				
				/*console.log(empty_textbox +'=='+ jQuery('#tmpl_find_classified :text').length);
				console.log(empty_checkbox  +'=='+ jQuery('#tmpl_find_classified :checkbox').length);
				console.log(empty_selectbox  +'=='+ jQuery('#tmpl_find_classified select').length);*/
				
				
				/* if all fields are empty then remove search filter list from above listing */				
				if((empty_textbox == jQuery('#tmpl_find_classified :text').length) && (empty_checkbox == jQuery('#tmpl_find_classified :checkbox').length) && (empty_selectbox == jQuery('#tmpl_find_classified select').length))
				{
					jQuery('#CselectedFilters').hide();
				}
		}	
		
		</script>
		</div><div id="templatic_browse_by_categories-1" class="widget browse_by_categories"><h3 class="widget-title">Categories</h3><div id=browse_category_tag_widget_2068956020><ul class="browse_by_category">	<li class="cat-item cat-item-15"><a href="index-17.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Art &amp; Crafts</a> (2)
<ul class='children'>
	<li class="cat-item cat-item-36"><a href="index-18.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Abstract</a> (1)
</li>
	<li class="cat-item cat-item-18"><a href="index-94.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Fashion &amp; Beauty</a> (10)
	<ul class='children'>
	<li class="cat-item cat-item-47"><a href="index-95.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Accessories</a> (9)
</li>
	<li class="cat-item cat-item-44"><a href="index-96.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Cloths</a> (8)
</li>
	<li class="cat-item cat-item-45"><a href="index-97.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Footwear</a> (8)
</li>
	<li class="cat-item cat-item-46"><a href="index-112.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Watches</a> (7)
</li>
	</ul>
</li>
	<li class="cat-item cat-item-35"><a href="index-19.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Photos</a> (1)
</li>
</ul>
</li>
	<li class="cat-item cat-item-19"><a href="index-91.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Books &amp; Hobbies</a> (7)
<ul class='children'>
	<li class="cat-item cat-item-48"><a href="index-98.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Magazines</a> (7)
</li>
	<li class="cat-item cat-item-49"><a href="index-99.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Other hobbies</a> (7)
</li>
</ul>
</li>
	<li class="cat-item cat-item-17"><a href="index-20.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Cameras</a> (6)
<ul class='children'>
	<li class="cat-item cat-item-42"><a href="index-21.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Canon</a> (7)
</li>
	<li class="cat-item cat-item-40"><a href="index-22.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Nikon</a> (7)
</li>
	<li class="cat-item cat-item-43"><a href="index-16.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Panasonic</a> (7)
</li>
	<li class="cat-item cat-item-41"><a href="index-23.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Sony</a> (7)
</li>
</ul>
</li>
	<li class="cat-item cat-item-20"><a href="index-24.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Electronics &amp; Computers</a> (8)
<ul class='children'>
	<li class="cat-item cat-item-50"><a href="index-28.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Computers</a> (9)
</li>
	<li class="cat-item cat-item-66"><a href="index-25.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Mobile accessories</a> (4)
</li>
	<li class="cat-item cat-item-52"><a href="index-27.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">TV</a> (2)
</li>
</ul>
</li>
	<li class="cat-item cat-item-22"><a href="index-29.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Jobs</a> (1)
<ul class='children'>
	<li class="cat-item cat-item-56"><a href="index-30.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Customer Service</a> (1)
</li>
	<li class="cat-item cat-item-57"><a href="index-31.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">IT</a> (1)
</li>
	<li class="cat-item cat-item-58"><a href="index-32.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Marketing</a> (1)
</li>
	<li class="cat-item cat-item-59"><a href="index-102.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Part-time</a> (1)
</li>
</ul>
</li>
	<li class="cat-item cat-item-23"><a href="index-9.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Kids &amp; Baby Products</a> (2)
<ul class='children'>
	<li class="cat-item cat-item-60"><a href="index-10.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Cloths &amp; Footwear</a> (2)
</li>
	<li class="cat-item cat-item-62"><a href="index-11.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Kids Furniture</a> (2)
</li>
	<li class="cat-item cat-item-61"><a href="index-12.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Toys &amp; Games</a> (2)
</li>
</ul>
</li>
	<li class="cat-item cat-item-63"><a href="index-26.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Mobiles &amp; Tablets</a> (2)
<ul class='children'>
	<li class="cat-item cat-item-64"><a href="index-103.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Mobile Phones</a> (2)
</li>
	<li class="cat-item cat-item-65"><a href="index-104.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Tablets</a> (2)
</li>
</ul>
</li>
	<li class="cat-item cat-item-16"><a href="index-89.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Vehicles</a> (2)
<ul class='children'>
	<li class="cat-item cat-item-39"><a href="index-105.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Bicycle</a> (2)
</li>
	<li class="cat-item cat-item-37"><a href="index-106.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Bike</a> (2)
</li>
	<li class="cat-item cat-item-38"><a href="index-107.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Car</a> (2)
</li>
</ul>
</li>
	<li class="cat-item cat-item-9"><a href="index-100.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Books</a> (3)
</li>
	<li class="cat-item cat-item-51"><a href="index-93.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Games</a> (8)
</li>
	<li class="cat-item cat-item-67"><a href="index-14.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Movie DVDs</a> (3)
</li>
	<li class="cat-item cat-item-7"><a href="index-101.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Music</a> (3)
</li>
	<li class="cat-item cat-item-68"><a href="index-15.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">Music CDs</a> (2)
</li>
	<li class="cat-item cat-item-8"><a href="index-113.html" title="This is the category description for this category. You can change it here: Classifieds &gt; Classifieds categories. This is an excellent way to attract your users and explain what this category is all about and also explain what they can do in this category and how does it matter to them.">TV</a> (8)
</li>
</ul></div></div>		
	</aside>
<!--end taxonomy sidebar -->
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


<footer id="footer" class="clearfix">
      <div class="footer_bottom clearfix">
    <div class="footer-wrap clearfix row">
      <div class="columns">
        		<div id="menu-footer" class="menu-container">
	  <nav class="wrap">
		<div class="menu"><ul id="menu-footer-items" class=""><li id="menu-item-201" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-201"><a href="index.html">Home</a></li>
<li id="menu-item-1728" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1728"><a href="index-43.html">Archives</a></li>
<li id="menu-item-1731" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1731"><a href="index-42.html">All In One Map</a></li>
<li id="menu-item-1729" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1729"><a href="index-108.html">Register</a></li>
<li class="tmpl-login" ><a data-reveal-id="tmpl_reg_login_container" href="javascript:void(0);" onClick="tmpl_login_frm();">Login</a></li></ul></div>	  </nav>
	</div>
	<!-- #menu-footer .menu-container -->
<div id="social_media-1" class="widget social_media">			<div class="social_media">
			  <ul class="social_media_list">
								<li> <a href="//facebook.com/templatic" target="_blank" >
				  				  <i class="fa fa-facebook"></i> </a> </li>
								<li> <a href="//twitter.com/templatic" target="_blank" >
				  				  <i class="fa fa-twitter"></i> </a> </li>
								<li> <a href="//www.youtube.com/user/templatic" target="_blank" >
				  				  <i class="fa fa-youtube"></i> </a> </li>
								<li> <a href="" >
				  				  <i class="fa fa-linkedin"></i> </a> </li>
								<li> <a href="" >
				  				  <i class="fa fa-google-plus"></i> </a> </li>
								<li> <a href="" >
				  				  <i class="fa fa-pinterest"></i> </a> </li>
							  </ul>
			</div>
			</div>        <div class="footer-content"> <div class="footer-bottom-wrap">
	<div class="footer-copyright">
		<p>© 2016 All rights reserved.  </p>
	</div>
</div> </div>
        <!-- .footer-content -->
                </div> 
    </div>
    <!-- .wrap -->
  </div>
  </footer>
<!-- #footer -->
</div>
    <script type="text/javascript" async>
		jQuery(window).load(function () {
                        
                        /* Code start for map reload and center it on category page after tabs changing */
                        jQuery(function(){
                            jQuery(document).on('click',"ul.view_mode li #locations_map", function(){
                                google.maps.event.trigger(map, 'resize');
                                map.fitBounds(bounds);
                                var center = bounds.getCenter();
                                map.setCenter(center);
                            })
                        });
                        /* Code end */
                        
                        if(jQuery('#locations_map').hasClass('active'))
			{
				jQuery('.tev_sorting_option').css('display','none');
				jQuery('#directory_sort_order_alphabetical').css('display','none');
			}
			else
			{
				jQuery('.tev_sorting_option').css('display','');
				jQuery('#directory_sort_order_alphabetical').css('display','');
			}
			jQuery('.viewsbox a.listview').click(function(e){
				jQuery('.tev_sorting_option').css('display','');
				jQuery('#directory_sort_order_alphabetical').css('display','');
			});
			jQuery('.viewsbox a.gridview').click(function(e){
				jQuery('.tev_sorting_option').css('display','');
				jQuery('#directory_sort_order_alphabetical').css('display','');
			});
			jQuery('.viewsbox a#locations_map').click(function(e){
				jQuery('.tev_sorting_option').css('display','none');
				jQuery('#directory_sort_order_alphabetical').css('display','none');
			});
		});
	</script>
	<!-- Login form -->
	<div id="tmpl_reg_login_container" class="reveal-modal tmpl_login_frm_data" data-reveal>
		<a href="javascript:;" class="modal_close"></a>
		<div id="tmpl_login_frm" > 
			<div class="login_form_l"><h3>Sign In</h3>			<div class="login_form_box">
			
            					<form name="popup_login" id="popup_login" action="classifieds/city/philadelphia/classified/nexus-5-white-32gb-unlocked-t-mobile-att/" method="post" >
                <p style="text-align: center;color: red;">This socials login not configured for this demo site.</p>					<input type="hidden" name="action" value="login" />                         
					<div class="form_row clearfix">
						<label>Username <span class="indicates">*</span> </label>
						<input type="text" name="log" id="user_login" value="" size="20" class="textfield" />
						<span id="user_loginInfo"></span> 
					</div>
					
					<div class="form_row clearfix">
						<label> Password <span class="indicates">*</span> </label>
						<input type="password" name="pwd" id="user_pass" class="textfield" value="" size="20"  />
						<span id="user_passInfo"></span> 
					</div>
					<input type="hidden" name="redirect_to" value="index.html" />
					<input type="hidden" name="testcookie" value="1" />
					<div class="form_row rember clearfix">
					<label>
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="fl" />
						Remember me on this computer 
					</label>	
					
					 <!-- html to show social login -->
                    <a onClick="showhide_forgetpw('popup_login');" href="javascript:void(0)" class="lw_fpw_lnk">Forgot your password?</a> 
				    </div>
				 	
					<div class="form_row ">
				    <input class="b_signin_n" type="submit" value="Sign In"  name="submit" />		
					<p class="forgot_link">
								
					</p>
				    </div> 
					
					 
							
				</form>
								
					
	<div  class='forgotpassword' id="lostpassword_form" style="display:none;" >
	<h3>Forgot password</h3>
	<form name="popup_login_forgot_pass" id="popup_login_forgot_pass" action="classifieds/city/philadelphia/classified/nexus-5-white-32gb-unlocked-t-mobile-att/" method="post" >
			<input type="hidden" name="action" value="lostpassword" />
		<div class="form_row clearfix">
		<label> Email: </label>
		<input type="text" name="user_login" id="user_login_email"  value="" size="20" class="textfield" />
			 <span id="forget_user_email_error" class="message_error2"></span>
				</div>
		<input type="hidden" name="pwdredirect_to" value="index.html" />
		<input type="submit" name="get_new_password" onClick="return forget_email_validate('popup_login_forgot_pass');" value="Get New Password" class="b_signin_n " />
	</form>
	</div>
   
			</div>
			<!-- Enable social media(gigya plugin) if activated-->         
						<!--End of plugin code-->
			
			<script  type="text/javascript" async >
				function showhide_forgetpw(form_id)
				{
					jQuery(document).on('click','form#'+form_id+' .lw_fpw_lnk', function(e){
						jQuery(this).closest('form#'+form_id).next().show();
						e.preventDefault();
						return false;
					});
				}
				
			</script>
		</div>		</div>
		
				
	</div>
					<link rel='stylesheet' id='jQuery_datepicker_css-css'  href='images/jquery.ui.all.min.css' type='text/css' media='all' />
<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/_supreme.min.js'></script>
<script type='text/javascript' src='images/wp-embed.min.js'></script>
<script type='text/javascript' src='images/position.min.js'></script>
<script type='text/javascript' src='images/menu.min.js'></script>
<script type='text/javascript' src='images/wp-a11y.min.js'></script>
<script type='text/javascript' src='images/autocomplete.min.js'></script>
<script type='text/javascript' src='images/tevolution-script.min.js'></script>
<script type='text/javascript' src='images/jquery_cookies.js'></script>
<script type='text/javascript' src='images/mouse.min.js'></script>
<script type='text/javascript' src='images/slider.min.js'></script>
<script type='text/javascript' src='images/bootstrap-mini.js'></script>
<style type="text/css">
.by_this_theme_fix {display: none;}
@media only screen and (min-width: 1024px) {
 .by_this_theme_fix {background-color: #4DC46F;color:#fff;position: fixed;bottom: 80px;right: 80px;z-index: 99999;display: inline-block;text-align:center;border-radius: 3px%;-webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -webkit-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -moz-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);font-size:20px;font-weight:bold;transition: all 1s ease;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-o-transition: all 1s ease;animation-name:animFadeUp; animation-fill-mode: both; animation-duration: 0.4s;animation-timing-function: ease;animation-delay: 1.5s; -webkit-animation-name: animFadeUp; -webkit-animation-fill-mode: both; -webkit-animation-duration: 0.4s;-webkit-animation-timing-function: ease;-webkit-animation-delay: 1.5s; -moz-animation-name: animFadeUp;-moz-animation-fill-mode: both; -moz-animation-duration: 0.4s;-moz-animation-timing-function: ease; -moz-animation-delay: 1.5s; -o-animation-name: animFadeUp;-o-animation-fill-mode: both;-o-animation-duration: 0.4s;-o-animation-timing-function: ease;-o-animation-delay: 1.5s; padding:8px 25px}
 .by_this_theme_fix span{font-size:16px; vertical-align: middle;}
 .by_this_theme_fix:hover{background-color:#58da7d; color:#fff;}
</style></body>
</html>