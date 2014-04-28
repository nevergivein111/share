<div class="<?php  echo $class ?>">
	<div data-size="<?php echo $size ?>" data-rating="<?php echo $rating ?>"></div>
</div>



<script>

function eachRating(){
	$('[data-rating]').each(function(){
		var sGap  = 2;
		var sSize = 20;
		var sFlag = "m";
		var sRate = $(this).data("rating");
		var sNum  = Math.ceil(sRate);
		var sExtra = 0;

		if($(this).data("size") == "small")
		{
			sGap  = 1;
			sSize = 14;
			sFlag = "sm";
			if(sNum > 2){ sExtra = 1 };
		}
		if($(this).data("size") == "medium")
		{
			sGap  = 2;
			sSize = 20;
			sFlag = "m";
		}
		if($(this).data("size") == "big")
		{
			sGap  = 5;
			sSize = 30;
			sFlag = "b";
		}

		$(this).addClass("star_" + sFlag + "_" + sNum + " star_" + sFlag);
		var pointF = Math.round((sRate - Math.floor(sRate)) * 10);
		var sTotalWh = (Math.floor(sRate) * sSize) + (Math.floor(sRate) * sGap) + ((sSize/10) * pointF) + sExtra;
		$(this).width(sTotalWh);
		});
	}
	$(document).ready(function(){
		eachRating();
	})
	

</script>