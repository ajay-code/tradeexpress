<?php
session_start();
require_once("function.php");
$aj_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_job_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_job_photo",array("ajp_id"=>$_POST["ajp_id"]),"../job_image/");
	$status=doDelete("add_job_photo",array("ajp_id"=>$_POST["ajp_id"]));	
}
?>
<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("aj_id,ajp_id,image,status","add_job_photo",array("aj_id"=>$aj_id)));
				foreach($image as $k=>$v){
				?>
				<div class="col-md-4">
				<div class="mix label2 folder2">
             <div class="panel p6 pbn">
<div class="of-h">
<img src="../job_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<div class="row table-layout">
<div class="col-xs-4 va-m pln" style="color:red;">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["ajp_id"];?>');" data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
</div>
<div class="col-xs-6 text-right va-m prn">
<a href="javascript:void(0)" title=" <?php if($v["status"]==0)echo getJobTitle($v["aj_id"]).' Not Approved ';else echo getJobTitle($v["aj_id"]).' is Approved';  ?> "><span class="fa fa-circle fs10 <?php if($v["status"]==0)echo ' text-danger ';  ?> ml10"></span></a>
<!-- text-danger for red icon -->
</div>
</div>
</div>
</div>
</div>
</div>
              <?php
               }
               ?>
			   