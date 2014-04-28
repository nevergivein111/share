<div class="activityRow">
    <div class="userImg">
        <a  href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $data->user->id))?>">
            <img id="tooltip_review_user_<?php echo $key;?>" title="<?php echo $data->user->getDisplayName(false);?>" src="<?php echo $data->user->getNormalImage(false);?>" alt="<?php echo $data->user->getDisplayName(true);?>" />
			   <br>
            <span id="tooltip_review_user_name_<?php echo $key;?>" title="<?php echo $data->user->getDisplayName(false);?>"><?php echo $data->user->getDisplayName(false);?></span>
        </a>		   
    </div>
	<div class="activityDetail">
            <div class="uproDetail">
                <a href="#" class="readMore readMoreExpand">Expand</a>
                <div class="activityHeader">
                    <div class="actProdhead">
                        <div class="actProRate">
                            <div class="actRate">
                                    <?php $this->widget('application.components.widgets.stars.Stars', array('size' => 'medium', 'rating'=>$data->getOverall())); ?>
                            </div>
                            <div class="actDate"><?php echo date('n/j/Y',strtotime($data->create_date))?></div>
                        </div>
                    </div>
                </div>
                <div class="actDesc">
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
                <div class="actDesc" style="display: none">
                        <?php echo $data->text;?>
                        <a href="#" class="readMoreText">Hide</a>
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

<script>
$(function () {
	var id = 'tooltip_review_user_<?php echo $key;?>';
	var n_id ='tooltip_review_user_name_<?php echo $key;?>';
	var content = '<?php $this->renderPartial("//activity/shared/_popover_user",array('user' => $data->user))?>';
	showPopover(id,content);
	showPopover(n_id,content);
});
</script>



