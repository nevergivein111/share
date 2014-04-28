<div class="titleLbl">
	You've Selected
</div>
 <div class="selectedProd">
        <?php foreach ($filter->getFiltered() as $key => $value): ?>
                <?php echo $value; ?>		
	<?php endforeach; ?> 
        <a href="#" id="clear_form_button">Clear All Selections</a>
</div>



<!--
<div class="brand_wrapper" data-type="brand">
	<?php // foreach ($filter->getFiltered() as $key => $value): ?>
		<div class="filter">
			<span>
				<label style="font-size: 10px;">
					<?php // echo $value; ?>
				</label>
			</span>
		</div>
	<?php // endforeach; ?>
</div>
<?php // if(count($filter->getFiltered())>0) :?>
<div class="hSeprator"></div>-->
<?php // endif;?>