<?php

Yii::import('application.models._base.BaseUniqueProductAttribute');

class UniqueProductAttribute extends BaseUniqueProductAttribute
{
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getUniqueAttribute($sub_category_id)
	{
		$criteria = new CDbCriteria();
		$criteria->join = "LEFT JOIN product p ON p.id = t.product_id";
		$criteria->condition = "p.sub_category_id = :subcategory";
		$criteria->params = array(
			":subcategory" => $sub_category_id
		);

		$models = ProductAttribute::model()->findAll($criteria);

		$result = array();
		foreach ($models as $model) {
			if (!in_array($model->key, $result)) {
				$result[] = $model->key;
			}
		}

		$this->saveAttr($result, $sub_category_id);
	}

	public function saveAttr($data, $sub_category_id)
	{
		foreach ($data as $value) {
			$model = new UniqueProductAttribute();
			$model->category_id = $sub_category_id;
			$model->name = $value;
			if ($model->validate()) {
				$model->save(false);
			}
		}
	}

	public static function getListData($category_id)
	{
		$category = Category::model()->findByPk($category_id);
		$category_ids = array();
		if (count($category->categories) > 0) {
			$category_ids = $category->getCombineIds();
		} else {
			$category_ids[] = $category->id;
		}

		$criteria = new CDbCriteria();
		$criteria->addInCondition('t.category_id', $category_ids);

		$models = self::model()->findAll($criteria);

		$list = CHtml::listData($models, 'id', 'name');
		return $list;
	}



}