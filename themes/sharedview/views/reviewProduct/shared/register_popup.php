<div class="modal hide profileSummaryModal" id="register_model_holder">
	<div class="modal-header proSummaryHeader">
		<a class="close closeModal" data-dismiss="modal">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/btn_modal_close.png" alt="Close"/></a>

		<h3 id="popup_holder_header">Register</h3>
	</div>
	<div class="profileBody">

		<div id="register_holder">
			<img id="load_gif_holder" src="<?php echo Yii::app()->baseUrl;?>/images/preload.gif"/>

			<div class="register_box">
				<!--<button class="btnFb loginFb">-->
				<a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login', array('provider' => 'Facebook'))?>"
				   class="btnFb loginFb">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ic_Fb1.jpg"/><span
					style="width:87%;">Sign In with Facebook</span>
					</a>
				<!--</button>-->
				<div class="loginOpt">
					<div class="txt_or" style="background:#f9f9f9;">OR</div>
				</div>

				<div class="reg_field_wrapper">
					<?php $this->renderPartial("//reviewProduct/shared/_register_form", array('model' => $user)); ?>
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
					<?php $this->renderPartial("//reviewProduct/shared/_login_popup", array('model' => $login,)); ?>
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
