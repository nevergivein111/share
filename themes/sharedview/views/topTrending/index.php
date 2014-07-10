<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
  
    $clientscript->registerScriptFile($baseurl . '/js/jquery.mousewheel.min.js',CClientScript::POS_END);

?>
</div>
<div class="sliderbg">
<div class="wrapper">
    <?php $this->renderPartial('_slider');?>
</div>
    </div>
    
    <div class="menumainbg mainslider">
    		</div>
<div class="wrapper">
<div class="mainContainer">
    <div class="leftContainer">
        <div class="product_list_middle" >
			<?php if(Yii::app()->user->id):?>

           <div class="product_list_main" style="padding-top:0;">
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

             <div class="product_list_main" style="padding-top:0;">
                <div class="product_cate_wrapper product_list_wrapper">
                    <div class="product_list_title titleCls">
                        <h3>Trending Now</h3>
                    </div>
                    <input type="hidden" id="sort_by_attr" value="<?php echo Yii::app()->session['sort_by'];?>"/>
                    <input type="hidden" id="filter_cat_id" value='<?php echo Yii::app()->session['cat_id'];?>'/>
    
                </div>
                <div class="catlist_wrapper">
                    <?php $categories = Category::model()->showCategory()->published()->orderByOrdering()->findAll();?>
                    <?php $cl = 'class="selected"';?>

                    <div class="category_list">

                        <ul id="category_right_panel">
                            <li  <?php echo (Yii::app()->session['cat_id'] == 0)?$cl:'';?> data-value="0">
                                <div class="category_img">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/alhoverl.png" alt="All" />
                                   <!-- <img src="<?php //echo Yii::app()->theme->baseUrl;?>/images/alhoverl.png" alt="All" />-->
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