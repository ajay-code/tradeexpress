<div id="directory_search_location-1" class="widget search_key" style="float:left ">
<div class="widget-wrap widget-inside"><div class="search_nearby_widget what_fld_search">
<form name="searchform_1946522128" method="get" class="searchform_1946522128 allinone" id="searchform" action="search_item.php" style="position:relative;">
<select class="search_d" name="category" style="position:absolute; float:right;width:200px; top:12px;right:80px; height:30px">
    <option value="0">All Category</option>
  <optgroup label="General Item">
<?php
$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0),' ORDER BY rand()'));
foreach($category as $k=>$v){
?>
    <option value="<?php echo $v["gic_id"]; ?>%?&general_item"><?php echo $v["category"]; ?></option>
<?php
}
?>  
  </optgroup>
  <optgroup label="Property">
<?php
$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0),' ORDER BY rand()'));
foreach($category as $k=>$v){
?>
    <option value="<?php echo $v["pc_id"]; ?>%?&property"><?php echo $v["category"]; ?></option>
<?php
}
?> 
  </optgroup>
  <optgroup label="Job">
<?php
$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0),' ORDER BY rand()'));
foreach($category as $k=>$v){
?>
    <option value="<?php echo $v["jc_id"]; ?>%?&job"><?php echo $v["category"]; ?></option>
<?php
}
?> 
  </optgroup>
  <optgroup label="Car, Motorbikes & Boats">
<?php
$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0),' ORDER BY rand()'));
foreach($category as $k=>$v){
?>
    <option value="<?php echo $v["cc_id"]; ?>%?&car"><?php echo $v["category"]; ?></option>
<?php
}
?> 
  </optgroup>
</select>
    <input type="text"  value="" name="search" id="search" class="searchpost" placeholder="Looking For ..."/>
    <button type="submit" class="sgo" style="height:44px;"><i class="fa fa-search"></i></button>
</form>

		  
        </div></div>
</div>