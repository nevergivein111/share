<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo CHtml::encode($this->pageTitle);?></title>

		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/frontend/home.css" media="all">
		<link href="<?php echo Yii::app()->baseUrl;?>/css/fonts/fonts.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/frontend/jquery.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/frontend/home_script.js"></script>

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
		<?php echo $this->renderPartial('//layouts/_header_home');?>

		<div class="home_content_wrapper">
			<?php  echo $content; ?>
		</div>
	
		<!--<div class="footer_wrapper">&nbsp;</div>-->
	</body>
</html>