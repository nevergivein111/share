<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
    $clientscript->registerCssFile($baseurl . '/css/carousel.css');
    //$cs=Yii::app()->clientScript;
    //$cs->scriptMap=array(
    //    'style.css'=>false,
    //);
    $clientscript->registerCssFile($baseurl . '/css/style_home1.css');
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
                <div class="staticPost">
                    <div class="userImg">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic7.jpg" alt="Dilon J" />
                    </div>
                    <div class="activityDetail" style="width:88%;">
                        <div class="postDuration">2 hours ago</div>
                        <div class="activityTxt">
                            <div class="socialTitle">
                                <div>
                                    <span class="hglightName">Donny J.</span> added 2 new items to his collection
                                </div>
                                <?php // echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 4));?>
                                <div class="collectionType">My Gadgets | Personal electronic devices</div>
                            </div>
                        </div>
                        
                        <div class="wishListItem">
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/col1.jpg" alt="Samsung Galaxy" />
                                </div>
                                <div class="socialPtxt">
                                    Samsung Galaxy S Ill with 18GB Mobile<br>Phone - Marble White (Sprint)
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/col2.jpg" alt="iPad Mini" />
                                </div>
                                <div class="socialPtxt">
                                    Apple - iPad mini Wi-Fi + Cellular<br>(AT&T) - 16GB - Black & Slate
                                </div>
                            </div>
                        </div>
                        <a href="http://shareview.brians.com/profile/38/tab/4" class="rtLink">Full Collection</a>
                    </div>
                
                </div>                            
                <div class="seprateLine1"></div>
                <div class="staticPost">
                    <div class="userImg">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic7.jpg" alt="Dilon J" />
                    </div>
                    <div class="activityDetail" style="width:88%;">
                        <div class="postDuration">2 hours ago</div>
                        <div class="activityTxt">
                            <div class="socialTitle">
                                <div><span class="hglightName">Donny J.</span> added the Apple - MacBook Pro with Retina Display - 15.4" Display - 8GB Memory - 256GB Flash Storage to his wish list </div>
                                <?php // echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 2));?>
                            </div>
                        </div>
                        
                        <div class="wishListItem">
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wlImg2.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Beats By Dr Dre - Wireless Bluetooth On-Ear Headphones - White
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wlImg3.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Amazon - Kindle Fire HD 7 inch Tablet with 16 GB Memory (2nd Generation)...
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wl4.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Samsung - 39" Class (38-518Diag) - LED - 108Op - 60Hz - HDW
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wl6.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Canon - EOS 5D Mark Ill Digital SLR Camera with 24-105mm fi4L IS Lens
                                </div>
                            </div>
                        </div>
                        <a href="http://shareview.brians.com/profile/38/tab/2" class="rtLink">Full Wish List</a>
                    </div>
                </div>
                <div class="seprateLine1"></div>
                <div class="staticPost">
                    <div class="userImg">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic7.jpg" alt="Dilon J" />
                    </div>
                    <div class="activityDetail" style="width:88%;">
                        <div class="postDuration">2 hours ago</div>
                        <div class="activityTxt">
                            <div class="socialTitle">
                                <div><span class="hglightName">Donny J.</span> created a new collection</div>
                                <?php // echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 4));?>
                                <div class="collectionType">My Gadgets | Personal electronic devices</div>
                            </div>
                        </div>
                        
                        <div class="wishListItem">
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/dell_inspiron.jpg" alt="Dell Inspiron" />
                                </div>
                                <div class="socialPtxt">
                                    Dell - Inspiron I 5.6 Touch-Screen Laptop - 6GB Memory - 500 GB...
                                </div>
                            </div>
                        </div>
                        <a href="http://shareview.brians.com/profile/38/tab/4" class="rtLink">Full Collection</a>
                    </div>  
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