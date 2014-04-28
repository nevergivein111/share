
$(document).ready(function(){	

	checkHeight();
	
	$(window).resize(function(){
		checkHeight();
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
	
	
	function checkHeight(){
		var totalHgt = $(".header_wrapper").height() + $(".home_content_wrapper").height(); 
		
		//alert(totalHgt + "-" + $(window).height());
		if(totalHgt < $(window).height()-45)
		{
			$(".footer_wrapper").css({"position":"absolute","bottom" : 0}); 
		}	
		else{
			$(".footer_wrapper").css({"position":"relative","bottom" : ""}); 
		}
	}