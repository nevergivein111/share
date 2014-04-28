<?php

Yii::import('application.models._base.BaseComponent');

class Component extends BaseComponent
{
	public $isValid = false;
	public $toDelete = false;
	public $rating;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/product',
				'image_url' => '/uploads/product',
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


	public function getOverAllImage()
	{
		$query = 'SELECT sum(rating) as rate_sum, count(*) as rate_count FROM `review_product_component`
			WHERE component_id = '.$this->id.' AND is_deleted=0';
	    $rating = Yii::app()->db->createCommand($query)->queryRow();
		$rate = $rating['rate_sum'] / $rating['rate_count'];
		//var_dump($rate);
		if(is_float($rate)){
			$number = floor($rate);
			$image = $number . 'nhalf.png';
		}else{
			$number = $rate;
			$image = 'star' . $number . '.png';
		}

		$url = Yii::app()->theme->baseUrl . "/images/$image";
		
        return $url;
		
	}
}