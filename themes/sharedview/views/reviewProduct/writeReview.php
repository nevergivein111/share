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



