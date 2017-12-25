<?php
session_start();
require_once("function.php");
$j='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">

function edit_admin_settings_logo(){
	 $.post("edit_admin_settings_logo.php",{},function(r){
	 $("#ajax").html(r);
	 });
}
$(document).ready(function() {
$("#upload_logo").on('submit',(function(e){  

$.ajax({
        	url: "ajax_update_logo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(r)
		    {
			if(r==1){
			window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
			}else{
			alert("Something went wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
</script>
<section id="content_wrapper">

 
<header id="topbar" class="alt">

</header>
<form method="post" action="javascript:void(0);" id="upload_logo"  enctype="multipart/form-data" > 
<div id="ajax">
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title" style="color: #111668;">
Admin Site Settings
</span>
</div>

<div class="panel-body pn" id="a17">
<font style="font-size: 1.5em;color: #c5972a;" >Logo &nbsp </font>
<span class="fa fa-pencil-square-o" style="cursor:pointer;font-size: 1.6em;color:#6f3030;" onclick="edit_admin_settings_logo();" title="Edit"></span>
<p><br/>
<img src="../images/<?php echo get_site_settings(17);  ?>" width="160" />
</p>
</div>


<div class="panel-footer"></div>
</div>
</div>
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
