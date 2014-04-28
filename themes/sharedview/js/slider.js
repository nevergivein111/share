/* Create an array to hold the different image positions */
var itemPositions = [];
var numberOfItems = $("#scroller .item").length;

/* Assign each array element a CSS class based on its initial position */
function assignPositions() {
	
	numberOfItems = $("#scroller .item").length;
    for (var i = 0; i < numberOfItems; i++) {
        if (i == 0) {
			itemPositions[i] = 'left';
        } else if (i == 1) {
            itemPositions[i] = 'middle';
        } else if (i == 2) {
            itemPositions[i] = 'right';
        } else if (i == 3) {
            itemPositions[i] = 'left-hidden';
        } else {
            itemPositions[i] = 'right-hidden';
        }
    }
    /* Add each class to the corresponding element */
    $('#scroller .item').each(function(index) {
        $(this).addClass(itemPositions[index]);
    });
}

/* To scroll, we shift the array values by one place and reapply the classes to the images */
function scroll(direction) {
    if (direction === 'prev') {
        itemPositions.push(itemPositions.shift());
    } else if (direction === 'next') {
        itemPositions.unshift(itemPositions.pop());
    }
    $('#scroller .item').removeClass('left-hidden left middle right right-hidden').each(function(index) {
        $(this).addClass(itemPositions[index]);
    });        
}

/* Do all this when the DOMs ready */
$(document).ready(function() {
    var autoScroll;
    assignPositions();
	if($('#scroller').length > 0)
	{
         autoScroll = window.setInterval("scroll('next')", 7000);
	}
  
    /* Hover behaviours */
    $('#scroller').hover(function() {
        window.clearInterval(autoScroll);
        $('.navSlider').stop(true, true).fadeIn(200);
    }, function() {
        autoScroll = window.setInterval("scroll('next')", 7000);
        $('.navSlider').stop(true, true).fadeOut(200);
    });

    /* Click behaviours */
    $('.prev').click(function() {
        scroll('prev');
    });
    $('.next').click(function() {
        scroll('next');
    });

});