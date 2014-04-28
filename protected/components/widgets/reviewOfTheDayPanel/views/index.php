<h4>Review of the day</h4>
<div class="following" >
	<?php foreach (ViewReview::getReviewOfTheDay() as $view): ?>
	<div class="follower">
		<?php echo CHtml::image($view->reviewProduct->product->getThumbImage(), 'Profile Name')?>
		<div class="fwlName"><?php echo $view->count_review;?></div>
	</div>
	<?php endforeach; ?>
</div>
