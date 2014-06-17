	<input type="text" autocomplete="off" name="header_search" id="header_search" class="searchBox typeahead"
		   placeholder="Find products by name, brand or category" data-provide="typeahead" value="<?php echo isset($_GET['query']) ? urldecode($_GET['query']) : ''?>">
           <input type="submit" value="" class="sbmitbg" data-provide="typeahead" >

<script>
	$(document).ready(function(){
		var url = "<?php echo Yii::app()->createUrl('product/searchProducts');?>";
		var term = encodeURI($(this).val());
	
		var query = $(this).val();

		$('.typeahead').typeahead({
			minLength: 3,
			items:8,
			source: function (query, process) {
				return $.get(url, { query: query }, function (data) {
					var newData = data.map(function (item) {
						var aItem = { pid: item.pid, name: item.name, photo:item.photo, link:item.link };
						return JSON.stringify(aItem);
					});
                
					return process(newData);
					
				},"json");
			},
			matcher: function (item) {
				return true;
			},

			highlighter: function(obj) {
				var item = JSON.parse(obj);
				if(item.pid != 0){
					var text = '<div class="search_img_typehead"><img src="'+item.photo+'"/></div><div class="search_name_type">'+item.name+'</div>';
				}else{
					var text = item.name;
				}
				return text;
			},
			updater: function (obj) { // What gets sent to the input box
				var item = JSON.parse(obj);
				window.location.href=item.link;
			}

		});
	});


</script>
