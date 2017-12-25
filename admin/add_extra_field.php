<?php
session_start();
require_once("function.php");
$k='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function fetch_subcat(id,id1){
		var gic_id=$("#"+id1).val();
		//alert(gic_id);
		if(gic_id.trim() !='0'){
		$.ajax({
			url:'fetch_subcat.php?gic_id='+gic_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#"+id).html(response);
			}
		});
		}else{
			$("#"+id).html("");
		}
	}


function fetch_form(id,ajax_id){
	var field_type=$("#"+id).val();
	$.post(
	"ajax_extra_field_form.php",
	{field_type:field_type,ajax_id:ajax_id+'1'},
	function(r){
		//alert(r);
		$("#"+ajax_id).html(r);
		$("#"+ajax_id).show(500);
	}
	);
}

function get_dropdown_option(id,field_type,ajax_id){
	var option_number=$("#"+id).val();
	$.post(
	"ajax_extra_field_form.php",
	{option_number:option_number,type:field_type},
	function(r){
		//alert(r);
		$("#"+ajax_id).html(r);
		$("#"+ajax_id).show(500);
	}
	);
}


$(document).ready(function() {
$("#add_category_extra_field").on('submit',(function(e){

	$.ajax({
        	url: "ajax_add_general_item_extra_field.php?type=dropdown",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				location.reload();
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

$(document).ready(function() {
$("#add_sub_category_extra_field").on('submit',(function(e){  
	$.ajax({
        	url: "ajax_add_general_item_extra_field.php?type=dropdown",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				location.reload();
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

$(document).ready(function() {
$("#add_sub_sub_category_extra_field").on('submit',(function(e){  
	$.ajax({
        	url: "ajax_add_general_item_extra_field.php?type=dropdown",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				location.reload();
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
	  
$(document).ready(function() {
$("#add_sub_sub_sub_category_extra_field").on('submit',(function(e){  
	$.ajax({
        	url: "ajax_add_general_item_extra_field.php?type=dropdown",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				location.reload();
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
</script>




<section id="content_wrapper">
 
<header id="topbar" class="alt">

</header>
 
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="javascript:void(0);">Add General Item Extra Field</a>
</li>
</ol>
</div>
</div>
</div>
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Category Extra Field
</div>
</div>


<div class="panel-body">
<form  method="post" action="javascript:void(0);" id="add_category_extra_field" >

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat1" name="gic_id" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select  name="extra_field_type" id="extra_field_type1" onchange="fetch_form('extra_field_type1','ajax_form1');">
<option value="0">Select Field Type</option>
<option value="1">Dropdown</option>
<option value="2">CheckBox</option>
<option value="3">Text Box</option>
<option value="4">Textarea</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_form1" style="display:none;" >
</div>

<div id="ajax_form11" style="display:none;">
</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>





<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Sub-Category Extra Field
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_sub_category_extra_field" enctype="multipart/form-data">

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat2"  onchange="fetch_subcat('sub_cat2','cat2');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat2" name="gic_id" >
<option value="0">Select Sub-Category</option>

</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select  name="extra_field_type" id="extra_field_type2" onchange="fetch_form('extra_field_type2','ajax_form2');">
<option value="0">Select Field Type</option>
<option value="1">Dropdown</option>
<option value="2">CheckBox</option>
<option value="3">Text Box</option>
<option value="4">Textarea</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_form2" style="display:none;">
</div>

<div id="ajax_form21" style="display:none;">
</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>

</form>
</div>
</div>





<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Sub Sub-Category Extra Field
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_sub_sub_category_extra_field" enctype="multipart/form-data">

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat3"  onchange="fetch_subcat('sub_cat3','cat3');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat3"  onchange="fetch_subcat('sub_sub_cat3','sub_cat3');"  >
<option value="0">Select Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_cat3" name="gic_id" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select  name="extra_field_type" id="extra_field_type3" onchange="fetch_form('extra_field_type3','ajax_form3');">
<option value="0">Select Field Type</option>
<option value="1">Dropdown</option>
<option value="2">CheckBox</option>
<option value="3">Text Box</option>
<option value="4">Textarea</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_form3" style="display:none;">
</div>

<div id="ajax_form31" style="display:none;">
</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>

</form>
</div>
</div>


<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Sub Sub Sub-Category Extra Field
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_sub_sub_sub_category_extra_field" enctype="multipart/form-data">

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat4"  onchange="fetch_subcat('sub_cat4','cat4');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat4"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  >
<option value="0">Select Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_cat4" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_sub_cat5" name="gic_id" >
<option value="0">Select Sub Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select  name="extra_field_type" id="extra_field_type4" onchange="fetch_form('extra_field_type4','ajax_form4');">
<option value="0">Select Field Type</option>
<option value="1">Dropdown</option>
<option value="2">CheckBox</option>
<option value="3">Text Box</option>
<option value="4">Textarea</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="ajax_form4" style="display:none;">
</div>

<div id="ajax_form41" style="display:none;">
</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>

</form>
</div>
</div>


</div>
</div>
</div>
 
</section>
 
</section>
 
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
 
 
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
