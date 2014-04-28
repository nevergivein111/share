var mouse_is_inside = false;

$(document).ready(function(){	
  $('.isGuest').on('click',function(){
    $("#guest-popup").dialog("open");
    return false;
  });
	header_fix();
	
//	if($(".styled_select").length > 0) {
//		$('.styled_select').selectbox();
//	}
	
	
	// Setting popup open
	$(".user_setting_btn").click(function(){
		$('.setting_popup').toggle();
	});	
	
	$('.setting_popup').hover(function(){ 
		mouse_is_inside=true; 
	}, function(){ 
		mouse_is_inside=false; 
	});
	
	$("body").mouseup(function(){ 
		if(! mouse_is_inside){
			$('.setting_popup').hide();
		}
	});
	
});

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
	
	
	//| this script is for Header fix 
	
	// grab the initial top offset of the navigation 
	var header_fix_offset_top = $('#header_fix').offset().top;
	
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var header_fix = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > header_fix_offset_top) { 
			$('#header_fix').css({ 'position': 'fixed', 'top':0, 'left':0, 'z-index':11111  });
		} else {
			$('#header_fix').css({ 'position': 'relative' }); 
		}   
	};
	
	$(window).scroll(function() {
		 header_fix();
	});


	//| this script is for custom checkbox

	$(function(){
		if($('input:checkbox').length > 0)
		{
			$('input:checkbox').screwDefaultButtons({
				image: 'url("/images/frontend/checkboxSmall.png")',
				width: 14,
				height: 14
			});
		}
	});