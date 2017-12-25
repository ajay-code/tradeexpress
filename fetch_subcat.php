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


<label class=r_lbl>Shipping Cost :<span class="required">*</span> <a href="javascript:void(0);" style="text-decoration:none;" onclick="fetch_shipping_cost_field1(2);">Let Me chose</a></label>
    <input   name="shipping_cost" id="shipping_cost"  value="" type="text" class="textfield "  placeholder=" "/>
<span id="owner_name_error " class="message_error2 "></span> 

<?php
}else{
?>
<label class=>Shipping Cost :</label>                
					<select id="shipping_cost" name="shipping_cost" onchange="fetch_shipping_cost_field(1);" class="textfield textfield_x " >
						<option value="0">Free Shipping Within NZ</option>
						<option value="1">I Don't Know The Shipping Cost Yet. </option>
						<option value="custom">Custom Shipping Cost</option>
</select>
<?php
}
}
?>