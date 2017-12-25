<?php
session_start();
require_once("function.php");
$k='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
$(document).ready(function () {
	$("#change_password").on('submit', (function (e) {
		var oldPassword = $("#old_password").val();
		var password = $("#password").val();
		var confirm_password = $("#confirm_password").val();



		if (oldPassword.trim() == "") {
			$("#old_password_error em").html("Required");
			$("#old_password").focus();
			return false;
		}
		if (password.trim() == "") {
			$("#password_error em").html("Required");
			$("#password").focus();
			return false;
		}
		if (confirm_password.trim() == "") {
			$("#confirm_password_error em").html("Required");
			$("#confirm_password").focus();
			return false;
		}
		$("#old_password").html("");
		$("#password").html("");
		$("#confirm_password").html("");

		$.ajax({
			url: "ajax_change_password.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function (r) {
				console.log(r);
				if (r == 'success') {
					alert("Update Successfull");
					window.location.reload();
				} else if (r == 'wrong password') {
					alert("Enter Correct Password");
				} else if (r == 'password did not match') {
					alert("Password Did Not match");
				} else {
					alert("Something Whent Wrong");
				}
			},
			error: function () {}
		});

	}));

});

</script>



<section id="content_wrapper">

    <header id="topbar" class="alt">

    </header>

    <section id="content" class="table-layout animated fadeIn">


        <div class="chute chute-center">
            <div class="mw1000 center-block">

                <div class="allcp-form">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="topbar-left">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-icon">
                                        <a href="index.php">
                                            <span class="fa fa-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-active">
                                        <a href="javascript:void(0);">Change Password</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Reset Password
                            </div>
                        </div>


                        <div class="panel-body">
                            <form method="post" action="javascript:void(0);" id="change_password">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="password" name="old_password" id="old_password" class="gui-input" placeholder="Old Password">
                                                <b class="tooltip tip-right-top" id="old_password_error">
                                                    <em>Enter Old Password</em>
                                                </b>
                                                <label for="tooltip1" class="field-icon">
                                                    <i class="fa fa-key"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="New Password">
                                                <b class="tooltip tip-right-top" id="password_error">
                                                    <em>Enter New Password</em>
                                                </b>
                                                <label for="tooltip1" class="field-icon">
                                                    <i class="fa fa-key"></i>
                                                </label>
                                            </label>
                                        </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="password" name="confirm_password" id="confirm_password" class="gui-input" placeholder="Confirm Password">
                                                    <b class="tooltip tip-right-top" id="confirm_password_error">
                                                        <em>Enter Confirm Password</em>
                                                    </b>
                                                    <label for="tooltip1" class="field-icon">
                                                        <i class="fa fa-key"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                
                        </div>
                        <div class="row" >
                            <div class="col-md-4">
                                <input class="btn btn-default btn-primary" type="submit" name="submit" value="Change">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>





            </div>
        </div>
        </div>

    </section>

</section>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
