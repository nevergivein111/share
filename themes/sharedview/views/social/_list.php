<div class="seprateLine1"></div>
<div class="activityRow">

	<div class="userImg">
		<a href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $user->id));?>" id="review_user_id_<?php echo $key;?>" title="<?php echo $user->getDisplayName();?>">
			<?php echo CHtml::image($user->getThumbImage(true),$user->getDisplayName(),array())?>
			<div class="activityDuration"><?php echo Additional::TimeAgoFormat($create_date);?></div>
		</a>
	</div>
	<div class="activityDetail">
		<div class="activityTxt">
			<div class="titleTxt">
				<?php echo $headerText; ?>
			</div>

			<div class="actRate">
				<?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review->getOverall()));?>
                <div class="rating_details">
                	<a href="#" class="reviewDetails">Rating Details</a>
                </div>
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
            var id = 'review_user_id_<?php echo $key?>';
            var u_id ='tooltip_user_<?php echo $key?>';
            var content = '<?php $this->renderPartial("//activity/shared/_popover_user",array('user' => $user))?>';
            var n_id = 'atooltip_products_<?php echo $key?>';

            var content2 = '<?php $this->renderPartial("//activity/shared/_popover_product",array('product' => $review->product)); ?>';
            showPopover(id,content);
            showPopover(u_id,content);
            showPopover(n_id,content2);
        }
    );
</script>