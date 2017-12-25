<?php
session_start();
require_once("function.php");


?>
<script>
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
</script>

<div class="row">
<div class="col-md-6">
<h6 style="color: blue;">Second Category (<?php echo show_price_classifiedDb('listed_in_second_cat');  ?> )</h6>
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
<option value="<?php echo $v["gic_id"]; ?>" >
<?php echo $v["category"];  ?>
</option>
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
</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>
</div>