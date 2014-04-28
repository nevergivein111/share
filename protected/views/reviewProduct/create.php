<div class="left_nav">
	<div class="writing_reviews_wrapper">
		<div class="laft_nav_large_title">writing Helpful Reviews</div>
		<div class="writing_reviews_title">Express yourself</div>
		<div class="writing_reviews_info">
			Stand out with a unique perspective, and capture the attention of others by writing with style and conciseness.
		</div>

		<div class="writing_reviews_title thought_title">Give it some thought</div>
		<div class="writing_reviews_info">
			Use the component ratings to help explain your likes and dislikes. Also, apply personal experiences to give your reviews context and originality.
			<span>Have Fun!</span>
		</div>

	</div>

	<div class="copyright_wrapper">
		(c) copyright 2013<br>
		<a href="#">About Us</a> |
		<a href="#">Contact Us</a> |<br>
		<a href="#">Privacy Policy</a> |
		<a href="#">Terms of Use</a>
	</div>

</div>

<div class="compose_page_wrapper">
	<?php
	$this->renderPartial('_form', array(
		'model' => $model,
		'component' => $component,));
	?>
</div>



