<?php

session_start();

require_once("function.php");

$_POST=trimmer($_POST);

?>




<?php

$comment="";

if($_POST["for_what"]=="rental_combo"){

$comment="Rental combo";	

}else if($_POST["for_what"]=="rental_feature"){

$comment="Rental feature";	

}else if($_POST["for_what"]=="listed_in_second_cat"){

$comment="Listing in second category";	

}else if($_POST["for_what"]=="subtitle"){

$comment="subtitle";	

}else if($_POST["for_what"]=="reserve_price"){

$comment="Reserve Price";	

}else if($_POST["for_what"]=="Feature_Combo"){

$comment="Feature Combo";	

}else if($_POST["for_what"]=="Featured"){

$comment="Featured";	

}else if($_POST["for_what"]=="Highlight"){

$comment="Highlight";	

}

else if($_POST["for_what"]=="Bold_Title"){

$comment="Bold Title";	
// Here added 2 new values rental highlight and rental bold by Sachin Dec 8 2017
}else if($_POST["for_what"]=="rental_highlights"){

$comment="Rental Highlights";	

}

else if($_POST["for_what"]=="rental_bold"){

$comment="Rental Bold";	 

} else if($_POST['for_what']=="job_feature"){
	$comment = "Job Feature";
}else if($_POST['for_what'] == "branding"){
	$comment = "Branding";
}else{

	$comment="MotorWeb Basic Report";

}

echo $comment;

$price_listing_dtls=getDetails(doSelect("apfc_id,for_what,price,min_price,max_price","add_price_for_classified",array("for_what"=>$_POST["for_what"])));

if(empty($price_listing_dtls)){

?>

<div class="row">

<div class="col-md-4">

<div class="section">

<h6 style="color: #999;">Price ( <?php echo currency();  ?> ) :</h6>

<label class="field prepend-icon">

<input type="text" name="price" id="price"  class="gui-input"   placeholder="Price">

<b class="tooltip tip-right-top" id="price_error"><em>Price For <?php  echo $comment; ?></em></b>

<label for="tooltip1" class="field-icon">

<i class="fa fa-sign-out"></i>

</label>

</label>

</div>

</div>



<div class="col-md-4">

<div class="section">

<h6 style="color: #999;">Min Price ( <?php echo currency();  ?> ) :</h6>

<label class="field prepend-icon">

<input type="text" name="min_price" id="min_price"  class="gui-input" onkeypress="return only_number(event)"  placeholder="Min Price">

<b class="tooltip tip-right-top" id="min_price_error"><em>Minimum Price For <?php  echo $comment; ?></em></b>

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

<b class="tooltip tip-right-top" id="max_price_error"><em>Maximum Price For <?php  echo $comment; ?></em></b>

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

<div class="col-md-4">

<div class="section">

<h6 style="color: #999;">Price ( <?php echo currency();  ?> ) :</h6>

<label class="field prepend-icon">

<input type="text" name="price" id="price"  class="gui-input" value="<?php echo $v["price"]; ?>"  placeholder="Price">

<b class="tooltip tip-right-top" id="price_error"><em>Price For <?php  echo $comment; ?></em></b>

<label for="tooltip1" class="field-icon">

<i class="fa fa-sign-out"></i>

</label>

</label>

</div>

</div>



<div class="col-md-4">

<div class="section">

<h6 style="color: #999;">Min Price ( <?php echo currency();  ?> ) :</h6>

<label class="field prepend-icon">

<input type="text" name="min_price" id="min_price" value="<?php echo $v["min_price"]; ?>"  class="gui-input" onkeypress="return only_number(event)"  placeholder="Min Price">

<b class="tooltip tip-right-top" id="min_price_error"><em>Minimum Price For <?php  echo $comment; ?></em></b>

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

<b class="tooltip tip-right-top" id="max_price_error"><em>Maximum Price For <?php  echo $comment; ?></em></b>

<label for="tooltip1" class="field-icon">

<i class="fa fa-sign-out"></i>

</label>

</label>

</div>

</div>

</div>





<input type="hidden" id="apfc_id" value="<?php echo $v["apfc_id"]; ?>" name="apfc_id" />

<div class="row" style="margin-top:30px;">

<div class="col-md-4">

<input class="btn btn-default btn-primary" type="submit" name="submit" value="Update" >

</div>

</div>

<?php

	}

}

?>