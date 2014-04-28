<?php

Yii::import('application.models._base.BaseReviewComment');

class ReviewComment extends BaseReviewComment
{

	const STATUS_CHECK = 1;
	const STATUS_UNCHECKED = 2;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);

		return array(
			'condition' => "$a.is_deleted = 0",
			'order' => 'create_date DESC'
		);

	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_date',
			),
			'SoftDeleteBehavior' => array(
				'class' => 'SoftDeleteBehavior',
			)
		);

	}

	public function beforeSave()
	{
		parent::beforeSave();
		if ($this->isNewRecord) {
			$this->user_id = Yii::app()->user->id;
			$this->status = self::STATUS_UNCHECKED;
		}
		return parent::beforeSave();
	}
}