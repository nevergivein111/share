<?php if (!($follow = User::model()->checkFollwing($follower_id, $following_id))): ?>
	<input type="button" class="btnBg loginBtn btnFlw follow_button" value="Follow" />
<?php else: ?>
	<input type="button" class="btnBg loginBtn btnUnFlw following_button" value="Following" data-id="<?php echo $follow->id; ?>"/>
<?php endif; ?>

<input type="hidden" class="follower_user_id" value="<?php echo $follower_id; ?>"/>
<input type="hidden" class="following_user_id" value="<?php echo $following_id; ?>"/>