<div class="product_list_middle">
    <div class="productView">
            <div class="productHeader">
            <div class="productShow">
	            <div class="productImg" align="center">
	                <?php echo CHtml::image($model->getOrigImage(false));?>
	            </div>
                <div class="productThumbs">
                	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb1.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb2.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb3.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb4.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb5.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb6.png" alt="" />
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/thumb/thumb7.png" alt="" />
                </div>
            </div>
            <input type="hidden" id="product_id" value="<?php echo $model->id?>"/>
            <div class="productConfig">
                    <h2><?php echo $model->name;?></h2>
                    <div class="proRate">
                        <?php $rating = $model->getOverall(true); ?>
                        <div class="rating"><?php echo number_format((float)$rating, 2, '.', ''); ; ?></div>
                        <div class="star_b_0 star_b">
                            <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'big','rating' => $model->getOverall(true)));?>                         
                        </div>
                    </div>
					<div class="seprateLine1"></div>
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
                        <span>Price</span> :
                        <?php $Price=0;  foreach ($model->storeProductInfos as $storeProduct):?>
                        	<?php 
                        		if (0==$Price) {
								   $price = explode('$', $storeProduct->price);
								   $Price = $price[1];
								  continue; }
								  $price = explode('$', $storeProduct->price);
								  $price = $price[1];
								if ($Price>$price){
									$Price= $price;
								}  
                        	?> 
                      		
                        <?php endforeach;?>
                        <?php echo '$'.$Price;?>
                    </div>
					<div class="seprateLine1"></div>
					<?php $has_review = $model->checkUserReviewd();?>
						<?php if(!$has_review):?>
							<div class="proVideo">
								<a href="<?php echo Yii::app()->createUrl('/write-review?product_id=') . $model->id; ?>" class="btnWriteReview">Write Review</a>
							</div>
							<div class="proVideo" style="width:110px;">
								<a href="javascript:void(0);" class="btnBookmark opensmP">Bookmark</a>
                                <div class="add_wl_block smPopup">
                                    <h4><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/spellCheck.png" height="16" width="16">Bookmark added</h4>
                                    <div class="sortingOpt">
                                        <span>Label :</span>
                                        <input type="checkbox" value="To Review"><span> To Review</span>
                                        <input type="checkbox" value="To Buy"><span> To Buy</span>
                                        <input type="checkbox" value="Other" checked="checked"><span> Other</span>
                                        <input type="text" value="" placeholder="Leave a note..."  class='popupTxtbox' />
                                     </div>
                                    <textarea placeholder="Add comment..."></textarea>
                                    <div class="numofChar">0 of 160 charecters</div>
                                    <input type="button" value="Save" class="btnSavedata" />
                                </div>
							</div>
							<div class="proVideo">
								<a href="javascript:void(0);" class="btnWishlist opensmP">Wish List</a>
                                <div class="add_wl_block smPopup">
                                    <h4><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/spellCheck.png" height="16" width="16">Item Added to Wish List</h4>
                                    <textarea placeholder="Add comment..."></textarea>
                                    <div class="numofChar">0 of 160 charecters</div>
                                    <input type="button" value="Save" class="btnSavedata" />
                                </div>
							</div>
						<?php else: ?>
							<div class="proVideo">
								<a href="<?php echo Yii::app()->createUrl('/write-review?product_id=') . $model->id; ?>" class="btnWriteReview">Edit Review</a>
							</div>
							<div class="proVideo">
								<a href="javascript:void(0);" class="btnCollection opensmP">Collections</a>
                                <div class="collection_block smPopup">
                                    <h4><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/spellCheck.png" height="16" width="16">Add item to Collection(s)</h4>
                                    <div class="sortingOpt">
                                        <input type="checkbox" value="My Gadgets (10)"><span> My Gadgets (10)</span>
                                        <div class="collectionBox">
                                            <input type="checkbox" value=""><input type="text" placeholder="Enter new collection title" value="" />
                                        </div>
                                    </div>
                                    <input type="button" value="Save" class="btnSavedata" />
                                </div>
							</div>
						<?php endif; ?>

            </div>


            <div class="productRate">
            <?php
            $components = $model->subCategory->components;
            $count = count($components);
            if($count > 0):

            ?>
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
                </div>
                <?php endif;?>
            </div>

            <div class="socials">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/socials.png" alt="Socials" />
            </div>

        </div>
    </div>
    <div class="activityTabs">
    <div  id="tabs" style="width:100%;">
        <ul>
            <li><a href="#tabs-1">Review</a></li>
            <li><a href="#tabs-2">Media</a></li>
            <li><a href="#tabs-3">Specification</a></li>
        </ul>

        <div id="tabs-1" class="protabContainer">
            <div class="maintabContainer" style="width:731px;margin:0;">
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
            <div id="" class="product_list_main whilteBg" style="border:1px solid #CCC;">
        <?php echo $this->renderPartial('_review_block_new',array('model' => $model,'user' => $user));?>
    </div>
    </div>
    </div>

    
    <div id="tabs-2" class="protabContainer mediaTab">
        <?php //echo $this->renderPartial('_review_block_new',array('model' => $model,'user' => $user));?>
        <?php echo $this->renderPartial('_media',array('model' => $model));?>
    </div>
    <div id="tabs-3" class="protabContainer">
        <?php echo $this->renderPartial('_attributes',array('model' => $model));?>
    </div>
    </div>

    
</div>
</div>