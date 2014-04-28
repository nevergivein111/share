<div class="span3"></div>
<div class="span6">
	<div class="row">
		<div class="span12">
			<div class="register_box">
				<h4>Sign Up</h4>
				<a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login', array('provider' => 'Facebook'))?>"
				   class="btnFb loginFb">
					<img src="<?php echo Yii::app()->theme->baseUrl . '/images/ic_Fb1.jpg';?>" alt="">
					<span>Sign In with Facebook</span>
				</a>

				<div class="loginOptLine">
					<div class="txt_or">OR</div>
				</div>

				<div class="reg_field_wrapper">
					<?php

					$form = $this->beginWidget('GxActiveForm', array(
						'id' => 'user-form',
						'htmlOptions' => array(
							'style' => "padding-top:0"
						),
					));

					?>
					<div class="reg_field_sml first_sml" style='margin-left:0;'>
						<label for="firstname">First Name<i class="required_reg">*</i></label>
						<?php echo $form->textField($model, 'firstname', array('class' => $model->hasErrors("firstname") ? "error_input" : ""));?>
						<?php echo $form->error($model, 'firstname', array('class' => 'error_message_register'));?>

					</div>
					<!-- row -->
					<div class="reg_field_sml second_sml">

						<label for="lastname">Last Name<i class="required_reg">*</i></label>
						<?php echo $form->textField($model, 'lastname', array('class' => $model->hasErrors("lastname") ? "error_input" : "", 'maxlength' => 50));?>
						<?php echo $form->error($model, 'lastname', array('class' => 'error_message_register'));?>
					</div>
					<!-- row -->

					<div class="reg_field">
						<label for="email">Email<i class="required_reg">*</i></label>
						<?php echo $form->textField($model, 'email', array('class' => $model->hasErrors("email") ? "error_input" : "", 'maxlength' => 50));?>
						<?php echo $form->error($model, 'email', array('class' => 'error_message_register'));?>
					</div>
					<!-- row -->

					<div class="reg_field">
						<label for="password">Password <i class="required_reg">*</i></label>
						<?php echo $form->passwordField($model, 'password', array('class' => $model->hasErrors("password") ? "error_input" : "", 'maxlength' => 128));?>
						<?php echo $form->error($model, 'password', array('class' => 'error_message_register'));?>
					</div>
					<!-- row -->

					<div class="reg_field">
						<label for="confirm_password">Confirm Password<i class="required_reg">*</i></label>
						<?php echo $form->passwordField($model, 'confirm_password', array('class' => $model->hasErrors("confirm_password") ? "error_input" : "", 'maxlength' => 128));?>
						<?php echo $form->error($model, 'confirm_password', array('class' => 'error_message_register'));?>
					</div>
					<!-- row -->
					<div class="reg_field">
						<?php echo $form->hiddenField($model, 'birthday', array());?>
						<label for="Birthday">Birthday </label>
						<?php echo $form->dropDownList($model, 'month', Additional::MonthList(), array('prompt' => 'Month', 'class' => ($model->hasErrors("birthday") && !$model->month) ? "error_input" : "",));?>
						<?php echo $form->dropDownList($model, 'day', Additional::getDays(), array('prompt' => 'Day', 'class' => ($model->hasErrors("birthday") && !$model->day) ? "error_input" : ""));?>
						<?php echo $form->dropDownList($model, 'year', Additional::getYears(1960, 2010), array('prompt' => 'Year', 'class' => ($model->hasErrors("birthday") && !$model->year) ? "error_input" : ""));?>
						<?php echo $form->error($model, 'birthday', array('class' => 'error_message_register'));?>
						<!--<a href="#" class="birthday_info">Why do I need to<br>provide my birthday?</a>-->

					</div>
					<div class="reg_bottom">
						<div class="agree_checkbox">
							<?php echo $form->checkBox($model, 'i_agree', array('uncheckValue' => false));?>
							<div>I agree with <a href="#">Terms of Use.</a></div>
							<?php echo $form->error($model, 'i_agree', array('class' => 'error_message_login'));?>
						</div>

						<div class="signup_btn">
							<input type="submit" value="Sign Up" class="btn_signup btnBackground">
						</div>
					</div>

					<div class="hSeprator" style="margin:20px 0;"></div>

					<div class="accountExist" style="font-size: 12px">
						Already have an account?
						<a href="<?php echo Yii::app()->createUrl('login');?>">Login</a>
					</div>
					<?php $this->endWidget();?>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="span3"></div>