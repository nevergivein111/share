
<div class="left_nav">
	<div class="activity_wrapper">
	<?php
		$this->widget('application.components.widgets.myActivityPanel.MyActivityPanel', array(
				  'menu_title'=>'My Activity',
				  'data' =>array(
							array('label'=>'All',      'link'=>Yii::app()->createUrl('profile'),'active_controller'=>'profile','active_action'=>'index'),
							array('label'=>'Reviews',  'link'=>Yii::app()->createUrl('profile/reviews'),'active_controller'=>'profile','active_action'=>'reviews'),
							array('label'=>'Following','link'=>Yii::app()->createUrl('profile/followings'),'active_controller'=>'profile','active_action'=>'followings'),
							array('label'=>'Followers','link'=>Yii::app()->createUrl('profile/followers'),'active_controller'=>'profile','active_action'=>'followers'),
					),

				  ));
		?>

	</div>
	<div class="copyright_wrapper">
		<?php
		$this->widget('application.components.widgets.copyrightPanel.CopyrightPanel');
		?>

	</div>
</div>

