<?php
session_start();
require_once("function.php");
$ap_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_property_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_property_photo",array("app_id"=>$_POST["app_id"]),"property_image/");
	$status=doDelete("add_property_photo",array("app_id"=>$_POST["app_id"]));	
}
?>
<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("ap_id,app_id,image,status","add_property_photo",array("ap_id"=>$ap_id)));
				foreach($image as $k=>$v){
				?>
				<img src="property_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">

				<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["app_id"];?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
				<h6>Delete</h6></a>
              <?php
               }
               ?>