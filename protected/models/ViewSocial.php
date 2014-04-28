<?php

Yii::import('application.models._base.BaseViewSocial');

class ViewSocial extends BaseViewSocial
{
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'last_view',
                'updateAttribute' => 'last_view',
            ),
        );

    }


    public static function saveView($user_id)
	{
		$model = ViewSocial::model()->findByAttributes(array('user_id' => $user_id));
		if (!$model) {
			$model = new ViewSocial();
			$model->user_id = $user_id;
		}

		$model->save(false);
	}

}