<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReviewProductComments
 *
 * @author DENIS ALEXSANDOV
 */
class ReviewProductComments extends CPortlet
{
	public $review_id;

	public $model;

	public $review;

	public $user;

	public function init()
	{
		parent::init();
		$this->model = new ReviewComment();
	}

	protected function renderContent()
	{
		$count = 4;
		if (isset($_GET['count']) && ($_GET['count'] == 0)) {
			$count = 0;
		}
		$comments = $this->review->getReviewCommentProvider($count);
		$this->model->review_id = $this->review_id;
		$this->render('index', array(
			'model' => $this->model,
			'review_id' => $this->review_id,
			'user' => $this->user,
			'comments' => $comments
		));

	}

}

?>
