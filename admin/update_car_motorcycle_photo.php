<?php
session_start();
require_once("function.php");
$acm_id=trim($_SESSION["updated_id"]);
$db_name=trim($_POST["db_name"]);
$next_form=trim($_POST["next_form"]);
unset($_POST["db_name"]);
unset($_POST["next_form"]);

if(trim($next_form)=="photo_upload"){
?>
<script type="text/javascript">
function delete_image(acmp_id){
    $.post(
		"ajax_delete_car_image.php",
		{acmp_id:acmp_id,msg:"delete_car_motorcycle_image"},
		function(r){
			$("#ajax_photo").html(r);
		           }
		);
  }
</script>

<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Car Motorcycle & Boats
</div>
</div>
<div class="panel-body">

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

			<div id="ajax_photo">
			<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("acm_id,acmp_id,image,status","add_car_motorcycle_photo",array("acm_id"=>$acm_id)));
				foreach($image as $k=>$v){
				?>
             <div class="col-md-4">
				<div class="mix label2 folder2">
             <div class="panel p6 pbn">
<div class="of-h">
<img src="../car_motorcycle_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<div class="row table-layout">
<div class="col-xs-4 va-m pln" style="color:red;">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["acmp_id"];?>');" data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
</div>
<div class="col-xs-6 text-right va-m prn">
<a href="javascript:void(0)" title=" <?php if($v["status"]==0)echo getCarTitle($v["acm_id"]).' Not Approved ';else echo getCarTitle($v["acm_id"]).' is Approved';  ?> "><span class="fa fa-circle fs10 <?php if($v["status"]==0)echo ' text-danger ';  ?> ml10"></span></a>
<!-- text-danger for red icon -->
</div>
</div>
</div>
</div>
</div>
</div>
              <?php
               }
               ?>
            </div>

</div>


<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_car_motorcycle_photo" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php		
}
if(trim($next_form)=="extra_field"){
?>	
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Car Motorcycle Extra Field
</div>
</div>
<div class="panel-body">
<div id="ajax_fetch_form" style="display:none;">

<?php
$select="acmef_id,aa.ccef_id,bb.field_name,aa.value as prev_value,cc_id,extra_field_type,label_name,value_no,bb.value";
$from="add_car_motorcycle_extra_field as aa,car_cat_extra_field as bb";
$con=array("aa.ccef_id"=>"bb.ccef_id","aa.acm_id"=>$acm_id);
$extra_field_dtls=getDetails(doSelect1($select,$from,$con));
//print_r($extra_field_dtls);
foreach($extra_field_dtls as $k=>$v){
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
	<option value="<?php echo $field_value[0];  ?>" <?php if($field_value[0]==$v["prev_value"]) echo 'selected'; ?> >
	<?php echo $field_value[1];  ?>
	</option>
	<?php
	}
	?>
</select>
<i class="arrow"></i>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
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
	for($i=0;$i<trim($v["value_no"]);$i++){
		$value=explode("||",$v["value"]);
		$field_value=explode("::",$value[$i]);
	?>
<?php
$checkbox=explode("||",$v["prev_value"]);
$checkbox_array=array();
foreach($checkbox as $k3=>$v3){
	array_push($checkbox_array,trim($v3));
	
}
$checkbox_array=trimmer($checkbox_array);
?>
<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="<?php echo $v["field_name"]; ?>[]" <?php if(in_array(trim($field_value[0]),$checkbox_array)) echo 'checked'; ?>  value="<?php echo $field_value[0];  ?>">
<span class="checkbox"></span> <?php echo $field_value[1];  ?>
</label>
</div>
</div>
	<?php
	}
	?>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
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
<input type="text" name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" value="<?php echo $v["prev_value"]; ?>" class="gui-input" placeholder="">
<!-- <b class="tooltip tip-right-top" id="<?php //echo trim($v["field_name"]); ?>_error"><em></em></b> -->
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
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
<textarea class="gui-textarea" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" placeholder="Item <?php echo ' '.$v["label_name"];  ?>">
<?php echo $v["prev_value"]; ?>
</textarea>
<b class="tooltip tip-right-top" id="<?php echo trim($v["field_name"]); ?>_error"><em>Write <?php echo ' '.$v["label_name"];  ?></em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
</div>
</div>
<?php
}
?>

<?php
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_car_motorcycle_extra_field" />

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>	
<?php	
}
?>

