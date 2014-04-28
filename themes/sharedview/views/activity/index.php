<div class="span2 leftSidebar" style="width:16.53%;">
	<div id="filter_category">

		<div class="brand_wrapper">
			<?php if (Yii::app()->user->id) : ?>
			<div class="hSeprator"></div>
			<?php $this->widget('application.components.widgets.followPanel.FollowPanel'); ?>
			<?php endif;?>
			<div class="hSeprator"></div>
			<?php $this->widget('application.components.widgets.copyrightPanel.CopyrightPanel');?>
		</div>
	</div>
</div>
<div class="span8 centerArea" style="margin-left:0;">
	<div class="row-fluid">
		<div class="span12">
            <?php $result = $activity->getResults()?>
            <?php if(count($result) < 1): ?>
            <br/>
            <div class="alert" style="height:30px">
                <div class="pull-left" style="padding-top:5px"><h4>You haven't created any review yet.</h4></div>
                <a href="<?php echo Yii::app()->createUrl('compose-review')?>">
                    <button type="button" class="btn btn-primary pull-right">Write Review</button>
                </a>
            </div>
            <?php endif;?>
			<?php
			foreach ($result as $key => $model) {
				$activity->model = $model;
				$activity->key = $key;
				$arr = $activity->getResult();
				$this->renderPartial("_list", array(
						'headerText' => $arr['headerText'],
						'headerComment' => $arr['headerComment'],
						'review' => $arr['review'],
						'user' => $arr['user'],
						'create_date' => $arr['create_date'],
						'key' => $key,
					)
				);
			}
			?>

		</div>
	</div>
</div>

<div class="span2 rightSidebar" style="margin-left:0;">
	<?php
	$this->widget('application.components.widgets.suggestedPanel.SuggestedPanel');

	$banners = array(
		'0' => array('src' => Yii::app()->theme->baseUrl . '/images/banner1.jpg', 'link' => '#')
	);
	$this->widget('application.components.widgets.bannerPanel.BannerPanel', array('banners' => $banners));
	?>
</div>


