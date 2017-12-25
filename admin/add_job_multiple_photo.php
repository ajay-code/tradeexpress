<?php
session_start();
require_once("function.php");
//print_r($_POST);
$next_form=trim($_POST["next_form"]);
$db_name=trim($_POST['db_name']);
unset($_POST["next_form"]);
unset($_POST["db_name"]);
?>





<!--  PHOTO UPLOAD FORM  -->
<?php
if($next_form=='photo_upload'){
?>
<div id="ajax_fetch_form" style="display:none;">
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Select Multiple Photo :</h6>
<label class="field prepend-icon append-button file">
<span class="button">Choose Image File</span>
<input type="file" class="gui-file" name="image[]" multiple  id="image">
<input type="text" class="gui-input" id="uploader1" placeholder="Select Item Image">
<label class="field-icon">
<i class="fa fa-cloud-upload"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Video Link :</h6>
<label class="field prepend-icon">
<input type="text" name="video" id="video" class="gui-input" placeholder="video">
<b class="tooltip tip-right-top" id="video_error"><em>Enter Youtube Link</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_job_photo" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>
<?php
}
?>
<!-- END PHOTO UPLOAD FORM  -->


<!--  EXTRA FIELD FORM  -->
<?php
if($next_form=='extra_field'){
?>
<div id="ajax_fetch_form" style="display:none;">
<?php
$select="cat_id,sub_cat_id,sub_sub_cat_id";
$category_ids=getDetails(doSelect1($select,"add_job",array("aj_id"=>$_SESSION["recent_id"])));
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
$select="jcef_id,extra_field_type,label_name,field_name,value_no,value";
$from="job_cat_extra_field";
$con=array("jc_id"=>$in_ids);
$field_dtls=getDetails(selectWhereIn($select,$from,$con));
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["jcef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["jcef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["jcef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["jcef_id"]); ?>" />
</div>
</div>
<?php
}
?>


<?php	
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_job_extra_field" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add & Continue" >
</div>
</div>
</div>
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->


<!--  SPECIAL FEATURES FORM  -->
<?php
if($next_form=='special_features_and_price'){
?>
<div id="ajax_fetch_form" style="display:none;">


<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Featured" value="1">
<span class="checkbox"></span> Featured <?php echo show_price_classifiedDb('Featured');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Double the amount of application compared with standard listing</small>
<small>Appear toward the top in featured searches and category</small>
<small>Distinctive yellow background</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Branding" value="1">
<span class="checkbox"></span> Branding <?php echo show_price_classifiedDb('Branding');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>20% more page view</small>
<small>Link to your other job you have listed</small>
</blockquote>
</div>
</div>



<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_job_listing_features" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add & Finish" >
</div>
</div>
</div>
<?php
}
?>
<!-- END SPECIAL FEATURES FORM  -->

<?php
if($db_name=="add_job"){
$status=doInsert($_POST,'add_job');
$recent_id=newly_insert_id();
$_SESSION["recent_id"]=$recent_id;
if($status){
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>
<?php
if($db_name=="add_job_photo"){
if(isset($_FILES)  && isset($_SESSION["recent_id"])){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"../job_image/".$image_name);
		if($status){
			$field=array("aj_id"=>$_SESSION["recent_id"],"image"=>$image_name);
			doInsert($field,"add_job_photo");
		}
	}
	if(isset($_POST["video"]) && trim($_POST["video"])!=""){
		$field=array("aj_id"=>$_SESSION["recent_id"],"video"=>trim($_POST["video"]));
		doInsert($field,"add_job_video");
	}
	
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_job_extra_field"  && isset($_SESSION["recent_id"])){
	$_POST=array_chunk($_POST,2,true);
	foreach($_POST as $k8=>$v8){
	foreach($v8 as $k=>$v){	
	if(is_array($v)){
		$value="";
		foreach($v as $k1=>$v1){
			if($k1 != 0){
				$value.=' || ';
			}
		$value.=$v1;	
		}
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('jcef_id'=>$updtd_id,"value"=>$value,"aj_id"=>$_SESSION["recent_id"]);
		doInsert($field,"add_job_extra_field");
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('jcef_id'=>$updtd_id,"value"=>$v,"aj_id"=>$_SESSION["recent_id"]);
		doInsert($field,"add_job_extra_field");
	}
	break;
	}
	}
	doUpdate("add_job",array("posting_status"=>1),array("aj_id"=>$_SESSION["recent_id"]));
	//unset($_SESSION["recent_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_job_listing_features"  && isset($_SESSION["recent_id"])){
	$_POST["aj_id"]=$_SESSION["recent_id"];
	doInsert($_POST,$db_name);
	unset($_SESSION["recent_id"]);
	echo ' || finish';
}else{
	echo ' || 0';
}
?>