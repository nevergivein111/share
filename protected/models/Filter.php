<?php

Yii::import('application.models._base.BaseFilter');

class Filter extends BaseFilter
{
	public $newFilterAttributes = array();
	public $isValidFilterAttributes = true;
	public $inputs = array();
	public $sort_by;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('id, category_id, create_date, inputs, sort_by', 'safe'),
		));

	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'create_date',
			),
		);
	}

	/**
	 * collection inputs
	 * @param $values
	 */
	public function setFilterAttributes($values)
	{
		if ($this->isNewRecord) {
			foreach ($values as $value) {
				// there must be value for key
				if (!$value['name']) {
					continue;
				}

				$model = new FilterValue();
				$model->setAttributes($value);
				$model->isValid = $model->validate(array('name'));
				$this->isValidFilterAttributes &= $model->isValid;
				$this->newFilterAttributes[] = $model;
			}
		} else {
			foreach ($values as $value) {
				// new record but don't have key.
				if (!$value['id'] && !$value['name']) {
					continue;
				}

				$model = FilterValue::model()->findByPk($value["id"]);
				if ($model == null) {
					$model = new FilterValue();
					$model->filter_id = $this->id;
				}
				// the model is to be deleted. assign toDelete = true
				if (!$value['name']) {
					$model->toDelete = true;
					$this->newFilterAttributes[] = $model;
				} else {
					$model->setAttributes($value);
					$model->isValid = $model->validate(array('name'));
					$this->isValidFilterAttributes &= $model->isValid;
					$this->newFilterAttributes[] = $model;
				}
			}
		}

	}

	public function saveFilterAttributes()
	{
		foreach ($this->newFilterAttributes as $attribute) {
			/* @var $attribute FilterValue     */
			if ($attribute->toDelete === false && $attribute->isValid === true) {
				$attribute->filter_id = $this->id;
				$attribute->save(false);
			} else {
				$attribute->delete();
			}
		}
	}

	public function getCategoryIds()
	{
		$category_ids = array();
		if (count($this->category->categories) > 0) {
			$category_ids = $this->category->getCombineIds();
		} else {
			$category_ids[] = $this->category_id;
		}

		return $category_ids;
	}

	public function getAttr()
	{
		$models = Filter::model()->findByAttributes(array('category_id' => $this->category_id));

		return $models;
	}

	public function getBrandBasedOnCategory()
	{
		$attr = array();
		foreach ($this->inputs as $key => $data) {
			if ($key != "brand") {
				foreach ($data as $k => $v) {
					$attr[] = $k;
				}
			}
		}

		$criteria = new CDbCriteria();
		$criteria->select = "t.*, COUNT(p.id) as product_count";
		$criteria->join = "LEFT JOIN product p ON t.id = p.brand_id";

		$criteria->condition = "p.status = " . Product::STATUS_PUBLISHED;
		$criteria->addInCondition("p.sub_category_id", $this->getCategoryIds());

		if (isset($this->inputs['brand'])) {
			$brand_id = array_keys($this->inputs['brand']);
			$criteria->addCondition("t.id = $brand_id[0]");
		}

		if (count($attr) > 0) {
			$criteria->join .= " LEFT JOIN product_attribute pa ON p.id = pa.product_id";
			$criteria->addInCondition("pa.value", $attr);
		}

		$criteria->group = "t.id";
		$models = Brand::model()->findAll($criteria);
		return $models;
	}

	public function checkForDisabled($brand_id)
	{
		$attr = array();
		foreach ($this->inputs as $key => $data) {
			if ($key != "brand") {
				foreach ($data as $k => $v) {
					$attr[] = $k;
				}
			}
		}

		$criteria = new CDbCriteria();
		$criteria->join = "LEFT JOIN product p ON t.id = p.brand_id";
		$criteria->join .= " LEFT JOIN product_attribute pa ON p.id = pa.product_id";
		$criteria->condition = " t.id = $brand_id AND p.status = " . Product::STATUS_PUBLISHED;
		$criteria->addInCondition("p.sub_category_id", $this->getCategoryIds());
		if (count($attr) > 0) {
			$criteria->addInCondition("pa.value", $attr);
		}
		$model = Brand::model()->find($criteria);
		return (!$model) ? 'disabled' : null;
	}

	public function getCountName($filter, $brand)
	{
		$countName = false;

		foreach ($filter->inputs as $key => $input) {
			if ($key == "brand") {
				$countName = true;
			}
		}

		//return (!$countName) ? "$brand->name ($brand->product_count)" : $brand->name;
		return "$brand->name ($brand->product_count)";

	}

	public function process()
	{
		$result = array();
		foreach ($this->inputs as $key => $values) {
			foreach ($values as $k => $value) {
				if ((int)$value === 1) {
					$result[$key][$k] = $value;
				}
			}
		}

		$this->inputs = $result;
	}

	public function getFiltered()
        {
            $arr = array();

            foreach($this->inputs as $key => $inputs){
                foreach($inputs as $k => $v){
                    if($key === "brand"){
                        $brand = Brand::model()->findByPk($k);
                        $name = $brand->name;
                    }
                    else{
                        $name = $k;
                    }
                    $k = htmlspecialchars($k);
                    $arr[] = "<p>". ucfirst($key).": $name </p> <a class='remove_from_filter' data-type='$key' data-value='$k'>[REMOVE]</a>";
                }
            }

            return $arr;
        }



}