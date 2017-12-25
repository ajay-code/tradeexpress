<?php
session_start();
require_once("function.php");
$acm_id=trim($_SESSION["updated_id"]);
$db_name=trim($_POST["db_name"]);
$next_form=trim($_POST["next_form"]);
unset($_POST["db_name"]);
unset($_POST["next_form"]);

if(trim($next_form)=="photo_upload"){
?>
<script type="text/javascript">
function delete_image(acmp_id){
    $.post(
		"ajax_delete_car_image.php",
		{acmp_id:acmp_id,msg:"delete_car_motorcycle_image"},
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
			<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("acm_id,acmp_id,image,status","add_car_motorcycle_photo",array("acm_id"=>$acm_id)));
				foreach($image as $k=>$v){
				?>
<img src="car_motorcycle_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["acmp_id"];?>');"  title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
              <?php
               }
               ?>
            </div>

</div>


<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_car_motorcycle_photo" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >

</div>

<?php		
}
if(trim($next_form)=="extra_field"){
?>	

<div id="ajax_fetch_form" style="display:none;">

<?php
$select="acmef_id,aa.ccef_id,bb.field_name,aa.value as prev_value,cc_id,extra_field_type,label_name,value_no,bb.value";
$from="add_car_motorcycle_extra_field as aa,car_cat_extra_field as bb";
$con=array("aa.ccef_id"=>"bb.ccef_id","aa.acm_id"=>$acm_id);
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />

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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />

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

<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["acmef_id"]); ?>" />
<?php
}
?>

<?php
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_car_motorcycle_extra_field" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Continue" >
</div>
<?php	
}
?>

<?php
if(trim($next_form)=="special_features_and_price"){
?>	

<div id="ajax_fetch_form" style="display:none;">

<?php
$select="acmlf_id,Feature_Combo,Featured,Highlight,Bold_Title,MotorWeb_Basic_Report";
$from="add_car_motorcycle_listing_features";
$con=array("acm_id"=>$acm_id);
$featured_dtls=getDetails(doSelect1($select,$from,$con));
//print_r($extra_field_dtls);
$featured_dtls=trimmer_db_array($featured_dtls);
foreach($featured_dtls as $k=>$v){
?>

<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Feature_Combo" <?php if($v["Feature_Combo"]=="1") echo 'checked'; ?> value="1">
	</span>
	<span>Feature Combo<?php echo show_price_classifiedDb('Feature_Combo');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>2.5 times more view and watchlist add than basic listing</strong></p></span>
                                    <span class="days"><p><strong>Appear first result search in category</strong></p></span>
                                    <span class="days"><p><strong>Distictive yellow background</strong></p></span>
                                    <span class="days"><p><strong>Bright yellow border</strong></p></span>
                                    <span class="days"><p><strong>Bold Title</strong></p></span>
									</div>
								</div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
                           
            </div>
            </div>
                       <!-- End #panel1 -->
</div>
<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Featured"  <?php if($v["Featured"]=="1") echo 'checked'; ?>  value="1">
	</span>
	<span> Featured <?php echo show_price_classifiedDb('Featured');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Appear first result search in category</strong></p></span>
                                    <span class="days"><p><strong>Distictive yellow background</strong></p></span>
									</div>
								</div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
                           
            </div>
            </div>
                       <!-- End #panel1 -->
</div>

<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Highlight" <?php if($v["Highlight"]=="1") echo 'checked'; ?> value="1">
	</span>
	<span>Highlight <?php echo show_price_classifiedDb('Highlight');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Stand Out Search result with yellow border</strong></p></span>
									</div>
								</div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
                           
            </div>
            </div>
                       <!-- End #panel1 -->
</div>

<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="Bold_Title" <?php if($v["Bold_Title"]=="1") echo 'checked'; ?> value="1">
	</span>
	<span>Bold Title <?php echo show_price_classifiedDb('Bold_Title');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Stand Out Search result with Bold Title</strong></p></span>
									</div>
								</div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
                           
            </div>
            </div>
                       <!-- End #panel1 -->
</div>

<br/>
<br/>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="MotorWeb_Basic_Report" <?php if($v["MotorWeb_Basic_Report"]=="1") echo 'checked'; ?> value="1">
	</span>
	<span>MotorWeb Basic Report <?php echo show_price_classifiedDb('MotorWeb_Basic_Report');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Basic report appear on your listing untill sold</strong></p></span>
									</div>
								</div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
                           
            </div>
            </div>
                       <!-- End #panel1 -->
</div>

<?php
}
?>
<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_car_motorcycle_listing_features" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Finish" >

</div>
	
<?php	
}
?>

