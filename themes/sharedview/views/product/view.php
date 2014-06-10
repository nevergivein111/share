<?php
    $baseurl = Yii::app()->theme->baseUrl;
    $clientscript = Yii::app()->clientScript;
    //$clientscript->registerCssFile($baseurl . '/css/carousel.css');
    //$clientscript->registerCssFile($baseurl . '/css/style_home1.css');
    //$clientscript->registerCssFile($baseurl . '/css/products.css');
?>

<div class="breadcrumbs">
        <?php
        $this->widget('application.components.widgets.myBreadCrumb.MyBreadCrumb',array(
                          'data' => $model->getBreadcrumb(),
                          'ampersand' => '->'
        ));
        ?>
</div>
<div class="mainContainer">
	<div class="leftContainer">
		<?php echo $this->renderPartial('_contentnew',array('model' => $model,'user' => $user));?>
	</div>

	<div class="rightsideBar">
		<?php echo $this->renderPartial('_left',array('model' => $model));?>
	</div>
</div>