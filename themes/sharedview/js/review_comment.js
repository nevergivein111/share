$(document).ready(function () {
	$('#review_list .activityRow:first-child').css('display', 'block');
	$('.comment_toggle').live('click', function () {
		
		var id = $(this).attr('data-id');
		$(this).next('span.comment_umbersand').remove();
		$(this).remove();
		
		//$('.comment_toggle').remove();
		//$('.comment_umbersand').remove();
		var list_view = 'comment_list_' + id;
		$.fn.yiiListView.update(list_view,
			{
				data:'count=0'
			}
		);
	});

	$('.delete_review').live('click', function () {
        var url = $(this).attr('data-url');

        var list_view = $(this).attr('data-list');
		if (confirm('Are you to delete review?')) {
          	$.ajax({
				type:"POST",
				dataType:'JSON',
				url:url

			}).done(function (msg) {
					if (msg.success) {
						$.fn.yiiListView.update(list_view);
					} else {
						alert('Some error:');
					}
					return false;
				});
			return true;
		}
		return false;
	})

	$('.add_helpful_to_review').live('click', function () {
		saveHelpful($(this));
	})
	deleteComment();
	editComment();
});

$(function () {
	var review_ids = new Array();
	$('.cmttxtarea').live("keydown", KeyPress);
	$('.edit_textarea').live("keydown", UpdateComment);
	review_ids.push("3")
});

function KeyPress(e) {
	var evtobj = window.event ? event : e;
	if ($(this).hasClass('isGuest')) {
		return false;
	}
	if ((evtobj.keyCode == 13 || evtobj.keyCode == 16) && evtobj.ctrlKey) {
		addEnter($(this));
		return;
	}

	if (evtobj.keyCode == 13) {
		saveComment($(this));
		return;
	}
}

function UpdateComment(e) {
	var evtobj = window.event ? event : e;
	if ($(this).hasClass('isGuest')) {
		return false;
	}
	if ((evtobj.keyCode == 13 || evtobj.keyCode == 16) && evtobj.ctrlKey) {
		addEnter($(this));
		return;
	}

	if (evtobj.keyCode == 13) {
		upComment($(this));
		return;
	}
}
function saveComment(element) {
  $('.comment_error').hide();

	var $form = element.parent();
	var data = $form.serialize();
	var rev_id = element.attr('data-id');
	var url = $form.attr('action');
	var list_view = 'comment_list_' + rev_id;
	$.ajax({
		type:"POST",
		dataType:'JSON',
		url:url,
		data:data
	}).done(function (msg) {
			if (msg.success) {
				window.location.reload();
			} else {
				$('.comment_error').html(msg.error);
                $('.comment_error').show();
				return false;
			}
		});

	return false;
}
function upComment(element) {
	var url = '/reviewComment/update';
	var id = element.attr('data-id');
	$.ajax({
		type:"POST",
		dataType:'JSON',
		url:url,
		data:{id:id, comment:element.val()}
	}).done(function (msg) {
			if (msg.success) {
				window.location.reload();
			} else {
				alert('Error');
				return false;
			}
		});
}
function addEnter(element) {
	var s = element.val();
	element.val(s + "\n");
}

function deleteComment() {
	$('.delete_comment').live('click', function () {
		if (confirm("Are you sure to delete this comment?")) {
			var comment_id = $(this).attr('data-id');
			var list_view = $(this).parent().parent().parent().parent().parent().parent().attr('id');
			var url = '/reviewComment/delete';
			$.ajax({
				type:"POST",
				dataType:'JSON',
				url:url,
				data:{
					id:comment_id
				}
			}).done(function (msg) {
					if (msg.success) {
						$.fn.yiiListView.update(list_view);
					} else {
						alert('Some error:');
					}
					return false;
				});

		} else {
			return false;
		}
	})
//  setBorder();
}

function editComment() {
	$('.edit_comment').live('click', function () {
		var comment_id = $(this).attr('data-id');
		var $user_cmt = $(this).parent().parent();
		var text = $user_cmt.find('.hidden_text').html();
		console.log(text);
		var text_area = '<textarea name="ReviewComment[comment]" placeholder="Write new comment" class="edit_textarea" data-id="' + comment_id + '">' + text + '</textarea>';
		$user_cmt.html(text_area);
	})
}

function saveHelpful(element) {
	var url = element.attr('data-url');
	var data = {'review_id':element.attr('data-id')};
	$.ajax({
		type:"POST",
		dataType:'JSON',
		url:url,
		data:data
	}).done(function (data) {
			window.location.reload();
		});

}



