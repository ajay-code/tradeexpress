<?php
session_start();
require_once("function.php");
$agi_id=trim($_SESSION["updated_id"]);
$db_name=trim($_POST["db_name"]);
$next_form=trim($_POST["next_form"]);
unset($_POST["db_name"]);
unset($_POST["next_form"]);

if(trim($next_form)=="add_general_items_photo"){
?>
<script type="text/javascript">
function delete_image(agip_id){
    $.post(
		"ajax_delete_general_item_image.php",
		{agip_id:agip_id,msg:"delete_general_item_image"},
		function(r){
			$("#ajax_photo").html(r);
		           }
		);
  }
</script>
<div id="ajax_fetch_form" style="display:none;">

<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl>Select Multiple Photo :<span class="required">*</span></label>
                    <input  id="image"  name="image[]" multiple  value="" type="file" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
</div>

			<div id="ajax_photo">
				<?php
				$image=getDetails(doSelect("agi_id,agip_id,image,status","add_general_items_photo",array("agi_id"=>$agi_id)));
				foreach($image as $k=>$v){
				?>
<img src="general_items_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["agip_id"];?>');"  title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
              <?php
               }
               ?>
</div>
<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_general_items_photo" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
</div>
<?php		
}
if(trim($next_form)=="extra_field"){
?>	

<div id="ajax_fetch_form" style="display:none;">

<?php
$select="agief_id,aa.gcef_id,bb.field_name,aa.value as prev_value,gic_id,extra_field_type,label_name,value_no,bb.value";
$from="add_general_items_extra_field as aa,general_cat_extra_field as bb";
$con=array("aa.gcef_id"=>"bb.gcef_id","aa.agi_id"=>$agi_id);
$extra_field_dtls=getDetails(doSelect1($select,$from,$con));
//print_r($extra_field_dtls);
foreach($extra_field_dtls as $k=>$v){
?>


<?php
if(trim($v["extra_field_type"])=="1"){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=''><?php echo $v["label_name"];  ?>:</label>                
					<select  id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
						for($i=0;$i< $v["value_no"];$i++){
							$value=explode("||",$v["value"]);
							$field_value=explode("::",$value[$i]);
						?>
						<option value="<?php echo $field_value[0];  ?>" <?php if($field_value[0]==$v["prev_value"]) echo 'selected'; ?> >
						<?php echo $field_value[1];  ?>
						</option>
						<?php
						}
						?>
					</select>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["agief_id"]); ?>" />
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="2"){
?>
	<?php
	for($i=0;$i<trim($v["value_no"]);$i++){
		$value=explode("||",$v["value"]);
		$field_value=explode("::",$value[$i]);
	?>
<?php
$checkbox=explode("||",$v["prev_value"]);
$checkbox_array=array();
foreach($checkbox as $k3=>$v3){
	array_push($checkbox_array,trim($v3));
	
}
$checkbox_array=trimmer($checkbox_array);
?>
<div class="form_row clearfix custom_fileds  price_type">
			<label class=''><?php echo $v["label_name"];  ?><span class="required">*</span></label>
			<div class="form_cat_left">
				<ul class="hr_input_radio">
					<li><input name="<?php echo $v["field_name"]; ?>[]" value="<?php echo $field_value[0];  ?>"  <?php if(in_array(trim($field_value[0]),$checkbox_array)) echo 'checked'; ?>   style="margin-top:0px;" type="checkbox" /> <label for="price_type_1"><?php echo $field_value[1];  ?></label></li>
				</ul>
			</div>
</div>
<?php
}
?>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["agief_id"]); ?>" />
<?php
}
?>
<br/>
<?php
if(trim($v["extra_field_type"])=="3"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl><?php echo $v["label_name"];  ?> :<span class="required">*</span></label>
                    <input name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" value="<?php echo $v["prev_value"]; ?>" type="text" class="textfield "  placeholder=" "/>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["agief_id"]); ?>" />
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="4"){
?>
<div class="form_row clearfix custom_fileds  post_content">
				<label class=><?php echo $v["label_name"];  ?> : <span class="required">*</span></label>
					<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						<div id="wp-post_content-editor-container" class="wp-editor-container">
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" ><?php echo $v["prev_value"]; ?></textarea></div>
					</div>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["agief_id"]); ?>" />
