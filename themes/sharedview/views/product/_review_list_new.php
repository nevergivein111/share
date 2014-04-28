<div class="productRow">
    <div class="userImg">
        <a  href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $data->user->id))?>">
            <img id="tooltip_review_user_<?php echo $key;?>" title="<?php echo $data->user->getDisplayName(false);?>" src="<?php echo $data->user->getNormalImage(false);?>" alt="<?php echo $data->user->getDisplayName(true);?>" />
                           <br>
            <span id="tooltip_review_user_name_<?php echo $key;?>" title="<?php echo $data->user->getDisplayName(false);?>"><?php echo $data->user->getDisplayName(false);?></span>
            <div class="productDetail_userCreateDate"><?php echo Additional::TimeAgoFormat($data->user->create_date); ?></div>
        </a>
    </div>

    <div class="productDetail">
		<div class="activityDetail">
        <div class="activityTxt">
            <?php $this->widget('application.components.widgets.stars.Stars', array('size' => 'big', 'rating'=>$data->getOverall())); ?>
            <div class="RateDetaillbl"><a href="#" class="ProductRatingdetails">Rating details</a></div>
        </div>
        <div class="configRate" style="display:none;padding-left:10px;">
                    <?php $comp = $data->reviewProductComponents;?>
                    <div class="configLeft">
                            <?php for($i = 0; $i <= floor(count($comp) / 2); $i++):?>

                                    <div class="configRow">
                                            <div class="configLbl"><?php echo $comp[$i]->component->name;?></div>
                                            <div class="configRateVal">
                                                    <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $comp[$i]->rating));?>
                                            </div>
                                    </div>
                            <?php endfor;?>
                    </div>
                    <div class="configRight">
                            <?php for($j = floor(count($comp) / 2) + 1; $j < count($comp); $j++):?>
                                    <div class="configRow">
                                            <div class="configLbl"><?php echo $comp[$j]->component->name;?></div>
                                            <div class="configRateVal">
                                                    <?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $comp[$j]->rating));?>
                                            </div>
                                    </div>
                            <?php endfor;?>
                    </div>
            </div>
        <div class="prodsDetail">       
            <div class="proDetail">
                <div class="actDesc less">
                    <?php echo $data->getShortDescription(200);?>
                    <?php $pattern = '/<p>.*?<\/p>/';
                           preg_match_all($pattern,$data->text,$matches);
                           $string = null;
                           $string_hide = null;
                           $return = null;
                           if(count($matches[0]) > 3){?>
                    <a href="#" class="readMoreText">Read More</a>
                    <?php } ?>
                </div>
                <div class="actDesc more" style="display: none">
                    <?php echo $data->text;?>
                    <a href="#" class="readLessText">Hide</a>
                </div>
            </div>
            

            <div class="reviewText">
                    <?php
                    $comm_count = count($data->reviewComments);
                    $isGuest = (Yii::app()->user->isGuest) ? 'isGuest':'';
                    $owner = (Yii::app()->user->id == $data->user_id) ? 'add_helpful_to_review':'';
                    if($comm_count > 4):
                            ?>
                            <span class="comment_toggle" data-id="<?php echo $data->id;?>">
                                    <?php echo $data->getCommentCountText($comm_count);?>
                            </span>
                            <span class="comment_umbersand">|</span>
                            Find this review <span class="helfulR  <?php echo $isGuest.' '.$owner;?>" data-id="<?php echo $data->id?>" data-url="<?php echo Yii::app()->createUrl('helpful/process');?>">helpful <?=count($data->findHelpful);?></span>
                    <?php else:?>
                            Find this review <span class="helfulR <?php echo $isGuest.' '.$owner;?>"  data-id="<?php echo $data->id?>" data-url="<?php echo Yii::app()->createUrl('helpful/process');?>">helpful <?=count($data->findHelpful);?></span>
                    <?php endif;?>
                    <?php if(Yii::app()->user->id == $data->user_id):?>
                            <div class="actAction">
                                    <a href="<?php echo Yii::app()->createUrl('reviewProduct/update',array('id'=>$data->id));?>">
                                            Edit<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icEdit.png" alt="Edit" />
                                    </a>
                                    <a class="delete_review" href="<?php echo Yii::app()->createUrl('reviewProduct/delete',array('id'=>$data->id));?>">Remove<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icClose.png" alt="Remove" /></a>
                            </div>
                    <?php endif;?>
            </div>

            <?php

            $this->widget('application.components.widgets.reviewComments.ReviewProductComments',array(
                              'review_id' => $data->id,
                              'review' => $data,
                              'user' => $user
            ));

            ?>
        </div>
    </div>
	</div>
</div>
<div class="seprateLine1"></div>
<script>
$(function () {
	var id = 'tooltip_review_user_<?php echo $key;?>';
	var n_id ='tooltip_review_user_name_<?php echo $key;?>';
 	var content = '<?php $this->renderPartial("//activity/shared/_popover_user",array('user' => $data->user))?>';
	showPopover(id,content);
	showPopover(n_id,content);

	$('.readMoreText').on('click', function(e) {
		e.preventDefault();
		$(this).parent().hide();
		$(this).parent().parent().find('.actDesc.more').show();
	});

	$('.readLessText').on('click', function(e) {
		e.preventDefault();
		$(this).parent().hide();
		$(this).parent().parent().find('.actDesc.less').show();
	});
    }
 );
</script>

