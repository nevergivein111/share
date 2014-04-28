$(document).ready(function () {
	var theme = getDemoTheme();

	var source = new Array();
	for (i = 0; i < 10; i++) {
		var prod_img = 'prod_thumb.jpg';
		var title = 'Samsung Galaxy S3';
		var cate = 'Electronics -> Smartphones';

		switch (i) {
			case 1:
				prod_img = 'prod_thumb.jpg';
				title = 'aaa';
				cate = 'Electronics -> Smartphones';
				break;
			case 2:
				prod_img = 'prod_thumb.jpg';
				title = 'bbb';
				cate = 'Electronics -> Smartphones';
				break;
			case 3:
				prod_img = 'prod_thumb.jpg';
				title = 'ccc';
				cate = 'Electronics -> Smartphones';
				break;
			case 4:
				prod_img = 'prod_thumb.jpg';
				title = 'ddd';
				cate = 'Electronics -> Smartphones';
				break;
			case 5:
				prod_img = 'prod_thumb.jpg';
				title = 'eee';
				cate = 'Electronics -> Smartphones';
				break;
			case 6:
				prod_img = 'prod_thumb.jpg';
				title = 'fff';
				cate = 'Electronics -> Smartphones';
				break;
			case 7:
				prod_img = 'prod_thumb.jpg';
				title = 'ggg';
				cate = 'Electronics -> Smartphones';
				break;
			case 8:
				prod_img = 'prod_thumb.jpg';
				title = 'hhh';
				cate = 'Electronics -> Smartphones';
				break;
			case 9:
				prod_img = 'prod_thumb.jpg';
				title = 'iii';
				cate = 'Electronics -> Smartphones';
				break;
		}
		var html = "<div class='compose_combobox'><img width='60' class='compose_combobox_img' src='images/" + prod_img + "'/><div class='compose_combobox_title'>"
	+ "<b style='display: none;'>Title</b><div>" + title + "</div><div class='compose_combobox_cate'><b style='display: none;'>cate</b><div>" + cate.toString() + "</div></div></div>";
		source[i] = { html: html, title: title };
	}

	// Create a jqxComboBox
	$("#jqxWidget").jqxComboBox({ source: source, selectedIndex: 0, width: '300', height: '30px', theme: theme });
});
