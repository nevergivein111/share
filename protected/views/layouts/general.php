<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo CHtml::encode($this->pageTitle);?></title>

		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/frontend/style.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/frontend/selectbox.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/js/plugin/css/jquery.rating.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/fonts/fonts.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/frontend/style_our.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/frontend/register_popup.css" media="all">


		<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/html5.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/html5shiv.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/html5shiv-printshiv.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/custom_checkbox.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/jquery.selectbox-0.2.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugin/js/jquery.rating.js"></script>

		<!--[if gte IE 9]>
		  <style type="text/css">
			.gradient {filter: none;}
		  </style>
		<![endif]-->
		<!--[if lte IE 8]>
		   <script src="js/html5.js"></script>
	   <![endif]-->
	</head>

	<body>
		<?php echo $this->renderPartial('//layouts/_header');?>
		<div class="main_content">
			<div class="wrapper">
				<div class="page_content">
					<?php echo $content;?>
					<div class="page_footer">&nbsp;</div>
				</div>
			</div>
		</div>
		
			<?php
			if(Yii::app()->user->isGuest){
			$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
					  'id' => 'guest-popup',
					  // additional javascript options for the dialog plugin
					  'options' => array(
								'title' => 'Register',
								'autoOpen' => false,
								'width'=>'550px',
								'modal'=>true,
								'resizable'=>false,
								
					  ),
			));

			$this->widget('application.components.widgets.signup.Signup', array());

			$this->endWidget('zii.widgets.jui.CJuiDialog');
			}
			?>
			<?php // $this->widget('application.components.widgets.guestPopup.GuestPopup',array());?>

		<script src="<?php echo Yii::app()->request->baseUrl;?>/js/frontend/script.js"></script>
	</body>
</html>
