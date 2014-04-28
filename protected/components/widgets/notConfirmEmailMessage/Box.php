<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Not confirm box panel
 *
 * @author User
 */
class Box extends CPortlet
{
	protected function renderContent()
	{
		$controller_id = Yii::app()->controller->id;
		if($controller_id != 'profile' && $controller_id != 'reviewProduct'){
			return;
		}

		if(Yii::app()->user->isGuest){
			return;
		}

		$user = User::model()->findByPk(Yii::app()->user->id);
		if(!$user->needToConfirmEmail()){
			return null;
		}

		$this->render('index', array());
	}
}

?>
