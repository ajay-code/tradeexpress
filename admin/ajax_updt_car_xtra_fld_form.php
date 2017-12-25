<?php
session_start();
require_once("function.php");
$cc_id=trim($_POST["cc_id"]);
$select="ccef_id,cc_id,extra_field_type,label_name,field_name,value_no,value";
$from="car_cat_extra_field";
$con=array("cc_id"=>$cc_id);
$extra_dtls=getDetails(doSelect1($select,$from,$con));
/* echo '<pre>';
print_r($extra_dtls);
echo '</pre>'; */
$extra_dtls=trimmer_db_array($extra_dtls);
foreach($extra_dtls as $k=>$v){

if (trim($v["extra_field_type"])=='5') {
    ?>
<div class="row">
<div class="col-md-12">
<div class="panel" style="background-color: #867979;">
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Date field</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Label Name :</h6>
<label class="field prepend-icon">
<input type="text" name="label_name" id="label_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["label_name"]; ?>" class="gui-input" placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Field Name :</h6>
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["field_name"]; ?>"  class="gui-input" placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row" style="margin-top:15px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="button" onclick="update_field('<?php echo $v["ccef_id"]; ?>','textbox');" value="Update" >
<input class="btn btn-default btn-primary" type="button" onclick="delete_field('<?php echo $v["ccef_id"]; ?>');" value="Delete" >
</div>
</div>
</div>
</div>
</div>

<?php
}

if(trim($v["extra_field_type"])=='3'){
?>
<div class="row">
<div class="col-md-12">
<div class="panel" style="background-color: #867979;">
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Textbox field</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Label Name :</h6>
<label class="field prepend-icon">
<input type="text" name="label_name" id="label_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["label_name"]; ?>" class="gui-input" placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Field Name :</h6>
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["field_name"]; ?>"  class="gui-input" placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row" style="margin-top:15px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="button" onclick="update_field('<?php echo $v["ccef_id"]; ?>','textbox');" value="Update" >
<input class="btn btn-default btn-primary" type="button" onclick="delete_field('<?php echo $v["ccef_id"]; ?>');" value="Delete" >
</div>
</div>
</div>
</div>
</div>

<?php
}
if(trim($v["extra_field_type"])=='4'){
?>
<div class="row">
<div class="col-md-12">
<div class="panel" style="background-color: #867979;">

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Textarea field</h6>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Label Name :</h6>
<label class="field prepend-icon">
<input type="text" name="label_name" id="label_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["label_name"]; ?>"  class="gui-input" placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Field Name :</h6>
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name<?php echo $v["ccef_id"]; ?>" value="<?php echo $v["field_name"]; ?>"  class="gui-input" placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row" style="margin-top:15px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="button" onclick="update_field('<?php echo $v["ccef_id"]; ?>','textarea');" value="Update" >
<input class="btn btn-default btn-primary" type="button" onclick="delete_field('<?php echo $v["ccef_id"]; ?>');"  value="Delete" >
</div>
</div>
</div>
</div>
</div>
<?php
}
if(trim($v["extra_field_type"])=='1'){
?>
<div class="row">
<div class="col-md-12">
<div class="panel" style="background-color: #867979;">

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Dropdown field</h6>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">Label Name :</h6>
<label class="field prepend-icon">
<input type="text" name="label_name" id="label_name<?php echo $v["ccef_id"]; ?>" class="gui-input" value="<?php echo $v["label_name"]; ?>"   placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">Field Name :</h6>
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name<?php echo $v["ccef_id"]; ?>" class="gui-input" value="<?php echo $v["field_name"]; ?>"   placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">No Of Option :</h6>
<label class="field prepend-icon">
<input type="text"  id="option_no1" name="value_no" value="<?php echo $v["value_no"]; ?>" readonly class="gui-input" placeholder="Option No.">
<b class="tooltip tip-right-top" id="option_no1_error"><em>Enter No. Of Option</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
$i=trim($v["value_no"]);
for($l=0;$l<$i;$l++){
$values=explode("||",$v["value"]);
$value=explode("::",$values[$l]);
$value=trimmer($value);
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Option Value :</h6>
<label class="field prepend-icon">
<input type="text" name="option_array[]" id="option_array<?php echo $v["ccef_id"]; ?>[]" value="<?php echo $value[0]; ?>" class="gui-input" placeholder="Option value">
<b class="tooltip tip-right-top" id=""><em>Enter Option Value</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Option Name :</h6>
<label class="field prepend-icon">
<input type="text" name="option_array[]" id="option_array<?php echo $v["ccef_id"]; ?>[]" value="<?php echo $value[1]; ?>"  class="gui-input" placeholder="Option name">
<b class="tooltip tip-right-top" id=""><em>Enter Option Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
}
?>
<div class="row" style="margin-top:15px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="button" onclick="update_field_drodown('<?php echo $v["ccef_id"]; ?>','dropdown');" value="Update" >
<input class="btn btn-default btn-primary" type="button" onclick="delete_field('<?php echo $v["ccef_id"]; ?>');"  value="Delete" >
</div>
</div>
</div>
</div>
</div>
<?php
}

if(trim($v["extra_field_type"])=='2'){
?>
<div class="row">
<div class="col-md-12">
<div class="panel" style="background-color: #867979;">

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Checkbox field</h6>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">Label Name :</h6>
<label class="field prepend-icon">
<input type="text" name="label_name" id="label_name<?php echo $v["ccef_id"]; ?>" class="gui-input" value="<?php echo $v["label_name"]; ?>"   placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">Field Name :</h6>
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name<?php echo $v["ccef_id"]; ?>" class="gui-input" value="<?php echo $v["field_name"]; ?>"   placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #b94646;">No Of Option :</h6>
<label class="field prepend-icon">
<input type="text"  id="option_no1" name="value_no" value="<?php echo $v["value_no"]; ?>" readonly class="gui-input" placeholder="Option No.">
<b class="tooltip tip-right-top" id="option_no1_error"><em>Enter No. Of Option</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
$i=trim($v["value_no"]);
for($l=0;$l<$i;$l++){
$values=explode("||",$v["value"]);
$value=explode("::",$values[$l]);
$value=trimmer($value);
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Option Value :</h6>
<label class="field prepend-icon">
<input type="text" name="option_array1[]" id="option_array<?php echo $v["ccef_id"]; ?>[]" value="<?php echo $value[0]; ?>" class="gui-input" placeholder="Option value">
<b class="tooltip tip-right-top" id=""><em>Enter Option Value</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #b94646;">Option Name :</h6>
<label class="field prepend-icon">
<input type="text" name="option_array1[]" id="option_array<?php echo $v["ccef_id"]; ?>[]" value="<?php echo $value[1]; ?>"  class="gui-input" placeholder="Option name">
<b class="tooltip tip-right-top" id=""><em>Enter Option Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
}
?>
<div class="row" style="margin-top:15px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="button" onclick="update_field_drodown1('<?php echo $v["ccef_id"]; ?>','dropdown');" value="Update" >
<input class="btn btn-default btn-primary" type="button" onclick="delete_field('<?php echo $v["ccef_id"]; ?>');"  value="Delete" >
</div>
</div>
</div>
</div>
</div>
<?php
}
}
?>