<?php
/**
 * @var $model User
 */
?>
<div class="infoBox">
    <div class="infoDetail">
        <div class="profileImg">
            <input type="hidden" id="userId" value="<?= $model->id?>"/>
            <?php echo CHtml::image($model->getNormalImage(false));?>
        </div>
        <div class="profileSummary">
            <h3><?php echo $model->getDisplayName(false)?></h3>
            <div class="followers">
				<?php if (Yii::app()->user->id != $model->id): ?>
					<?php $this->renderPartial('_follow_button',array('follower_id'=>Yii::app()->user->id,'following_id'=>$model->id))?>
				<?php endif; ?>
                <!--
                <span>2. 830 points</span>
                <span><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/icElectronics.png" width="22px" alt="Profiler name" />Electronics</span>
                -->
            </div>
        </div>
       
        <div class="infoDetail pdetail">
            <span class="personalTitle">Personal Title; i.e : "Inspector Gadget"</span>
            <div class="leaderNm" onclick='$("#tabs").tabs( "select", "tabs-7" )'>
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ic_followers.png" alt="Profiler name" />
                </div>
                <span><a href="#">5 Followers</a></span>
            </div>
            <div class="leaderNm">
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/icon-grph.png" alt="Profiler name" class="leaderIcon" />
                </div>
                <span><?php echo CHtml::link('2X Leader', Yii::app()->createUrl('/leader')); ?></span>
            </div>
            <div class="leaderNm">
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ic_points.JPG" alt="Points" class="leaderIcon" />
                </div>
                <span><a href="#">16,070 Points</a></span>
            </div>
            <div class="leaderNm">
                <div class="star_sm_1 star_sm onestart"></div> 
                <span><a href="http://shareview.brians.com/review-of-the-day">2 ROTD</a></span>
            </div>
            
            <div class="leaderNm" onclick='$("#tabs").tabs( "select", "tabs-5" )'>
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ic_review.png" alt="Profiler name" class="leaderIcon" />
                </div>
                <span><a href="#">52 Reviews</a></span>
            </div>
             <div class="leaderNm">
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ic_firsts.JPG" alt="Firsts" class="leaderIcon" />
                </div>
                <span><a href="#">15 Firsts</a></span>
            </div>
            <div class="leaderNm" style="width:100%;">
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ic_helpful.png" alt="Profiler name" />
                </div>
                <span>137 Helpful Votes</span>
            </div>
            <div class="leaderNm" onclick='$("#tabs").tabs( "select", "tabs-4" )' style="width:100%;">
                <div>
                    <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/icn_collections.JPG" alt="Profiler name" /> 
                </div>
                <span><a href="#">6 Collections</a></span>
            </div>
        </div>
    </div>
</div>

<div class="infoBox">
    <div class="infoHead">Message Wall</div>
    <div class="msgwall">
        <img src="http://shareview.brians.com/uploads/user/normal/84ae648b4ad1dc7ab412ff2d507feff6.JPG" />
        <div class="msgDesc">
            <span class="userName">Donny J.</span>
            <span>message</span>
            <a href="#">reply</a>
        </div>
        <div class="msgDuration">
            1 days ago<br>
            2 unread
        </div>
        <a href="javascript:void(0);" class="msgClose">x</a>
    </div>
    <div class="msgwall">
        <img src="http://shareview.brians.com/uploads/user/normal/a98824489aa1bebc54c89795d84a991c.jpg" />
        <div class="msgDesc">
            <span class="userName">Renuka S.</span>
            <span>message</span>
            <a href="#">reply</a>
        </div>
        <div class="msgDuration">
            2 days ago
        </div>
        <a href="javascript:void(0);" class="msgClose">x</a>
    </div>
    <div class="msgwall">
        <img src="http://shareview.brians.com/uploads/user/thumb/3a7a9e92d88dce628a7459fe6c37c964.png" />
        <div class="msgDesc">
            <span class="userName">Azad H.</span>
            <span>message</span>
            <a href="#">reply</a>
        </div>
        <div class="msgDuration">
            3 days ago
        </div>
        <a href="javascript:void(0);" class="msgClose">x</a>
    </div>
    <a href="#" class="allMsgLink">View All Messages (5)</a>
</div>

<!--
<div class="infoBox">
    <div class="infoHead">2,830 Total Points</div>
    <div class="infoDetail msg-con" align="center">
        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/piechat.png" alt="Rating Distribution" />

        <div class="msg-con-main">
            <div class="msg-con-inner">
                <span><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/icAudio.png" width="18px" alt="audio" /><strong>Audio</strong></span>
                <span>530 Points</span>
                <span>5 Reviews</span>
                <span>5 Healpful Votes</span>
            </div>
        </div>

    </div>

    <div class="hf-block piechart">
        <div class="flwRowbdr">
            <span class="selected"><div class="sqr-bullt blue"></div> Audio</span>
            <span><div class="sqr-bullt red"></div> Electronics</span>
        </div>
        <div class="flwRowbdr">
            <span><div class="sqr-bullt green"></div> Appliances </span>
            <span><div class="sqr-bullt parpul"></div> Home & Loan</span>
        </div>
        <div class="flwRowbdr bdrnone">
            <span><div class="sqr-bullt skyblue"></div> PowerTool</span>
            <span><div class="sqr-bullt orange"></div> Sport_Outdoor</span>
        </div>

    </div>
</div>
-->

<div class="infoBox">
    <div class="infoHead">
        <div class="infoTitle">Graphics</div>
        <div class="graphicTab">
            <ul>
                <li class="active"><a href="javascript:void(0);">Ratings</a></li>
                <li><a href="javascript:void(0);">Points</a></li>
                <li><a href="javascript:void(0);">Expertise</a></li>
            </ul>
        </div>
    </div>
    <div class="infoDetail" align="center">
        <div class="ratingTab gTab" style="display:block;">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ratingImg.jpg" />
            <span>4.15 Average Rating</span>
        </div>
        <div class="pointTab gTab">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/pointsImg.jpg" alt="Rating Distribution" />
            <div class="pointTable">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/icWine.jpg" alt="Wine" />
                <div class="pointInfo">
                    <div class="pointHead">
                        <span>Wine</span> 4,900 Points
                    </div>
                    <div class="pointRow">
                        <span>10 Reviews</span>
                        <span>1 ROTD</span>
                    </div>
                    <div class="pointRow">
                        <span>40 Helpful Votes</span>
                        <span>5 Firsts</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="expertiseTab gTab">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/expertise.jpg" />
        </div>
    </div>
</div>

<div class="infoBox">
    <div class="infoHead">Dillon's Followers</div>
    <div class="infoDetail" align="center">
        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/followers.png" alt="" />
    </div>
    <a href="#" class="allMsgLink">View All Followers (135)</a>
</div>



<div class="infoBox">
    <div class="infoHead">About Dillon</div>
    <div class="hf-block ud-profile-lbar">
        <div class="flwRowbdr">
            <span><strong>Location</strong></span><span>Greensboro, NC</span>
        </div>
        <div class="flwRowbdr">
            <span><strong>Member Since</strong></span><span>June 2013</span>
        </div>
        <div class="flwRowbdr">
            <span><strong>Website</strong></span><span><a href="http://shareview.brians.com">Shareview</a></span>
        </div>
        <div class="flwRowbdr">
            <span><strong>Occupation</strong></span><span>Entrepreneur</span>
        </div>
        <div class="flwRowbdr bdrnone">
            <span><strong>Hobbies</strong></span><span>Wine tasting</span>
        </div>

    </div>
</div>