<div class="modal hide profileSummaryModal" id="register_model_holder">
	<div class="modal-header proSummaryHeader">
		<a class="close closeModal" data-dismiss="modal"><img
			src="<?php echo Yii::app()->theme->baseUrl;?>/images/btn_modal_close.png" alt="Close"/></a>

		<h3 id="popup_holder_header">Register</h3>
	</div>
	<div class="profileBody">

		<div id="register_holder">
			<img id="load_gif_holder" src="<?php echo Yii::app()->baseUrl;?>/images/preload.gif"/>

			<div class="register_box">
				<!--<button class="btnFb loginFb">-->
					<a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login', array('provider' => 'Facebook'))?>" class="btnFb loginFb">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ic_Fb1.jpg"/><span
					style="width:87%;">Sign In with Facebook</span>
					</a>
				<!--</button>-->
				<div class="loginOpt">
					<div class="txt_or" style="background:#f9f9f9;">OR</div>
				</div>

				<div class="reg_field_wrapper">
					<?php $this->renderPartial("//account/shared/_register_form", array('model' => $user)); ?>
				</div>
			</div>

			<div class="accountExist">
				<?php echo CHtml::link("Already have an account?", "", array('onclick' => 'changeTo("register")', 'style' => 'cursor:pointer'));?>
			</div>
		</div>

		<div id="login_holder">

			<img id="load_gif_holder2" src="<?php echo Yii::app()->baseUrl;?>/images/preload.gif"/>

			<div class="register_box">
				<div class="reg_field_wrapper">
					<?php $this->renderPartial("//account/shared/_login_popup", array('model' => $login,)); ?>
				</div>
			</div>
			<div class="accountExist">
				<?php echo CHtml::link("I don`t have account", "", array('onclick' => 'changeTo("login")', 'style' => 'cursor:pointer'));?>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(function () {
		$("#login_holder").hide();
	});

	function changeTo(change) {
		if (change === 'register') {
			$(".profileSummaryModal").css("top","20%");
			$("#register_holder").hide();
			$("#login_holder").show();
			$('#popup_holder_header').text('Log In with shareview.com');

		}
		if (change === 'login') {
			$(".profileSummaryModal").css("top","5%");
			$("#login_holder").hide();
			$("#register_holder").show();
			$('#popup_holder_header').text('Register');
		}
	}
</script>
<style>

	#register_holder .register_error_message{
		position: relative!important;
		clear: both;
	}
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
		background:#f9f9f9;
		border-radius: 5px;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
		-ms-border-radius:5px;
		-o-border-radius:5px;
		border:1px solid #e2e2e2;
	}

	.reg_field {
		margin: 2px 0 0 0;
	}

	.reg_field input, .reg_field_sml input {
		height: 22px;
		font-size: 14px;
		margin: 0;
	}

	.reg_field_sml input {
		width: 94%;
	}

	.loginFb {
		width: 100% !important;
	}

	.register_box {
		margin: 0 5px;
		padding: 10px 15px 0;
	}

	.reg_field {
		margin: 10px 0 0 0;
	}

	.reg_field input, .reg_field_sml input {
		height: 22px;
		font-size: 14px;
		margin: 0 !important;
	}

	.reg_field_sml input {
		width: 94% !important;
	}

	.reg_field span, .reg_field_sml span {
		font-size: 11px;
	}

	.agree_checkbox {
		width: 54%;
	}

	.signup_btn {
		float: right;
		width: 42%;
	}

	.signup_btn {
		float: right;
		width: 42%;
		margin: 3px 0 0 0;
	}

	.reg_bottom {
		margin-bottom: 10px;
	}

	.accountExist {
		margin: 0 0 8px 0;
	}

	.accountExist a {
		margin-right: 20px !important;
	}

	.modal-backdrop, .modal-backdrop.fade.in {
		opacity: 0 !important;
		background: rgba(0, 0, 0, 0) !important;
	}

	.signup_btn input {
		margin-right: 0 !important;
	}
	.reg_field input {
width: 97%!important;

}
</style>