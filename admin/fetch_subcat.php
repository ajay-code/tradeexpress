 <?php
 require_once("function.php");
 
 
if(isset($_GET["gic_id"])){
 $category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>$_GET["gic_id"])));
 ?>
 <option value="0">Select</option>
 <?php

            foreach ($category as $k => $v) {
            ?>
            <option value="<?php echo $v["gic_id"]; ?>"><?php echo $v["category"];  ?></option>
            <?php
            }
}

if(isset($_POST["shipping_cost"])){
if($_POST["shipping_cost"]=="1"){
?>
<div class="section">
<h6 style="color: #999;">Shipping Cost : <a href="javascript:void(0);" style="text-decoration:none;" onclick="fetch_shipping_cost_field1(2);">Let Me chose</a></h6>
<label class="field prepend-icon">
<input type="text" name="shipping_cost" id="shipping_cost" class="gui-input" placeholder="Cost">
<b class="tooltip tip-right-top" id="shipping_cost_error"><em>Shipping Cost</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
<?php
}else{
?>
<div class="section">
<h6 style="color: #999;">Shipping Cost :</h6>
<label class="field select">
<select id="shipping_cost" name="shipping_cost" onchange="fetch_shipping_cost_field(1);" >
<option value="0">Free Shipping Within NZ</option>
<option value="1">I Don't Know The Shipping Cost Yet. </option>
<option value="custom">Custom Shipping Cost</option>
</select>
<i class="arrow"></i>
</label>
</div>
<?php
}
}
?>