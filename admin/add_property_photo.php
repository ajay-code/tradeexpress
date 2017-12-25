<?php
	session_start();
	require_once("function.php");
	$next_form=trim($_POST["next_form"]);
	$db_name=trim($_POST['db_name']);
	unset($_POST["next_form"]);
	unset($_POST["db_name"]);
?>

<!--  PHOTO UPLOAD FORM  -->
<?php
	if($next_form=='photo_upload'){
?>
		<div id="ajax_fetch_form" style="display:none;">
			<div class="row">
				<div class="col-md-6">
					<div class="section">
						<h6 style="color: #999;">Select Multiple Photo :</h6>
						<label class="field prepend-icon append-button file">
							<span class="button">Choose Image File</span>
							<input type="file" class="gui-file" name="image[]" multiple  id="image">
							<input type="text" class="gui-input" id="uploader1" placeholder="Select Item Image">
							<label class="field-icon">
								<i class="fa fa-cloud-upload"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="section">
						<h6 style="color: #999;">Video Link :</h6>
						<label class="field prepend-icon">
							<input type="text" name="video" id="video" class="gui-input" placeholder="video">
							<b class="tooltip tip-right-top" id="video_error"><em>Enter Youtube Link</em></b>
							<label for="tooltip1" class="field-icon">
								<i class="fa fa-sign-out"></i>
							</label>
						</label>
					</div>
				</div>
			</div>
			<input type="hidden" name="next_form" value="extra_field" />
			<input type="hidden" name="db_name" value="add_property_photo" />
			<div class="row" style="margin-top:30px;">
				<div class="col-md-4">
					<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
				</div>
			</div>
		</div>
<?php } ?>
<!-- END PHOTO UPLOAD FORM  -->


<!--  EXTRA FIELD FORM  -->
<?php if($next_form=='extra_field'){ ?>
	<div id="ajax_fetch_form" style="display:none;">
		<?php
			$select="cat_id,sub_cat_id,sub_sub_cat_id";
			$category_ids=getDetails(doSelect1($select,"add_property",array("ap_id"=>$_SESSION["recent_id"])));
			$in_ids="";
			foreach($category_ids as $k=>$v){
				foreach($v as $k2=>$v2){
					if(trim($k2) !='cat_id'){
					$in_ids.=',';	
					}
					$in_ids.=$v2;
				}
			}
			$select="pcef_id,extra_field_type,label_name,field_name,value_no,value";
			$from="property_cat_extra_field";
			$con=array("pc_id"=>$in_ids);
			$field_dtls=getDetails(selectWhereIn($select,$from,$con));
		?>
		<div class="row">
			<div class="col-md-6">
				<h5 style="color: grey;">Extra Field</h5>
			</div>
		</div>
		<?php foreach($field_dtls as $k=>$v){ ?>
		<?php if(trim($v["extra_field_type"])=="1"){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="section">
						<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
						<label class="field select">
							<select id="<?php echo trim($v["field_name"]); ?>" name="<?php echo trim($v["field_name"]); ?>">
								<option value="0">Select</option>
								<?php
									for($i=0;$i< $v["value_no"];$i++){
										$value=explode("||",$v["value"]);
										$field_value=explode("::",$value[$i]);
								?>
									<option value="<?php echo $field_value[0];  ?>"><?php echo $field_value[1];  ?></option>
								<?php } ?>
							</select>
							<i class="arrow"></i>
						</label>
					</div>
					<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["pcef_id"]); ?>" />
				</div>
			</div>
		<?php } ?>
		<?php if(trim($v["extra_field_type"])=="2"){ ?>
			<div class="row">
				<div class="col-md-6">
					<h6 style="color: blue;"><?php echo $v["label_name"];  ?></h6>
				</div>
			</div>
			<div class="row">
				<?php
					for($i=0;$i< $v["value_no"];$i++){
						$value=explode("||",$v["value"]);
						$field_value=explode("::",$value[$i]);
				?>
					<div class="col-md-3 ">
						<div class="option-group field">
							<label class="option block option-primary">
								<input type="checkbox" name="<?php echo $v["field_name"]; ?>[]" value="<?php echo $field_value[0];  ?>">
								<span class="checkbox"></span> <?php echo $field_value[1];  ?>
							</label>
						</div>
					</div>
				<?php } ?>
				<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["pcef_id"]); ?>" />
			</div>
			<?php } ?> <br/>
			<?php if(trim($v["extra_field_type"])=="3"){ ?>
				<div class="row">
					<div class="col-md-12" id="subtitle_custom">
						<div class="section">
							<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
							<label class="field prepend-icon">
								<input type="text" name="<?php echo trim($v["field_name"]); ?>" id="<?php echo trim($v["field_name"]); ?>" class="gui-input" placeholder="">
								<label for="tooltip1" class="field-icon">
									<i class="fa fa-sign-out"></i>
								</label>
							</label>
						</div>
						<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["pcef_id"]); ?>" />
					</div>
				</div>
			<?php } ?>
			<?php if(trim($v["extra_field_type"])=="4"){ ?>
				<div class="row">
				<div class="col-md-12">
				<div class="section">
				<h6 style="color: #999;"><?php echo $v["label_name"];  ?></h6>
				<label class="field prepend-icon">
				<textarea class="gui-textarea" id="<?php echo $v["field_name"]; ?>" name="<?php echo $v["field_name"]; ?>" placeholder="Item <?php echo ' '.$v["label_name"];  ?>"></textarea>
				<b class="tooltip tip-right-top" id="<?php echo trim($v["field_name"]); ?>_error"><em>Write <?php echo ' '.$v["label_name"];  ?></em></b>
				<label for="comment" class="field-icon">
				<i class="fa fa-list"></i>
				</label>
				</label>
				</div>
				<input type="hidden" name="<?php echo trim($v["field_name"]); ?>_hidden" value="<?php echo trim($v["pcef_id"]); ?>" />
				</div>
				</div>
			<?php } ?>


			<?php	
			}
			?>
			<input type="hidden" name="next_form" value="special_features_and_price" />
			<input type="hidden" name="db_name" value="add_property_extra_field" />


			<div class="row" style="margin-top:30px;">
			<div class="col-md-4">
			<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
			</div>
			</div>
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
<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="radio" name="Feature_Combo" value="1">
<span class="radio"></span> Feature Combo <?php echo show_price_classifiedDb('Feature_Combo');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>2.5 times more view and watchlist add than basic listing</small>
<small>Appear first result search in category</small>
<small>Distictive yellow background</small>
<small>Bright yellow border</small>
<small>Bold Title</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="radio" name="Feature_Combo" value="2">
<span class="radio"></span> Featured <?php echo show_price_classifiedDb('Featured');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Appear first result search in category</small>
<small>Distictive yellow background</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label class="option block option-primary">
<input type="radio" name="Feature_Combo" value="3">
<span class="radio"></span> Highlight <?php echo show_price_classifiedDb('Highlight');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Stand Out Search result with yellow background</small>
</blockquote>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="option-group field">
<label	 class="option block option-primary">
<input type="radio" name="Feature_Combo" value="4">
<span class="radio"></span> Bold Title <?php echo show_price_classifiedDb('Bold_Title');  ?>
</label>
</div>
</div>
<div class="col-md-6">
<blockquote class="blockquote-rounded mv20">
<small>Stand Out Search result with Bold Title</small>
</blockquote>
</div>
</div>