<?php
if(trim($next_form)=="special_features_and_price"){
?>	
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update Featured
</div>
</div>
<div class="panel-body">
<div id="ajax_fetch_form" style="display:none;">

<?php
$select="acmlf_id,Feature_Combo,Featured,Highlight,Bold_Title,MotorWeb_Basic_Report";
$from="add_car_motorcycle_listing_features";
$con=array("acm_id"=>$acm_id);
$featured_dtls=getDetails(doSelect1($select,$from,$con));
//print_r($extra_field_dtls);
$featured_dtls=trimmer_db_array($featured_dtls);
foreach($featured_dtls as $k=>$v){
?>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Feature_Combo" <?php if($v["Feature_Combo"]=="1") echo 'checked'; ?> value="1">
<span class="checkbox"></span> Feature Combo <?php echo show_price_classifiedDb('Feature_Combo');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>2.5 times more view and watchlist add than basic listing</small>
<small>Appear first result search in category</small>
<small>Distictive yellow background</small>
<small>Bright yellow border</small>
<small>Bold Title</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Featured" <?php if($v["Featured"]=="1") echo 'checked'; ?> value="1">
<span class="checkbox"></span> Featured <?php echo show_price_classifiedDb('Featured');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Appear first result search in category</small>
<small>Distictive yellow background</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Highlight" <?php if($v["Highlight"]=="1") echo 'checked'; ?> value="1">
<span class="checkbox"></span> Highlight <?php echo show_price_classifiedDb('Highlight');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Stand Out Search result with yellow background</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="Bold_Title" <?php if($v["Bold_Title"]=="1") echo 'checked'; ?> value="1">
<span class="checkbox"></span> Bold Title <?php echo show_price_classifiedDb('Bold_Title');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Stand Out Search result with Bold Title</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="MotorWeb_Basic_Report" <?php if($v["MotorWeb_Basic_Report"]=="1") echo 'checked'; ?> value="1">
<span class="checkbox"></span> MotorWeb Basic Report <?php echo show_price_classifiedDb('MotorWeb_Basic_Report');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Basic report appear on your listing untill sold</small>
</blockquote>
</div>
</div>

<?php
}
?>
<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_car_motorcycle_listing_features" />

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Update & Finish" >
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>	
<?php	
}
?>



<?php
if(trim($db_name)=="add_car_motorcycle"){
if(trim($_POST["reserve_price"])=="0"){
	$_POST["reserve_price"]=trim($_POST["custom_reserve_price"]);
}else{
	$_POST["reserve_price"]=trim($_POST["start_price"]);
}
unset($_POST["custom_reserve_price"]);
if(isset($_POST["allow_bid"])){
$_POST["allow_bid"]=$_POST["allow_bid"][0];
}
if(trim($_POST["listing_duration"])=="1"){
	$listing_length=explode("-",$_POST["listing_length"]);
	$listing_length=$listing_length[2].'-'.$listing_length[1].'-'.$listing_length[0];
	$_POST["listing_length"]=$listing_length;
}else{
	$_POST["listing_length"]=trim(seeMoreDetails("listing_length","add_car_motorcycle",array("acm_id"=>$acm_id)));
}

$_POST["status"]=0;
if(!isset($_POST["subtitle"])){
	$_POST["subtitle"]="";
}
if(isset($_POST["list_in_second_cat"]) && $_POST["list_in_second_cat"]=="0"){
	$_POST["cat1_id"]=$_POST["sub_cat1_id"]=$_POST["sub_sub_cat1_id"]="0";
}
$status=doUpdate('add_car_motorcycle',$_POST,array("acm_id"=>$acm_id));
if($status){
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_car_motorcycle_photo"){
if(isset($_FILES)){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"../car_motorcycle_image/".$image_name);
		if($status){
			$field=array("acm_id"=>$acm_id,"image"=>$image_name);
			doInsert($field,"add_car_motorcycle_photo");
		}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_car_motorcycle_extra_field"){
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
		$field=array("value"=>$value);
		doUpdate($db_name,$field,array('acmef_id'=>$updtd_id));
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$v);
		doUpdate($db_name,$field,array('acmef_id'=>$updtd_id));
	}
	break;
	}
	}
	//unset($_SESSION["updated_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_car_motorcycle_listing_features"){
	$_POST["acm_id"]=$acm_id;
	$status=doUpdate($db_name,$_POST,array("acm_id"=>$acm_id));
	if($status){
	unset($_SESSION["updated_id"]);
	echo ' || finish';
}else{
	echo ' || 0';
}
}
?>

