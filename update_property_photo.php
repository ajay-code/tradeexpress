<?php
session_start();
require_once("function.php");
$ap_id=trim($_SESSION["updated_id"]);
$next_form=trim($_POST["next_form"]);
$db_name=trim($_POST['db_name']);
unset($_POST["next_form"]);
unset($_POST["db_name"]);
?>
<!--  PHOTO UPLOAD FORM  -->
<?php
if($next_form=='photo_upload'){
?>
<script type="text/javascript">
function delete_image(app_id){
    $.post(
		"ajax_delete_property_image.php",
		{app_id:app_id,msg:"delete_property_image"},
		function(r){
			$("#ajax_photo").html(r);
		           }
		);
  }
  
function cahnge_video(){
	var link=$("#video").val().trim();
	$('#ifrm').attr('src',link);
}
</script>
<?php
$video_link=trim(seeMoreDetails("video","add_property_video",array("ap_id"=>$ap_id)));

?>
<div id="ajax_fetch_form" style="display:none;">

<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl>Select Multiple Photo :<span class="required">*</span></label>
                    <input  id="image"  name="image[]" multiple  value="" type="file" class="textfield "  placeholder=" "/>
				<span id="owner_name_error " class="message_error2 "></span>     
</div>

			<div id="ajax_photo">
			<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("ap_id,app_id,image,status","add_property_photo",array("ap_id"=>$ap_id)));
				foreach($image as $k=>$v){
				?>
<img src="property_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">

<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["app_id"];?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
<?php
}
?>
            </div>

<div class="form_row clearfix custom_fileds  owner_name">
					<label class=r_lbl>Video Link :</label>
                    <input name="video" id="video" value="<?php echo $video_link; ?>" onkeyup="cahnge_video();" type="text" class="textfield "  placeholder=" "/>
</div>

<div class="form_row clearfix custom_fileds  owner_name">
<iframe class="embed-responsive-item" id="ifrm" src="<?php echo $video_link; ?>" frameborder="0" allowfullscreen></iframe>
</div>

<input type="hidden" name="next_form" value="extra_field" />
<input type="hidden" name="db_name" value="add_property_photo" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >

</div>

<?php
}
?>
<!-- END PHOTO UPLOAD FORM  -->


