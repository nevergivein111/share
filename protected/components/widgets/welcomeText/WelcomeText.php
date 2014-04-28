<?php
Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WelcomeText
 *
 * @author User
 */
class WelcomeText extends CPortlet
{
	protected function renderContent(){
		$this->render('index');

	}
}

?>
