<?php

Yii::import('application.models._base.BaseFilterValue');

class FilterValue extends BaseFilterValue
{
	public $isValid = false;
	public $toDelete = false;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function getCategoryIds()
	{
		$category_ids = array();
		if (count($this->filter->category->categories) > 0) {
			$category_ids = $this->filter->category->getCombineIds();
		} else {
			$category_ids[] = $this->filter->category_id;
		}

		return $category_ids;
	}

	public function getList($inputs)
	{
		$criteria= new CDbCriteria();
		$criteria->select = "t.*, COUNT(p.id) as product_count";
		$criteria->join = "LEFT JOIN product p ON p.id = t.product_id";
		$criteria->addInCondition("p.sub_category_id" , $this->getCategoryIds());
		$criteria->addCondition("t.key = '".$this->unique->name."'");

		if(isset($inputs[$this->unique->name])){
			$id = array_keys($inputs[$this->unique->name]);
			$criteria->addCondition("t.value = '".$id[0]."'");
		}

		$criteria->group = "t.value";
		$productAttr = ProductAttribute::model()->findAll($criteria);

		return $productAttr;
	}

}