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
	var about_us=$("#about_us").val();
	if(about_us.trim()==""){
		alert("Please write About Us");
		$("#about_us").focus();
		return false;
	}
	}
function delete_about(id){
	 $.post("delete_about.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function edit_about(id){
	 $.post("edit_about.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}

$(document).ready(function() {
$("#update_about_us").on('submit',(function(e){  
	$.ajax({
        	url: "update_about.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			$("#ajax").html(data);
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  }); 

/* function update_validation(id){
	var about=$("#about_us").val();
 $.post("update_about.php",{id:id,about:about},function(r){
 	 $("#ajax").html(ajax);
	 });
} */
</script>
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







<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
