/**
 * wonde: This function provides event handlers for message list
 */
var ReviewComment = (function() {
  var userIsGuest;
  var getResource = function($elem) {
    var $resource = $elem.closest(".addComment");
    return $resource;
  }

  var handlers = {
    onAddComment: function() {
      if (userIsGuest) {
        return false;
      }
      var $form = $(this).parent();
      var data = $form.serialize();
      var rev_id = $(this).attr('data-id');
      var url = $form.attr('action');
      var list_view = 'comment_list_'+rev_id;
      $.ajax({
        type: "POST",
        dataType:'JSON',
        url:  url,
        data:data
      }).done(function( msg ) {
        if(msg.success){
          $form.find('.input_textarea2').val('');
          $.fn.yiiListView.update(list_view);
        }else{
          $('.comment_error').html(msg.error);
        
          return false;
        }
      });
      
      return false;
    }
  };

  var bindEvents = function() {
    $("#review_list")
    .on("click", ".addComment", handlers.onAddComment)
     
  };

  return {
    init: function() {
      bindEvents();
    }
    
  }
})();

$(function() {
  ReviewComment.init();
});