<?php
if(trim($db_name)=="add_car_motorcycle"){
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){
$testing=chk_car_fld_exist("list_in_second_cat",$acm_id);
if($testing=="0"){
if(trim($_POST["list_in_second_cat"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('listed_in_second_cat'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('listed_in_second_cat');	
	}	
}
}

$testing=chk_car_fld_exist("subtitle",$acm_id);
if($testing==""){
if(isset($_POST["subtitle"]) && trim($_POST["subtitle"])!=""){
	if(is_numeric(show_price_classifiedDb_numeric('subtitle'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('subtitle');	
	}	
}
}

$testing1=chk_car_fld_exist("start_price",$acm_id);
$testing2=chk_car_fld_exist("reserve_price",$acm_id);
if($testing1==$testing2){
if(trim($_POST["reserve_price"])=="0"){
	if(is_numeric(show_price_classifiedDb_numeric('reserve_price'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('reserve_price');	
	}	
}
}
$testing=chk_car_fld_exist("listing_type",$acm_id);
if($testing==1){
if(trim($_POST["listing_type"])=="0"){
	if(is_numeric(show_price_classifiedDb_numeric('classified'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('classified');	
	}	
}
}
$testing=chk_car_fld_exist("listing_type",$acm_id);
if($testing==0){
if(trim($_POST["listing_type"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('auction'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('auction');	
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
	$_POST["listing_length"]=trim(seeMoreDetails("listing_length","add_car_motorcycle",array("acm_id"=>$acm_id)));
}

$_POST["status"]=0;
if(!isset($_POST["subtitle"])){
	$_POST["subtitle"]="";
}
if(isset($_POST["list_in_second_cat"]) && $_POST["list_in_second_cat"]=="0"){
	$_POST["cat1_id"]=$_POST["sub_cat1_id"]=$_POST["sub_sub_cat1_id"]="0";
}
$status=doUpdate('add_car_motorcycle',$_POST,array("acm_id"=>$acm_id));
if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_car_motorcycle ||".$acm_id);
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
if($db_name=="add_car_motorcycle_photo"){
if(isset($_FILES)){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"car_motorcycle_image/".$image_name);
		if($status){
			$field=array("acm_id"=>$acm_id,"image"=>$image_name);
			doInsert($field,"add_car_motorcycle_photo");
		}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_car_motorcycle_extra_field"){
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
		doUpdate($db_name,$field,array('acmef_id'=>$updtd_id));
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$v);
		doUpdate($db_name,$field,array('acmef_id'=>$updtd_id));
	}
	break;
	}
	}
	//unset($_SESSION["updated_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_car_motorcycle_listing_features"){
		
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){
$testing=chk_car_listing_fld_exist("Feature_Combo",$acm_id);
if($testing=="0"){
if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Feature_Combo'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Feature_Combo');	
	}	
}
}

$testing=chk_car_listing_fld_exist("Featured",$acm_id);
if($testing=="0"){
if(isset($_POST["Featured"]) &&  trim($_POST["Featured"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Featured'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Featured');	
	}	
}
}

$testing=chk_car_listing_fld_exist("Highlight",$acm_id);
if($testing=="0"){
if(isset($_POST["Highlight"]) &&  trim($_POST["Highlight"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Highlight'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Highlight');	
	}	
}
}

$testing=chk_car_listing_fld_exist("Bold_Title",$acm_id);
if($testing=="0"){
if(isset($_POST["Bold_Title"]) &&  trim($_POST["Bold_Title"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Bold_Title'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Bold_Title');	
	}	
}
}

$testing=chk_car_listing_fld_exist("MotorWeb_Basic_Report",$acm_id);
if($testing=="0"){
if(isset($_POST["MotorWeb_Basic_Report"]) &&  trim($_POST["MotorWeb_Basic_Report"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('MotorWeb_Basic_Report'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('MotorWeb_Basic_Report');	
	}	
}
}


if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	doInsert(array("acm_id"=>$_SESSION["updated_id"]),$db_name);
	unset($_SESSION["updated_id"]);
	echo ' || finish || 606';
	die();
}
}	
	$_POST["acm_id"]=$acm_id;	
	$status=doUpdate($db_name,$_POST,array("acm_id"=>$acm_id));
	if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_car_motorcycle ||".$acm_id);
	$status=doInsert($field,'paypal_transaction_table');
	if($status){
	$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
	$now_blnce=$prev_acnt_blnce-$charge_fee;
	doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));	
	}
	}
	
	unset($_SESSION["updated_id"]);
	echo ' || finish || ';
}else{
	echo ' || 0';
}
}
?>

