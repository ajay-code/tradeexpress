<?php
if(isset($_POST["option_number"]) && (trim($_POST["type"])!='1' || trim($_POST["type"])!='2' )){
$k=trim($_POST["option_number"]);
for($i=1;$i<=$k;$i++){
?>
<div class="row">
<div class="col-md-6">
Option value
<div class="section">
<label class="field prepend-icon">
<input type="text" name="option_array1[]" id="option_array1[]" class="gui-input" placeholder="Option value">
<b class="tooltip tip-right-top" id=""><em>Enter Option Value</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
Option Name
<div class="section">
<label class="field prepend-icon">
<input type="text" name="option_array1[]" id="option_array1[]" class="gui-input" placeholder="Option name">
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
}
?>


<?php
if(isset($_POST["field_type"]) && (trim($_POST["field_type"])=='1' || trim($_POST["field_type"])=='2' )){
?>
<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field prepend-icon">
<input type="text" name="label_name" id="label1" class="gui-input" placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name1" class="gui-input" placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field prepend-icon">
<input type="text"  id="option_no1" name="value_no" onkeyup="get_dropdown_option('option_no1','<?php echo $_POST["field_type"]; ?>','<?php echo $_POST["ajax_id"]; ?>');" class="gui-input" placeholder="Option No.">
<b class="tooltip tip-right-top" id="option_no1_error"><em>Enter No. Of Option</em></b>
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
<?php
if(isset($_POST["field_type"]) && (trim($_POST["field_type"])=='3' || trim($_POST["field_type"])=='4')){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field prepend-icon">
<input type="text" name="label_name" id="label1" class="gui-input" placeholder="Label name">
<b class="tooltip tip-right-top" id="label1_error"><em>Enter Label Name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field prepend-icon">
<input type="text" name="field_name" id="field_name1" class="gui-input" placeholder="Field name">
<b class="tooltip tip-right-top" id="field_name_error"><em>Enter Field Name</em></b>
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