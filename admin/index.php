<?php
session_start();
require_once("function.php");
$a="menu-open";
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php">Home</a>
</li>


</ol>
</div>

</header>
 
 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
 
<div class="row">
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/active.jpg" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="approve_travel_listing.php" style="text-decoration: none;"><h6 class="text-muted">ACTIVE GENERAL ITEMS</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_general_items",array("status"=>1)); ?></h2>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart3.png" width="127" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="suspend_travel_listing.php" style="text-decoration: none;"><h6 class="text-muted">PENDING GENERAL ITEMS</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_general_items",array("status"=>0)); ?></h2>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/active.jpg" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="approve_hotel.php" style="text-decoration: none;"><h6 class="text-muted">ACTIVE PROPERTY</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_property",array("status"=>1)); ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart3.png" width="127" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="suspend_hotel.php" style="text-decoration: none;"><h6 class="text-muted">PENDING PROPERTY</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_property",array("status"=>0)); ?></h2>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/active.jpg" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="approve_car_listing.php" style="text-decoration: none;"><h6 class="text-muted">ACTIVE JOB</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_job",array("status"=>1)); ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart3.png" width="127" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="suspend_car_listing.php" style="text-decoration: none;"><h6 class="text-muted">PENDING JOB</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_job",array("status"=>0)); ?></h2>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/active.jpg" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="approve_flight_listing.php" style="text-decoration: none;"><h6 class="text-muted">ACTIVE CAR MOTORCYCLE</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_car_motorcycle",array("status"=>1)); ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart3.png" width="127" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="suspend_flight_listing.php" style="text-decoration: none;"><h6 class="text-muted">PENDING CAR MOTORCYCLE</h6></a>

<h2 class="fs50 mt5 mbn"><?php echo seeMoreDetails("count(*)","add_car_motorcycle",array("status"=>0)); ?></h2>
</div>
</div>
</div>
</div>
</div>

</div>
 

</div>
<?php
require_once("include/footer.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
