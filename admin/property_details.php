<?php
session_start();
require_once("function.php");
$l='menu-open';if(isset($_SESSION["id"]) && $_SESSION["username"]){$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));include("include/header.php");?>

<script type="text/javascript">
function delete_hotel(aah_id){
	//alert(sidd);
	if(confirm("Are You Sure To delete Hotel ???")){
		$.post(
		"ajax_delete.php",
		{aah_id:aah_id,msg:"delete_hotel"},
		function(r){
			if(r==1){
				alert("Delete Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !!!");
			}
		           }
		);
	}
}

</script>

<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">

</header>
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
<a href="javascript:void(0);">Property Details</a>
</li>
</ol>
</div>
</div>
</div>
</div>
<section id="content" class="table-layout animated fadeIn">
<?php
$select="ap_id,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,	smoke_alarm,	agency_reference,Posting_status,status";
$from="add_property";
$condition=array("ap_id"=>trim($_GET["id"]));
$property_detls=getDetails(doSelect1($select,$from,$condition));
/* echo "<pre>";
print_r($property_detls);
echo "</pre>"; */
?>

<div class="panel" id="spy5">
<div class="panel-heading">
<span class="panel-title"><h3><font style="color:red;opacity:0.7;"><?php echo getPropertyTitle(trim($_GET["id"]));  ?></font></h3></span>

