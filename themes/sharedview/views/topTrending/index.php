<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
    //$clientscript->registerCssFile($baseurl . '/css/carousel.css');
    //$cs=Yii::app()->clientScript;
    //$cs->scriptMap=array(
    //    'style.css'=>false,
    //);
    //$clientscript->registerCssFile($baseurl . '/css/style_home1.css');
    $clientscript->registerScriptFile($baseurl . '/js/jquery.mousewheel.min.js',CClientScript::POS_END);

?>

    <?php $this->renderPartial('_slider');?>

<div class="mainContainer">
    <div class="leftContainer" style="width:664px;">
        <div class="product_list_middle" style="width:100%;">
			<?php if(Yii::app()->user->id):?>

            <div class="product_list_main whilteBg" style="width:100%;border:1px solid #CCC;">
                <div class="product_list_title titleCls">
                    <h3>People You are Following</h3>
                </div>

                <div class="seprateLine1"></div>
				<?php
				$results = $topTrending->getResult();
				if (count($results['review']) < 1): ?>
                    <br/>
                    <div class="alert" style="height:30px">
                        <div class="pull-left" style="padding-top:5px;margin-right:10px;"><h4> You haven't started following anyone yet. </h4></div>
                        <a href="#">
                            <button type="button" class="btn btn-primary pull-right">Followers<sup>+</sup></button>
                        </a>
                    </div>
                <?php else:
				$count = 0;
				foreach ($results['review'] as $key => $reviewProduct) {
                    $this->renderPartial("_people_you_are_following_list", array(
                            'headerText' => $results['headerText'][$key],
                            'review' => $reviewProduct,
                            'user' => $reviewProduct->user,
                            'create_date' => $reviewProduct->create_date,
                            'key' => $key,
							'count' => $count
                        )
                    );
					$count++;
                }
				?>
					<div class="seeMore"><a onclick="showMoreFeeds()">See More</a></div>
				<?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="product_list_main whilteBg" style="padding-top:0;width:100%;border:1px solid #CCC;">
                <div class="product_cate_wrapper product_list_wrapper">
                    <div class="product_list_title titleCls">
                        <h3>Trending Now</h3>
                    </div>
                    <input type="hidden" id="sort_by_attr" value="<?php echo Yii::app()->session['sort_by'];?>"/>
                    <input type="hidden" id="filter_cat_id" value='<?php echo Yii::app()->session['cat_id'];?>'/>
    <!--                  <div class="sort_dropdown">
                          <div class="dropdown custom_dropdown">
                              <a id="ddSortby" role="button" data-toggle="dropdown" data-target="#" href="/page.html">Sort By <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" id="sorting_by" role="menu" aria-labelledby="ddSortby" style="left:-65px;min-width:140px;">
                                   <?php // foreach($model->getSortBy() as $key => $sort):?>
                                        <li class="dropdown_sort_by_holder <?php // echo ($key == Yii::app()->session['sort_by']) ? 'checked_filter_active' : ''?>" data-value="<?php // echo $key?>" >
                                             <a href="#"><?php // echo $sort?></a>
                                        </li>
                                   <?php // endforeach;?>
                              </ul>
                          </div>
                    </div>
-->
                </div>
                <div class="catlist_wrapper">
                    <?php $categories = Category::model()->showCategory()->published()->orderByOrdering()->findAll();?>
                    <?php $cl = 'class="selected"';?>

                    <div class="category_list">

                        <ul id="category_right_panel">
                            <li  <?php echo (Yii::app()->session['cat_id'] == 0)?$cl:'';?> data-value="0">
                                <div class="category_img">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ic_all.png" alt="All" style="margin:8px 0 0 0;height:32px;" />
                                </div>
                                <div class="catName">
                                    <span class="catBtitle">All</span>
                                    <span class="reviewCnts">1000 Reviewed</span>
                                </div>
                                <div class="activeDiv"></div>
                            </li>
                        <?php foreach($categories as $category):?>
                                <li <?php echo (Yii::app()->session['cat_id'] == $category->id)?$cl:'';?> data-value="<?php echo $category->id;?>">
                                        <div class="category_img">
                                                <img src="<?php echo $category->getThumbImage(false);?>" alt="<?php echo $category->name;?>" />
                                        </div>
                                        <div class="catName">
                                            <span class="catBtitle"><?php echo $category->name;?></span>
                                            <span class="reviewCnts">1000 Reviewed</span>
                                        </div>
                                        <div class="activeDiv"></div>
                                </li>
                        <?php endforeach;?>

                        </ul>
 						<?php echo CHtml::image(Yii::app()->createUrl('images/preload.gif'),'',array('style' => 'display:none','id' => 'loader_image'))?>
                    </div>


                    <?php $this->renderPartial('_list',array('top_tranding' => $model->topTrending(),'model'=>$model,'route'=>'index'));?>

                </div>
            </div>
        </div>
    </div>
    <?php //$this->renderPartial('_right');?>
</div>

<script type="text/javascript">
	var current_cat_id = 0;
	$(function () {
		$('.search_product_wrapper').live('click',function(){
			var url = $(this).attr('data-url');
			window.location.href=url;
		})
		$('.dropdown_sort_by_holder').click(function () {
			var val = $(this).attr('data-value')
			$('#sorting_by li').removeClass('checked_filter_active');
			$(this).addClass('checked_filter_active');
			var ex_s_b = $('#sort_by_attr').val();
			var cat_id = $('#filter_cat_id').val();
			if(ex_s_b == val){
				return false;
			}
			searchTopTranding(cat_id, val);
		});

		$('#category_right_panel li').live('click',function () {

			$('#category_right_panel li').removeAttr('class');
			$(this).attr('class','selected');
			current_cat_id = $(this).attr('data-value');
			var now_selected_id = $('#filter_cat_id').val();
			$('#filter_cat_id').val($(this).attr('data-value'));
			var sort_by = $('#sort_by_attr').val();
			if(now_selected_id != current_cat_id){
			searchTopTranding(current_cat_id, sort_by);
			}else{
				return false;
			}
		});
	});
	function searchTopTranding(cat_id, sort_by){

		$('#loader_image').show();
		//$('#product_holders').html('');
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('topTrending/list')?>',
			type:'POST',
			dataType:'html',
			data:{'cat_id':cat_id, 'sort_by':sort_by},
			success:function (response) {
				window.location.reload();
				return false;
			}
		});
	}
	
	function showMoreFeeds(){
		$('.people_you_are_following_row:lt(<?php echo TopTrending::PEOPLE_YOU_ARE_FOLLOWING_FEEDS_COUNT; ?>)').show();
		$('.people_you_are_following_row:lt(<?php echo TopTrending::PEOPLE_YOU_ARE_FOLLOWING_FEEDS_COUNT; ?>)').removeClass('people_you_are_following_row');
		if($('.people_you_are_following_row').length == 0) {
			$('.seeMore').html('No more feeds');
		}
	}
</script>