<?php
session_start();
require_once("function.php");
if(isset($_POST["id"])){
doUpdate("ambit_about",$_POST,array("id"=>$_POST["id"]));
}
?>
<form action="javascript:void(0);" id="update_about_us" method="post" enctype="multipart/form-data">
<div id="ajax">
<section id="content_wrapper">

 
 
<header id="topbar" class="alt">

</header>

<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<?php
$about=getDetails(doselect1("about,id","ambit_about",array()));
?>
<div class="ph20">
<h4> About Us &nbsp <?php if(!empty($about)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_about('<?php echo $about[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a><?php } ?> </h4>
<hr class="alt short">
<p class="text-muted"> 
<?php if(!empty($about)) echo $about[0]["about"]; else echo '<font color="red">Please write about above !!!</font>';  ?>
</p>
 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</section>
 
</section>
</div> 
<!-- ajax div -->
</form>