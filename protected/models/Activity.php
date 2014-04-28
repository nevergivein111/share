<?php
class Activity
{
	public $user_id;
	public $header_comment = '';
	public $last_user_id;
	public $model;
	public $key;


	public function getResult()
	{
		
		$review = $this->getReview();
		$user = $this->getUser();
		$headerText = $this->getHeaderText();
		$this->last_user_id = $user;

		return array(
			'review' => $review,
			'user' => $user,
			'headerText' => $headerText,
			'headerComment' => $this->header_comment,
			'create_date' => $this->model->create_date,
		);
	}

	public function getReview()
	{
		$review = null;
		if ($this->model instanceof ReviewProduct) {
			$review = $this->model;
		} elseif ($this->model instanceof ViewReview) {
			$review = $this->model->reviewProduct;
		} elseif ($this->model instanceof ReviewComment) {
			$review = $this->model->review;
		}

		return $review;
	}

	public function getUser()
	{
		$this->last_user_id = $this->model->user_id;
		return $this->model->user;
	}

	public function getHeaderText()
	{
		$text = '';
		if ($this->model instanceof ReviewProduct) {
			$text = $this->isReviewProduct();
		} elseif ($this->model instanceof ViewReview) {
			$text = $this->isViewReview();
		} elseif ($this->model instanceof ReviewComment) {
			$text = $this->isReviewComment();
			$this->header_comment = $this->model->comment;
		}


		return $text;
	}

	public function isReviewProduct()
	{
		return "You wrote a review";
	}

	public function isViewReview()
	{
		if ($this->user_id === $this->model->user_id) {
			$text = "You found <a href='".Yii::app()->createUrl('profile/view',array('id'=>$this->model->reviewProduct->user->id))."' class='tooltips' id='tooltip_user_$this->key' title='aaa'>" . $this->model->reviewProduct->user->getDisplayName(false) . "'s</a> review helpful";
		} else {
			$text = "<a href='".Yii::app()->createUrl('profile/view',array('id'=>$this->model->user->id))."' class='tooltips' title='aaa' id='tooltip_user_$this->key'>". $this->model->user->getDisplayName(false) . "</a> found your review helpful";
		}

		return $text;
	}

	public function isReviewComment()
	{
		if ($this->user_id === $this->model->user_id) {
			$text = "You commented on <a href='".Yii::app()->createUrl('profile/view',array('id'=>$this->model->review->user->id))."' title='aaa' class='tooltips' id='tooltip_user_$this->key'>" . $this->model->review->user->getDisplayName(false) . "'s</a> review";
		} else {
			$text = "<a href='".Yii::app()->createUrl('profile/view',array('id'=>$this->model->user->id))."' class='tooltips' title='aaa' id='tooltip_user_$this->key'>".$this->model->user->getDisplayName(false) . "</a> commented on your review";
		}
		return $text;
	}

	public function getResults()
	{
		$result = array();
		$rows = $this->getRows();

		foreach ($rows as $value) {
			$result[] = $value['type']::model()->findByPk($value['id']);
		}
		return $result;
	}

	public function getRows()
	{
		$sql = "SELECT rp.	id ,rp.create_date, 'ReviewProduct' AS type
				FROM review_product AS rp
				WHERE rp.`user_id` = $this->user_id AND rp.is_deleted = 0

				UNION

				SELECT rc.id, rc.create_date, 'ReviewComment'
				FROM review_comment AS rc
				LEFT JOIN review_product AS rp ON rp.id = rc.review_id
				WHERE rp.user_id = $this->user_id OR rc.user_id = $this->user_id AND rc.is_deleted = 0

				UNION

				SELECT vr.id, vr.create_date, 'ViewReview'
				FROM view_review AS vr
				LEFT JOIN review_product AS rp ON rp.id = vr.review_product_id
				WHERE rp.user_id = $this->user_id OR vr.user_id = $this->user_id AND vr.status = ".ViewReview::STATUS_HELPFUL."

				ORDER BY create_date DESC
				LIMIT 0,10";

		$data = Yii::app()->db->createCommand($sql)->queryAll();
		return $data;
	}
}