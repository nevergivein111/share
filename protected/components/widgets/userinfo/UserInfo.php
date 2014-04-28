<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TopLogin
 *
 * @author User
 */
class UserInfo extends CPortlet
{
	protected function renderContent(){
	     if(Yii::app()->user->isGuest){
			  $this->render('buttons');
		 }
		 else{
			 $this->render('index', array(
                        'user'   => User::model()->findByPk(Yii::app()->user->id),
                        )
              );
		 }

	}

}

?>
