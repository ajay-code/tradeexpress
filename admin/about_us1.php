<?php
require_once("function.php");
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update About Us
</span>
</div>
<?php
$about=getDetails(doselect1("about,id","ambit_about",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="about" class="field prepend-icon">
<textarea name="about_us" id="about_us" style="width: 939px; height: 267px;" placeholder="Update About Us.........." rows="10" cols="100"><?php echo $about[0]["about"];  ?></textarea>
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