<?php
session_start();
require_once("function.php");
include_once("include/header.php");
if (isset($_GET["cus_id"]) || isset($_SESSION["ar_id"])) {
    ?>
<script>

$( document ).ready(function() {
    ajax_pagintn(1,10);
});
	
function ajax_pagintn(page,limit=10){
	var uploader='<?php if (isset($_GET["cus_id"])) {
        echo $_GET["cus_id"];
    } else {
        echo $_SESSION["ar_id"];
    } ?>';
	$.post(
	'ajax_general_selling_pagination.php?page='+page+'&limit='+limit+'&uploader='+uploader,
	{},
	function(r){
		$("#general_item_ajax").html(r);
	}
	);
}

$(document).ready(function(){
	$('#add-feed').on('click', function(){
		$('#feed-form').toggleClass('hide')
	})
})

</script>
<script>

$( document ).ready(function() {
    ajax_pagintn111(1,10);
});	
function ajax_pagintn111(page,limit=1){
	var uploader='<?php if (isset($_GET["cus_id"])) {
        echo $_GET["cus_id"];
    } else {
        echo $_SESSION["ar_id"];
    } ?>';
	$.post(
	'ajax_car_pagination.php?page='+page+'&limit='+limit+'&uploader='+uploader+'&status=0',
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

function ajax_pagintn1(page,limit=1){
	var uploader='<?php if (isset($_GET["cus_id"])) {
        echo $_GET["cus_id"];
    } else {
        echo $_SESSION["ar_id"];
    } ?>';
	$.post(
	'ajax_property_pagination.php?page='+page+'&limit='+limit+'&uploader='+uploader+'&status=0',
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
	
function ajax_pagintn11(page,limit=1){
	var uploader='<?php if (isset($_GET["cus_id"])) {
        echo $_GET["cus_id"];
    } else {
        echo $_SESSION["ar_id"];
    } ?>';
	$.post(
	'ajax_job_pagination.php?page='+page+'&limit='+limit+'&uploader='+uploader+'&status=0',
	{},
	function(r){
		$("#job_item_ajax").html(r);
	}
	);
}
$(document).ready(function(){
	<?php if (isset($_GET['for'])): ?>
		<?php if ($_GET['for'] == 'feedback'): ?>
			$('html, body').animate({
				scrollTop: $("#feedbacks").offset().top
			}, 2000);
		<?php elseif ($_GET['for'] == 'listing'): ?>
			$('html, body').animate({
				scrollTop: $("#listing").offset().top
			}, 2000);
		<?php endif; ?>
	<?php endif; ?>
});
</script>
<section id="main" class="clearfix">

<div class="wrap row">
<?php
if (!isset($_GET["cus_id"])) {
        $path_name=getCusName($_SESSION["ar_id"]);
    } else {
        $path_name=getCusName($_GET["cus_id"]);
    } ?>
<div class="breadcrumb breadcrumbs columns">
            <div class="breadcrumb-trail"><span class="trail-begin"><a href="index.php" title="Home" rel="home" class="trail-begin">Home</a></span>
			<span class="sep">&raquo;</span><span class="trail-begin"><a href="vendor_listing.php">Vendor</a></span>
			<span class="sep">&raquo;</span> <span class="trail-end"><?php echo $path_name; ?></span>
            </div>
</div>

<div id="update_ajax">
<section id="content" class="large-9 small-12 columns">
			
<div class="author_cont">
<?php
$select="ar_id,name,email,phone,landline,country,city,company,address,image,about,joined_on";
    $from="ambit_registration";
    if (!isset($_GET["cus_id"])) {
        $con=array("ar_id"=>$_SESSION["ar_id"]);
    } else {
        $con=array("ar_id"=>$_GET["cus_id"]);
    }
    $details=getDetails(doSelect($select, $from, $con));
    $details=trimmer_db_array($details);
    foreach ($details as $k3=>$v3) {
        ?>
		
					<!-- Author photo on left side start -->
		<div class="author_photo">
		<img src="customer_image/<?php echo $v3["image"]; ?>" alt="<?php echo $v3["name"]; ?>"  title="<?php echo $v3["name"]; ?>" />		
		</div>
		<!-- Author photo on left side end -->
		
		
		<!-- Author photo on right side start -->
		<div class="right_box">
			<h2><?php echo $v3["name"]; ?> 
			<?php 
            if (isset($_SESSION["ar_id"]) && $_SESSION["ar_id"]==$v3["ar_id"]) {
                ?>
			&nbsp &nbsp <a href="edit_profile.php"><i class="fa fa-pencil-square-o" title="Edit" style="cursor:pointer;"  aria-hidden="true"></i></a>
			<?php
            } ?>
			</h2>	
			
			<div class="user_dsb_cf">
<?php if ($_SESSION['ar_id'] == $_GET['ar_id']): ?>
				
						<div>
						<label>Company:</label>
						<span><a target="" ><?php echo $v3["company"]; ?></a>						</span>
						</div>
							<div>
						<label>Email:</label>
						<span><a target="" ><?php echo $v3["email"]; ?></a>						</span>
						</div>
						<div>
						<label>Phone:</label>
						<span><?php  echo $v3["phone"]; ?></span>
						</div>
<?php endif; ?>
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
<?php if ($_SESSION['ar_id'] == $_GET['ar_id']): ?>

				<div class="author_social_networks social_media">
	<ul class="social_media_list">
	<?php
    $facebook=get_facebook_cus($v3["ar_id"]);
        $twitter=get_twitter_cus($v3["ar_id"]);
        $google_plus=get_google_plus_cus($v3["ar_id"]);
        $linked_in=get_linked_in_cus($v3["ar_id"]); ?>
	   		    <?php
                if ($facebook!="") {
                    ?>
				<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" title="Facebook"></i></a></li>
				<?php
                } ?>
				<?php
                if ($twitter!="") {
                    ?>
				<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a></li>
				<?php
                } ?>
				<?php
                if ($google_plus!="") {
                    ?>
				<li><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fa fa-google-plus" title="Google Plus"></i></a></li>
				<?php
                } ?>
				<?php
                if ($linked_in!="") {
                    ?>
				<li><a href="<?php echo $linked_in; ?>" target="_blank"><i class="fa fa-linkedin" title="LinkedIn"></i></a></li>
				<?php
                } ?>
	</ul>
	</div>
<?php endif; ?>


		</div>
		<!-- Author photo on right side end -->
<?php if ($_SESSION['ar_id'] == $_GET['ar_id']): ?>
		
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
<td style="font-size: 15px;"><?php echo $v3["phone"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">E-mail</td>
<td style="font-size: 15px;"><?php echo $v3["email"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Landline</td>
<td style="font-size: 15px;"><?php echo $v3["landline"]; ?></td>
</tr>

</table>				
</div>
<?php endif ?>
<div>
<label style="font-size: 1.2em;">Author Biography:</label><br/>
<p style="text-align:justify;"><?php  echo $v3["about"]; ?></p>
</div>
<div>
<label id="feedbacks" class="pull-left" style="font-size: 1.2em;">Feedbacks:</label><br/> 
<?php
if (isset($_SESSION["ar_id"])) {
                    // if($_SESSION["ar_id"]!=$v3['ar_id']){
?>
<?php if (canAddFeedback()): ?>
<button class="pull-right button" style="margin-top: -30px;" id="add-feed">Add Feedback</button>
<?php endif; ?>

<?php //}}?>
<?php
                } ?>

<?php include('feedbacks.php'); ?>

</div>

		
</div>		


<?php
include("include_parts/item_list_under_profile.php"); ?>		 
<?php
    } ?>
</div><!-- END UPDATE AJAX -->

</section>
</div>
</section>
<!-- off-canvas-wrap end -->

<?php
} else {
        echo '<script>window.location="index.php";</script>';
    }
include_once("include/footer.php");
?>