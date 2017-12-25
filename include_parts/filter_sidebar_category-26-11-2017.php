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
							
			/* jQuery(document).on('click','#directory_sort_order_alphabetical ul li a', function(e){
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
				}); */
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

<div id="templatic_browse_by_categories-1" class="widget browse_by_categories"><h3 class="widget-title">Find By Category</h3><div>
<ul class="browse_by_category">
<?php
$selector=rand(1,4);

?>
<?php
if($selector==1){
	$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0),' ORDER BY rand()'));
	foreach($category as $k=>$v){
?>
<li class="cat-item cat-item-15"><a href="general_item_listing.php?category=<?php echo $v["gic_id"]; ?>" ><?php echo $v["category"]; ?></a> (<?php echo total_general_item_by_cat($v["gic_id"]);  ?>)
						<?php
						$sub_category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v["gic_id"]),' ORDER BY rand()'));
						if(!empty($sub_category)){
						?>
<ul class='children'>
<?php
foreach($sub_category as $k1=>$v1){
?>
	<li class="cat-item cat-item-18"><a href="general_item_listing.php?category=<?php echo $v["gic_id"]; ?>&sub_category=<?php echo $v1["gic_id"]; ?>" ><?php echo $v1["category"]; ?></a> (<?php echo total_general_item_by_sub_cat($v1["gic_id"]);  ?>)
<?php
}
?>						
						<?php
						$sub_sub_category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v1["gic_id"]),' ORDER BY rand()'));
						if(!empty($sub_sub_category)){
						?>
	<ul class='children'>
<?php
foreach($sub_sub_category as $k2=>$v2){
?>
	<li class="cat-item cat-item-47"><a href="general_item_listing.php?category=<?php echo $v["gic_id"]; ?>&sub_category=<?php echo $v1["gic_id"]; ?>&sub_sub_category=<?php echo $v2["gic_id"]; ?>" ><?php echo $v2["category"]; ?></a> (<?php echo total_general_item_by_sub_sub_cat($v2["gic_id"]);  ?>)</li>
<?php
}
?>	
	</ul>
						<?php
						}
						?>
	</li>
</ul>
						<?php
						}
						?>

</li>
<?php
	}
}
?>

<?php
if($selector==2){
	$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0),' ORDER BY rand()'));
	foreach($category as $k=>$v){
?>
<li class="cat-item cat-item-15"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>" ><?php echo $v["category"]; ?></a> (<?php echo total_property_by_cat($v["pc_id"]); ?>)
						<?php
						$sub_category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$v["pc_id"]),' ORDER BY rand()'));
						if(!empty($sub_category)){
						?>
<ul class='children'>
<?php
foreach($sub_category as $k1=>$v1){
?>
	<li class="cat-item cat-item-18"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>&sub_category=<?php echo $v1["pc_id"]; ?>" ><?php echo $v1["category"]; ?></a> (<?php echo total_property_by_sub_cat($v1["pc_id"]); ?>)
<?php
}
?>						
						<?php
						$sub_sub_category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$v1["pc_id"]),' ORDER BY rand()'));
						if(!empty($sub_sub_category)){
						?>
	<ul class='children'>
<?php
foreach($sub_sub_category as $k2=>$v2){
?>
	<li class="cat-item cat-item-47"><a href="property_listing.php?category=<?php echo $v["pc_id"]; ?>&sub_category=<?php echo $v1["pc_id"]; ?>&sub_sub_category=<?php echo $v2["pc_id"]; ?>" ><?php echo $v2["category"]; ?></a> (<?php echo total_property_by_sub_sub_cat($v2["pc_id"]); ?>)</li>
<?php
}
?>	
	</ul>
						<?php
						}
						?>
	</li>
</ul>
						<?php
						}
						?>

</li>
<?php
	}
}
?>
<?php
if($selector==3){
	$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0),' ORDER BY rand()'));
	foreach($category as $k=>$v){
?>
<li class="cat-item cat-item-15"><a href="car_listing.php?category=<?php echo $v["cc_id"]; ?>" ><?php echo $v["category"]; ?></a> (<?php  echo total_car_by_cat($v["cc_id"]); ?>)
						<?php
						$sub_category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>$v["cc_id"]),' ORDER BY rand()'));
						if(!empty($sub_category)){
						?>
<ul class='children'>
<?php
foreach($sub_category as $k1=>$v1){
?>
	<li class="cat-item cat-item-18"><a href="car_listing.php?category=<?php echo $v["cc_id"]; ?>&sub_category=<?php echo $v1["cc_id"]; ?>" ><?php echo $v1["category"]; ?></a> (<?php  echo total_car_by_sub_cat($v1["cc_id"]); ?>)
<?php
}
?>						
						<?php
						$sub_sub_category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>$v1["cc_id"]),' ORDER BY rand()'));
						if(!empty($sub_sub_category)){
						?>
	<ul class='children'>
<?php
foreach($sub_sub_category as $k2=>$v2){
?>
	<li class="cat-item cat-item-47"><a href="car_listing.php?category=<?php echo $v["cc_id"]; ?>&sub_category=<?php echo $v1["cc_id"]; ?>&sub_sub_category=<?php echo $v2["cc_id"]; ?>" ><?php echo $v2["category"]; ?></a> (<?php  echo total_car_by_sub_sub_cat($v2["cc_id"]); ?>)</li>
<?php
}
?>	
	</ul>
						<?php
						}
						?>
	</li>
</ul>
						<?php
						}
						?>

</li>
<?php
	}
}
?>
<?php
if($selector==4){
	$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0),' ORDER BY rand()'));
	foreach($category as $k=>$v){
?>
<li class="cat-item cat-item-15"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>" ><?php echo $v["category"]; ?></a> (<?php  echo total_job_by_cat($v["jc_id"]); ?>)
						<?php
						$sub_category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$v["jc_id"]),' ORDER BY rand()'));
						if(!empty($sub_category)){
						?>
<ul class='children'>
<?php
foreach($sub_category as $k1=>$v1){
?>
	<li class="cat-item cat-item-18"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>&sub_category=<?php echo $v1["jc_id"]; ?>" ><?php echo $v1["category"]; ?></a> (<?php  echo total_job_by_sub_cat($v1["jc_id"]); ?>)
<?php
}
?>						
						<?php
						$sub_sub_category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$v1["jc_id"]),' ORDER BY rand()'));
						if(!empty($sub_sub_category)){
						?>
	<ul class='children'>
<?php
foreach($sub_sub_category as $k2=>$v2){
?>
	<li class="cat-item cat-item-47"><a href="job_listing.php?category=<?php echo $v["jc_id"]; ?>&sub_category=<?php echo $v1["jc_id"]; ?>&sub_sub_category=<?php echo $v2["jc_id"]; ?>" ><?php echo $v2["category"]; ?></a> (<?php  echo total_job_by_sub_sub_cat($v2["jc_id"]); ?>)</li>
<?php
}
?>	
	</ul>
						<?php
						}
						?>
	</li>
</ul>
						<?php
						}
						?>

</li>
<?php
	}
}
?>
</ul>
</div>
</div>