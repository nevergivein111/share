<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
    //$clientscript->registerCssFile($baseurl . '/css/reset.css');
    //$clientscript->registerCssFile($baseurl . '/css/style.css');
    $cs=Yii::app()->clientScript;
?>
<script>
$(document).ready(function(){
	if($('.customCheckbox').length > 0)
	{
		$('.customCheckbox').screwDefaultButtons({
			image: 'url("<?php echo $baseurl; ?>/images/checkboxSmall.png")',
			width: 14,
			height: 14
		});
	}
});	
</script>

<div class="span8 centerArea" style="margin-left:0;">
    <div class="row-fluid">
        <div class="span12">
            <div class="product_list_middle">
                <div class="middle_section product_list_main">
                    <div class="product_cate_wrapper product_list_wrapper" style="height: 40px;">
                        <div class="product_list_title">
                                <h3>Product search result for <?php echo $term;?></h3>
                        </div>
					</div>
                    <?php echo CHtml::image(Yii::app()->createUrl('images/preload.gif'), '', array('style' => 'display:none', 'id' => 'loader_image')) ?>
                    <div class="row-fluid">
						<?php if(!empty($products)):?>
							<div class="maintabContainer">
								<div id="posts">
									<?php foreach ($products as $data): ?>
										<?php $this->renderPartial("//category/_product_view", array('data' => $data)) ?>
									<?php endforeach; ?>
								</div>
								<?php
									$product = new Product();
									$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
											'contentSelector' => '#posts',
											'itemSelector' => 'div.post',
											'loadingText' => 'Loading...',
											'donetext' => 'This is the end... my only friend, the end',
											'pages' => $product->pages,
									));
								?>
							<?php else:?>
								No Products found
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="rightTabsidebar">
	<div  class="product_cate_wrapper product_list_wrapper" style="height: 40px;"></div>
	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/google_advertise.png" alt="Google" />
</div>

<script>
	$(document).ready(function(){
		$('.dropdown_product_holder').live('click',function(){
			
			var sortBy = $(this).attr('data-value');
			$('#sort_by_name').html($(this).attr('data-name'));
			$.ajax({
				url: "<?php echo Yii::app()->createUrl('product/updateProductList');?>",
				dataType:'html',
				type:'POST',
				data:{sortBy:sortBy, category_id:0},
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