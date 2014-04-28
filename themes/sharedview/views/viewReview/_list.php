<?php foreach ($recent_view as $view): ?>
	<div class="follower">
		<?php echo CHtml::image($view->reviewProduct->product->getThumbImage(), 'Profile Name')?>
		<div class="fwlName"><?php echo  Additional::TimeAgoFormat($view->reviewProduct->create_date);?></div>
	</div>
<?php endforeach; ?>

<?php echo CHtml::link('View 5 more', 'javascript:void(0)', array('id' => 'view_5_more_button', "onclick"=>"addMoreRecentView($page)")) ?>