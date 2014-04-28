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
class Stars extends CPortlet
{
	/*
	 * size can be: 'small', 'medium', 'big'
	 */
	public $size;

	public $rating;

	protected function renderContent()
	{
		$this->render('index', array(
			'size' => $this->size,
			'rating' => $this->rating,
			'class' => $this->getClass(),
		));
	}

	public function getClass()
	{
		$size = null;
		if ($this->size === 'small') {
			$size = 'sm';
		} elseif ($this->size === 'medium') {
			$size = 'm';
		} elseif ($this->size === 'big') {
			$size = 'b';
		}
		$result = 'star_' . $size . '_0 star_' . $size;

		return $result;
	}

}

?>
