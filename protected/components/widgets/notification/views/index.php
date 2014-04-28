<div class="new_search_btn notification_dropdown_holder">
    <div class="new_search_number" id="notification_number_holder">
        <?php if (count($data) > 0): ?>
        <div class="arrow_box"><?php echo count($data)?></div>
        <?php endif;?>
    </div> 

    <div class="notificationArea">
        <div class="notifyBlock">
            <?php $this->render('_list', array('data' => $data))?>
        </div>
    </div>
</div>

<script>
	$(".notification_dropdown_holder").on("click", function (event) {
		$.ajax({
			url:"<?php echo Yii::app()->createUrl('notification/check');?>",
			dataType:'json',
			type:'POST',
			data:<?php echo json_encode($params);?>
		}).done(function (data) {
				$('#notification_number_holder').text('');
			});
	});
</script>