</div>
<div class="panel-body pn">
<div class="table-responsive">
<div class="table-responsive">
<div class="bs-component">
<table class="table table-bordered mbn fixed">
<col width="40%" />
<col width="60%" />
<?php
foreach($property_detls as $k=>$v){
?>
<tr>
<td style="font-size: 20px;">Category</td>
<?php
if(getPropertyCategory($v["cat_id"])==""){
	$cat_id="";
}else{
	$cat_id=getPropertyCategory($v["cat_id"]);
}
if(getPropertyCategory($v["sub_cat_id"])==""){
	$sub_cat_id="";
}else{
	$sub_cat_id=' > '.getPropertyCategory($v["sub_cat_id"]);
}
if(getPropertyCategory($v["sub_sub_cat_id"])==""){
	$sub_sub_cat_id="";
}else{
	$sub_sub_cat_id=' > '.getPropertyCategory($v["sub_sub_cat_id"]);
}
?>
<td style="font-size: 15px;"><h3><?php echo $cat_id.$sub_cat_id.$sub_sub_cat_id; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Listing Title</td>
<td style="font-size: 15px;"><h3><?php echo $v["listing_title"] ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Listing Duration</td>
<td style="font-size: 15px;"><h3><?php echo $v["listing_duration"].' Days'; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Address</td>
<td style="font-size: 15px;"><h3><?php echo $v["street"].' ,'.$v["unit_flat"].' , '.$v["street_name"].' .</br>'.getRegionName($v["region"]).' , '.getCityName(getCityIdByRegion($v["region"])).' ( '.getCountryName(getCountryIdByCity(getCityIdByRegion($v["region"]))).' ) .'; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Rateable Value</td>
<?php
if(trim($v["rateable_value_hide"])=="0"){
	$type="";
}else{
	$type='<font color="red"> ( Private )</font>';
}
?>
<td style="font-size: 15px;"><h3><?php echo currency().$v["rateable_value"].$type; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Expected sale Price</td>
<td style="font-size: 15px;"><h3><?php echo currency().$v["expected_sale_price"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Features</td>
<td style="font-size: 15px;">

<table class="table table-bordered mbn fixed">
<col width="50%" />
<col width="50%" />
<tr>
<td style="font-size: 15px;">Bed Room</td>
<td style="font-size: 15px;"><?php echo $v["bedroom"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Bath Room</td>
<td style="font-size: 15px;"><?php echo $v["bathroom"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Floor Area</td>
<td style="font-size: 15px;"><?php echo $v["floor_area"].' Meter Sq.'; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Land Area</td>
<td style="font-size: 15px;"><?php echo $v["land_area"].' Meter Sq.'; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Smoke Alarm</td>
<?php
if(trim($v["smoke_alarm"])=="0"){
	$smoke_alarm="Don't Know";
}else if(trim($v["smoke_alarm"])=="1"){
	$smoke_alarm="No";
}else{
	$smoke_alarm="Yes";
}
?>
<td style="font-size: 15px;"><?php echo $smoke_alarm; ?></td>
</tr>
</table>

</td>
</tr>
<tr>
<td style="font-size: 20px;">Description</td>
<td style="font-size: 10px;"><h3 style="text-align:justify;"><?php echo $v["prop_desc"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Parking</td>
<td style="font-size: 10px;"><h3 style="text-align:justify;"><?php echo $v["parking"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Amenities</td>
<td style="font-size: 10px;"><h3 style="text-align:justify;"><?php echo $v["amenities"]; ?></h3></td>
</tr>
<tr>
<td style="font-size: 20px;">Agency Reference</td>
<td style="font-size: 15px;"><h3><?php echo $v["agency_reference"]; ?></h3></td>
</tr>

<?php
$select="ap_id,pcef_id,value";
$from="add_property_extra_field";
$condition=array("ap_id"=>trim($v["ap_id"]));
$extra_field_detls=getDetails(doSelect1($select,$from,$condition));
foreach($extra_field_detls as $k2=>$v2){
?>
<tr>
<td style="font-size: 20px;"><?php echo getPropertyLabel($v2["pcef_id"]);  ?></td>
<?php
$value=explode(" || ",$v2["value"]);
$value=implode(" , ",$value);
?>
<td style="font-size: 15px;"><h3><?php echo $value; ?></h3></td>
</tr>


<?php
}
?>


<?php
$select="price_type,label_name,value";
$from="add_property_price_dtls";
$condition=array("ap_id"=>trim($v["ap_id"]));
$price_detls=getDetails(doSelect1($select,$from,$condition));
foreach($price_detls as $k2=>$v2){			
?>
<tr>
<td style="font-size: 20px;"><?php echo $prop_price_type;?><?php echo $v2["label_name"];  ?></td>
<?php	if(trim($v2["price_type"])=='1'){		$value=currency().trim($v2["value"]);	}else if(trim($v2["price_type"])=='2'){		$value=currency().trim($v2["value"]);	}else if(trim($v2["price_type"])=='3'){		$value=trim($v2["value"]);		$value= str_replace('-',' ', $value);		$value= get_date_str($value);	}else if(trim($v2["price_type"])=='4'){		$value=trim($v2["value"]);		$value= str_replace('-',' ', $value);		$value= get_date_str($value);	}else if(trim($v2["price_type"])=='5'){		$value=trim($v2["value"]);	}else if(trim($v2["price_type"])=='6'){		$value=trim($v2["value"]);		$value= str_replace('-',' ', $value);		$value= get_date_str($value);	}else{		$value=trim($v2["value"]);	}?>
<td style="font-size: 15px;"><?php  echo $value;  ?></td>
</tr>
<?php
}
?>

<tr>
<td style="font-size: 20px;">Contact Details</td>
<td style="font-size: 15px;">
<?php
$select="contact_type,realestate_agent,name,agency,mobile,landline";
$from="add_property_contact_dtls";
$condition=array("ap_id"=>trim($v["ap_id"]));
$contact_detls=getDetails(doSelect1($select,$from,$condition));
foreach($contact_detls as $k2=>$v2){
?>
<table class="table table-bordered mbn fixed">
<col width="50%" />
<col width="50%" />
<?php
if(trim($v2["contact_type"])=='1'){
	if(trim($v2["realestate_agent"])=='1'){
		$realestate_agent='Yes';
	}else{
		$realestate_agent='No';
	}
?>
<tr>
<td style="font-size: 15px;">Licensed Real Estate Agent ?</td>
<td style="font-size: 15px;"><?php echo $realestate_agent; ?></td>
</tr>
<?php
}
?>
<tr>
<td style="font-size: 15px;">Name</td>
<td style="font-size: 15px;"><?php echo $v2["name"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Agency</td>
<td style="font-size: 15px;"><?php echo $v2["agency"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Mobile</td>
<td style="font-size: 15px;"><?php echo $v2["mobile"]; ?></td>
</tr>
<tr>
<td style="font-size: 15px;">Land Line</td>
<td style="font-size: 15px;"><?php echo $v2["landline"]; ?></td>
</tr>
</table>
<?php
}
?>
</td>
</tr>


<tr>
<td style="font-size: 20px;" colspan="2"><a href="property_gallery.php?id=<?php echo trim($_GET["id"]); ?>" target="_blank" ><button class="btn btn-default btn-primary"><font color="black" >See Photo Gallery</font></button></a></td>
</tr>
</table>

</div>
</div>
</div>
</div>
</div>
</section>




 
<?php
}
require_once("include/footer1.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
