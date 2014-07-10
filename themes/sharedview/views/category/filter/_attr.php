<?php
$key = 0;
$filter_attr = $filter->getAttr();
if (isset($filter_attr)) {
	foreach ($filter_attr->filterValues as $filterValue): ?>
	<?php if(count($filterValue->getList($filter->inputs))):?>
                    <h4><?php echo $filterValue->name; ?></h4>
                    <div class="filterBox" data-type="<?php echo $filterValue->name; ?>">
                        <?php foreach ($filterValue->getList($filter->inputs) as $attr): ?>
                                    <?php
                                    $product_count = $attr->getCount($filter, $filterValue);
                                    $name = $attr->getCountName($filter, $product_count);
                                    if ($product_count > 0):?>
                                        <div class="filter <?php echo ($key > 4) ? 'filter_none' : null?>">
                                            <span>
                                                <label>
                                                    <?php echo $form->checkBox($filter, "inputs[" . $filterValue->unique->name . "][$attr->value]", array(
                                                            'class' => 'customCheckbox checkbox_product_page styledCheckbox',
                                                            'data-type' => $filterValue->unique->name,
                                                            'data-value' => "$attr->value",
                                                    )); ?>
                                                    <p class="filter_our checkbox_product_page styledCheckbox"><?php echo $name; ?></p>
                                                </label>
                                            </span>
                                        </div>
                                        <?php $key++; ?>
                                    <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($key > 4): ?>
                        <div class="filter_see_all" data-type="<?php echo $filterValue->name; ?>">See all...</div>
                        <?php endif;?>
                        <?php $key = 0;?>
                   
                         </div>
        <?php endif;?>
    <?php endforeach;
} ?>
