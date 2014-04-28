<?php

class FollowController extends GxController
{
	public $layout = 'column1';

    public function actionIndex() {
        $this->render('index', array(

        ));
    }

	public function actionDelete(){
		$result = array();
		if(Yii::app()->getRequest()->isAjaxRequest){
			
			if(Yii::app()->getRequest()->getIsPostRequest()){
				$model = $this->loadModel($_POST['id'],'Follow');
				$model->delete();
				$result['status'] = 'success';
				$result['id'] = $model->id;
			}

			echo CJSON::encode($result);
		}else{
			$id = Yii::app()->request->getParam('id');
			$model = $this->loadModel($id,'Follow');
			$model->delete();
			$this->redirect(Yii::app()->request->urlReferrer);
		}

	}

	public function actionMore(){
		if(!isset($_POST['page'])){
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}
		$page = $_POST['page'];
		$follower = Follow::getFiveFollower(Yii::app()->user->id,$page);
		$nextPage = $page + 1;
		$this->renderPartial('_list',array(
				  'follower' => $follower,
				  'page' => $nextPage,
		));

	}

	public function actionCreate(){
		$request = Yii::app()->request;
		$follower = $request->getParam('follower_id');
		$following = $request->getParam('following_id');
		if($follower && $following){
			$model = new Follow();
			$model->follower_id = $follower;
			$model->following_id = $following;
			$save = $model->save();
			if($request->isAjaxRequest){
				Yii::app()->end();
			}else{
				$this->redirect(Yii::app()->request->urlReferrer);
			}
		}
		else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actioncreateAjax(){
		$request = Yii::app()->request;
		if($request->isAjaxRequest){
			$follower_id = $request->getPost('follower_id');
			$following_id = $request->getPost('following_id');
			$model = new Follow();
			$model->follower_id=$follower_id;
			$model->following_id=$following_id;
			if($model->save())
				echo CJSON::encode(array('success'=>true,'id'=>$model->id));
			else
				echo CJSON::encode(array('success'=>false));
			Yii::app()->end();
		}
	}

}

?>
