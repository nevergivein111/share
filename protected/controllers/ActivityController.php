<?php

class ActivityController extends GxController
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
		$activity = new Activity();
		$activity->user_id = Yii::app()->user->id;
		$this->render('index', array(
			'activity' => $activity
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


		foreach($_POST['review_ids'] as $review_id){
			$review = ReviewProduct::model()->findAll();
		}

		$result = $this->process();

		$result['status'] ="success";
		echo CJSON::encode($result);
	}

	public function process()
	{
		$requestTime = time() + 300; // 5min sec
		$changeDetected = false;

		while (time() < $requestTime && !connection_aborted() && !$changeDetected) {
			$changeDetected = false;
			session_write_close();
			if (!$changeDetected) // if no change , sleep 1 sec , if there is a change , dont wait for 1 sec to report it
				sleep(1);
			echo ' '; //output something to check if the user is still connected and allow for abort if not ( said simply - its for updaing the connection_status )
			flush();
			ob_flush();
		}
	}

}