<?php

Yii::import('application.models._base.BaseReviewProductComponent');

class ReviewProductComponent extends BaseReviewProductComponent
{
	public $isValid = false;
	public $toDelete = false;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
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

    public function getRatingImageUrl()
    {
        $basePath = Yii::app()->theme->baseUrl;
        $rating_image = $this->rating."mstar.png";
        return $basePath."/images/".$rating_image;
    }
}