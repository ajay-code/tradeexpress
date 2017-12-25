		<aside id="sidebar-primary" class="sidebar large-3 small-12 columns">
	  <div id="tevolution_author_listing-2" class="widget widget-twocolumn tevolution_author_listing"><div class="widget-wrap widget-inside">            
            <h3 class="widget-title">Top authors</h3>            <ul class="featured_agent_list">
<?php
$select="ar_id,name,joined_on,image";
$from="ambit_registration";
$con=array();
if(isset($v3["ar_id"])){
$con=array("ar_id !"=>$v3["ar_id"]);
}
$details1=getDetails(doSelect($select,$from,$con,' ORDER BY rand() LIMIT 5'));
$details1=trimmer_db_array($details1);
foreach($details1 as $k5=>$v5){
?>
							<li class="clearfix">
									<a href="profile_details.php?cus_id=<?php echo $v5["ar_id"]; ?>">
								  <img src="customer_image/<?php echo $v5["image"]; ?>" alt="<?php  echo 'No Image'; ?>" title="<?php  echo $v5["name"]; ?>"  width="60"/></a> 
						   
								<div class="author_info">
									<p class="title"><a href="profile_details.php?cus_id=<?php echo $v5["ar_id"]; ?>"><?php  echo $v5["name"]; ?> </a></p>
									<p class="post-count"><label>Submitted: </label><?php  echo total_submission_by_cus($v5["ar_id"]); ?> </p>
									<p class="post-count"><label>Joined: </label><?php  echo get_date_str($v5["joined_on"]); ?> </p>
																	</div>
							</li>
<?php
}
?>
					        </ul></div></div>
<?php
include("include_parts/admin_social_media_link.php");
?>							
<div id="templatic_browse_by_categories-5" class="widget browse_by_categories">
<div class="widget-wrap widget-inside">

<?php
include("include_parts/filter_sidebar_category.php");
?>
</div></div>	
</aside>