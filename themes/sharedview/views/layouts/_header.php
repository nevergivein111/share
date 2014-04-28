<div id="header">
    <div class="wrapper">
        <div class="innerlogo">
            <a href="<?php echo Yii::app()->createUrl('site/');?>">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/logo.png', '', array('alt' => 'Shareview','class'=>''));?>
            </a>
        </div>
        <div class="head_search_wrap">
            <div class="searchbar">
                <?php $this->renderPartial('//layouts/_search_home');?>
                <?php $this->widget('application.components.widgets.topMenu.TopMenu');?>
            </div>
        </div>
        <?php $this->widget('application.components.widgets.userinfo.UserInfo');?>
    </div>
</div>
