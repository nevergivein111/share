 <h4><?php echo $title;?></h4>
 <ul>
	<?php foreach($data as $items):?>
	 <li>
		<?php $class = ((Yii::app()->controller->id == $items['active_controller']) && (Yii::app()->controller->action->id == $items['active_action'])) ? 'active' : '';?>
		<?php echo CHtml::link($items['label'],$items['link'],array('class' => $class));?>
		 </li>
	<?php endforeach;?>
</ul>