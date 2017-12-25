<?php
session_start();
require_once("function.php");
$g='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
	$(document).ready(function() {
	$("#add_slide").on('submit',(function(e){  
$.ajax({
        	url: "ajax_add_slide.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
			alert(r);
			/*if(r==1){
				location.reload();
			}else{
				alert("Something went wrong !!!");
			}*/
		    },
		    error: function() 
	    	{
	    	}	        
	   });
}));
});

function update_link(id){
		$.post(
		"ajax_update_slide.php",
		{id:id},
		function(r){
			$("#ajax_form_div").html(r);
		           }
		);
}

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
		<div id="ajax">
			<section id="content" class="table-layout animated fadeIn">

			 
			<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">

<form method="POST" action="javascript:void(0);" name="add_slide" id="add_slide" enctype="multipart/form-data" >
<div id="ajax_form_div">
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #111668;">Add Slides
</div>
</div>
<div class="panel-body">


<div class="row">
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="slide_heading" id="slide_heading"  class="gui-input" placeholder="Slide Heading">
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
<input type="text"  name="slide_text" id="slide_text"  class="gui-input" placeholder="Slide Text">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<input type="hidden" name="type" id="type" value="2" />
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="file" name="upload" id="upload" class="gui-input" placeholder="Slide Image" required="">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<input type="hidden" name="action" value="add">

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<button type="submit" name="submit" class="btn btn-default btn-primary" value="Add">Add</button>
</div>
</div>

</form>
</div>
</div>
</div><!--  END AJAX FORM DIV  -->
	<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #111668;">Slides Listing
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">#ID</th>
<th class="va-m">Heading</th>
<th class="va-m">Text</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">#ID</th>
<th class="va-m">Heading</th>
<th class="va-m">Text</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</tfoot>
<?php
$query="select * from slides";
$details=getSlideDetails($query);
$details=trimmer_db_array($details);
?>
<tbody>
<?php
$i=1;
foreach($details as $k=>$v){
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $v["heading"]; ?></td>
<td><?php echo $v["text"]; ?></td>
<td class="hidden-xs">



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
	</header>
</section>


<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>	
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>