<?php

Yii::import('application.models._base.BaseCategory');

/**
 * @method Category subcategory()
 * @method Category showCategory()
 * @method Category published()
 * @method Category orderByOrdering()
 * @method bool uploadImage($currentImage = null, $getInstance = 'image')
 * @method string getOrigImage($absolute = false)
 * @method string getThumbImage($absolute = false)
 * @method string getNormalImage($absolute = false)
 * @method string imgPath($type, $absolute = false)
 * @method bool batchResize($source)
 */
class Category extends BaseCategory
{
	const CATEGORY = "category";

	const SUBCATEGORY = "subcategory";

	const STATUS_ACTIVE = 1;

	const STATUS_INACTIVE = 2;

	public $newComponentAttributes = array();

	public $isValidComponentAttributes = true;

	public $combine_ids;

	/**
	 * @param string $className
	 * @return Category
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);

	}

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('category_id', 'required', 'on' => self::SUBCATEGORY),
			array('name', 'unique', 'on' => self::CATEGORY),
			array('image', 'required', 'on' => self::CATEGORY),
			array('combine_ids', 'safe'),
		));

	}

	public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/category',
				'image_url' => '/uploads/category',
				'default_image' => '/images/no-image.jpg',
			),
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_Date',
			),
			'SoftDeleteBehavior' => array(
				'class' => 'SoftDeleteBehavior',
			),
			'UrlAliasBehavior' => array(
				'class' => 'UrlAliasBehavior',
			),
		);

	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
		);

	}

	public function scopes()
	{
		return array(
			'subcategory' => array(
				'condition' => "$this->tableAlias.category_id IS NOT NULL",
			),
			'showCategory' => array(
				'condition' => "$this->tableAlias.category_id IS NULL",
			),
			'published' => array(
				'condition' => "$this->tableAlias.status = :status",
				'params' => array(
					":status" => self::STATUS_ACTIVE
				),
			),
			'orderByOrdering' => array(
				'order' => 'ordering ASC'
			),
			'orderbyName' => array(
				'order' => 'name ASC'
			),
			'withCombine' => array(
				'condition' => 'combine_category_id IS NULL'
			),
			'notCombine' => array(
				'join' => "LEFT JOIN category cat ON $this->tableAlias.id = cat.combine_category_id",
				'condition' => "cat.combine_category_id IS NULL"
			)
		);

	}

	/**
	 * get status list
	 * @return array
	 */
	public function getStatusList()
	{
		return array(
			self::STATUS_ACTIVE => "Published",
			self::STATUS_INACTIVE => "Not Published",
		);

	}

	/**
	 * get status name
	 * @return null
	 */
	public function getStatusName()
	{
		$name = $this->getStatusList();
		return (isset($name[$this->status])) ? $name[$this->status] : null;

	}

	/**
	 * get status button for gridview
	 * @return null|string
	 */
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

