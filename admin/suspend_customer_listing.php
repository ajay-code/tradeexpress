<?php
session_start();
require_once("function.php");
$o='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">


function delete_customer(ar_id){
	//alert(sidd);
	if(confirm("Are You Sure To delete Customer ???")){
		$.post(
		"ajax_delete.php",
		{ar_id:ar_id,msg:"delete_customer"},
		function(r){
			if(r==1){
				alert("Customer Deleted Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
	}
}

function change_status(ar_id)
{
	$.post(
		"ajax_suspend.php",
		{ar_id:ar_id,msg:"suspend_customer"},
		function(r){
		
			if(r==1){
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
}
</script>
<section id="content_wrapper">
 
 
 
<header id="topbar" class="alt">


</header>
 
<form method="post" action="javascript:void(0);" id="update_car_motorcycle" enctype="multipart/form-data">
<div id="ajax">

<section id="content" class="table-layout animated fadeIn">
 
<div class="col-md-12">
<div class="panel panel-visible" id="spy3">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Suspend Customer listing
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Image</th>
<th class="va-m">Name</th>
<th class="hidden-xs va-m">Country</th>
<th class="hidden-xs va-m">city</th>
<th class="va-m">Details</th>
<th class="va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">Image</th>
<th class="va-m">Name</th>
<th class="hidden-xs va-m">Country</th>
<th class="hidden-xs va-m">city</th>
<th class="va-m">Details</th>
<th class="va-m">Action</th>
</tr>
</tfoot>
<?php
$select="ar_id,image,name,country,city,status";
$from="ambit_registration";
$condition=array("status"=>0);
$customer_list=getDetails(doSelect1($select,$from,$condition));
?>
<tbody>
<?php
foreach($customer_list as $k=>$v){
?>
<tr>
<td><img src="../customer_image/<?php echo $v["image"]; ?>" width="40px" ></td>
<td><?php echo $v["name"]; ?></td>
<td class="hidden-xs"><?php echo getCountryName($v["country"]); ?></td>
<td class="hidden-xs"><?php echo getCityName($v["city"]); ?></td>
<td class="" style="color:blue;"><a href="customer_details.php?id=<?php echo $v["ar_id"]; ?>" target="_blank" style="color: #15a6b7;"><span class="fa fa-info-circle fa-2x" data-toggle="tooltip" data-original-title="Details"></span></a></td>
<td class="" style="color: #2236a2;">

<?php
if($v["status"]==0){
?>
<span class="fa fa-times fa-2x"></span>
<?php	
}else{
?>
<span class="fa fa-check fa-2x"></span>
<?php
}
?>
&nbsp
<span class="fa fa-refresh" style="cursor:pointer;font-size: 1.6em;" onclick="change_status('<?php echo $v["ar_id"];  ?>');"   data-toggle="tooltip"  rel="tooltip"  <?php  if($v["status"]=="0"){ ?> data-original-title="Click Here To Approve" <?php }else{ ?> data-original-title="Click Here To Suspend" <?php } ?> ></span>
&nbsp
<span class="fa fa-trash-o fa-2x"  style="cursor:pointer;" onclick="delete_customer('<?php echo $v["ar_id"];  ?>');" data-toggle="tooltip" data-original-title="Delete"></span>
</td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
<?php
require_once("include/footer2.php");
?>
</div> <!-- END AJAX DIV -->
</form>
</section>
<?php
require_once("include/footer3.php");
?>
<?php
//require_once("include/footer1.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
