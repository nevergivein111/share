<div class="sort_dropdown">
    <div class="dropdown custom_dropdown">
        <a id="ddSortby" role="button" data-toggle="dropdown" data-target="#" href="#">Sort By <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" id="review_filter_ul" role="menu" aria-labelledby="ddSortby" style="min-width:145px;left:-75px;">
            <?php foreach($model::getSortReviewProfile() as $key => $val):?>
                <li class="dropdown_review_holder <?php echo ($key == Product::TOP_RATED) ? 'checked_filter_active' : ''?>" data-value="<?php echo $key?>">
                    <a href="javascript:void(0);">
                            <?php echo $val;?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

<?php echo CHtml::image(Yii::app()->createUrl('images/preload.gif'),'',array('style' => 'display:none','id' => 'loader_image'))?>
<div id="posts">
	<?php $reviews = $model->productReviewList();?>
	<?php foreach($reviews as $key => $data):?>
        <?php $this->renderPartial("_review_list",array('data' => $data,'user' => $user,'key' => $key))?>
	<?php endforeach;?>
</div>
<?php

$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller',array(
		  'contentSelector' => '#posts',
		  'itemSelector' => 'div.post',
		  'loadingText' => 'Loading...',
		  'donetext' => 'This is the end... my only friend, the end',
		  'pages' => $model->review_list,
));

?>

<script>
	$(document).ready(function(){
		$('.dropdown_review_holder').live('click',function(){
			$('#review_filter_ul li').removeClass('checked_filter_active');
			$(this).addClass('checked_filter_active');
			$.ajax({
				url: "<?php echo Yii::app()->createUrl('product/updateReviewList');?>",
				dataType:'html',
				type:'POST',
				data:{sortBy:$(this).attr('data-value'), product_id:$('#product_id').val()},
				beforeSend: function ( ) {
					$('#loader_image').show();
				}
			}).done(function ( data ) {
				$('#posts').html(data);
				$('#loader_image').hide();
				return false;
			});
		})
	})
</script>
