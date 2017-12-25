<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>

<script type="text/javascript">
function delete_hotel(aah_id){
	//alert(sidd);
	if(confirm("Are You Sure To delete Hotel ???")){
		$.post(
		"ajax_delete.php",
		{aah_id:aah_id,msg:"delete_hotel"},
		function(r){
			if(r==1){
				alert("Delete Successfully");
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
 
<div id="topbar-dropmenu-wrapper">
<div class="topbar-menu row">
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-danger">
<span class="fa fa-music"></span>
<span class="service-title">Audio</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-success">
<span class="fa fa-picture-o"></span>
<span class="service-title">Images</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-primary">
<span class="fa fa-video-camera"></span>
<span class="service-title">Videos</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-alert">
<span class="fa fa-envelope"></span>
<span class="service-title">Messages</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-system">
<span class="fa fa-cog"></span>
<span class="service-title">Settings</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-dark">
<span class="fa fa-user"></span>
<span class="service-title">Users</span>
</a>
</div>
</div>
</div>
 
 
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
 
<div class="panel" id="spy5">
<div class="panel-heading">
<span class="panel-title">Responsive Table</span>

</div>
<div class="panel-body pn">
<div class="table-responsive">
<div class="table-responsive">
<div class="bs-component">
<table class="table table-bordered mbn">
<thead>
<tr>
<th>#</th>
<th>Table heading</th>
<th>Table heading</th>
<th>Table heading</th>
<th>Table heading</th>
<th>Table heading</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Table cell</td>
<td>Table cell</td>
<td>Table cell</td>
<td>Table cell</td>
<td>Table cell</td>
</tr>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>


<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
 
</body>
</html>

<?php
require_once("include/footer.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
