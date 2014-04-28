<?php
/**
 * @var $this AccountController
 * @var $form GxActiveForm
 * @var $model User
 */
?>
<?php $form = $this->beginWidget('GxActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'style' => "padding-top:0"
    ),
));
?>

<div class="error_wrapper">
    <?php echo $form->errorSummary($model, null, null, array('class'=>'error_msg')); ?>
</div>

<?php if (Yii::app()->user->hasFlash('hybridauth-error')): ?>
<div class="error_wrapper">
    <?php echo Yii::app()->user->getFlash('hybridauth-error'); ?>
</div>
<?php endif; ?>

<div class="clear"></div>

<div class="login_box register_box">

    <div class="login_title">
        <img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/login_icon.png')?>" alt="">
        <span>register</span>
    </div>

    <div class="login_fb_btn reg_fb">
        <a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login',array('provider'=>'Facebook')) ?>" class="blue_btn_lrg">
            <img src="<?php echo Yii::app()->createAbsoluteUrl('images/frontend/fb_icon.png')?>" alt="">
            <span>Sign up with Facebook</span>
        </a>
    </div>

    <div class="or_sep">
        <img src="<?php echo Yii::app()->createAbsoluteUrl('images/frontend/or_sep.png')?>" alt="">
    </div>

    <div class="login_input_wrapper">
        <?php echo $form->label($model,'firstname',array()); ?>
        <?php echo $form->textField($model, 'firstname', array('class'=>$model->hasErrors("firstname") ? "input_error" : "" ,'maxlength' => 50)); ?>
        <?php echo $form->error($model,'firstname', array('class'=>'error_message_login')); ?>
    </div><!-- row -->

    <div class="login_input_wrapper">
        <?php echo $form->label($model,'lastname',array()); ?>
        <?php echo $form->textField($model, 'lastname', array('class'=>$model->hasErrors("lastname") ? "input_error" : "" ,'maxlength' => 50)); ?>
        <?php echo $form->error($model,'lastname', array('class'=>'error_message_login')); ?>
    </div><!-- row -->

    <div class="login_input_wrapper">
        <?php echo $form->label($model,'email',array()); ?>
        <?php echo $form->textField($model, 'email', array('class'=>$model->hasErrors("email") ? "input_error" : "" ,'maxlength' => 50)); ?>
        <?php echo $form->error($model,'email', array('class'=>'error_message_login')); ?>
    </div><!-- row -->

    <div class="login_input_wrapper">
        <?php echo $form->label($model,'password',array()); ?>
        <?php echo $form->passwordField($model, 'password', array('class'=>$model->hasErrors("password") ? "input_error" : "" ,'maxlength' => 128)); ?>
        <?php echo $form->error($model,'password', array('class'=>'error_message_login')); ?>
    </div><!-- row -->

    <div class="login_input_wrapper">
        <?php echo $form->label($model,'confirm_password',array()); ?>
        <?php echo $form->passwordField($model, 'confirm_password', array('class'=>$model->hasErrors("confirm_password") ? "input_error" : "" ,'maxlength' => 128)); ?>
        <?php echo $form->error($model,'confirm_password', array('class'=>'error_message_login')); ?>
    </div><!-- row -->

    <div class="agree_checkbox">
        <?php echo $form->checkBox($model, 'i_agree', array('uncheckValue'=>false)); ?>
        I agree with <?php echo CHtml::link('terms of use')?>.
    </div><!-- row -->

    <div class="register_now_btn">
        <?php echo CHtml::button('Register Now!', array('class' => 'green_btn_lrg', 'type' => 'submit')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

