<?php

Yii::import('application.models._base.BaseStore');

class Store extends BaseStore
{
	public static function model($className = __CLASS__)
	{
		return parent::model($className);

	}

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('name', 'unique'),
			array('image', 'required'),
			array('image', 'file', 'types' => 'jpg, gif, png, jpeg', 'allowEmpty' => true),
		));

	}

	public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/store',
				'image_url' => '/uploads/store',
				'default_image' => '/images/no-image.jpg',
			),
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

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
		);

	}
}