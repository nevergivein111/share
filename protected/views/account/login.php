<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'htmlOptions' => array('class' => 'form-vertical'),
	'enableClientValidation' => false,
	'errorMessageCssClass' => 'errorMessage2',

)); ?>
<div class="error_wrapper">
	<?php echo $form->errorSummary($model, null, null, array('class' => 'error_msg')); ?>
</div>
<?php if(Yii::app()->user->hasFlash('success')):?>
<div class="error_wrapper">
	<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif;?>
<div class="clear"></div>

<div class="login_box">

	<div class="login_title">
		<img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/login_icon.png')?>" alt="">
		<span>login</span>
	</div>

	<div class="login_input_wrapper top_space">
		<?php echo $form->label($model,'email_address',array());?>
		<?php echo $form->textField($model, 'email', array('class'=>$model->hasErrors("email") ? "input_error" : "" )); ?>
		<?php echo $form->error($model, 'email', array('class'=>'error_message_login')); ?>
	</div>

	<div class="login_input_wrapper">
		<?php echo $form->label($model,'password', array());?>
		<?php echo $form->passwordField($model, 'password', array('class'=>$model->hasErrors("email") ? "input_error" : "" )); ?>
		<?php echo $form->error($model, 'password', array('class'=>'error_message_login')); ?>
	</div>

	<label class="agree_checkbox">
		<?php echo $form->checkBox($model, 'rememberMe', array()); ?>
		Remember Me
	</label>

	<div class="login_btns" align="center">
		<?php echo CHtml::button('Sign In', array('class' => 'blue_btn_sml', 'type' => 'submit')); ?>
		<span><a href="<?= Yii::app()->createUrl('account/forgot')?>">Forgot Password?</a></span>
	</div>
	<?php $this->endWidget(); ?>

	<div class="or_sep">
		<img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/or_sep.png')?>" alt="">
	</div>

	<div class="login_fb_btn">
		<a href="#" class="blue_btn_lrg">
			<img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/fb_icon.png')?>" alt="">
			<span>Login with Facebook</span>
		</a>
	</div>

	<div class="create_account_txt" align="center">
		<a href="<?= Yii::app()->createUrl('register')?>">Don't have an accound yet? Create new one.</a>
	</div>

	<div class="register_now_btn">
		<a href="<?= Yii::app()->createUrl('register')?>" class="green_btn_lrg">Register Now!</a>
	</div>

</div>