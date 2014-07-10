<?php
/**
* @var $model ReviewProduct
* @var $component ReviewProductComponent
*/
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.hover-star').rating({
			focus: function(value, link){
				if(value == 1)
				{
					$("div.star-rating-hover").addClass("rate1");
				}
				if(value == 2)
				{
					$("div.star-rating-hover").addClass("rate2");
				}
				if(value == 3)
				{
					$("div.star-rating-hover").addClass("rate3");
				}
				if(value == 4)
				{
					$("div.star-rating-hover").addClass("rate4");
				}
				if(value == 5)
				{
					$("div.star-rating-hover").addClass("rate5");
				}

				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				tip[0].data = tip[0].data || tip.html();
				$(tip).html(link.title || 'value: '+value);
			},
			blur: function(value, link){
				$("div.star-rating").removeClass("rate1 rate2 rate3 rate4 rate5");
				var rateTxtClass = $(this).parent().attr("id");
				var tip = $("." + rateTxtClass);
				
				var lastText = $(".hid-" + rateTxtClass).val();
				(tip).html(lastText);
			},
			callback: function(value, link){
				
				var rateObjId = $(this).parent().attr("id");
				var rateChild = $("#" + rateObjId).find(".star-rating-on");
				var rateAllChild = $("#" + rateObjId).find(".star-rating");
				//add rating
				var key = $(this).parent().attr('data');
				$("#Component_"+key+"_rating").val(value);

				$("." + rateObjId).html(link.title);
				$(".hid-" + rateObjId).val(link.title);

				$(rateAllChild).removeClass("rate6 rate7 rate8 rate9 rate10");

				if(value == 1)
				{
					$(rateChild).addClass("rate6");
				}
				if(value == 2)
				{
					$(rateChild).addClass("rate7");
				}
				if(value == 3)
				{
					$(rateChild).addClass("rate8");
				}
				if(value == 4)
				{
					$(rateChild).addClass("rate9");
				}
				if(value == 5)
				{
					$(rateChild).addClass("rate10");
				}
			}
		});
	});

	function loadStar()
	{

	}
</script>

<?php
	$attr = $model->getComponent();

	if(is_array($component)){
		$attr = $component;
		echo CHtml::hiddenField("Component_load");
	}
?>


<?php foreach($attr as $key => $val):?>
	<?php
		$key = $key+1;
		$name = ($val instanceof Component) ? $val->name : $val->component->name;
		$component_id = ($val instanceof Component) ? $val->id : $val->component->id;

	?>

	<div class="star_rating_wrapper">
		<?php echo CHtml::label($name, $name); ?>
		<div class="star_rating" id="com<?php echo $key ?>" data="<?php echo $key ?>">
			<?php echo CHtml::radioButton("component-$key-rating-$key", '', array('name'=>"component-$key-rating-$key", 'class'=>'hover-star', 'value'=>'1', 'title'=>'Eek! Methinks not.'))?>
			<?php echo CHtml::radioButton("component-$key-rating-$key", '', array('name'=>"component-$key-rating-$key",'class'=>'hover-star', 'value'=>'2', 'title'=>'Meh. I`ve experienced better.'))?>
			<?php echo CHtml::radioButton("component-$key-rating-$key", '', array('name'=>"component-$key-rating-$key",'class'=>'hover-star', 'value'=>'3', 'title'=>'A-OK.'))?>
			<?php echo CHtml::radioButton("component-$key-rating-$key", '', array('name'=>"component-$key-rating-$key",'class'=>'hover-star', 'value'=>'4', 'title'=>'Yay! I`m a fan.'))?>
			<?php echo CHtml::radioButton("component-$key-rating-$key", '', array('name'=>"component-$key-rating-$key",'class'=>'hover-star', 'value'=>'5', 'title'=>'Woohoo! As good as it gets!'))?>
			<span class="com<?php echo $key ?>">Roll over stars, then click to rate.</span>
			<input type="hidden" class="hid-com<?php echo $key ?>" value="" />
		</div>
	</div><!-- row -->

	<?php echo CHtml::hiddenField("Component[{$key}][rating]"); ?>
	<?php echo CHtml::hiddenField("Component[{$key}][component_id]", $component_id); ?>

	<?php if(is_array($component)):?>
		<?php echo CHtml::hiddenField("Component[{$key}][id]",$val->id); ?>
		<script>
			$(function(){
				var key = <?php echo $key; ?>;
				var rating = <?php echo $val->rating; ?>;
				$('input[name=component-'+key+'-rating-'+key+'][value='+rating+']').trigger('click');

			});
		</script>
	<?php endif; ?>

<?php endforeach;?>