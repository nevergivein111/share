<?php
$baseurl = Yii::app()->theme->baseUrl;
$clientscript = Yii::app()->clientScript;
$clientscript->registerCssFile($baseurl . '/css/style.css');
?>

<!--
<div class="advertise">
	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/advertise.jpg" alt="Advertise" />
</div>
-->

<div class="staticBox">
    <div class="dealRow" style="margin-left:80px;">
        <h4>Top Rated Laptop</h4>
        <div class="dealImg">
            <img alt="Apple MacBook Air" src="<?php echo Yii::app()->theme->baseUrl;?>/images/product_2.png" style="margin-top:9px;">
        </div>
        <div class="dealInfo">
              <div class="itemTitle"> Apple - Mac Book Air&reg;. 13.3 DspIay .4... </div>
              <div class="actRate" style="margin:4px 0 17px 0;">
                    <div class="rating">4.0</div>
                    <div class="star_b_4 star_b"></div>
                    <div class="rating_details">
                        <a style="padding:5px 0 0 5px;float:left;" href="#" class="reviewDetails">1,000 Reviews</a>
                    </div>
              </div>
              <a href="http://shareview.brians.com/category/electronics/laptops" class="allDetail">All Listings</a>
          </div>
    </div>

    <div class="dealRow">
        <h4>Feature laptop Deal</h4>
        <div class="dealImg">
            <img alt="Apple MacBook Air" src="<?php echo Yii::app()->theme->baseUrl;?>/images/Asus.jpg"><br>
            <span>$150 OFF</span> 
        </div>
        <div class="dealInfo">
              <div class="itemTitle">  Asus - 11.6" Laptop - 4GB Memory ...  </div>
              <div class="dealPrice">
                    SALE PRICE <span class="discountPrice">$899.99</span> <span class="realPrice"> WAS $999.99 </span>
              </div>
              <div class="dealDuration">
                  <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/amazon_Logo.jpg"> <span> GOOD THRU 12/12/2014
              </span></div>
              <a href="<?php echo $this->createUrl('/category/electronics/laptops?tab=tabs-2') ?>" class="allDetail">All deals</a>
          </div>
    </div>
</div>  
                       
<div class="mainContainer">
    <div class="product_wrapper" style="width:100%;position:relative;padding-bottom:10px;">
		<?php

		$this->widget('zii.widgets.CListView',array(
				  'dataProvider' => $dataProvider,
				  'id' => 'category_list',
				  'template' => '{items}',
				  'itemsCssClass' => 'product_wrapper',
				  'itemView' => '_view',
		));

		?>

	</div>
	<?php // $this->renderPartial('_right_bar_listing'); ?>	
</div>