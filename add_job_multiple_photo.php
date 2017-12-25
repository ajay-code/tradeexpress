<?php
session_start();
require_once("function.php");
//print_r($_POST);
$next_form=trim($_POST["next_form"]);
$db_name=trim($_POST['db_name']);
unset($_POST["next_form"]);
unset($_POST["db_name"]);
?>

<script type="text/javascript">


	$(function(){
		$("#feature_branding").hide();
		    $('input[name="branding"]').click(function(){
		        if($(this).prop("checked") == true){
		           $("#feature_branding").show();
		        }
		        else if($(this).prop("checked") == false){
		           $("#feature_branding").hide();
		        }
		    });
	});

	function preview_logo(event) 
	{
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('temp_logo');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
	}

	function preview_banner(event) 
	{
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('temp_banner');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
	}
</script>

<!--  PHOTO UPLOAD FORM  -->
<?php
if($next_form=='photo_upload'){
?>
<div id="ajax_fetch_form" style="display:none;">
	 <label class=r_lbl>Photo :<span class="required">*</span></label>
<div class="form_row clearfix custom_fileds  owner_name different">
               
                <p>You can add up to 20 photos for free.</p>

                  <p>  <input  id="image"  name="image[]" multiple  value="" type="file" class="textfield "  placeholder=" "/></p>
                 <p>File formats is JPEG,PNG or GIF. Use hight quality image up to 500 pixels.</p>
				
</div>
  <label class=r_lbl>Video Link :<span class="required">*</span></label>
<div class="form_row clearfix custom_fileds  owner_name different">
              
                   <p> <input name="video" id="video"  value="" type="text" class="textfield "  placeholder=" "/></p>
                    <p>Add one you tube video to your listing. Paste the URL into the box above.</p>
				
</div>

<!-- <input type="hidden" name="next_form" value="extra_field1" />
<input type="hidden" name="db_name" value="add_job_photo" /> -->
<input type="hidden" name="next_form" value="special_features_and_price" />
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
$select="cat_id,sub_cat_id,sub_sub_cat_id";
$category_ids=getDetails(doSelect1($select,"add_job",array("aj_id"=>$_SESSION["recent_id"])));
$in_ids="";
/* echo '<pre>';
print_r($category_ids);
echo '</pre>'; */
foreach($category_ids as $k=>$v){
	foreach($v as $k2=>$v2){
		if(trim($k2) !='cat_id'){
		$in_ids.=',';	
		}
		$in_ids.=$v2;
	}
}
$select="jcef_id,extra_field_type,label_name,field_name,value_no,value";
$from="job_cat_extra_field";
$con=array("jc_id"=>$in_ids);
$field_dtls=getDetails(selectWhereIn($select,$from,$con));
?>
<div class="sec_title">
                   <h3>Extra Field<span class="required"></span></h3>
</div>
<?php
foreach($field_dtls as $k=>$v){
?>

<?php
if(trim($v["extra_field_type"])=="1"){
?>
<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=><?php echo $v["label_name"];  ?>:</label>                
					<select id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>" class="textfield textfield_x " >
						<option value="0">Select</option>
						<?php
						for($i=0;$i< $v["value_no"];$i++){
							$value=explode("||",$v["value"]);
							$field_value=explode("::",$value[$i]);
						?>
						<option value="<?php echo $field_value[0];  ?>"><?php echo $field_value[1];  ?></option>
						<?php
						}
						?>
					</select>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
<?php
}
?>

<?php
if(trim($v["extra_field_type"])=="2"){
?>
<?php
	for($i=0;$i< $v["value_no"];$i++){
		$value=explode("||",$v["value"]);
		$field_value=explode("::",$value[$i]);
	?>
<div class="form_row clearfix custom_fileds  price_type">
			<label class=><?php echo $v["label_name"];  ?><span class="required">*</span></label>
			<div class="form_cat_left">
				<ul class="hr_input_radio">
					<li><input name="<?php echo $v["field_name"]; ?>[]" value="<?php echo $field_value[0];  ?>" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1"><?php echo $field_value[1];  ?></label></li>
				</ul>
			</div>
</div>
<?php
	}
	?>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />

<?php
}
?>
<br/>
<?php
if(trim($v["extra_field_type"])=="3"){
?>
<div class="form_row clearfix custom_fileds  owner_name">
                <label class=r_lbl><?php echo $v["label_name"];  ?> :<span class="required">*</span></label>
                    <input name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" value="" type="text" class="textfield "  placeholder=" "/>
</div>
<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
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
							<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" ></textarea></div>
					</div>
</div>

<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["gcef_id"]); ?>" />
<?php
}
?>


<?php	
}
?>
<input type="hidden" name="next_form" value="special_features_and_price" />
<input type="hidden" name="db_name" value="add_job_extra_field" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Continue" >
</div>
<?php
}
?>
<!-- END EXTRA FIELD FORM  -->


