<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
    $cs=Yii::app()->clientScript;
?>
<script>
$(document).ready(function(){
	if($('.customCheckbox').length > 0)
	{
		$('.customCheckbox').screwDefaultButtons({
			image: 'url("<?php echo $baseurl; ?>/images/checkboxSmall.png")',
			width: 14,
			height: 14
		});
	}
});	
</script>

<div class="advertise">
    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/advertise1.jpg" alt="Advertise" />
    
</div>
<div class="breadcrumbs">
    <?php
    $this->widget('application.components.widgets.myBreadCrumb.MyBreadCrumb', array(
            'data' => $model->getBreadcrumb(),
            'ampersand' => '->'
    ));
    ?>
</div>



<div class="mainContainer">

    <div class="righttabContainer" style="margin:0 0 10px 0;">
        <div class="activityTabs">
            <div id="tabs" style="width:100%;">
                <ul>
                    <li><a href="#tabs-1">Listings</a></li>
                    <li><a href="#tabs-4">Buying Guide</a></li>
                    <li><a href="#tabs-5">Help Me Decide</a></li>
                </ul>
                <div id="tabs-1" class="tabContainer" data-filter="yes" style="padding:0.5em 0;border:1px solid #CCC;background:#FFF !important;">
                	<div class="lefttabContainer" style="border-right:1px solid #ccc;">
						<div class="product_list"> 
				        <?php $this->renderPartial('_category_filter', array('filter' => $filter));?>
						</div>
				    </div> 

                    <div id="posts" class="maintabContainer" style="border:0;">
                    <h1></h1>
					<?php if (count($dataProvider) != 0):?>	
                    <div class="sort_dropdown" style="top:10px;right:10px;width:98%;text-align:right;">
                            <div class="dropdown custom_dropdown">
                            		<div class="middleLine"></div>
                                    <a id="ddSortby" class="ddText" role="button" data-toggle="dropdown" data-target="#" href="/page.html">Sort
                                            By <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" id="top_sort_ul" role="menu" aria-labelledby="ddSortby" style="min-width:140px;right:4px;left:auto;top:20px;">
                                            <?php
                                            foreach (Product::getProductListSortBy() as $key => $val):?>
                                                    <li class="dropdown_product_holder <?php echo ($key == Product::MOST_POPULAR) ? 'checked_filter_active' : ''?>"
                                                            data-value="<?php echo $key?>" data-name="<?php echo $val;?>">
                                                            <a href="javascript:void(0);">
                                                                    <?php echo $val;?>
                                                            </a>
                                                    </li>
                                                    <?php endforeach;?>
                                    </ul>
                            </div>
                    </div>
                    <?php echo CHtml::image(Yii::app()->createUrl('images/preload.gif'),'', array('style' => 'display:none', 'id' => 'loader_image')) ?>

					<?php $first_product = 1 ?>
                    <?php foreach ($dataProvider as $data): ?>
                            <?php $this->renderPartial("_product_view", array('data' => $data,'first_product' => $first_product)) ?>
							<?php $first_product++ ?>
                    <?php endforeach; ?>

					
                    <?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
                            'contentSelector' => '#posts',
                            'itemSelector' => 'div.posting',
                            'loadingText' => 'Loading...',
                            'donetext' => 'This is the end... my only friend, the end',
                            'pages' => $product->pages,
                    )); ?>
                    <?php else:?>
                    	<div class="notResult"> <h5>Sorry, no results found</h5></div>
                    <?php endif;?>
                    </div>
                </div>
                <div id="tabs-4" class="tabContainer" data-filter="no">
                    Not have any content right now
                </div>
                <div id="tabs-5" class="tabContainer" data-filter="no">
                    Not have any content right now
                </div>
            </div>
        </div>   
    </div>
	
	<div class="rightTabsidebar" style="display:none;" >
      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/google_advertise.png" alt="Google" />
    </div>
	
</div>

<script>
	var filter = new Object();
	var see_all = [];
	filter.category_id = '<?php echo $model->id;?>';
	$(document).ready(function () {

		$('#clear_form_button').live('click', function () {
			window.location.reload();
		});

		$('.dropdown_product_holder').live('click', function () {
			$('#Filter_sort_by').val($(this).attr("data-value"));
			$("#filter-form").submit();
		});

	});

	function seeAll() {
		$.each(see_all, function (index, value) {
			$(".filter_see_all[data-type='" + value + "']").click();
		});
	}

</script>

<?php if (!is_null($tab)): ?>
	<?php Yii::app()->clientScript->registerScript('tab', "

		$('#tabs').tabs('select', '" . $tab . "');

	"); ?>
<?php endif; ?>
