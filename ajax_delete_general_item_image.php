<?php
session_start();
require_once("function.php");
$agi_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_general_item_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_general_items_photo",array("agip_id"=>$_POST["agip_id"]),"general_items_image/");
	$status=doDelete("add_general_items_photo",array("agip_id"=>$_POST["agip_id"]));	
}
?>

				<?php
				$image=getDetails(doSelect("agi_id,agip_id,image,status","add_general_items_photo",array("agi_id"=>$agi_id)));
				foreach($image as $k=>$v){
				?>
<img src="general_items_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["agip_id"];?>');"  title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
              <?php
               }
               ?>