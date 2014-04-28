<?php
/**
 * @var $model User
 */

$baseurl = Yii::app()->theme->baseUrl;
$clientscript = Yii::app()->clientScript;
$clientscript->registerCssFile($baseurl . '/css/reset.css');
$clientscript->registerCssFile($baseurl . '/css/style.css');
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


<div class="advertise">
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/advertise1.jpg" alt="Advertise"/>
    <?php // echo CHtml::image(Yii::app()->createUrl('themes/sharedview/images/advertise1.jpg')) ; ?>
</div>


<div class="mainContainer">
    <div class="leftsideBar" style="width:300px;">
        <?php $this->renderPartial('_left_box', array('model' => $model, 'user' => $user)); ?>
    </div>
    <div class="rightContainer" style="width:714px;margin:0 0 0 10px;">
        <div class="activityTabs profileTab">
            <div id="tabs" style="width:100%;">
                <ul>
                    <li><a href="#tabs-1">Summary</a></li>
                    <li><a href="#tabs-2">Wish List<!--<span class="tab-no"></span>--></a></li>
                    <li><a href="#tabs-3">Bookmarks<!-- <span class="tab-no"></span>--></a></li>
                    <li><a href="#tabs-4">Collections</a></li>
                    <li><a href="#tabs-5">Reviews<!--<span class="tab-no"><?php // echo count($model->reviewProducts); ?></span>--></a></li>
                    <li><a href="#tabs-6">Following <span class="tab-no"><?php // echo count($model->follows); ?></span></a></li>
                    <li><a href="#tabs-7">Followers <span class="tab-no"><?php // echo count($model->follows1); ?></span></a></li>
                </ul>
                <div id="tabs-1" class="summaryTab" style="border:0;">
                	<div class="whiteBox">
                    	<h4>You have 1 unfinished Review</h4>
                        <div class="activityRow">
                            <div class="userImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product8.jpg" alt="Epson - Artisan A50 Printer" />
                            </div>
                            <div class="activityDetail">
                                <div class="activityTxt" style="width:100%;">
                                    <div class="titleTxt"><span>Epson - Artisan A50 Printer</span></div>
                                    <div class="actProRate">
                                        <div class="actRate">
                                            <div class="star_b_4 star_b"></div>
                                            <div class="rating_details">
                                                <a class="reviewDetails" href="#" style="padding:5px 0 0 5px;float:left;">Rating Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="prodsDetail" style="width:100%;">
                                    <div class="actDesc">
                                        <p>This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the tback, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show, like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home theater speaker system—the experience is nothing short of amazing.</p>
                                    </div>
                                                                        
                                    <div class="configRate" style="display:none;">
                                        <div class="configLeft">
                                            <div class="configRow">
                                                <div class="configLbl">Display</div>
                                                <div class="configRateVal"><div class="star_m_5 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">	                                            
                                                <div class="configLbl">Speaker Quality</div>
                                                <div class="configRateVal"><div class="star_m_3 star_m"></div></div>
                                            </div>
                
                                            <div class="configRow">                                            
                                                <div class="configLbl">Battery Life</div>
                                                <div class="configRateVal"><div class="star_m_1 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                        <div class="configRight">
                                            <div class="configRow">
                                                <div class="configLbl">Camera</div>
                                                <div class="configRateVal"><div class="star_m_4 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">                                            
                                                <div class="configLbl">Design</div>
                                                <div class="configRateVal"><div class="star_m_2 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="goto_bm">
                            <a href="#" style="margin-top:4px;font-weight:bold;">Discard</a>
                            <input type="button" value="Finish Review" class="btnFinishRview" />
                        </div>
                    </div>
                    
					<?php /*?>
					<div class="whiteBox">
                        <h4>My Pledges</h4>
                        <div class="myPledges">
                            <div class="myImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="" />
                            </div>
                            <div class="userPledges">
                                <div class="p_username">Renuka Shah</div>
                                <div class="smryPledges">
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_holidays.png" alt="Holidays" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>Christmas 2013</div>
                                            <div>12/25/2013</div>
                                            <div class="pledgedItem">Pledging 2 items</div>
                                        </div>
                                    </div>
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ic_birthday.png" alt="Birthday" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>25th Birthday</div>
                                            <div>1/10/2014</div>
                                            <div class="pledgedItem">Pledging 1 item</div>
                                        </div>
                                    </div>
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ic_graduation.png" alt="Graduation" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>College Graduation</div>
                                            <div>5/15/2014</div>
                                            <div class="pledgedItem">Pledging 1 item</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="seprateLine1"></div>
                        <div class="myPledges">
                            <div class="myImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic3.jpg" alt="" />
                            </div>
                            <div class="userPledges">
                                <div class="p_username">Donny J</div>
                                <div class="smryPledges">
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_holidays.png" alt="Holidays" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>Christmas 2013</div>
                                            <div>12/25/2013</div>
                                            <div class="pledgedItem">Pledging 2 items</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                    <div class="whiteBox">
                        <h4>Dillon's Wishlist</h4>
                        <div class="myPledges">
                            
                            <div class="userWishList">
                                <div class="smryPledges">
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ic_graduation.png" alt="Graduation" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>Graduation<span class="wlTag">Past</span></div>
                                            <div>5/15/2014</div>
                                            <div class="pledgedItem">1 of 2 items Pledged</div>
                                        </div>
                                    </div>
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_holidays.png" alt="Holidays" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>Christmas 2013</div>
                                            <div>12/25/2013</div>
                                            <div class="pledgedItem">1 of 2 items Pledged</div>
                                        </div>
                                    </div>
                                    <div class="wlType">
                                        <div class="wlImg">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ic_birthday.png" alt="Birthday" />
                                        </div>
                                        <div class="wlDetail">
                                            <div>25th Birthday</div>
                                            <div>1/10/2014</div>
                                            <div class="pledgedItem">1 of 2 items Pledged</div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
					<?php */?>
                    
                    <div class="whiteBox">
                    	<h4>Dilon's Wishlist</h4>
												
						<div class="listBlock">
                        
                        	<div class="wishListBlock">
								
								<div class="listingBlock">
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl1.jpg" alt="" />
										</div>
										<div class="listTxt">
											Apple - MacBook Pro with Retina Display - 1 5.4 Display - 8GB Memory - 258GB Flash Storage
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl2.jpg" alt="" />
										</div>
										<div class="listTxt">
											Beats By Dr. Dre - Wireless Bluetooth On-Ear Headphones - White
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl3.jpg" alt="" />
										</div>
										<div class="listTxt">
											Amazon - Kindle Fire HD 7 inch Tablet with 16GB Memory (2nd Generation) - Black
										</div>
									</div>
								</div>
								
							</div>
                            
							<div class="myGadgetBlock">
								
								<div class="listingBlock">
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl4.jpg" alt="" />
										</div>
										<div class="listTxt">
											Samsung - 39' Class (38-Si& Diag.) - LED 080p - 60Hz - HDTV
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl5.jpg" alt="" />
										</div>
										<div class="listTxt">
											Boston Acoustic - TVee 26 Soundbar with 6-1/2" Wireless Subwoofer
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/wl6.jpg" alt="" />
										</div>
										<div class="listTxt">
											Canon - EOS SD Mark Ill Digital SLR Camera with 24-105mm fI4L IS Lens - Black
										</div>
									</div>
								</div>
								
							</div>
						
						</div>
                        
                        <div class="goto_bm">
                            <a href="#" onclick="$('#tabs').tabs('select', 1);">View full wish list</a>
                        </div>
                    </div>
                    
                    <div class="whiteBox">
                        <h4>Bookmarked by Dillon</h4>
                        <div class="userBookmark">
                            <div class="user_bm_img">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product6.png" alt="">
                            </div>
                            <div class="user_bm_detail">
                                <div class="user_bm_txt">
                                    NEW HP 2000-2d49wm 15.6" 4GB 320GB HD<br>WIndows 8 HDMI Winter Blue DVD burner
                                </div>
                                <div class="bmProRate">
                                    <div class="bmrating">4.0</div>
                                    <div class="star_m_4 star_m"></div>
                                    <div class="bmReview">10 Reviews</div>
                                </div>
                            </div>
                            <div class="user_bm_action">
                                <span>Added two weeks ago</span>
                                <span>Label: To Review</span>
                                <span><a href="#" onclick="$('#tabs').tabs('select', 2);">Note</a></span>
                            </div>
                               
                        </div>
                        <div class="seprateLine1"></div>
                        <div class="userBookmark">
                            <div class="user_bm_img">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product1.png" alt="">
                            </div>
                            <div class="user_bm_detail">
                                <div class="user_bm_txt">
                                    New Toshiba Satellite 15.6" LED C55- A5300 4GB<br>Memory 500GB HDD Laptop

                                </div>
                                <div class="bmProRate">
                                    <div class="bmrating">4.0</div>
                                    <div class="star_m_4 star_m"></div>
                                    <div class="bmReview">10 Reviews</div>
                                </div>
                            </div>
                            <div class="user_bm_action">
                                <span>Added two weeks ago</span>
                                <span>Label: To Review</span>
                                <span><a href="#" onclick="$('#tabs').tabs('select', 2);">Note</a></span>
                            </div>
                               
                        </div>
                        <div class="seprateLine1"></div>
                        <div class="userBookmark">
                            <div class="user_bm_img">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product_1.jpg" alt="">
                            </div>
                            <div class="user_bm_detail">
                                <div class="user_bm_txt">
                                    Apple MacBook Air Al 369 13.3' Laptop -<br>MC5O3LL(A (October, 2010)
                                </div>
                                <div class="bmProRate">
                                    <div class="bmrating">4.0</div>
                                    <div class="star_m_4 star_m"></div>
                                    <div class="bmReview">10 Reviews</div>
                                </div>
                            </div>
                            <div class="user_bm_action">
                                <span>Added two weeks ago</span>
                                <span>Label: To Review</span>
                                <span><a href="#" onclick="$('#tabs').tabs('select', 2);">Note</a></span>
                            </div> 
                        </div>
                        <div class="seprateLine1"></div>
                        <div class="goto_bm">
                            <a href="#" onclick="$('#tabs').tabs('select', 2);">View all Bookmarks</a>
                        </div> 
                    </div>
                    
                    <div class="whiteBox">
                        <h4>Dilon's Collections</h4>
												
						<div class="listBlock">
							<div class="wishListBlock">
								
                                <div class="listTitle">
									<div class="listDiv">
										<a href="#" id="my-gadgets" onclick="$('#tabs').tabs('select', 3); showFullGadgetsList();">
											<span class="hlname">My Gadgets</span>
										</a>
									</div>
									<div class="listDiv">
										<span class="wishing">Personal electronic devices | 3 items</span>
									</div>
								</div>
								<div class="listingBlock">
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col1.jpg" alt="" />
										</div>
										<div class="listTxt">
											Samsung Galaxy S Ill with 18GB Mobile Phone - Marble White (Sprint)
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col2.jpg" alt="" />
										</div>
										<div class="listTxt">
											Apple - iPad mini Wi-Fl + Cellular (AT&T) -16GB-Black& Slate
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col3.jpg" alt="" />
										</div>
										<div class="listTxt">
											Dell - Inspiron IS.6 Touch-Screen Laptop - 8GB Memory - 500 GB Hard Drive - Black
										</div>
									</div>
								</div>
							</div>
						
							<div class="myGadgetBlock">
								
                                <div class="listTitle">
									<div class="listDiv">
										<a href="#" id="wish-list" onclick="showFullWhishList();">
											<span class="hlname">Theater & Music</span>
										</a>
									</div>
									<div class="listDiv">
										<span class="wishing">Entertainment around the houses | 11 items</span>
									</div>
								</div>
								<div class="listingBlock">
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col4.jpg" alt="" />
										</div>
										<div class="listTxt">
											Bose - Gin emate GS Series II Digital Home Theater Speaker System
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col5.jpg" alt="" />
										</div>
										<div class="listTxt">
											VIZIC - kl-Series Razor LED - 60 Class (60 Diag.) - LED- lOSOp-24DHz-Smart- 3D-HDTV
										</div>
									</div>
									<div class="listItem">
										<div class="listImg">
											<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/col6.jpg" alt="" />
										</div>
										<div class="listTxt">
											Beats By Dr. Dre - Beatbox Speaker Dock
										</div>
									</div>
								</div>
								
							</div>
						</div>
                        
                        <div class="goto_bm">
                            <a href="#" onclick="$('#tabs').tabs('select', 3);">View all collections</a>
                        </div>
                    </div>
                    
                    <div class="whiteBox">
                    	<h4>Recent Review by Dillon</h4>
                        
                        <?php /*?>
						<div class="activityRow">
                            <div class="userImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product7.png" alt="HP Probook 14'' Laptop - 4GB Memory - 500 Hard Drive" />
                                <span>a long time ago</span>
                            </div>
                            <div class="activityDetail">
                                <div class="activityTxt" style="width:100%;">
                                    <div class="titleTxt"><span>HP Probook 14" Laptop - 4GB Memory - 500 Hard Drive</span></div>
                                    <div class="actProRate">
                                        <div class="actRate">
                                            <div class="star_b_4 star_b"></div>
                                            <div class="rating_details">
                                                <a class="reviewDetails" href="#" style="padding:5px 0 0 5px;float:left;">Rating Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="prodsDetail" style="width:100%;">
                                    <div class="actDesc">
                                        <p>This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back</p>
                                    </div>
                                                                        
                                    <div class="configRate" style="display:none;">
                                        <div class="configLeft">
                                            <div class="configRow">
                                                <div class="configLbl">Display</div>
                                                <div class="configRateVal"><div class="star_m_5 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">	                                            
                                                <div class="configLbl">Speaker Quality</div>
                                                <div class="configRateVal"><div class="star_m_3 star_m"></div></div>
                                            </div>
                
                                            <div class="configRow">                                            
                                                <div class="configLbl">Battery Life</div>
                                                <div class="configRateVal"><div class="star_m_1 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                        <div class="configRight">
                                            <div class="configRow">
                                                <div class="configLbl">Camera</div>
                                                <div class="configRateVal"><div class="star_m_4 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">                                            
                                                <div class="configLbl">Design</div>
                                                <div class="configRateVal"><div class="star_m_2 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="reviewText">
                                        Find this Review <span class="helfulR">helpful 0</span>
                                        <div class="actAction">
                                            <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                            <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                        </div>
                                    </div>
                                    
                                    <div class="commentArea">
                                                                              
                                       <div class="commentRow">
                                            <div class="commentorPic">
                                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="username" />
                                            </div>
                                            <div class="commentInput">
                                                <textarea name="comment" placeholder="Write new comment" class="cmttxtarea"></textarea>
                                            </div>
                                        </div>  
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="seprateLine1"></div>
						<?php */?>
                        
                        <div class="activityRow">
                            <div class="userImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product_img1.jpg" alt="Yamaha - 5.1 - Channel Home Theater Speaker System with Powered Subwoofer" />
                                <span>one moment ago</span>
                            </div>
                            <div class="activityDetail">
                                <div class="activityTxt" style="width:100%;">
                                    <div class="titleTxt"><span>Yamaha - 5.1 - Channel Home Theater Speaker System with Powered Subwoofer</span></div>
                                    <div class="actProRate">
                                        <div class="actRate">
                                            <div class="star_b_4 star_b"></div>
                                            <div class="rating_details">
                                                <a class="reviewDetails" href="#" style="padding:5px 0 0 5px;float:left;">Rating Details</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="prodsDetail" style="width:100%;">
                                    <div class="actDesc">
                                        <p>This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show, like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home theater speaker system-the experience is nothing short of amazing.</p>
                                        
                                        <p>I gave ease of use only 4 stars because there are some settings, like changing the distribution of sounds between speakers and switching between inside and outside speakers. which I have not been able to figure out how to perform with the sound system remote instead. I am left to manually change these settings on the receiver's control panel--a bit of a nuisance if you ask me.</p>
                                        
                                        <p>Value I also gave 4 stars because the system is rather expensive for the standard 5 speaker set that you get with this package. Overall. I am very happy with the system. though. as my 4.6 rating indicates I would definitely recommend this system to anyone in the market for a spectacular home theater experience-barring of course that you can afford the more expensive 7-channel version of this Yamaha system.</p>

                                    </div>
                                                                        
                                    <div class="configRate" style="display:none;">
                                        <div class="configLeft">
                                            <div class="configRow">
                                                <div class="configLbl">Display</div>
                                                <div class="configRateVal"><div class="star_m_5 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">	                                            
                                                <div class="configLbl">Speaker Quality</div>
                                                <div class="configRateVal"><div class="star_m_3 star_m"></div></div>
                                            </div>
                
                                            <div class="configRow">                                            
                                                <div class="configLbl">Battery Life</div>
                                                <div class="configRateVal"><div class="star_m_1 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                        <div class="configRight">
                                            <div class="configRow">
                                                <div class="configLbl">Camera</div>
                                                <div class="configRateVal"><div class="star_m_4 star_m"></div></div>
                                            </div>
                                            
                                            <div class="configRow">                                            
                                                <div class="configLbl">Design</div>
                                                <div class="configRateVal"><div class="star_m_2 star_m"></div></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php /*?>
									<div class="reviewText">
                                        Find this Review <span class="helfulR">helpful 0</span>
                                        <div class="actAction">
                                            <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                            <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                        </div>
                                    </div>
                                    
                                    <div class="commentArea">
                                                                              
                                        <div class="commentRow">
                                            <div class="commentorPic">
                                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="username" />
                                            </div>
                                            <div class="commentInput">
                                                <div class="commentText">
                                                    <span>Catherine Yvonne</span> Can you prove beyond a reasonable doubt Assad used them or that simply they were used? 
                                                </div> 
                                                <div class="cmtDuration">4 hours ago</div>

                                            </div>
                                        </div>
                                        
                                        <div class="commentRow">
                                            <div class="commentorPic">
                                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="username" />
                                            </div>
                                            <div class="commentInput">
                                                <textarea name="comment" placeholder="Write new comment" class="cmttxtarea"></textarea>
                                            </div>
                                        </div>  
                                    </div>
									<?php */?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-2">
					<?php echo $this->renderPartial('wishList'); ?>
                </div>
                <div id="tabs-3">
                	<h4 style="padding-left:10px;margin:5px 0;">Bookmarked by Dillon</h4>
                    <div class="filterProduct">
                            <span> Labels :</span> 
                            <a href="#" class="active">All</a> | 
                            <a href="#">To Buy</a> |
                            <a href="#">To Review</a>
                        <div class="sort_dropdown" style="top:10px;right:10px;width:98%;text-align:right;">
                            <div class="dropdown custom_dropdown">
                            	<div class="middleLine"></div>
                                <a id="ddSortby" role="button" class="ddText" data-toggle="dropdown" data-target="#" href="#">Sort By <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddSortby" style="min-width:140px;right:4px;left:auto;top:20px;">
                                    <li><a href="#">Most Popular</a></li>
                                    <li><a href="#">Top Rated</a></li>
                                    <li><a href="#">Most Viewed</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bookmarkRow">
                        <div class="bookmarkInfo">
                            <div class="selBookmark">
                                <input type="checkbox" name="" class="bmchkbox" />
                            </div>
                            <div class="bookmarkImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product6.png" alt="NEW HP 2000-2d49wm 15.6' 4GB 320GB HD WIndows 8 HDMI Winter Blue DVD burner" />
                            </div>
                            <div class="bookmarkDetail">
                                <div class="bookmarkTxt">
                                    <div class="btitleTxt"><span>NEW HP 2000-2d49wm 15.6" 4GB 320GB HD WIndows 8 HDMI Winter Blue DVD burner</span></div>
                                    <div class="bmProRate">
                                        <div class="bmrating">4.0</div>
                                        <div class="star_m_4 star_m"></div>
                                        <div class="bmReview">10 Reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bmAddInfo">
                                <div>
                                    <span class="bmLbl">Added</span> : <span class="bmVal">12/15/2013</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Note</span> : <span class="bmVal">Already benn here, and loved it</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Label</span> : <span class="bmVal">To Review</span>
                                </div>
                                <a href="#">(Write a review)</a>
                            </div>
                        </div>
                        <div class="bmDetailTxt">
                            <p><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="" />This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show,<br> like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home
                            </p>
                            <a href="#">Full Review </a>
                            <div class="bmreviewText">
                                <div class="actAction">
                                    <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                    <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seprateLine1"></div>
                    <div class="bookmarkRow">
                        <div class="bookmarkInfo">
                            <div class="selBookmark">
                                <input type="checkbox" name="" class="bmchkbox" />
                            </div>
                            <div class="bookmarkImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product3.png" alt="New Toshiba Satellite 15.6' LED C55-A5300 4GB Memory 500GB HDD Laptop" />
                            </div>
                            <div class="bookmarkDetail">
                                <div class="bookmarkTxt">
                                    <div class="btitleTxt"><span>New Toshiba Satellite 15.6" LED C55-A5300 4GB Memory 500GB HDD Laptop</span></div>
                                    <div class="bmProRate">
                                        <div class="bmrating">4.0</div>
                                        <div class="star_m_4 star_m"></div>
                                        <div class="bmReview">10 Reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bmAddInfo">
                                <div>
                                    <span class="bmLbl">Added</span> : <span class="bmVal">12/15/2013</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Note</span> : <span class="bmVal">Already benn here, and loved it</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Label</span> : <span class="bmVal">To Review</span>
                                </div>
                                <a href="#">(Write a review)</a>
                            </div>
                        </div>
                        <div class="bmDetailTxt">
                            <p><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="" />This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show,<br> like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home
                            </p>
                            <a href="#">Full Review </a>
                            <div class="bmreviewText">
                                <div class="actAction">
                                    <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                    <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seprateLine1"></div>
                    <div class="bookmarkRow">
                        <div class="bookmarkInfo">
                            <div class="selBookmark">&nbsp;</div>
                            <div class="bookmarkImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product4.png" alt="Apple MacBook Air A1369 13.3' Laptop - MC503LL/A (October, 2010)" />
                            </div>
                            <div class="bookmarkDetail">
                                <div class="bookmarkTxt">
                                    <div class="btitleTxt"><span>Apple MacBook Air A1369 13.3" Laptop - MC503LL/A (October, 2010)</span></div>
                                    <div class="bmProRate">
                                        <div class="bmrating">4.0</div>
                                        <div class="star_m_4 star_m"></div>
                                        <div class="bmReview">10 Reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bmAddInfo">
                                <div>
                                    <span class="bmLbl">Added</span> : <span class="bmVal">12/15/2013</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Note</span> : <span class="bmVal">Already benn here, and loved it</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Label</span> : <span class="bmVal">To Review</span>
                                </div>
                                <a href="#">(Write a review)</a>
                            </div>
                        </div>
                        <div class="bmDetailTxt">
                            <p><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="" />This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show,<br> like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home
                            </p>
                            <a href="#">Full Review </a>
                            <div class="bmreviewText">
                                <div class="actAction">
                                    <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                    <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seprateLine1"></div>
                    <div class="bookmarkRow">
                        <div class="bookmarkInfo">
                            <div class="selBookmark">&nbsp;</div>
                            <div class="bookmarkImg">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product2.png" alt="Acer - 11.6'' Chormbook - 2GB Memory -16GB Solid State Drive" />
                            </div>
                            <div class="bookmarkDetail">
                                <div class="bookmarkTxt">
                                    <div class="btitleTxt"><span>Acer - 11.6" Chormbook - 2GB Memory -16GB Solid State Drive</span></div>
                                    <div class="bmProRate">
                                        <div class="bmrating">4.0</div>
                                        <div class="star_m_4 star_m"></div>
                                        <div class="bmReview">10 Reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bmAddInfo">
                                <div>
                                    <span class="bmLbl">Added</span> : <span class="bmVal">12/15/2013</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Note</span> : <span class="bmVal">Already benn here, and loved it</span>
                                </div>
                                <div>
                                    <span class="bmLbl">Label</span> : <span class="bmVal">To Review</span>
                                </div>
                                <a href="#">(Write a review)</a>
                            </div>
                        </div>
                        <div class="bmDetailTxt">
                            <p><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile_pic1.jpg" alt="" />This is my first review on Shareview. I really love the Yamaha Smart Home Theater System. It has a total of five speakers: three in the front and two in the back, and also comes with an extremely powerful subwoofer. The sound is uncannily immersive and is great for getting hooked into an intense thriller/TV show,<br> like Breaking Bad. I absolutely have to be watching Breaking Bad on my 60" TV. and hearing every sound on the Yamaha 5 channel home
                            </p>
                            <a href="#">Full Review </a>
                            <div class="bmreviewText">
                                <div class="actAction">
                                    <a href="#">Remove<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icClose.png" alt="Remove" /></a>
                                    <a href="#">Edit<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icEdit.png" alt="Edit" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-4">
                    <?php echo $this->renderPartial('lists'); ?>
                </div>
                
                <div id="tabs-5">
                    <?php $this->renderPartial('reviews', array('user' => $user, 'model' => $model)) ?>
                </div>
                <div id="tabs-6">
                    <?php

                    //$rawData = $model->getFollowing();
                    $rawData = $model->follows;

                    $dataProvider = new CArrayDataProvider($rawData, array(
                        'pagination' => array(
                            'pageSize' => count($rawData),
                        ),
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'id' => 'followings_list_view',
                        'template' => '{items}',
                        'emptyText' => '',
                        'viewData' => array('user' => $user),
                        'itemView' => '_following',
                    ));

                    ?>
                </div>
                <div id="tabs-7">
                    <?php

                    //$rawData = $user->getFollowers();
                    $rawData = $model->follows1;
                    $dataProvider = new CArrayDataProvider($rawData, array(
                        'pagination' => array(
                            'pageSize' => count($rawData),
                        ),
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'id' => 'followers_list_view',
                        'template' => '{items}',
                        'emptyText' => '',
                        'viewData' => array('user' => $user),
                        'itemView' => '_follower',
                    ));

                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.filter_category').live('click', function () {
            var category_id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('profile/updateReviewList');?>",
                dataType: 'html',
                type: 'POST',
                data: {userId: $('#userId').val(), category_id: category_id},
                beforeSend: function () {
                    $('#loader_image').show();
                }
            }).done(function (data) {
                    $('#posts').html(data);
                    $('#loader_image').hide();
                });
            $('#posts').html(data);
            $('#loader_image').hide();
        });

        $('.sort_by_attrs').live('click', function () {
            var sort_by = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('profile/sortReviewList');?>",
                dataType: 'html',
                type: 'POST',
                data: {userId: $('#userId').val(), sortBy: sort_by},
                beforeSend: function () {
                    $('#loader_image').show();
                }
            }).done(function (data) {
                    $('#posts').html(data);
                    $('#loader_image').hide();
                });
            $('#posts').html(data);
            $('#loader_image').hide();
        });

    });


    function redirectComment(obj) {

        $('a[href=#tabs-1]').click();
        var data = obj.attr('data-id');
        var elem = $('.activityRow[data-review=' + data + ']');
        $('html, body').animate({
            scrollTop: elem.offset().top
        }, 2000);
        return false;
    }
