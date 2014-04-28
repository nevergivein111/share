<?php

Yii::import('zii.widgets.CPortlet');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author User
 */
class Signup
  extends CPortlet
{
	public $model;

	public $isLogin = false;

	public function init(){
		parent::init();
		$this->model = new User();

	}

	protected function renderContent(){
		if(!$this->isLogin){
			$this->render('index',array(
					  'model' => $this->model
			));
		}else{
			$this->render('login',array(
					  'model' => new LoginForm
			));
		}

	}

}

?>
