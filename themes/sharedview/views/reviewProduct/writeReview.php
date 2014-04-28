<div class="mainContainer">
	<div class="leftContainer">
		 <div id="error_holder_review"></div>
	    <div class="composePage">
	        <div class="product_list_main whilteBg">
				<form name="reviewForm" id="reviewForm" action="" method="post">
                    <div class="reviewField">
                        <div class="reviewLabel review_label_new">
                            <label class="rlabel">Search</label>
                        </div>
                        <div class="reviewInput">
							<?php echo CHtml::textField('product', isset($_GET['id']) ? $model->product->name : '', array(
								'class' => 'product_search',
								'data-provide' => "typeahead",
								'maxlength' => 100,
								'autocomplete' => 'off',
								'style' => 'background:#FFF !important; box-shadow:none;'
								)); 
							?>
                        </div>
                    </div>
                    <div class="reviewField">
                        <div class="reviewBk">
                            <div class="reviewHead">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/starone.png" alt="" />
                                <span>Component Ratings</span>
                            </div>
                            <div class="reviewBkTxt">
                                Decide how a product checks out by scoring its important attributes.
                            </div>
                        </div>
                        <div class="reviewBk">
                            <div class="reviewHead">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ic_review.png" alt="" />
                                <span>Review Text</span>
                            </div>
                            <div class="reviewBkTxt">
                                Give support for rating selections, and share your full experience of a product.
                            </div>
                        </div>
                        <div class="reviewBk">
                            <div class="reviewHead">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/spellCheck.png" alt="" />
                                <span>Guidelines</span>
                            </div>
                            <div class="reviewBkTxt">
                                Remember to be relevant and appropriate.See <a href="#">Review Guidelines</a> for complete term and conditions.
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
    <div class="rightsideBar">
    	<div class="rightBlock" style="margin-top:0;padding-top:0;">
            <div class="review_tips">
                <h3 style="margin:0 0 0 3px;">Bookmarked to Review</h3>
                <div class="seprateLine1" style="margin-top:-5px;"></div>
                <div class="bkBlock">
                    <div class="bkImg">	
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb1.jpg" alt="" width="32" />
                    </div>
                    <div class="bkTxt">
                        <a href="#">HP - Probook 14"  Laptop - 4GB - 500GB Hard Drive</a>
                    </div>
                </div>
            </div>
        </div>
        
		<div class="banner">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/brightspot.jpg" alt="Brightspot" />
		</div>

		<?php /*?>
		<div class="rightBlock">
		   <div class="review_tips" id="singleShow">
					<h3>Review Tips</h3>
				<h4>Express yourself</h4>
				<p>Stand out with a unique perspective, and capture the attention of others by writing with style and conciseness.
				</p>

				<h4>Give it some thought</h4>
				<p>Use the component ratings to help explain your likes and dislikes. Also, apply personal experiences to give your review context and originality.
				</p>

				<h4>Have Fun</h4>
				<p>Let your thoughts flow freely, and remember that no opinion is wrong. If you have a change  of heart after publishing your review, though, It can always be edited or removed anytime later.
				</p>

			</div>  

			<div class="hide" id="right_rating">
				<div class="rightblockTitle brdbt mrb5">Reviews for Acer Chromebook</div>
				<div class="reviewSlot">
					<div class="rProImg">
						<img alt="" src="/themes/sharedview/images/profile_pic1.jpg">
					</div>
					<div class="rInfo">
						<div class="rSummary">
							<span class="hglightName">Renuka S.</span>
						</div>

					</div>
					<div class="clear"></div>	
					<div class="prodRates mt10">
						<div class="prodVal fl mr5">5.0</div>
						<div class="prodRating fl">
							<div class="star_m_5 star_m">
								<div data-rating="5" data-size="small" class="star_m_5 star_m" style="width: 53px;"></div>
							</div>
						</div>
					</div>
					<div class="rDetail">
						You guys. My husband has been a vegetarian for 14 years. but when he saw and ... 
					</div>
				</div>
				<div  class="clear"></div>
				<div class="brdbt mb10 mt10"></div>
				<div class="reviewSlot">
					<div class="rProImg">
						<img alt="" src="/themes/sharedview/images/profile_pic1.jpg">
					</div>
					<div class="rInfo">
						<div class="rSummary">
							<span class="hglightName">Renuka S.</span>
						</div>

					</div>
					<div class="clear"></div>	
					<div class="prodRates mt10">
						<div class="prodVal fl mr5">3.5</div>
						<div class="prodRating fl">
							<div class="star_m_0 star_m">
								<div data-rating="3.5" data-size="small" class="star_m_4 star_m" style="width: 53px;"></div>
							</div>
						</div>
					</div>
					<div class="rDetail">
						You guys. My husband has been a vegetarian for 14 years. but when he saw and ... 
					</div>
				</div>
				<div  class="clear"></div>
				<div class="brdbt mb10 mt10"></div>
				<div style="font-size:12px; " class="mt10">
					it can always be edited or removed any time
				</div>
			</div>
		</div>
		<?php */?>
    </div>
</div>
<script>
	$(document).ready(function(){
		var url = "<?php echo Yii::app()->createUrl('product/searchProducts');?>";
		var term = encodeURI($(this).val());
	
		var query = $(this).val();

		$('.product_search').typeahead({
			minLength: 3,
			items:8,
			source: function (query, process) {
				return $.get(url, { query: query }, function (data) {
					var newData = data.map(function (item) {
						var aItem = { pid: item.pid, name: item.name, photo:item.photo, link:item.link };
						return JSON.stringify(aItem);
					});
                
					return process(newData);
					
				},"json");
			},
			matcher: function (item) {
				return true;
			},

			highlighter: function(obj) {
				var item = JSON.parse(obj);
				if(item.pid != 0){
					var text = '<div class="search_img_typehead"><img src="'+item.photo+'"/></div><div class="search_name_type">'+item.name+'</div>';
				}else{
					var text = item.name;
				}
				return text;
			},
			updater: function (obj) {
				var item = JSON.parse(obj);
				window.location.href='<?php echo Yii::app()->createUrl('reviewProduct/create', array('product_id' => ''))?>'+item.pid;
			}

		});
	});
</script>



