<!-- reviews tabs content start-->
<section role="tabpanel" aria-hidden="false" class="content" id="classified_reviews" class="reviews-cls">
                                             <h2 class="print-heading">Reviews</h2>
                                         
		<section id="comments-template">
	<div class="comments-wrap ">

<div id="ajax_review">	

</div>
<!-- END AJAX REVIEW  -->







<?php
if(!isset($_SESSION["ar_id"])){
?>	
    	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">Add a Review </h3><p class="alert">You must be <a href="login.php" title="Log in">logged in</a> to post a comment.</p><!-- .alert -->	
		</div>
<?php
}else{
?>		
<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">Add a Review </h3>
		<div style="margin-bottom: 30px;">
		 <input style="max-width: 860px;"  onkeyup="rating_validate();" name="rating" id="rating" value="" type="text" class="textfield "  placeholder="Rating out of 5"/>
		 </div>
		<div style="margin-bottom: 30px;">
		 <textarea style="max-width: 860px;" class="wp-editor-area" rows="6" autocomplete="off" cols="40" name="comment" placeholder="comment" id="comment"></textarea>
		 </div> 
		<a  onclick="review_submit();" class="button"  href="javascript:void(0);">Submit</a>
		
		</div>
<?php
}
?>
		</div>
  <!-- .comments-wrap -->
</section>
<!-- #comments-template -->
</section>
 <!-- reviews tabs content end-->