	/**
	 * search for admin view grid
	 * @param $pagination boolean
	 * @return CActiveDataProvider
	 */
	public function searchCategory($pagination = true)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->addCondition('category_id IS NULL');
		$criteria->compare('name', $this->name, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('update_Date', $this->update_Date, true);

		if ($pagination) {
			return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
			));
		} else {
			return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'pagination' => false
			));
		}

	}

	/**
	 * search for subcategory view grid
	 * @return CActiveDataProvider
	 */
	public function searchSubcategory()
	{
		$criteria = new CDbCriteria;

		$criteria->join = "LEFT JOIN category as c ON t.id = c.combine_category_id";

		$criteria->compare('t.id', $this->id);
		$criteria->addCondition('t.category_id IS NOT NULL');
		$criteria->addCondition('c.id IS NULL');
		$criteria->compare('t.category_id', $this->category_id, true);
		$criteria->compare('t.name', $this->name, true);
		$criteria->compare('t.status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	/**
	 * check if is category
	 * @return bool
	 */
	public function isCategory()
	{
		return (!$this->category_id) ? true : false;

	}

	/*
	 * $parent - get categories,default value true
	 * $parent = false get sub categories
	 * $parentId default 0
	 * $parentId > 0 get sub categories for each category
	 */
	public function getCategories($parent = true, $parentId = 0)
	{
		if ($parent) {
			$criteria = new CDbCriteria();
			$criteria->addCondition($this->getTableAlias() . '.category_id is null');
		} elseif ($parentId == 0) {
			$criteria = new CDbCriteria();
			$criteria->addCondition($this->getTableAlias() . '.category_id is not null');
		} else {
			$criteria = new CDbCriteria();
			$criteria->addCondition($this->getTableAlias() . '.category_id=:category_id');
			$criteria->params = array(':category_id' => $parentId);
		}
		$criteria->addCondition($this->getTableAlias() . '.status =' . self::STATUS_ACTIVE);
		$data = $this->findAll($criteria);
		return $data;

	}

	/**
	 * collection inputs
	 * @param $values
	 */
	public function setComponentAttributes($values)
	{
		if ($this->isNewRecord) {
			foreach ($values as $value) {
				// there must be value for key
				if (!$value['name']) {
					continue;
				}

				$model = new Component();
				$model->setAttributes($value);
				$model->isValid = $model->validate(array('name'));
				$this->isValidComponentAttributes &= $model->isValid;
				$this->newComponentAttributes[] = $model;
			}
		} else {
			foreach ($values as $value) {
				$model = Component::model()->findByPk($value["id"]);
				if ($model == null) {
					$model = new Component();
					$model->category_id = $this->id;
				}
				// the model is to be deleted. assign toDelete = true
				if (!$value['name']) {
					$model->toDelete = true;
					$this->newComponentAttributes[] = $model;
				} else {
					$model->setAttributes($value);
					$model->isValid = $model->validate(array('key', 'value'));
					$this->isValidComponentAttributes &= $model->isValid;
					$this->newComponentAttributes[] = $model;
				}
			}
		}

	}

	public function saveComponents()
	{
		foreach ($this->newComponentAttributes as $attribute) {
			/* @var $attribute Component */
			if ($attribute->toDelete === false && $attribute->isValid === true) {
				$attribute->category_id = $this->id;
				$attribute->save(false);
			} else {
				$attribute->delete();
			}
		}

	}

	/*
	 * get breadcrumb links for each category
	 * return array key- category name value - url
	 */
	public function getBreadcrumb()
	{
		$breadcrumbs = array();
		if ($this->category_id) {
			$breadcrumbs[$this->category->name] = Yii::app()->createUrl('category');
		}
		$breadcrumbs[$this->name] = Yii::app()->createUrl('category/view', array('name' => $this->alias));

		return $breadcrumbs;

	}

	/*
	 * get param $list, array with key - id, and value - order number
	 *
	 */
	public function updateOrdering($list)
	{
		foreach ($list as $id => $order) {
			$sql = 'UPDATE  `category` SET `ordering` = ' . $order . ' where `id` = ' . $id;
			$insert = Yii::app()->db->createCommand($sql)->execute();
		}

	}

	/**
	 * @param $category_id
	 * @return array|mixed|null
	 */
	public function subcategoryForCombine($category_id)
	{

		$con = "and t.combine_category_id IS NULL";
		if ($this->scenario === "update_combine") {
			$con = "";
		}
		$models = Category::model()->with(array('categories'))->findAll(array(
			'condition' => "t.category_id = :category_id  $con and categories.id IS NULL",
			'params' => array(
				':category_id' => $category_id
			),
		));

		return $models;

	}

	/**
	 * @return array
	 */
	public function getFrontendCategories()
	{
		$models = Category::model()->subcategory()->published()->orderByOrdering()->findAll(array(
			'condition' => "combine_category_id IS NULL and category_id = $this->id",
		));

		return $models;

	}

	/**
	 * @return bool
	 */
	public function categoryValidate()
	{
		$bool = true;

		if (count($this->combine_ids) < 1) {
			$bool = false;
		}
		foreach ($this->combine_ids as $id) {
			$model = Category::model()->findByPk($id);
			if (!$model) {
				$bool = false;
			}
		}

		return $bool;

	}

	/**
	 * save combine category
	 */
	public function saveCombineCategory()
	{
		if ($this->scenario === "update_combine") {
			foreach ($this->categories as $combine) {
				$combine->combine_category_id = null;
				$combine->save(false);
			}
		}

		foreach ($this->combine_ids as $id) {
			$model = Category::model()->findByPk($id);
			$model->combine_category_id = $this->id;
			$model->save(false);
		}

	}

	/**
	 * @param $category_id
	 * @return CActiveDataProvider
	 */
	public function searchByCategoryId($category_id)
	{
		$criteria = new CDbCriteria;

		$criteria->select = "t.*";
		$criteria->join = "LEFT JOIN category as c ON t.id = c.combine_category_id";
		$criteria->condition = "c.id IS NOT NULL AND t.category_id = $category_id";

		$criteria->group = "t.name";

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	/**
	 * @return string
	 */
	public function listOfSubcategory()
	{
		$arr = array();
		foreach ($this->categories as $combine) {
			$arr[] = $combine->name;
		}

		$string = implode(",", $arr);

		return $string;

	}

	/**
	 * @return null|string
	 */
	public function noticeMessageForCombine()
	{
		$message = null;
		if ($this->combineCategory) {
			$message = "This subcategory belong to " . $this->combineCategory->name . "!";
		} elseif ($this->categories) {
			$message = "This is combine subcategory. It`s combine: " . $this->listOfSubcategory();
		}

		return $message;

	}

	/**
	 * delete combine category
	 */
	public function deleteCombine()
	{
		foreach ($this->categories as $combine) {
			$combine->combine_category_id = null;
			$combine->save(false);
		}

		$this->delete();

	}

	public function searchProducts()
	{
		$criteria = new CDbCriteria();

		if ($this->category_id)
			$criteria->condition = 't.sub_category_id = :category_id';
		else
			$criteria->condition = 't.category_id = :category_id';
		$criteria->params = array(
			':category_id' => $this->id
		);
		$products = Product::model()->published();
		return new CActiveDataProvider($products, array(
			'criteria' => $criteria,
		));

	}

	public function searchNotpublishedProducts()
	{
		$criteria = new CDbCriteria();

		if ($this->category_id)
			$criteria->condition = 't.sub_category_id = :category_id';
		else
			$criteria->condition = 't.category_id = :category_id';
		$criteria->params = array(
			':category_id' => $this->id
		);
		$products = Product::model()->notPublished();
		return new CActiveDataProvider($products, array(
			'criteria' => $criteria,
		));

	}

	public function getCombineIds()
	{
		$result = array();
		foreach($this->categories as $combine){
			$result[] = $combine->id;
		}

		return $result;
	}

	public static function getCats($rawData){
		$result = array();
		foreach($rawData as $data){
			if(!isset($result[$data->product->category->id])){
				$result[$data->product->category->id] = $data->product->category->name;
			}
		}
		return $result;
	}


}