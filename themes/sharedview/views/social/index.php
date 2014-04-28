<?php
$baseurl = Yii::app()->theme->baseUrl;
$clientscript = Yii::app()->clientScript;
$clientscript->registerCssFile($baseurl . '/css/style.css');
$clientscript->registerCssFile($baseurl . '/css/reset.css');
?>
<div class="mainContainer">
    <div class="leftContainer">
        <div class="product_list_middle">
            <div class="product_list_main whilteBg">
            	<div class="staticPost">
                            	<div class="userImg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="Dilon J" />
                                    <div class="tduration">Just Now</div>
                                </div>
                                <div class="activityDetail">
                                	<div class="activityTxt">
	                                	<div class="socialTitle">
											<div><span class="hglightName">Dilon J.</span> added a new item to his collection <a href="<?php echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 4));?>">My Gadgets</a></div>
                                            <div class="collectionType">Personal electronic devices | 3 items</div>
	                                    </div>
                                    </div>
                                    
                                    <div class="wishListItem">
                                    	<div class="socialList">
                                        	<div class="socailPimg">
                                            	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/col1.jpg" alt="" />
                                            </div>
                                            <div class="socialPtxt">
                                            	Samsung Galaxy S Ill with 18GB Mobile<br>Phone - Marble White (Sprint)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>                            
                <div class="seprateLine1"></div>
                <div class="staticPost">
                    <div class="userImg">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="Dilon J" />
                        <div class="tduration">1 min ago</div>
                    </div>
                    <div class="activityDetail">
                        <div class="activityTxt">
                            <div class="socialTitle">
                                <div><span class="hglightName">Dilon J.</span> added 3 new items to his <a href="<?php echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 2));?>">Wish List</a></div>
                                <div class="collectionType">6 items</div>
                            </div>
                        </div>
                        
                        <div class="wishListItem">
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wlImg1.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Apple - MacBook Pro with Retina Display - 1 S.C Display - 8GB Memory - 256GB Flash Storage
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wlImg2.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Beats By Dr. Dre - Wireless Bluetooth On-Ear Headphones - White

                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wlImg3.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Amazon - Kindle Fire HD 7 inch Tablet with 16 GB Memory (2nd Generation) - Black
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="seprateLine1"></div>
                <div class="staticPost">
                    <div class="userImg">
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="Dilon J" />
                        <div class="tduration">1 min ago</div>
                    </div>
                    <div class="activityDetail">
                        <div class="activityTxt">
                            <div class="socialTitle">
                                <div><span class="hglightName">Dilon J.</span> created a new collection <a href="<?php echo Yii::app()->createUrl('profile/view', array('id' => Yii::app()->user->id, 'tab' => 4));?>">My Gadgets</a></div>
                                <div class="collectionType">Personal electronic devices | 2 items</div>
                            </div>
                        </div>
                        
                        <div class="wishListItem">
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/col2.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Apple - iPad mini Wi-fl + Cellular (AT&T)-16G8-Black& Slate
                                </div>
                            </div>
                            <div class="socialList">
                                <div class="socailPimg">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/col3.jpg" alt="" />
                                </div>
                                <div class="socialPtxt">
                                    Dell - Inspiron I 5.6 Touch-Screen Laptop - 6GB Memory - 500 GB Hard Drive - Black
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <?php
                $results = $social->getResult();
                if (count($results['review']) < 1): ?>
                    <br/>
                    <div class="alert" style="height:30px">
                        <div class="pull-left" style="padding-top:5px;margin-right:10px;"><h4> You haven't started following anyone yet. </h4></div>
                        <a href="#">
                            <button type="button" class="btn btn-primary pull-right">Followers<sup>+</sup></button>
                        </a>
                    </div>
                <?php endif; ?>
                <?php
				
                foreach ($results['review'] as $key => $model) {
                    $this->renderPartial("_list", array(
                            'headerText' => $results['headerText'][$key],
                            'review' => $model,
                            'user' => $model->user,
                            'create_date' => $model->create_date,
                            'key' => $key,
                        )
                    );
                }
				
                ?>
            </div>
        </div>
    </div>
    <div class="rightsideBar">
       
     	<div class="rightBlock mt0">
            <div class="rightblockTitle">Leaderboard<span><a href="#">All leaders</a></span></div>
            <div class="reviewSlot">
                <table width="100%" cellpadding="0" cellspacing="0" class="leaderBoard trB">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th class="pointsLbl">Points</th>
                    </tr>
                    <tr>
                        <td class="leaderIndex">1</td>
                        <td class="leaderName">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="" width="36" />
                            <span>Dillon J.</span>
                        </td>
                        <td class="leaderPoints">10,000</td>
                    </tr>
                    <tr>
                            <td class="leaderIndex">2</td>
                        <td class="leaderName">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="" width="36" />
                            <span>Dillon J.</span>
                        </td>
                        <td class="leaderPoints">10,000</td>
                    </tr>
                    <tr>
                            <td class="leaderIndex">3</td>
                        <td class="leaderName">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="" width="36" />
                            <span>Dillon J.</span>
                        </td>
                        <td class="leaderPoints">10,000</td>
                    </tr>
                    <tr>
                            <td class="leaderIndex">4</td>
                        <td class="leaderName">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="" width="36" />
                            <span>Dillon J.</span>
                        </td>
                        <td class="leaderPoints">10,000</td>
                    </tr>
                    <tr>
                            <td class="leaderIndex">5</td>
                        <td class="leaderName">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic3.jpg" alt="" width="36" />
                            <span>Dillon J.</span>
                        </td>
                        <td class="leaderPoints">10,000</td>
                    </tr>
                </table>
                <div class="btAllleader"><a href="#">All leaders</a></div>
            </div>
        </div>
        <div class="rightBlock">
            <div class="rightblockTitle">Review of the week</div>
            <div class="reviewSlot">
                <div class="rProImg">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile_pic1.jpg" alt="" />
                </div>
                <div class="rInfo">
                    <div class="rSummary">
                        <span class="hglightName">Renuka S.</span> reviewed the 
                        <span class="hglightProName">BoseВ® - CineMateВ® I SR...</span>
                    </div>
                    <div class="search_prod_star">
                        <div class="star_sm_0 star_sm">
                            <div data-size="small" data-rating="1.4"></div>
                        </div>
                    </div>
                </div>
                <div class="rDetail">
                    You guys. My husband has been a vegetarian for 14 years. but when he saw and smelled my chicken (Pechuga a la Parrilla), he had to have a bite. And that first bite was followed by a second, larger... 
                </div>
                <a href="#" class="fullReview">Full Review</a>

                <input type="button" value="Archive" class="btnArchive" />
            </div>
        </div>
        <div>
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/brightspot.jpg" alt="Atheltic Shoes" />
		</div>
    </div>
	
</div>
