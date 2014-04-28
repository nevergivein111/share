<div class="menu">
    <ul>
	<li> <a href="<?php echo Yii::app()->createUrl('topTrending/index')?>"
	   class="navButton  <?php echo Yii::app()->controller->id == 'topTrending' ? 'navActive' : '' ?>">Home</a> </li>

	<li> <a href="<?php echo Yii::app()->createUrl('category')?>"
	   class="navButton <?php echo Yii::app()->controller->id == 'category' ? 'navActive' : '' ?>">Categories</a> </li>

	<li> <a href="<?php echo Yii::app()->createUrl('reviewProduct/writeReview');?>"
	   class="navButton <?php echo Yii::app()->controller->id == 'reviewProduct' ? 'navActive' : '' ?>">Write Review</a> </li>
        <!--
	<li> <a href="<?php //echo (!Yii::app()->user->isGuest) ? Yii::app()->createUrl('social') : Yii::app()->createUrl('login')?>"
	   class="navButton <?php //echo Yii::app()->controller->id == 'social' ? 'navActive' : '' ?>">Social <?php // echo $count_social?></a> </li>
        <!--
	<li> <a href="<?php //echo (!Yii::app()->user->isGuest) ? Yii::app()->createUrl('follow') : Yii::app()->createUrl('login') ?>"
	   class="navButton <?php //echo Yii::app()->controller->id == 'follow' ? 'navActive' : '' ?>">Follow More</a> </li>

-->
    </ul>
</div>
