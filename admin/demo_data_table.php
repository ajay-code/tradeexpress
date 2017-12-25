<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
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
 
<div class="col-md-12">
<div class="panel panel-visible" id="spy3">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Exportable Datatable
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Name</th>
<th class="va-m">Address line</th>
<th class="va-m">City</th>
<th class="hidden-xs va-m">State</th>
<th class="hidden-xs va-m">Phone</th>
<th class="va-m">Credit Limit</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Name</th>
<th>Address line</th>
<th>City</th>
<th class="hidden-xs">State</th>
<th class="hidden-xs">Phone</th>
<th>Credit Limit</th>
</tr>
</tfoot>
<tbody>
<tr>
<td>Jumbo Eagle</td>
<td>111 E Las Olivas Blvd</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1111</td>
<td>$10000</td>
</tr>
<tr>
<td>New Enterprises</td>
<td>9876 Main Street</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1112</td>
<td>$28322</td>
</tr>
<tr>
<td>Wren Computers</td>
<td>23 Red Albatros Drive</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1113</td>
<td>$372,000</td>
</tr>
<tr>
<td>Small Bill Co</td>
<td>123 South Drive</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1114</td>
<td>$2389</td>
</tr>
<tr>
<td>Bob Hosting</td>
<td>0444 Lake Road</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1115</td>
<td>$5168</td>
</tr>
<tr>
<td>Early CC</td>
<td>99 Flex Drive</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1116</td>
<td>$56656</td>
</tr>
<tr>
<td>John Valey Comp</td>
<td>123 Kelly Valey</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1117</td>
<td>$555</td>
</tr>
<tr>
<td>Big NetSys</td>
<td>45 444th Street</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1118</td>
<td>$2164</td>
</tr>
<tr>
<td>West Vally Inc.</td>
<td>12 West Vally</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1119</td>
<td>$54966</td>
</tr>
<tr>
<td>Zed Motor Co.</td>
<td>232 Michigan Ave</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1121</td>
<td>$73838</td>
</tr>
<tr>
<td>Big Auto Parts</td>
<td>123 South Drive</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1131</td>
<td>$100000</td>
</tr>
<tr>
<td>Old Media Co.</td>
<td>84 4999th Street</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1141</td>
<td>$5422</td>
</tr>
<tr>
<td>Yankee PC</td>
<td>499 34th Ave</td>
<td>Fort Lauderdale</td>
<td class="hidden-xs">FL</td>
<td class="hidden-xs">305-555-1151</td>
<td>$21615</td>
</tr>
</tbody>
</table>
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
//require_once("include/footer.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
