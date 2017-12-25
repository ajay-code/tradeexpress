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
<div id="" style="background-color:grey;padding: 1px 3px 6px 19px;">
<h3 style="color: #E6A01B;">For Second Category (<?php echo show_price_classifiedDb('listed_in_second_cat');  ?>)</h3>
</div>   

			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Category</label>                
				</div>
				<div class="col-sm-8">
					<select  id="cat14" name="cat1_id"  onchange="fetch_subcat('sub_cat14','cat14');"  class="textfield textfield_x " >
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
				</div>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Sub Category</label>                
				</div>
				<div class="col-sm-8">
					<select id="sub_cat14" name="sub_cat1_id"  onchange="fetch_subcat('sub_sub_cat14','sub_cat14');"  class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
				</div>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Sub Sub Category</label>                
				</div>
				<div class="col-sm-8">
					<select id="sub_sub_cat14" name="sub_sub_cat1_id" onchange="fetch_subcat('sub_sub_sub_cat15','sub_sub_cat14');" class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
				</div>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<div class="col-sm-4">
					<label class=>Sub Sub Sub Category</label>                
				</div>
				<div class="col-sm-8">
					<select id="sub_sub_sub_cat15" name="sub_sub_sub_cat1_id"  class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
				</div>
			</div>

			
			