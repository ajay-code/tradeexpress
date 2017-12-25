<?php
session_start();
$m='menu-open';
$condition=array();
if(isset($_GET["id"])){
$job_id=$_GET["id"];
$condition=array("aj_id"=>$job_id);
}
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header_gallery.php");
?>

 

<script type="text/javascript">

function approval_job_photo(ajp_id){
		$.post(
		"ajax_suspend.php",
		{ajp_id:ajp_id,msg:"approval_job_image"},
		function(r){
			if(r==1){
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		       });
		}

function delete_job_photo(ajp_id){
		//alert("sidd");
		if(confirm("Are You Sure To delete Image ???")){
		$.post(
		"ajax_delete.php",
		{ajp_id:ajp_id,msg:"delete_job_image"},
		function(r){
			if(r==1){
				alert("Image Delete Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
	}
	}

</script>


<section id="content_wrapper">
<header id="topbar" class="alt">
</header>
<div class="chute chute-center">


<div class="chute chute-center col-sm-12 col-xl-3" >
<div class="mh15 pv15 br-b br-light">
<div class="row" >
<div class="col-xs-7">
<div class="mixitup-controls ib">
<form class="controls" id="select-filters">
<div class="btn-group ib mr10">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-folder"></span>
</button>
<div class="btn-group mb5">
<fieldset>
<select id="filter1"  >
<option value="">All Photo</option>
<option value=".folder2">Approved Image</option>
<option value=".folder3">Suspend Image</option>

</select>
</fieldset>
</div>
</div>

<div class="btn-group ib mr10 mb5">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-tag"></span>
</button>
<div class="btn-group">
<fieldset>
<select id="filter2" disabled>
<option value="">
<?php
if(isset($job_id)){ 
echo getJobTitle($job_id);  
}else{
	echo 'ALL JOB PHOTOS';
}
?>	

</option>
<option value=".label1"></option>
</select>
</fieldset>
</div>
</div>

</form>
</div>
</div>


<div class="col-xs-5 text-right">

<div class="btn-group mb5">
<button type="button" class="btn btn-default to-grid">
<span class="fa fa-th"></span>
</button>
<button type="button" class="btn btn-default to-list">
<span class="fa fa-navicon"></span>
</button>
</div>
</div>
</div>
<div class="mixitup-controls hidden">
<form class="controls allcp-form" id="checkbox-filters">
<fieldset class="">
<h4>Cars</h4>
<label class="option block mt10">
<input type="checkbox" value=".circle">
<span class="checkbox"></span>Circle
</label>
</fieldset>
<button id="mixitup-reset2">Clear All</button>
</form>
</div>
</div>
<div id="mixitup-container" >
<div class="filter-error-message">
<span>No items were found matching the selected filters</span>
</div>
<?php
$where=array("status"=>1);
$where=array_merge($where,$condition);
$job_approved_photo=getDetails(doSelect1("ajp_id,aj_id,image,status","add_job_photo",$where));


foreach($job_approved_photo as $k=>$v){
?>

 <div class="mix folder2">
<div class="panel p6 pbn">
<div class="of-h">
<img src="../job_image/<?php echo $v["image"];  ?>" class="img-responsive" title=""  width="200" height="200">
<div class="row table-layout">
<div class="col-xs-4 va-m pln" style="color:red;">
<span class="fa fa-trash-o fs20"  onclick="delete_job_photo('<?php echo $v["ajp_id"];  ?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="cursor:pointer; color: red;"></span>
</div>
<div class="col-xs-4 va-m pln" style="color:red;">
<span class="fa fa-pause fs20" onclick="approval_job_photo('<?php echo $v["ajp_id"];  ?>');" data-toggle="tooltip" title="To Suspend Click Here"  style="cursor:pointer; color: #783a3a;"></span>
</div>  
<div class="col-xs-4 text-right va-m prn">
<span style="cursor:pointer;"  data-toggle="tooltip"  title="<?php if($v["status"]==0)echo getJobTitle($v["aj_id"]).' Not Approved ';else echo getJobTitle($v["aj_id"]).' is Approved';  ?> " class="fa fa-circle fs10 <?php if($v["status"]==0){echo ' text-danger ';}else { echo 'text-info';  }  ?> ml10"></span>
<!-- text-danger for red icon -->
</div>
</div>
</div>
</div>
</div>

<?php
}
?>

<?php
$where=array("status"=>0);
$where=array_merge($where,$condition);
$job_suspend_photo=getDetails(doSelect1("ajp_id,aj_id,image,status","add_job_photo",$where));


foreach($job_suspend_photo as $k=>$v){
?>

 <div class="mix folder3">
<div class="panel p6 pbn">
<div class="of-h">
<img src="../job_image/<?php echo $v["image"];  ?>" class="img-responsive" title=""  width="200" height="200">
<div class="row table-layout">
<div class="col-xs-4 va-m pln" style="color:red;">
<span class="fa fa-trash-o fs20"  onclick="delete_job_photo('<?php echo $v["ajp_id"];  ?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="cursor:pointer; color: red;"></span>
</div>
<div class="col-xs-4 va-m pln" style="color:red;">
<span class="fa fa-play-circle fs20" onclick="approval_job_photo('<?php echo $v["ajp_id"];  ?>');" data-toggle="tooltip" title="To Approve Click Here"  style="cursor:pointer;color: #3151c0;"></span>
</div> 
<div class="col-xs-4 text-right va-m prn">
<!-- text-danger for red icon -->
<span style="cursor:pointer;"  data-toggle="tooltip"  title="<?php if($v["status"]==0)echo getJobTitle($v["aj_id"]).' Not Approved ';else echo getJobTitle($v["aj_id"]).' is Approved';  ?> " class="fa fa-circle fs10 <?php if($v["status"]==0){echo ' text-danger ';}else { echo 'text-info';  }  ?> ml10"></span>
</div>
</div>
</div>
</div>
</div>

<?php
}
?>
</div>
</div>
</div>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/plugins/mixitup/jquery.mixitup.min.js"></script>
 
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
<script src="assets/js/plugins/fileupload/fileupload.js"></script>
<script src="assets/js/plugins/holder/holder.min.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/basic-gallery.js"></script>
 
</body>
</html> 
<?php
//require_once("include/footer1.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}

?>
