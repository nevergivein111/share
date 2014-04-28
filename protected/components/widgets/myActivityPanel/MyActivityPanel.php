<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LeftMenu
 *
 * @author User
 */
class MyActivityPanel extends CPortlet
{
	//menu title
	public $menu_title;
	//links in fo arrya
	public $data = array();

		protected function renderContent(){
	    $this->render('index',array(
				  'title'=>$this->menu_title,
				  'data'=>$this->data
		));

	}
	
}

?>