<?php
}
?>
<?php
}
?>
<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_general_items_extra_field" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Finish" >

</div>
<?php	
}
if(trim($db_name)=="add_general_items"){
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){
$testing=chk_genrl_itm_fld_exist("list_in_second_cat",$agi_id);
if($testing=="0"){
if(trim($_POST["list_in_second_cat"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('listed_in_second_cat'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('listed_in_second_cat');	
	}	
}
}

$testing=chk_genrl_itm_fld_exist("subtitle",$agi_id);
if($testing==""){
if(trim($_POST["subtitle"])!=""){
	if(is_numeric(show_price_classifiedDb_numeric('subtitle'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('subtitle');	
	}	
}
}
$testing1=chk_genrl_itm_fld_exist("start_price",$agi_id);
$testing2=chk_genrl_itm_fld_exist("reserve_price",$agi_id);
if($testing1==$testing2){
if(trim($_POST["reserve_price"])=="0"){
	if(is_numeric(show_price_classifiedDb_numeric('reserve_price'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('reserve_price');	
	}	
}
}

if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	echo ' || 606';
	die();
}	
}	
	
	
	
	
if(trim($_POST["reserve_price"])=="0"){
	$_POST["reserve_price"]=trim($_POST["custom_reserve_price"]);
}else{
	$_POST["reserve_price"]=trim($_POST["start_price"]);
}
unset($_POST["custom_reserve_price"]);
if(isset($_POST["allow_bid"])){
$_POST["allow_bid"]=$_POST["allow_bid"][0];
}
if(trim($_POST["listing_duration"])=="1"){
	$listing_length=explode("-",$_POST["listing_length"]);
	$listing_length=$listing_length[2].'-'.$listing_length[1].'-'.$listing_length[0];
	$_POST["listing_length"]=$listing_length;
}else{
	$_POST["listing_length"]=trim(seeMoreDetails("listing_length","add_general_items",array("agi_id"=>$agi_id)));
}

$payment="";
foreach($_POST["payment"] as $k=>$v){
	if($k != "0"){
		$payment.=" || ";
	}
	$payment.=$v;
}
$_POST["payment"]=$payment;
$_POST["status"]=0;
if(!isset($_POST["subtitle"])){
	$_POST["subtitle"]="";
}
if(isset($_POST["list_in_second_cat"]) && $_POST["list_in_second_cat"]=="0"){
	$_POST["cat1_id"]=$_POST["sub_cat1_id"]=$_POST["sub_sub_cat1_id"]=$_POST["sub_sub_sub_cat1_id"]="0";
}
$status=doUpdate('add_general_items',$_POST,array("agi_id"=>$agi_id));
if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_general_items ||".$agi_id);
	$status=doInsert($field,'paypal_transaction_table');
	if($status){
	$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
	$now_blnce=$prev_acnt_blnce-$charge_fee;
	doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));	
	}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_general_items_photo"){
if(isset($_FILES)){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"general_items_image/".$image_name);
		if($status){
			$field=array("agi_id"=>$agi_id,"image"=>$image_name);
			doInsert($field,"add_general_items_photo");
		}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_general_items_extra_field"){
	$_POST=array_chunk($_POST,2,true);
	foreach($_POST as $k8=>$v8){
	foreach($v8 as $k=>$v){	
	if(is_array($v)){
		$value="";
		foreach($v as $k1=>$v1){
			if($k1 != 0){
				$value.=' || ';
			}
		$value.=$v1;	
		}
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$value);
		doUpdate($db_name,$field,array('agief_id'=>$updtd_id));
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$v);
		doUpdate($db_name,$field,array('agief_id'=>$updtd_id));
	}
	break;
	}
	}
	unset($_SESSION["updated_id"]);
	echo ' || finish';
}else{
	echo ' || 0';
}
?>