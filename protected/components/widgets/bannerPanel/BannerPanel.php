<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BannerPanel
 *
 * @author User
 */
class BannerPanel extends CPortlet
{
	/*
	 *  $banners - array what contains banner image source and link
	 * example     array(
	 *					0=>array('src'=>'#','link'#'),
	 *					1=>array('src'=>'#','link'#'),
	 *					);
	 */
	public $banners = array();

	protected function renderContent(){
		$this->render('index',array(
				  'banners'=>$this->banners
		  ));

	}

}

?>
