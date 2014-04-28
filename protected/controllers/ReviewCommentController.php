<?php

class ReviewCommentController
  extends GxController
{
	public function actionView($id){
		$this->render('view',array(
				  'model' => $this->loadModel($id,'ReviewComment'),
		));

	}

	public function actionCreate(){
		$model = new ReviewComment;
		if(isset($_POST['ReviewComment'])){
			$model->setAttributes($_POST['ReviewComment']);

			if($model->save()){
				if(Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view','id' => $model->id));
			}
		}

		$this->render('create',array('model' => $model));

	}

	public function actionUpdate(){
		if(Yii::app()->getRequest()->getIsPostRequest()){
			$id = Yii::app()->getRequest()->getPost('id');
			$text =Yii::app()->getRequest()->getPost('comment');
			
			$comment = $this->loadModel($id,'ReviewComment');
			$comment->comment = $text;
			echo CJSON::encode(array('success' => $comment->save()));
			Yii::app()->end();
		} else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actionDelete(){

		if(Yii::app()->getRequest()->getIsPostRequest()){
			$id = Yii::app()->getRequest()->getPost('id');
			if($id)
			$comment = $this->loadModel($id,'ReviewComment');
			$comment->is_deleted = 1;
			$comment->delete_date = date('Y-m-d H:i:s');
			echo CJSON::encode(array('success' => $comment->save()));
			Yii::app()->end();
		} else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actionIndex(){
		$dataProvider = new CActiveDataProvider('ReviewComment');
		$this->render('index',array(
				  'dataProvider' => $dataProvider,
		));

	}

	public function actionAdmin(){
		$model = new ReviewComment('search');
		$model->unsetAttributes();

		if(isset($_GET['ReviewComment']))
			$model->setAttributes($_GET['ReviewComment']);

		$this->render('admin',array(
				  'model' => $model,
		));

	}

}