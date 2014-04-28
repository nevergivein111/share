<script type="text/javascript">
	if ($('.hover-star').length > 0) {
		$('.hover-star').rating({
			focus:function (value, link) {
				$("div.star-rating-hover").addClass("rate" + value);
				$("div.star-rating-hover").children('a').removeAttr('title');
				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				tip[0].data = tip[0].data || tip.html();
//				$(tip).html(link.title || 'value: ' + value);
			},
			blur:function (value, link) {
				$("div.star-rating").removeClass("rate1 rate2 rate3 rate4 rate5");
				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				var lastText = $(".hid-" + rateTxtClass).val();
				if (lastText == "") {
					lastText = "";
				}
				(tip).html(lastText);
			},
			callback:function (value, link) {
				var rateObjId = $(this).parent().attr("id");
				$(this).parent().find("span.star-rating-control").addClass("selected");
				var rateChild = $("#" + rateObjId).find(".star-rating-on");
				var rateAllChild = $("#" + rateObjId).find(".star-rating");

				//add rating
				var key = $(this).parent().attr('data');
				$("#Component_" + key + "_rating").val(value);


				if ($(this).parent().hasClass("overallB")) {
					$(this).parent().find(".rateV").val(value);
					var starSize = 28;
					var totalNum = Math.ceil($(".selected").length);
					var totalVal = 0;
					$(".overallB").each(function () {
						totalVal += Number($(this).find(".rateV").val());
					});
					var averageVal = totalVal / totalNum;
					var gap = Math.ceil(averageVal) - 1;
					var overallRate = (starSize * averageVal) + (5 * gap);
					$("#mark").text(averageVal.toFixed(1));
					//alert(Math.ceil(averageVal));
					$(".avarageRate").css({
						background:"url(<?php echo Yii::app()->theme->baseUrl;?>/images/star" + (Math.ceil(averageVal)) + ".png)",
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
$attr = $component;
if (is_array($component)) {
	$attr = $component;
	echo CHtml::hiddenField("Component_load");
}
?>

<div class="reviewField">
    <div class="reviewLabel review_label_new"></div>
    <div class="reviewInput">
        
        <?php if (count($component) > 0): ?>
			<div class="productReviewmain" style="background-color: #f5f5f1">
				<div class="pro_sum_Img">
					<img src="<?php echo $model->product->getOrigImage()?>"/>
				</div>
				<div class="pro_conf" style="width: 320px;">
					<div class="pro_conf_rate" style="font-weight: bold;">
						<?php echo $model->product->name;?>
					</div>
					<div class="clear"></div>
					<div class="pro_conf_rate">
						<div class="rateDisplay">
							<div class="disableRate"></div>
							<div class="avarageRate"></div>
						</div>
					</div>
				</div>
			</div>
        <?php endif; ?>
	<span style="float: left; margin-right: 20px;">
		<?php foreach ($component as $key => $val): ?>
		<?php
		$key = $key + 1;
		$name =  $val->component->name;
		$component_id = $val->component->id;
		?>
			<div class="reviewBlock">
				<div class="reviewLabel">
						<?php echo CHtml::label($name, $name, array("class" => "rlabel")); ?>
				</div>

				<div class="reviewInput">
					<div class="star_rating_wrapper">
						<div class="star_rating overallB" id="com<?php echo $key ?>" data="<?php echo $key ?>">
								<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '1', 'class' => 'med hover-star'))?>
								<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '2', 'class' => 'med hover-star'))?>
								<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '3', 'class' => 'med hover-star'))?>
								<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '4', 'class' => 'med hover-star'))?>
								<?php echo CHtml::radioButton("component-$key-rating-$key", false, array('name' => "component-$key-rating-$key", 'value' => '5', 'class' => 'med hover-star'))?>
								<!-- <span id="com<?php echo $key ?>" class="com<?php echo $key ?> rateStatus"></span> -->
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
					var rating = <?php if ( $val->rating ==NULL || $val->rating == '') echo "0"; else echo $val->rating; ?>;
					$('input[name=component-' + key + '-rating-' + key + '][value=' + rating + ']').trigger('click');
				});
			</script>
			<?php endif; ?>
			</div>
			<?php if($key == 4):?>
				</span>
				<span style="float: left;">
			<?php endif; ?>
		<?php endforeach;?>
	</span>
    </div>
</div>
