<div id="container">
    	<div class="wrapper">
        	<div class="halfContainer">
				<div class="loginTitle">
                	Forgot password?
                </div>
			
				<div class="login_wrapper">
					<?php

					$form = $this->beginWidget('CActiveForm',array(
							  'id' => 'forgot_form',
							  'htmlOptions' => array(),
							  'enableClientValidation' => false,
							  'errorMessageCssClass' => 'errorMessage2',
					  ));

					?>
					<?php if(Yii::app()->user->hasFlash('error')):?>
							<div class="error_wrapper">
								<?php echo Yii::app()->user->getFlash('error'); ?>
							</div>
					<?php endif;?>
					
					<div class="LoginField">
						<?php echo $form->label($model,'email_address',array('class' => 'loginLbl'));?>
						<div class="loginInput">
							<?php echo $form->textField($model,'email',array('class' => $model->hasErrors("email") ? "input_error lg_txtbox" : "lg_txtbox"));?>
							<?php echo $form->error($model,'email',array('class' => 'error_message_login'));?>
						</div>
					</div>
					<div class="LoginField">
						<div class="loginLbl"></div>
						<div class="loginInput">
							<a href="<?=Yii::app()->createUrl('account/login')?>">Return to Login</a>
						</div>
					</div>
					<div class="LoginField">
						<div class="loginLbl"></div>
						<div class="loginInput">
							<?php echo CHtml::button('Send',array('class' => 'btnBg btnSingup','type' => 'submit'));?>

						</div>
					</div>
					<?php $this->endWidget();?>
				</div>
			</div>
            </div>
            <div class="halfContainer">
                <div class="loginTitle">
                    New to Shareview?
                </div>
				<p class="loginInfo">
					Join the latest community for consumer reviews and prepare to know more about the things people buy and use everyday.
					Shareview allows members to conduct quick and reliable product research, follow people of interest and make their opinions
					known through one easy-to-use site. Create an account to begin your experience today.
				</p>
				 <a href="<?php echo Yii::app()->createUrl('register');?>">
                	<?php  echo CHtml::button('Sign Up',array('class' => 'btnBg btnSingup'));?>
                </a>
            </div>
		</div>
</div>

			