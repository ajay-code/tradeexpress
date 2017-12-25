<?php
require_once("function.php");
$faq=getDetails(doSelect1("id,question,answer","ambit_faq",array("id"=>$_POST["id"])));

?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update FAQ
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<label for="question" class="field prepend-icon">
<textarea name="question" id="question" style="width: 938px; height: 136px;" placeholder="Write Question.........." rows="2" cols="100"><?php echo $faq[0]["question"];  ?></textarea>
</label>
</div>

<div class="section">
<label for="answer" class="field prepend-icon">
<textarea name="answer" id="answer" style="width: 938px; height: 136px;" placeholder="Write Answer.........." rows="5" cols="100"><?php echo $faq[0]["answer"]; ?></textarea>
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_validation('<?php echo $faq[0]["id"]; ?>');" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>