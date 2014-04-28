<?php $review = $data;?>
<div class="activityRow" data-review="#<?php echo $review->id;?>">
	
	<div class="userImg">
		<img src="<?php echo $review->product->getNormalImage(true);?>" title="<?php echo $review->product->name;?>" id="atooltip_product_img_<?php echo $review->id?>"/>
        <span><?php echo Additional::TimeAgoFormat($review->update_date);?></span>
        <div class="clearfix"></div>
        <span>
        	<div class="onestart"></div>
        	<div class="user_rotw">ROTW</div>
        </span>
	</div>
	<div class="activityDetail">
		<div class="activityTxt" style="width:100%;">
			<div class="titleTxt">
				<a href="<?php echo Yii::app()->createUrl('product/view',array('name' => $review->product->alias))?>" id="atooltip_products_<?php echo $review->id?>" title="<?php echo$review->product->name;?>">
					<span><?php echo $review->product->name?></span>
				</a>
			</div>
			<div class="actProRate">
				<div class="actRate">				
					<?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'big','rating' => $review->getOverall()));?>
					<div class="rating_details"><a style="padding-left:5px;" href="#" class="reviewDetails">Rating Details</a></div>
				</div>
				<!-- <div class="actDate" style="margin-top:0;">
					<?php echo date('m/d/Y',strtotime($review->update_date))?>
				</div> -->
			</div>
		</div>
		<div class="prodsDetail" style="width:100%;">

            <div class="actDesc">
                <?php echo $review->text?>
            </div>

			<div class="configRate" style="display: none;">
				<div class="configLeft">
					<?php foreach($review->reviewProductForActivityPage() as $review_component):?>
						<div class="configRow">
							<div class="configLbl"><?php echo $review_component->component->name?></div>
							<div class="configRateVal">
								<?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review_component->rating));?>
							</div>
						</div>
					<?php endforeach;?>

				</div>

				<div class="configRight">
					<?php foreach($review->reviewProductForActivityPage(false) as $review_component):?>
						<div class="configRow">
							<div class="configLbl"><?php echo $review_component->component->name?></div>
							<div
								class="configRateVal"><?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review_component->rating));?></div>
						</div>
					<?php endforeach;?>

				</div>

			</div>

			<?php echo $this->renderPartial('review/_review_comment',array('review' => $review,'user' => $user))?>	
		</div>
	</div>
</div>
<div class="seprateLine1"></div>
<script>
	$(function () {
		var id = 'atooltip_product_img_<?php echo $review->id;?>';
		var n_id = 'atooltip_products_<?php echo $review->id;?>';
		var content = '<?php $this->renderPartial("//activity/shared/_popover_product",array('product' => $review->product))?>';
		showPopover(id,content);
		showPopover(n_id,content);
	});
</script>