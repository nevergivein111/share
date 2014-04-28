<?php

class AccountController  extends GxController
{
	public function filters(){
		return array(
		  //'accessControl',
		);

	}

	public function accessRules(){
		return array(
				  array('allow',
							'actions' => array('register','login','confirm','forgot'),
							'expression' => '*',
				  ),
				  array('allow',
							'actions' => array('logout'),
							'users' => array('@'),
				  ),
				  array('deny',
							'users' => array('*'),
				  ),
		);

	}

	public function actionRegister(){
		if(!Yii::app()->user->isGuest){
			$this->redirect(array('category'));
		}
		$this->layout = '/layouts/column3';
		$model = new User();
		$model->scenario = "register";

		if(isset($_POST['User'])){
			$model->setAttributes($_POST['User']);
			$this->performAjaxValidation($model);
			$model->role = User::MEMBER;
			$model->status = User::STATUS_NEED_TO_CONFIRM;
			$model->onAfterSave = array(new Observer(),'registration');

			if($model->save()){
				$user_login = new LoginForm();
				$user_login->password = $_POST['User']['password'];
				$user_login->email = $model->email;
				$user_login->login();
				$this->redirect(Yii::app()->createUrl('category'));
			}
		}

		$this->render('register',array('model' => $model));

	}

	public function actionLogin(){
		if(!Yii::app()->user->isGuest){
			$this->redirect(array('category'));
		}
		$this->layout = '/layouts/column4';
		$model = new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->createUrl('category'));
			}
		}

		// display the login form
		$this->render('login',array(
				  'model' => $model,
		));

	}

	/*
	 *
	 * forgot password form
	 */
	public function actionForgot(){
		if(!Yii::app()->user->isGuest){
			$this->redirect(array('category'));
		}
		$this->layout = '/layouts/column3';
		$model = new ForgotForm();

		if(isset($_POST['ForgotForm'])){
			$model->setAttributes($_POST['ForgotForm']);
			if($model->validate()){
				if($model->changePassword()){
					Yii::app()->user->setFlash('success',"Password sent to" . $model->user->email);
					$redirect_url = Yii::app()->createUrl('login');
				}else{
					Yii::app()->user->setFlash('error',"error");
					$redirect_url = Yii::app()->createUrl('account/forgot');
				}
				$this->sendChangedPassword($model->user,$model->new_password);
				$this->redirect($redirect_url);
			}
		}
		//display FForgot password form
		$this->render('forgot_password',array('model' => $model));

	}

	public function actionConfirm($token){
		if(!$token){
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}
		/* @var $model User */
		$model = User::model()->findByAttributes(array('auth_token' => $token,'status' => User::STATUS_NEED_TO_CONFIRM));

		if(!$model){
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}
		$model->status = User::STATUS_ACTIVE;
		$model->save(false);
		$model->setReviewToActive();

		$this->redirect('login');

	}

	public function sendConfirmEmail(User $user){
		$email = Yii::app()->email;
		$subject = "Welcome";
		$link = Yii::app()->createAbsoluteUrl("account/confirm",array("token" => $user->auth_token));
		// $message="Confirm your registration here: " . Yii::app()->createAbsoluteUrl("account/confirm",array("token" => $user->auth_token));
		$message = $this->renderPartial('/mailer/confirm_email',array('link' => $link),true);
		$email->sendMail("admin@shareview.com",$user->email,$subject,$message);

	}

	public function sendChangedPassword(User $user,$password){
        $message = new YiiMailMessage;
        $message->view = 'new_password';
        $message->setBody(array('new_password'=>$password), 'text/html');

        $message->subject = 'Welcome';
        $message->addTo($user->email);
        $message->from = array(Yii::app()->params['adminEmail'] => Yii::app()->params['adminEmailName']);
        return Yii::app()->mail->send($message);
		
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect('login'); //login

	}

	public function actionLoginWithAjax(){
		$model = new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid

			if(Yii::app()->getRequest()->getIsAjaxRequest()){
				if(!$model->validate()){
					echo CJSON::encode(array('success' => false,'error' => $model->errors));
				}else{
					$model->login();
					echo CJSON::encode(array('success' => true,'message' => Yii::app()->createUrl('category')));
				}

				Yii::app()->end();
			}
//			else
//				throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}

	}

}