<?php
session_start();
require_once("function.php");
$acm_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_car_motorcycle_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]),"car_motorcycle_image/");
	$status=doDelete("add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]));	
}
?>
<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("acm_id,acmp_id,image,status","add_car_motorcycle_photo",array("acm_id"=>$acm_id)));
				foreach($image as $k=>$v){
				?>
<img src="car_motorcycle_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["acmp_id"];?>');"  title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
              <?php
               }
               ?>