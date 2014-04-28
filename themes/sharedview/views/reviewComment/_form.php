

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title"><i class="icol-application2"></i> REVIEW-COMMENT FORM</span>
		</div>
		<div class="widget-content form-container">

			<?php 			$form = $this->beginWidget('GxActiveForm', array(
				'id' => 'review-comment-form',
				'enableAjaxValidation' => false,
				'htmlOptions' => array(
					'class' => 'form-horizontal',
				),
			));
			?>
					<legend><span class="small s_color">Fields with <strong>*</strong> are required.</span></legend>
				<?php echo $form->errorSummary($model, null, null, array('class'=>'alert alert-info')); ?>

																	<div class="control-group <?php echo $model->hasErrors("user_id") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'user_id',array('class'=>'lbl_c')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('class'=>'span12')); ?>
							<?php echo $form->error($model,'user_id'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("review_id") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'review_id',array('class'=>'lbl_c')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model, 'review_id', GxHtml::listDataEx(ReviewProduct::model()->findAllAttributes(null, true)), array('class'=>'span12')); ?>
							<?php echo $form->error($model,'review_id'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("comment") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'comment',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model, 'comment', array('class'=>'span12', 'maxlength' => 5000)); ?>
							<?php echo $form->error($model,'comment'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("is_deleted") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'is_deleted',array('class'=>'lbl_c')); ?>
						<div class="controls">
							<?php echo $form->checkBox($model, 'is_deleted', array('class'=>'checkbox')); ?>
							<?php echo $form->error($model,'is_deleted'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("create_date") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'create_date',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model, 'create_date', array('class'=>'span12')); ?>
							<?php echo $form->error($model,'create_date'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("update_date") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'update_date',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model, 'update_date', array('class'=>'span12')); ?>
							<?php echo $form->error($model,'update_date'); ?>
						</div>
					</div><!-- row -->
														<div class="control-group <?php echo $model->hasErrors("delete_date") ? "error" : "" ?>">
						<?php echo $form->labelEx($model,'delete_date',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model, 'delete_date', array('class'=>'span12')); ?>
							<?php echo $form->error($model,'delete_date'); ?>
						</div>
					</div><!-- row -->
						
															
			<div class="form-actions">
				<?php
				echo '<button type="submit" class="btn btn-primary"><span>'.Yii::t('app', 'Save').'</span></button>';
				$this->endWidget();
				?>
			</div>
		</div>
	</div>
</div>