<!--  EXTRA FIELD FORM  -->
<?php
if($next_form=='extra_field'){
?>

<div id="ajax_fetch_form" style="display:none;">

<?php
$select="apef_id,aa.pcef_id,bb.field_name,aa.value as prev_value,pc_id,extra_field_type,label_name,value_no,bb.value";
$from="add_property_extra_field as aa,property_cat_extra_field as bb";
$con=array("aa.pcef_id"=>"bb.pcef_id","aa.ap_id"=>$ap_id);
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["apef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["apef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["apef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["apef_id"]); ?>" />
<?php
}
?>

<?php
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_property_extra_field" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Continue" >
</div>
	
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->




<?php
if(trim($next_form)=="special_features_and_price"){
?>	

<div id="ajax_fetch_form" style="display:none;">

<?php
$select="aplf_id,Feature_Combo,Featured,Highlight,Bold_Title";
$from="add_property_listing_features";
$con=array("ap_id"=>$ap_id);
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
                    <div class="col-md-3 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Fee</h3>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Fee</h3>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Fee</h3>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                            <h3>Fee</h3>
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


<?php
}
?>
<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_property_listing_features" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Finish" >

</div>
	
<?php	
}
?>

<?php
if($db_name=="add_property"){
unset($_POST["country"]);
unset($_POST["city"]);
$price_table_field=array();
$price_type=trim($_POST["price"]);
$price_table_field["price_type"]=$price_type;
$price_table_field["label_name"]=$_POST["price".$price_type][0];
if($price_type=='3' || $price_type=='4' || $price_type=='6'){
$value=explode("-",$_POST["price".$price_type][1]);
$value=$value[2].'-'.$value[1].'-'.$value[0];
$price_table_field["value"]=$value;
}else{
$price_table_field["value"]=$_POST["price".$price_type][1];	
}
unset($_POST["price"]);
unset($_POST["price".$price_type]);
unset($price_type);



$contact_table_field=array();
if(trim($_POST["contact_type"])==1){
	$contact_table_field["contact_type"]=trim($_POST["contact_type"]);
	$contact_table_field["realestate_agent"]=trim($_POST["realestate_agent"]);
	$contact_table_field["name"]=trim($_POST["name"]);
	$contact_table_field["agency"]=trim($_POST["agency"]);
	$contact_table_field["mobile"]=trim($_POST["mobile"]);
	$contact_table_field["landline"]=trim($_POST["landline"]);
	unset($_POST["realestate_agent"]);
}else{
	$contact_table_field["contact_type"]=trim($_POST["contact_type"]);
	$contact_table_field["name"]=trim($_POST["name"]);
	$contact_table_field["agency"]=trim($_POST["agency"]);
	$contact_table_field["mobile"]=trim($_POST["mobile"]);
	$contact_table_field["landline"]=trim($_POST["landline"]);
}
unset($_POST["contact_type"]);
unset($_POST["name"]);
unset($_POST["agency"]);
unset($_POST["mobile"]);
unset($_POST["landline"]);

$listing_duration=explode("-",$_POST["listing_duration"]);
$listing_duration=$listing_duration[2].'-'.$listing_duration[1].'-'.$listing_duration[0];
$_POST["listing_duration"]=$listing_duration;

$open_home_date=explode("-",$_POST["open_home_date"]);
$open_home_date=$open_home_date[2].'-'.$open_home_date[1].'-'.$open_home_date[0];
$_POST["open_home_date"]=$open_home_date;

$_POST["status"]=0;

$status=doUpdate("add_property",$_POST,array("ap_id"=>trim($_SESSION["updated_id"])));
if($status){
	$status=doUpdate("add_property_price_dtls",$price_table_field,array("ap_id"=>trim($_SESSION["updated_id"])));
	if($status){
	$status=doUpdate("add_property_contact_dtls",$contact_table_field,array("ap_id"=>trim($_SESSION["updated_id"])));
    if($status){
		echo ' || 1';
	}else{
		echo ' || 0';
	}	
	}else{
		echo ' || 0';
	}
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_property_photo"){
if(isset($_FILES)){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"property_image/".$image_name);
		if($status){
			$field=array("ap_id"=>$ap_id,"image"=>$image_name);
			doInsert($field,"add_property_photo");
		}
	}
	if(isset($_POST["video"]) && trim($_POST["video"])!=""){
		$field=array("ap_id"=>$ap_id,"video"=>trim($_POST["video"]));
		$prev_video=getDetails(doSelect("*","add_property_video",array("ap_id"=>$ap_id)));
	
		if(empty($prev_video)){
		doInsert($field,'add_property_video');
		}else{
		doUpdate("add_property_video",$field,array("ap_id"=>$ap_id));
		}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_property_extra_field"){
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
		$field=array("value"=>$value,"ap_id"=>$ap_id);
		doUpdate($db_name,$field,array('apef_id'=>$updtd_id));
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$v,"ap_id"=>$ap_id);
		doUpdate($db_name,$field,array('apef_id'=>$updtd_id));
	}
	break;
	}
	}
	//unset($_SESSION["updated_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_property_listing_features"){
		
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){
$testing=chk_property_listing_fld_exist("Feature_Combo",$ap_id);
if($testing=="0"){
if(isset($_POST["Feature_Combo"]) &&  trim($_POST["Feature_Combo"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Feature_Combo'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Feature_Combo');	
	}	
}
}

$testing=chk_property_listing_fld_exist("Featured",$ap_id);
if($testing=="0"){
if(isset($_POST["Featured"]) &&  trim($_POST["Featured"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Featured'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Featured');	
	}	
}
}

$testing=chk_property_listing_fld_exist("Highlight",$ap_id);
if($testing=="0"){
if(isset($_POST["Highlight"]) &&  trim($_POST["Highlight"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Highlight'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Highlight');	
	}	
}
}

$testing=chk_property_listing_fld_exist("Bold_Title",$ap_id);
if($testing=="0"){
if(isset($_POST["Bold_Title"]) &&  trim($_POST["Bold_Title"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Bold_Title'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Bold_Title');	
	}	
}
}




if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	doInsert(array("ap_id"=>$_SESSION["updated_id"]),$db_name);
	unset($_SESSION["updated_id"]);
	echo ' || finish || 606';
	die();
}
}	
	$_POST["ap_id"]=$ap_id;
	$status=doUpdate($db_name,$_POST,array("ap_id"=>$ap_id));
	if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_property ||".$ap_id);
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



