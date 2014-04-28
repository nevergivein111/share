<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuggestedPanel
 *
 * @author User
 */
class SuggestedPanel extends CPortlet
{
	//suggested or related
	public $panel_title;

	protected function renderContent(){
		$this->render('index');

	}
}

?>
