<div class="profile_detail_info">
	<div class="profile_image">
		<?php echo CHtml::image($data->product->getThumbImage(false));?>
	</div>
	<div class="profile_info">
		<span>
			<?php echo CHtml::link($data->product->name,Yii::app()->createUrl('product/view',array('name' => $data->product->alias)));?>
		</span>
		<div>
			<span><?php echo $data->title;?></span>
		</div>
	</div>
	<div class="right_info">
		<span>
			<a href="<?php echo Yii::app()->createUrl('reviewProduct/update',array('id' => $data->id))?>" class="link_class">Edit</a>
			<span class="link_ambersand">|</span>
			<a href="#" class="link_class delete_link">Delete</a>
		</span>
		

	</div>
	<div class="clear"></div>
</div>
<div class="addit_info">
	<?php echo $data->getAvgRating();?>
	<div id="component_holder_<?php echo $data->id;?>" style="width:100%" class="prod_rating">
		<?php $this->renderPartial("//reviewProduct/shared/_view_component",array('model' => $data,'component' => $data->loadReviewComponent(),));?>
	</div>
</div>
<div class="addit_info">
	<div>
		<label>Pros</label>
		<div>
			<?php echo $data->pros;?>
		</div>
	</div>
	<div>
		<label>Cons</label>
		<div>
			<?php echo $data->cons;?>
		</div>
	</div>
	<?php

	$this->widget('application.components.widgets.reviewComments.ReviewProductComments',array(
			  'review_id' => $data->id,
			  'user' => $user
	));

	?>
</div>

