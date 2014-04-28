<h4>Related Product</h4>
<div class="following" id="related_product_panel_holder">

</div>

<script>
	$(function () {
		addMoreRelatedProduct(<?php echo $page?>);
	})

	function addMoreRelatedProduct(page)
	{
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("viewReview/relatedProduct")?>',
			'type':'POST',
			'data':{'page':page},
			'success':function (data) {
				$('#related_product_panel_holder').html(data);
			}
		});
	}
</script>