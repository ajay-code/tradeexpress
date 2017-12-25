<?php
require_once("function.php");
$status=doDelete("ambit_privacy_policy",array("id"=>$_POST["id"]));
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$privacy=getDetails(doselect1("privacy,id","ambit_privacy_policy",array()));
?>
<span class="panel-title">
Privacy Ploicy &nbsp <?php if(!empty($privacy)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_privacy('<?php echo $privacy[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a>&nbsp <a href="javascript:void(0);" title="Delete" onclick="delete_privacy('<?php echo $privacy[0]["id"];  ?>');"><img src="icon/delete.png" width="25" /></a><?php }  ?>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php if(!empty($privacy)) echo $privacy[0]["privacy"]; else echo '<font color="red">Please write Privacy Policy above !!!</font>';  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>