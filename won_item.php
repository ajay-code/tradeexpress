<?php 
session_start(); 
require_once( "function.php"); 
include_once( "include/header.php"); 
if(isset($_SESSION[ "ar_id"])){ 
?>

<script>
$( document ).ready(function() {
	/* var info='<?php if(isset($_SESSION["page_info"])) { echo trim($_SESSION["page_info"]); unset($_SESSION["page_info"]);  } else {echo '';}  ?>';
	if(info.trim()!=""){
	requir ed_alert('<font color="yellow">'+info+'</font>','bottom-full-width','error','5000','true');
	} */
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	$.post(
	'ajax_won_pagination.php?page='+page+'&feedback=true&limit='+limit,
	{},
	function(r){
		$("#table_data").html(r);
	}
	);
}
</script>


<section id="main" class="clearfix">

    <div class="wrap row">

<div class="breadcrumb breadcrumbs columns">
	<div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Classifieds" rel="home" class="trail-begin">Home</a></span>
	<span class="sep">&raquo;</span> <span class="trail-end">Won</span>
	</div>
</div>
<section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    
						  
					
					
					 <h1 class='page-title entry-title'>You have won</h1>
					<section class="entry-content">
                        <div class="" id="table_data">
								
						</div>

					</section>	  
					  
						  
						  
					    </div>
					<!-- .hentry -->
				</div>
	<!-- .hfeed -->
</section>
<!-- #content -->
<?php
include("include_parts/form_side_bar.php");
?>
</div>
<!-- .wrap -->

<!-- #main -->
<a class="exit-off-canvas "></a> <!-- exit-off-canvas - overlay to exit offcanvas -->
<a class="exit-selection "></a>
<div class="exit-sorting "></div>

<!-- #container -->

  </div> <!-- inner-wrap start -->
</div> <!-- off-canvas-wrap end -->

<?php
}else{
echo '<script>window.location="login.php ";</script>';
}
include_once("include/footer.php");
?>