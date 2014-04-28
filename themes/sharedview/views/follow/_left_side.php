<?php

?>

<h4 class="h4border">Follow your favorite people from:</h4>

<div class="infoBox no-bdr">
    <ul class="socialul">
        <li class="selected"><a data-id="facebook"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon-fb.png" alt="fb"> Facebook</a><span data-id="followers">10</span></li>
        <li><a data-id="twitter"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon-twite.png" alt="twet"> Twitter</a><span>15</span></li>
        <li><a data-id="google"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon-google.png" alt="google"> Google+</a><span>5</span></li>
    </ul>
</div>

<div class="infoBox">
    <div class="infoHead">Search people in share view</div>
    <div class="infoDetail">
        <input name="" type="text" class="sp-box">
        <input type="button" class="btnBg submitBtn" value="Search">
    </div>
</div>