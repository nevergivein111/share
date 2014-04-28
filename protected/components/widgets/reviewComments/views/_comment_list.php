<div class="commentArea">
<div class="commentRow">
        <div class="commentorPic">
                <a id="comment_user_img_<?php echo $data->id.'_'.$data->user->id;?>" title="<?php echo $data->user->getDisplayName(false);?>" href="<?php echo Yii::app()->createUrl('profile/view',array('id'=>$data->user->id))?>">
        <?php echo CHtml::image($data->user->getThumbImage(false),'',array('class'=>'profile_comm_image'));?>
                </a>
        </div>
        <div class="commentInput">
                <div class="commentText">
                <a title="<?php echo $data->user->getDisplayName(false);?>" id="comment_user_<?php echo $data->id.'_'.$data->user->id?>" href="<?php echo Yii::app()->createUrl('profile/view',array('id'=>$data->user->id))?>">
                        <span><?php echo $data->user->getDisplayName(false);?></span>
                </a>
                        <?php echo nl2br($data->comment);?>
                        <?php  if($data->user->id == Yii::app()->user->id):?>
                <div class="rev_comment_actions">
                        <a href="javascript:void(0)" class="delete_comment" data-id="<?php echo $data->id;?>">
                                <img src="<?php  echo Yii::app()->theme->baseUrl; ?>/images/icClose.png"/>
                        </a>
                </div>
                <?php endif;?>
                </div>
                <div class="cmtDuration"><?php echo Additional::TimeAgoFormat($data->create_date);?></div>

        </div>
</div>
</div>
<script>
    $(function () {
        var uid = 'comment_user_img_<?php echo $data->id.'_'.$data->user->id;?>';
        var un_id ='comment_user_<?php echo $data->id.'_'.$data->user->id;?>';
        var u_content = '<?php $this->render("shared/_popover_user",array('user' => $data->user))?>';
        showPopover(uid,u_content);
        showPopover(un_id,u_content);
        }
        );
</script>
