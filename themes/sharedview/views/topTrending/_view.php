<div class="post productgreyhover">
<div class="search_product_wrapper" data-url="<?php echo Yii::app()->createUrl('product/view', array('name' => $data->alias))?>">
        <div class="search_product_info">
                <div class="search_prod_thumb">
                        <?php echo CHtml::image($data->getNormalImage(false), '', array('title' => $data->name, 'id' => 'prod_name_img_' . $data->id));?>
                </div>
        </div>
        <div class="search_prod_details">
                <div class="search_prod_name">
                        <a title="<?php echo $data->name;?>" id="prod_name_<?php echo $data->id;?>" class="tooltips"
                                   href="<?php echo Yii::app()->createUrl('product/view', array('name' => $data->alias))?>">
                                        <?php echo $data->name;?>
                                </a>
                </div>
                <div class="search_prod_star">
                    <div class="smRating"> 
                            <?php $rating = $data->getOverall(true) ; if((is_int($rating))) $rating=$rating.'.0'; echo sprintf('%0.2f', $rating); ?> 
                    </div>
                    <div class="star_sm_0 star_sm">
                        <?php $this->widget('application.components.widgets.stars.Stars', array('size' => 'small', 'rating' => $data->getOverall(true))); ?>
                    </div>
                </div>
                <div class="smRateDetail"> <?php echo $data->getReviewCountText();?> </div>
				<?php if((!empty($data->lastReview))):?>
                    
                <?php endif;?>
                <div class="trending">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic7.jpg" alt="Dilon"  />
                    <div class="trendCmt">Amazing tablet for the monet Same great features as the Pad for a fractions of the price.</div>
                </div>
        </div>
</div>
</div>

