<?php
session_start();
require_once("function.php");
?>

<script type="text/javascript">
function fetch_subcat(id,id1){
		var cc_id=$("#"+id1).val();
		//alert(cc_id);
		if(cc_id.trim() !='0'){
		$.ajax({
			url:'fetch_car_subcat.php?cc_id='+cc_id,
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


<div id="cat_field" >

<div class="row" id="" >
<div class="col-md-6">
<h6 style="color: blue;">Second Category (<?php echo show_price_classifiedDb('subtitle');  ?> )</h6>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="cat14" name="cat1_id"  onchange="fetch_subcat('sub_cat14','cat14');" >
<option value="0">Select Category</option>
<?php
$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0)));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["cc_id"]; ?>" >
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
<div class="col-md-12">
<div class="section">
<label class="field select">
<select id="sub_sub_cat14" name="sub_sub_cat1_id" >
<option value="0">Select Sub Sub-Category</option>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

</div>
</div>