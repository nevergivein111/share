<div class="span10 centerArea" style="margin-left:0;">
	<?php             $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'reviewForm',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		"style" => "width: 100%;",
	),
));
	?>
	<?php CHtml::$errorCss = ""; ?>
	<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-info'));?>
	<div id="error_holder_review"></div>
	<div class="reviewField">
		<div class="reviewLabel review_label_new">
			<?php echo $form->labelEx($model, 'product_id', array("class" => "rlabel")); ?>
		</div>
		<div class="reviewInput">
			<?php echo $form->textField($model, 'product_id', array('class' => 'dropdown_select_cr', 'maxlength' => 100, 'onChange' => 'addComponent($(this).val())')); ?>
			<?php $this->widget('ext.select2.ESelect2', array(
			'selector' => "#ReviewProduct_product_id",
					  'htmlOptions'=>array(
						'disabled'=>true
					  ),
			'options' => array(
				'width' => '610px',
				'minimumInputLength' => 3,
				'initSelection' => 'js: function(element, callback) {
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
				
			),
		)); ?>
		</div>
	</div>
	
	<div id="component_holder" style="width:100%" class="prod_rating">
		<?php $this->renderPartial("shared/_update_component", array('model' => $model, 'component' => $component)); ?>
	</div>

	<?php echo $this->renderPartial("shared/_text", array("form"=>$form, "model"=>$model));?>

	<div class="reviewField" style="border-bottom:0;">
		<div class="reviewLabel"></div>
		<div class="reviewInput" style="width:618px;">
			<?php if (Yii::app()->user->id): ?>
			<input type="submit" value="Post" class="btnBackground btnPreview">
            <input type="button" value="Cancel" class="btnBackground btnPreview">
			<?php $this->endWidget(); ?>
			<?php else: ?>
			<?php $this->endWidget(); ?>
			<input type="button" value="Sign up and Post" class="btnBackground btnPreview" style="margin-right:10px;" onclick="validateReview()">
            <input type="button" value="Cancel" class="btnBackground btnPreview">
			<?php $this->renderPartial("shared/register_popup", array("user" => $user, 'login' => $login,)) ?>
			<?php endif;?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		updateComponent('<?php  echo $model->id ?>');
		$('input[data-target="#register_model_holder"]').click(function() {
			return true;
		});
		$(".profileSummaryModal").css("top","5%");
	});

	

		function updateComponent(review_id) {		
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("reviewProduct/updateComponent")?>',
			'type':'post',
			'data':{'id':review_id},
			'success':function (data) {
					$('#component_holder').html(data);
					setTimeout("setBorder()",1000);
			}
		});
	}

	function addProductName(element) {
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("product/getProduct")?>',
			'type':'post',
			'dataType':'json',
			'data':{'id':element.val() },
			'success':function (data) {
				if (data) {
					var text = $("#s2id_ReviewProduct_product_id").children().children()[0];
					$(text).text(data[0].name);
				}
			}
		});
	}

	function validateReview(){
		var serializedForm = $("#reviewForm").serializeObject();
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("reviewProduct/validate")?>',
			'type':'post',
			'dataType':'json',
			'data':serializedForm,
			'success':function (data) {
				if(data.status){
					$("#error_holder_review").html('');
					$('#register_model_holder').modal('show');
				}else{
					var li = '';
					$.each(data.errors, function(index, value) {

						li = li.concat("<li>"+value+"</li>");
					});
					var error = '<div class="alert alert-info"><p>Please fix the following input errors:</p><ul>'+li+'</ul></div>';
					$("#error_holder_review").html(error);
				}
			}
		});
	}

</script>

