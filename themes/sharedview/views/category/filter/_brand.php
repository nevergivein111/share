<?php if (count($filter->getBrandBasedOnCategory()) != 0) : ?>
<h4>Brand</h4>

<div class="filterBox" data-type="brand">
    <?php foreach ($filter->getBrandBasedOnCategory() as $key => $brand): ?>
    <div class="filter <?php echo ($key > 4) ? 'filter_none' : null?>">
            <span>
                    <label>
                            <?php echo $form->checkBox($filter, "inputs[brand][$brand->id]", array(
                            'class' => 'customCheckbox checkbox_product_page styledCheckbox',
                            'data-type' => 'brand',
                            'data-value' => $brand->id,
                            'disabled' => $filter->checkForDisabled($brand->id))); ?>
                            <p class="filter_our checkbox_product_page styledCheckbox;"><?php echo $filter->getCountName($filter, $brand); ?></p>
                    </label>
            </span>
    </div>
    <?php endforeach; ?>
<!--    <div class="filter filter_active">
        <span>
            <label>
                <input type="checkbox" checked class="customCheckbox">
                <p>Apple</p>
            </label>
        </span>
    </div>-->
    <?php if ($key > 4): ?>
            <div class="filter_see_all" data-type="brand">See all...</div>
    <?php endif; ?>
 </div>
<?php endif; ?>




<?php // if (count($filter->getBrandBasedOnCategory()) != 0) : ?>
<!--<div class="brand_wrapper" data-type="brand">
	<h4>Brand</h4>
	<?php // foreach ($filter->getBrandBasedOnCategory() as $key => $brand): ?>
		<div class="filter <?php // echo ($key > 4) ? 'filter_none' : null?>">
			<span>
				<label>
					<?php
//                                        echo $form->checkBox($filter, "inputs[brand][$brand->id]", array(
//					'class' => 'checkbox_product_page',
//					'data-type' => 'brand',
//					'data-value' => $brand->id,
//					'disabled' => $filter->checkForDisabled($brand->id))); 
                                        ?>
					<p class="filter_our"><?php // echo $filter->getCountName($filter, $brand); ?></p>
				</label>
			</span>
		</div>
		<?php // endforeach; ?>
	<?php // if ($key > 4): ?>
		<div class="filter_see_all" data-type="brand">See all...</div>
	<?php // endif; ?>
</div>-->
<?php // endif; ?>