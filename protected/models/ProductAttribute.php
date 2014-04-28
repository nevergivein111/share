<?php

Yii::import('application.models._base.BaseProductAttribute');

class ProductAttribute extends BaseProductAttribute
{
	public $isValid = false;
	public $toDelete = false;
	public $product_count;

	/**
	 * @param string $className
	 * @return ProductAttribute
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getCounts($inputs)
	{
		$brand = array();
		$attr = array();

		if (isset($inputs["brand"])) {
			$brand = array();
			foreach ($inputs["brand"] as $key => $value) {
				$brand[] = $key;
			}
		}
		var_dump($this->value);
		$criteria = new CDbCriteria();
		$criteria->select = "t.*, COUNT(p.id) as product_count";
		$criteria->join = "LEFT JOIN product p ON p.id = t.product_id ";
		$criteria->join .= "LEFT JOIN brand b ON b.id = p.brand_id";
		$criteria->addCondition("p.sub_category_id = '" . $this->product->sub_category_id . "'");
		$criteria->addCondition("t.value = '" . $this->value . "'");
		$criteria->addCondition("p.status = '" . Product::STATUS_PUBLISHED . "'");

		if (count($brand) > 0) {
			$criteria->addInCondition("b.id", $brand);
		}

		if (isset($inputs)) {


			foreach ($inputs as $input) {
				if ($input != "brand") {
					foreach ($input as $k => $v) {
						$attr[] = $k;
					}
				}
			}
		}

		if (count($attr) > 0) {
			foreach ($attr as $key => $attribute) {
				$condition = ($key > 0) ? "OR" : "AND";
				$criteria->addCondition("t.value = '$attribute'", $condition);
			}

			$criteria->group = "t.product_id";
			$criteria->having = "COUNT(t.`product_id`) = " . count($attr);
		}

		$productAttr = ProductAttribute::model()->find($criteria);
		return $productAttr;
	}

	public function getCount($filter, $filterValue)
	{
		$criteria = new CDbCriteria();
		$criteria = $this->getCriteriaForFilterInput($criteria, $filter, $filterValue);
		$models = Product::model()->published()->findAll($criteria);
		$count = count($models);
		return $count;
	}

	public function getCriteriaForFilterInput(CDbCriteria $criteria, $filter, $filterValue)
	{
		$attr = array();
		$criteria->select = "t.*";
		$criteria->join = "LEFT JOIN product_attribute AS pa ON pa.product_id = t.id";
		$criteria->addCondition("t.sub_category_id = $filter->category_id OR t.sub_category_id IN (SELECT id from `category` where `combine_category_id` = $filter->category_id)");
		foreach ($filter->inputs as $key => $input) {
			if ($key === 'brand') {
				$brand = array();
				foreach ($input as $ke => $va) {
					$brand[] = $ke;
				}
				$criteria->addInCondition('t.brand_id', $brand);
			} else {
				foreach ($input as $k => $v) {
					if ($this->value != $k) {
						$attr[$key] = $k;
					}
				}
			}
		}

		if (count($attr) > 0) {
			$array_attr_condition = array();
			$array_attr_condition[] = "(pa.value = '$this->value' AND pa.key='$this->key')";
			foreach ($attr as $key => $attribute) {
				$array_attr_condition[] = "(pa.value = '$attribute' AND pa.key='$key')";
			}
			$im = implode(" OR ", $array_attr_condition);
			$criteria->addCondition($im);
		} else {
			$criteria->addCondition("(pa.value = '$this->value' AND pa.key='$this->key')");
		}

		$criteria->group = "pa.product_id";
		$criteria->having = "COUNT(pa.product_id) = " . (count($attr) + 1);

		return $criteria;
	}

	public function getCountName($filter, $product_count)
	{
		$countName = false;
		foreach ($filter->inputs as $key => $input) {
			foreach ($input as $k => $v) {
				if($k === $this->value){
					$countName = true;
				}
			}
		}

		//return (!$countName) ? "$this->value ($product_count)" : $this->value;
		return "$this->value ($product_count)";

	}
}