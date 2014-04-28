<div class="span10 centerArea" >
	<div class="row-fluid">
		<div class="span12">
					<div class="publicProfile">
				<div class="pblProImg">
					<input type="hidden" id="userId" value="<?=$model->id?>"/>
					<?php echo CHtml::image($model->getNormalImage(false));?>
				</div>
				<div class="pblProDetail">
					<div class="profiler">
						<div class="profilerName"><?php echo $model->getDisplayName();?></div>
					</div>
				</div>
			</div>
		    <?php echo $this->renderPartial('_edit_form',array('model'=>$model));?>
		</div>
	</div>
</div>
<?php echo $this->renderPartial('_right_nav');?>


