<h4>Recently Viewed</h4>
<div class="following" id="recent_view_panel_holder">

</div>

<script>
	$(function () {
		addMoreRecentView(<?php echo $page?>);
	})

	function addMoreRecentView(page) {
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("viewReview/more")?>',
			'type':'POST',
			'data':{'page':page},
			'success':function (data) {
				$('#recent_view_panel_holder').html(data);
			}
		});
	}
</script>