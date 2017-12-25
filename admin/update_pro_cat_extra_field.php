<?php
session_start();
require_once("function.php");
$l='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function fetch_subcat(id,id1){
		var pc_id=$("#"+id1).val();
		if(pc_id.trim() !='0'){
		$.ajax({
			url:'fetch_property_subcat.php?pc_id='+pc_id,
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

function fetch_field(cat_id,ajax_id){
	var pc_id=$("#"+cat_id).val();
	//alert(gic_id);
	$.post(
	"ajax_updt_pro_xtra_fld_form.php",
	{pc_id:pc_id},
	function(r){
		//alert(r);
		$("#"+ajax_id).html(r);
	}
	);
		
}



function update_field(pcef_id,type){
	//alert(pcef_id);
	var label_name=$("#label_name"+pcef_id).val();
	var field_name=$("#field_name"+pcef_id).val();
	$.post(
	"ajax_updt_proprty_extra_field.php",
	{pcef_id:pcef_id,label_name:label_name,field_name:field_name,type:type},
	function(r){
		if(r==1){
		location.reload();
		}else{
		alert("Somthing went wrong !!!");
		}
	}
	);
}

function update_field_drodown(pcef_id,type){
	//alert(pcef_id);
	var label_name=$("#label_name"+pcef_id).val();
	var field_name=$("#field_name"+pcef_id).val();
	/* var values = $("input[name='option_array[]']").map(function(){return $(this).val();}).get();
	alert(values); */
	var data="";
	var values = document.getElementsByName('option_array[]');
	for (var i = 0; i <values.length; i++) {
	var value=values[i];
	if(i != 0){
		 if (i % 2 === 0){
		 var data = data.concat(' || ');		 
	     }else {
		 var data = data.concat(' :: ');	
		 }	
	     }
	     var data = data.concat(value.value);
	     }

	$.post(
	"ajax_updt_proprty_extra_field.php",
	{pcef_id:pcef_id,label_name:label_name,field_name:field_name,value:data,type:type},
	function(r){
		if(r==1){
		location.reload();
		}else{
		alert("Somthing went wrong !!!");
		}
	}
	);
	
}
function update_field_drodown1(pcef_id,type){
	//alert(pcef_id);
	var label_name=$("#label_name"+pcef_id).val();
	var field_name=$("#field_name"+pcef_id).val();
	/* var values = $("input[name='option_array[]']").map(function(){return $(this).val();}).get();
	alert(values); */
	var data="";
	var values = document.getElementsByName('option_array1[]');
	for (var i = 0; i <values.length; i++) {
	var value=values[i];
	if(i != 0){
		 if (i % 2 === 0){
		 var data = data.concat(' || ');		 
	     }else {
		 var data = data.concat(' :: ');	
		 }	
	     }
	     var data = data.concat(value.value);
	     }

	$.post(
	"ajax_updt_proprty_extra_field.php",
	{pcef_id:pcef_id,label_name:label_name,field_name:field_name,value:data,type:type},
	function(r){
		if(r==1){
		location.reload();
		}else{
		alert("Somthing went wrong !!!");
		}
	}
	);
	
}


function delete_field(pcef_id){
	$.post(
	"ajax_updt_proprty_extra_field.php",
	{pcef_id:pcef_id,action:'delete'},
	function(r){
		if(r==1){
		alert("Delete Successfull");
		location.reload();
		}else{
		alert("This Field Can not be Deleted");
		}
	}
	);
}

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
<a href="javascript:void(0);">Update Property Extra Field</a>
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


<div class="panel-body"
<form method="post" action="javascript:void(0);" id="add_category_extra_field" >

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select id="cat1" name="pc_id" onchange="fetch_field('cat1','ajax_form1');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
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



<div id="ajax_form1" >
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
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
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
<select id="sub_cat2" name="pc_id"  onchange="fetch_field('sub_cat2','ajax_form2');" >
<option value="0">Select Sub-Category</option>

</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>


<div id="ajax_form2">
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
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
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
<select id="sub_sub_cat3" name="pc_id"   onchange="fetch_field('sub_sub_cat3','ajax_form3');" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

</div>

<div id="ajax_form3">
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
