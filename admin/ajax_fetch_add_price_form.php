<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
?>


<?php
$price_listing_dtls=getDetails(doSelect("apfl_id,for_what,price,term,min_price,max_price,price_term,rent_term,rent_min,rent_max","add_price_for_listing",array("for_what"=>$_POST["for_what"])));
if(empty($price_listing_dtls)){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="price" id="price"  class="gui-input"   placeholder="Price">
<b class="tooltip tip-right-top" id="price_error"><em>Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Term :</h6>
<label class="field prepend-icon">
<input type="text" name="term" id="term"  class="gui-input"   placeholder="Terms">
<b class="tooltip tip-right-top" id="term_error"><em>Terms</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Min Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="min_price" id="min_price"  class="gui-input" onkeypress="return only_number(event)"  placeholder="Min Price">
<b class="tooltip tip-right-top" id="min_price_error"><em>Minimum Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Max Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="max_price" id="max_price"  class="gui-input" onkeypress="return only_number(event)" placeholder="Max Price">
<b class="tooltip tip-right-top" id="max_price_error"><em>Maximum Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Term about Min Price To Max Price :</h6>
<label class="field prepend-icon">
<input type="text" name="price_term" id="price_term"  class="gui-input" placeholder="Terms">
<b class="tooltip tip-right-top" id="price_term_error"><em>For Related Term about Min Price To Max Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Min Rental Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_min" id="rent_min"  class="gui-input" onkeypress="return only_number(event)" placeholder="Price">
<b class="tooltip tip-right-top" id="rent_min_error"><em>Minimum Rental Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Max Rental Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_max" id="rent_max"  class="gui-input" onkeypress="return only_number(event)" placeholder="Price">
<b class="tooltip tip-right-top" id="rent_max_error"><em>Maximum Rental Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Term about Rent Min Price :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_term" id="rent_term"  class="gui-input" placeholder="Terms">
<b class="tooltip tip-right-top" id="rent_term_error"><em>For Related Term about Rent Min Price To Rent Max Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>
<?php
}else{
	
foreach($price_listing_dtls as $k=>$v){
?>
<div class="row">
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="price" id="price"  class="gui-input" value="<?php echo $v["price"]; ?>"  placeholder="Price">
<b class="tooltip tip-right-top" id="price_error"><em>Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<h6 style="color: #999;">Term :</h6>
<label class="field prepend-icon">
<input type="text" name="term" id="term" value="<?php echo $v["term"]; ?>"  class="gui-input"   placeholder="Terms">
<b class="tooltip tip-right-top" id="term_error"><em>Terms</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Min Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="min_price" id="min_price" value="<?php echo $v["min_price"]; ?>"  class="gui-input" onkeypress="return only_number(event)"  placeholder="Min Price">
<b class="tooltip tip-right-top" id="min_price_error"><em>Minimum Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Max Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="max_price" id="max_price" value="<?php echo $v["max_price"]; ?>"  class="gui-input" onkeypress="return only_number(event)" placeholder="Max Price">
<b class="tooltip tip-right-top" id="max_price_error"><em>Maximum Price For Listing</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Term about Min Price To Max Price :</h6>
<label class="field prepend-icon">
<input type="text" name="price_term" id="price_term"  value="<?php echo $v["price_term"]; ?>" class="gui-input" placeholder="Terms">
<b class="tooltip tip-right-top" id="price_term_error"><em>For Related Term about Min Price To Max Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Min Rental Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_min" id="rent_min"  class="gui-input" value="<?php echo $v["rent_min"]; ?>" onkeypress="return only_number(event)" placeholder="Price">
<b class="tooltip tip-right-top" id="rent_min_error"><em>Minimum Rental Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>

<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Max Rental Price ( <?php echo currency();  ?> ) :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_max" id="rent_max" value="<?php echo $v["rent_max"]; ?>"  class="gui-input" onkeypress="return only_number(event)" placeholder="Price">
<b class="tooltip tip-right-top" id="rent_max_error"><em>Maximum Rental Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<h6 style="color: #999;">Term about Rent Min Price :</h6>
<label class="field prepend-icon">
<input type="text" name="rent_term" id="rent_term"  value="<?php echo $v["rent_term"]; ?>" class="gui-input" placeholder="Terms">
<b class="tooltip tip-right-top" id="rent_term_error"><em>For Related Term about Rent Min Price To Rent Max Price</em></b>
<label for="tooltip1" class="field-icon">
<i class="fa fa-sign-out"></i>
</label>
</label>
</div>
</div>
</div>

<input type="hidden" id="apfl_id" value="<?php echo $v["apfl_id"]; ?>" name="apfl_id" />
<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Update" >
</div>
</div>
<?php
	}
}
?>