<?php
session_start();
require_once("function.php");
$n='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function update_car_motorcycle(acm_id){
	$.post(
		"update_car_motorcycle.php",
		{acm_id:acm_id},
		function(r){
			$("#hidden_tooltip").hide();
		$("#hidden_tooltip1").hide();
			$("#ajax").html(r);
		}
		);
}

$(document).ready(function() {
$("#update_car_motorcycle").on('submit',(function(e){  
	$.ajax({
        	url: "update_car_motorcycle_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			var data=data.split("||");
			if(data[1].trim()==1){
				$("#ajax").html(data[0]);
				$("#ajax_fetch_form").show(1200);
			}else if(data[1].trim()=='finish'){
				alert("Item Updated Successfully");
				window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
			}else{
				alert("Something Went Wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });  

function delete_car_motorcycle(acm_id){
	//alert(sidd);
	if(confirm("Are You Sure To delete Item ???")){
		$.post(
		"ajax_delete.php",
		{acm_id:acm_id,msg:"delete_car_motorcycle"},
		function(r){
			if(r==1){
				alert("Item Deleted Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
	}
}

function change_status(acm_id)
{
	$.post(
		"ajax_suspend.php",
		{acm_id:acm_id,msg:"suspend_car_motorcycle_item"},
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
Car Motorcycle listing
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Title</th>
<th class="va-m">Brand Item</th>
<th class="va-m">Start price</th>
<th class="va-m">Posting Status</th>
<th class="hidden-xs va-m">Details</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">Title</th>
<th class="va-m">Brand Item</th>
<th class="va-m">Start price</th>
<th class="va-m">Posting Status</th>
<th class="hidden-xs va-m">Details</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</tfoot>
<?php
$select="acm_id,listing_title,brand_item,start_price,posting_status,status";
$from="add_car_motorcycle";
$condition=array();
$car_motorcycle_list=getDetails(doSelect1($select,$from,$condition));
?>
<tbody>
<?php
foreach($car_motorcycle_list as $k=>$v){
?>
<tr>
<td><?php echo $v["listing_title"]; ?></td>
<?php
if(trim($v["brand_item"])=='1'){
	$brand_item='Used';
}else{
	$brand_item='New';
}
?>
<td><?php echo $brand_item; ?></td>
<td><?php echo currency().$v["start_price"]; ?></td>
<?php
if(trim($v["posting_status"])=='0'){
	$posting_status='<font color="red">In-Complete</font>';
}else{
	$posting_status='<font color="blue">Complete</font>';
}
?>
<td><?php echo $posting_status; ?></td>
<td class="hidden-xs" style="color:blue;"><a href="car_motorcycle_details.php?id=<?php echo $v["acm_id"]; ?>" target="_blank" style="color: #15a6b7;"><span class="fa fa-info-circle fa-2x" data-toggle="tooltip" data-original-title="Details"></span></a></td>
<td class="hidden-xs" style="color: #2236a2;">

<?php
if($v["status"]==0){
?>
<span class="fa fa-times fa-2x" style="padding-right: 5px;"></span>
<?php	
}else{
?>
<span class="fa fa-check fa-2x"></span>
<?php
}
?>
&nbsp
<span class="fa fa-refresh" style="cursor:pointer;font-size: 1.6em;" onclick="change_status('<?php echo $v["acm_id"];  ?>');"   data-toggle="tooltip"  rel="tooltip"  <?php  if($v["status"]=="0"){ ?> data-original-title="Click Here To Approve" <?php }else{ ?> data-original-title="Click Here To Suspend" <?php } ?> ></span>
&nbsp
<span class="fa fa-pencil-square-o" style="cursor:pointer;font-size: 1.6em;" onclick="update_car_motorcycle('<?php echo $v["acm_id"];  ?>');" data-toggle="tooltip" rel="tooltip" data-original-title="Edit"></span>
<a href="car_motorcycle_gallery.php?id=<?php echo $v["acm_id"];  ?>" target="_blank"  style="color: #2236a2;"    data-toggle="tooltip"  data-original-title="Show Gallery"  /><span class="fa fa-picture-o " style="font-size:1.6em;"></span></a>
<span class="fa fa-trash-o fa-2x"  style="cursor:pointer;" onclick="delete_car_motorcycle('<?php echo $v["acm_id"];  ?>');" data-toggle="tooltip" data-original-title="Delete"></span>

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
