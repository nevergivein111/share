<div class="welcome_content">
	<h1>Welcome to ShareView</h1>

	<p>Join the latest online community for consumer reviews today. Use Shareview to conduct simple and reliable product
		research, follow people with similar category interests and make your opinions count by creating and engaging
		with unique content. There is lots to be shared and getting started is just a few steps away.
	</p>
</div>

<div class="register_box_wrapper">
	<?php if ($model->errors) { ?>
	<div class="error_wrapper">
		<div class="error_msg">
			<div>Please fix the following input errors :</div>
			<?php foreach ($model->errors as $errorNames) { ?>
			<p><?php echo $errorNames[0];?></p>
			<?php }?>
		</div>
	</div>
	<?php } ?>


	<div class="register_box">
		<?php echo $this->renderPartial('register', array('model' => $model));?>
	</div>

</div>