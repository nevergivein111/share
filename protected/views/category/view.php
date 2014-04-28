<?php
Yii::app()->clientScript->registerScript('view','
			$(document).ready(function(){
				$(".styled_select").selectbox({
				onChange:function(){
				
					}
				});
			});
				');
?>
<div class="left_nav">
	<?php $this->widget('application.components.widgets.categoryFilter.CategoryFilter');?>
    <div class="copyright_wrapper">
		<?php $this->widget('application.components.widgets.copyrightPanel.CopyrightPanel');?>
	</div>

</div>

<div class="product_list_middle">
	<div class="bread_crumb">
		<?php $this->widget('application.components.widgets.myBreadCrumb.MyBreadCrumb',array(
				  'data'=>$model->getBreadcrumb(),
				  'ampersand'=>'->'
		));?>
	</div>

	<div class="middle_section product_list_main">
		<div class="product_cate_wrapper product_list_wrapper">
			<div class="product_list_title">
				<h3>
					<?php echo CHtml::encode($model->name);?> by Top Rated
				</h3>
			</div>
			<div class="sort_dropdown">
				<select class="styled_select">
					<option value="1" selected>Top Rated</option>
					<option value="2">Price (Lowest to Highest)</option>
					<option value="3">Most Reviews</option>
					<option value="4">Recently Added</option>
				</select>
			</div>
		</div>
         <?php
		
			$this->widget('zii.widgets.CListView',array(
					  'dataProvider' => $dataProvider,
					  'itemView' => '_product_view',
					  'template' => '{items}{pager}',
			));
			?>
	</div>

</div>

<div class="right_nav prod_list_right_nav">
<?php
$banners = array(
		  '0'=>array('src'=>Yii::app()->baseUrl.'/images/frontend/advertisement_2.jpg','link'=>'#'),
		  '1'=>array('src'=>Yii::app()->baseUrl.'/images/frontend/advertisement_1.png','link'=>'#'),
		  '2'=>array('src'=>Yii::app()->baseUrl.'/images/frontend/advertisement_3.jpg','link'=>'#')
);
$this->widget('application.components.widgets.bannerPanel.BannerPanel',array('banners'=>$banners));
?>
</div>