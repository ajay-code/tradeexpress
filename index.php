<?php
session_start();
require_once("function.php");
include_once("include/header.php");
?>
<div style="max-width: 1200px; margin:auto">
	<?php
		include("include/slider_res.php");
	?>	
</div>

     <div class="home_page_banner clear clearfix clearfix map_full_width">
      </div>
<section id="main" class="clearfix">

		 <div class="home_page_full_content row">
		 	<div class="columns ">
	        <script type="text/javascript">
			jQuery(window).load(function(){		
			 /* item margin is same as provided in css li- margin */	
				var $window = jQuery(window), flexslider = { vars:{} };;
				 function getGridSize() {
				    return (window.innerWidth < 480) ? 1 :
				           (window.innerWidth < 900) ? 4 : 6;
				  }
				  $window.load(function() {						
					jQuery('.flexslider596617191').flexslider({
						animation: "slide",
						animationLoop: true,	
						useCSS: false,	
						slideshowSpeed: 7000,			
						slideshow: true,
						prevText: '<i class="fa fa-chevron-left"></i>',
						nextText: '<i class="fa fa-chevron-right"></i>',
						minItems:  getGridSize(),
						maxItems: getGridSize(),
						itemWidth: 174,
						itemMargin: 10,
						touch:true,
					});
				});	

				$window.resize(function() {
					var gridSize = getGridSize();
					flexslider.vars.minItems = gridSize;
					flexslider.vars.maxItems = gridSize;
				});												
            }());
			</script>
			<!-- flex slider container start -->
						
		<!-- flexslider container end -->
           </div>
         </div>
	<div class="wrap row">


<section id="content" class="large-9 small-12 columns">
                   
               <div id="post-168" class="hentry page publish post-1 odd author-templatic  post ">
				                    <section class="entry-content">
                 </section>
                    <!-- .entry-content -->
        </div>
          	<!-- .hentry -->

     <div class="hfeed">
			<div class="home_page_content">
			<div id="hybrid-nav-menu-1" class="widget nav-menu widget-nav-menu">
				<div class="widget-wrap widget-inside">
					<h3 class="widget-title">Featured Categories</h3>
					<div class="menu-home-page-category-container">
						<ul id="menu-home-page-category" class="nav-menu">
							<li id="menu-item-176" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-176" style="background-color:#305890; ">
								<a href="general_item_listing.php">
									<i class="fa fa-cube"></i>General</a>
							</li>
							<li id="menu-item-174" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-174" style="background-color:crimson ">
								<a href="property_listing.php">
									<i class="fa fa-building-o"></i>Property & Business</a>
							</li>
							<li id="menu-item-175" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-175" style="background-color:darkorange ">
								<a href="car_listing.php">
									<i class="fa fa-car"></i>Motor</a>
							</li>

							<li id="menu-item-181" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-181" style="background-color:#116011 ">
								<a href="job_listing.php">
									<i class="fa fa-briefcase"></i>Jobs</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

<?php
			include("include_parts/browse_category.php");
			include("include_parts/item_slider_index.php");
			?>
				
		  </div>
        </div>
     
  	<!-- .hfeed -->
	</section>
<!-- #content -->
<?php
include("include_parts/form_side_bar.php");
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