<input type="hidden" name="next_form" value="finish" />
<input type="hidden" name="db_name" value="add_property_listing_features" />


<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add & Finish" >
</div>
</div>
</div>
<?php
}
?>
<!-- END SPECIAL FEATURES FORM  -->


<?php
if($db_name=="add_property"){
	unset($_POST["country"]);
	unset($_POST["city"]);
	unset($_POST["suburb"]);
	unset($_POST["agent_email"]);
	unset($_POST["name2"]);
	unset($_POST["mobile2"]);
	unset($_POST["landline2"]);
	unset($_POST["website_link"]);
	unset($_POST["logo"]);
	unset($_POST["email_address2"]);
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

$listing_duration=explode('-',$_POST["listing_duration"]);
$_POST["listing_duration"]=$listing_duration[2].'-'.$listing_duration[1].'-'.$listing_duration[0];

$open_home_date=explode("-",$_POST["open_home_date"]);
$open_home_date=$open_home_date[2].'-'.$open_home_date[1].'-'.$open_home_date[0];
$_POST["open_home_date"]=$open_home_date;

$status=doInsert($_POST,"add_property");
$recent_id=newly_insert_id();
$_SESSION["recent_id"]=$recent_id;
if($status){
	$price_table_field["ap_id"]=$recent_id;
	$status=doInsert($price_table_field,"add_property_price_dtls");
	if($status){
	$contact_table_field["ap_id"]=$recent_id;
	$status=doInsert($contact_table_field,"add_property_contact_dtls");
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
if(isset($_FILES)  && isset($_SESSION["recent_id"])){
	foreach($_FILES["image"]["name"] as $k=>$v){
		$image_name=time().rand(10,1000).$_FILES["image"]["name"][$k];
		$tmp_name=$_FILES["image"]["tmp_name"][$k];
		$status=move_uploaded_file($tmp_name,"../property_image/".$image_name);
		if($status){
			$field=array("ap_id"=>$_SESSION["recent_id"],"image"=>$image_name);
			doInsert($field,"add_property_photo");
		}
	}
	if(isset($_POST["video"]) && trim($_POST["video"])!=""){
		$field=array("ap_id"=>$_SESSION["recent_id"],"video"=>trim($_POST["video"]));
		doInsert($field,"add_property_video");
	}
	echo ' || 1';
}else{
	echo ' || 0';
}
}
?>


<?php
if($db_name=="add_property_extra_field"  && isset($_SESSION["recent_id"])){
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
		$field=array('pcef_id'=>$updtd_id,"value"=>$value,"ap_id"=>$_SESSION["recent_id"]);
		doInsert($field,$db_name);
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('pcef_id'=>$updtd_id,"value"=>$v,"ap_id"=>$_SESSION["recent_id"]);
		doInsert($field,$db_name);
	}
	break;
	}
	}
	doUpdate("add_property",array("posting_status"=>1),array("ap_id"=>$_SESSION["recent_id"]));
	echo ' || 1';
}
?>

<?php
if($db_name=="add_property_listing_features"  && isset($_SESSION["recent_id"])){
	$_POST["ap_id"]=$_SESSION["recent_id"];
	$listing_featuredId= isset($_POST['Feature_Combo'])?(int)$_POST['Feature_Combo']:0;
	doInsert($_POST,$db_name);
	/* if(($_POST['Feature_Combo']= '1') OR ($_POST['Feature_Combo']= '2')){
		$position= 1;
	}else{
		$position= 0;
	} */
	$update_position= array('positions'=> '1', 'listing_featuredId'=> $listing_featuredId);
	doUpdate("add_property",$update_position,array("ap_id"=>$_POST["ap_id"]));
	unset($_SESSION["recent_id"]);
	echo ' || finish';
}else{
	echo ' || 0';
}
?>

