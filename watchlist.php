<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if(isset($_SESSION["ar_id"]) && $_SESSION["ar_id"] != ""){
?>
<script>

$( document ).ready(function() {
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	
	$.post(
	'ajax_general_watchlist.php?page='+page+'&watchlist=true&limit='+limit,
	{},
	function(r){
		$("#general_item_ajax").html(r);
	}
	);
}
</script>
<script>

$( document ).ready(function() {
    ajax_pagintn111(1,10);
});	
function ajax_pagintn111(page,limit=10){
	$.post(
	'ajax_car_watchlist.php?page='+page+'&limit='+limit,
	{},
	function(r){
		$("#car_item_ajax").html(r);
	}
	);
}
</script>
<script>
$( document ).ready(function() {
    ajax_pagintn1(1,10);
});

function ajax_pagintn1(page,limit=10){
	$.post(
	'ajax_property_watchlist.php?page='+page+'&limit='+limit,
	{},
	function(r){
		$("#property_item_ajax").html(r);
	}
	);
}
</script>
<script>
$( document ).ready(function() {
    ajax_pagintn11(1,10);
});
	
function ajax_pagintn11(page,limit=10){
	$.post(
	'ajax_job_watchlist.php?page='+page+'&limit='+limit,
	{},
	function(r){
		$("#job_item_ajax").html(r);
	}
	);
}
</script>
<section id="main" class="clearfix">

<div class="wrap row">

<div class="breadcrumb breadcrumbs columns"><div class="breadcrumb-trail"><span class="trail-begin"><a href="//demo.templatic.com/classifieds" title="Classifieds" rel="home" class="trail-begin">Home</a></span> <span class="sep">&raquo;</span> <span class="trail-end">Russell West</span></div></div>	<section id="content" class="large-9 small-12 columns">
			
		<div class="author_cont">
<?php
$select="ar_id,name,email,phone,landline,country,city,company,address,image,about,joined_on";
$from="ambit_registration";
$con=array("ar_id"=>$_SESSION["ar_id"]);	

$details=getDetails(doSelect($select,$from,$con));
$details=trimmer_db_array($details);
foreach($details as $k3=>$v3){
		?>
		
					<!-- Author photo on left side start -->
		<div class="author_photo">
		<img src="customer_image/<?php echo $v3["image"]; ?>" alt="Russell West"  title="Russell West" />		
		</div>
		<!-- Author photo on left side end -->
		
		
		<!-- Author photo on right side start -->
		<div class="right_box">
			<h2><?php echo $v3["name"]; ?></h2>	
			
			<div class="user_dsb_cf">
							<div>
						<label>Company:</label>
						<span><a target="" ><?php echo $v3["company"];  ?></a>						</span>
						</div>
							<div>
						<label>Email:</label>
						<span><a target="" ><?php echo $v3["email"];  ?></a>						</span>
						</div>
						<div>
						<label>Phone:</label>
						<span><?php  echo $v3["phone"]; ?></span>
						</div>
						<div>
						<label>Joined On:</label>
						<span><?php  echo get_date_str($v3["joined_on"]); ?></span>
						</div>
						
			<p>
			<label>Total Submissions: </label><span class="i_agent_others"> <b><?php  echo total_submission_by_cus($v3["ar_id"]); ?></b></span>
			</p>
				</div>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
				<div class="author_social_networks social_media">
	<ul class="social_media_list">
	<?php
	$facebook=get_facebook_cus($_SESSION["ar_id"]);
	$twitter=get_twitter_cus($_SESSION["ar_id"]);
	$google_plus=get_google_plus_cus($_SESSION["ar_id"]);
	$linked_in=get_linked_in_cus($_SESSION["ar_id"]);
	?>
	   		    <?php
				if($facebook!=""){
				?>
				<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" title="Facebook"></i></a></li>
				<?php
				}
				?>
				<?php
				if($twitter!=""){
				?>
				<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a></li>
				<?php
				}
				?>
				<?php
				if($google_plus!=""){
				?>
				<li><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fa fa-google-plus" title="Google Plus"></i></a></li>
				<?php
				}
				?>
				<?php
				if($linked_in!=""){
				?>
				<li><a href="<?php echo $linked_in; ?>" target="_blank"><i class="fa fa-linkedin" title="LinkedIn"></i></a></li>
				<?php
				}
				?>
	</ul>
	</div>

		</div>
		<!-- Author photo on right side end -->
<div>
		<label style="font-size: 1.2em;">Contact Details:</label><br/>
						
<table class="table table-bordered mbn fixed" style="border-collapse: separate;">
<col width="50%" />
<col width="50%" />

<tr>
<td style="font-size: 15px;">Address</td>
<td style="font-size: 15px;"><?php  echo $v3["address"].', '.getCityName($v3["city"]).' ('.getCountryName($v3["country"]).')'; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Phone</td>
<td style="font-size: 15px;"><?php echo $v3["phone"];  ?></td>
</tr>
<tr>
<td style="font-size: 15px;">E-mail</td>
<td style="font-size: 15px;"><?php echo $v3["email"];  ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Landline</td>
<td style="font-size: 15px;"><?php echo $v3["landline"];  ?></td>
</tr>

</table>				
</div>
<div>
<label style="font-size: 1.2em;">Watchlist</label><br/>
</div>		

<?php
include("include_parts/item_list_under_profile.php");

?>		 
<?php
}
?>
<!-- off-canvas-wrap end -->

<?php
}else{
	$_SESSION["target_path"]=$_SERVER['REQUEST_URI'];
	echo '<script>window.location="login.php";</script>';
}
include_once("include/footer.php");
?>