<?php
/**
 * @var ReviewProduct $review
 * @var User $user 
 * @var int $key
 * @var string $create_date
 * @var int $count
 */
?>
<div class="<?php echo ($count < TopTrending::PEOPLE_YOU_ARE_FOLLOWING_FEEDS_COUNT)? '' : 'people_you_are_following_row'; ?>" style="<?php echo ($count < TopTrending::PEOPLE_YOU_ARE_FOLLOWING_FEEDS_COUNT)? '' : 'display:none;'; ?>">
	<div class="activityRow">
		<div class="userImg">
			<?php echo CHtml::image($user->getThumbImage(true),$user->getDisplayName(),array())?>
		</div>
		<div class="activityDetail">
			<div class="postDuration">2 hours ago</div>
			<div class="activityTxt" style="width:100%;">
				<div class="titleTxt">
					<span><?php echo $headerText; ?></span>
				</div>
				<div class="actProRate">
					<div class="actRate">
						<div class="smallRating"><?php echo sprintf ("%.2f", $review->getOverall()); ?></div> 
						<?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review->getOverall()));?>
						<div class="rating_details" style="margin-top:0;">
							<a class="reviewDetails" href="#" style="padding:0 0 0 5px;float:left;font-size:11px;">Rating Details</a>
						</div>
						<div class="reviewOpt">
							<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl."/images/starone.png"; ?>" /> ROTD</a>
							<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl."/images/expert_review_icon.png"; ?>" /> Expert Review</a>
							<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl."/images/ic_firsts.JPG"; ?>" width="12" /> First to Review</a>
						</div>
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
	<div class="seprateLine1"></div>
</div>