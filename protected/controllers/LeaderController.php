<?php

class LeaderController extends GxController
{
	public $layout = 'column1';

	public function actionIndex()
	{
		$this->render('index');
	}
} 