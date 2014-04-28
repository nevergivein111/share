<div class="left_nav">
<?php echo $this->renderPartial('_left');?>
</div>

<div class="product_list_middle">
<?php echo $this->renderPartial('_content',array('model'=>$model));?>
</div>

<div class="right_nav">
<?php echo $this->renderPartial('_right');?>
</div>