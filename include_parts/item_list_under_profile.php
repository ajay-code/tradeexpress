<?php
$cls='';
if(!isset($_GET["for"])){
	$cls='active';
}

?>
<ul id="listing" class="tabs" data-tab role="tablist">
<li class="tab-title classified-info-tab <?php echo $cls;  ?> <?php if(isset($_GET["for"]) && $_GET["for"]=="general_item") echo 'active'; ?>" role="presentational"><a href="#general_item">General Item</a></li>
<li class="tab-title classified-review-tab <?php if(isset($_GET["for"]) && $_GET["for"]=="property") echo 'active'; ?>" role="presentational"><a href="#property_item">Property</a></li> 
<li class="tab-title classified-review-tab <?php if(isset($_GET["for"]) && $_GET["for"]=="job") echo 'active'; ?>" role="presentational"><a href="#job_item">Job</a></li> 
<li class="tab-title classified-review-tab <?php if(isset($_GET["for"]) && $_GET["for"]=="car") echo 'active'; ?>" role="presentational"><a href="#car_item">Car</a></li> 
</ul>	
<div class="tabs-content">	
                                                                      <!-- Other Property details -->
	<section role="tabpanel" aria-hidden="false" class="content <?php echo $cls;  ?>  <?php if(isset($_GET["for"]) && $_GET["for"]=="general_item") echo 'active'; ?> entry-content" id="general_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
				<div id="general_item_ajax">
    				
				</div>
<!-- END GENRERAL_ITEM_AJAX  -->				
					
		</section>
	</section>
	
	<section role="tabpanel" aria-hidden="false" class="content <?php if(isset($_GET["for"]) && $_GET["for"]=="property") echo 'active'; ?>  entry-content" id="property_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
    		
			<div id="property_item_ajax">
    				
			</div>
<!-- END GENRERAL_ITEM_AJAX  -->				
					
		</section>
	</section>
	
	<section role="tabpanel" aria-hidden="false" class="content <?php if(isset($_GET["for"]) && $_GET["for"]=="job") echo 'active'; ?>  entry-content" id="job_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
    								
			<div id="job_item_ajax">
    				
			</div>
<!-- END GENRERAL_ITEM_AJAX  -->		
		</section>
	</section>
	
	<section role="tabpanel" aria-hidden="false" class="content <?php if(isset($_GET["for"]) && $_GET["for"]=="car") echo 'active'; ?>  entry-content" id="car_item">
           <h2 class="print-heading">Info</h2>
                                <div id="overview" class="entry-content">	
	
		<section id="loop_classified_taxonomy" class="hfeed list author-feeds">
    		<div id="car_item_ajax">
    				
			</div>
<!-- END GENRERAL_ITEM_AJAX  -->			
		</section>
	</section>
	
	
	
</section>
<!-- #content -->
<?php
include("include_parts/top_author_sidebar.php");
?>
	<!-- #sidebar-primary -->
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
</div> 