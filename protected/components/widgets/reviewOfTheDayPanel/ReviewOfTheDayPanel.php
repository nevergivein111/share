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
class ReviewOfTheDayPanel extends CPortlet
{
	protected function renderContent()
	{
		$this->render('index', array());
	}
}

?>
