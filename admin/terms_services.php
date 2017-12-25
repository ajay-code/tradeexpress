<?php
session_start();
require_once("function.php");
$h='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var terms=$("#terms").val();
	if(terms.trim()==""){
		alert("Please write your Terms & Services");
		$("#terms").focus();
		return false;
	}
	}
function delete_terms(id){
	 $.post("delete_terms.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function edit_terms(id){
	 $.post("edit_terms.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function update_validation(id){
	var terms=$("#update_terms").val();
$.post("update_terms.php",{id:id,terms:terms},function(r){
	 $("#ajax").html(r);
	 });
}
</script>
<section id="content_wrapper">
 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="dashboard1.html">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="dashboard1.html">Dashboard</a>
</li>
<li class="breadcrumb-link">
<a href="index.html">Home</a>
</li>
<li class="breadcrumb-current-item">Dashboard</li>
</ol>
</div>
<div class="topbar-right">
<div class="ib topbar-dropdown">
<label for="topbar-multiple" class="control-label">Reporting Period</label>
<select id="topbar-multiple" class="hidden">
<optgroup label="Filter By:">
<option value="1-1">Last 30 Days</option>
<option value="1-2" selected="selected">Last 60 Days</option>
<option value="1-3">Last Year</option>
</optgroup>
</select>
</div>
<div class="ml15 ib va-m" id="sidebar_right_toggle">
<div class="navbar-btn btn-group btn-group-number mv0">
<button class="btn btn-sm btn-default btn-bordered prn pln">
<i class="fa fa-bar-chart fs22 text-default"></i>
</button>
</div>
</div>
</div>
</header>
 
 

<div id="ajax">
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$terms=getDetails(doselect1("terms,id","ambit_terms_services",array()));
?>
<span class="panel-title">
Terms & Services &nbsp <?php  if(!empty($terms)){ ?> <a href="javascript:void(0);" title="Edit" onclick="edit_terms('<?php echo $terms[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a><?php  } ?>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php if(!empty($terms)) echo $terms[0]["terms"]; else echo '<font color="red">Please write Terms & Services above !!!</font>';  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>
</div> 
<!-- ajax div -->


<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
