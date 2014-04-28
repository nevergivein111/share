<?php

class UserController extends GxController
{

	public function filters()
	{
		return array(
			//'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('register'),
				'expression' => '*',
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}


	public function actionAddUser()
	{
		$result = array();
		$model = new User();
		$model->scenario = "social";
		$model->setAttributes($_POST['User']);
		$model->role = User::MEMBER;
		$model->status = User::STATUS_NEED_TO_CONFIRM;
		$model->onAfterSave = array(new Observer(), 'registration');

		if ($model->save()) {
			$result['status'] = true;
			$result['user_id'] = $model->id;
			$user_login = new LoginForm();
			$user_login->password = $_POST['User']['password'];
			$user_login->email = $model->email;
			$user_login->login();
		} else {
			$result['status'] = false;
		}

		echo CJSON::encode($result);
	}

	public function actionLoginUser()
	{
		$result = array();
		$result['status'] = false;
		$model = new LoginForm;
		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
				$result['status'] = true;
			}else{
				$result['message'] = $model->errors;
			}

		}

		echo CJSON::encode($result);
	}

}