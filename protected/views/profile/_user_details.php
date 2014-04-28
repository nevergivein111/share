<div class="profile_detail_info">
	<div class="profile_image">
		<?php echo CHtml::image($model->getThumbImage(false));?>
	</div>
	<div class="profile_info">
		<span><?php echo $model->getDisplayName();?></span>
		<div>
			<label>Age:</label>
			<span>29 years</span>
		</div>
	</div>
	<div class="right_info">
		<label>Member Since:</label>
		<span><?php echo $model->sinceDate();?></span>
		<label><?php echo $model->gender;?></label>

	</div>
	<div class="clear"></div>
</div>	