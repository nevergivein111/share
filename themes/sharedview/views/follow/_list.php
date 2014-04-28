<?php foreach ($follower as $follow): ?>
	<div class="follower">
		<?php echo CHtml::image($follow->following->getThumbImage(), 'Profile Name')?>
		<div class="fwlName"><?php echo $follow->following->getDisplayName(false)?></div>
		<?php echo CHtml::button("Follow", array("class" => "btnFollow", "data-follow-id" => $follow->id))?>
	</div>
<?php endforeach; ?>

<?php echo CHtml::link('View 5 more', 'javascript:void(0)', array('id' => 'view_5_more_button', "onclick"=>"addMore($page)")) ?>