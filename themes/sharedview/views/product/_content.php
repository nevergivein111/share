<div class="product_list_middle">                 	
    <div class="productView">
            <div class="productHeader">
            <div class="productImg" align="center">
                <?php echo CHtml::image($model->getOrigImage(false));?>
            </div>
            <input type="hidden" id="product_id" value="<?php echo $model->id?>"/>
            <div class="productConfig">
                    <h2><?php echo $model->name;?></h2>
                    <div class="proRate">
                        <?php $rating = $model->getOverall(true); if((is_int($rating))) $rating=$rating.'.0'; ?>
                        
                        <div class="star_b_0 star_b">
                            <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'big','rating' => $model->getOverall(true)));?>                         
                        </div>
                        <div class="rating"><?php echo $rating ; ?></div>
                        <div class="ratingText">
                                <?php $has_review = $model->checkUserReviewd();?>
                                <?php if(!$has_review):?>
                                        <a href="<?php echo Yii::app()->createUrl('reviewProduct/create',array('product_id' => $model->id));?>">Review it</a>
                                <?php else:?>
                                        <a href="<?php echo Yii::app()->createUrl('reviewProduct/update',array('id' =>$has_review->id));?>">Edit Review</a>
                                <?php endif;?>
                        </div>
                    </div>
                    <div class="config">
                        <span>Display Size </span> : 11’ 6” inch
                    </div>
                    <div class="config">
                        <span>Processor Type</span> : Intel Pentium Celeron 847
                    </div>
                    <div class="config">
                        <span>Hard Drive</span> : 320GB HDD
                    </div>
                    <div class="config">
                        <span>Price</span> : $199
                    </div>

                    <div class="proVideo">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_video.png" alt="Video" /> <span>Watch video</span>
                    </div>
                    <div class="proVideo">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_compass.png" alt="Compass" /> <span>Product tour</span>
                    </div>

            </div>

            <?php
            $components = $model->subCategory->components;
            $count = count($components);
            if($count > 0):

            ?>

            <div class="productRate">
                <div class="configRate">
                    <div class="configLeft">
                            <?php

                            for($i = 0; $i < ceil($count / 2); $i++):

                                    ?>

                                    <div class="configRow">
                                            <div class="configLbl">
                                                    <?php echo $components[$i]->name;?>
                                            </div>
                                            <div class="configRateVal">
                                                    <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $model->getComponentsRate($components[$i]->id)));?>
                                            </div>
                                    </div>
                            <?php endfor;?>
                    </div>
                    <div class="configRight">
                            <?php

                            for($i = ceil($count / 2); $i < $count; $i++):

                                    ?>
                                    <div class="configRow">
                                            <div class="configLbl">
                                                    <?php echo $components[$i]->name;?>
                                            </div>
                                            <div class="configRateVal">
                                                    <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $model->getComponentsRate($components[$i]->id)));?>
                                            </div>

                                    </div>
                            <?php endfor;?>

                    </div>
                <?php endif;?>
                </div>
            </div>

            <div class="socials">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/socials.png" alt="Socials" />
            </div>

        </div>
    </div>

    <div class="proTabs">
            <div class="proTab proTabactive">
            Review
        </div>
        <div class="proTab">
            Media
        </div>
        <div class="proTab">
            Specification
        </div>

    </div>

    <div class="proSummary">
            <div class="prolBlock">
            <div class="proHeader">
                    Highlights (3)
            </div>
            <div class="proRows">
                    <div class="proRow">
                    <div class="prodImg"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic.png" alt="" /></div>
                    <div class="proDesc">
                            <span>This laptop is very lightweight and fit great in a small backpack.</span>
                        <span class="totalreview">in 71 reviews</span>
                    </div>

                </div>
                <div class="proRow">
                    <div class="prodImg"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic.png" alt="" /></div>
                    <div class="proDesc">
                            <span>This laptop is very lightweight and fit great in a small backpack.</span>
                        <span class="totalreview">in 71 reviews</span>
                    </div>

                </div>
                <div class="proRow">
                    <div class="prodImg"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic.png" alt="" /></div>
                    <div class="proDesc">
                            <span>This laptop is very lightweight and fit great in a small backpack.</span>
                        <span class="totalreview">in 71 reviews</span>
                    </div>
                </div>
                <div class="more_review">
                    <a href="#">More review highlights</a>
                </div>
            </div>
        </div>

        <div class="proRBlock">
            <div class="proHeader">
                    Rating Distribution
            </div>
            <div class="rateRows">
                    <div class="rate">
                    <div class="rateTxt">5 star</div>
                    <div class="rateBar">
                            <div class="progress color5" style="width:45%;"></div>
                    </div>
                    <div class="rateScore">45</div>
                </div>
                <div class="rate">
                    <div class="rateTxt">4 star</div>
                    <div class="rateBar">
                            <div class="progress color4" style="width:12%;"></div>
                    </div>
                    <div class="rateScore">12</div>
                </div>
                <div class="rate">
                    <div class="rateTxt">3 star</div>
                    <div class="rateBar">
                            <div class="progress color3" style="width:38%;"></div>
                    </div>
                    <div class="rateScore">38</div>
                </div>
                <div class="rate">
                    <div class="rateTxt">2 star</div>
                    <div class="rateBar">
                            <div class="progress color2" style="width:71%;"></div>
                    </div>
                    <div class="rateScore">71</div>
                </div>
                <div class="rate">
                    <div class="rateTxt">1 star</div>
                    <div class="rateBar">
                            <div class="progress color1" style="width:2%;"></div>
                    </div>
                    <div class="rateScore">2</div>
                </div>
            </div>
        </div>
    </div>

    <div class="product_list_main">
        <?php echo $this->renderPartial('_review_block_new',array('model' => $model,'user' => $user));?>
    </div>
</div>
