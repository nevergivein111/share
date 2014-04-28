<?php

Yii::import('application.models._base.BaseStoreProductInfo');

class StoreProductInfo extends BaseStoreProductInfo
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_Date',
			),
		);

	}

	public function beforeSave()
	{
		if (parent::beforeSave()) {
			$this->price = str_replace(',', '', str_replace('$', '', $this->price));
			return true;
		}
		return false;
	}

	protected function afterFind(){
		parent::afterFind();
		$this->price = "$".$this->price;

		return true;

	}
}