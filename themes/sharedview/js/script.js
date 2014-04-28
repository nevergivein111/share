var leftIndex   = new Array();
var centerIndex = new Array();
var rightIndex  = new Array();
var totalHeight = 400;
var thisTimer   = null;
var timeoutTime = 100;
var insidePopup = false;

$(document).ready(function(){
		
	//| this script is for placeholder compability in IE
	
	var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
		$('[placeholder]').focus(function() {
			var i = $(this);
			if(i.val() == i.attr('placeholder')) {
				i.val('').removeClass('placeholder');
				if(i.hasClass('password')) {
					i.removeClass('password');
					this.type='password';
				}			
			}
		}).blur(function() {
			var i = $(this);	
			if(i.val() == '' || i.val() == i.attr('placeholder')) {
				if(this.type=='password') {
					i.addClass('password');
					this.type='text';
				}
				i.addClass('placeholder').val(i.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder'))
					i.val('');
			})
		});
	}	
		
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
	
	//| Star Rating
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
		$('#tabs').tabs({
		  select: function(event, ui){
			  if($(ui.panel).data("filter"))
			  {
				  if($(ui.panel).data("filter") == "yes"){
						$(".lefttabContainer").show();
						$(".rightTabsidebar").hide();
						$(".maintabContainer").css({
							width:"793px",
							marginLeft : "10px"	
						}); 
						$(".righttabContainer").css({
							width:"100%"
						});   
				  }
				  else if($(ui.panel).data("filter") == "right"){
						$(".lefttabContainer").hide();
						// $(".rightTabsidebar").show();
						$(".righttabContainer").css({
							width:"100%",
							marginLeft : "0px"	
						});  
						$(".maintabContainer").css({
							width:"100%",
							marginLeft : "-2px"	
						});  
				  }
				  else{
						$(".lefttabContainer,.rightTabsidebar").hide();
						$(".righttabContainer").css({
							width:"100%",
							marginLeft : "0"	
						}); 
				  }
			  }
		  }
		});
	}

	// Product detail page open/close popup
	$(".opensmP").click(function(e){
		e.preventDefault();
		var popup = $(this).parent(".proVideo").find(".smPopup");
		$(".smPopup").not(popup).slideUp();
		$(this).parent(".proVideo").find(".smPopup").slideToggle();
	});	

	$(".btnSavedata").click(function(){
		$(".smPopup").slideUp();
	});

	$(".leaderMonth > li > span").click(function(){
		if($(this).parent().find("li").is(":visible")){
			$(this).parent().find("li").slideUp();
			$(this).parent().css("list-style","url('themes/sharedview/images/ic_plus.png')");
		}
		else {
			$(this).parent().find("li").slideDown();
			$(this).parent().css("list-style","url('themes/sharedview/images/ic_minus.png')");
		}
	});

	$('.leaderMonth > li a').click(function(e) {
		$('.leaderMonth > li a').removeClass("active");
		$(this).addClass("active");
		var month = $(this).text();
		var year = $(this).parent().parent().parent().find('span').text();

		$('#leaderMonthSelected').text(month + ' ' + year);

		e.preventDefault();
	});

	// Graphic Tabs
	$(".graphicTab ul li").click(function(){
		var index = $(this).index();
		$(".graphicTab ul li").removeClass("active");
		$(".gTab").hide();
		$(this).addClass("active");
		$(".gTab:eq(" + index + ")").show();
	});

	// By default, open 2014 and select February
	$('.leaderMonth > li').first().find('ul li').slideDown();
	$('.leaderMonth > li').first().css("list-style","url('themes/sharedview/images/ic_minus.png')");
	$('.leaderMonth > li a').first().addClass("active");

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
	
	$(".reviewDetails").live("click",function(e){
		e.preventDefault();
        $(this).parents( ".activityDetail" ).find(".configRate").slideToggle("slow");
	});
	
	$(".rtDetail").live("click",function(e){
		e.preventDefault();
        $(this).parents( ".reviewSlot" ).find(".configRate").slideToggle("slow");
	});
	
	
	$(".ProductRatingdetails").live("click",function(e){
		e.preventDefault();
        $(this).parents( ".productDetail" ).find(".configRate").slideToggle("slow");
	});
	
	$(".btnViewStore").live({
		mouseenter: function () {
			clearTimeout(thisTimer);
			$(this).next(".pricePopup").show();
			var mTop = Math.floor($(this).next(".pricePopup").height()/2);
			$(this).next(".pricePopup").css("marginTop","-"+mTop+"px");
	    },
	    mouseleave: function () {
			clearTimeout(thisTimer);
			thisTimer = setTimeout(function(){
		        if(!insidePopup)
		            $(".pricePopup").hide();
		        clearTimeout(thisTimer);
		    }, timeoutTime);
			
	    }
	});
	
	$(".pricePopup").live({
		mouseenter : function(){
			insidePopup = true;
		},
		mouseleave : function(){
		   insidePopup = false;
		   $(this).hide();
		}
	});
		
	$(".proList").each(function(){
		var numLi = $(this).find("li").length;
		if(numLi % 2 == 0)
		{
			$(this).find("li:eq("+(numLi-1)+")").css("border-bottom",0);
			$(this).find("li:eq("+(numLi-2)+")").css("border-bottom",0);
		}
		else{
			$(this).find("li:eq("+(numLi-1)+")").css("border-bottom",0);
		}
	});
	
	/*
	$('.product').each(function(){
		var divIndex = $(this).index();
		var leftsideH = 0;
		var rightsideH = 0;
		var marginTop = 0;
		
		if(divIndex == 0)
		{
			leftIndex.push(0);	
		}
		if(divIndex == 1)
		{
			rightIndex.push(1);
		}
		
		if(divIndex >= 2)
		{
			for(var j = 0; j < leftIndex.length; j++)
			{
				leftsideH += $(".product:eq("+(leftIndex[j])+")").height() + 10;
			}
			
			for(var k = 0; k < rightIndex.length; k++)
			{
				rightsideH += $(".product:eq("+(rightIndex[k])+")").height() + 10;
			}
			
			if(leftsideH > rightsideH)
			{
				marginTop = 0;
				rightIndex.push(divIndex);
			}
			else{
				marginTop = rightsideH - leftsideH;
				leftIndex.push(divIndex);
			}
			
			$(this).css({
				"marginTop" : -marginTop
			});
		}

	});
	*/

	$('.product').each(function(){
		var boxIndex = $(this).index();
		var divIndex = $(this).index() + 1;
		var leftsideH = 0;
		var centersideH = 0;
		var rightsideH = 0;
		var marginTop = 0;
		var oldtopPos = 0;

		$(this).css({
			"top" : 0,
			"left" : 0,
			"position" : "absolute"
		});

		if(divIndex % 3 == 0)
		{
			$(".product:eq("+boxIndex+")").css("margin-right",0);
		}
		
		var topPos = $(".product:eq("+boxIndex+")").offset().top;

		if(divIndex % 3 == 1)
		{
			for(var j = 0; j < leftIndex.length; j++)
			{
				leftsideH += $(".product:eq("+(leftIndex[j])+")").height() + 20;
			}
			var leftSdh = leftsideH + $(this).height();
			if(leftSdh > totalHeight)
			{
				totalHeight = leftSdh;
			}
			leftIndex.push(boxIndex);
			$(this).css({
				"top" : leftsideH,
				"left" : 0
			});
		}

		if(divIndex % 3 == 2)
		{
			for(var k = 0; k < centerIndex.length; k++)
			{
				centersideH += $(".product:eq("+(centerIndex[k])+")").height() + 20;
			}
			var centerSdH = centersideH + $(this).height();
			if(centerSdH > totalHeight)
			{
				totalHeight = centerSdH;
			}
			centerIndex.push(boxIndex);
			$(this).css({
				"top" : centersideH,
				"left" : "345px"
			});
		}

		if(divIndex % 3 == 0)
		{
			for(var l = 0; l < rightIndex.length; l++)
			{
				rightsideH += $(".product:eq("+(rightIndex[l])+")").height() + 20;
			}
			var rightSdH = rightsideH + $(this).height();
			if(rightSdH > totalHeight)
			{
				totalHeight = rightSdH;
			}
			rightIndex.push(boxIndex);
			$(this).css({
				"top" : rightsideH,
				"left" : "688px"
			});
		}


		if(boxIndex >= 3)
		{
			$(this).css({
				"marginTop" : -marginTop
			});
		}

		$(".product_wrapper").height(totalHeight + 20);
	});
	
	// Following button hover effect
	$(".following_button").hover(function(e){
		$(this).val("Unfollow");	
	},function(){
		$(this).val("Following");			
	});
	
	//| Menu selection on scroll.
	//| Media Tab on Product detail page
	if($("#mediaMenu").length > 0){
		scrollInit();	
	}
});

