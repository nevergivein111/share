<?php
/**
 * @var $model User
 */

$baseurl = Yii::app()->theme->baseUrl;
$clientscript = Yii::app()->clientScript;
//$clientscript->registerCssFile($baseurl . '/css/reset.css');
//$clientscript->registerCssFile($baseurl . '/css/style.css');
?>

<div class="social-tools" id="social-tools">
    <a href="javascript:void(0);" title="Facebook Like" class="social-tools-facebook-like"></a>
    <a href="javascript:void(0);" title="Facebook Share" class="social-tools-facebook-share"></a>
    <a href="javascript:void(0)" title="Twitter" class="social-tools-twitter"></a>
    <a href="javascript:void(0)" title="Pinterest" class="social-tools-pinterest"></a>
    <a href="javascript:void(0)" title="Google+" class="social-tools-googleplus"></a>
    <a href="javascript:void(0)" title="StumbleUpon" class="social-tools-stumbleupon"></a>
    <a href="javascript:void(0)" title="Forums" class="social-tools-comments"></a>
    
</div>


<div class="advertise">
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/advertise1.jpg" alt="Advertise"/>
    <?php // echo CHtml::image(Yii::app()->createUrl('themes/sharedview/images/advertise1.jpg')) ; ?>
</div>


<div class="mainContainer">
    <div class="leftsideBar" style="width:300px;">
        <?php $this->renderPartial('_left_box', array('model' => $model, 'user' => $user)); ?>
    </div>
    <div class="rightContainer" style="width:714px;margin:0 0 0 10px;">
        <div class="activityTabs profileTab">
            <div id="tabs" style="width:100%;">
                <ul>
                    <li><a href="#tabs-5">Reviews<!--<span class="tab-no"><?php // echo count($model->reviewProducts); ?></span>--></a></li>
                    <li><a href="#tabs-6">Following <span class="tab-no"><?php // echo count($model->follows); ?></span></a></li>
                    <li><a href="#tabs-7">Followers <span class="tab-no"><?php // echo count($model->follows1); ?></span></a></li>
                </ul>
                
                <div id="tabs-5">
                    <?php $this->renderPartial('reviews', array('user' => $user, 'model' => $model)) ?>
                </div>
                <div id="tabs-6">
                    <?php

                    //$rawData = $model->getFollowing();
                    $rawData = $model->follows;

                    $dataProvider = new CArrayDataProvider($rawData, array(
                        'pagination' => array(
                            'pageSize' => count($rawData),
                        ),
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'id' => 'followings_list_view',
                        'template' => '{items}',
                        'emptyText' => '',
                        'viewData' => array('user' => $user),
                        'itemView' => '_following',
                    ));

                    ?>
                </div>
                <div id="tabs-7">
                    <?php

                    //$rawData = $user->getFollowers();
                    $rawData = $model->follows1;
                    $dataProvider = new CArrayDataProvider($rawData, array(
                        'pagination' => array(
                            'pageSize' => count($rawData),
                        ),
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'id' => 'followers_list_view',
                        'template' => '{items}',
                        'emptyText' => '',
                        'viewData' => array('user' => $user),
                        'itemView' => '_follower',
                    ));

                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.filter_category').live('click', function () {
            var category_id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('profile/updateReviewList');?>",
                dataType: 'html',
                type: 'POST',
                data: {userId: $('#userId').val(), category_id: category_id},
                beforeSend: function () {
                    $('#loader_image').show();
                }
            }).done(function (data) {
                    $('#posts').html(data);
                    $('#loader_image').hide();
                });
            $('#posts').html(data);
            $('#loader_image').hide();
        });

        $('.sort_by_attrs').live('click', function () {
            var sort_by = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('profile/sortReviewList');?>",
                dataType: 'html',
                type: 'POST',
                data: {userId: $('#userId').val(), sortBy: sort_by},
                beforeSend: function () {
                    $('#loader_image').show();
                }
            }).done(function (data) {
                    $('#posts').html(data);
                    $('#loader_image').hide();
                });
            $('#posts').html(data);
            $('#loader_image').hide();
        });

    });


    function redirectComment(obj) {

        $('a[href=#tabs-1]').click();
        var data = obj.attr('data-id');
        var elem = $('.activityRow[data-review=' + data + ']');
        $('html, body').animate({
            scrollTop: elem.offset().top
        }, 2000);
        return false;
    }
</script>

<script>
    $(document).ready(function () {
        deleteCommentFrom();
		var tab = '<?php echo Yii::app()->request->getQuery('tab')?>';
		if(tab != '') {
			$("#tabs").tabs('select', tab);
			if(tab == 4) {
				showFullGadgetsList();
			}
		}
    });
	
    function deleteCommentFrom() {
        $('.delete_comment_from_comment').live('click', function () {
            if (confirm("Are you sure to delete this comment?")) {
                var comment_id = $(this).attr('data-id');
                var list_view = 'comments_list_view';
                var review_id = $(this).attr('data-review');
                var url = '/reviewComment/delete';
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: url,
                    data: {
                        id: comment_id
                    }
                }).done(function (msg) {
                        if (msg.success) {
                            $.fn.yiiListView.update(list_view);
                            $.fn.yiiListView.update('comment_list_' + review_id);
                        } else {
                            alert('Some error:');
                        }
                        return false;
                    });

            } else {
                return false;
            }
        });
    }
	
	function showFullWhishList()
	{
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/wishList')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
	
	function showFullGadgetsList()
	{
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/myGadgets')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
	
	function backLists(){
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/backLists')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
</script>
