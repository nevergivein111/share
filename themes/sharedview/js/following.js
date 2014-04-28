$(document).ready(function(){
  $('.following_button').live('mouseover',function(){
    $(this).removeClass('btn-info');
    $(this).addClass('btn-danger');
    $(this).find('span').html('Unfollow');
  });

  $('.following_button').live('mouseout',function(){
    $(this).addClass('btn-info');
    $(this).removeClass('btn-danger');
    $(this).find('span').html('Following');
  });

  $('.following_button').live('click',function(){
    var profile_owner = $('#profile_owner').val();
    var id=$(this).attr('data-id');
    var elem = $(this);
    $.ajax({
      url: "../follow/delete",
      data:{
        id:id
      },
      type:'POST',
      dataType:'JSON',
      beforeSend: function() {
      }
    }).done(function( data ) {
      if(data.status == 'success'){
        elem.attr('data-id',data.id);
	    elem.removeClass('following_button btnUnFlw');
	    elem.addClass('btnFlw follow_button');
        elem.val('Follow');
	    elem.off('hover');

	    // No need to update both
        $.fn.yiiListView.update('followings_list_view');
//      $.fn.yiiListView.update('followers_list_view');

        if(profile_owner == 1){
          var c = $('#following_users_count').html();
          $('#following_users_count').html((c-1));
        }else if(profile_owner == 2){
          var c = $('#follower_users_count').html();
          $('#follower_users_count').html((c-1));
        }
        return false;
      }
    });
  });

  $('.follow_button').live('click',function(){
    var follower_id = $(this).parent().find('.follower_user_id').val();
    var following_id=$(this).parent().find('.following_user_id').val();
    var profile_owner = $('#profile_owner').val();
    var elem = $(this);
    $.ajax({
      url: "../follow/createAjax",
      data:{
        follower_id:follower_id,
        following_id:following_id
      },
      type:'POST',
      dataType:'JSON',
      beforeSend: function() {
      }
    }).done(function( data ) {
      if(data.success){
        elem.attr('data-id',data.id);
        elem.removeClass('follow_button btnFlw');
        elem.addClass('btnUnFlw following_button');
	    elem.val('Following');
	    elem.hover(function(e){
		    $(this).val("Unfollow");
	    },function(){
		    $(this).val("Following");
	    });

	    // no need to update bith
	    $.fn.yiiListView.update('followings_list_view');
//      $.fn.yiiListView.update('followers_list_view');

	    if(profile_owner == 1){
          var c = $('#following_users_count').html();
          $('#following_users_count').html((parseInt(c)+1));
        }
        else if(profile_owner == 2){
          var c = $('#follower_users_count').html();
          $('#follower_users_count').html((parseInt(c)+1));
        }
      }else{
        return false;
      }
    });
    return false;
  })
});


