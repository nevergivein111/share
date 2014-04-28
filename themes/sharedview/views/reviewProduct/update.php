<div class="span2 leftSidebar" style="width:16.53%;">
	<h5>Express yourself</h5>

	<p>Stand out with a unique perspective, and capture the attention of others by writing with style and
		conciseness.</p>
	<h5>Give it some thought</h5>

	<p>Use the component ratings to help explain your likes and dislikes. Also, apply personal experiences to give your
		reviews context and originality.</p>
	<h5>Have Fun</h5>

	<p>Let your thoughts flow freely, and remember that no opinion is wrong. If
		you're somehow unhappy after publishing your review, though, it can always be edited
		or removed anytime in the future.</p>

	<div class="hSeprator"></div>
	<p class="copyright"> © copyright 2013<br><a href="#">About Us</a> | <a href="#">Contact Us</a> |<br> <a href="#">Privacy
		Policy</a> | <a href="#">Terms of Use</a></p>

</div>
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
</style>
<?php
$this->renderPartial('_update_form', array(
	'model' => $model,
	'component' => $component,
	'user' => $user,
	'login' => $login,
));
?>
