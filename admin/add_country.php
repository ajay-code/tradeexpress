<?php
session_start();
require_once("function.php");
$g='menu-open';
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

function add_cntry_validation(){
	var country=$("#add_country").val();
	if(country.trim()==""){
		$("#add_country_error").html('<font color="red">Please Enter Country Name</font>');
		return false;
	}
	$.post(
		"add_update_country.php",
		{cn_name:country,msg:'add_country'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			location.reload();
			}else{
			$("#add_country_error").html('<font color="red">Something Went Wrong !!!</font>');	
			}
			
		}
		);
	}

function update_cntry_validation(){
	//alert("sidd");
	var cn_id=$("#update_cntry").val();
	no_border('update_cntry');
	if(cn_id==0){
		alert("Please Select Country");
		error_border('update_cntry');
		return false;
	}
	
	var country=$("#new_country").val();

	if(country.trim()==""){
	alert("Please Type Your country Name");
	//$("#new_country").focus();
	error_border('new_country');
	return false;
	}
	$.post(
	"add_update_country.php",
	{cn_id:cn_id,cn_name:country,msg:'update_country'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Country updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_cntry_validation()
{
	var cn_id=$("#delete_cntry_field").val();
	no_border('delete_cntry_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('delete_cntry_field');
		return false;
	}
	$.post(
	"add_update_country.php",
	{cn_id:cn_id,msg:'delete_country'},
	function(res){
		alert(res);
	var r=res.split("||");
			if(r[1]==1){
	alert("Country deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function add_city_validation(){
	var cn_id=$("#cntry_id").val();
	no_border('cntry_id');
	if(cn_id==0){
		alert("Please select country");
		error_border('cntry_id');
		return false;
	}
	var city=$("#add_city").val();
	if(city.trim()==""){
		alert("Please type city name");
		//$("#add_city").focus();
		error_border('add_city');
		return false;
	}
	$.post(
	"add_update_country.php",
	{ct_cn_id:cn_id,ct_name:city,msg:'add_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City added successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);

}

function update_city_validation(){
	var cn_id=$("#update_field").val();
	no_border('update_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('update_field');
		return false;
	}
	var ct_id=$("#city_update").val();
	var city=$("#update_city").val();
	if(city.trim()==""){
		alert("Please Type City Nmae");
		//$("#update_city").focus();
		error_border('update_city');
		return false;
	}
	$.post(
	"add_update_country.php",
	{ct_cn_id:cn_id,ct_name:city,ct_id:ct_id,msg:'update_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_city_validation(){
	var cn_id=$("#delete_field").val();
	no_border('delete_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('delete_field');
		return false;
	}
	var ct_id=$("#city_delete").val();
	$.post(
	"add_update_country.php",
	{ct_id:ct_id,msg:'delete_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);

}

function add_region_validation(){	var ct_id=$("#ar_city").val().trim();	var region=$("#add_region").val().trim();	no_border('ar_city');	no_border('add_region');	if(ct_id=="0"){		alert("Please Select City");		error_border('ar_city');		return false;	}	if(region==""){		alert("Please enter Region Name");		error_border('add_region');		return false;	}	$.post(		"add_update_country.php",		{ct_id:ct_id,region:region,msg:'add_region'},		function(res){			var r=res.split("||");			if(r[1]==1){				alert("Region added successfully");			}			location.reload();			}	);}function add_suburb_validation(){	var country_id=$("#ar_cntry_id1").val().trim();	var city_id=$("#ar_city1").val().trim();	var region_id=$("#ar_suburb_region1").val().trim();	var suburb=$("#add_suburb").val().trim();	no_border('ar_cntry_id1');	no_border('ar_city1');	no_border('ar_suburb_region1');	no_border('add_suburb');	if(country_id=="0"){		alert("Please Select Counrty");		error_border('ar_cntry_id1');		return false;	}	if(city_id=="0"){		alert("Please Select City");		error_border('ar_city1');		return false;	}	if(region_id=="0"){		alert("Please Select Region");		error_border('ar_suburb_region1');		return false;	}	if(suburb==""){		alert("Please Enter Suburb Name");		error_border('add_suburb');		return false;	}	$.post(		"add_update_country.php",		{cn_id:country_id,ct_id:city_id,rn_id:region_id,suburb:suburb,msg:'add_suburb'},		function(res){			var r=res.split("||");			if(r[1]==1){				alert("Suburb added successfully");			}			location.reload();		}	);}

function update_region_validation(){
	var cn_id=$("#ur_cntry_id").val();
	no_border('ur_cntry_id');
	no_border('ur_city');
	no_border('update_region');
	no_border('new_region');
	if(cn_id==0){
		alert("Please select country");
		error_border('ur_cntry_id');
		return false;
	}
	var ct_id=$("#ur_city").val();
	var ar_id=$("#update_region").val();
	var region=$("#new_region").val();
	
	if(ct_id.trim()=="0"){
		alert("Please Select City");
		error_border('ur_city');
		return false;
	}
	if(ar_id.trim()=="0"){
		alert("Please Select region");
		error_border('update_region');
		return false;
	}
	if(region.trim()==""){
		alert("Please Enter New region name");
		error_border('new_region');
		return false;
	}
	$.post(
	"add_update_country.php",
	{ar_id:ar_id,region:region,msg:'update_region'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Region updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}


function delete_region_validation(){
	var cn_id=$("#dr_cntry_id").val();
	no_border('dr_cntry_id');
	no_border('dr_city');
	no_border('delete_region');
	
	if(cn_id==0){
		alert("Please select country");
		error_border('dr_cntry_id');
		return false;
	}
	var ct_id=$("#dr_city").val();
	var ar_id=$("#delete_region").val();
	
	if(ct_id.trim()=="0"){
		alert("Please Select City");
		error_border('dr_city');
		return false;
	}
	if(ar_id.trim()=="0"){
		alert("Please Select region");
		error_border('delete_region');
		return false;
	}
	
	$.post(
	"add_update_country.php",
	{ar_id:ar_id,msg:'delete_region'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Region deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function fetch_city(){
		var cn_id=$("#update_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_update").html(response);
			}
		});
	}

	function fetch_city1(){
		var cn_id=$("#delete_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_delete").html(response);
			}
		});
	}
	
	function fetch_city2(){
		var cn_id=$("#ar_cntry_id").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#ar_city").html(response);
			}
		});
	}		function fetch_city3(){
		var cn_id=$("#ur_cntry_id").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#ur_city").html(response);
			}
		});
	}


function fetch_city4(){
		var cn_id=$("#dr_cntry_id").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#dr_city").html(response);
			}
		});
	}

	
	function fetch_region(){
		var ct_id=$("#ur_city").val();
		$.ajax({
			url:'fetch_city.php?region_ct_id='+ct_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#update_region").html(response);
			}
		});
	}
	
		function fetch_region1(){
		var ct_id=$("#dr_city").val();
		$.ajax({
			url:'fetch_city.php?region_ct_id='+ct_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#delete_region").html(response);
			}
		});
	}		function fetch_Suburb_city21(){		var cn_id1=$("#ar_cntry_id1").val();		$.ajax({			url:'fetch_city.php?cn_id='+cn_id1,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#ar_city1").html(response);			}		});	}	function fetch_Suburb_region21(){		var ct_id=$("#ar_city1").val();		$.ajax({			url:'fetch_city.php?region_ct_id='+ct_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#ar_suburb_region1").html(response);			}		});	}		function fetch_city31(){		var cn_id=$("#ur_cntry_id1").val();		$.ajax({			url:'fetch_city.php?cn_id='+cn_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#ur_city1").html(response);			}		});	}		function fetch_region11(){		var ct_id=$("#ur_city1").val();		$.ajax({			url:'fetch_city.php?region_ct_id='+ct_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#update_region1").html(response);			}		});	}	function suburb_region(){		var rn_id=$("#update_region1").val();		$.ajax({			url:'fetch_city.php?suburb_id='+rn_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#update_Suburb").html(response);			}		});	}		function update_suburb_validation(){		var cn_id=$("#ur_cntry_id1").val();		no_border('ur_cntry_id1');		no_border('ur_city1');		no_border('update_region1');		no_border('update_Suburb');		no_border('new_suburb_region');		if(cn_id==0){			alert("Please select country");			error_border('ur_cntry_id1');			return false;		}		var ct_id=$("#ur_city1").val();		var ar_id=$("#update_region1").val();		var sub_id=$("#update_Suburb").val();				var suburb=$("#new_suburb_region").val();		if(ct_id.trim()=="0"){			alert("Please Select City");			error_border('ur_city1');			return false;		}		if(ar_id.trim()=="0"){			alert("Please Select region");			error_border('update_region1');			return false;		}		if(sub_id.trim()=="0"){			alert("Please Select Suburb");			error_border('update_Suburb');			return false;		}		if(suburb.trim()==""){			alert("Please Enter New Suburb Name");			error_border('new_suburb_region');			return false;		}		$.post(			"add_update_country.php",			{sub_id:sub_id,suburb:suburb,msg:'update_suburb'},			function(res){				var r=res.split("||");				if(r[1]==1){					alert("Region updated successfully");				}				location.reload();			}		);	}	function fetch_city41(){		var cn_id=$("#dr_cntry_id1").val();		$.ajax({			url:'fetch_city.php?cn_id='+cn_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#dr_city1").html(response);			}		});	}	function fetch_region13(){		var ct_id=$("#dr_city1").val();		$.ajax({			url:'fetch_city.php?region_ct_id='+ct_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#delete_region1").html(response);			}		});	}		function fetch_suburb(){		var rn_id=$("#delete_region1").val();		$.ajax({			url:'fetch_city.php?suburb_id='+rn_id,			type:'post',			dataType:'text',			cache:false,			contentType:false,			processData:false,			success:function(response){				$("#delete_Suburb1").html(response);			}		});	}		function delete_suburb_validation(){		var cn_id=$("#dr_cntry_id1").val();		no_border('dr_cntry_id1');		no_border('dr_city1');		no_border('delete_region1');		no_border('delete_Suburb1');		if(cn_id==0){			alert("Please select country");			error_border('dr_cntry_id1');			return false;		}		var ct_id=$("#dr_city1").val();		var ar_id=$("#delete_region1").val();		var sub_id=$("#delete_Suburb1").val();		if(ct_id.trim()=="0"){			alert("Please Select City");			error_border('dr_city1');			return false;		}		if(ar_id.trim()=="0"){			alert("Please Select region");			error_border('delete_region1');			return false;		}		if(sub_id.trim()=="0"){			alert("Please Select Suburd");			error_border('delete_Suburb1');			return false;		}		$.post(			"add_update_country.php",			{sub_id:sub_id,msg:'delete_suburb'},			function(res){				var r=res.split("||");				if(r[1]==1){					alert("Suburd deleted successfully");				}				location.reload();			}		);	}
</script>
<section id="content_wrapper"><header id="topbar" class="alt"></header>
 
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">


<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Country
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-12">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="country" id="add_country"  class="gui-input" placeholder="Enter Country Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_cntry_validation();"  type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Country
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="update_cntry">
<option value="0">Select Country</option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<input type="text"  id="new_country"  class="gui-input" placeholder="Enter Country Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="update_cntry_validation();" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Delete Country
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select  id="delete_cntry_field" >
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<input class="btn btn-default btn-primary" onclick="delete_cntry_validation();" type="submit" name="submit" value="Delete" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add City
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="cntry_id">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<input type="text"  id="add_city" class="gui-input" placeholder="Enter City Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_city_validation();" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update City
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="update_field" onchange="fetch_city();" >
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<select name="city" id="city_update">
<option value="0">Select City</option>
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
<input type="text" id="update_city" class="gui-input" placeholder="Enter City Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="update_city_validation();" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
<div class="panel-title">Delete City
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="delete_field" onchange="fetch_city1();" >
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<select  id="city_delete">
<option value="0">Select City</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="delete_city_validation();" type="submit" name="submit" value="Delete" >
</div>
</div>
</form>
</div>
</div>





<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Region
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select name="field" id="ar_cntry_id" onchange="fetch_city2();" >
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
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
<select name="ar_city" id="ar_city">
<option value="0">Select City</option>
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
<input type="text" id="add_region" class="gui-input" placeholder="Enter Region Name">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" onclick="add_region_validation();" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>





<div class="panel">	<div class="panel-heading">		<div class="panel-title">Update Region</div>	</div>	<div class="panel-body">		<form method="post" action="javascript:void(0);" id="" >			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="field" id="ur_cntry_id" onchange="fetch_city3();" >								<option value="0" >Select Country </option>								<?php									$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));									foreach($country as $k=>$v){		
								?>									<option value="<?php echo $v["cn_id"]; ?>" ><?php echo $v["cn_name"];  ?></option>								<?php  } ?>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="ur_city" id="ur_city" onchange="fetch_region();" >								<option value="0">Select City</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="update_region" id="update_region">								<option value="0">Select Region</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field prepend-icon">							<input type="text" id="new_region" class="gui-input" placeholder="Enter Region Name">							<label for="tooltip1" class="field-icon">								<i class="fa fa-sign-out"></i>							</label>						</label>					</div>				</div>			</div>			<div class="row" style="margin-top:20px;">				<div class="col-md-4">					<input class="btn btn-default btn-primary" onclick="update_region_validation();" type="submit" name="submit" value="Update" >				</div>			</div>		</form>	</div></div>
<div class="panel">	<div class="panel-heading">		<div class="panel-title">Delete Region</div>	</div>	<div class="panel-body">		<form method="post" action="javascript:void(0);" id="" >			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="field" id="dr_cntry_id" onchange="fetch_city4();" >								<option value="0" >Select Country </option>								<?php									$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));									foreach($country as $k=>$v){								?>									<option value="<?php echo $v["cn_id"]; ?>" >										<?php echo $v["cn_name"];  ?>									</option>								<?php } ?>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="dr_city" id="dr_city" onchange="fetch_region1();" >								<option value="0">Select City</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="delete_region" id="delete_region">								<option value="0">Select Region</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row" style="margin-top:20px;">				<div class="col-md-4">					<input class="btn btn-default btn-primary" onclick="delete_region_validation();" type="submit" name="submit" value="Delete" >				</div>			</div>		</form>	</div></div>
<div class="panel">	<div class="panel-heading">		<div class="panel-title">Add Suburb</div>	</div>	<div class="panel-body">		<form method="post" action="javascript:void(0);" id="" >			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="suburb_country" id="ar_cntry_id1" onchange="fetch_Suburb_city21();" >								<option value="0" >Select Country </option>								<?php									$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));									foreach($country as $k=>$v){								?>									<option value="<?php echo $v["cn_id"]; ?>" ><?php echo $v["cn_name"];  ?></option>								<?php } ?>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="ar_suburb_city" id="ar_city1" onchange="fetch_Suburb_region21()">								<option value="0">Select City</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="ar_suburb_region" id="ar_suburb_region1">								<option value="0">Select Region</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field prepend-icon">							<input type="text" id="add_suburb" class="gui-input" placeholder="Enter Suburb Name">							<label for="tooltip1" class="field-icon">								<i class="fa fa-sign-out"></i>							</label>						</label>					</div>				</div>			</div>			<div class="row" style="margin-top:20px;">				<div class="col-md-4">					<input class="btn btn-default btn-primary" onclick="add_suburb_validation();" type="submit" name="submit" value="Add" >				</div>			</div>		</form>	</div></div><div class="panel">	<div class="panel-heading">		<div class="panel-title">Update Suburb</div>	</div>	<div class="panel-body">		<form method="post" action="javascript:void(0);" id="" >			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="suburb_field" id="ur_cntry_id1" onchange="fetch_city31();" >								<option value="0" >Select Country </option>								<?php									$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));									foreach($country as $k=>$v){										?>									<option value="<?php echo $v["cn_id"]; ?>" ><?php echo $v["cn_name"];  ?></option>								<?php  } ?>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="ur_suburb_city" id="ur_city1" onchange="fetch_region11();" >								<option value="0">Select City</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="update_suburb_region" id="update_region1" onchange="suburb_region();">								<option value="0">Select Region</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="update_suburb" id="update_Suburb">								<option value="0">Select Suburb</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field prepend-icon">							<input type="text" id="new_suburb_region" class="gui-input" placeholder="Enter Suburb Name">							<label for="tooltip1" class="field-icon">								<i class="fa fa-sign-out"></i>							</label>						</label>					</div>				</div>			</div>			<div class="row" style="margin-top:20px;">				<div class="col-md-4">					<input class="btn btn-default btn-primary" onclick="update_suburb_validation();" type="submit" name="submit" value="Update" >				</div>			</div>		</form>	</div></div><div class="panel">	<div class="panel-heading">		<div class="panel-title">Delete Suburb</div>	</div>	<div class="panel-body">		<form method="post" action="javascript:void(0);" id="" >			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="field" id="dr_cntry_id1" onchange="fetch_city41();" >								<option value="0" >Select Country </option>								<?php									$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));									foreach($country as $k=>$v){								?>									<option value="<?php echo $v["cn_id"]; ?>" >										<?php echo $v["cn_name"];  ?>									</option>								<?php } ?>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="dr_city" id="dr_city1" onchange="fetch_region13();" >								<option value="0">Select City</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row">				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="delete_region" id="delete_region1" onchange="fetch_suburb();">								<option value="0">Select Region</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>				<div class="col-md-6">					<div class="section">						<label class="field select">							<select name="delete_suburb" id="delete_Suburb1">								<option value="0">Select Suburb</option>							</select>							<i class="arrow"></i>						</label>					</div>				</div>			</div>			<div class="row" style="margin-top:20px;">				<div class="col-md-4">					<input class="btn btn-default btn-primary" onclick="delete_suburb_validation();" type="submit" name="submit" value="Delete" >				</div>			</div>		</form>	</div></div>
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
