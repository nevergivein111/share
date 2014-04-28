<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title"><i class="icol-application2"></i> <?php echo strtoupper($this->class2id($this->modelClass)); ?> FORM</span>
		</div>
		<div class="widget-content form-container">

			<?php echo '<?php '; ?>
			$form = $this->beginWidget('GxActiveForm', array(
				'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
				'enableAjaxValidation' => <?php echo $ajax; ?>,
				'htmlOptions' => array(
					'class' => 'form-horizontal',
				),
			));
			<?php echo '?>'; ?>

					<legend><span class="small s_color"><?php echo Yii::t('app', 'Fields with') ." <strong>*</strong> ". Yii::t('app', 'are required'); ?>.</span></legend>
				<?php echo "<?php echo \$form->errorSummary(\$model, null, null, array('class'=>'alert alert-info')); ?>\n"; ?>

			<?php foreach ($this->tableSchema->columns as $column): ?>
			<?php if (!$column->autoIncrement): ?>
					<div class="control-group <?php echo '<?php echo $model->hasErrors("'.$column->name.'") ? "error" : "" ?>'; ?>">
						<?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
						<div class="controls">
							<?php echo "<?php " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
							<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
						</div>
					</div><!-- row -->
			<?php endif; ?>
			<?php endforeach; ?>

			<?php foreach ($this->getRelations($this->modelClass) as $relation): ?>
			<?php if ($relation[1] == GxActiveRecord::HAS_MANY || $relation[1] == GxActiveRecord::MANY_MANY): ?>
					<label><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relation[0]; ?>')); ?></label>
					<?php echo '<?php ' . $this->generateActiveRelationField($this->modelClass, $relation) . "; ?>\n"; ?>
			<?php endif; ?>
			<?php endforeach; ?>

			<div class="form-actions">
				<?php echo "<?php
				echo '<button type=\"submit\" class=\"btn btn-primary\"><span>'.Yii::t('app', 'Save').'</span></button>';
				\$this->endWidget();
				?>\n"; ?>
			</div>
		</div>
	</div>
</div>
