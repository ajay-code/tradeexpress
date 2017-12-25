<?php
session_start();
require_once("function.php");
$k='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
 $(document).ready(function() {
$("#add_general_item").on('submit',(function(e){  
	$.ajax({
        	url: "demo_get_form.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			alert(data);
			
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
<div class="panel-title">Add General Items
</div>
</div>


<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_general_item" enctype="multipart/form-data">
<?php
$select="cat_id,sub_cat_id,sub_sub_cat_id,sub_sub_sub_cat_id";
$category_ids=getDetails(doSelect1($select,"add_general_items",array("agi_id"=>$_SESSION["recent_id"])));
$in_ids="";
/* echo '<pre>';
print_r($category_ids);
echo '</pre>'; */
foreach($category_ids as $k=>$v){
	foreach($v as $k2=>$v2){
		if(trim($k2) !='cat_id'){
		$in_ids.=',';	
		}
		$in_ids.=$v2;
	}
}

$select="gcef_id,extra_field_type,label_name,field_name,value_no,value";
$from="general_cat_extra_field";
$con=array("gic_id"=>'1,2,3');
$field_dtls=getDetails(selectWhereIn($select,$from,$con));
/* echo '<pre>';
print_r($field_dtls);
echo '</pre>'; */
?>
<div class="row">
<div class="col-md-6">
<h5 style="color: grey;">Extra Field</h5>
</div>
</div>
<?php
foreach($field_dtls as $k=>$v){
?>

<?php
if(trim($v["extra_field_type"])=="1"){
?>
<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
<label class="field select">
<select id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>">
<option value="0">Select</option>
	<?php
	for($i=0;$i< $v["value_no"];$i++){
		$value=explode("||",$v["value"]);
		$field_value=explode("::",$value[$i]);
	?>
	<option value="<?php echo $field_value[0];  ?>"><?php echo $field_value[1];  ?></option>
	<?php
	}
	?>
</select>
<i class="arrow"></i>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
</div>
</div>
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="2"){
?>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;"><?php echo $v["label_name"];  ?></h6>
</div>
</div>
<div class="row">

	<?php
	for($i=0;$i< $v["value_no"];$i++){
		$value=explode("||",$v["value"]);
		$field_value=explode("::",$value[$i]);
	?>
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="<?php echo $v["field_name"]; ?>[]" value="<?php echo $field_value[0];  ?>">
<span class="checkbox"></span> <?php echo $field_value[1];  ?>
</label>
</div>
</div>
	<?php
	}
	?>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
</div>
<?php
}
?>
<br/>
<?php
if(trim($v["extra_field_type"])=="3"){
?>
<div class="row">
<div class="col-md-12" id="subtitle_custom">
<div class="section">
<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
<label class="field prepend-icon">
<input type="text" name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" class="gui-input" placeholder="">
<!-- <b class="tooltip tip-right-top" id="<?php //echo trim($v["field_name"]); ?>_error"><em></em></b> -->
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
</div>
</div>
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="4"){
?>
<div class="row">
<div class="col-md-12">
<div class="section">
<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
<label class="field prepend-icon">
<textarea class="gui-textarea" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" placeholder="Item <?php echo ' '.$v["label_name"];  ?>"></textarea>
<b class="tooltip tip-right-top" id="<?php echo trim($v["field_name"]); ?>_error"><em>Write <?php echo ' '.$v["label_name"];  ?></em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
</div>
</div>
<?php
}
?>


<?php	
}
?>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add & Finish" >
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
 

 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
