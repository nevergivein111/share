<div class="prodsDetail">
	

        

    
    
    
        <div class="actDesc actDescShort">
            <?php echo $review->getShortDescription(200);?>
            <?php $pattern = '/<p>.*?<\/p>/';
                   preg_match_all($pattern,$review->text,$matches);
                   $string = null;
                   $string_hide = null;
                   $return = null;
                   if(count($matches[0]) > 3){?>
            <a href="#" class="readMoreText">Read More</a>
            <?php } ?>
        </div>
        <div class="actDesc actDescLong" style="display: none">
                <?php echo $review->text;?>
                <a href="#" class="readLessText">Hide</a>
        </div>

        <div class="configRate" style="display: none">
			<div class="configLeft">
				<?php foreach($review->reviewProductForActivityPage() as $review_component):?>
					<div class="configRow">
						<div class="configLbl"><?php echo $review_component->component->name?></div>
						<div class="configRateVal">
							<?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review_component->rating));?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
			<div class="configRight">
				<?php foreach($review->reviewProductForActivityPage(false) as $review_component):?>
					<div class="configRow">
						<div class="configLbl"><?php echo $review_component->component->name?></div>
						<div
							class="configRateVal"><?php $this->widget('application.components.widgets.stars.Stars',array('size' => 'medium','rating' => $review_component->rating));?></div>
					</div>
				<?php endforeach;?>
			</div>
		</div> 
	    
	
	<?php $current_user = (Yii::app()->user->id)?User::model()->findByPk(Yii::app()->user->id):NULL;?>
	<?php echo $this->render('_comment',array('review' => $review,'user' => $current_user))?>
</div>
<script>
	$('.readMoreText').on('click', function(e) {
		e.preventDefault();
		$(this).parent().hide();
		$(this).parent().parent().find('.actDesc.actDescLong').show();
	});
	
	$('.readLessText').on('click', function(e) {
		e.preventDefault();
		$(this).parent().hide();
		$(this).parent().parent().find('.actDesc.actDescShort').show();
	});
</script>
