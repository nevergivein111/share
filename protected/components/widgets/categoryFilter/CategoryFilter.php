<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryFilter
 *
 * @author Denis Alexsandrov
 * getting
 */
class CategoryFilter extends CPortlet
{
	public $category;
	protected function renderContent(){
		$this->render('index');

	}
}

?>
