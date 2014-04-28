<div class="product">
	<div class="proHead">
		<div class="catImg">
			<?php echo CHtml::image($data->getNormalImage(false), '', array());?>
		</div>
		<div class="catTitle">
			<?php echo $data->name;?>
		</div>
	</div>
	<div class="proList">
		<ul>
			<?php
			$subCategories = $data->getFrontendCategories();
			if (!empty($subCategories)):
				?>
				<?php foreach ($subCategories as $sub_category): ?>
				<li>
					<?php echo CHtml::link($sub_category->name, Yii::app()->createUrl('category/view', array('name' => $data->alias, 'subcategory' => $sub_category->alias)), array())?>
				</li>
				<?php endforeach; ?>
				<?php endif;?>
		</ul>
	</div>
</div>

