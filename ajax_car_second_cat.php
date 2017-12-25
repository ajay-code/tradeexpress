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


<h3 style="color: #E6A01B;">For Second Category (<?php echo show_price_classifiedDb('listed_in_second_cat');  ?>)</h3>


			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Category</label>                
					<select  id="cat14" name="cat1_id"  onchange="fetch_subcat('sub_cat14','cat14');"  class="textfield textfield_x " >
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
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Category</label>                
					<select id="sub_cat14" name="sub_cat1_id"  onchange="fetch_subcat('sub_sub_cat14','sub_cat14');"  class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
			</div>
			<div class="form_row clearfix custom_fileds classified_tag ">
				<label class=>Sub Sub Category</label>                
					<select id="sub_sub_cat14" name="sub_sub_cat1_id" onchange="fetch_subcat('sub_sub_sub_cat15','sub_sub_cat14');" class="textfield textfield_x " >
						<option value=" ">Select</option>
					</select>
			</div>
			<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/classifieds\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/classifieds\/classifiedscategory\/mobile-tablets\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/_supreme.min.js'></script>
<script type='text/javascript' src='images/wp-embed.min.js'></script>
<script type='text/javascript' src='images/position.min.js'></script>
<script type='text/javascript' src='images/menu.min.js'></script>
<script type='text/javascript' src='images/wp-a11y.min.js'></script>
<script src="images/toastr.min.js" type="text/javascript"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var uiAutocompleteL10n = {"noResults":"No results found.","oneResult":"1 result found. Use up and down arrow keys to navigate.","manyResults":"%d results found. Use up and down arrow keys to navigate.","itemSelected":"Item selected."};
/* ]]> */
</script>
<script type='text/javascript' src='images/autocomplete.min.js'></script>
<script type='text/javascript' src='images/tevolution-script.min.js'></script>
<script type='text/javascript' src='images/jquery_cookies.js'></script>
<script type='text/javascript' src='images/mouse.min.js'></script>
<script type='text/javascript' src='images/slider.min.js'></script>
<script type='text/javascript' src='images/bootstrap-mini.js'></script>