<!--  SPECIAL FEATURES FORM  -->
<?php
if($next_form=='special_features_and_price'){
?>
<div id="ajax_fetch_form" style="display:none;">


<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
    <a class="step-heading active" href="javascript:void(0);">
	<span>
	<input type="checkbox" name="job_feature" value="1">
	</span>
	<span> Featured <?php echo show_price_classifiedDb('job_feature');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-12">
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
	<input type="checkbox" name="branding" value="1">
	</span>
	<span> Branding <?php echo show_price_classifiedDb('branding');  ?></span>
	<span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span>
	</a>
        <div id="plan" class="content step-plan  active  clearfix">
            <div id="packagesblock-wrap" class="block">
                <div class="packageblock clearifx ">
                <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                    <li>
                    <div class="col-md-12 col-sm-12">
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


                       <div id="feature_branding">
                       	 <label class=r_lbl>Logo :<span class="required">*</span></label>

                       	 <div class="temp-logo">
                       	 	<img id="temp_logo" width="500" height="200" />
                       	 </div>
                       <div class="form_row clearfix custom_fileds  owner_name">
                           <div class="fileUpload btn btn-primary">
							<span>Upload Logo</span>
							<input  id="logo-image"  name="logo"  value="" type="file" class="textfield " onchange="preview_logo(event)" />
							</div>
                             <span><strong>Recocmended Size: 500X200px</strong></span>
                       				
                       </div>

                       	 <label class=r_lbl>Banner :<span class="required">*</span></label>
                       	 <div class="temp-banner">
                       	 	<img id="temp_banner" width="800" height="200" />
                       	 </div>
                       	 <div class="file-upload">
                       	 	<div class="fileUpload btn btn-primary">
							<span>Upload Banner</span>
							<inputid="upload" class="textfield" type="file" name="banner" onchange="preview_banner(event)"/>
							</div>
                             <span><strong>Recomended Size: 800X80px</strong></span>
                       	    
                       	 </div>

                       </div>
</div>






<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_job_listing_features" />


<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Add & Finish" >
</div>
<?php
}
?>


<!-- END SPECIAL FEATURES FORM  -->


<?php
if($db_name=="add_job"){
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){
if (is_numeric(show_price_listingDb_numeric('job')))  
{  
$charge_fee=$charge_fee + show_price_listingDb_numeric('job');
}
if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	echo ' || 606';
	die();
}	
}
	
$_POST["uploader"]=$_SESSION["ar_id"];
$status=doInsert($_POST,'add_job');
$recent_id=newly_insert_id();
$_SESSION["recent_id"]=$recent_id;
if($status){
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_job ||".$recent_id);
	$status=doInsert($field,'paypal_transaction_table');
	if($status){
	$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
	$now_blnce=$prev_acnt_blnce-$charge_fee;
	doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));	
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_job ||".$recent_id);
	$status=doInsert($field,'paypal_transaction_table');
	}
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>
<?php
if($db_name=="add_job_photo"){
if(isset($_FILES)  && isset($_SESSION["recent_id"])){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"job_image/".$image_name);
		if($status){
			$field=array("aj_id"=>$_SESSION["recent_id"],"image"=>$image_name);
			doInsert($field,"add_job_photo");
		}
	}
	if(isset($_POST["video"]) && trim($_POST["video"])!=""){
		$field=array("aj_id"=>$_SESSION["recent_id"],"video"=>trim($_POST["video"]));
		doInsert($field,"add_job_video");
	}
	
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>

<?php
if($db_name=="add_job_extra_field"  && isset($_SESSION["recent_id"])){
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
		$field=array('jcef_id'=>$updtd_id,"value"=>$value,"aj_id"=>$_SESSION["recent_id"]);
		doInsert($field,"add_job_extra_field");
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('jcef_id'=>$updtd_id,"value"=>$v,"aj_id"=>$_SESSION["recent_id"]);
		doInsert($field,"add_job_extra_field");
	}
	break;
	}
	}
	doUpdate("add_job",array("posting_status"=>1),array("aj_id"=>$_SESSION["recent_id"]));
	//unset($_SESSION["recent_id"]);
	echo ' || 1';
}
?>

<?php
if($db_name=="add_job_listing_features"  && isset($_SESSION["recent_id"])){
	$_POST["aj_id"]=$_SESSION["recent_id"];
	
$charge_fee=0;
$acnt_exist=count_acnt_days($_SESSION["ar_id"]);
if($acnt_exist==1){



if(isset($_POST["job_feature"]) &&  trim($_POST["job_feature"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('job_feature'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('job_feature');	
	}	
}
if(isset($_POST["branding"]) &&  trim($_POST["branding"])=="1"){
	if(is_numeric(show_price_classifiedDb_numeric('branding'))){
	$charge_fee=$charge_fee + show_price_classifiedDb_numeric('branding');	
	}	
}


if(isset($_FILES)  && isset($_SESSION["recent_id"])){
	$logo_name=time().rand(10,1000).$_FILES["logo"]["name"];
	$tmp_name=$_FILES["logo"]["tmp_name"];
	$banner_name=time().rand(10,1000).$_FILES["banner"]["name"];
	$tmp_name1=$_FILES["banner"]["tmp_name"];
	$status=move_uploaded_file($tmp_name,"branding/".$logo_name);
	$status1=move_uploaded_file($tmp_name1,"branding/".$banner_name);
	if($status && $status1){
	$field=array("aj_id"=>$_SESSION["recent_id"],"logo"=>$logo_name,"banner"=>$banner_name);
	doInsert($field,"add_job_brand");	
	}
}


if($charge_fee > get_cus_acnt_balance($_SESSION["ar_id"])){
	doInsert(array("aj_id"=>$_SESSION["recent_id"]),$db_name);
	unset($_SESSION["recent_id"]);
	echo ' || finish || 606';
	die();
}
}
	doInsert($_POST,$db_name);
	if($charge_fee > 0){
	$transaction_id=generateRandomString(5).time();
	$field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$_SESSION["ar_id"],"amount"=>$charge_fee,"type"=>"Debited","for_what"=>"add_job ||".$recent_id);
	$status=doInsert($field,'paypal_transaction_table');
	if($status){
	$prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
	$now_blnce=$prev_acnt_blnce-$charge_fee;
	doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));	
	}
	}
	unset($_SESSION["recent_id"]);
	echo ' || finish';
}else{
	echo ' || 0';
}
?>

