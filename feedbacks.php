   <script type="text/javascript">

		function getAllFeedback(){
			var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
			
			data='feedbackType=all';
			$.post(
			'ajax_feedback.php?'+query_string+'&'+data,
			{},
			function(r){
				$("#feedback-container").html(r);
			})	
		}

		$( document ).ready(function() {
			getAllFeedback()
		});

		function getBuyerFeedback(){

			var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
			data='feedbackType=buyer';
			$.post(
			'ajax_feedback.php?'+query_string+'&'+data,
			{},
			function(r){
				$("#feedback-container").html(r);
			})
		}

		function getSellerFeedback(){
			var query_string='<?php echo $_SERVER["QUERY_STRING"]; ?>';
			data='feedbackType=seller';
			$.post(
			'ajax_feedback.php?'+query_string+'&'+data,
			{},
			function(r){
				$("#feedback-container").html(r);
			})
		}
   </script>
   <?php
		require_once 'function.php';
   		if(isset($_POST['feed_submit'])){
   			if(addFeedbacks()){
   				echo "<script>alert('Feedback Submitted');</script>";
   				echo "<script>window.location='{$_SERVER['REQUEST_URI']}';</script>";
   			}else{
   				echo "<script>alert('Feedback not Submitted');</script>";
   				echo "<script>window.location='{$_SERVER['REQUEST_URI']}';</script>";
   			}
   		}
   ?>
   <div id="feed-form" class="hide">
		<div id="respond" class="comment-respond">
			<h3 id="reply-title" class="comment-reply-title">Add a Feedback</h3>
			<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
				<!-- <div style="margin-bottom: 30px;">
				 <input style="max-width: 860px;" onkeyup="rating_validate_feed();" name="feed_ratings" id="rating-feed" value="" type="text" class="textfield "  placeholder="Rate out of 100"/>
				 </div> -->
				 <input type="hidden" name="awl_id" value="<?= isset($_GET['awl_id']) ? $_GET['awl_id']: '' ?>">
				 <input type="hidden" name="type" value="<?= isBuyerOrSeller() ?>">
				<div>
		   			<label class="feedback-emoji-container">
						<input type="radio" name="feed_ratings" value="1" required>
						<img class="feedback-emoji" src="/emoji/positive.png" alt="positive">
						<span>Positive</span>
					</label>
					<label class="feedback-emoji-container">
						<input type="radio" name="feed_ratings" value="0">
						<img class="feedback-emoji" src="/emoji/neutral.png" alt="Nutral">
						<span>Neutral</span>
					</label>
					<label class="feedback-emoji-container">
						<input type="radio" name="feed_ratings" value="-1">
						<img class="feedback-emoji" src="/emoji/negative.png" alt="Negative">
						<span>Negative</span>
					</label>
				</div>
				<div style="margin-bottom: 30px;">
				 <textarea style="max-width: 860px;" class="wp-editor-area" rows="6" autocomplete="off" cols="40" name="feed_comments" placeholder="Leave a message!" id="comment" maxlength="500" required></textarea>
				 </div> 
				 <input type="hidden" name="feed_by" value="<?=$_SESSION["ar_id"]?>">
				 <input type="hidden" name="feed_to" value="<?=$v3["ar_id"]?>">
				<button type="submit" class="button" name="feed_submit" value="feeds">Submit</button>
			</form>
		</div>
	</div>
<div>
	
</div>
    <div id="overview" class="entry-content">
		<div class="entry-content frontend-entry-content ">
			<div id="qa_area">
				<div class="single_qa" id="single_qa">
					<?php
						$feed_data=getFeedbacks($v3["ar_id"]);
						$PositiveFeedbackCount = getPositiveFeedbackCount($v3["ar_id"]);
						$NeutralFeedbackCount = getNeutralFeedbackCount($v3["ar_id"]);
						$NegativeFeedbackCount = getNegativeFeedbackCount($v3["ar_id"]);
					?>
                       <div class="feedback-count">
							<label class="feedback-emoji-container">
								<img class="feedback-emoji" src="/emoji/positive.png" alt="positive">
								<span> <?= $PositiveFeedbackCount ?> Positive Feesbacks</span>
							</label>
							<label class="feedback-emoji-container">
								<img class="feedback-emoji" src="/emoji/neutral.png" alt="Nutral">
								<span> <?= $NeutralFeedbackCount ?> Neutral Feesbacks</span>
							</label>
							<label class="feedback-emoji-container">
								<img class="feedback-emoji" src="/emoji/negative.png" alt="Negative">
								<span> <?= $NegativeFeedbackCount ?> Negative Feesbacks</span>
							</label>
					   </div>
					   <div style="background-color:#fff; overflow:scroll; padding: 10px">
							<a href="javascript:void(0)" onclick="getAllFeedback()">All</a> | <a href="javascript:void(0)" onclick="getSellerFeedback()">Selling</a> | <a href="javascript:void(0)" onclick="getBuyerFeedback()">Buying</a>
					   </div>
					   <div id="feedback-container" style="background-color:#fff; height:280px; overflow:scroll; padding: 10px">
					   <div>
					
					</div>
					
				</div>	
			</div>
			
		</div>
	</div>
