<div class="userControl">    
    <div class="user_info">            
        <div class="dropdown custom_dropdown">
            <a  id="setting_dropdown" role="button" data-toggle="dropdown" data-target="#" href="#">             
                        <img src="<?php echo $user->getThumbImage(false);?>" width="36" height="36" class="user_pic" />
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/setting_arrow.png" alt="" class="user_setting_btn" />
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dduserSetting" style="top:45px;left:-95px;">
                <li>
                        <?php echo CHtml::link('My profile',Yii::app()->createUrl('profile/view',array('id'=>Yii::app()->user->id)),array());?>
                </li>
                <li>
                        <?php echo CHtml::link('Edit profile',Yii::app()->createUrl('profile/edit'),array());?>
                </li>
                <li>
                        <?php echo CHtml::link('Logout',Yii::app()->createUrl('account/logout'),array('class' => 'setting_link','id' => 'logout_link'));?>
                </li>
            </ul>
        </div>                
    </div> 

    <?php $this->widget('application.components.widgets.notification.Notification');?> 
</div>
