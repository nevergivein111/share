

<?php if(!empty($top_tranding)){?>
<div id='posts' class="catlist_block">
	<?php foreach($top_tranding as $data):?>
		<?php $this->renderPartial("_view",array('data' => $data))?>
	<?php endforeach;?>
</div>
<?php 
$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller',array(
		  'contentSelector' => '#posts',
		  'itemSelector' => 'div.post',
		  'loadingText' => 'Loading...',
		  'donetext' => 'This is the end... my only friend, the end',
		  'pages' => $model->pages,

));

} else
{
	echo '<div class="post catlist_block productgreyhover white">Sorry, no results found</div>';
}
?>

