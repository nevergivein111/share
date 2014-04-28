<div id="main-header" class="page-header">
	<?php

	$breadcrumbs = array(
		'<li>'.$model->label(2) => array('index'),
		Yii::t('app', 'Manage'),
	);

	$this->showBreadcrumbs($breadcrumbs);
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
		$.fn.yiiGridView.update('review-comment-grid', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<h1 id="main-heading"><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
</div>
<p>
<!--You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.-->
</p>
<div id="main-content">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title">Grid View</span>
		</div>
		<div class="widget-content table-container">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id' => 'review-comment-grid',
						'dataProvider' => $model->search(),
						'htmlOptions'=> array(
						'class' => 'table table-striped',
						),
						'itemsCssClass' => 'table table-striped',
						'summaryText' => false,
						//'filter' => $model,
						'columns' => array(
									'id',
		array(
				'name'=>'user_id',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'review_id',
				'value'=>'GxHtml::valueEx($data->review)',
				'filter'=>GxHtml::listDataEx(ReviewProduct::model()->findAllAttributes(null, true)),
				),
		'comment',
		array(
					'name' => 'is_deleted',
					'value' => '($data->is_deleted === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		'create_date',
		/*
		'update_date',
		'delete_date',
		*/
						array(
							'class' => 'CButtonColumn',
						),
			)
			)); ?>
		</div>
	</div>
</div>