<div class="left_nav">
	<div class="activity_wrapper">
		<?php
		$this->widget('application.components.widgets.myActivityPanel.MyActivityPanel', array(
				  'menu_title'=>'My Activity',
				  'data' =>array(
							array('label'=>'All',    'link'=>'#','active_controller'=>'','active_action'=>''),
							array('label'=>'Reviews',  'link'=>'#','active_controller'=>'','active_action'=>''),
							array('label'=>'Comments','link'=>'#','active_controller'=>'','active_action'=>''),
							array('label'=>'Found Helpful','link'=>'#','active_controller'=>'','active_action'=>''),
					),
			
				  ));
		?>
		
	</div>
	<div class="following_wrapper">
		<?php
		$this->widget('application.components.widgets.followPanel.FollowPanel');
		?>
	</div>

    <div class="copyright_wrapper">
		<?php
		$this->widget('application.components.widgets.copyrightPanel.CopyrightPanel');
		?>

	</div>
</div>
<div class="middle_section">
	<!--<div class="product_cate_wrapper">-->
   <?php
	$this->widget('zii.widgets.CListView',array(
			  'dataProvider' => $dataProvider,
			  'id'=>'category_list',
			  'template'=>'{items}',
			  'itemsCssClass'=>'product_cate_wrapper',
			  'itemView' => '_view',

	));
	?>

</div>
<div class="right_nav">
	<div class="suggested_wrapper">
		<div class="activity_title">
			<a href="#">Suggested</a>
		</div>

		<div class="suggested_item">
			<div class="suggested_item_img" align="center">
				<a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/macbook_air_thumb.png" alt=""></a>
			</div>
			<div class="suggested_item_info">
				<div class="suggested_item_name">
					<a href="#">MacBook Air</a>
				</div>
				<div class="star_wrapper">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
				</div>
				<div class="suggested_item_review">
					<a href="#">3379 reviews</a>
				</div>
			</div>
		</div>

		<div class="suggested_item">
			<div class="suggested_item_img" align="center">
				<a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/iphone_5_thumb.png" alt=""></a>
			</div>
			<div class="suggested_item_info">
				<div class="suggested_item_name">
					<a href="#">iPhone 5</a>
				</div>
				<div class="star_wrapper">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
				</div>
				<div class="suggested_item_review">
					<a href="#">3379 reviews</a>
				</div>
			</div>
		</div>

		<div class="suggested_item">
			<div class="suggested_item_img" align="center">
				<a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/ipad_2_thumb.png" alt=""></a>
			</div>
			<div class="suggested_item_info">
				<div class="suggested_item_name">
					<a href="#">iPad 2</a>
				</div>
				<div class="star_wrapper">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
				</div>
				<div class="suggested_item_review">
					<a href="#">3379 reviews</a>
				</div>
			</div>
		</div>

		<div class="suggested_item">
			<div class="suggested_item_img" align="center">
				<a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/iphone_4s_thumb.png" alt=""></a>
			</div>
			<div class="suggested_item_info">
				<div class="suggested_item_name">
					<a href="#">iPhone 4S</a>
				</div>
				<div class="star_wrapper">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
				</div>
				<div class="suggested_item_review">
					<a href="#">3379 reviews</a>
				</div>
			</div>
		</div>

		<div class="suggested_item">
			<div class="suggested_item_img" align="center">
				<a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/ipad_thumb.png" alt=""></a>
			</div>
			<div class="suggested_item_info">
				<div class="suggested_item_name">
					<a href="#">iPad</a>
				</div>
				<div class="star_wrapper">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
				</div>
				<div class="suggested_item_review">
					<a href="#">3379 reviews</a>
				</div>
			</div>
		</div>

	</div>
	<div class="view_all_wrapper">
		<a href="#">View All</a>
	</div>

<?php
$banners = array(
		  '0'=>array('src'=>Yii::app()->baseUrl.'/images/frontend/advertisement_1.png','link'=>'#')
);
$this->widget('application.components.widgets.bannerPanel.BannerPanel',array('banners'=>$banners));
?>
</div>


