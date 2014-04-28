<div id="main-header" class="page-header">
	<?php

	$breadcrumbs = array(
		ReviewComment::label(2),
		Yii::t('app', 'Index'),
	);

	$this->showBreadcrumbs($breadcrumbs);

	$this->menu = array(
		array('label'=> '<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . ReviewComment::label(), 'url' => array('create')),
		array('label'=> '<i class="icol-hand"></i>' . Yii::t('app', 'Manage') . ' ' . ReviewComment::label(2), 'url' => array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo GxHtml::encode(ReviewComment::label(2)); ?></h1>
</div>
<div id="main-content">

</div>