<div class="hSeprator" style="margin-top:0;"></div>
<div id="filter_category">
<input type="hidden" id="filter_cat_id" value="0"/>
	<div class="brand_wrapper">
		<div class="filterCat filterCat_active" data-id="0">
                    <span>
                        <label>
                            <img src="<?php echo Yii::app()->theme->baseUrl . "/images/ico_all.png"?>" alt="All"/>
                            <p>All</p>
                        </label>
                    </span>
		</div>
		<?php
		$categories = Category::model()->showCategory()->published()->findAll();
		foreach ($categories as $category):?>
                    <div class="filterCat" data-id="<?php echo $category->id;?>">
                        <span>
                            <label>
                                <img src="<?php echo $category->getThumbImage(true);?>" alt="<?php echo $category->name?>"
                                         width="16" class="catIcon">
                                <p><?php echo $category->name; ?></p>
                            </label>
                        </span>
                    </div>
		<?php endforeach;?>
		<?php if (Yii::app()->user->id) : ?>
		<div class="hSeprator"></div>
		<?php $this->widget('application.components.widgets.followPanel.FollowPanel'); ?>
		<?php endif;?>
		<div class="hSeprator"></div>
		<?php $this->widget('application.components.widgets.copyrightPanel.CopyrightPanel');?>
	</div>
</div>

<script type="text/javascript">
	$(".filterCat").click(function () {
		var elements_input = $('.filterCat');
		$.each(elements_input, function (key, input) {
			$(input).attr('class', 'filterCat');
		});

		$(this).attr('class', 'filterCat filterCat_active')

	})
	;
</script>