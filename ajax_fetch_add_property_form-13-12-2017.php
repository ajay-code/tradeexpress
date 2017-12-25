<?php
	session_start();
	require_once("function.php");
	if(isset($_POST["msg"]) && trim($_POST["msg"])=="price_field"){
	if(trim($_POST["values"])=="1"){
?>
		<div class="form_row clearfix custom_fileds  owner_name">
			<label class=r_lbl>Asking Price :<span class="required">*</span></label>
            <input type="hidden" name="price1[]" class="gui-input" value="Asking price" />
					<input name="price1[]"  id="asking_price" value="" type="text" class="textfield Pricedatepicker3 hasDatepicker" style="max-width:370px !important;"/>
</div>
<style type="text/css">
	.select-file-div{
		border: 1px solid rgb(0, 0, 0);
		width: 139px;
		padding: 3px;
		background-color: rgb(255, 255, 255);
		text-align: center;
		border-radius: 6px;
		font-weight: 900;
		position: relative;
		top: 33px;
	}
	#selectphoto{
		right: 232px;
		position: relative;
		width: 654px;
	}
</style>
<?php
}
if(trim($_POST["values"])=="2"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                    <input type="hidden" name="price2[]" class="gui-input" value="Enquiries over" />
					<input name="price2[]"  id="enquiries_over" value="" type="text" class="textfield Pricedatepicker3 hasDatepicker" style="max-width:370px !important;"/>
</div>
<?php
}
if(trim($_POST["values"])=="3"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Auction Date :<span class="required">*</span></label>
                    <input type="hidden" name="price3[]" class="gui-input" value="Auction Date" />
					<input id="datepicker3"  name="price3[]" value="" type="text" class="textfield Pricedatepicker3 hasDatepicker" style="max-width:370px !important;"/>
</div>
<!--script>
$( function() {
$( "#datepicker3" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script-->	
<?php
}
if(trim($_POST["values"])=="4"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                    <input type="hidden" name="price4[]" class="gui-input" value="Tender Closing Date" />
					<input id="datepicker4"  name="price4[]" value="" type="text" onclick="getDatePicker('datepicker4');" class="textfield Pricedatepicker3 hasDatepicker" style="max-width:370px !important;"/>
</div>
<!--script>
$( function() {
$( "#datepicker4" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script-->	
<?php
}
if(trim($_POST["values"])=="5"){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Price By negotiation :</label> 
				<input type="hidden" name="price5[]" class="gui-input" value="Price by negotiation" />
					<select name="price5[]" id="negotiation"  class="textfield textfield_x " >
						<option value="1">Yes</option>
					</select>
</div>
<?php
}
if(trim($_POST["values"])=="6"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                   <input type="hidden" name="price6[]" class="gui-input" value="Deadline Private Treaty By" />
				   <input id="datepicker5"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3" style="max-width:370px !important;"/>
</div>
<!--script>
$( function() {
$( "#datepicker5" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script-->	
<?php
}
?>
<?php
}
if(isset($_POST["msg"]) && trim($_POST["msg"])=="contact_field"){
	if(trim($_POST["val"])=="1"){
?>
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Are you a licensed real estate agent? :</label> 
		<select name="realestate_agent" id="realestate_agent"  class="textfield textfield_x " >
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Your Name :<span class="required">*</span></label>
        <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Email Address :<span class="required">*</span></label>
        <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<!-- <div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Agency :<span class="required">*</span></label>
        <input name="agency"  id="agency" value="" type="text" class="textfield "  placeholder=" "/> -->
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
        <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Landline No. :<span class="required">*</span></label>
        <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	   <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>
	   <!--<div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
	<?php


}
}
?>
<?php
if(isset($_POST["msg"]) && trim($_POST["msg"])=="contact_field"){
if(trim($_POST["val"])=="2"){
?>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Your name :<span class="required">*</span></label>
        <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Email Address :<span class="required">*</span></label>
        <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Agency :<span class="required">*</span></label>
        <input name="agency"  id="agency" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
        <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Landline No. :<span class="required">*</span></label>
        <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<h4><b>2 Agent Details</b></h4>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Name :<span class="required">*</span></label>
	<input name="name2"  id="name2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Email Address :<span class="required">*</span></label>
	<input name="email_address2"  id="email_address2" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
    <input name="mobile2"  id="mobile2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Landline No. :<span class="required">*</span></label>
	<input name="landline2"  id="landline2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
<?php
	}
}
	?>


<?php
if(isset($_POST["msg"]) && trim($_POST["msg"])=="realestate_agent"){	
	if(trim($_POST["val"])=="1"){ ?>
	  	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Your name :<span class="required">*</span></label>
        <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Email Address:<span class="required">*</span></label>
        <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Agency :<span class="required">*</span></label>
        <input name="agency"  id="agency" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
        <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Landline No. :<span class="required">*</span></label>
    <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
     <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Website address :<span class="required">*</span></label>
     <input name="website_address"  id="website_address" value="" type="text" class="textfield "  placeholder=" "/>
        </div>
     <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Logo :<span class="required">*</span></label>
    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
         </div>
        <!--<div class="form_row clearfix custom_fileds  owner_name">
		    <label class=r_lbl>Upload Photo (Size 90x90px) :<span class="required">*</span></label>
		    <div class="select-file-div">Select File</div>
		    <input name="selectphoto"  id="selectphoto" value="" type="file" class="textfield "  placeholder=" "/>
        </div>-->
    <input type="hidden" name="next_form" value="photo_upload" />
    <input type="hidden" name="db_name" value="add_property" />
    <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
       <h4><b>2 Agent Details</b></h4>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Name :<span class="required">*</span></label>
	<input name="name2"  id="name2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Email Address :<span class="required">*</span></label>
	<input name="email_address2"  id="email_address2" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
    <input name="mobile2"  id="mobile2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Landline No. :<span class="required">*</span></label>
		<input name="landline2"  id="landline2" value="" type="text" class="textfield "  placeholder=" "/>
	</div>	
	<div class="form_row clearfix custom_fileds  owner_name">
		    <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
		    <div class="select-file-div">Select File</div>
		    <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>    
<?php
}
if(trim($_POST["val"])=="0"){ ?>
	  
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Email Address :<span class="required">*</span></label>
    <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Your name :<span class="required">*</span></label>
    <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
    <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
	<label class=r_lbl>Landline No. :<span class="required">*</span></label>
    <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
	<div class="form_row clearfix custom_fileds  owner_name">
		    <label class=r_lbl>Upload Photo (Size 90x90px) :<span class="required">*</span></label>
		    <div class="select-file-div">Select File</div>
		    <input name="selectphoto"  id="selectphoto" value="" type="file" class="textfield "  placeholder=" "/>
        </div>
<?php
}

}
?>

	