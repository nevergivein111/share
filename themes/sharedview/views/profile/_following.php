
<!--<div class="followers_block" style="clear:both;">
		<div class="inline_bl" style="width:130px;">
			<?php /*echo CHtml::image($data->following->getThumbImage(true), '', array('width' => '35'));*/?>
			<?php /*echo CHtml::link($data->following->getDisplayName(false), array('/profile/'.$data->following_id))*/?>
		</div>

</div>-->

<div class="flwBlock">
    <div class="flwProfile">
        <div class="flwPic">
            <?php echo CHtml::image($data->following->getThumbImage(true));?>
        </div>
    </div>
    <div class="flwInfo">
        <div class="flw_proRate">
            <h4><?php echo CHtml::link($data->following->getDisplayName(false), array('/profile/'.$data->following_id))?></h4>
            <h6>2000 points</h6>
            <div class="flwRow">
                <div class="flwCat">
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/imgAudio.png" alt="" />
                    <span>Audio</span>
                </div>
            </div>
        </div>
        <div class="flw_proRate">
			<?php if(isset($user->id) && ($user->id !=$data->following_id)):?>
				<?php $this->renderPartial('_follow_button',array('follower_id'=>$user->id,'following_id'=>$data->following_id))?>
			<?php endif;?>
        </div>
    </div>
</div>