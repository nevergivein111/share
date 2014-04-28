<div class="activityRow">
	<div class="activityDuration"><?php echo Additional::TimeAgoFormat($data->create_date);?></div>
	<div class="userImg">
			<?php echo CHtml::image($data->review->product->getNormalImage(true),'',array('width' => '75'))?>
	</div>
	<div class="activityDetail">
		<div class="activityTxt" style="border-bottom: 0px">
			<div class="titleTxt">
				<?php echo $data->review->product->name?>
			</div>

			<div class="userCmt">
				<?php echo $data->comment?>
			</div>
			<?php echo CHtml::link('Go To Review',"javascript:void(0)", array('onclick'=>"redirectComment($(this))", "data-id"=>"#".$data->review->id, "data-url"=>Yii::app()->createUrl('profile/'.$data->review->user->id)));?>
		</div>
		<a href="javascript:void(0);" data-review="<?php echo $data->review->id;?>"class="delete_comment_from_comment" data-id="<?php echo $data->id;?>">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icClose.png" alt="Remove" />
		</a>

	</div>
</div>
