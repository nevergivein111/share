<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FollowPanel
 *
 * @author User
 */
class FollowPanel extends CPortlet
{
	const PAGE = 0;

	protected function renderContent()
	{
		if(Yii::app()->user->isGuest){
			return null;
		}

		$follow = Follow::model()->findByAttributes(array('follower_id'=>Yii::app()->user->id));
		if(!$follow){
			return null;
		}
		$this->render('index', array('page' => self::PAGE));
	}
}

?>
