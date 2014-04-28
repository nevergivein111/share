<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title"><i class="icol-application2"></i> REVIEW-PRODUCT FORM</span>
		</div>
		<div class="widget-content form-container">

			<?php             $form = $this->beginWidget('GxActiveForm', array(
			'id' => 'review-product-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
				'class' => 'form-horizontal',
			),
		));
			?>
			<?php echo $form->errorSummary($model,null,null,array('class' => 'alert alert-info'));?>
			<div class="compose_field">
				<?php echo $form->labelEx($model, 'product_id', array()); ?>
				<?php echo $form->textField($model, 'product_id', array('class' => '', 'maxlength' => 100, 'onChange'=>'addComponent($(this).val())')); ?>
				<?php $this->widget('ext.select2.ESelect2', array(
				'selector'=>"#ReviewProduct_product_id",
				'options'=>array(
					'width' => '650px',
					'minimumInputLength' => 3,
					'initSelection'      => 'js: function(element, callback) {
									addProductName(element);
                               }',
					'ajax' => array(
						'url' => Yii::app()->controller->createUrl('/product/search'),
						'dataType' => 'json',
						'data' => 'js: function(term,page) {
                        return {
                            q: term,
                        };
                    }',
						'results' => 'js: function(data,page){
                        return {results: data};
                    }',
					),
					//'formatSelection' => "format", // omitted for brevity, see the source of this page
					//'escapeMarkup' => "function (m) { return m; }" // we do not want to escape markup si
				),
			)); ?>
			<?php echo $form->error($model, 'product_id'); ?>
			</div>
			<!-- row -->

			<div class="compose_field">
				<?php echo $form->labelEx($model, 'title', array()); ?>
				<?php echo $form->textField($model, 'title', array('class' => 'compose_txtbox', 'maxlength' => 100)); ?>
				<?php echo $form->error($model, 'title'); ?>
			</div>
			<!-- row -->

			<div id="component_holder" style="width:100%" class="prod_rating">
				<?php $this->renderPartial("shared/_component", array('model' => $model, 'component' => $component,)); ?>
			</div>

			<div class="compose_field">
				<?php echo $form->labelEx($model, 'pros', array('class' => 'pros')); ?>
				<?php echo $form->textArea($model, 'pros', array('class' => 'compose_txtarea', 'cols' => '30', 'rows' => '10', 'placeholder' => 'text box')) ?>
				<?php echo $form->error($model, 'pros'); ?>
			</div>
			<!-- row -->

			<div class="compose_field">
				<?php echo $form->labelEx($model, 'cons', array('class' => 'cons	')); ?>
				<?php echo $form->textArea($model, 'cons', array('class' => 'compose_txtarea', 'cols' => '30', 'rows' => '10', 'placeholder' => 'text box')); ?>
				<?php echo $form->error($model, 'cons'); ?>
			</div>
			<!-- row -->
			<div class="compose_btns">
				<input type="button" value="Preview" class="blue_btn_1">
				<input type="submit" value="Post" class="blue_btn_1">
			</div>
			<?php  $this->endWidget();?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		<?php if($model->product_id):?>
			addComponent('<?php echo $model->product_id ?>');
		<?php endif;?>
	});

	function addComponent(product_id) {
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("reviewProduct/component")?>',
			'type':'post',
			'data':{'id':product_id },
			'success':function (data) {
				if(typeof($('input[name=Component_load]')[0]) == "undefined"){
					$('#component_holder').html(data);
				}
			}
		});
	}

	function addProductName(element)
	{
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("product/getProduct")?>',
			'type':'post',
			'dataType': 'json',
			'data':{'id':element.val() },
			'success':function (data) {
				if(data){
					var text = $("#s2id_ReviewProduct_product_id").children().children()[0];
					$(text).text(data[0].name);
				}
			}
		});

	}

</script>