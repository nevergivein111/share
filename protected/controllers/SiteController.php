<?php

class SiteController extends Controller
{
	public $layout = '/layouts/column2';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->redirect("topTrending/index");
		if(!Yii::app()->user->isGuest){
			$this->redirect(Yii::app()->createUrl('category'));
		}
		$model = new User();
		if(isset($_POST['User'])){
			 $this->register($model);
		}
		//echo"<pre>";print_r($model->month);die;

		$this->layout = 'home';
		$this->render('index',array(
				  'model'=>$model
				  )
		  );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	protected function register($model){
			$model->setAttributes($_POST['User']);
			$model->scenario = "register";
			$model->role = User::MEMBER;
			$model->status = User::STATUS_NEED_TO_CONFIRM;
			$model->onAfterSave = array(new Observer(),'registration');

			if($model->save()){
				$user_login = new LoginForm();
				$user_login->password = $_POST['User']['password'];
				$user_login->email = $model->email;
				$user_login->login();
				$this->redirect(Yii::app()->createUrl('category'));
			}else{
				return $model->errors;
			}
		
	}

}