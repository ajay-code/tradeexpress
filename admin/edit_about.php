<?php
session_start();
require_once("function.php");

?>


<section id="content_wrapper">
<header id="topbar" class="alt">
</header>
<?php
$about=getDetails(doselect1("about,id","ambit_about",array("id"=>$_POST["id"])));
?>
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mw1000 center-block">
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="margin-left:38px;">Update About Us
</div>
</div>
<div class="panel-body">
<div id="ajax_form">

<div id="common_field">
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<textarea class="gui-textarea" style="height:150px;" name="about" id="about_us" name="item_desc" placeholder="About Us"><?php echo $about[0]["about"];  ?></textarea>
<b class="tooltip tip-right-top" id="item_desc_error"><em>Write About Us</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>
<input type="hidden" name="id" value="<?php echo $about[0]["id"];  ?>" />
</div>

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Update" >
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
 
</section>