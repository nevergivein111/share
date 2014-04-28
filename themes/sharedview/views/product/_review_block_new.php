<?php echo CHtml::image(Yii::app()->createUrl('images/preload.gif'),'',array('style' => 'display:none','id' => 'loader_image'))?>

<?php $reviews = $model->productReviewList();?>
<?php foreach($reviews as $key => $data):?>
        <?php $this->renderPartial("_review_list_new",array('data' => $data,'user' => $user,'key' => $key))?>
<?php endforeach;?>


<?php
$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller',array(
		  'contentSelector' => '#posts',
		  'itemSelector' => 'div.post',
		  'loadingText' => 'Loading...',
		  'donetext' => 'This is the end... my only friend, the end',
		  'pages' => $model->review_list,
));
?>