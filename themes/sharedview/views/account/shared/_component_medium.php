<script type="text/javascript">
	if ($('.hover-star').length > 0) {
		$('.hover-star').rating({
			focus:function (value, link) {
				$("div.star-rating-hover").addClass("rate" + value);
				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				tip[0].data = tip[0].data || tip.html();
				$(tip).html(link.title || 'value: ' + value);
			},
			blur:function (value, link) {
				$("div.star-rating").removeClass("rate1 rate2 rate3 rate4 rate5");
				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				var lastText = $(".hid-" + rateTxtClass).val();
				if (lastText == "") {
					lastText = "Roll over stars, then click to rate.";
				}
				(tip).html(lastText);
			},
			callback:function (value, link) {
				var rateObjId = $(this).parent().attr("id");
				var rateChild = $("#" + rateObjId).find(".star-rating-on");
				var rateAllChild = $("#" + rateObjId).find(".star-rating");

				//add rating
				var key = $(this).parent().attr('data');
				$("#Component_" + key + "_rating").val(value);


				if ($(this).parent().hasClass("overallB")) {
					$(this).parent().find(".rateV").val(value);
					var starSize = 28;
					var totalNum = $(".overallB").length;
					var totalVal = 0;
					$(".overallB").each(function () {
						totalVal += Number($(this).find(".rateV").val());
					});
					var averageVal = totalVal / totalNum;
					var gap = Math.ceil(averageVal) - 1;
					var overallRate = (starSize * averageVal) + (5 * gap);
					$(".avarageRate").css({
						background:"url(<?php echo Yii::app()->theme->baseUrl;?>/images/star" + Math.ceil(averageVal) + ".png)",
						width:overallRate
					});
				}

				$("." + rateObjId).html(link.title);
				$(".hid-" + rateObjId).val(link.title);
				$(rateAllChild).removeClass("rate6 rate7 rate8 rate9 rate10");
				value = Number(value) + 5;
				$(rateChild).addClass("rate" + value);
			}
		});
	}
</script>
<?php

$attr = $model->getComponent();

if (is_array($component)) {
	$attr = $component;
	echo CHtml::hiddenField("Component_load");
}
?>
<?php if (count($attr) > 0): ?>
<div class="reviewField">
	<div class="reviewLabel">
		<label class="rlabel">Overall</label>
	</div>
	<div class="reviewInput">
		<div class="rateDisplay">
			<div class="disableRate"></div>
			<div class="avarageRate"></div>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="reviewField">
	<?php foreach ($attr as $key => $val): ?>
	<?php
	$key = $key + 1;
	$name = ($val instanceof Component) ? $val->name : $val->component->name;
	$component_id = ($val instanceof Component) ? $val->id : $val->component->id;

	?>
	<div class="reviewLabel">
		<?php echo CHtml::label($name, $name, array("class" => "rlabel")); ?>
	</div>

	<div class="reviewInput">
		<div class="star_rating_wrapper">
			<div class="star_rating overallB" id="com<?php echo $key ?>" data="<?php echo $key ?>">
				<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '1', 'class' => 'hover-star', 'title' => 'Nah, doesn`t cut it'))?>
				<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '2', 'class' => 'hover-star', 'title' => 'Needs improvement'))?>
				<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '3', 'class' => 'hover-star', 'title' => 'So - so'))?>
				<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '4', 'class' => 'hover-star', 'title' => 'Gets it done, and then some'))?>
				<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '5', 'class' => 'hover-star', 'title' => 'Oh yah! Top-notch!'))?>
				<span id="com<?php echo $key ?>" class="com<?php echo $key ?> rateTxt">Roll over stars, then click to rate.</span>
				<input type="hidden" class="hid-com<?php echo $key ?>" value=""/>
				<input type="hidden" class="rateV" value=""/>
			</div>
		</div>
	</div>

	<?php echo CHtml::hiddenField("Component[{$key}][rating]"); ?>
	<?php echo CHtml::hiddenField("Component[{$key}][component_id]", $component_id); ?>

	<?php if (is_array($component)): ?>
		<?php echo CHtml::hiddenField("Component[{$key}][id]", $val->id); ?>
		<script>
			$(function () {
				var key = <?php echo $key; ?>;
				var rating = <?php echo $val->rating; ?>;
				$('input[name=component-' + key + '-rating-' + key + '][value=' + rating + ']').trigger('click');

			});
		</script>
		<?php endif; ?>

	<?php endforeach;?>
</div>
