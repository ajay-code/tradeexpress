<div class="row large-12 ">
<ul class="list-inline nav nav-tabs">
  <li class="<?php if( $type == "for_sale"){ echo " active";}?>"><a href="property_listing.php?type=for_sale">For Sale</a></li>
  <li class="<?php if( $type == "for_rent"){ echo " active";}?>"><a href="property_listing.php?type=for_rent">For Rent</a></li>
  <li class="<?php if( $type == "commercial_sale"){ echo " active";}?>"><a href="property_listing.php?type=commercial_sale">Commercial Sale</a></li>
  <li class="<?php if( $type == "for_lease"){ echo " active";}?>"><a href="property_listing.php?type=for_lease">For Lease</a></li>
</ul>
</div>
<?php 
$FloorAreaStartArray = array("50"=>"50","100"=>"100","150"=>"150","300"=>"300","500"=>"500","800"=>"800","1000"=>"1000","1500"=>"1500");
$FloorAreaEndArray = array("50"=>"50","100"=>"100","150"=>"150","300"=>"300","500"=>"500","800"=>"800","1000"=>"1000","1500"=>"1500+");

$salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 



if( $type == 'for_sale'){    
?>
<form name="tmpl_find_classified" method="post" action="#<?php /*?>//demo.templatic.com/classifieds<?php */?>" id="tmpl_find_classified" class="tmpl_filter_results form-horizontal">
  <input type="hidden" name="posttype" value="classified"/>
  <input type="hidden" name="pagetype" value="archive"/>
  <input type="hidden" name="csortby" value="" id="csortby"/>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="country" id="country" onchange="fetch_city();"  class="form-control input-width-xlarge" >
					<option value="0" >All Countries</option>
					<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
					?>
						<option value="<?php echo $v["cn_id"]; ?>" >
							<?php echo $v["cn_name"];  ?>
						</option>
					<?php } ?>
				</select></div>
   </div>
  <div class="row large-12">
  		<div class="col-sm-4"><select  name="city" id="city_update" onchange="fetch_region();"   class="form-control input-width-xlarge">
					<option value="">All Regions</option>
				</select></div>
		<div class="col-sm-4"><select id="region" name="region" onchange="fetch_suburb();"  class="form-control input-width-xlarge">
					<option value="">All Cities</option>
				</select></div>
		<div class="col-sm-4"><select id="suburb" name="suburb"  class="form-control input-width-xlarge">					
					<option value="">All Suburb</option>				
				</select></div>
  </div>
  
  <div class="row large-12"><div class="col-sm-4"><label>Bedroom</label></div><div class="col-sm-4"><label>Bathroom</label></div><div class="col-sm-4"><label>Price</label></div> </div>
  <div class="row large-12">
      <div class="col-sm-2"><select name="bedroom_start" id="bedroom_start" class="form-control input-sm">
		              <option value="">ANY</option>
					  <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div>
  	  <div class="col-sm-2"><select name="bedroom_end" id="bedroom_end" class="form-control input-sm">
		              <option value="">ANY</option>
					  <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div>
      <div class="col-sm-2"> <select name="bathroom_start" id="bathroom_start" class="form-control input-sm" ><option value="">ANY</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select> </div>
	  <div class="col-sm-2"><select name="bathroom_end" id="bathroom_end" class="form-control input-sm"><option value="">ANY</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div> 
	  <div class="col-sm-2"><select name="min_price" id="min_price" onchange="ajax_pagintn1('1');"  class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
							
						?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select> </div>
	  <div class="col-sm-2"><select name="max_price" id="max_price" onchange="ajax_pagintn1('1');"  class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
 						?>
 					  <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select></div>
  </div>
   <div class="row large-12">
       <div class="col-sm-4">
	   
	   <?php 
	   $ParentID= 21;
 	   ?>
	   <select id="sub_sub_cat_id" name="sub_sub_cat_id" class="form-control input-width-xlarge">
                         <option value="" >All Property Type</option>
					    <?php
							 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$ParentID)));
							foreach($category as $k=>$v){
							?>
                        <option value="<?php echo $v["pc_id"]; ?>" > <?php echo $v["category"];  ?> </option>
                        <?php
							}
							?>
                      </select></div>
	   <div class="col-sm-8"> <input name="keyword" id="keyword" value="" type="text" class="form-control textfield " placeholder="Keywords or Property ID#">
 	   </div>
    </div>
	 <div class="row large-12">
 	   <div class="col-sm-12"><input name="near_suburb" id="near_suburb" type="checkbox" class="textfield " value="yes"> <label>Surrounding Suburbs</label></div>
    </div>
 </form>
