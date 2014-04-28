<div class="arrow"></div>'+
'<div class="popover-content">'+
    '<div class="popupProfile">'+
        '<div class="fl mr5"><a href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $user->id));?>">'+
            '<?php echo CHtml::image($user->getThumbImage(false),$user->getDisplayName(),array("width" => "75","class"=>"P75" ))?>'+
            '</a></div>'+
        '<div class="posummary fl">'+
            '<div><span class="pName"><a href="<?php echo Yii::app()->createUrl('profile/view',array('id' => $user->id));?>">  <?php echo $user->getDisplayName()?></a> </span></div>'
            +'<div class="clear"></div><div><span>   '+'  <b><?php echo count($user->getFollowing());?></b> following '+'</span>'+
                '<span> '+'  <b><?php echo count($user->getFollower());?></b> followers '+' </span>'+'<span>'+'<b>'+'<?php echo count($user->reviewProducts);?></b> reviews '+' </span></div>'+
            '</div>'+
        '</div>'+
    '</div>