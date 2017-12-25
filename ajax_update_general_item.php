<?php
session_start();
require_once("function.php");
$_SESSION["updated_id"]=trim($_POST["agi_id"]);
?>
<script>
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

$(document).ready(function() {
$("#submit_form").on('submit',(function(e){  
	$.ajax({
        	url: "update_general_item_photo.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			var data=data.split("||");
			if(data[1].trim()==1){
				$("#ajax_form").html(data[0]);
				$("#ajax_fetch_form").show(1200);
			}else if(data[1].trim()=='finish'){
				alert("Item Updated Successfully");
				window.location="profile_details.php";
			}else if(data[1].trim()=='606'){
				required_alert('You have added some features....but item can not be update due to load balance. SORRY...','top-right','error');
			}else{
				alert("Something Went Wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  }); 
</script>

<?php
$select="agi_id,cat_id,sub_cat_id,sub_sub_cat_id,sub_sub_sub_cat_id,list_in_second_cat,cat1_id,sub_cat1_id,sub_sub_cat1_id,sub_sub_sub_cat1_id,listing_title,subtitle,brand_item,start_price,reserve_price,buy_now,allow_bid,listing_duration,listing_length,pick_ups,shipping_cost,payment,item_desc";
$from="add_general_items";
$condition=array("agi_id"=>trim($_POST["agi_id"]));
$item_detls=getDetails(doSelect1($select,$from,$condition));
$item_detls=trimmer_db_array($item_detls);
foreach($item_detls as $k7=>$v7){
?>
 <section id="content" class="large-9 small-12 columns">

            <div class="hfeed">
                <div id="post-46" class="hentry page publish post-1 odd author-templatic  post ">
                    <h3 class='page-title entry-title'>General Item Edit Form</h3>
                    <section class="entry-content">
                      <!--  <p>New <strong>user registration</strong> has been deactivated on our demo. The full theme does of course <strong>allow new users</strong> to register on your site to complete the submission.</p>
                        <p>Submit your listing in the category of your choice.-->
                           
                                 <div class="accordion" id="post-listing">

                                     <div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
                                        <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Terms & Condition</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
                                        <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            
                                                            
                                                            
                                                            <div id="plan" class="content step-plan  active  clearfix">
                                            <div id="packagesblock-wrap" class="block">
                                                <div class="packageblock clearifx ">
                                                    <ul data-price="0" data-subscribed='0' data-id="15" data-type="1" class="packagelistitems ">
                                                        <li>
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center" style="padding-right: 0px;">
                                                                    <div class="panel-heading">
                                                                   
                                                    <h3 style="font-size: 19px;color: #05242f;">Listing Fee In General Category </h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            
																<div class="moreinfo"  style="font-size:0.9em;font-weight:bold">
																	<?php echo show_price_listingDb('general_item');  ?> 
																</div>
                                                            
                                                            
                                                           
                                                            
                                                            
                                                            
                                                            
                                           <!--                 
                                                            <div class="col-md-12 col-sm-6">
                                                                <div class="panel panel-default text-center">
                                                                    <div class="panel-heading">
                                                                        <h3>Free</h3>
                                                                    </div>
                                                                    <div class="panel-desc">
                                                                        <div class="panel-body">
                                                                            <span class="panel-title price"><label>Price:</label>&nbsp;<span>$0.00</span></span>
                                                                            <span class="days">
                                        		<p class="margin_right panel-type price package_type"><label>Package Type:</label><span>Single Submission</span> </p>
                        <p class="panel-type price package_type">
                            <label>Listing duration:</label>&nbsp;<span>360 days</span> </p>
                        </span>
                        <p><strong>Listings submitted with this package will be featured on: </strong>Homepage ($1.00) Category page ($1.00)
                            <!-- package description -->
                       <!--     <div class="moreinfo">
                                This package allows you to submit a free listing at no cost. </div> -->
                                
                                
                                
                                
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul>
                            </div>
                          
                          
                          <!--
                            <div class="packageblock clearifx ">
                                <ul data-price="100" data-subscribed='0' data-id="16" data-type="2" class="packagelistitems ">
                                    <li>
                                        <div class="col-md-12 col-sm-6">
                                            <div class="panel panel-default text-center" style="padding-right: 0px;">
                                                <div class="panel-heading">
                                                    <h3>Multi Listing Special</h3>
                                                </div>
                                                <div class="panel-desc">
                                                    <div class="panel-body">
                                                        <span class="panel-title price"><label>Price:</label>&nbsp;<span>$100.00</span></span>
                                                        <span class="days">
                                        		<p class="panel-type price package_type"><label>Package Type:</label>&nbsp;<span>Subscription</span> </p>
                        <p class="panel-type price package_type">
                            <label>Listing duration:</label>&nbsp;<span>30 days</span> </p>
                        <p class="margin_right panel-type price package_type">
                            <label>Number of listings included in the package:</label>&nbsp;<span>10</span> </p>
                        <p class="margin_right panel-type price package_type">
                            <label>Listings can be submitted within:</label>&nbsp;<span>15 days</span> </p>
                        <p class="">
                            <label>Recurring period:&nbsp;</label><span>1&nbsp;Month</p><p class=""><label>Number of cycles:&nbsp;</label><span>12&nbsp;<p>                                    </span>
                            <!-- package description -->
                        <!--    <div class="moreinfo">
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </li>
                            </ul> -->
                          
                          
                          
                            </div>
                            </div>
                            </div>
                            <!-- End #panel1 -->
                            </div>
<form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
<div id="ajax_form">

<div id="step-post" class="accordion-navigation step-wrapper step-post">
<a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Add Classified Form</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
<div id="post" class="step-post content  clearfix">
<div id="submit_form_custom_fields" class="submit_form_custom_fields">
                                        
<div id="first_cat"  <?php if($v7["list_in_second_cat"]=="0"){ ?> style="display:none;" <?php } ?> >
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>First Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 
</div>   
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Category</label>                
					<select  id="cat4" name="cat_id"  onchange="fetch_subcat('sub_cat4','cat4');"  class="textfield textfield_x " >
						<?php
						$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
						foreach($category as $k=>$v){
						?>
						<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
						<?php
						}
						?>
					</select>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select id="sub_cat4" name="sub_cat_id"  onchange="fetch_subcat('sub_sub_cat4','sub_cat4');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select id="sub_sub_cat4" name="sub_sub_cat_id" onchange="fetch_subcat('sub_sub_sub_cat5','sub_sub_cat4');" class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Sub Category</label>                
					<select id="sub_sub_sub_cat5" name="sub_sub_sub_cat_id"  class="textfield textfield_x " >
						<?php
						$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_sub_cat_id"])));
						foreach($category as $k=>$v){
						?>
						<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_sub_cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
						<?php
						}
						?>
					</select>
			</div>
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Continue with only one category</label>                
					<select id="list_in_second_cat" name="list_in_second_cat" onchange="second_cat_field();" class="textfield textfield_x " >
						<option value="0" <?php if($v7["list_in_second_cat"]=="0"){}  ?> >Continue with only one category</option>
						<option value="1" <?php if($v7["list_in_second_cat"]=="1") echo 'selected'; ?> >List in a second category to be seen in more places</option>
					</select>
			</div>
			<div id="second_cat_ajax">
<?php
if($v7["list_in_second_cat"]=="1"){
?>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Second Category</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 
			
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Category</label>                
					<select  id="cat14" name="cat1_id"  onchange="fetch_subcat('sub_cat14','cat14');"  class="textfield textfield_x " >
						<?php
						$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0)));
						foreach($category as $k=>$v){
						?>
						<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
						<?php
						}
						?>
					</select>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select id="sub_cat14" name="sub_cat1_id"  onchange="fetch_subcat('sub_sub_cat14','sub_cat14');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select id="sub_sub_cat14" name="sub_sub_cat1_id" onchange="fetch_subcat('sub_sub_sub_cat15','sub_sub_cat14');" class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Sub Category</label>                
					<select id="sub_sub_sub_cat15" name="sub_sub_sub_cat1_id"  class="textfield textfield_x " >
						<?php
						$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$v7["sub_sub_cat_id"])));
						foreach($category as $k=>$v){
						?>
						<option value="<?php echo $v["gic_id"]; ?>" <?php if($v["gic_id"]==$v7["sub_sub_sub_cat_id"]) echo 'selected';  ?> ><?php echo $v["category"];  ?></option>
						<?php
						}
						?>
					</select>
			</div>
<?php
}
?>
			</div><!-- END SECOND CAT AJAX  -->
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Listing Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 			
	<div class="form_row clearfix custom_fileds  owner_name">

		<label class=r_lbl>Listing Title :<span class="required">*</span></label>
			<input name="listing_title" id="listing_title" value="<?php echo $v7["listing_title"];  ?>" type="text" class="textfield "  placeholder=" "/>
	</div>
			
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Subtitle :</label>                
			<select id="subtitle"  onchange="enable_field('subtitle1','subtitle');"  class="textfield textfield_x " >
				<option value="0" <?php if(trim($v7["subtitle"])=="") echo 'selected';  ?> >No Subtitle</option>
				<option value="2" <?php if(trim($v7["subtitle"])!="") echo 'selected';  ?>>Add Subtitle</option>
			</select>
	</div>
			
	<div class="form_row clearfix custom_fileds  owner_name">

		<label class=r_lbl>Sub-Title<span class="required">*</span></label>
			<input name="subtitle" <?php if(trim($v7["subtitle"])=="") echo 'disabled';  ?> id="subtitle1" value="<?php echo $v7["subtitle"];  ?>" type="text" class="textfield "  placeholder=" "/>
		<span id="owner_name_error " class="message_error2 "></span>     
	</div>
			
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Brand New Item(Items) :</label>                
			<select id="brand_item" name="brand_item" class="textfield textfield_x " >
				<option value="0">Select</option>
				<option value="1" <?php if($v7["brand_item"]==1){ echo 'selected'; }  ?> >Item Used</option>
				<option value="2" <?php if($v7["brand_item"]==2){ echo 'selected'; }  ?> >Unused</option>
			</select>
	</div>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Pricing & Duration</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 	
		
	<div class="form_row clearfix custom_fileds  owner_name">
			<label class=r_lbl>Start Price :<span class="required">*</span></label>
			<input name="start_price" id="start_price" value="<?php echo $v7["start_price"]; ?>" type="text" class="textfield "  placeholder=" "/>
	</div>
			
	<div class="form_row clearfix custom_fileds  price_type">
	<?php
	$a=$b="";
	if($v7["reserve_price"] > $v7["start_price"]){
		$b='checked';
	}else{
		$a='checked';
	}

	?>
	<label class=>Reserve price :<span class="required">*</span></label>
	<div class="form_cat_left">
		<ul class="hr_input_radio">
			<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');" <?php echo $a; ?>  id="reserve_price1" type="radio" value="1"   /> <label for="price_type_1">Same as the start price</label></li>
			<li><input name="reserve_price" onclick="enable_reserve_price('custom_reserve_price','reserve_price');" <?php echo $b; ?>   id="reserve_price2" value="0" type="radio"   /> <label for="price_type_2">Specify a reserve</label></li>
		</ul>
	</div>
	</div> 
			
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Reserve Price  :<span class="required">*</span></label>
			<input name="custom_reserve_price" <?php if($a=='checked') echo 'disabled';  ?> value="<?php echo $v7["reserve_price"]; ?>" id="custom_reserve_price"  type="text" class="textfield "  placeholder=" "/>
	</div>
	
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Buy Now :<span class="required">*</span></label>
			<input name="buy_now" value="<?php echo $v7["buy_now"];  ?>" id="buy_now" type="text" class="textfield "  placeholder=" "/>
	</div>
			
	<div class="form_row clearfix custom_fileds  price_type">
	<label class=>Allow Bid From :<span class="required">*</span></label>
	<div class="form_cat_left">
		<ul class="hr_input_radio">
			<li><input name="allow_bid[]" <?php if($v7["allow_bid"]==1)echo 'checked'; ?> value="1" style="margin-top:0px;" type="checkbox" value="fixed" checked="checked"   /> <label for="price_type_1">Authenticated Members only</label></li>
		</ul>
	</div>
	</div>
			
	<div class="form_row clearfix custom_fileds  price_type">
	<?php
	$a=$b="";
	if($v7["listing_duration"]==0){
		$a='checked';
	}else{
		$b="checked";
	}

	?>
	<label class=>Listing Duration :<span class="required">*</span></label>
	<div class="form_cat_left">
		<ul class="hr_input_radio">
			<li><input name="listing_duration" <?php echo $a; ?> onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration1" value="0" type="radio"  /> <label for="price_type_1">Fixed Length</label></li>
			<li><input name="listing_duration" <?php echo $b; ?> onclick="enable_length_field('listing_length','datepicker2')"  id="listing_duration2" value="1" type="radio"    /> <label for="price_type_2">Choose End Time</label></li>
		</ul>
	</div>
	</div> 
			
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Select Length :</label>  
		<?php
		$data=explode('-',$v7["listing_length"]);
		$listing_length=$data[2].'-'.$data[1].'-'.$data["0"];
		?>
			<select id="listing_length" <?php if($b=="checked")echo 'disabled'; ?>  name="listing_length" class="textfield textfield_x " >
				<option value=""><?php echo $listing_length; ?></option>
			</select>
	</div>
  <link rel="stylesheet" href="images/jquery-ui.css">
  <script src="images/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>			
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Select Length :<span class="required">*</span></label>
			<input id="datepicker2" <?php if($a=="checked")echo 'disabled'; ?> readonly name="listing_length" value="" type="text" class="textfield "  placeholder=" "/>
	</div>
<div id="step-plan" class="accordion-navigation step-wrapper step-plan current">
            <a class="step-heading active" href="javascript:void(0);"><span>*</span><span>Payment & Shipping</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a>
</div> 		
			
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Pick Ups :</label>                
			<select  id="pick_ups" name="pick_ups"  class="textfield textfield_x " >
				<option value="0">Select</option>
				<option value="1" <?php if($v7["pick_ups"]==1) echo 'selected'; ?> >No Pick Up</option>
				<option value="2" <?php if($v7["pick_ups"]==2) echo 'selected'; ?> >Buyer Must Pick Up</option>
				<option value="3" <?php if($v7["pick_ups"]==3) echo 'selected'; ?> >Buyer Can Pick Up</option>
			</select>
	</div>
<div class="form_row clearfix custom_fileds classified_tag "  id="shipping_cost_field" >
<?php
if($v7["shipping_cost"]=="1" || $v7["shipping_cost"]=="2"){
?>			
	<div class="form_row clearfix custom_fileds classified_tag ">
		<label class=>Shipping Cost :</label>                
			<select id="shipping_cost" name="shipping_cost" onchange="fetch_shipping_cost_field(1);" class="textfield textfield_x " >
				<option value="0" <?php if($v7["shipping_cost"]==0) echo 'selected'; ?> >Free Shipping Within NZ</option>
				<option value="1" <?php if($v7["shipping_cost"]==1) echo 'selected'; ?> >I Don't Know The Shipping Cost Yet. </option>
				<option value="custom">Custom Shipping Cost</option>
			</select>
	</div>
<?php
}else{
?>
	<div class="form_row clearfix custom_fileds  owner_name">
		<label class=r_lbl>Shipping Cost :<span class="required"> <a href="javascript:void(0);" style="text-decoration:none;" onclick="fetch_shipping_cost_field1(2);">Let Me chose</a></span></label>
			<input name="shipping_cost" id="shipping_cost" value="<?php echo $v7["shipping_cost"]; ?>" type="text" class="textfield "  placeholder=" "/>
	</div>

<?php
}
?>
</div>
			
	<div class="form_row clearfix custom_fileds  price_type">
	<label class=''>Accept Payment Method<span class="required">*</span></label>
<?php
$payment1=explode("||",$v7["payment"]);
$payment_method=array();
foreach($payment1 as $k=>$v){
	array_push($payment_method,trim($v));
}
?>
	<div class="form_cat_left">
		<ul class="hr_input_radio">
			<li><input name="payment[]" <?php if(in_array('credit_card',$payment_method)) echo 'checked'; ?> value="credit_card" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Credit card</label></li>
			<li><input name="payment[]" <?php if(in_array('bank_deposit',$payment_method)) echo 'checked'; ?>  value="debit_card" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">NZ Bank Deposit</label></li>
			<li><input name="payment[]" <?php if(in_array('cash',$payment_method)) echo 'checked'; ?>  value="cash" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Cash</label></li>
			<li><input name="payment[]" <?php if(in_array('safe_trader',$payment_method)) echo 'checked'; ?>  value="safe_trader" style="margin-top:0px;" type="checkbox" /> <label for="price_type_1">Safe Tarder</label></li>
		</ul>
	</div>
	</div>
			
	<div class="form_row clearfix custom_fileds  post_content">
		<label class=>Item Details : <span class="required">*</span></label>
			<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
				<div id="wp-post_content-editor-container" class="wp-editor-container">
					<textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="item_desc" name="item_desc" ><?php echo $v7["item_desc"]; ?></textarea></div>
			</div>
	</div>
			
			<input type="hidden" name="db_name" value="add_general_items" />
			<input type="hidden" name="next_form" value="add_general_items_photo" />
			
			
			<input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
			
			
		
                                        
    <!--    <div class="form_row clearfix custom_fileds  price">
                   <div class="sec_title">
                   <h3>Price(IN USD $)<span class="required">*</span></h3>
                   </div>
              <input name="price" id="price" value="" type="text" class="textfield "  placeholder=" "/>
		
		</div>  -->  
				   
</div>								                    
</div>												 				
</div>


</div><!-- END AJAX DIV -->
</form>
</p>
</section>
                          <!-- .entry-content -->
					    				</div>
					<!-- .hentry -->
						</div>
	<!-- .hfeed -->
  </section>
<?php
}
?>
 <?php
include("include_parts/sidebar_index.php");

?>