function scrollInit()
{
	$('#mediaMenu li').on('click', function() 
	{
		var scrollAnchor = $(this).attr('data-scroll'),
		
		scrollPoint = $('.mediaBlock[data-anchor="' + scrollAnchor + '"]').offset().top - 50;
		
		$('body,html').animate({
			scrollTop: scrollPoint
		}, 1000);
	
		return false;
	
	});
	
	$(window).scroll(function() {
		var windscroll = $(window).scrollTop();
		var midpoint   = $(window).height()/2;
		
		if (windscroll >= midpoint) {
			$('.mediaBlock').each(function(i) {
				if ($(this).position().top <= windscroll - midpoint) {
					$('#mediaMenu li.active').removeClass('active');
					$('#mediaMenu li').eq(i).addClass('active');
				}
			});
		} else {
			if($('#mediaMenu li.active'))
				$('#mediaMenu li.active').removeClass('active');
		}
	}).scroll();
}

$(window).scroll(function(){
	
	if($("#mediaMenu").length > 0)
	{
		var wtop = Number($(window).scrollTop());
		var pos = Number($(".activityTabs").offset().top + 40);
		var leftPos = 0;
		var wW = $(window).width();
		if(wW > 1024)
		{
			leftPos = Math.floor((wW - 1024)/2);	
		}
			
		if(wtop - pos > 0)
		{
			var mTop = wtop - pos;
			$("#mediaMenu").css({
				"position": "fixed",
				"zIndex"  : 99999999999,
				"top"     : 0,
				"left"    : leftPos,
				"width"   : "735px"
			});
			$(".contentContainer").css("padding-top","72px");
		}
		else{
			$("#mediaMenu").css({
				"position": "relative",
				"left" : 0,
				"width"   : "100%"
			});	
			$(".contentContainer").css("padding-top","0");
		}
	}
});

function showPopover(id,content){
	  content = content.replace(/\\/gi, "");
	 var overPopup = false;
		$("#"+id).popover({
			trigger: 'manual',
			animate: false,
			html: true,
			placement: 'top',
			template: '<div class="tooltip_popover popover" onmouseover="clearTimeout(timeoutObj);$(this).mouseleave(function() {$(this).hide(); });">'+content+'</div>'
		}).mouseover(function (e) {
	        $('.tooltips').not('#' + $(this).attr('id')).popover('hide');
	        var $popover = $(this);
	        $popover.popover('show');
	        $popover.data('popover').tip().mouseenter(function () {
	            overPopup = true;
	        }).mouseleave(function () {
	            overPopup = false;
	            $popover.popover('hide');
	        });
	    }).mouseout(function (e) {
	        var $popover = $(this);
	        setTimeout(function () {
	            if (!overPopup) {
	                $popover.popover('hide');
	            }
	        }, 200);
	    });
	}