<?php $this->beginContent('//layouts/main'); ?>

	<header class="login_header_wrapper">
		<div class="wrapper">
			<div class="login_header">
				<div class="logo_lrg">
					<img src="<?= Yii::app()->createAbsoluteUrl('images/frontend/logo_large.png')?>" alt="">
				</div>
			</div>
		</div>
	</header>

	<section class="login_container">
		<div class="wrapper">
			<div class="main_container">
				<div class="login_box_wrapper">
					<?php echo $content; ?>
				</div>

				<footer class="login_footer">&nbsp;</footer>
			</div>
		</div>

	</section>
<?php $this->endContent(); ?>