<div class="titleLbl">
	You've Selected
</div>
 <div class="selectedProd">
        <?php foreach ($filter->getFiltered() as $key => $value): ?>
                <?php echo $value; ?>		
	<?php endforeach; ?> 
        <a href="#" id="clear_form_button">Clear All Selections</a>
</div>
