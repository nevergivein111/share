<?php
$category_id = 0;
if(isset($_GET['ajax']) && $_GET['ajax']='review_list_view' &&  isset($_GET['category_id'])){
	$category_id = $_GET['category_id'];

}
if(isset($_GET['ajax']) && $_GET['ajax']='review_list_view' && isset($_GET['filter_id'])){
	$sort_by  = $_GET['filter_id'];
}else{
	$sort_by = Product::RECENTLY_ADDED;
}
$rawData    = $model->getReviews($category_id,$sort_by);
$categories = Category::getCats($rawData);
?>
<h4 style="padding-left:10px;margin:5px 0 0;">Dillon's Reviews</h4>
<div class="filterProduct">
	<?php
	$k = 0;
	?>
	<input type="hidden" id="catgory_filter_id" value="0"/>
	<input type="hidden" id="filter_filter_id" value="<?php echo Product::RECENTLY_ADDED; ?>"/>
	<span style="color:#2f3535;"> Filter By : &#9658</span> 
    <a href="#" class="active" style="color:#0088CC;">Category</a> 
	
    <div class="sort_dropdown" style="top:10px;right:10px;width:98%;text-align:right;">
        <div class="dropdown custom_dropdown">
        	<div class="middleLine"></div>
            <a id="ddSortby" role="button" class="ddText" data-toggle="dropdown" data-target="#" href="/page.html">Sort By <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddSortby" style="min-width:140px;right:4px;left:auto;top:20px;">
                <?php foreach(Product::getSortReviewProfile() as $key => $val):?>
                    <li class="dropdown_review_holder <?php echo ($key == Product::RECENTLY_ADDED) ? 'checked_filter_active' : ''?>" data-value="<?php echo $key?>">
                        <a href="javascript:void(0);">
                            <?php echo $val;?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<div class="lineSeprator"></div>
<?php
$dataProvider = new CArrayDataProvider($rawData,array(
			'pagination' => array(
					  'pageSize' => count($rawData),
			),
  ));
$this->widget('zii.widgets.CListView',array(
		  'dataProvider' => $dataProvider,
		  'id' => 'review_list_view',
		  'template' => '{items}',
		  'emptyText' => '',
		  'viewData' => array('user' => $user),
		  'itemView' => 'review/_review',
));

?>
<script>
$(document).ready(function(){
	$('.category_filter_ing').live('click',function(){
		$('.category_filter_ing').removeClass('active');
		$(this).addClass('active');
		$('#catgory_filter_id').val($(this).attr('data-value'));
		var data = {category_id:$('#catgory_filter_id').val(), filter_id:$('#filter_filter_id').val()};
		$.fn.yiiListView.update('review_list_view',{data:data});
		return false;
	});
	$('.dropdown_review_holder').live('click',function(){
		$('.dropdown_review_holder').removeClass('checked_filter_active');
		$(this).addClass('checked_filter_active');
		$('#filter_filter_id').val($(this).attr('data-value'));
		var data = {category_id:$('#catgory_filter_id').val(), filter_id:$('#filter_filter_id').val()};
		$.fn.yiiListView.update('review_list_view',{data:data});
		$('.dropdown').removeClass('open');
		return false;
	});
})
</script>
