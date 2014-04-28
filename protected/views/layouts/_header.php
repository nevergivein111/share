<div class="row-fluid header headerPattern navbar-fixed-top">
	<div class="container fixContainer">
		<div class="row-fluid">
			<div class="span8">
				<div class="row-fluid">
					<div class="span4">
						<a href="<?php echo Yii::app()->createUrl('site/');?>">
							<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/logo.png','',array('alt' => ''));?>
						</a>
					</div>
					<div class="span1" style="margin-left:0%;">
						<a href="#">
							<div class="new_search_btn">
								<div class="new_search_number">
									<div class="arrow_box">10</div>
								</div>
							</div>
						</a>
					</div>
					<div class="span7" style="margin-left:1%;width:60%;">
						<form action="#" name="header_search" method="post">
							<div class="header_search">
								<input type="text" name="header_search" id="header_search" class="header_search_input" placeholder="Search Products" >
								<input type="button" value="" class="header_search_btn" >
							</div>
						</form>
						<?php $this->widget('application.components.widgets.topMenu.TopMenu');?>

					</div>
				</div>
			</div>
			<?php $this->widget('application.components.widgets.userinfo.UserInfo');?>
		</div>
	</div>
</div>