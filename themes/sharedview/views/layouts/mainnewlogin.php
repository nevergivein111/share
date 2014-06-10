<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" media="all">
            <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style_home.css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/fonts.css" media="all">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/desktop.css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style_our.css" media="all">

	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom_checkbox.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
</head>

<body>
<!-- Header Container -->
<div id="header">
    	<div class="wrapper">
            <div class="logo">
                <a href="<?php echo Yii::app()->createUrl('site/');?>">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png" alt="Logo"/>
                </a>
            </div>
        </div>
</div>

<!-- End of Header container -->
<?php echo $content; ?>

</body>
</html>
