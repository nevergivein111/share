<?php
/**
 * @var $model User
 */
?>
<div class="infoBox">
    <div class="infoDetail">
        <div class="profileImg">
            <input type="hidden" id="userId" value="<?= $model->id?>"/>
            <?php echo CHtml::image($model->getNormalImage(false));?>
        </div>
        <div class="profileSummary">
            <h3><?php echo $model->getDisplayName(false)?></h3>
            <div class="followers">
				<?php if (Yii::app()->user->id != $model->id): ?>
					<?php $this->renderPartial('_follow_button',array('follower_id'=>Yii::app()->user->id,'following_id'=>$model->id))?>
				<?php endif; ?>
               
            </div>
        </div>

    </div>
</div>



<div class="infoBox">
    <div class="infoHead">Dillon's Followers</div>
    <div class="infoDetail" align="center">
        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/followers.png" alt="" />
    </div>
    <a href="#" class="allMsgLink">View All Followers (135)</a>
</div>



