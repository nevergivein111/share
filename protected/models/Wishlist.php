<?php

Yii::import('application.models._base.BaseWishlist');

class Wishlist
  extends BaseWishlist
{
	public static function model($className = __CLASS__){
		return parent::model($className);

	}

	public function rules(){
		return CMap::mergeArray(parent::rules(),array(
					array('name','unique'),
					array('description','required'),
		  ));

	}

	public function behaviors(){
		return array(
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

	public function defaultScope(){
		$a = $this->getTableAlias(false,false);
		return array(
				  'condition' => "$a.is_deleted = 0",
		);

	}

	public function getShortDescription($length){
		$text_length = strlen($this->description);
		if($text_length > $length){
			$result = substr($this->description,0,$length) . '...';
		}else{
			$result = $this->description;
		}
		return $result;

	}

}