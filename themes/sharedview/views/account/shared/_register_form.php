<?php
$form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
		  'action'=>Yii::app()->createUrl('account/register'),
	'enableAjaxValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
		'afterValidate' => "js:afterValidate"
	),
	'htmlOptions' => array(
		'style' => "padding-top:0",
	),
));

?>

<div class="reg_field_sml first_sml" style="margin-left:0;">
	<label>First Name<i class="required_reg">*</i></label>
	<?php echo $form->textField($model, 'firstname', array('class' => $model->hasErrors("firstname") ? "error_input" : "", 'maxlength' => 50));?>
	<?php echo $form->error($model, 'firstname', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>

</div><!-- row -->

<div class="reg_field_sml second_sml">
    <label>Last Name<i class="required_reg">*</i></label>
	<?php echo $form->textField($model, 'lastname', array('class' => $model->hasErrors("lastname") ? "error_input" : "", 'maxlength' => 50));?>
	<?php echo $form->error($model, 'lastname', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>
</div><!-- row -->

<div class="reg_field">
	<label>Email<i class="required_reg">*</i></label>
	<?php echo $form->textField($model, 'email', array('class' => $model->hasErrors("email") ? "error_input" : "", 'maxlength' => 50));?>
	<?php echo $form->error($model, 'email', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>
</div><!-- row -->

<div class="reg_field">
	<label>Password<i class="required_reg">*</i></label>
	<?php echo $form->passwordField($model, 'password', array('class' => $model->hasErrors("password") ? "error_input" : "", 'maxlength' => 128));?>
	<?php echo $form->error($model, 'password', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>
</div><!-- row -->

<div class="reg_field">
	<label>Confirm Password<i class="required_reg">*</i></label>
	<?php echo $form->passwordField($model, 'confirm_password', array('class' => $model->hasErrors("confirm_password") ? "error_input" : "", 'maxlength' => 128));?>
	<?php echo $form->error($model, 'confirm_password', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>
</div><!-- row -->
<div class="reg_field">
	<?php echo $form->labelEx($model, 'birthday', array());?>
	<?php echo $form->dropDownList($model, 'month', Additional::MonthList(), array('prompt' => 'Month', 'style' => 'width:30%;margin:0;', 'class' => ($model->hasErrors("birthday") && !$model->month) ? "error_input" : "",));?>
	<?php echo $form->dropDownList($model, 'day', Additional::getDays(), array('prompt' => 'Day', 'style' => 'width:30%;margin:0 0 0 5%;', 'class' => ($model->hasErrors("birthday") && !$model->day) ? "error_input" : ""));?>
	<?php echo $form->dropDownList($model, 'year', Additional::getYears(1960, 2010), array('prompt' => 'Year', 'style' => 'width:30%;margin:0 0 0 5%;', 'class' => ($model->hasErrors("birthday") && !$model->year) ? "error_input" : ""));?>
	<?php echo $form->hiddenField($model, 'birthday', array('class' => $model->hasErrors("birthday") ? "error_input" : "", 'maxlength' => 50));?>
	<?php echo $form->error($model, 'birthday', array('class' => 'register_error_message', 'inputContainer' => 'span'));?>

</div>

<div class="reg_bottom">

	<div class="agree_checkbox">
		<?php echo $form->checkBox($model, 'i_agree', array('uncheckValue' => false));?>
		<div>I agree with <a href="#">Terms of Use.</a></div>
		<?php echo $form->error($model, 'i_agree', array('class' => '', 'style' => 'font-size: 12px; color: #c71116;', 'inputContainer' => 'span'));?>
	</div>

	<div class="signup_btn">
		<input type="submit" value="Sign Up" class="btn_signup btnBackground" id="user_form_button">
	</div>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
	$(function () {
		$("#load_gif_holder").hide();
	});

	function afterValidate(form, data, hasError) {
		if (!hasError) {
			$("#load_gif_holder").show();
			var serializedForm = $("#user-form").serializeObject();
			$.ajax({
				url:'<?php echo Yii::app()->createUrl('user/addUser') ?>',
				data:serializedForm,
				type:'post',
				dataType:'json',
				success:function (response) {
					if (response) {
						$("#load_gif_holder").hide();
						$('#reviewForm').submit();
					}
				}
			});
		}
		return false;
	}

</script>