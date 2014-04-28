<div class="header_wrapper">
	<div class="logo">
		<a href="<?php echo Yii::app()->createUrl('site/');?>">
			<?php echo CHtml::image(Yii::app()->baseUrl . '/images/frontend/home_logo.png','',array('alt' => '','class'=>'logo'));?>
		</a>

	</div>
	<?php $this->widget('application.components.widgets.userinfo.UserInfo', array());?>
</div>