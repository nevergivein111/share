<div class="search_product_wrapper">
	<div class="search_product_info">
		<div class="search_prod_thumb">
			<?php echo CHtml::image($data->getThumbImage(false));?>
		</div>
	</div>
	<div class="search_prod_details">
		<div class="search_prod_name">
			<?php echo CHtml::link($data->name,Yii::app()->createUrl('product/view',array('name'=>$data->alias)));?>
			
		</div>
		<div class="search_prod_star">
			<a href="#">
				<?php echo CHtml::image(Yii::app()->baseUrl.'/images/frontend/star_review.png');?>
			</a>
		</div>
		<div class="search_prod_review">
			<a href="#">60 Reviews</a>
		</div>
	</div>
	<div class="search_prod_lastview">
		Last Reviewed : 30 minutes ago
	</div>
</div>