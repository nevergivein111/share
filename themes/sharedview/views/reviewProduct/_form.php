<div class="leftContainer">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
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
    <div class="composePage">
        <div class="product_list_main whilteBg">
            <div class="reviewField">
                <div class="reviewLabel review_label_new">
					<?php echo $form->labelEx($model, 'product_id', array("class" => "rlabel")); ?>
                </div>
                <div class="reviewInput">
					<?php echo $form->hiddenField($model, 'product_id')?>
					<?php echo CHtml::textField('product', isset($_GET['id']) ? $model->product->name : '', array(
						'class' => 'product_search',
						'data-provide' => "typeahead",
						'maxlength' => 100,
						'autocomplete' => 'off',
						'style' => 'background:#FFF !important; box-shadow:none;'
						)); 
					?>
                </div>
                
            </div>
            <?php  if(!isset($_GET['product_id']) && !isset($_GET['id'])):?>
            <?php if (count($model->getErrors('product_id'))==1 || !$model->hasErrors() ):?>
			<div class ="reviewField Def">
				<div class="reviewLabel review_label_new"></div>
				<div class="reviewInput" style="margin-top: 15px;">
					<div class="productReviewmain" style="background-color: #f5f5f1">
						<div class="pro_sum_Img">
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/camera_icon.png"/>
						</div>
						<div class="pro_conf" style="width: 320px;">
							<div class="pro_conf_rate" style="font-weight: bold;">
								Product Name
							</div>
							<div class="clear"></div>
							<div class="pro_conf_rate">
								<div class="rateDisplay">
									<div class="disableRate"></div>
									<div class="avarageRate"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class ="reviewField Def">
            	
            	 <div class="reviewLabel review_label_new">
                      <label class="rlabel"> Component ratings</label>
                </div>
                <div class="reviewInput" style="margin-top: 15px;">
					<span style="float: left">
                		<div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
					</span>
					<span style="float: left">
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
                         <div class="reviewBlock">
                       		<div class="reviewLabel"></div>
	                        <div class="reviewInput">
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                            <div  class="star-rating rater-0 med hover-star star-rating-applied star-rating-live">
	                            	<a></a>
	                            </div>
	                        </div>
                         </div>
					</span>
                </div>
                
            </div>
            <?php endif;?>
			<?php endif;?>
            <div id="component_holder" style="width:100%" class="prod_rating">
                    <?php $this->renderPartial("shared/_component", array('model' => $model, 'component' => $component)); ?>
            </div>

                 
            <?php echo $this->renderPartial("shared/_text", array("form"=>$form, "model"=>$model));?>

            <div class="reviewField" style="border-bottom:0;">
                <div class="reviewLabel"></div>
                <div class="reviewInput" style="float:right;">
                        <?php if (Yii::app()->user->id): ?>

						<input type="submit" value="Post" class="btnBg postBtn">
                        <input type="button" value="Cancel" class="btnBg postBtn" onclick="window.history.back();">
                        

                        <?php $this->endWidget(); ?>
                        <?php else: ?>
                        <?php $this->endWidget(); ?>            
                        <input type="button" value="Cancel" class="btnBackground btnPreview" style="margin-right:10px;" onclick="window.history.back();">
                        <input type="button" value="Sign up and Post" class="btnBackground btnPreview"  onclick="validateReview()">
                        
                        <?php $this->renderPartial("shared/register_popup", array("user" => $user, 'login' => $login,)) ?>
                        <?php endif;?>
                </div>
            </div>    
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo Yii::app()->createUrl('product/searchProducts');?>";
		var term = encodeURI($(this).val());
	
		var query = $(this).val();

		$('.product_search').typeahead({
			minLength: 3,
			items:8,
			source: function (query, process) {
				$('#ReviewProduct_product_id').val('');
				return $.get(url, { query: query }, function (data) {
					var newData = data.map(function (item) {
						if(item.pid != 0){
							var aItem = { pid: item.pid, name: item.name, photo:item.photo, link:item.link };
							return JSON.stringify(aItem);
						}
					});
					return process(newData);
					
				},"json");
			},
			matcher: function (item) {
				return true;
			},

			highlighter: function(obj) {
				var item = JSON.parse(obj);
				var text = '<div class="search_img_typehead"><img src="'+item.photo+'"/></div><div class="search_name_type">'+item.name+'</div>';
				return text;
			},
					
			updater: function (obj) { // What gets sent to the input box
				var item = JSON.parse(obj);
				$('#ReviewProduct_product_id').val(item.pid);
				addComponent(item.pid);
				return item.name;
			}

		});
	});
	
	$(function () {
		<?php if ($model->product_id): ?>
			addComponent('<?php echo $model->product_id ?>');
			addProductName($('#<?php echo CHtml::activeId($model, 'product_id') ?>'));
		<?php endif;?>

		$('input[data-target="#register_model_holder"]').click(function() {

			return true;
		});
		$(".profileSummaryModal").css("top","5%");
	});

	function addComponent(product_id) {
		$('#component_holder').html('');
		$.ajax({
			'url':'<?php echo Yii::app()->createUrl("reviewProduct/component")?>',
			'type':'post',
			'dataType':'JSON',
			'data':{'id':product_id },
			'success':function (data) {
				$(".Def").remove();
				$("#singleShow").addClass("hide");
				$("#right_rating").removeClass("hide").addClass("show");
				$('#ReviewProduct_id').val(data.id);
				$('#component_holder').html(data.comp);
				tinyMCE.activeEditor.setContent(data.text);
			}
		});
	}

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
					$('.product_search').val(data[0].name);
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