<?php 
}else if( $type == 'for_rent'){
?>
 <form name="tmpl_find_classified" method="post" action="#" id="tmpl_find_classified" class="tmpl_filter_results">
  <input type="hidden" name="posttype" value="classified"/>
  <input type="hidden" name="pagetype" value="archive"/>
  <input type="hidden" name="csortby" value="" id="csortby"/>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="country" id="country" onchange="fetch_city();" >
					<option value="0" >All Countries</option>
					<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
					?>
						<option value="<?php echo $v["cn_id"]; ?>" >
							<?php echo $v["cn_name"];  ?>
						</option>
					<?php } ?>
				</select></div>
   </div>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="city" id="city_update" onchange="fetch_region();" >
					<option value="">All Regions</option>
				</select></div>
		<div class="col-sm-4"><select id="region" name="region" onchange="fetch_suburb();">
					<option value="">All Cities</option>
				</select></div>
		<div class="col-sm-4"><select id="suburb" name="suburb" >					
					<option value="">All Suburb</option>				
				</select></div>
  </div>
  
  <div class="row large-12"><div class="col-sm-4"><label>Bedroom</label></div><div class="col-sm-4"><label>Bathroom</label></div><div class="col-sm-4"><label>Price</label></div> </div>
  <div class="row large-12">
      <div class="col-sm-2"><select name="bedroom_start" id="bedroom_start" class="form-control input-sm">
		              <option value="">ANY</option>
					  <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div>
  	  <div class="col-sm-2"><select name="bedroom_end" id="bedroom_end" class="form-control input-sm">
		              <option value="">ANY</option>
					  <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div>
      <div class="col-sm-2"> <select name="bathroom_start" id="bathroom_start" class="form-control input-sm" ><option value="">ANY</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select> </div>
	  <div class="col-sm-2"><select name="bathroom_end" id="bathroom_end" class="form-control input-sm"><option value="">ANY</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option></select></div> 
	  <div class="col-sm-2"><select name="min_price" id="min_price" class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
							
						?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select> </div>
	  <div class="col-sm-2"><select name="max_price" id="max_price" class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
 						?>
 					  <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select></div>
  </div>
   <div class="row large-12">
       <div class="col-sm-4">
	    <?php 
	   $ParentID= 22;
 	   ?>
	   <select id="sub_sub_cat_id" name="sub_sub_cat_id" >
                         <option value="" >All Property Type</option>
					    <?php
							 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$ParentID)));
							foreach($category as $k=>$v){
							?>
                        <option value="<?php echo $v["pc_id"]; ?>" > <?php echo $v["category"];  ?> </option>
                        <?php
							}
							?>
                      </select></div>
	   <div class="col-sm-8"> <input name="keyword" id="keyword" value="" type="text" class="textfield " placeholder="Keywords or Property ID#">
 	   </div>
    </div>
	 <div class="row large-12">
 	   <div class="col-sm-12"><input name="near_suburb" id="near_suburb" type="checkbox" class="textfield " value="yes"> <label>Surrounding Suburbs</label></div>
    </div>
 </form>
