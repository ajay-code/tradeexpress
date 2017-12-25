<?php
require_once("function.php");
if(isset($_POST["id"])){
doUpdate1("ambit_privacy_policy",$_POST,array("id"=>$_POST["id"]));
}
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$privacy=getDetails(doselect1("privacy,id","ambit_privacy_policy",array()));
?>
<span class="panel-title">
Privacy Ploicy &nbsp <a href="javascript:void(0);" title="Edit" onclick="edit_privacy('<?php echo $privacy[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php echo $privacy[0]["privacy"];  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>