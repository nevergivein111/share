<?php
Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TopMenu
 *
 * @author User
 */
class TopMenu extends CPortlet
{
	/*
	 * example
	 * $menus = array('label1'=>'link1','label2'=>'link2')
	 */


	protected function renderContent()
	{
		$count_social = '';

		if (!Yii::app()->user->isGuest) {
			$social = new Social();
			$social->user_id = Yii::app()->user->id;
			$count_social = $social->getCount();
		}

		$this->render('index', array(
			'count_social'=>$count_social
		));
	}
}

?>
