<h4>Following</h4>
<div class="following" id="follower_holder">

</div>

<script>
	$(function () {
		addMore(<?php echo $page?>);
		$(".btnFollow").click(function () {
			var id = $(this).attr("data-follow-id");
			removeFollower(id);
		});
	})

	function removeFollower(id)
	{
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("follow/delete")?>',
			'type':'POST',
			'data':{'id':id},
			'dataType':'JSON',
			'success':function (data) {
				if (data) {
					$('input[data-follow-id=' + data.id + ']').val('Unfollow');
				}
			}
		});
	}

	function addMore(page)
	{
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("follow/more")?>',
			'type':'POST',
			'data':{'page':page},
			'success':function (data) {
				$('#follower_holder').html(data);
			}
		});
	}
</script>