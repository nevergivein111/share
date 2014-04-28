<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReviewProduct
 *
*/
class ReviewProducts extends CPortlet
{
	public $review;
	public $user;
	public $key;
	public $create_date;

	protected function renderContent()
	{
		$this->render('index', array(
			'review' => $this->review,
			'create_date' => $this->create_date,
			'user' => $this->user,
			'key' => $this->key,
		));
	}

}

?>
