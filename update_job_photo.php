<?php
session_start();
require_once("function.php");
$aj_id=trim($_SESSION["updated_id"]);
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
function delete_image(ajp_id){
    $.post(
		"ajax_delete_job_image.php",
		{ajp_id:ajp_id,msg:"delete_job_image"},
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
$video_link=trim(seeMoreDetails("video","add_job_video",array("aj_id"=>$aj_id)));

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
				$image=getDetails(doSelect("aj_id,ajp_id,image,status","add_job_photo",array("aj_id"=>$aj_id)));
				foreach($image as $k=>$v){
				?>
<img src="job_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">

<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["ajp_id"];?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
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
<input type="hidden" name="db_name" value="add_job_photo" />

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
$select="ajef_id,aa.jcef_id,bb.field_name,aa.value as prev_value,jc_id,extra_field_type,label_name,value_no,bb.value";
$from="add_job_extra_field as aa,job_cat_extra_field as bb";
$con=array("aa.jcef_id"=>"bb.jcef_id","aa.aj_id"=>$aj_id);
$extra_field_dtls=getDetails(doSelect1($select,$from,$con));

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

<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["ajef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["ajef_id"]); ?>" />
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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["ajef_id"]); ?>" />

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
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["ajef_id"]); ?>" />

<?php
}
?>

<?php	
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_job_extra_field" />

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
$select="ajlf_id,Featured,Branding";
$from="add_job_listing_features";
$con=array("aj_id"=>$aj_id);
$featured_dtls=getDetails(doSelect1($select,$from,$con));
//print_r($extra_field_dtls);
$featured_dtls=trimmer_db_array($featured_dtls);
foreach($featured_dtls as $k=>$v){
?>

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
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>Double the amount of application compared with standard listing</strong></p></span>
                                    <span class="days"><p><strong>Appear toward the top in featured searches and category</strong></p></span>
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
	<input type="checkbox" name="Branding" <?php if($v["Branding"]=="1") echo 'checked'; ?> value="1">
	</span>
	<span>Branding <?php echo show_price_classifiedDb('Branding');  ?></span>
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
                            <h3>Free</h3>
                            </div>
                                <div class="panel-desc">
                                    <div class="panel-body">
                                    <span class="days"><p><strong>20% more page view</strong></p></span>
                                    <span class="days"><p><strong>Link to your other job you have listed</strong></p></span>
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
<input type="hidden" name="db_name" value="add_job_listing_features" />

<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Update & Finish" >

</div>
	
<?php	
}
?>

<?php
if($db_name=="add_job"){
$_POST["status"]=0;
$status=doUpdate('add_job',$_POST,array("aj_id"=>$aj_id));
if($status){
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_job_photo"){
if(isset($_FILES)){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"job_image/".$image_name);
		if($status){
			$field=array("aj_id"=>$aj_id,"image"=>$image_name);
			doInsert($field,"add_job_photo");
		}
	}
	
	if(isset($_POST["video"]) && trim($_POST["video"])!=""){
		$field=array("aj_id"=>$aj_id,"video"=>trim($_POST["video"]));
		$prev_video=getDetails(doSelect("*","add_job_video",array("aj_id"=>$aj_id)));
	
		if(empty($prev_video)){
		doInsert($field,'add_job_video');
		}else{
		doUpdate("add_job_video",$field,array("aj_id"=>$aj_id));
		}
	}
	
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_job_extra_field"){
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
		$field=array("value"=>$value,"aj_id"=>$aj_id);
		doUpdate("add_job_extra_field",$field,array('ajef_id'=>$updtd_id));
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array("value"=>$v,"aj_id"=>$aj_id);
		doUpdate("add_job_extra_field",$field,array('ajef_id'=>$updtd_id));
	}
	break;
	}
	}
	//unset($_SESSION["updated_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_job_listing_features"){
		
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){


$testing=chk_car_listing_fld_exist("Featured",$aj_id);
if($testing=="0"){
if(isset($_POST["Featured"]) &&  trim($_POST["Featured"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Featured'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Featured');	
	}	
}
}

$testing=chk_car_listing_fld_exist("Branding",$aj_id);
if($testing=="0"){
if(isset($_POST["Branding"]) &&  trim($_POST["Branding"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('Branding'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('Branding');	
	}	
}
}


if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	doInsert(array("aj_id"=>$_SESSION["updated_id"]),$db_name);
	unset($_SESSION["updated_id"]);
	echo ' || finish || 606';
	die();
}
}	
	$_POST["aj_id"]=$aj_id;	
	$status=doUpdate($db_name,$_POST,array("aj_id"=>$aj_id));
	if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_job ||".$aj_id);
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

