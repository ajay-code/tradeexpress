<?php
session_start();
require_once("function.php");
$m='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}
	function add_category_validation(){
	var category=$("#add_category").val();
	no_border("add_category");
	if(category.trim()==""){
		alert("Please Type Your category Name");
		//$("#add_country").focus();
		error_border('add_category');
		return false;
	}
	$.post(
		"ajax_add_update_job_cat.php",
		{category:category,msg:'add_category'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Category added successfully");
			}
			//$("#ajax").html(r[2]);
			location.reload();
		}
		);
	}

function update_category_validation(){
	//alert("sidd");
	var category=$("#update_category").val();
	no_border('update_category');
	if(category==0){
		alert("Please Select Category");
		error_border('update_category');
		return false;
	}
	
	var new_category=$("#new_category").val();

	if(new_category.trim()==""){
	alert("Please Type Category Name");
	error_border('new_category');
	return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:category,category:new_category,msg:'update_category'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Category updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_category_validation()
{
	var jc_id=$("#delete_category_field").val();
	no_border('delete_category_field');
	if(jc_id==0){
		alert("Please select Category");
		error_border('delete_category_field');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,msg:'delete_category'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Category deleted successfully");
	}
	location.reload();
	}
	);
}

function add_subcat_validation(){
	var jc_id=$("#category_id").val();
	no_border('category_id');
	if(jc_id==0){
		alert("Please select Category");
		error_border('category_id');
		return false;
	}
	var category=$("#add_subCat").val();
	if(category.trim()==""){
		alert("Please type Sub Category name");
		error_border('add_subCat');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,category:category,msg:'add_sub_cat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub Category added successfully");
	}
	location.reload();
	}
	);

}

function update_subcat_validation(){
	var jc_id=$("#update_field").val();
	no_border('update_field');
	if(jc_id==0){
		alert("Please select category");
		error_border('update_field');
		return false;
	}
	var jc_id=$("#subcat_update").val();
	if(jc_id==0){
		alert("Please select Sub category");
		error_border('subcat_update');
		return false;
	}
	var category=$("#update_subcat").val();
	if(category.trim()==""){
		alert("Please Type Sub Category");
		error_border('update_subcat');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,category:category,msg:'update_subcat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub category updated successfully");
	}
	location.reload();
	}
	);
}

function delete_subcat_validation(){
	var jc_id=$("#delete_field").val();
	no_border('delete_field');
	if(jc_id==0){
		alert("Please select Category");
		error_border('delete_field');
		return false;
	}
	var jc_id=$("#subcat_delete").val();
	if(jc_id==0){
		alert("Please select Sub Category");
		error_border('subcat_delete');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,msg:'delete_subcat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub Category deleted successfully");
	}
	location.reload();
	}
	);

}


function add_sub_subcat_validation(){
	var jc_id=$("#add_field1").val();
	no_border('add_field1');
	if(jc_id==0){
		alert("Please select Category");
		error_border('add_field1');
		return false;
	}
	var jc_id=$("#add_subcat1").val();
	if(jc_id.trim()=="0"){
		alert("Please Select Sub Category");
		error_border('add_subcat1');
		return false;
	}
	
	var category=$("#add_sub_sub_cat").val();
	if(category.trim()==""){
		alert("Please Type Sub Sub Category");
		error_border('add_sub_sub_cat');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,category:category,msg:'add_sub_sub_cat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub Sub Category added successfully");
	}
	location.reload();
	}
	);

}

function update_sub_subcat_validation(){
	var jc_id=$("#update_field1").val();
	no_border('update_field1');
	if(jc_id==0){
		alert("Please select Category");
		error_border('update_field1');
		return false;
	}
	var jc_id=$("#update_subcat1").val();
	if(jc_id.trim()=="0"){
		alert("Please Select Sub Category");
		error_border('update_subcat1');
		return false;
	}
	var jc_id=$("#update_sub_subcat1").val();
	if(jc_id.trim()=="0"){
		alert("Please Select Sub Sub Category");
		error_border('update_sub_subcat1');
		return false;
	}
	
	var category=$("#new_sub_sub_cat").val();
	if(category.trim()==""){
		alert("Please Type Sub Sub Category");
		error_border('new_sub_sub_cat');
		return false;
	}
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,category:category,msg:'update_sub_sub_cat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub Sub Category added successfully");
	}
	location.reload();
	}
	);

}

