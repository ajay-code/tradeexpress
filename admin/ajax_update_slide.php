<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$id=$_POST['id'];
$query="select * from slides where id='$id'";
$details=getSlideDetails($query);
$details=trimmer_db_array($details);
foreach($details as $k=>$v){
?>
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #111668;">Update
</div>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="slide_heading" id="slide_heading" value="<?php echo $v["heading"] ?>" class="gui-input" placeholder="For">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="text"  name="slide_text" id="slide_text" value="<?php echo $v["text"] ?>"  class="gui-input" placeholder="E-Mail">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<input type="hidden" name="id" id="id" value="<?php  echo $_POST["id"]; ?>" />
</div>
<div class="col-md-6">
<div class="section">
<h6 class="pull-right" id="add_country_error"></h6>
<label class="field prepend-icon">
<input type="file" name="upload" id="upload" class="gui-input" placeholder="Slide Image"><?php echo $v["path"] ?></input>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<input type="hidden" name="action" value="update">
<div class="row" style="">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" onclick="" name="submit" value="Update" >
</div>
</div>
</div>
<?php
}
?>