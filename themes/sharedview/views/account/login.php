
<div id="container">
    	<div class="wrapper">
        	<div class="halfContainer">
            	<div class="loginTitle">
                	Log In
                </div>
                    
                    <div class="loginForm">
                	<?php

					$form = $this->beginWidget('CActiveForm',array(
							  'id' => 'login_form',
							  'htmlOptions' => array(),
							  'enableClientValidation' => false,
							  'errorMessageCssClass' => 'errorMessage2',
					  ));

					?>
					<?php echo $form->error($model, 'incorrect',array('style'=>'float:right;color:red')); ?>
                    	<div class="label"> Email
                        </div>
                        <div class="loginInputs">
                        	<?php echo $form->textField($model,'email',array('class' => $model->hasErrors("email") ? "input_error lg_txtbox" : "lg_txtbox"));?>
                                <?php echo $form->error($model,'email',array('class' => 'error_message_login'));?>
                        </div>
                        <div class="label">
                        	Password
                        </div>
                        <div class="loginInputs">
                        	<?php echo $form->passwordField($model,'password',array('class' => $model->hasErrors("password") ? "input_error lg_txtbox" : "lg_txtbox"));?>
                                <?php echo $form->error($model,'password',array('class' => 'error_message_login'));?>
                        </div>
                        <div class="loginOption">
                        	 <div class="loginOpt">
                             	<?php echo $form->checkBox($model,'rememberMe',array('class' => 'keepChkbox'));?> <span> Keep me logged in </span>
                                <a href="<?=Yii::app()->createUrl('account/forgot')?>">Forgot your password?</a>
                             </div>
                        </div>
                        <div class="loginButton">
                        	<?php echo CHtml::button('Log In',array('class' => 'loginBtn btnBg','type' => 'submit'));?>
                        </div>
                    <?php $this->endWidget();?>
               	</div> 
                </div>
                
<div class="halfContainer">
            	<div class="loginTitle">
                	Don't have an account?
                </div>
                <p class="loginInfo">
                	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. <br><br>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                </p>
                <a href="<?php echo Yii::app()->createUrl('register');?>">
                	<?php  echo CHtml::button('Sign Up',array('class' => 'btnBg btnSingup'));?>
                </a>

</div>
</div></div>