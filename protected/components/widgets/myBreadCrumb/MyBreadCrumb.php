<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyBreadCrumb
 *
 * @author User
 */

class MyBreadCrumb extends CPortlet
{
	/*
	 * example
	 * $links = array('label'=>'url')
	 *				
	 */
	public $data = array();

	public $ampersand = '->';

	protected function renderContent(){
		//$this->ampersand = CHtml::image(Yii::app()->theme->baseUrl.'/img/arrow-next.png','',array('width'=>'10','height'=>'10'));
		$this->ampersand = '<span class="linkSep">&gt;</span>';
		$this->render('index',array(
				  'data' => $this->data,
				  'ampersand'=>$this->ampersand
		));

	}

}

?>
