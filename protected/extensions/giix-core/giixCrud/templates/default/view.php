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
		GxHtml::valueEx(\$model),
	);\n
	\$this->showBreadcrumbs(\$breadcrumbs);\n";
	?>

	$this->menu=array(
		array('label'=> '<i class="icol-application-view-list"></i>' . Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=> '<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
		array('label'=> '<i class="icol-application-edit"></i>' . Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
		array('label'=> '<i class="icol-bin-closed"></i>' . Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=> '<i class="icol-hand"></i>' . Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo '<?php'; ?> echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<div id="main-content">
	<div class="row-fluid">

		<div class="span12 widget">
			<div class="widget-header">
				<span class="title">View Details</span>

			</div>
				<div class="widget-content table-container">
				<?php echo '<?php'; ?> $this->widget('zii.widgets.CDetailView', array(
					'data' => $model,
					'htmlOptions' => array(
					'class' => 'table table-striped table-detail-view'
					),
					'attributes' => array(
					<?php
					foreach ($this->tableSchema->columns as $column)
						echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n";
					?>
					),
					)
				);
				?>
				</div>
		</div>
	</div>
</div>



<?php foreach (GxActiveRecord::model($this->modelClass)->relations() as $relationName => $relation): ?>
<?php if ($relation[0] == GxActiveRecord::HAS_MANY || $relation[0] == GxActiveRecord::MANY_MANY): ?>
<h2><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relationName; ?>')); ?></h2>
<?php echo "<?php\n"; ?>
	echo GxHtml::openTag('ul');
	foreach($model-><?php echo $relationName; ?> as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('<?php echo strtolower($relation[1][0]) . substr($relation[1], 1); ?>/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
<?php echo '?>'; ?>
<?php endif; ?>
<?php endforeach; ?>