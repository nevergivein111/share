<?php echo $this->renderPartial('_left_nav');?>
<div class="middle_section profile_middle_section">
	<?php echo $this->renderPartial('_user_details',array('model' => $model));?>
	
	<?php
	$dataProvider=new CArrayDataProvider($model->reviewProducts, array(
                    'keyField'=>'id',
                    'sort'=>array(
                        'attributes'=>array(
                             'id','name'
                        ),
                    ),
                    'pagination'=>array(
                        'pageSize'=>1,
                    ),
                ));
	
	$this->widget('zii.widgets.CListView',array(
			  'id'=>'review_list',
			  'viewData'=>array('user'=>$model),
			  'dataProvider' => $dataProvider,
			  'itemView' => '_review_list',// refers to the partial view named '_post'
			  
			  'template'=>'{items}',
	));

	?>
</div>
