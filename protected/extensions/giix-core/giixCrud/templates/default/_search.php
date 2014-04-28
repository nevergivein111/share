<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="formEl_b">
    <fieldset class="sepH_b">
	<legend><?php echo "<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>"; ?></legend>
        <div class="search-form">
			<?php echo "<?php \$form = \$this->beginWidget('GxActiveForm', array(
				'action' => Yii::app()->createUrl(\$this->route),
				'method' => 'get',
			)); ?>\n"; ?>

			<?php foreach($this->tableSchema->columns as $column): ?>
			<?php
				$field = $this->generateInputField($this->modelClass, $column);
				if (strpos($field, 'password') !== false)
					continue;
			?>
				<div class="sepH_b row-fluid">
					<?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column)."; ?>\n"; ?>
					<?php echo "<?php " . $this->generateActiveField($this->modelClass, $column)."; ?>\n"; ?>
				</div>

			<?php endforeach; ?>
			<div class="lblSpace">
				<button type="submit" class="btn btn-primary"><span><?php echo Yii::t('app', 'Search'); ?></span></button>
			</div>

			<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
		</div><!-- search-form -->
	</fieldset>
</div>
