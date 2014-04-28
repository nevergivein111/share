<div class="reviewText">
	<?php
	$comm_count = count($review->reviewComments);
	 $isGuest = (Yii::app()->user->isGuest) ? 'isGuest':'';
	 $owner = (Yii::app()->user->id == $review->user_id) ? 'add_helpful_to_review':'';
	if($comm_count > 4):
		?>
		<span class="comment_toggle" data-id="<?php echo $review->id;?>">
			<?php echo $review->getCommentCountText($comm_count);?>
		</span>
		<span class="comment_umbersand">|</span>
		Find this review <span class="helfulR  <?php echo $isGuest.' '.$owner;?>" data-id="<?php echo $review->id;?>" data-url="<?php echo Yii::app()->createUrl('helpful/process');?>"><?php echo ViewReview::getCountHelpful($review->id)?></span>
		<?php else:?>
		Find this review <span class="helfulR <?php echo $isGuest.' '.$owner;?>" data-id="<?php echo $review->id;?>" data-url="<?php echo Yii::app()->createUrl('helpful/process');?>"><?php echo ViewReview::getCountHelpful($review->id)?></span>
	<?php endif;?>
	<?php if(isset($user->id) && $user->id === $review->user->id):?>
	<div class="actAction">
		<a href="<?php echo Yii::app()->createUrl('reviewProduct/update',array('id' => $review->id))?>">Edit<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icEdit.png" alt="Edit" /></a>
		<a class="delete_review"href="javascript:void(0);" data-list="review_list_view" data-url="<?php echo Yii::app()->createUrl('reviewProduct/deleteRev',array('id'=>$review->id));?>">Remove<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icClose.png" alt="Remove" /></a>
	</div>
				<?php endif;?>
</div>
<?php

$this->widget('application.components.widgets.reviewComments.ReviewProductComments',array(
		  'review_id' => $review->id,
		  'review' => $review,
		  'user' => $user
));

?>
