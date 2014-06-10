<div class="posting ">
<div class="itemRow " data-url="<?php echo Yii::app()->createUrl('product/view', array('name' => $data->alias))?>">
	
		
	
	
	<div class="itemImg">
    	<input type="checkbox" value="" name="chkbox" /> 
		<?php if (isset($first_product) && $first_product ==1):?>
			
		<?php endif;?>
		
        <?php $data_url = Yii::app()->createUrl('product/view',array('name' => $data->alias))?>
        <?php echo CHtml::image($data->getNormalImage(false),'',array('title'=>$data->name,'id'=>'tool_img_'.$data->id, 'data-url'=>$data_url, 'class'=>'post', 'style' => 'max-width:140px; max-height:100px; width:auto; height:auto;'));?>
       <br>
        <span class="dealReleaseDt">Released : <?php echo $ReleasedDate = date("M Y", strtotime($data->create_date)); ?></span> 
             
        
    </div>
    <div class="itemInfo">
        <div class="itemTitle titleRefBlack">
                <a class="" id="tool_<?php echo $data->id;?>" title="<?php echo $data->brand->name . ' - ' . $data->name;?>" href="<?php echo Yii::app()->createUrl('product/view',array('name' => $data->alias));?>">
                        <?php echo $data->name;?>
                </a>
        </div>
        <div class="itemRate">
            <div class="rating">
                <?php $rating = $data->getOverall(true) ; if((is_int($rating))) $rating=$rating.'.0'; $rating ;
						echo $rating = number_format((float)$rating, 1, '.', '');
				?>
            </div>
            <div class="star_b_0 star_b">
            <?php $this->widget('application.components.widgets.stars.Stars', array('size' => 'big', 'rating'=>$data->getOverall(true))); ?>
            </div>
            <div class="itemReview">
                <?php $has_review = $data->checkUserReviewd();?>
                <?php if(!$has_review):?>
                        <a href="<?php echo Yii::app()->createUrl('reviewProduct/create',array('product_id' => $data->id));?>"><?php echo ($data->reviewCount != 0)? $data->reviewCount : 'No'; ?> Reviews</a>
                <?php else:?>
                        <a href="<?php echo Yii::app()->createUrl('reviewProduct/update',array('id' =>$has_review->id));?>">Edit Review</a>
                <?php endif;?>
            </div>
        </div>
        <div class="itemReleaseDate">
        		<?php if (isset($first_product) && $first_product ==1):?>
        			
				<?php else:?>
				
            <?php endif;?>
        </div>
    </div>
    <div class="itemPrice">
        <p>
        	<?php if (isset($first_product) && $first_product ==1): ?>
				<span class="dealLbl">ON SALE </span>
			<?php else: ?>
            	<span class="normalLbl">As low as </span>
            <?php endif; ?> <span><?php  echo $data->getLowestPrice()?></span>
        </p>
        <?php if (isset($first_product) && $first_product ==1): ?>
			<input type="button" value="View Stores" class="btnViewStore btnRedeem" />
		<?php else: ?>
        	<input type="button" value="View Stores" class="btnViewStore" />
        <?php endif; ?>
        
		<div class="pricePopup w340">
			<div class="priceHead">Purchase Product</div>
			
			<?php $i=0; foreach ($data->storeProductInfos as $storeProduct):?>
				<div class="priceRow <?php /* if ($i==0) echo "activeRow"; */ $i++;?>">
					<div class="pImgpart"><img src="<?php echo $storeProduct->store->getOrigImage();?>" alt="<?php echo $storeProduct->store->name;?>" style="max-width: 90px; max-height: 30px;" /></div>
					<div class="priceTag"><?php echo $storeProduct->price  ?><span>+ tax & shipping</span></div>
					<div class="priceBtn">
						<a href = "<?php echo  $storeProduct->url;?>" target="_blank">
							<input type="button" value="Shop Now" class="btnBuy" />
						</a>
					</div>
				</div>
			<?php endforeach; Yii::app()->params['number'] = 2;?>
		</div>
    </div>
</div>
<div class="seprateLine2"></div>
</div>

<script>
	$(function () {
		var id = 'tool_<?php echo $data->id;?>';
		var img_id='tool_img_<?php echo $data->id;?>';
		var content = '<?php $this->renderPartial("//activity/shared/_popover_product",array('product' => $data));?>';

		
		$( ".post" ).live('click',function() {
			window.location = $(this).attr('data-url');
		});
	});
</script>