</script>

<script>
    $(document).ready(function () {
        deleteCommentFrom();
		var tab = '<?php echo Yii::app()->request->getQuery('tab')?>';
		if(tab != '') {
			$("#tabs").tabs('select', tab);
			if(tab == 4) {
				showFullGadgetsList();
			}
		}
    });
	
    function deleteCommentFrom() {
        $('.delete_comment_from_comment').live('click', function () {
            if (confirm("Are you sure to delete this comment?")) {
                var comment_id = $(this).attr('data-id');
                var list_view = 'comments_list_view';
                var review_id = $(this).attr('data-review');
                var url = '/reviewComment/delete';
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: url,
                    data: {
                        id: comment_id
                    }
                }).done(function (msg) {
                        if (msg.success) {
                            $.fn.yiiListView.update(list_view);
                            $.fn.yiiListView.update('comment_list_' + review_id);
                        } else {
                            alert('Some error:');
                        }
                        return false;
                    });

            } else {
                return false;
            }
        });
    }
	
	function showFullWhishList()
	{
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/wishList')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
	
	function showFullGadgetsList()
	{
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/myGadgets')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
	
	function backLists(){
		$.ajax({
			dataType: 'JSON',
			url: '<?php echo Yii::app()->createUrl('profile/backLists')?>',
			success: function(response){
				$('#tabs-4').html(response.data);
			}
		});
	}
</script>
