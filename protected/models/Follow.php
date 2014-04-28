<?php

Yii::import('application.models._base.BaseFollow');

class Follow
  extends BaseFollow
{
	const PAGE_LIMIT = 5;

	public static function model($className = __CLASS__){
		return parent::model($className);

	}

	public static function getFiveFollower($user_id,$page = 0){
		$models = Follow::model()->findAll(self::criteriaFive($user_id,$page));
		if(count($models) < 1){
			$page = 0;
			$models = Follow::model()->findAll(self::criteriaFive($user_id,$page));
		}

		return $models;

	}

	public static function criteriaFive($user_id,$page){
		$pageLimit = self::PAGE_LIMIT;
		$criteria = new CDbCriteria();
		$criteria->addCondition("follower_id = $user_id");
		$criteria->offset = $page * $pageLimit;
		$criteria->limit = $pageLimit;
		return $criteria;

	}

	public function behaviors(){
		return array(
				  'CTimestampBehavior' => array(
							'class' => 'zii.behaviors.CTimestampBehavior',
							'createAttribute' => 'create_date',
				  ),
		);

	}

}