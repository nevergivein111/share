<div class="activityRow">
	<div class="activityDuration"><?php echo Additional::TimeAgoFormat($create_date);?></div>
	<div class="userImg">
		<a href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $user->id));?>">
			<?php echo CHtml::image($user->getThumbImage(true),$user->getDisplayName(),array('width' => '75'))?>
		</a>
	</div>
	<div class="activityDetail">
		<div class="activityTxt">
			<div class="titleTxt">
				<?php echo $headerText?>
			</div>

			<div class="userCmt">
				<?php echo $headerComment?>
			</div>
		</div>
		<?php
		$this->widget('application.components.widgets.reviews.ReviewProducts',array(
				  'review' => $review,
				  'user' => $user,
				  'key' => $key,
				  'create_date' => $create_date,
		));
		?>
	</div>
</div>
<script>
$(function () {
	var id = 'tooltip_user_<?php echo $key;?>';
	var content ='<?php $this->renderPartial("shared/_popover_user",array('user' => $user))?>';
	showPopover(id,content);
});
</script>