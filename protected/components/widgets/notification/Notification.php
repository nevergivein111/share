<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FollowPanel
 *
 * @author User
 */
class Notification extends CPortlet
{
	public $user, $product, $create_date, $params;

	protected function renderContent()
	{
		if (Yii::app()->user->isGuest) {
			return;
		}

		$this->render('index', array(
			'data' => $this->getResult(),
			'params' => $this->params,
		));
	}

	public function getResult()
	{
		$result = array();
		$models = $this->getQuery();

		$this->params = $this->turnToJsonData($models);
		foreach ($models as $model) {
			$result[] = array(
				'text' => $this->getText($model),
				'model' => $model,
			);
		}

		return $result;
	}

	public function getsQuery()
	{
		$criteria = new CDbCriteria();
		$criteria->select = "*,
(SELECT COUNT(rc.id) FROM review_comment AS rc LEFT JOIN review_product  as t ON t.id = rc.review_id WHERE rc.status = " . ReviewComment::STATUS_UNCHECKED . " AND rc.user_id != :user_id) AS comment_count,
(SELECT COUNT(vr.id) FROM view_review AS vr LEFT JOIN review_product  as t ON t.id = vr.review_product_id WHERE vr.status = " . ViewReview::STATUS_HELPFUL . " AND vr.is_view = " . ViewReview::IS_VIEW_UNCHECKED . " AND vr.user_id != :user_id) AS helpful_count";

		$criteria->condition = "user_ids = :user_id";
		$criteria->params = array(
			":user_id" => Yii::app()->user->id,
		);
		$criteria->having = "comment_count > 0 OR helpful_count > 0";
		$models = ReviewProduct::model()->findAll($criteria);
		return $models;
	}

	public function getQuery()
	{
		$results = array();
		$reviews = ReviewProduct::model()->published()->findAllByAttributes(array('user_id' => Yii::app()->user->id));

		foreach ($reviews as $review) {
			$count_comments = ReviewComment::model()->count("user_id != :user_id AND review_id = :review_id AND status = :status", array(
				":user_id" => Yii::app()->user->id,
				":review_id" => $review->id,
				":status" => ReviewComment::STATUS_UNCHECKED,
			));

			$count_helpful = ViewReview::model()->count("user_id != :user_id AND review_product_id = :review_id AND status = :status AND is_view = :view", array(
				":user_id" => Yii::app()->user->id,
				":review_id" => $review->id,
				":status" => ViewReview::STATUS_HELPFUL,
				":view" => ViewReview::IS_VIEW_UNCHECKED,
			));
			$sum_count = $count_comments + $count_helpful;

			if($sum_count > 0){
				$review->comment_count = $count_comments;
				$review->helpful_count = $count_helpful;
				$results[] = $review;
			}

		}
		return $results;
	}

	public function getText(ReviewProduct $model)
	{
		$result = array();
		if ($model->comment_count > 0) {
			$comment_text = ($model->comment_count > 1) ? 'comments' : 'comment';
			$result[] = "$model->comment_count new $comment_text";
		}

		if ($model->helpful_count > 0) {
			if ((int)$model->helpful_count === count($model->findHelpful)) {
				$result[] = "$model->helpful_count found helpful";
			} else {
				$result[] = "$model->helpful_count more found helpful";
			}
		}

		$text = implode(" | ", $result);
		return $text;
	}

	public function turnToJsonData($models)
	{
		$result = array();
		foreach ($models as $model) {
			$result['id'][] = $model->id;
		}

		return $result;
	}

//	public function getText($item)
//	{
//		$model = $item['TYPE']::model()->findByPk($item['id']);
//		$text = null;
//		if ($model instanceof ReviewComment) {
//			$text = "commented on your review of the";
//			$this->user = $model->user;
//			$this->product = $model->review;
//			$this->create_date = $model->create_date;
//		} elseif ($model instanceof ViewReview) {
//			$text = "found your review helpful of the";
//			$this->user = $model->user;
//			$this->product = $model->review;
//			$this->create_date = $model->create_date;
//		}
//		if (!$text) {
//			return;
//		}
//
//		$final_text = "<b>" . $model->user->getDisplayName() . "</b> $text <b>" . $model->review->product->name . "</b>";
//		return $final_text;
//	}

//	public function getQuery()
//	{
//		$user_id = Yii::app()->user->	id;
//		$sql = "SELECT rc.id, rc.create_date, 'ReviewComment' AS TYPE
//				FROM review_comment AS rc
//				LEFT JOIN review_product AS rp ON rp.id = rc.review_id
//				WHERE rp.user_id = $user_id AND rc.user_id != $user_id AND rc.status = " . ReviewComment::STATUS_UNCHECKED . "
//
//				UNION
//
//				SELECT vr.id, vr.create_date, 'ViewReview'
//				FROM view_review AS vr
//				LEFT JOIN review_product AS rp ON rp.id = vr.review_product_id
//				WHERE rp.user_id = $user_id  AND vr.user_id != $user_id AND vr.status = " . ViewReview::IS_VIEW_UNCHECKED . "
//				ORDER BY create_date DESC";
//
//		$data = Yii::app()->db->createCommand($sql)->queryAll();
//		return $data;
//	}

}

?>
