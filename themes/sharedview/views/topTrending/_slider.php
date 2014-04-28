<?php
$slides = Slider::model()->published()->findAll();
?>
<?php if(count($slides) > 0):?>
	<div class="sliderContainer">
        <div id="scroller">
            <div class="navSlider">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        <?php foreach($slides as $slide):?>
                    <a class="item" href="<?php echo Yii::app()->createUrl('product/view',array('name' => $slide->product->alias))?>">
                        <img src="<?php echo $slide->getNormalImage(false);?>" />
                    </a>  
        <?php endforeach;?>
        </div>
    </div>
<?php endif;?>
