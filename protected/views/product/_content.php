<div class="bread_crumb">
		<?php $this->widget('application.components.widgets.myBreadCrumb.MyBreadCrumb',array(
				  'data'=>$model->getBreadcrumb(),
				  'ampersand'=>'->'
		));?>
	</div>
	
	<div class="middle_section product_list_main prod_details_wrapper">

		<div class="search_product_wrapper">
			<div class="search_product_info">
				<div class="search_prod_thumb">
					<?php echo CHtml::image($model->getThumbImage(false));?>
				</div>
			</div>
			<div class="search_prod_details">
				<div class="search_prod_name">
					<?php echo $model->name;?>
				</div>
				<div class="search_prod_star">
					<a href="#">
						<img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/star_review.png" alt="">
					</a>
				</div>
				<div class="search_prod_review">
					<a href="#">Review it</a>
				</div>
			</div>
		</div>

		<div class="product_details_wrapper">

			<div class="product_details_left">
				<div class="prod_features">
					<span>Battery Life</span>
					<div><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/5star.png" alt=""></div>
				</div>
				<div class="prod_features">
					<span>Display</span>
					<div><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/4star.png" alt=""></div>
				</div>
				<div class="prod_features">
					<span>Performance</span>
					<div><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/3star.png" alt=""></div>
				</div>
				<div class="prod_features">
					<span>Weight</span>
					<div><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/2star.png" alt=""></div>
				</div>
				<div class="prod_features">
					<span>Value</span>
					<div><img src="<?php echo Yii::app()->baseUrl;?>/images/frontend/1star.png" alt=""></div>
				</div>
			</div>

			<div class="product_details_right">
				<div class="prod_other_info">
					<span>Brand</span>
					<div><?php echo $model->brand->name;?></div>
				</div>
				<?php foreach($model->productAttributes as $attr):?>
				<div class="prod_other_info">
					<span><?php echo $attr->key;?></span>
					<div><?php echo $attr->value;?></div>
				</div>
				<?php endforeach;?>

			</div>

		</div>

	</div>

	<div class="total_review_wrapper">
		<a href="#">60 Reviews</a>
	</div>

	<div class="prod_tab_view_wrapper">


		<div class="prod_tab_title_wrapper">
			<div class="prod_tab_title">
				<div class="see_title">See:</div>
				<a href="#" class="tab_title_acive">Full Reviews</a>
				<a href="#">Pros Only</a>
				<a href="#">Cons Only</a>
			</div>
			<div class="sort_by_wrapper">
				<select class="styled_select">
					<option value="Sort By" selected>Sort By</option>
					<option value="Most Helpful">Most Helpful</option>
					<option value="Top Rated">Top Rated</option>
					<option value="Most Reviews">Recently Added</option>
				</select>
			</div>
		</div>

		<div class="prod_tab_content">


		</div>

	</div>