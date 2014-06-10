<div class="header_search">
	<input type="text" name="header_search" id="header_search" class="header_search_input typeahead"
		   placeholder="Find products by name, brand or category" data-provide="typeahead" value="<?php echo isset($_GET['query']) ? urldecode($_GET['query']) : ''?>">
</div>

<script>
	$(document).ready(function(){
		var url = "<?php echo Yii::app()->createUrl('product/searchProducts');?>";
		var term = encodeURI($(this).val());
	
		var query = $(this).val();

	});


</script>
