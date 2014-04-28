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
class RecentViewPanel extends CPortlet
{
	const PAGE = 0;

	protected function renderContent()
	{
		$this->render('index', array('page' => self::PAGE));
	}
}

?>
