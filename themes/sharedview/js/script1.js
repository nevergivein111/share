$(document).ready(function(){
	//| Display Average Rate on Page Load if data-rating attribute available
	//| Apply Only on element which have data-rating attribute
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
			sGap  = 3;
			sSize = 30;
			sFlag = "b";
		}
		
		$(this).addClass("star_" + sFlag + "_" + sNum + " star_" + sFlag);
		var pointF = Math.round((sRate - Math.floor(sRate)) * 10);			
		var sTotalWh = (Math.floor(sRate) * sSize) + (Math.floor(sRate) * sGap) + ((sSize/10) * pointF) + sExtra;
		$(this).width(sTotalWh);
	});
	
	if($('.hover-star').length > 0)
	{
		$('.hover-star').rating({
			focus: function(value, link){
			   $("div.star-rating-hover").addClass("rate" + value);   
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
			   if(lastText == "")
			   {
				   lastText = "Roll over stars, then click to rate.";
			   }
			   (tip).html(lastText);
			},
			callback: function(value, link){
				var rateObjId = $(this).parent().attr("id");
				var rateChild = $("#" + rateObjId).find(".star-rating-on");
				var rateAllChild = $("#" + rateObjId).find(".star-rating");
				
				if($(this).parent().hasClass("overallB"))
				{
					$(this).parent().find(".rateV").val(value);
					var starSize = 28;
					var totalNum = $(".overallB").length;
					var totalVal = 0;
					$(".overallB").each(function(){
						totalVal += Number($(this).find(".rateV").val());	
					});
					var averageVal = totalVal/totalNum;
					var gap = Math.ceil(averageVal) - 1;
					var overallRate = (starSize * averageVal) + (5 * gap);
					$(".avarageRate").css({
						background : "url(images/star" + Math.ceil(averageVal) + ".png)", 
						width : overallRate
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
	
	// Jquery ui Tab Call
	if($("#tabs").length > 0)
	{
		$('#tabs').tabs();
	}
	
	$(".new_search_btn").click(function(){
		$(".notificationArea").slideToggle("slow");	
	});
	
	// Slimscroll for Notification box
	if($("#scroll_2").length > 0)
	{
		$('#scroll_2').slimScroll({
			height: '150px'
		}); 
	}
	
	if($('.customCheckbox').length > 0)
	{
		$('.customCheckbox').screwDefaultButtons({
			image: 'url("images/checkboxSmall.png")',
			width: 14,
			height: 14
		});
	}
	
//	$(".btnViewStore").popover({
//		placement:'left',
//		html:true,
//		title:'',
//		trigger:'manual',
//	    animation: false,
//		content:'<div class="pricePopup"><div class="priceHead">Purchase Product</div><div class="priceRow activeRow"><div class="pImgpart"><img src="/shareview/themes/sharedview/images/amazon_Logo.jpg" alt="" style="margin-top:2px;" /><br>Featured Seller</div><div class="priceTag">$1,049.00<span>+ tax & shipping</span></div><div class="priceBtn"><input type="button" value="Buy" class="btnBuy" /></div></div><div class="priceRow"><div class="pImgpart"><img src="/shareview/themes/sharedview/images/studica_Logo.jpg" alt="" /></div><div class="priceTag">$1,049.00<span>+ tax & shipping</span></div><div class="priceBtn"><input type="button" value="Buy" class="btnBuy" /></div></div><div class="priceRow"><div class="pImgpart"><img src="/shareview/themes/sharedview/images/applestore_Logo.jpg" alt="" /></div><div class="priceTag">$1,049.00<span>+ tax & shipping</span></div><div class="priceBtn"><input type="button" value="Buy" class="btnBuy" /></div></div></div>'
//	}).on("mouseenter", function () {
//        var _this = this;
//        $(this).popover("show");
//        $(this).siblings(".popover").on("mouseleave", function () {
//            $(_this).popover('hide');
//        });
//    }).on("mouseleave", function () {
//        var _this = this;
//        setTimeout(function () {
//            if (!$(".popover:hover").length) {
//                $(_this).popover("hide")
//            }
//        }, 100);
//    });
	
});
