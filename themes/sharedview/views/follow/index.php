<?php
/**
 * @var $this Controller
 */
?>

<div class="social-tools" id="social-tools">
    <a href="javascript:void(0);" title="Facebook Like" class="social-tools-facebook-like"></a>
    <a href="javascript:void(0);" title="Facebook Share" class="social-tools-facebook-share"></a>
    <a href="javascript:void(0)" title="Twitter" class="social-tools-twitter"></a>
    <a href="javascript:void(0)" title="Pinterest" class="social-tools-pinterest"></a>
    <a href="javascript:void(0)" title="Google+" class="social-tools-googleplus"></a>
    <a href="javascript:void(0)" title="StumbleUpon" class="social-tools-stumbleupon"></a>
    <a href="javascript:void(0)" title="Forums" class="social-tools-comments"></a>
    
</div>

<!--<div class="advertise">
    <img src="images/advertise.jpg" alt="Advertise" />
</div>-->
<div class="mainContainer ">

    <div class="leftsideBar">
        <?php echo $this->renderPartial('_left_side'); ?>
    </div>

    <div class="rightContainer whilteBg">
        <div class="activityRow">

            <div class="titleLbl">
                <span class="hglightName clearfix">Friends on Facebook</span>
                <span class="chackboxlabel"><input name="" type="checkbox" value=""><label>Automatically follow all</label></span>
            </div>

            <div class="followbox">

                <div class="flwBlock fst">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flwBlock">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flwBlock fst">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flwBlock">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flwBlock fst">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flwBlock">
                    <div class="flwBlockcheckbox"><input name="" type="checkbox" value=""></div>

                    <div class="flwProfile">
                        <div class="flwPic">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="flwInfo">
                        <div class="flw_proRate">
                            <h4>Renuka Shah</h4>
                            <h6>2000 points</h6>

                            <div class="flwRow">
                                <div class="flwCat">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/imgAudio.png" alt=""/>
                                    <span>Audio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="Row">
                <input type="button" class="btnBg updateBtn" value="Update">
            </div>

        </div>
    </div>
</div>

<script>
    $('.socialul li a').on('click', function() {
        // Remove the selected class
        $('.socialul li').removeClass('selected');

        // Add selected class to clicked element
        $(this).parent().addClass('selected');

        var title = '';
        var data_id = $(this).data('id');

        if (data_id == 'facebook') {
            title = 'Friend on Facebook';
        } else if (data_id == 'twitter') {
            title = 'Following on Twitter'
        } else if (data_id == 'google') {
            title = 'In Your Google Circles'
        }

        $('.titleLbl span.hglightName').text(title);
    });
</script>