<style>
	.profileSummaryModal {
		width: 420px;
		margin-left: -210px;
	}

	.modal-body {
		max-height: 490px;
	}

	.register_box {
		margin: 0 5px;
		padding: 10px 15px;
		background: #f9f9f9;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-ms-border-radius: 5px;
		-o-border-radius: 5px;
		border: 1px solid #e2e2e2;
	}

	.reg_field {
		margin: 10px 0 0 0;
	}

	.reg_field input {
		height: 22px;
		font-size: 14px;
		margin: 0 !important;
	}

	.reg_field span {
		font-size: 11px;
	}

	.reg_bottom {
		margin-bottom: 10px;
	}
	
	.loginInput{
		width:100% !important;	
	}
	
	.loginInput input[type="text"],.loginInput input[type="password"]{ 
		width:97% !important;
		border-radius:0 !important;
		box-shadow:0 0 0 #fff !important;
	}
</style>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'login_form',
	'htmlOptions' => array(),
	'enableClientValidation' => false,
	'errorMessageCssClass' => 'errorMessage2',
));
?>
<div class="reg_field_wrapper">

	<div class="reg_field">
		<div class="error_message_login" id="error_message_holder"></div>
		<?php echo $form->label($model, 'email_address', array('class' => 'loginLbl'));?>
		<div class="loginInput">
			<?php echo $form->textField($model, 'email', array('class' => $model->hasErrors("email") ? "input_error" : "",));?>
			<?php echo $form->error($model, 'email', array('class' => 'error_message_login'));?>
		</div>
	</div>

	<div class="reg_field">
		<label class="loginLbl">Password</label>
		<?php // echo $form->label($model,'password',array('class' => 'loginLbl'));?>
		<div class="loginInput">
			<?php echo $form->passwordField($model, 'password', array('class' => $model->hasErrors("password") ? "input_error" : ""));?>
			<?php echo $form->error($model, 'password', array('class' => 'error_message_login'));?>
		</div>
	</div>

	<div class="reg_bottom">
		<div class="keepLogin">
			<?php echo $form->checkBox($model, 'rememberMe', array('class'=>'keepme'));?><span>keep me login</span>
		</div>
		<div class="forgotPassword">
			<a href="<?=Yii::app()->createUrl('account/forgot')?>">Forgot your password?</a>
		</div>
	</div>

	<?php echo CHtml::button('Log In', array('class' => 'btn_login btnBackground', 'type' => 'button', 'onclick' => 'login()'));?>
	<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
	$(function () {
		$("#load_gif_holder2").hide();
	});

	function login() {
		$('#error_message_holder').html('');
		var email = $('#LoginForm_email').val();
		var pass = $('#LoginForm_password').val();
		if($.trim(email) ==''){
			$('#error_message_holder').html('Email address can not be blank.');
			return false;
		}
		if($.trim(pass) ==''){
			$('#error_message_holder').html('Password can not be blank.');
			return false;
		}
		$("#load_gif_holder2").show();
		var serializedForm = $("#login_form").serializeObject();
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('user/loginUser') ?>',
			data:serializedForm,
			type:'post',
			dataType:'json',
			success:function (response) {
				$("#load_gif_holder2").hide();
				if (response.status) {
					window.location.reload();
				} else {
					$('#error_message_holder').text("Incorrect email or password.");
				}
			}
		});
		return false;
	}
</script>