<style>
	.mceToolbar {
		background-color: white !important; /* bgcolor for head (include title) */
		border-top: 0 !important;
	}
	.mceIframeContainer {
		border:1px solid #CCC !important;
	}
	.cirkuitSkin table.mceLayout {
		border: 0 !important;
	}
	.mceStatusbar {
		border-left: 1px solid #CCC !important;
		border-right: 1px solid #CCC !important;
		border-top: 0 !important;
	}
</style>

<div class="reviewField">
	<div class="reviewLabel review_label_new">
		<?php echo $form->labelEx($model, 'text', array("class" => "rlabel")); ?>
	</div>
	<div class="reviewInput">
		<?php
		$this->widget('ext.tinymce.TinyMce', array(
			'model' => $model,
			'attribute' => 'text',
			'language' => 'en',
			// Optional config
			'compressorRoute' => 'tinyMce/compressor',
			'spellcheckerRoute' => 'http://speller.yandex.net/services/tinyspell',

			'htmlOptions' => array(
				'rows' => 4,
				'cols' => 50,
				'class' => 'compose_txtbox'
			),
		));?>
	</div>
	<?php //echo $form->error($model, 'text'); ?>
</div>

