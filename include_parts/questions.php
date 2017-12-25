    <div id="overview" class="entry-content">
    	
		<div class="entry-content frontend-entry-content ">
			<div id="qa_area">
				<div class="single_qa" id="single_qa">
					<?php
							$inc=0;
						$q_data=getQuestions($v["agi_id"]);
						if(!empty($q_data)):
						foreach($q_data as $q):
							$inc++;
							$user_q=getValue("ambit_registration","name",$q['cus_id'],"ar_id");
					?>
					<div class="question-p" id="single_q">
						<div class="only-q">
							<span class="q-tag">Q.</span>
							<span class="q-text"><?=$q['question']?><br><span class="q-who"><a href="profile_details.php?cus_id=<?=$q['cus_id']?>">By <?=$user_q?></a>, <?php 
							$c_date=date_create($q['question_time']);
							echo date_format($c_date, 'g:ia \o\n l jS F Y')?></span></span>
						</div>
						<div class="only-a">
							<?php if(is_null($q['answer']) && $fl_qa==1): ?>
								<p id="put-a-<?=$inc?>" style="color: #01579b; font-weight: 600; cursor: pointer;">Add answer to this question</p>
								<form id="a-form-<?=$inc?>" name="a-form" action="javascript:void(0);" method="POST" style="display:none">
									<textarea id="text-q-a" name="answer" rows="2" cols="15" class="text-question" maxlength="500" required=""></textarea>
									<div id="textarea_feedback"></div>
									<input type="hidden" name="a_id" value="<?=$q["id"]?>">
									<button type="submit" name="submit_a" id="submit_a" class="btn-q">Submit</button>
								</form>
								<script type="text/javascript">
									$(document).ready(function() {
										$('#put-a-<?=$inc?>').click(function(){	
											$( "#a-form-<?=$inc?>" ).toggle();
										});

										$("#a-form-<?=$inc?>").on('submit',(function(e){  
										$.ajax({
									        	url: "add_answer.php",
												type: "POST",
												data:  new FormData(this),
												contentType: false,
									    	    cache: false,
												processData:false,
												success: function(data)
											    {
													alert(data);
													location.reload();
											    },
											    error: function() 
										    	{
										    	}	        
										   });
										}));
									});
								</script>
							<?php elseif(is_null($q['answer'])):?>
								<p id="show-a">Answer is not available at the moment.</p>
							<?php else: ?>
							<span class="a-tag">A.</span>
							<span><?=$q['answer']?> <span class="a-who"><?php 
							$ca_date=date_create($q['answer_time']);
							echo date_format($ca_date, 'g:ia \o\n l jS F Y')?></span></span>
						<?php endif; ?>
						</div>
					</div>
					<?php endforeach; 
					else: ?>
					<h2>No questions being asked on this item. If, you have any question feel free to ask!</h2>
					<?php endif; ?>
				</div>	
			</div>
			<div class="rest-body">
				<!--<p class="para-qa">Number of unanswered questions in this auction: <?php
					echo getNumberQuestions($v["agi_id"]);
				?></p>-->
				<p class="para-note">To prevent your information being misused do not put your emails or phone numbers in questions. Failure to comply may result in suspension of your account.</p>
				<!-- <hr> -->
				<div class="ask">
					<h2 style="margin-top:0 !important;">Ask a Question!</h2>
					<form id="qa-form" name="qa-form" action="javascript:void(0);" method="POST">
						<textarea id="text-q-a" name="question" rows="3" cols="15" class="text-question" maxlength="500" required=""></textarea>
						<div id="textarea_feedback"></div>
						<input type="hidden" name="item_id" value="<?=$v["agi_id"]?>">
						<button type="submit" name="submit_q" onclick="return put_question_now();" id="submit_q" class="btn-q">Submit</button>
					</form>
				</div>
				<script type="text/javascript">
					$(document).ready(function() {
/*
						$( "#single_qa" ).animate({
                    		scrollTop: $(".single_qa:last-child").offset().top
                		}, 1000);*/

						/*$(".single_qa div:last-child").attr({ scrollTop: $(".single_qa div:last-child").attr("scrollHeight") });*/


						/*$('#put-a').click(function(){
							$( "#a-form" ).toggle();
						});*/

					    var text_max = 500;
					    $('#textarea_feedback').html(text_max + ' characters remaining');

					    $('#text-q-a').keyup(function() {
					
					        var text_length = $('#text-q-a').val().length;
					        var text_remaining = text_max - text_length;

					        $('#textarea_feedback').html(text_remaining + ' characters remaining');
					    });
					    });
				</script>
			</div>
		</div>
	</div>