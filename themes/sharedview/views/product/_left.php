<?php //$store = $model->storeProductInfos;?>
<?php //if(!empty($store)):?>
<!--<h4 class="rightBox_title">Find Store</h4>
<div class="brand_wrapper">-->

<?php //foreach($store as $info):?>
<!--<div class="productStore">
		<div class="prod_img">
			<a href="<?php //echo $info->url;?>" target="_blank">
			<img src="<?php //echo $info->store->getThumbImage(false);?>" alt="<?php //echo $info->store->name;?>" />
			</a>
		</div>
		<div class="pro_desc">
			<a href="<?php //echo $info->url;?>" target="_blank"><?php //echo $info->store->name;?></a>
			<p class="pro_price"><a href="<?php //echo $info->url;?>" target="_blank"><?php //echo $info->price;?></a></p>
		</div>
	<a href="<?php //echo $info->url;?>" class="btnFollow btnShopnow" target="_blank">Shop now</a>
		<input type="button" value="Shop now" class="btnFollow btnShopnow" />
	</div>
<?php //endforeach;?>

</div>
<div class="hSeprator"></div>
<?php //endif;?>	

<div class="rightBanner">
	<img src="<?php //echo Yii::app()->theme->baseUrl;?>/images/athletic_shoes.jpg" alt="Atheltic Shoes" />
</div>-->



<div class="rightsideBar">
      
    <div class="rightBlock topMarginN">

        <div class="rightblockTitle">Find All</div>
        <div class="brand_wrapper">  
        	<?php foreach ($model->storeProductInfos as $storeProduct):?>
        		<div class="productStore">
	                <div class="prod_img">
	                    <img src="<?php echo $storeProduct->store->getOrigImage();?>" alt="<?php echo $storeProduct->store->name;?>" style="max-width: 90px; max-height: 30px;"/>
	                </div>
	                <div class="pro_desc">
<!--	                    <a href="http://www.<?php /*echo strtolower(str_replace(' ', '', $storeProduct->store->name));*/?>.com" target="_blank"><?php /*echo $storeProduct->store->name;*/?></a>-->
	                    <p class="pro_price"><?php echo $storeProduct->price;?></p>
	                </div>
	                	<a href = "<?php echo  $storeProduct->url;?>" target="_blank">
							<input type="button" value="Shop now" class="btnShopnow" />
						</a>
	                
	            </div>
            <?php endforeach;?>         
            
            
        </div>
    </div>

    <div class="rightBlock">
        <div class="rightblockTitle">Compare To</div>
        <div class="brand_wrapper">                
            <div class="productStore">
                <div class="product_img">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb2.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        HP EliteBook 8540w 15.6"<br>1920x1080 Core i7 2.6GHz
                </div>
            </div>
            <div class="productStore">
                <div class="product_img">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb2.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        Apple MacBook Pro A1278<br>13.3" Laptop - MC374LL/A 
                </div>
            </div>
            <div class="productStore">
                <div class="product_img">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb2.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        HP 6530b Core 2 Duo T9600<br>2.8GHz 2GB 160GB
                </div>
            </div>
        </div>
    </div>

    <div class="rightBlock">
        <div class="rightblockTitle">People Also Viewed</div>
        <div class="brand_wrapper">                
            <div class="productStore">
                <div class="product_img">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb1.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        Alienware M18x 18.4" Laptop<br>Space Black Core i7
                </div>
            </div>
            <div class="productStore">
                <div class="product_img">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb1.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        Dell Inspiron 17R N7010<br>laptop Intel Core i5 2.4GHz
                </div>
            </div>
            <div class="productStore">
                <div class="product_img">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pro_thumb1.jpg" alt="" />
                </div>
                <div class="product_Detail">
                        IBM Lenovo Thinkpad<br>Notebook T60 ThinkPad T60
                </div>
            </div>
        </div>
    </div>
      <div class="banner">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/athletic_shoes.jpg" alt="Atheltic Shoes" />
    </div>
</div>