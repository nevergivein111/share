<div id="main-header" class="page-header">
	<?php

	$breadcrumbs = array(
		'<li>'.$model->label(2) => array('index'),
		Yii::t('app', 'Create'),
	);

	$this->showBreadcrumbs($breadcrumbs);

	$this->menu = array(
		array('label'=> '<i class="icol-application-view-list"></i>' . Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
		array('label'=> '<i class="icol-hand"></i>' . Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label()); ?></h1>
</div>

<div id="main-content">
	<?php
	$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));
	?></div>