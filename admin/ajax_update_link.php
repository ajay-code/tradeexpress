<?php
session_start();
require_once("../function.php");
$_POST=trimmer($_POST);
$select="id,for_link,link,type,status";
$from="admin_website_link";
$con=array("id"=>$_POST["id"]);
$details=getDetails(doSelect($select,$from,$con));
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
<input type="text"  name="for_link" id="for_link" value="<?php echo $v["for_link"] ?>" readonly  class="gui-input" placeholder="For">
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
<input type="text"  name="link" id="link" value="<?php echo $v["link"] ?>"  class="gui-input" placeholder="E-Mail">
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<input type="hidden" name="id" id="id" value="<?php  echo $_POST["id"]; ?>" />
</div>
<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary"   type="submit" name="submit" value="Update" >
</div>
</div>
</div>
<?php
}
?>