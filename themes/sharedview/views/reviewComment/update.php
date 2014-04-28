<div id="main-header" class="page-header">
	<?php

	$breadcrumbs = array(
		'<li>'.$model->label(2) => array('index'),
		GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
		Yii::t('app', 'Update'),
	);

	$this->showBreadcrumbs($breadcrumbs);

	$this->menu = array(
		array('label' => '<i class="icol-application-view-list"></i>' . Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label' => '<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
		array('label' => '<i class="icol-magnifier-zoom-in"></i>' . Yii::t('app', 'View') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
		array('label' => '<i class="icol-hand"></i>' .  Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<div id="main-content">
	<?php
	$this->renderPartial('_form', array(
			'model' => $model));
	?>
</div>