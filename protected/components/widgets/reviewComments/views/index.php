
<div class="commentArea">

	<?php

	$this->widget('zii.widgets.CListView',array(
			  'id' => 'comment_list_' . $review_id,
			  'dataProvider' => $comments,
			  'itemView' => '_comment_list',
			  'template' => '{items}',
			  'afterAjaxUpdate' => 'deleteComment',
			  'emptyText' => ''
	));

	?>
	<div class="commentRow">
		<div class="commentorPic">
			<?php if(Yii::app()->user->id):?>
				<?php $cll = 'cmttxtarea';?>
				<img src="<?php echo $user->getThumbImage(false);?>" alt="<?php echo $user->getDisplayName(true);?>" />
			<?php else:?>
				<?php $cll = 'cmttxtarea isGuest';?>
				<img src="<?php echo Yii::app()->baseUrl;?>/images/avatar.jpeg" />
			<?php endif;?>
		</div>
		<div class="commentInput">
			<form method="post" action="<?php echo Yii::app()->createUrl('profile/addReviewComment');?>"  class="review-comment-form">
				<textarea name="ReviewComment[comment]" placeholder="Write new comment" class="<?php echo $cll;?>" data-id='<?php echo $review_id;?>'></textarea>
				<input type='hidden' name='ReviewComment[review_id]' value='<?php echo $review_id;?>' />
				<input type='hidden' name='ReviewComment[user_id]' value='<?php echo Yii::app()->user->id;?>' />
				<div class='comment_error' ></div>
			</form>
		</div>
	</div>
</div>


