<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div id="main-header" class="page-header">
	<?php
	echo "<?php\n
	\$breadcrumbs = array(
		'<li>'.\$model->label(2) => array('index'),
		Yii::t('app', 'Manage'),
	);\n
	\$this->showBreadcrumbs(\$breadcrumbs);\n";

	?>
	$this->menu = array(
		array('label'=>'<i class="icol-application-view-list"></i>' . Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>'<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<h1 id="main-heading"><?php echo '<?php'; ?> echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
</div>
<p>
<!--You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.-->
</p>
<div id="main-content">
	<?php echo "<?php \$this->renderPartial('_search', array(
		'model' => \$model,
	)); ?>\n"; ?>

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title">Grid View</span>
		</div>
		<div class="widget-content table-container">
			<?php echo '<?php'; ?> $this->widget('zii.widgets.grid.CGridView', array(
						'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
						'dataProvider' => $model->search(),
						'htmlOptions'=> array(
						'class' => 'table table-striped',
						),
						'itemsCssClass' => 'table table-striped',
						'summaryText' => false,
						//'filter' => $model,
						'columns' => array(
							<?php
							$count = 0;
							foreach ($this->tableSchema->columns as $column) {
								if (++$count == 7)
									echo "\t\t/*\n";
								echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
							}
							if ($count >= 7)
								echo "\t\t*/\n";
							?>
						array(
							'class' => 'CButtonColumn',
						),
			)
			)); ?>
		</div>
	</div>
</div>