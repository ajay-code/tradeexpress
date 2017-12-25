<?php
session_start();
require_once("function.php");
$k='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
	$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
	include("include/header.php");
?>
<script type="text/javascript">
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
							<div class="panel-title">Add General Items
							</div>
						</div>


						<div class="panel-body">
							<form method="post" action="javascript:void(0);" id="add_general_item" enctype="multipart/form-data">
							<?php
							$select="extra_field_type,label_name,field_name,value_no,value";
							$from="general_cat_extra_field";
							$con=array("gic_id"=>'1,2,3');
							$field_dtls=getDetails(selectWhereIn($select,$from,$con));
							/* echo '<pre>';
							print_r($field_dtls);
							echo '</pre>'; */
							foreach($field_dtls as $k=>$v){
							?>

								<?php
								if(trim($v["extra_field_type"])=="1"){
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label class="field select">
													<select id="cat4" name="cat_id">
														<option value="0">Select Category</option>

													</select>
													<i class="arrow"></i>
												</label>
											</div>
										</div>
									</div>
								<?php
								}
								?>

								<?php
								if(trim($v["extra_field_type"])=="2"){
								?>
									<div class="row">
										<div class="col-md-3 ">
											<div class="option-group field">
												<label class="option block option-primary">
													<input type="checkbox" name="payment[]" value="credit_card">
													<span class="checkbox"></span> Credit card
												</label>
											</div>
										</div>
									</div>
								<?php
								}
								?>

								<?php
								if(trim($v["extra_field_type"])=="3"){
								?>
									<div class="row">
										<div class="col-md-12" id="subtitle_custom">
											<div class="section">
												<h6 style="color: #999;">Sub-Title :</h6>
												<label class="field prepend-icon">
													<input type="text" name="subtitle" disabled id="subtitle1" class="gui-input" placeholder="Sub Title">
													<b class="tooltip tip-right-top" id="subtitle1_error">
														<em>Enter Sub Title</em>
													</b>
													<label for="tooltip1" class="field-icon">
														<i class="fa fa-sign-out"></i>
													</label>
												</label>
											</div>
										</div>
									</div>
								<?php
								}
								?>

								<?php
								if(trim($v["extra_field_type"])=="4"){
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label class="field prepend-icon">
													<textarea class="gui-textarea" id="item_desc" name="item_desc" placeholder="Item Description"></textarea>
													<b class="tooltip tip-right-top" id="item_desc_error">
														<em>Write Something About Item</em>
													</b>
													<label for="comment" class="field-icon">
														<i class="fa fa-list"></i>
													</label>
												</label>
											</div>
										</div>
									</div>
								<?php
								}
								?>


							<?php	
							}
							?>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

</section>
 

 
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
} else {
	echo '<script>window.location="utility-login.php";</script>';
}
?>
