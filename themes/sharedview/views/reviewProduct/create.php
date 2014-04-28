<?php
$baseurl = Yii::app()->theme->baseUrl;
$clientscript = Yii::app()->clientScript;
$clientscript->registerCssFile($baseurl . '/css/carousel.css');
$clientscript->registerCssFile($baseurl . '/css/style_home1.css');
?>
<div class="mainContainer">
    <?php
    $this->renderPartial('_form', array(
            'model' => $model,
            'component' => $component,
            'user' => $user,
            'login' => $login,
    ));
    ?>


    <div class="rightsideBar">
        	
		<div class="rightBlock">
		   <!--
           <div class="review_tips" id="singleShow">
				<h3>Review Tips</h3>
				<h4>Express yourself</h4>
				<p>Stand out with a unique perspective, and capture the attention of others by writing with style and conciseness.
				</p>

				<h4>Give it some thought</h4>
				<p>Use the component ratings to help explain your likes and dislikes. Also, apply personal experiences to give your review context and originality.
				</p>

				<h4>Have Fun</h4>
				<p>Let your thoughts flow freely, and remember that no opinion is wrong. If you have a change  of heart after publishing your review, though, It can always be edited or removed anytime later.
				</p>

			</div>  
            -->

			<div class="hide" id="right_rating">
				<div class="rightblockTitle brdbt mrb5">Reviews for Acer Chromebook</div>
				<div class="reviewSlot">
					<div class="rProImg">
						<img alt="" src="/themes/sharedview/images/profile_pic1.jpg">
					</div>
					<div class="rInfo">
						<div class="rSummary">
							<span class="hglightName">Renuka S.</span>
						</div>

					</div>
					<div class="clear"></div>	
					<div class="prodRates mt10">
						<div class="prodVal fl mr5">5.0</div>
						<div class="prodRating fl">
							<div class="star_sm_5 star_sm">
								<div data-rating="5" data-size="small" class="star_sm_5 star_sm" style="width: 53px;"></div>
							</div>
						</div>
                        <a class="rtDetail" href="javascript:void(0);">Rating details</a>
					</div>
					<div class="rDetail">
						You guys. My husband has been a vegetarian for 14 years. but when he saw and ... <a href="#">Read more</a>
					</div>
                    <div class="configRate" style="display:none;">
                        <div class="configLeft">
                            <div class="configRow">
                                <div class="configSmLbl">Display</div>
                                <div class="configSmRateVal"><div class="star_sm_5 star_sm"></div></div>
                            </div>
                            
                            <div class="configRow">	                                            
                                <div class="configSmLbl">Quality</div>
                                <div class="configSmRateVal"><div class="star_sm_3 star_sm"></div></div>
                            </div>

                            
                        </div>
                        
                        <div class="configRight">
                            <div class="configRow">
                                <div class="configSmLbl">Camera</div>
                                <div class="configSmRateVal"><div class="star_sm_4 star_sm"></div></div>
                            </div>
                            
                            <div class="configRow">                                            
                                <div class="configSmLbl">Design</div>
                                <div class="configSmRateVal"><div class="star_sm_2 star_sm"></div></div>
                            </div>
                        </div>
                        
                    </div>
				</div>
				<div  class="clear"></div>
				<div class="brdbt mb10 mt10"></div>
				<div class="reviewSlot">
					<div class="rProImg">
						<img alt="" src="/themes/sharedview/images/profile_pic1.jpg">
					</div>
					<div class="rInfo">
						<div class="rSummary">
							<span class="hglightName">Renuka S.</span>
						</div>

					</div>
					<div class="clear"></div>	
					<div class="prodRates mt10">
						<div class="prodVal fl mr5">3.5</div>
						<div class="prodRating fl">
							<div class="star_sm_0 star_sm">
								<div data-rating="3.5" data-size="small" class="star_sm_4 star_sm" style="width: 53px;"></div>
							</div>
						</div>
                        <a class="rtDetail" href="javascript:void(0);">Rating details</a>
					</div>
					<div class="rDetail">
						You guys. My husband has been a vegetarian for 14 years. but when he saw and ... <a href="#">Read more</a>
					</div>
                    <div class="configRate" style="display:none;">
                        <div class="configLeft">
                            <div class="configRow">
                                <div class="configSmLbl">Display</div>
                                <div class="configSmRateVal"><div class="star_sm_5 star_sm"></div></div>
                            </div>
                            
                            <div class="configRow">	                                            
                                <div class="configSmLbl">Quality</div>
                                <div class="configSmRateVal"><div class="star_sm_3 star_sm"></div></div>
                            </div>

                            
                        </div>
                        
                        <div class="configRight">
                            <div class="configRow">
                                <div class="configSmLbl">Camera</div>
                                <div class="configSmRateVal"><div class="star_sm_4 star_sm"></div></div>
                            </div>
                            
                            <div class="configRow">                                            
                                <div class="configSmLbl">Design</div>
                                <div class="configSmRateVal"><div class="star_sm_2 star_sm"></div></div>
                            </div>
                        </div>
                        
                    </div>
				</div>
				<div  class="clear"></div>
				<div class="brdbt mb10 mt10"></div>
				<div style="font-size:12px; " class="mt10">
					it can always be edited or removed any time
				</div>
			</div>
		</div> 
    </div>
</div>
<style>
	.modal{
		position: absolute!important;
	}
	#register_holder .register_error_message{
		position: relative!important;
		clear: both;
	}
	.profileSummaryModal {
		width: 420px;
		margin-left: -210px;
	}

	.modal-body {
		max-height: 490px;
	}

	.register_box {
		margin: 0 5px;
		padding: 10px 15px;
		background:#f9f9f9; 
		border-radius: 5px;
		-webkit-border-radius:5px; 
		-moz-border-radius:5px; 
		-ms-border-radius:5px; 
		-o-border-radius:5px; 
		border:1px solid #e2e2e2;
	}

	.reg_field {
		margin: 2px 0 0 0;
	}

	.reg_field input, .reg_field_sml input {
		height: 22px;
		font-size: 14px;
		margin: 0;
	}

	.reg_field_sml input {
		width: 94%;
		
	}

	.loginFb {
		width: 100% !important;
	}

	.register_box {
		margin: 0 5px;
		padding: 10px 15px 0;
		padding-bottom: 15px;
	}

	.reg_field {
		margin: 10px 0 0 0;
	}

	.reg_field input, .reg_field_sml input {
		height: 22px;
		font-size: 14px;
		margin: 0 !important;
	}

	.reg_field_sml input {
		width: 94% !important;
	}

	.reg_field span, .reg_field_sml span {
		font-size: 11px;
	}

	.agree_checkbox {
		width: 54%;
	}

	.signup_btn {
		float: right;
		width: 42%;
	}

	.signup_btn {
		float: right;
		width: 42%;
		margin: 3px 0 0 0;
	}

	.reg_bottom {
		margin-bottom: 10px;
	}

	.accountExist {
		margin: 0 0 8px 0;
	}

	.accountExist a {
		margin-right: 20px !important;
	}

	.modal-backdrop, .modal-backdrop.fade.in {
		opacity: 0 !important;
		background: rgba(0, 0, 0, 0) !important;
	}

	.signup_btn input {
		margin-right: 0 !important;
	}
	.reg_field input {
	width: 97%!important;
	background: none repeat scroll 0 0 #EEEEEE;
    height: 30px;

}
</style>




