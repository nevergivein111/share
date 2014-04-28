<?php
/**
 * @var $this ReviewProductController
 * @var $categories
 * @var $review ReviewProduct
 */
?>

<div class="mainContainer" style="border:1px solid #CCC;background: #FFF;">
	<div class="ROTD_wrap">
		<h3>Review of the Day</h3>

		<div class="ROTD_res" style="position:relative;">
			<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/electronics.JPG"> <span class="itmType">Electronics</span>
			<span class="ROTD_smtxt">180 Results</span>

			<div style="top:4px;right:0px;text-align:right;" class="sort_dropdown">
				<div class="dropdown custom_dropdown">
					<a href="#" data-target="#" data-toggle="dropdown" role="button" class="ddText"
					   id="ddSortby">Category<span class="caret"></span>
					</a>
					<ul style="min-width:140px;right:4px;left:auto;top:20px;" aria-labelledby="ddSortby" role="menu" id="top_sort_ul" class="dropdown-menu">
						<?php
						foreach ($categories as $category) {
							/** @var $category Category */
							echo CHtml::tag('li', array(
									'data-name' => $category->name,
									'data-value' => $category->id,
									'class' => 'dropdown_product_holder'
									),
									CHtml::link($category->name, 'javascript:void(0)', array(

									))
								);
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="product_list_middle">
			<div class="product_list_main whilteBg">
				<div class="activityRow">
					<div class="userImg rotd_user">
						<div class="ROTD_date">
							<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/starone.png" class="smallStar"/>
							<span> ROTD 1/22/2014</span>
						</div>
						<img src="http://shareview.brians.com/uploads/user/thumb/2d9a1646475405c181fb4687c49e374b.jpg" alt=""/>
						<a href="#">Dillon J.</a>
						<span>2 weeks ago</span>
					</div>
					<div class="activityDetail">
						<div class="activityTxt">
							<div class="titleTxt">
								<span class="hglightName">Apple - iPad mini WI-Fi + Cellular (AT&T) - 16GB - Black & Slate</span>
							</div>

							<div class="actRate">
								<div class="wlrating">4.0</div>
								<div class="star_b_4 star_b"></div>
								<div class="rating_details">
									<a style="padding:5px 0 0 5px;float:left;" href="#" class="reviewDetails">Rating
										Details</a>
								</div>
							</div>

						</div>
						<div class="prodsDetail">

							<div class="configRate" style="display:none;">
								<div class="configLeft">
									<div class="configRow">
										<div class="configLbl">Display</div>
										<div class="configRateVal">
											<div class="star_m_5 star_m"></div>
										</div>
									</div>

									<div class="configRow">
										<div class="configLbl">Speaker Quality</div>
										<div class="configRateVal">
											<div class="star_m_3 star_m"></div>
										</div>
									</div>

									<div class="configRow">
										<div class="configLbl">Battery Life</div>
										<div class="configRateVal">
											<div class="star_m_1 star_m"></div>
										</div>
									</div>
								</div>

								<div class="configRight">
									<div class="configRow">
										<div class="configLbl">Camera</div>
										<div class="configRateVal">
											<div class="star_m_4 star_m"></div>
										</div>
									</div>

									<div class="configRow">
										<div class="configLbl">Design</div>
										<div class="configRateVal">
											<div class="star_m_2 star_m"></div>
										</div>
									</div>
								</div>

							</div>

							<div class="actDesc">
								<p>1 have both the iPad mini with retina and the Samsung galaxy note 10.1' 2014 edition.
									The iPad is a great device, but they have fallen behind the competition in regards
									to innovation. I use my iPad mini for internet browsing and carry it with me when I
									leave the house due to it's size and portability. I use the Samsung 10.1" 2014 note
									for everything else
								</p>

								<p>I've always owned iPods and iPads. but after trying my first Samsung device, I've
									realized how far behind Apple has fallen They really need to implement a slew of
									features and make some significant changes instead of introducing one or two
									advancements each revision if they intend to stay on top
								</p>

								<p>And yes, CNET is biased when it comes to Apple reviews. They need to stop treating
									basic features as revolutionary just because they are new to the iPad. when
									ealistically they've been used by the competition for months.
								</p>

								<p>Bottom line. the iPad is great, but there are better devices out there, especially
									for the money.</p>
							</div>

							<div class="reviewText">
								<span>Find this review helpful 0</span>
							</div>

							<div class="commentArea">
								<div class="commentRow">
									<div class="commentorPic">
										<img src="http://shareview.brians.com/uploads/user/thumb/2d9a1646475405c181fb4687c49e374b.jpg" alt="username"/>
									</div>
									<div class="commentInput">
										<textarea name="comment" placeholder="Write new comment"
												  class="cmttxtarea"></textarea>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
