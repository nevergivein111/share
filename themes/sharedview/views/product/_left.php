

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

	                    <p class="pro_price"><?php echo $storeProduct->price;?></p>
	                </div>
	                	<a href = "<?php echo  $storeProduct->url;?>" target="_blank">
							<input type="button" value="Shop now" class="btnShopnow" />
						</a>
	                
	            </div>
            <?php endforeach;?>         
            
            
        </div>
    </div>




      <div class="banner">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/athletic_shoes.jpg" alt="Atheltic Shoes" />
    </div>
</div>