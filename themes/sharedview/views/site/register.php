<div class="login_title">
	<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/login_icon.png" alt="">
	<span>New to Shareview?</span>
</div>
<div class="login_fb_btn reg_fb">

	<a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login',array('provider' => 'Facebook'))?>" class="blue_btn_lrg">
		<img src="<?php echo Yii::app()->baseUrl . '/images/frontend/fb_icon.png';?>" alt="">
		<span>Sign up with Facebook</span>
	</a>
</div>

<?php if(Yii::app()->user->hasFlash('hybridauth-error')):?>
	<div class="error_wrapper">
		<?php echo Yii::app()->user->getFlash('hybridauth-error');?>
	</div>
<?php endif;?>
<div align="center">
	<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/or_sep.png" alt="">
</div>
<div class="reg_field_wrapper">
	<?php

	$form = $this->beginWidget('GxActiveForm',array(
			  'id' => 'user-form',
			  'enableAjaxValidation' => false,
			  'htmlOptions' => array(
			  'style' => "padding-top:0"
			  ),
	  ));

	?>


    <div class="reg_field_sml first_sml">
		<?php echo $form->label($model,'firstname',array());?>
		<?php echo $form->textField($model,'firstname',array('class' => $model->hasErrors("firstname") ? "error_input" : "",'maxlength' => 50));?>
		<?php echo ($model->hasErrors("firstname")) ? "<span>* Required</span>":''?>
	
    </div><!-- row -->

    <div class="reg_field_sml second_sml">
		<?php echo $form->label($model,'lastname',array());?>
		<?php echo $form->textField($model,'lastname',array('class' => $model->hasErrors("lastname") ? "error_input" : "",'maxlength' => 50));?>
		<?php echo ($model->hasErrors("lastname")) ? "<span>* Required</span>":''?>
    </div><!-- row -->

    <div class="reg_field">
		<?php echo $form->label($model,'email',array());?>
		<?php echo $form->textField($model,'email',array('class' => $model->hasErrors("email") ? "error_input" : "",'maxlength' => 50));?>
		<?php echo $form->error($model,'email',array('class' => 'error_message_login'));?>
    </div><!-- row -->

    <div class="reg_field">
		<?php echo $form->label($model,'password',array());?>
		<?php echo $form->passwordField($model,'password',array('class' => $model->hasErrors("password") ? "error_input" : "",'maxlength' => 128));?>
		<?php echo $form->error($model,'password',array('class' => 'error_message_login'));?>
    </div><!-- row -->

    <div class="reg_field">
		<?php echo $form->label($model,'confirm_password',array());?>
		<?php echo $form->passwordField($model,'confirm_password',array('class' => $model->hasErrors("confirm_password") ? "error_input" : "",'maxlength' => 128));?>
		<?php echo $form->error($model,'confirm_password',array('class' => 'error_message_login'));?>
    </div><!-- row -->
	<div class="reg_field">
		<?php echo $form->label($model,'birthday',array());?>
		<?php echo $form->dropDownList($model,'month',Additional::MonthList(),array('prompt' => 'Month','class' => ($model->hasErrors("birthday") && !$model->month) ? "error_input" : "",));?>
		<?php echo $form->dropDownList($model,'day',Additional::getDays(),array('prompt' => 'Day','class' => ($model->hasErrors("birthday") && !$model->day) ? "error_input" : ""));?>
		<?php echo $form->dropDownList($model,'year',Additional::getYears(1960,2010),array('prompt' => 'Year','class' => ($model->hasErrors("birthday") && !$model->year) ? "error_input" : ""));?>
		<?php echo $form->error($model,'birthday',array('class' => 'error_message_login'));?>
		<a href="#" class="birthday_info">Why do I need to<br>provide my birthday?</a>

	</div>

	<div class="reg_bottom">

		<div class="agree_checkbox">
			<?php echo $form->checkBox($model,'i_agree',array('uncheckValue' => false));?>
			<div>I agree with <a href="#">Terms of Use.</a></div>
		</div>

		<div class="signup_btn">
			<input type="submit" value="Sign Up" class="green_btn_lrg">
		</div>
	</div>

</div>
<?php $this->endWidget();?>

</div>

