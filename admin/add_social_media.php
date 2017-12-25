<?php
session_start();
require_once("../function.php");
$j='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>

<script type="text/javascript">

$(document).ready(function() {
$("#add_link").on('submit',(function(e){  


$.ajax({
        	url: "ajax_add_link.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
			//alert(r);
			if(r==1){
				location.reload();
			}else{
				alert("Something went wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });

}));
});

function update_link(id){
	//alert(sidd);
		$.post(
		"ajax_update_link.php",
		{id:id},
		function(r){
			$("#ajax_form_div").html(r);
		           }
		);
}


function change_status(id){ 
	$.post(
		"ajax_suspend.php",
		{id:id,msg:"suspend_link"},
		function(r){		
			if(r==1){
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
}
$(document).ready(function() {
		
$('.myTarget').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
});

</script>

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
 
<div id="ajax">
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">

<form method="post" action="javascript:void(0);" id="add_link" enctype="multipart/form-data" >
<div id="ajax_form_div">
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #111668;">Add Social Link
</div>
</div>
<div class="panel-body">


<div class="row">
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="for_link" id="for_link"  class="gui-input" placeholder="For">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="link" id="link"  class="gui-input" placeholder="Social Media Link">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<input type="hidden" name="type" id="type" value="3" />
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary"   type="submit" name="submit" value="Add" >
</div>
</div>

</form>
</div>
</div>
</div><!--  END AJAX FORM DIV  -->



<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #111668;">Social Media Link Listing
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">#ID</th>
<th class="va-m">For</th>
<th class="va-m">Social Media Link</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">#ID</th>
<th class="va-m">For</th>
<th class="va-m">Social Media Link</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</tfoot>
<?php
$select="id,for_link,link,type,status";
$from="admin_website_link";
$con=array("type"=>3);
$details=getDetails(doSelect($select,$from,$con));
$details=trimmer_db_array($details);
?>
<tbody>
<?php
$i=1;
foreach($details as $k=>$v){
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $v["for_link"]; ?></td>
<td><?php echo $v["link"]; ?></td>
<td class="hidden-xs">
<?php
if($v["status"]==0){
?>
<img src="icon/suspend.png" style="cursor:pointer;"  data-toggle="tooltip" data-original-title="Suspend" width="19px;" />
<?php	
}else{
?>
<img src="icon/tick.png" style="cursor:pointer;"  data-toggle="tooltip" data-original-title="Approved"  width="19px;" />
<?php
}
?>


<img src="icon/change_status.png" style="cursor:pointer;" onclick="change_status('<?php echo $v["id"];  ?>');"   data-toggle="tooltip"  rel="tooltip"  <?php  if($v["status"]=="0"){ ?> data-original-title="Click Here To Approve" <?php }else{ ?> data-original-title="Click Here To Suspend" <?php } ?> width="22px;" /> &nbsp
<img src="icon/edit1.png" class="myTarget" style="cursor:pointer;" onclick="update_link('<?php echo $v["id"];  ?>');" data-toggle="tooltip" data-original-title="Update" width="20px;" />


</td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

</div> <!-- END AJAX DIV -->

<?php
require_once("include/footer1.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
