<?php
/**
 * @var $this AccountController
 * @var $form GxActiveForm
 * @var $user User
 */
?>

<div class="span3"></div>
<div class="span6">
	<div class="row">
		<div class="span12">
			<div class="register_box">
				<h4>Nice to meet you, <?php echo $user->firstname?>!
					Complete this step to create your account.</h4>

				<div class="reg_field_wrapper">

					<?php $form = $this->beginWidget('GxActiveForm', array(
					'id' => 'user-form',
					'enableAjaxValidation' => false,
					'htmlOptions' => array(
						'style' => "padding-top:0"
					),
				));
					?>


					<?php if (Yii::app()->user->hasFlash('hybridauth-error')): ?>
					<div class="error_wrapper">
						<?php echo Yii::app()->user->getFlash('hybridauth-error'); ?>
					</div>
					<?php endif; ?>

					<div class="clear"></div>

					<div class="login_box register_box">

						<div class="reg_field">
							<?php echo $form->hiddenField($user, 'firstname'); ?>
							<?php echo $form->hiddenField($user, 'lastname'); ?>
							<?php echo $form->hiddenField($user, 'i_agree'); ?>
							<?php echo $form->hiddenField($user, 'gender'); ?>
							<?php echo $form->hiddenField($user, 'birthday'); ?>
							<?php echo $form->hiddenField($user, 'role'); ?>
						</div>
						<!-- row -->

						<div class="reg_field">
							<label for="email">Email</label>
							<?php echo $form->textField($user, 'email', array('class' => $user->hasErrors("password") ? "error_input" : "", 'maxlength' => 128, 'readonly' => 'readonly')); ?>
							<?php echo $form->error($user, 'email', array('class' => 'error_message_login')); ?>
						</div>
						<!-- row -->

						<div class="reg_field">
							<label for="password">Password</label>
							<?php echo $form->passwordField($user, 'password', array('class' => $user->hasErrors("password") ? "error_input" : "", 'maxlength' => 128)); ?>
							<?php echo $form->error($user, 'password', array('class' => 'error_message_login')); ?>
						</div>
						<!-- row -->


						<div class="register_now_btn">
							<?php echo CHtml::button('Register Now!', array('class' => 'btn_signup btnBackground', 'type' => 'submit')); ?>
						</div>

						<?php $this->endWidget(); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="span3"></div>