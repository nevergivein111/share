		<div class="welcome_content">
				<h1>Welcome to ShareView</h1>
				<p>Access product reviews across multiple categories,
					find out what's trending now and share your voice
					with consumers everywhere.
				</p>
			</div>

			<div class="register_box_wrapper">
				<?php if($model->errors){?>
				<div class="error_wrapper">
					<div class="error_msg">
				    <div>Please fix the following input errors : </div>
						<?php foreach($model->errors as $errorNames){?>
					<p><?php echo $errorNames[0];?></p>
					<?php }?>
					</div>
				</div>
				<?php } ?>

				<div class="register_box">

					<?php echo $this->renderPartial('register',array('model'=>$model));?>

				</div>

			</div>