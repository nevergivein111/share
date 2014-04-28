<?php

class SocialController extends GxController
{


	public $layout = 'column1';

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
				'actions' => array('index', 'addComment', 'viewComments'),
				'users' => array('@'),
			),
		);
	}

	protected function beforeAction($action)
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect('login');
		}
		return parent::beforeAction($action);
	}

	public function actionIndex()
	{
		ViewSocial::saveView(Yii::app()->user->id);
		$social = new Social();
		$social->user_id = Yii::app()->user->id;
		$this->render('index', array(
			'social' => $social
		));
	}

	public function actionAddComment()
	{
		$result = array();
		$comment = new ReviewComment();
		$comment->setAttributes($_POST);
		$comment->user_id = Yii::app()->user->id;

		if ($comment->save()) {
			$result['status'] = true;
		}
		$review = ReviewProduct::model()->findByPk($comment->review_id);

		$this->renderPartial('_comment', array(
			'comments' => $review->getLastFourComment()
		));
	}

	public function actionViewComments()
	{
		$comments = ReviewComment::model()->findAll(array(
			'condition' => 'review_id = :review_id',
			'params' => array(
				'review_id' => $_POST['review_id'],
			),
			'order' => 'create_date ASC',
		));

		$this->renderPartial('_comment', array(
			'comments' => $comments
		));
	}

	public function actionRefresh()
	{
		set_time_limit(0);
		$result = array();
		$endCheck = false;


		foreach ($_POST['review_ids'] as $review_id) {
			$review = ReviewProduct::model()->findAll();
		}

		$result = $this->process();

		$result['status'] = "success";
		echo CJSON::encode($result);
	}


}