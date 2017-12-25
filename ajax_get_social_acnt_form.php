<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$details=getDetails(doSelect("id,acnt_type,link",'ambit_cus_social_media',array("cus_id"=>$_SESSION["ar_id"],'acnt_type'=>$_POST["acnt_type"])));
if(empty($details)){
?>	
			<div class="form_row clearfix lab2_cont">
				<label class="lab2">Link<span class="required">*</span></label>
				<input type="text" value="" class="textfield slog_prop " id="link" name="link"  />
				<span id="link_error" class=""></span>
			</div>
			
			<div class="form_row clearfix">
				<input  type="submit"  value="add" class="button_green submit" />
			</div>
<?php
}else{
foreach($details as $k=>$v){
?>
<div class="form_row clearfix lab2_cont">
				<label class="lab2">Link<span class="required">*</span></label>
				<input type="text" value="<?php echo $v["link"]; ?>" class="textfield slog_prop " id="link" name="link"  />
				<span id="link_error" class=""></span>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $v["id"]; ?>" />
			<div class="form_row clearfix">
				<input  type="submit"  value="Update" class="button_green submit" />
</div>
<?php
}
}
?>