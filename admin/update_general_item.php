<?php
session_start();
require_once("function.php");
$_SESSION["updated_id"]=trim($_POST["agi_id"]);
?>

<script type="text/javascript">

function second_cat_field(){
	var list_in_second_cat=$("#list_in_second_cat").val().trim();
	if(list_in_second_cat=="1"){
		$.post(
		"ajax_general_second_cat.php",
		{list_in_second_cat:list_in_second_cat},
		function(r){
			//alert(r);
		$("#first_cat").show();
		$("#second_cat_ajax").html(r);	
		}
		);
	}else{
		$("#first_cat").hide();
		$("#second_cat_ajax").html("");
	}
}

function fetch_subcat(id,id1){
		var gic_id=$("#"+id1).val();
		//alert(gic_id);
		if(gic_id.trim() !='0'){
		$.ajax({
			url:'fetch_subcat.php?gic_id='+gic_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#"+id).html(response);
			}
		});
		}else{
			$("#"+id).html("");
		}
	}


function enable_field(action_id,own_id){
	var check_value=$("#"+own_id).val();
	if(check_value.trim()=="0"){
	$("#"+action_id).prop("disabled", true);	
	}else{
	$("#"+action_id).prop("disabled", false);
	$("#1"+action_id).html("(<?php echo show_price_classifiedDb('subtitle');  ?> )");
	}
}
function enable_reserve_price(action_id,own_id){
	var check_value=$('input[name=reserve_price]:radio:checked').val()
	if(check_value.trim()=="0"){
	$("#"+action_id).prop("disabled", false);
	$("#1"+action_id).html("(<?php echo show_price_classifiedDb('reserve_price');  ?> )");	
	}else{
	$("#"+action_id).prop("disabled", true);
	}
}
function enable_length_field(action_id1,action_id2){
	var check_value=$('input[name=listing_duration]:radio:checked').val()
	//alert(check_value);
	if(check_value.trim()=="0"){
	$("#"+action_id1).prop("disabled", false);
	$("#"+action_id2).prop("disabled", true);	
	}else{
	$("#"+action_id2).prop("disabled", false);
	$("#"+action_id1).prop("disabled", true);
	}
}
function fetch_shipping_cost_field(id){
	var shipping_cost=$("#shipping_cost").val().trim();
	if(shipping_cost=="custom"){
		//alert("sidd");
		$.post(
		"fetch_subcat.php",
		{shipping_cost:id},
		function(r){
		$("#shipping_cost_field").html(r);
		}
		);
	}
}
function fetch_shipping_cost_field1(id){
	var shipping_cost=$("#shipping_cost").val().trim();
		$.post(
		"fetch_subcat.php",
		{shipping_cost:id},
		function(r){
			//alert(r);
		$("#shipping_cost_field").html(r);
		}
		);
	
}	
</script>
<?php
$select="agi_id,cat_id,sub_cat_id,sub_sub_cat_id,sub_sub_sub_cat_id,list_in_second_cat,cat1_id,sub_cat1_id,sub_sub_cat1_id,sub_sub_sub_cat1_id,listing_title,subtitle,brand_item,start_price,reserve_price,buy_now,allow_bid,listing_duration,listing_length,pick_ups,shipping_cost,payment,item_desc";
$from="add_general_items";
$condition=array("agi_id"=>trim($_POST["agi_id"]));
$item_detls=getDetails(doSelect1($select,$from,$condition));
$item_detls=trimmer_db_array($item_detls);
foreach($item_detls as $k7=>$v7){
?>
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Update General Items
</div>
</div>
<div class="panel-body">
<div id="cat_field" >

<div class="row" id="first_cat" <?php if($v7["list_in_second_cat"]=="0"){ ?> style="display:none;" <?php } ?>>
<div class="col-md-6">
<h6 style="color: blue;">First Category</h6>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  >
<option value="0">Select Sub Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["cat_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" >
<option value="0">Select Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_cat_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_sub_cat5" name="sub_sub_sub_cat_id" name="gic_id" >
<option value="0">Select Sub Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_sub_cat_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_sub_cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field select">
<select id="list_in_second_cat" name="list_in_second_cat" onchange="second_cat_field();" >
<option value="0" <?php if($v7["list_in_second_cat"]=="0"){}  ?> >Continue with only one category</option>
<option value="1" <?php if($v7["list_in_second_cat"]=="1") echo 'selected'; ?> >List in a second category to be seen in more places</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div id="second_cat_ajax">
<?php
if($v7["list_in_second_cat"]=="1"){
?>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Second Category</h6>
</div>
</div>


<div id="cat_field" >
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat14" name="cat1_id"  onchange="fetch_subcat('sub_cat14','cat14');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["cat1_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_cat14" name="sub_cat1_id"  onchange="fetch_subcat('sub_sub_cat14','sub_cat14');"  >
<option value="0">Select Sub Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["cat1_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_cat1_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_cat14" name="sub_sub_cat1_id" onchange="fetch_subcat('sub_sub_sub_cat15','sub_sub_cat14');" >
<option value="0">Select Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_cat1_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_cat1_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="sub_sub_sub_cat15" name="sub_sub_sub_cat1_id"  >
<option value="0">Select Sub Sub Sub-Category</option>
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_sub_cat1_id"])));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_sub_cat1_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
<?php
}
?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
</div>

<?php
}
?>
</div>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Listing Details</h6>
</div>
</div>
<div id="common_field">
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Listing Title :</h6>
<label class="field prepend-icon">
<input type="text" name="listing_title" value="<?php echo $v7["listing_title"];  ?>" id="listing_title" class="gui-input" placeholder="Listing Title">
<b class="tooltip tip-right-top" id="listing_title_error"><em>Enter Listing Title</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Subtitle :</h6>
<label class="field select">
<select id="subtitle"  onchange="enable_field('subtitle1','subtitle');"  >
<option value="0" <?php if(trim($v7["subtitle"])=="") echo 'selected';  ?> >No Subtitle</option>
<option value="2" <?php if(trim($v7["subtitle"])!="") echo 'selected';  ?>>Add Subtitle</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6" id="subtitle_custom">
<div class="section">
<h6 style="color: #999;">Sub-Title <span id="1subtitle1"></span>:</h6>
<label class="field prepend-icon">
<input type="text" name="subtitle" <?php if(trim($v7["subtitle"])=="") echo 'disabled';  ?> id="subtitle1" value="<?php echo $v7["subtitle"];  ?>" class="gui-input" placeholder="Sub Title">
<b class="tooltip tip-right-top" id="subtitle1_error"><em>Enter Sub Title</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Brand New Item(Items) :</h6>
<label class="field select">
<select id="brand_item" name="brand_item" >
<option value="0">Select</option>
<option value="1" <?php if($v7["brand_item"]==1){ echo 'selected'; }  ?> >Item Used</option>
<option value="2" <?php if($v7["brand_item"]==2){ echo 'selected'; }  ?> >Unused</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Pricing & Duration</h6>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Start Price :</h6>
<label class="field prepend-icon">
<input type="text" name="start_price" id="start_price" value="<?php echo $v7["start_price"]; ?>" class="gui-input" placeholder="Start Price">
<b class="tooltip tip-right-top" id="start_price_error"><em>Enter Start Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Reserve price :</h6>
<label for="iphone5" class="">
<?php
$a=$b="";
if($v7["reserve_price"] > $v7["start_price"]){
	$b='checked';
}else{
	$a='checked';
}

?>
<input type="radio" name="reserve_price" <?php echo $a; ?> onclick="enable_reserve_price('custom_reserve_price','reserve_price');" checked id="reserve_price1" value="1">
Same as the start price  &nbsp
</label><br/>
<label for="iphone5" class="">
<input type="radio" name="reserve_price" <?php echo $b;  ?> onclick="enable_reserve_price('custom_reserve_price','reserve_price');"  id="reserve_price2" value="0">
Specify a reserve
</label>
</div>
</div>
<div class="col-md-4" id="custom_reserve">
<div class="section">
<h6 style="color: #999;">Reserve Price <span id="1custom_reserve_price"></span>:</h6>
<label class="field prepend-icon">
<input type="text" name="custom_reserve_price" <?php if($a=='checked') echo 'disabled';  ?> value="<?php echo $v7["reserve_price"]; ?>" id="custom_reserve_price" class="gui-input" placeholder="Reserve Price">
<b class="tooltip tip-right-top" id="custom_reserve_price_error"><em>Enter Reserve Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Buy Now :</h6>
<label class="field prepend-icon">
<input type="text" name="buy_now" value="<?php echo $v7["buy_now"];  ?>" id="buy_now" class="gui-input" placeholder="Buy Now">
<b class="tooltip tip-right-top" id="buy_now_error"><em>Buy Now</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Allow Bid From :</h6>
<label class="option block option-primary">
<input type="checkbox" name="allow_bid[]" <?php if($v7["allow_bid"]==1)echo 'checked'; ?> value="1">
<span class="checkbox"></span> <font color="blue">Authenticated </font>  members only
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Listing Duration :</h6>
<br/>
<?php
$a=$b="";
if($v7["listing_duration"]==0){
	$a='checked';
}else{
	$b="checked";
}

?>
<label for="iphone5" class="">
<input type="radio" name="listing_duration" <?php echo $a; ?> onclick="enable_length_field('listing_length','datepicker2')" checked id="listing_duration1" value="0">
Fixed Length  &nbsp
</label>
<label for="iphone5" class="">
<input type="radio" name="listing_duration" <?php echo $b; ?> onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration2" value="1">
Choose End Time
</label>
</div>
</div>
<div class="col-md-4" id="listing_length_custom" >
<div class="section">
<h6 style="color: #999;">Select Length :</h6>
<label class="field select">
<select id="listing_length"<?php if($b=="checked")echo 'disabled'; ?>  name="listing_length"  >
<option value=""><?php echo $v7["listing_length"]; ?></option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-4" id="listing_length_custom">
<div class="section">
<h6 style="color: #999;">Select Length :</h6>
<label for="datepicker2" class="field prepend-picker-icon">
<input type="text" id="datepicker2" <?php if($a=="checked")echo 'disabled'; ?> name="listing_length" class="gui-input" placeholder="Datepicker Addon">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Payment & Shipping</h6>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Pick Ups :</h6>
<label class="field select">
<select id="pick_ups" name="pick_ups"  >
<option value="0">Select</option>
<option value="1" <?php if($v7["pick_ups"]==1) echo 'selected'; ?> >No Pick Up</option>
<option value="2" <?php if($v7["pick_ups"]==2) echo 'selected'; ?> >Buyer Must Pick Up</option>
<option value="3" <?php if($v7["pick_ups"]==3) echo 'selected'; ?> >Buyer Can Pick Up</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6" id="shipping_cost_field">
<div class="section">
<?php
if($v7["shipping_cost"]=="1" || $v7["shipping_cost"]=="2"){
?>
<h6 style="color: #999;">Shipping :</h6>
<label class="field select">
<select id="shipping_cost" name="shipping_cost" onchange="fetch_shipping_cost_field(1);" >
<option value="0" <?php if($v7["shipping_cost"]==0) echo 'selected'; ?> >Free Shipping Within NZ</option>
<option value="1" <?php if($v7["shipping_cost"]==1) echo 'selected'; ?> >I Don't Know The Shipping Cost Yet. </option>
<option value="custom">Custom Shipping Cost</option>
</select>
<i class="arrow"></i>
</label>
<?php
}else{
?>
<h6 style="color: #999;">Shipping Cost : <a href="javascript:void(0);" style="text-decoration:none;" onclick="fetch_shipping_cost_field1(2);">Let Me chose</a></h6>
<label class="field prepend-icon">
<input type="text" name="shipping_cost" id="shipping_cost" value="<?php echo $v7["shipping_cost"]; ?>" class="gui-input" placeholder="Cost">
<b class="tooltip tip-right-top" id="shipping_cost_error"><em>Shipping Cost</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
<?php
}
?>
</div>
</div>


</div>
<div class="row">
<div class="col-md-6">
<h6 style="color: #999;">Accept Payment Method</h6>
<?php
$payment1=explode("||",$v7["payment"]);
$payment_method=array();
foreach($payment1 as $k=>$v){
	array_push($payment_method,trim($v));
}
?>
</div>
</div>
<div class="row">

<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" <?php if(in_array('credit_card',$payment_method)) echo 'checked'; ?> value="credit_card">
<span class="checkbox"></span> Credit card
</label>
</div>
</div>

<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" <?php if(in_array('bank_deposit',$payment_method)) echo 'checked'; ?>  value="bank_deposit">
<span class="checkbox"></span> NZ Bank Deposit
</label>
</div>
</div>


<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" <?php if(in_array('cash',$payment_method)) echo 'checked'; ?>  value="cash">
<span class="checkbox"></span> Cash
</label>
</div>
</div>


<div class="col-md-3 ">
<div class="option-group field">
<label class="option block option-primary">
<input type="checkbox" name="payment[]" <?php if(in_array('safe_trader',$payment_method)) echo 'checked'; ?>  value="safe_trader">
<span class="checkbox"></span> Safe Tarder
</label>
</div>
</div>

</div>
<br/>
<br/>
<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Item Details</h6>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<textarea class="gui-textarea" id="item_desc" name="item_desc"  placeholder="Item Description"><?php echo $v7["item_desc"]; ?></textarea>
<b class="tooltip tip-right-top" id="item_desc_error"><em>Write Something About Item</em></b>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>

</div>
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Continue" >
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<input type="hidden" name="db_name" value="add_general_items" />
<input type="hidden" name="next_form" value="add_general_items_photo" />
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

