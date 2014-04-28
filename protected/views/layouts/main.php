<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/style.css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/fonts.css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/login.css" media="all">

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/style_our.css" media="all">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php echo $content; ?>

<?php //$this->widget('application.modules.hybridauth.widgets.renderProviders'); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/frontend/html5.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/frontend/html5shiv.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/frontend/html5shiv-printshiv.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/frontend/script.js"></script>
</body>
</html>
