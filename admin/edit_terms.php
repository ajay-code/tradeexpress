<?php
require_once("function.php");
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Terms & Services
</span>
</div>
<?php
$terms=getDetails(doselect1("terms,id","ambit_terms_services",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="terms" class="field prepend-icon">
<textarea name="update_terms" id="update_terms" style="width: 938px; height: 258px;" placeholder="Update terms & Services.........." rows="10" cols="100"><?php echo $terms[0]["terms"];  ?></textarea>
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