<?php

Yii::import('application.models._base.BaseBrand');

/**
 * @method bool uploadImage($currentImage = null, $getInstance = 'image')
 * @method string getOrigImage($absolute = false)
 * @method string getThumbImage($absolute = false)
 * @method string getNormalImage($absolute = false)
 * @method string imgPath($type, $absolute = false)
 * @method bool batchResize($source)
 */
class Brand extends BaseBrand
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	public $_found_in;
	public $product_count;

	/**
	 * @param string $className
	 * @return Brand
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);

	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
				  'order'=>'name ASC',
		);
	}

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('name', 'unique'),
			array('image', 'file', 'types' => 'jpg, gif, png, jpeg', 'allowEmpty' => true),
		));

	}

	public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/brand',
				'image_url' => '/uploads/brand',
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

	public function getStatusList()
	{
		return array(
			self::STATUS_ACTIVE => "Published",
			self::STATUS_INACTIVE => "Not published",
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

	public function getShortDescription()
	{
		$length = strlen($this->description);

		if ($length > 100) {
			$result = substr($this->description, 0, 100) . '...';
		} else {
			$result = $this->description;
		}
		return $result;
	}

	public function getFoundIn()
	{
		$products = array();
		foreach ($this->products as $product) {
			if (!in_array($product->subCategory->name, $products)) {
				$products[] = $product->subCategory->name;
			}
		}

		$result = implode(", ", $products);
		return $result;
	}

}