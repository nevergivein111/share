<div class="formEl_b">
    <fieldset class="sepH_b">
	<legend><?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?></legend>
        <div class="search-form">
			<?php $form = $this->beginWidget('GxActiveForm', array(
				'action' => Yii::app()->createUrl($this->route),
				'method' => 'get',
			)); ?>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'id',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model, 'id', array('class'=>'span12')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'user_id',array('class'=>'lbl_c')); ?>
					<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('class'=>'span12')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'review_id',array('class'=>'lbl_c')); ?>
					<?php echo $form->dropDownList($model, 'review_id', GxHtml::listDataEx(ReviewProduct::model()->findAllAttributes(null, true)), array('class'=>'span12')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'comment',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model, 'comment', array('class'=>'span12', 'maxlength' => 5000)); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'is_deleted',array('class'=>'lbl_c')); ?>
					<?php echo $form->checkBox($model, 'is_deleted', array('class'=>'checkbox')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'create_date',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model, 'create_date', array('class'=>'span12')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'update_date',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model, 'update_date', array('class'=>'span12')); ?>
				</div>

										<div class="sepH_b row-fluid">
					<?php echo $form->labelEx($model,'delete_date',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model, 'delete_date', array('class'=>'span12')); ?>
				</div>

						<div class="lblSpace">
				<button type="submit" class="btn btn-primary"><span>Search</span></button>
			</div>

			<?php $this->endWidget(); ?>
		</div><!-- search-form -->
	</fieldset>
</div>
