	<div class="modal-header proSummaryHeader">
        <a class="close closeModal" data-dismiss="modal">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/btn_modal_close.png" alt="Close" />
		</a>
        <h3>Login with shareview.com</h3>
    </div>
    <div class="modal-body profileBody">
    	<div class="register_box">
            <div class="reg_field_wrapper">
				<?php
	$form = $this->beginWidget('CActiveForm',array(
			  'id' => 'login_form',
			  'htmlOptions' => array(),
			  'action' => Yii::app()->createUrl('account/LoginWithAjax'),
			  'enableAjaxValidation' =>false,
				  'htmlOptions' => array(
						'onsubmit' => "sendLogin();return false;",/* Disable normal form submit */
						'onkeypress' => " if(event.keyCode == 13){ sendLogin();return false; } " /* Do ajax call when user presses enter key */
			  ),
	  //'errorMessageCssClass' => 'errorMessage2',
	  ));

	?>
                <div class="reg_field" id="block_email">
                    <label for="email">Email</label>
                   <?php echo $form->textField($model,'email',array('class' => $model->hasErrors("email") ? "input_error" : ""));?>
                   
                </div>
                <div class="reg_field" id="block_password">
                    <label for="password">Password</label>
                    <?php echo $form->passwordField($model,'password',array('class' => $model->hasErrors("password") ? "input_error" : ""));?>
                    
                </div>
                <div class="reg_bottom">
                    <div class="keepLogin">
						<?php echo $form->checkBox($model,'rememberMe',array('class'=>'keepme'));?>
                        <span>keep me login</span>
                    </div>
                    <div class="forgotPassword">
                        <a href="<?=Yii::app()->createUrl('account/forgot')?>">Forgot your password?</a>
                    </div>
                </div>
               <?php echo CHtml::button('Sign In',array('class' => 'btnBackground loginBtn','type' => 'submit'));?>
            <?php $this->endWidget();?>
            </div>
        </div>
        <a href="#" class="createAcc">Create Account</a>
    </div>
<script>
	function sendLogin()
	{
		var val_block = '<span>';
		var span = '</span>';
		$('.reg_field span').remove();
		var data=$("#login_form").serialize();
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
							$('#block_email').append(val_block+'* '+value+''+span);
							return false;
						}
						$('#block_'+index).append(val_block+'* '+value+''+span);
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
