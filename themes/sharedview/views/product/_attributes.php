<div class="specification">
	
	<table class="table table-striped specTable" width="100%">
		<thead>
			<tr>
				<th style="width:40%;">Specs:</th>
				<th style="width:60%;">Details:</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><strong>Brand</strong></td>
				<td><?php echo $model->brand->name;?></td>
			</tr>
			<?php foreach($model->productAttributes as $attr):?>
			<tr>
				<td><strong><?php echo $attr->key;?></strong></td>
				<td><?php echo $attr->value;?></td>
			</tr>
	<?php endforeach;?>
		</tbody>
	</table>
</div>