function delete_sub_subcat_validation(){
	var jc_id=$("#delete_field1").val();
	no_border('delete_field1');
	if(jc_id==0){
		alert("Please select Category");
		error_border('delete_field1');
		return false;
	}
	var jc_id=$("#delete_subcat1").val();
	if(jc_id.trim()=="0"){
		alert("Please Select Sub Category");
		error_border('delete_subcat1');
		return false;
	}
	var jc_id=$("#delete_sub_subcat1").val();
	if(jc_id.trim()=="0"){
		alert("Please Select Sub Sub Category");
		error_border('delete_subcat1');
		return false;
	}
	
	$.post(
	"ajax_add_update_job_cat.php",
	{jc_id:jc_id,msg:'delete_sub_sub_cat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Sub Sub Category added successfully");
	}
	location.reload();
	}
	);

}


function fetch_subcat(id,id1){
		var jc_id=$("#"+id1).val();
		//alert(jc_id);
		if(jc_id.trim() !='0'){
		$.ajax({
			url:'fetch_job_subcat.php?jc_id='+jc_id,
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

</script>

<section id="content_wrapper">
 
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
<a href="javascript:void(0);">Job Category</a>
</li>
</ol>
</div>
</div>
</div>
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-12">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text" name="category" id="add_category" class="gui-input" placeholder="Enter Category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_category_validation();" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>

<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="update_category">
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<label class="field prepend-icon">
<input type="text"  id="new_category" class="gui-input" placeholder="Enter Category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="update_category_validation();" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Delete Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select  id="delete_category_field">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="delete_category_validation();" type="submit" name="submit" value="Delete" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="category_id">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<label class="field prepend-icon">
<input type="text"  id="add_subCat" class="gui-input" placeholder="Enter Sub-category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_subcat_validation();" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="update_field" onchange="fetch_subcat('subcat_update','update_field');">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<select name="subcat_update" id="subcat_update">
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
<label class="field prepend-icon">
<input type="text"  id="update_subcat" class="gui-input" placeholder="Enter Sub-category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="update_subcat_validation();" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Delete Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="delete_field" onchange="fetch_subcat('subcat_delete','delete_field');">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<select  id="subcat_delete">
<option value="0">Select Sub category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="delete_subcat_validation();" type="submit" name="submit" value="Delete" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Sub Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="add_field1" onchange="fetch_subcat('add_subcat1','add_field1');">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<select name="add_subcat1" id="add_subcat1">
<option value="0">Select Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<input type="text"  id="add_sub_sub_cat" class="gui-input" placeholder="Enter Sub-Sub-category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_sub_subcat_validation();" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>





<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Sub Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="update_field1" id="update_field1" onchange="fetch_subcat('update_subcat1','update_field1');">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<select name="update_subcat1" id="update_subcat1" onchange="fetch_subcat('update_sub_subcat1','update_subcat1');">
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
<select name="update_sub_subcat1" id="update_sub_subcat1">
<option value="0">Select Sub Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field prepend-icon">
<input type="text"  id="new_sub_sub_cat" class="gui-input" placeholder="Enter Sub-Sub-category Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="update_sub_subcat_validation();" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
</div>
</div>





<div class="panel">
<div class="panel-heading">
<div class="panel-title">Delete Sub Sub Category
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="delete_field1" id="delete_field1" onchange="fetch_subcat('delete_subcat1','delete_field1');">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["jc_id"]; ?>" >
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
<select name="delete_subcat1" id="delete_subcat1" onchange="fetch_subcat('delete_sub_subcat1','delete_subcat1');">
<option value="0">Select Sub Category</option>
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
<select name="delete_sub_subcat1" id="delete_sub_subcat1">
<option value="0">Select Sub Sub Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="delete_sub_subcat_validation();" type="submit" name="submit" value="Delete" >
</div>
</div>
</form>
</div>
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