<?php 
}else if( $type == 'commercial_sale'){
?>
 <form name="tmpl_find_classified" method="post" action="#" id="tmpl_find_classified" class="tmpl_filter_results">
  <input type="hidden" name="posttype" value="classified"/>
  <input type="hidden" name="pagetype" value="archive"/>
  <input type="hidden" name="csortby" value="" id="csortby"/>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="country" id="country" onchange="fetch_city();" >
					<option value="0" >All Countries</option>
					<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
					?>
						<option value="<?php echo $v["cn_id"]; ?>" >
							<?php echo $v["cn_name"];  ?>
						</option>
					<?php } ?>
				</select></div>
   </div>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="city" id="city_update" onchange="fetch_region();" >
					<option value="">All Regions</option>
				</select></div>
		<div class="col-sm-4"><select id="region" name="region" onchange="fetch_suburb();">
					<option value="">All Cities</option>
				</select></div>
		<div class="col-sm-4"><select id="suburb" name="suburb" >					
					<option value="">All Suburb</option>				
				</select></div>
  </div>
  <div class="row large-12">
       <div class="col-sm-4"> <?php 
	   $ParentID= 28;
 	   ?>
	   <select id="sub_sub_cat_id" name="sub_sub_cat_id" >
                         <option value="" >All Property Type</option>
					    <?php
						 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$ParentID)));
							foreach($category as $k=>$v){
							?>
                        <option value="<?php echo $v["pc_id"]; ?>" > <?php echo $v["category"];  ?> </option>
                        <?php
							}
							?>
                      </select></div>
	   <div class="col-sm-8"> <input name="keyword" id="keyword" value=""  type="text" class="textfield " placeholder="Keywords or Property ID#">
 	   </div>
    </div>
  <div class="row large-12"><div class="col-sm-4"><label>Price</label></div> </div>
  <div class="row large-12">
      <div class="col-sm-2"><select name="min_price" id="min_price" class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
							
						?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select> </div>
	  <div class="col-sm-2"><select name="max_price" id="max_price" class="form-control input-sm"><option value="">ANY</option> <?php foreach($salesPrices as $salesPricesVals){ 
							$priceVals=  str_replace("$","",$salesPricesVals);
							$priceVals=  str_replace(",","",$priceVals);
 						?>
 					  <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?></select></div>
	   <div class="col-sm-6"><input name="near_suburb" id="near_suburb" type="checkbox" class="textfield " value="yes"> <label>Surrounding Suburbs</label></div>
  </div>
 	 
 </form>
<?php 
}else if( $type == 'for_lease'){
?>
<form name="tmpl_find_classified" method="post" action="#" id="tmpl_find_classified" class="tmpl_filter_results">
  <input type="hidden" name="posttype" value="classified"/>
  <input type="hidden" name="pagetype" value="archive"/>
  <input type="hidden" name="csortby" value="" id="csortby"/>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="country" id="country" onchange="fetch_city();" >
					<option value="0" >All Countries</option>
					<?php
						$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
						foreach($country as $k=>$v){
					?>
						<option value="<?php echo $v["cn_id"]; ?>" >
							<?php echo $v["cn_name"];  ?>
						</option>
					<?php } ?>
				</select></div>
   </div>
  <div class="row large-12">
  		<div class="col-sm-4"><select name="city" id="city_update" onchange="fetch_region();" >
					<option value="">All Regions</option>
				</select></div>
		<div class="col-sm-4"><select id="region" name="region" onchange="fetch_suburb();">
					<option value="">All Cities</option>
				</select></div>
		<div class="col-sm-4"><select id="suburb" name="suburb" >					
					<option value="">All Suburb</option>				
				</select></div>
  </div>
  <div class="row large-12">
       <div class="col-sm-4"> <?php 
	   $ParentID= 29;
 	   ?>
	   <select id="sub_sub_cat_id" name="sub_sub_cat_id" >
                         <option value="" >All Property Type</option>
					    <?php
							 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$ParentID)));
							foreach($category as $k=>$v){
							?>
                        <option value="<?php echo $v["pc_id"]; ?>" > <?php echo $v["category"];  ?> </option>
                        <?php
							}
							?>
                      </select></div>
	   <div class="col-sm-8"> <input name="keyword" id="keyword" value="" type="text" class="textfield " placeholder="Keywords or Property ID#">
 	   </div>
    </div>
  <div class="row large-12"><div class="col-sm-4"><label>Floor Area (In square meter)</label></div> </div>
  <div class="row large-12">
      <div class="col-sm-2"><select name="start_floor_area" id="start_floor_area"  class="form-control input-sm"><option value="">ANY</option> 
	 			 <?php  foreach($FloorAreaStartArray as $key=>$value){  ?>
                      <option value="<?php echo $key;?>"><?php echo $value;?></option>
                      <?php } ?></select> </div>
	  <div class="col-sm-2"><select name="end_floor_area" id="end_floor_area" class="form-control input-sm"><option value="">ANY</option> 
	  				<?php foreach($FloorAreaEndArray as $key=>$key){?>
 					  <option value="<?php echo $key;?>"><?php echo $key;?></option>
                      <?php } ?></select></div>
	   <div class="col-sm-6"><input name="near_suburb" id="near_suburb" type="checkbox" class="textfield " value="yes"> <label>Surrounding Suburbs</label></div>
  </div>
 	 
 </form> 
<?php 
}
?>
<div class="row large-12"><div class="col-sm-8"><input name="searchbtn" id="searchbtn" class="btn" onclick="ajax_pagintn1('1');" type="button" value="Search Property"></div></div>