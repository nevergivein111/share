<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'forgot-form',
	'htmlOptions' => array('class' => 'form-vertical'),
	'enableClientValidation' => false,
	'errorMessageCssClass' => 'errorMessage2',

)); ?>
<div class="error_wrapper">
	<?php echo $form->errorSummary($model, null, null, array('class' => 'error_msg')); ?>
</div>
<?php if(Yii::app()->user->hasFlash('error')):?>
<div class="error_wrapper">
	<?php echo Yii::app()->user->getFlash('error'); ?>
</div>
<?php endif;?>
<div class="clear"></div>

<div class="login_box">

	<div class="login_title">
		<img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/login_icon.png')?>" alt="">
		<span>Generate new password</span>
	</div>

	<div class="login_input_wrapper top_space">
		<?php echo $form->label($model,'email',array());?>
		<?php echo $form->textField($model, 'email', array('class'=>$model->hasErrors("email") ? "input_error" : "" )); ?>
		<?php echo $form->error($model, 'email', array('class'=>'error_message_login')); ?>
	</div>

	<div class="login_btns" align="center">
		<?php echo CHtml::button('Send', array('class' => 'blue_btn_sml', 'type' => 'submit')); ?>
	</div>
	<?php $this->endWidget(); ?>




</div>