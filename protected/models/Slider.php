<?php

Yii::import('application.models._base.BaseSlider');

class Slider extends BaseSlider
{
	const STATUS_ACTIVE = 1;

	const STATUS_INACTIVE = 2;

		public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('image', 'file', 'types' => 'jpg, gif, png, jpeg', 'allowEmpty' => true),
		));

	}
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

		public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/product',
				'image_url' => '/uploads/product',
				'normal_width'=>592,
				'normal_height'=>170,
				'default_image' => '/images/no-image.jpg',
			),
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_Date',
			)
		);

	}

	public function scopes()
	{
		return array(
			'published' => array(
				'condition' => "$this->tableAlias.status = :status",
				'params' => array(
					":status" => self::STATUS_ACTIVE
				),
			),

		);

	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'order' => "$a.ordering DESC ",
		);

	}

	public function getStatusList()
	{
		return array(
			self::STATUS_ACTIVE => "Published",
			self::STATUS_INACTIVE => "Not Published",
		);

	}

	public function getStatusName()
	{
		$name = $this->getStatusList();
		return (isset($name[$this->status])) ? $name[$this->status] : null;
	}

	public function getStatusNameButton()
	{
		if (!$this->getStatusName()) {
			return null;
		}

		$button = "";
		switch ($this->status) {
			case self::STATUS_ACTIVE:
				$button .= '<span class="label label-success disable">';
				break;
			case self::STATUS_INACTIVE :
				$button .= '<span class="label disable">';
				break;
		}

		$button .= $this->getStatusName() . '</span>';

		return $button;

	}
}