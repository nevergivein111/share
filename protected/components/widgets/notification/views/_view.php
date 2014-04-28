<a class="notification_link" href="<?php echo Yii::app()->createUrl('profile/'.$item['model']->user->id,array("#"=>$item['model']->user->id));?>">
    <div class="notificationRow">
        <div class="notePic">
            <?php echo CHtml::image($item['model']->product->getNormalImage(true), $item['model']->product->name, array('width' => '55')) ?>
        </div>
        <div class="noteDesc">
            <div class="noteTxt">Your review of the <b><?php echo $item['model']->product->name?></b></div>
            <div class="noteDur"><?php echo $item['text'];?></div>
        </div>
    </div>
</a>    