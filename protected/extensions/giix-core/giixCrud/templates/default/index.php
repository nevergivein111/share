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
		{$this->modelClass}::label(2),
		Yii::t('app', 'Index'),
	);\n
	\$this->showBreadcrumbs(\$breadcrumbs);\n";
	?>

	$this->menu = array(
		array('label'=> '<i class="icol-add"></i>' . Yii::t('app', 'Create') . ' ' . <?php echo $this->modelClass; ?>::label(), 'url' => array('create')),
		array('label'=> '<i class="icol-hand"></i>' . Yii::t('app', 'Manage') . ' ' . <?php echo $this->modelClass; ?>::label(2), 'url' => array('admin')),
	);
	?>

	<h1 id="main-heading"><?php echo '<?php'; ?> echo GxHtml::encode(<?php echo $this->modelClass; ?>::label(2)); ?></h1>
</div>
<div id="main-content">
	<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	));
	<?php echo '?>'; ?>
</div>