<?php
session_start();
require 'function.php';
    if($_GET['cus_id']){
        $cus_id = $_GET['cus_id'];
    }else{
        $cus_id = $_SESSION['ar_id'];
    }
    $con = array('feedback_to'=> $cus_id);
    $select = '*';
    $from="feedbacks";
    $query = doSelect2($select,$from,$con);
    if($_GET['feedbackType'] == 'all'){

    }
    else if($_GET['feedbackType'] == 'buyer'){
        $query .= " AND type = 'seller'";
    }
    else if($_GET['feedbackType'] == 'seller'){
        $query .= " AND type = 'buyer'";  
    }
    
    $feed_data = getDetails(doSelect3($query));
    $cusName = getValue('ambit_registration', 'name', $cus_id, 'ar_id');
    

if(!empty($feed_data)):

foreach($feed_data as $feed):
    
    $user_name=getValue("ambit_registration","name",$feed['feedback_by'],"ar_id");
    $user_image=getValue("ambit_registration","image",$feed['feedback_by'],"ar_id");
?>
					<div class="row" >
						<div class="col-xs-4 col-sm-2 ">
							<div >
								<?php if($feed['ratings'] === '1' ): ?>
								<img src="emoji/positive.png" style="width:25px;height:25px;margin:0">
								<?php elseif($feed['ratings'] === '0' ): ?>
								<img src="emoji/neutral.png" style="width:25px;height:25px;margin:0">
								<?php elseif($feed['ratings'] === '-1' ): ?>
								<img src="emoji/negative.png" style="width:25px;height:25px;margin:0">
								<?php endif; ?>

							</div>
						</div>	
						<div class="col-xs-8 col-sm-4" style="padding-left:5px;">
							<h4 style="margin:0 !important"><a style="color:#000!important;text-decoration:none" href="profile_details.php?cus_id=<?=$feed['feedback_by']?>"><?=$user_name?></a></h4>
							<p><?=$feed['message']?></p>
						</div>
						<div class="col-xs-4 col-sm-2">
							<span class="feedback-detail">
								<?= get_date_str_feedback($feed['created_at']) ?>
							</span>
						</div>
						<div class="col-xs-6 col-sm-4" style="padding-left:5px;">
							<span class="feedback-detail">
							<?= $cusName ?> was the <?= $feed['type'] == 'buyer' ? 'seller' : 'buyer' ?>
							</span>	
						</div>
					</div>
					<hr>
					<?php endforeach; ?>
					<?php else: ?>
					<h2>No feedbacks yet!</h2>
					<?php endif; ?>