<?php
require_once("function.php");
if(isset($_POST["id"])){
doUpdate1("ambit_terms_services",$_POST,array("id"=>$_POST["id"]));
}
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$terms=getDetails(doselect1("terms,id","ambit_terms_services",array()));
?>
<span class="panel-title">
Terms & Services &nbsp <a href="javascript:void(0);" title="Edit" onclick="edit_terms('<?php echo $terms[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php echo $terms[0]["terms"];  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>