<?php

Yii::import('application.models._base.BaseViewProduct');

class ViewProduct extends BaseViewProduct
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
			),
		);

	}

	public static function addView(Product $product, $user_id, $ip_address)
	{
		$view_user = false;
		$view_ip_address = false;
		if($user_id){
			$view_user = ViewProduct::model()->findByAttributes(array('user_id'=>$user_id, 'product_id'=>$product->id));
		}else{
			$view_ip_address= ViewProduct::model()->findByAttributes(array('ip'=>$ip_address, 'product_id'=>$product->id));
		}

		if($view_user || $view_ip_address){
			return;
		}

		$model = new ViewProduct();
		$model->product_id = $product->id;

		if($user_id){
			$model->user_id = $user_id;
		}else{
			$model->ip = $ip_address;
		}

		if($model->validate()){
			$model->save(false);
		}else{
			throw new CHttpException(404,'Error with product view');
		}
	}

}