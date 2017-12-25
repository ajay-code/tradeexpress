<?php
session_start();
require_once("function.php");
$h='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var privacy=$("#privacy").val();
	if(privacy.trim()==""){
		alert("Please write Privacy Policy");
		$("#privacy").focus();
		return false;
	}
	}
function delete_privacy(id){
	 $.post("delete_privacy.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function edit_privacy(id){
	 $.post("edit_privacy.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function update_validation(id){
	var privacy=$("#update_privacy").val();
$.post("update_privacy.php",{id:id,privacy:privacy},function(r){
	 $("#ajax").html(r);
	 });
}
</script>
<section id="content_wrapper">

 
 
<header id="topbar" class="alt">

</header>
 
 

<div id="ajax">
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$privacy=getDetails(doselect1("privacy,id","ambit_privacy_policy",array()));
?>
<span class="panel-title">
Privacy Ploicy &nbsp <?php if(!empty($privacy)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_privacy('<?php echo $privacy[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a><?php } ?>
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
</div> 
<!-- ajax div -->

<!-- <script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
<script src="assets/js/plugins/c3charts/d3.min.js"></script>
<script src="assets/js/plugins/c3charts/c3.min.js"></script>
 
<script src="assets/js/plugins/circles/circles.js"></script>
 
<script src="assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
 
<script src="assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
 
<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
 
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
 
<script src="assets/js/demo/widgets.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/dashboard1.js"></script>
 
</body>
</html> -->
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
