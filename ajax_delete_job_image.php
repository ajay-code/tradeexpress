<?php
session_start();
require_once("function.php");
$aj_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_job_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_job_photo",array("ajp_id"=>$_POST["ajp_id"]),"job_image/");
	$status=doDelete("add_job_photo",array("ajp_id"=>$_POST["ajp_id"]));	
}
?>
<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("aj_id,ajp_id,image,status","add_job_photo",array("aj_id"=>$aj_id)));
				foreach($image as $k=>$v){
				?>
<img src="job_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">

<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["ajp_id"];?>');"  data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
              <?php
               }
               ?>
			   