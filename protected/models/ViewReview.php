<?php

Yii::import('application.models._base.BaseViewReview');

class ViewReview extends BaseViewReview
{
	const PAGE_LIMIT = 5;

	CONST STATUS_VIEW = 1;
	CONST STATUS_HELPFUL = 2;

	CONST IS_VIEW_UNCHECKED = 0;
	CONST IS_VIEW_CHECK = 1;


	public $count_review;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return bool
	 */
	public function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->is_view = self::IS_VIEW_UNCHECKED;
			}
			return true;
		}
		return false;

	}

	public static function getFiveRecentView($user_id, $page = 0)
	{
		$models = ViewReview::model()->findAll(self::criteriaFiveRecentView($user_id, $page));

		if (count($models) < 1) {
			$page = 0;
			$models = ViewReview::model()->findAll(self::criteriaFiveRecentView($user_id, $page));
		}
		return array('models' => $models, 'page' => $page);
	}

	public static function criteriaFiveRecentView($user_id, $page)
	{
		$pageLimit = self::PAGE_LIMIT;
		$criteria = new CDbCriteria();
		$criteria->addCondition("user_id = $user_id");
		$criteria->offset = $page * $pageLimit;
		$criteria->limit = $pageLimit;
		$criteria->order = 'create_date DESC';
		return $criteria;
	}

	public static function getFiveRelatedProduct($page = 0)
	{
		$models = ViewReview::model()->findAll(self::criteriaFiveRelatedProduct($page));

		if (count($models) < 1) {
			$page = 0;
			$models = ViewReview::model()->findAll(self::criteriaFiveRelatedProduct($page));
		}
		return array('models' => $models, 'page' => $page);
	}

	public static function criteriaFiveRelatedProduct($page)
	{
		$pageLimit = self::PAGE_LIMIT;
		$criteria = new CDbCriteria();
		$criteria->select = "*,COUNT(review_product_id) as count_review";
		$criteria->group = "review_product_id";
		$criteria->offset = $page * $pageLimit;
		$criteria->limit = $pageLimit;
		$criteria->order = 'count_review DESC';
		return $criteria;
	}

	public static function getReviewOfTheDay()
	{
		$result = array();
		for ($i = 1; $i <= 5; $i++) {
			$date = date("Y-m-d", strtotime("-$i day"));
			$result[$i] = self::resultForReviewOfTheDay($date);
		}

		return $result;
	}

	public static function resultForReviewOfTheDay($date)
	{
		$model = ViewReview::model()->find(self::queryForReview($date));
		return $model;
	}

	public static function queryForReview($date)
	{
		$criteria = new CDbCriteria();
		$criteria->select = "*,COUNT(review_product_id) as count_review";
		$criteria->condition = "STATUS=:status AND create_date >= ':date_from' AND create_date <= ':date_to'";
		$criteria->params = array(
			"status" => self::STATUS_HELPFUL,
			"date_from" => "$date 00:00:00",
			"date_to" => "$date 23:59:59",
		);
		$criteria->group = "review_product_id";
		$criteria->order = 'count_review DESC';
	}

	public static function getCountHelpful($review_id)
	{
		$count = ViewReview::model()->countByAttributes(array('review_product_id'=>$review_id));
		return "helpful $count";
	}
	public static function getHelpfullText($review_id){
		$found=false;
		if(Yii::app()->user->id){
			$criteria = new CDbCriteria();
			$criteria->condition='user_id = :user_id AND review_id=:review_id';
			$criteria->params = array(
					  ':user_id'=>Yii::app()->user->id,
					  ':review_id'=>$review_id
			);
			$model = new ViewReview();
			$hasHeplful = $model->find($criteria);
			if($hasHeplful)
				$found = true;


		}
		$count = $model->countByAttributes(array('review_product_id'=>$review_id));
			return array(
					  'count' =>$count,
					  'found'=>$hasHeplful
			);
	}

}