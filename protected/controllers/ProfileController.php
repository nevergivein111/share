<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileController
 *
 * @author User
 */
class ProfileController
  extends GxController
{
	public $layout = 'column1';

	public function filters(){
		return array(
		  //'accessControl',
		);

	}

	public function accessRules(){
		return array(
				  array('allow',
							'actions' => array('view','reviews','addReviewComment','updateReviewList','edit'),
							'users' => array('@'),
				  ),
				  array('deny',
							'users' => array('*'),
				  ),
		);

	}

	public function actionView($id){
		$user = null;
		if(Yii::app()->user->id)
			$user = User::model()->findByPk(Yii::app()->user->id);
		$model = User::model()->findByPk($id);
		if(!$model){
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}
		$this->render('view',array(
				  'model' => $model,
				  'user' => $user
		  )
		);

	}

	public function actionaddReviewComment(){
		$model = new ReviewComment();
		if(isset($_POST['ReviewComment'])){
			$model->setAttributes($_POST['ReviewComment']);
			$model->status = ReviewComment::STATUS_UNCHECKED;
			if(Yii::app()->request->isAjaxRequest){
				if($model->save()){
					echo CJSON::encode(array('success' => true));
				}else{
					echo CJSON::encode(array('success' => false,'error' => $model->errors['comment'][0]));
				}
				Yii::app()->end();
			}else
				throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}

	}

	public function actionupdateReviewList(){
		if(Yii::app()->request->isAjaxRequest){
			$user = null;
			if(Yii::app()->user->id){
				$user = User::model()->findByPk(Yii::app()->user->id);
			}
			$request = Yii::app()->request;
			$userId = $request->getPost('userId');
			$category_id = $request->getPost('category_id');
			$inputs = $request->getPost('inputs');
			$model = User::model()->findByPk($userId);

			$reviews = $model->reviewList();
			$html = '';
			if(empty($reviews)){
				$html = 'No review found';
			}else{
				foreach($reviews as $review):
					$html .= $this->renderPartial("//product/_review_list",array('data' => $review,'user' => $user));
				endforeach;
			}
			echo $html;
			Yii::app()->end();
		}
		else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actionsortReviewList(){
		if(Yii::app()->request->isAjaxRequest){
			$user = null;
			if(Yii::app()->user->id){
				$user = User::model()->findByPk(Yii::app()->user->id);
			}
			$request = Yii::app()->request;
			$userId = $request->getPost('userId');
			$model = User::model()->findByPk($userId);
			$model->sortReviewBy = $request->getPost('sortBy');
			$reviews = $model->reviewList();
			$html = '';
			if(empty($reviews)){
				$html = 'No review found';
			}else{
				foreach($reviews as $review):
					$html .= $this->renderPartial("//product/_review_list",array('data' => $review,'user' => $user));
				endforeach;
			}
			echo $html;
			Yii::app()->end();
		}
		else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actionEdit(){
		$model = User::model()->findByPk(Yii::app()->user->id);
		$oldPassword = $model->password;
		$model->scenario = 'update';
		$currentImage = $model->image;
		$is_change = true;
		if(isset($_POST['User'])){
			$model->setAttributes($_POST['User']);
			if($_POST['User']['old_password'] !='' || $_POST['User']['new_password'] !='' || $_POST['User']['repeat_new_password'] !=''){
				$model->scenario = 'change_password';
				$model->old_password = $_POST['User']['old_password'];
				$model->new_password = $_POST['User']['new_password'];
				$model->repeat_new_password = $_POST['User']['repeat_new_password'];
				$is_change =  $model->validatePassword();
			}
			
			if(!$model->uploadImage($currentImage)){
				$model->addError('image',Yii::t('app','Problem when uploading the image, please try again.'));
			}
			if($model->validate() && $is_change){
				$model->save(false);

				$this->redirect(Yii::app()->createUrl('profile/edit'));
			}
		}
		$this->render('edit',array(
				  'model' => $model
		));

	}
	
	public function actionWishList()
	{
		echo CJSON::encode(array('data' => $this->renderPartial('wishList', array(), true)));
	}
	
	public function actionMyGadgets()
	{
		echo CJSON::encode(array('data' => $this->renderPartial('myGadgets', array(), true)));
	}
	
	public function actionBackLists()
	{
		echo CJSON::encode(array('data' => $this->renderPartial('lists', array(), true)));
	}

}

?>
