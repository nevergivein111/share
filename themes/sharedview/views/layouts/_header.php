<div id="header">
    <div class="wrapper">
    <div class="headerbg">
        <div class="innerlogo">
            <a href="<?php echo Yii::app()->createUrl('site/');?>">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/logonew.png', '', array('alt' => 'Shareview','class'=>''));?>
            </a>
        </div>
        
            <div class="loginclass">
               	 <?php $this->widget('application.components.widgets.userinfo.UserInfo');?>
            </div>
        
       
    </div>
</div>
</div>

<div class="menumainbg">
    <div class="wrapper">
    
    <?php $this->widget('application.components.widgets.topMenu.TopMenu');?>
    
    
   
    </div>
    </div>
    
      <div class="searchbg">
    <div class="wrapper">
    <div class="searchinput">
                <?php $this->renderPartial('//layouts/_search_home');?>
                <?php //$this->widget('application.components.widgets.topMenu.TopMenu');?>
            </div>
            
            <div class="socialicon">
    	<ul>
        	<li><a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/facebook.png', '', array('alt' => 'Shareview','class'=>''));?></a></li>
            <li><a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/twitter.png', '', array('alt' => 'Shareview','class'=>''));?></a></li>
            <li><a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/rss.png', '', array('alt' => 'Shareview','class'=>''));?></a></li>
            <li><a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/youtube.png', '', array('alt' => 'Shareview','class'=>''));?></a></li>
    	</ul>
    </div>
            
        </div>
        </div>
        
       <div class="menumainbg sliderborder">
    </div>
        
        
