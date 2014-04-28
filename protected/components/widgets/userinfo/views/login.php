<?php $form = $this->beginWidget('CActiveForm',array(
			  'id' => 'login-form',
			  //'action' => Yii::app()->createUrl('login'),
			  'enableAjaxValidation' => false,
			  'htmlOptions' => array(
						'onsubmit' => "send();return false;",/* Disable normal form submit */
						'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
			  ),
			  'errorMessageCssClass' => 'errorMessage2',
	  ));

	?>
	<div class="inputBox" id="block_email">
		<?php echo $form->textField($model,'email',array('class' =>  "header_input",'placeholder' => 'Email Address'));?>
		<div class="keepLogIn">
			<?php echo $form->checkBox($model,'rememberMe',array('checked'=>'checked'));?>
			<span>Keep me logged in</span>
		</div>
	</div>

	<div class="inputBox" id="block_password">
		<?php echo $form->passwordField($model,'password',array('class' => "header_input",'placeholder' => 'Password'));?>
			<div class="keepLogIn">
			<a href="<?=Yii::app()->createUrl('account/forgot')?>">Forgot Password?</a>
		</div>
	</div>
	<div class="inputButton">
		<?php echo CHtml::submitButton('Login',array('class'=>'btnLogin'));?>
	</div>
	<?php $this->endWidget();?>
<script>
	function send()
	{
		var val_block = '<span class="validation">';
		var span = '</span>';
		$('.validation').remove();
		var data=$("#login-form").serialize();
		var prefix = 'LoginForm_';
		$.ajax({
			type: 'POST',
			dataType:'JSON',
			url: '<?php echo Yii::app()->createAbsoluteUrl("account/LoginWithAjax");?>',
			data:data,
			success:function(response){

				if(response.success){
		
					window.location.href = '/category';
				}
				else{
					$.each(response.error, function(index, value) {
						if(index == 'incorrect'){
							$('#block_email').prepend(val_block+''+value+''+span);
							return false;
						}
						$('#block_'+index).prepend(val_block+''+value+''+span);
					});
				}
			},
			error: function(data) { // if error occured
				alert("Error occured.please try again");
				alert(data);
			}
		});

	}
</script>
