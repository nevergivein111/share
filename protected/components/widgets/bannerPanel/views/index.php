<?php foreach($banners as $banner):?>
<div class="advertisement_wrapper" align="center">
	<?php echo CHtml::link(CHtml::image($banner['src']),$banner['link']);?>

</div>
<?php endforeach;;?>

