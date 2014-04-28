<div class="flwBlock">
    <div class="flwProfile">
        <div class="flwPic">
            <?php echo CHtml::image($data->follower->getThumbImage(true));?>
        </div>
    </div>
    <div class="flwInfo">
        <div class="flw_proRate">
            <h4><?php echo CHtml::link($data->follower->getDisplayName(false), array('/profile/'.$data->follower_id))?></h4>
            <h6>2000 points</h6>
            <div class="flwRow">
                <div class="flwCat">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/imgAudio.png" alt="" />
                    <span>Audio</span>
                </div>
            </div>
        </div>
        <div class="flw_proRate">
			<?php if(isset($user->id) && ($user->id !=$data->follower_id)):?>
				<?php $this->renderPartial('_follow_button',array('follower_id'=>$user->id,'following_id'=>$data->follower_id))?>
			<?php endif;?>
        </div>
    </div>
</div>