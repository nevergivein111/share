<div id="main-header" class="page-header">
	<?php

	$breadcrumbs = array(
		'<li>'.$model->label(2) => array('index'),
		GxHtml::valueEx($model),
	);

	$this->showBreadcrumbs($breadcrumbs);

	$this->menu=array(
		array('label'=> '<i class="icol-application-view-list"></i>' . Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=> '<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
		array('label'=> '<i class="icol-application-edit"></i>' . Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
		array('label'=> '<i class="icol-bin-closed"></i>' . Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=> '<i class="icol-hand"></i>' . Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<div id="main-content">
	<div class="row-fluid">

		<div class="span12 widget">
			<div class="widget-header">
				<span class="title">View Details</span>

			</div>
				<div class="widget-content table-container">
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data' => $model,
					'htmlOptions' => array(
					'class' => 'table table-striped table-detail-view'
					),
					'attributes' => array(
					'id',
array(
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->user, true))) : null,
			),
array(
			'name' => 'review',
			'type' => 'raw',
			'value' => $model->review !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->review)), array('reviewProduct/view', 'id' => GxActiveRecord::extractPkValue($model->review, true))) : null,
			),
'comment',
'is_deleted:boolean',
'create_date',
'update_date',
'delete_date',
					),
					)
				);
				?>
				</div>
		</div>
	</div>
</div>



