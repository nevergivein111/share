<div class="product_category">
        <div class="prod_cate_title">
			<?php echo CHtml::image($data->getThumbImage(false),'',array('width'=>'30','height'=>'28'));?>
			<?php echo CHtml::link($data->name,Yii::app()->createUrl('category/view',array('name' => $data->alias)),array('class'=>'prod_cate_title_link'));?>
        </div>  
  
	<?php
	$subCategories = $data->getFrontendCategories();
	if(!empty($subCategories)){?>
			<?php foreach($subCategories as $sub_category){?>
		        <?php echo CHtml::link($sub_category->name,Yii::app()->createUrl('category/view',array('name' => $data->alias,'subcategory' => $sub_category->alias)),array('class'=>'category_link'))?>
			<?php }?>
	<?php }
	?>
  </div>
