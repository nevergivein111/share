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
			<?php $this->renderPartial('shared/_view_review', array('review'=>$review, 'key'=>0))?>
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

<script type="text/javascript">
	$(function () {
		$('.cmttxtarea').on("keydown", KeyPress);
	});

	function KeyPress(e) {
		var evtobj = window.event ? event : e;
		if (evtobj.keyCode == 13 && evtobj.ctrlKey) {
			addEnter($(this));
			return;
		}

		if (evtobj.keyCode == 13) {
			saveComment($(this));
			return;
		}
	}

	function addEnter(element) {
		var s = element.val();
		element.val(s + "\n");
	}

	function saveComment(element) {
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("activity/addComment")?>',
			'type':'post',
			'dataType ':'html',
			'data':{
				'review_id':element.attr("data-review"),
				'comment':element.val(),
				'key':element.attr("data-key")
			},
			'success':function (data) {
				var param = getParameterByName(this.data);
				$('textarea[data-key=' + param.key + ']').val('');
				$('#comment_holder_' + param.key).html(data);
				setBorder();
			}
		});
	}

	function viewMore(elem) {
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("activity/viewComments")?>',
			'type':'post',
			'data':{
				'review_id':elem.attr("data-review"),
				'key':elem.attr("data-key")
			},
			'success':function (data) {
				var param = getParameterByName(this.data);
				$('#comment_holder_' + param.key).html(data);
				setBorder();
			}
		});
	}

	function getParameterByName(name) {
		var urlParams;
		var match,
			pl = /\+/g, // Regex for replacing addition symbol with a space
			search = /([^&=]+)=?([^&]*)/g,
			decode = function (s) {
				return decodeURIComponent(s.replace(pl, " "));
			},
			query = name;

		urlParams = {};
		while (match = search.exec(query))
			urlParams[decode(match[1])] = decode(match[2]);

		return urlParams;
	}

</script>
