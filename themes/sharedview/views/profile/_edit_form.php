<div class="register_box">
	<h4>EditProfile</h4>

	<div class="reg_field_wrapper">
		<?php

		$form = $this->beginWidget('GxActiveForm',array(
				  'id' => 'user-form',
				  'htmlOptions' => array(
							'style' => "padding-top:0",
							'enctype' => 'multipart/form-data',
				  ),
		  ));

		?>
		<div class="reg_fielda">
			<?php echo $form->label($model,'image',array());?>
			<?php echo $form->fileField($model,'image');?>
			<?php echo $form->error($model,'image');?><br/>
		</div>
		<div class="reg_field_sml first_sml" style='margin-left:0;'>
			<label for="firstname">First Name</label>
			<?php echo $form->textField($model,'firstname',array('class' => $model->hasErrors("firstname") ? "error_input" : ""));?>
			<?php echo $form->error($model,'firstname',array('class' => 'error_message_register'));?>

		</div>
		<!-- row -->
		<div class="reg_field_sml second_sml">

			<label for="lastname">Last Name</label>
			<?php echo $form->textField($model,'lastname',array('class' => $model->hasErrors("lastname") ? "error_input" : "",'maxlength' => 50));?>
			<?php echo $form->error($model,'lastname',array('class' => 'error_message_register'));?>
		</div>
		<!-- row -->

		<div class="reg_field">
			<label for="email">Email</label>
			<?php echo $form->textField($model,'email',array('class' => $model->hasErrors("email") ? "error_input" : "",'maxlength' => 50));?>
			<?php echo $form->error($model,'email',array('class' => 'error_message_register'));?>
		</div>
		<!-- row -->

		<!-- row -->
		<div class="reg_field">
			<?php echo $form->hiddenField($model,'birthday',array());?>
			<label for="Birthday">Birthday</label>
			<?php echo $form->dropDownList($model,'month',Additional::MonthList(),array('prompt' => 'Month','class' => ($model->hasErrors("birthday") && !$model->month) ? "error_input" : "",));?>
			<?php echo $form->dropDownList($model,'day',Additional::getDays(),array('prompt' => 'Day','class' => ($model->hasErrors("birthday") && !$model->day) ? "error_input" : ""));?>
			<?php echo $form->dropDownList($model,'year',Additional::getYears(1960,2010),array('prompt' => 'Year','class' => ($model->hasErrors("birthday") && !$model->year) ? "error_input" : ""));?>
		</div>
		<!--<a href="javascript:void(0)" id="change_pass">Change Password</a>-->
		<div id="passowrd_block">
	    <div class="reg_field">
			<label for="old_password">Old Password</label>
			<?php echo $form->passwordField($model,'old_password',array('class' => $model->hasErrors("password") ? "error_input" : "",'maxlength' => 128));?>
			<?php echo $form->error($model,'old_password',array('class' => 'error_message_register'));?>
		</div>
		<div class="reg_field">
		
			<label for="new_password">New Password</label>
			<?php echo $form->passwordField($model,'new_password',array('class' => $model->hasErrors("password") ? "error_input" : "",'maxlength' => 128));?>
			<?php echo $form->error($model,'new_password',array('class' => 'error_message_register'));?>
		</div>
		<!-- row -->

		<div class="reg_field">
			<label for="repeat_new_password">Confirm Password</label>
			<?php echo $form->passwordField($model,'repeat_new_password',array('class' => $model->hasErrors("confirm_password") ? "error_input" : "",'maxlength' => 128));?>
			<?php echo $form->error($model,'repeat_new_password',array('class' => 'error_message_register'));?>
		</div>

		</div>
		<div class="signup_btn" style="float: right;">
			<input type="submit" value="Save" class="btn_signup btnBackground">
		</div>
		<?php $this->endWidget();?>

	</div>
</div>

<script>
$(document).ready(function(){
	$('#change_pass').click(function(){
		$('#passowrd_block').toggle();
		return false;
	})
})
</script>

