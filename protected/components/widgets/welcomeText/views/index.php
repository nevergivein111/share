<div class="WelcomeBox">
	<h3>Welcome to Shareview</h3>
	<p>Access product reviews across multiple categories, find out what's trending now and share
		your voice with consumers everywhere.Shareview lets you do all of this and much more.</p>
	<button class="btnCreate reg_link">Create your account</button>
	<span class="orTxt">OR</span>
	<div style="display: inline-block;width:200px;">
	<a href="<?php echo Yii::app()->createAbsoluteUrl('/hybridauth/default/login',array('provider' => 'Facebook'))?>" class="btnFb loginFb">
					<img src="<?php echo Yii::app()->theme->baseUrl . '/images/ic_Fb1.jpg';?>" alt="">
					<span style="width: 80%;">Sign In with Facebook</span>
				</a>
		</div>
	<!--<button class="btnFb"><img src="<?php // echo Yii::app()->theme->baseUrl;?>/images/ic_Fb.jpg" /><span>Sign In with Facebook</span></button>-->
</div>
