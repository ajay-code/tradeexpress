<?php
require_once("function.php");
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Privacy Policy
</span>
</div>
<?php
$privacy=getDetails(doselect1("privacy,id","ambit_privacy_policy",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="privacy" class="field prepend-icon">
<textarea name="update_privacy" id="update_privacy" style="width: 938px; height: 233px;" placeholder="Update Privacy Policy.........." rows="10" cols="100"><?php echo $privacy[0]["privacy"];  ?></textarea>
</label>
</div>
<div class="section">
<div class="pull-right">
<input type="submit" name="update" onclick="update_validation('<?php echo $_POST["id"]; ?>')" class="btn  btn-primary" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>