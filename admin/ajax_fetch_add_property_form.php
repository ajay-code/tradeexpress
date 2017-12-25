<?php
session_start();
require_once("function.php");
if(isset($_POST["msg"]) && trim($_POST["msg"])=="price_field"){
if(trim($_POST["values"])=="1"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Asking price :</h6>
<label class="field prepend-icon">
<input type="hidden" name="price1[]" class="gui-input" value="Asking price" />
<!-- <input type="hidden" name="price1[]" class="gui-input" value="asking_price" /> -->

<input type="text" name="price1[]"  id="asking_price" class="gui-input" placeholder="Asking Price">
<b class="tooltip tip-right-top" id="asking_price_error"><em>Asking Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<?php
}
if(trim($_POST["values"])=="2"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Enquiries over :</h6>
<label class="field prepend-icon">
<input type="hidden" name="price2[]" class="gui-input" value="Enquiries over" />
<!-- <input type="hidden" name="price2[]" class="gui-input" value="enquiries_over" /> -->

<input type="text" name="price2[]"  id="enquiries_over" class="gui-input" placeholder="Enquiries over">
<b class="tooltip tip-right-top" id="enquiries_over_error"><em>Enquiries over</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<?php
}
if(trim($_POST["values"])=="3"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Auction Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price3[]" class="gui-input" value="Auction Date" />
<!-- <input type="hidden" name="price3[]" class="gui-input" value="auction_date" /> -->

<input type="text" id="datepicker3"  name="price3[]" class="gui-input" placeholder="Auction Date">
</label>
</div>
</div>
<?php
}
if(trim($_POST["values"])=="4"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Tender Closing Date :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price4[]" class="gui-input" value="Tender Closing Date" />
<!-- <input type="hidden" name="price4[]" class="gui-input" value="tender_close_date" /> -->

<input type="text" id="datepicker4"  name="price4[]" class="gui-input" placeholder="Tender Closing Date">
</label>
</div>
</div>
<?php
}
if(trim($_POST["values"])=="5"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price By negotiation :</h6>
<label class="field select">
<input type="hidden" name="price5[]" class="gui-input" value="Price by negotiation" />
<!-- <input type="hidden" name="price5[]" class="gui-input" value="negotiation" /> -->

<select name="price5[]" id="negotiation"  >
<option value="1">Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<?php
}
if(trim($_POST["values"])=="6"){
?>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Deadline Private Treaty By :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="hidden" name="price6[]" class="gui-input" value="Deadline Private Treaty By" />
<!-- <input type="hidden" name="price6[]" class="gui-input" value="deadline_date" /> -->

<input type="text" id="datepicker5"  name="price6[]" class="gui-input" placeholder="Deadline Private Treaty By">
</label>
</div>
</div>
<?php
}
?>
<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery.spectrum.min.js"></script>
<script src="assets/allcp/forms/js/jquery.stepper.min.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/forms-widgets.js"></script>
<?php
}
if(isset($_POST["msg"]) && trim($_POST["msg"])=="contact_field"){
if(trim($_POST["val"])=="1"){
?>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Are you a licensed real estate agent? :</h6>
<label class="field select">
<select name="realestate_agent" id="realestate_agent"  >
<option value="0">No</option>
<option value="1">Yes</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-4">
	<div class="section">
	<h6 style="color: #999;">Email Address :</h6>
	<label class="field prepend-icon">
	<input type="email" name="agent_email"  id="agent_email" class="gui-input" placeholder="email">
	<b class="tooltip tip-right-top" id="agent_email_error"><em>Enter Email</em></b>
	<label for="tooltip1" class="field-icon">
	<i class="fa fa-sign-out"></i>
	</label>
	</label>
	</div>
</div>
<div class="col-md-4">
	<div class="section">
	<h6 style="color: #999;">Your Name :</h6>
	<label class="field prepend-icon">
	<input type="text" name="name"  id="name" class="gui-input" placeholder="name">
	<b class="tooltip tip-right-top" id="name_error"><em>Enter name</em></b>
	<label for="tooltip1" class="field-icon">
	<i class="fa fa-sign-out"></i>
	</label>
	</label>
	</div>
</div>

</div>


<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Agency :</h6>
<label class="field prepend-icon">
<input type="text" name="agency"  id="agency" class="gui-input" placeholder="Agency">
<b class="tooltip tip-right-top" id="agency_error"><em>Agency</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Mobile Ph. :</h6>
<label class="field prepend-icon">
<input type="text" name="mobile"  id="mobile" class="gui-input" placeholder="Mobile No.">
<b class="tooltip tip-right-top" id="mobile_error"><em>Mobile No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Landline No. :</h6>
<label class="field prepend-icon">
<input type="text" name="landline"  id="landline" class="gui-input" placeholder="Landline No.">
<b class="tooltip tip-right-top" id="landline_error"><em>Landline No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<?php
}
if(trim($_POST["val"])=="2"){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Your Name :</h6>
<label class="field prepend-icon">
<input type="text" name="name"  id="name" class="gui-input" placeholder="name">
<b class="tooltip tip-right-top" id="name_error"><em>Enter name</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
	<div class="section">
		<h6 style="color: #999;">Email Address :</h6>
		<label class="field prepend-icon">
		<input type="email" name="agent_email"  id="agent_email" class="gui-input" placeholder="email">
		<b class="tooltip tip-right-top" id="agent_email_error"><em>Enter Email</em></b>
		<label for="tooltip1" class="field-icon">
		<i class="fa fa-sign-out"></i>
		</label>
		</label>
	</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Agency :</h6>
<label class="field prepend-icon">
<input type="text" name="agency"  id="agency" class="gui-input" placeholder="Agency">
<b class="tooltip tip-right-top" id="agency_error"><em>Agency</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Mobile Ph. :</h6>
<label class="field prepend-icon">
<input type="text" name="mobile"  id="mobile" class="gui-input" placeholder="Mobile No.">
<b class="tooltip tip-right-top" id="mobile_error"><em>Mobile No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Landline No. :</h6>
<label class="field prepend-icon">
<input type="text" name="landline"  id="landline" class="gui-input" placeholder="Landline No.">
<b class="tooltip tip-right-top" id="landline_error"><em>Landline No.</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-12">
<h6>2 Agent Details</h6>
</div>
  <div class="col-md-3">
    <div class="section">
      <h6 style="color: #999;">Name :</h6>
      <label class="field prepend-icon">				<input type="text" name="name2"  id="name2" class="gui-input" placeholder="Name">				<b class="tooltip tip-right-top" id="name_error2"><em>Name</em></b>				<label for="tooltip1" class="field-icon">					<i class="fa fa-sign-out"></i>				</label>			</label>		
    </div>
  </div>
  <div class="col-md-3">
    <div class="section">
		<h6 style="color: #999;">Email Address :</h6>
		<label class="field prepend-icon">				
		<input type="email" name="email_address2" id="email_address2" class="gui-input" placeholder="Email Address">				
		<b class="tooltip tip-right-top" id="name_error2"><em>Email Address</em></b>				
		<label for="tooltip1" class="field-icon">					
		<i class="fa fa-sign-out"></i>				
		</label>			
		</label>		
    </div>
  </div>
  <div class="col-md-3">
    <div class="section">
      <h6 style="color: #999;">Mobile Ph. :</h6>
      <label class="field prepend-icon">				<input type="text" name="mobile2"  id="mobile2" class="gui-input" placeholder="Mobile No.">				<b class="tooltip tip-right-top" id="mobile_error2"><em>Mobile No.</em></b>				<label for="tooltip1" class="field-icon">					<i class="fa fa-sign-out"></i>				</label>			</label>		
    </div>
  </div>
  <div class="col-md-3">
    <div class="section">
      <h6 style="color: #999;">Landline No. :</h6>
      <label class="field prepend-icon">				<input type="text" name="landline2"  id="landline2" class="gui-input" placeholder="Landline No.">				<b class="tooltip tip-right-top" id="landline_error2"><em>Landline No.</em></b>				<label for="tooltip1" class="field-icon">					<i class="fa fa-sign-out"></i>				</label>			</label>		
    </div>
  </div>
</div>
</div>

<?php
}
}
?>
